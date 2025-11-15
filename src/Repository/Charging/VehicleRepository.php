<?php

declare(strict_types=1);

namespace App\Repository\Charging;

use App\Entity\Charging\Vehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Core\Model\CustomerInterface;

/**
 * @extends ServiceEntityRepository<Vehicle>
 */
class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

    /**
     * Encontra veículo por placa
     */
    public function findByLicensePlate(string $licensePlate): ?Vehicle
    {
        return $this->createQueryBuilder('v')
            ->where('v.licensePlate = :plate')
            ->setParameter('plate', strtoupper($licensePlate))
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Encontra veículo por RFID tag
     */
    public function findByRfidTag(string $rfidTag): ?Vehicle
    {
        return $this->createQueryBuilder('v')
            ->where('v.rfidTag = :tag')
            ->setParameter('tag', $rfidTag)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Encontra veículos de um cliente
     *
     * @param CustomerInterface $customer
     * @return Vehicle[]
     */
    public function findByCustomer(CustomerInterface $customer): array
    {
        return $this->createQueryBuilder('v')
            ->where('v.customer = :customer')
            ->setParameter('customer', $customer)
            ->orderBy('v.isPrimary', 'DESC')
            ->addOrderBy('v.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Encontra veículo primário de um cliente
     */
    public function findPrimaryByCustomer(CustomerInterface $customer): ?Vehicle
    {
        return $this->createQueryBuilder('v')
            ->where('v.customer = :customer')
            ->andWhere('v.isPrimary = true')
            ->setParameter('customer', $customer)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Estatísticas de veículos por marca
     *
     * @return array
     */
    public function countByBrand(): array
    {
        $result = $this->createQueryBuilder('v')
            ->select('v.brand, COUNT(v.id) as total')
            ->groupBy('v.brand')
            ->orderBy('total', 'DESC')
            ->getQuery()
            ->getResult();

        $counts = [];
        foreach ($result as $row) {
            $counts[$row['brand']] = (int) $row['total'];
        }

        return $counts;
    }

    /**
     * Estatísticas de veículos por tipo de conector
     *
     * @return array
     */
    public function countByConnectorType(): array
    {
        $result = $this->createQueryBuilder('v')
            ->select('v.connectorType, COUNT(v.id) as total')
            ->groupBy('v.connectorType')
            ->orderBy('total', 'DESC')
            ->getQuery()
            ->getResult();

        $counts = [];
        foreach ($result as $row) {
            $counts[$row['connectorType']] = (int) $row['total'];
        }

        return $counts;
    }

    public function save(Vehicle $vehicle, bool $flush = false): void
    {
        $this->getEntityManager()->persist($vehicle);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Vehicle $vehicle, bool $flush = false): void
    {
        $this->getEntityManager()->remove($vehicle);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
