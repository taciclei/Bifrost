<?php

declare(strict_types=1);

namespace App\Repository\Charging;

use App\Entity\Charging\Charger;
use App\Entity\Charging\Station;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Charger>
 */
class ChargerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Charger::class);
    }

    /**
     * Encontra carregador pelo OCPP Charge Point ID
     */
    public function findByOcppChargePointId(string $chargePointId): ?Charger
    {
        return $this->createQueryBuilder('c')
            ->where('c.ocppChargePointId = :chargePointId')
            ->setParameter('chargePointId', $chargePointId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Encontra carregadores disponíveis por tipo de conector
     *
     * @param string $connectorType
     * @return Charger[]
     */
    public function findAvailableByConnectorType(string $connectorType): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.connectorType = :connectorType')
            ->andWhere('c.status = :status')
            ->andWhere('c.isEnabled = true')
            ->setParameter('connectorType', $connectorType)
            ->setParameter('status', 'Available')
            ->getQuery()
            ->getResult();
    }

    /**
     * Encontra carregadores de uma estação específica
     *
     * @param Station $station
     * @return Charger[]
     */
    public function findByStation(Station $station): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.station = :station')
            ->setParameter('station', $station)
            ->orderBy('c.powerKw', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Encontra carregadores offline (sem heartbeat recente)
     *
     * @param int $minutesThreshold
     * @return Charger[]
     */
    public function findOffline(int $minutesThreshold = 10): array
    {
        $threshold = new \DateTimeImmutable(sprintf('-%d minutes', $minutesThreshold));

        return $this->createQueryBuilder('c')
            ->where('c.lastHeartbeat < :threshold OR c.lastHeartbeat IS NULL')
            ->andWhere('c.status != :maintenanceStatus')
            ->setParameter('threshold', $threshold)
            ->setParameter('maintenanceStatus', 'Maintenance')
            ->getQuery()
            ->getResult();
    }

    /**
     * Conta carregadores por status
     *
     * @return array<string, int>
     */
    public function countByStatus(): array
    {
        $result = $this->createQueryBuilder('c')
            ->select('c.status, COUNT(c.id) as total')
            ->groupBy('c.status')
            ->getQuery()
            ->getResult();

        $counts = [];
        foreach ($result as $row) {
            $counts[$row['status']] = (int) $row['total'];
        }

        return $counts;
    }

    /**
     * Estatísticas de utilização de carregadores
     *
     * @return array
     */
    public function getUtilizationStats(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT
                c.id,
                c.serial_number,
                COUNT(cs.id) as total_sessions,
                SUM(cs.energy_delivered_kwh) as total_energy_kwh,
                AVG(cs.energy_delivered_kwh) as avg_energy_per_session,
                SUM(EXTRACT(EPOCH FROM (cs.end_time - cs.start_time))/3600) as total_hours
            FROM charging_charger c
            LEFT JOIN charging_session cs ON cs.charger_id = c.id
            WHERE cs.status = 'Completed'
            GROUP BY c.id, c.serial_number
            ORDER BY total_sessions DESC
        ";

        $stmt = $conn->prepare($sql);
        return $stmt->executeQuery()->fetchAllAssociative();
    }

    public function save(Charger $charger, bool $flush = false): void
    {
        $this->getEntityManager()->persist($charger);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Charger $charger, bool $flush = false): void
    {
        $this->getEntityManager()->remove($charger);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
