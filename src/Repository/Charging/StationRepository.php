<?php

declare(strict_types=1);

namespace App\Repository\Charging;

use App\Entity\Charging\Station;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Station>
 */
class StationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Station::class);
    }

    /**
     * Encontra estações próximas a uma coordenada geográfica
     *
     * @param float $latitude
     * @param float $longitude
     * @param int $radiusKm Raio em quilômetros
     * @return Station[]
     */
    public function findNearby(float $latitude, float $longitude, int $radiusKm = 10): array
    {
        // Fórmula Haversine para calcular distância entre coordenadas
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT s.*,
                   (6371 * acos(cos(radians(:lat))
                   * cos(radians(s.latitude))
                   * cos(radians(s.longitude) - radians(:lng))
                   + sin(radians(:lat))
                   * sin(radians(s.latitude)))) AS distance
            FROM charging_station s
            WHERE s.is_public = true
            AND s.status = 'Online'
            HAVING distance < :radius
            ORDER BY distance ASC
        ";

        $stmt = $conn->prepare($sql);
        $result = $stmt->executeQuery([
            'lat' => $latitude,
            'lng' => $longitude,
            'radius' => $radiusKm,
        ]);

        $stations = [];
        foreach ($result->fetchAllAssociative() as $row) {
            $station = $this->find($row['id']);
            if ($station) {
                $stations[] = $station;
            }
        }

        return $stations;
    }

    /**
     * Encontra estações com carregadores disponíveis
     *
     * @return Station[]
     */
    public function findWithAvailableChargers(): array
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.chargers', 'c')
            ->where('c.status = :status')
            ->andWhere('c.isEnabled = true')
            ->andWhere('s.status = :stationStatus')
            ->setParameter('status', 'Available')
            ->setParameter('stationStatus', 'Online')
            ->groupBy('s.id')
            ->getQuery()
            ->getResult();
    }

    /**
     * Encontra estações por cidade
     *
     * @param string $city
     * @return Station[]
     */
    public function findByCity(string $city): array
    {
        return $this->createQueryBuilder('s')
            ->where('s.city = :city')
            ->setParameter('city', $city)
            ->orderBy('s.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Conta total de estações por status
     *
     * @return array<string, int>
     */
    public function countByStatus(): array
    {
        $result = $this->createQueryBuilder('s')
            ->select('s.status, COUNT(s.id) as total')
            ->groupBy('s.status')
            ->getQuery()
            ->getResult();

        $counts = [];
        foreach ($result as $row) {
            $counts[$row['status']] = (int) $row['total'];
        }

        return $counts;
    }

    public function save(Station $station, bool $flush = false): void
    {
        $this->getEntityManager()->persist($station);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Station $station, bool $flush = false): void
    {
        $this->getEntityManager()->remove($station);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
