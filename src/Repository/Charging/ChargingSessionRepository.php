<?php

declare(strict_types=1);

namespace App\Repository\Charging;

use App\Entity\Charging\Charger;
use App\Entity\Charging\ChargingSession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Core\Model\CustomerInterface;

/**
 * @extends ServiceEntityRepository<ChargingSession>
 */
class ChargingSessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChargingSession::class);
    }

    /**
     * Encontra sessão ativa por carregador
     */
    public function findActiveByCharger(Charger $charger): ?ChargingSession
    {
        return $this->createQueryBuilder('cs')
            ->where('cs.charger = :charger')
            ->andWhere('cs.status = :status')
            ->setParameter('charger', $charger)
            ->setParameter('status', 'Active')
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Encontra sessão por OCPP Transaction ID
     */
    public function findByOcppTransactionId(int $transactionId): ?ChargingSession
    {
        return $this->createQueryBuilder('cs')
            ->where('cs.ocppTransactionId = :transactionId')
            ->setParameter('transactionId', $transactionId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Encontra sessões de um cliente específico
     *
     * @param CustomerInterface $customer
     * @param int $limit
     * @return ChargingSession[]
     */
    public function findByCustomer(CustomerInterface $customer, int $limit = 10): array
    {
        return $this->createQueryBuilder('cs')
            ->where('cs.customer = :customer')
            ->setParameter('customer', $customer)
            ->orderBy('cs.startTime', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Encontra sessões ativas (em andamento)
     *
     * @return ChargingSession[]
     */
    public function findActiveSessions(): array
    {
        return $this->createQueryBuilder('cs')
            ->where('cs.status = :status')
            ->setParameter('status', 'Active')
            ->orderBy('cs.startTime', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Encontra sessões por período
     *
     * @param \DateTimeInterface $startDate
     * @param \DateTimeInterface $endDate
     * @return ChargingSession[]
     */
    public function findByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate): array
    {
        return $this->createQueryBuilder('cs')
            ->where('cs.startTime >= :startDate')
            ->andWhere('cs.startTime <= :endDate')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->orderBy('cs.startTime', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Calcula receita total por período
     */
    public function calculateRevenueByDateRange(\DateTimeInterface $startDate, \DateTimeInterface $endDate): float
    {
        $result = $this->createQueryBuilder('cs')
            ->select('SUM(cs.totalCost) as revenue')
            ->where('cs.startTime >= :startDate')
            ->andWhere('cs.startTime <= :endDate')
            ->andWhere('cs.paymentStatus = :paid')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->setParameter('paid', 'Paid')
            ->getQuery()
            ->getSingleScalarResult();

        return (float) ($result ?? 0);
    }

    /**
     * Estatísticas de consumo de energia
     *
     * @return array
     */
    public function getEnergyStats(): array
    {
        $result = $this->createQueryBuilder('cs')
            ->select(
                'COUNT(cs.id) as total_sessions',
                'SUM(cs.energyDeliveredKwh) as total_energy_kwh',
                'AVG(cs.energyDeliveredKwh) as avg_energy_kwh',
                'MAX(cs.energyDeliveredKwh) as max_energy_kwh',
                'MIN(cs.energyDeliveredKwh) as min_energy_kwh'
            )
            ->where('cs.status = :status')
            ->setParameter('status', 'Completed')
            ->getQuery()
            ->getSingleResult();

        return [
            'total_sessions' => (int) $result['total_sessions'],
            'total_energy_kwh' => (float) ($result['total_energy_kwh'] ?? 0),
            'avg_energy_kwh' => (float) ($result['avg_energy_kwh'] ?? 0),
            'max_energy_kwh' => (float) ($result['max_energy_kwh'] ?? 0),
            'min_energy_kwh' => (float) ($result['min_energy_kwh'] ?? 0),
        ];
    }

    /**
     * Top clientes por consumo
     *
     * @param int $limit
     * @return array
     */
    public function getTopCustomersByEnergy(int $limit = 10): array
    {
        return $this->createQueryBuilder('cs')
            ->select(
                'IDENTITY(cs.customer) as customer_id',
                'SUM(cs.energyDeliveredKwh) as total_energy',
                'COUNT(cs.id) as total_sessions',
                'SUM(cs.totalCost) as total_spent'
            )
            ->where('cs.status = :status')
            ->setParameter('status', 'Completed')
            ->groupBy('cs.customer')
            ->orderBy('total_energy', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Sessões não pagas
     *
     * @return ChargingSession[]
     */
    public function findUnpaidSessions(): array
    {
        return $this->createQueryBuilder('cs')
            ->where('cs.paymentStatus IN (:statuses)')
            ->andWhere('cs.status = :sessionStatus')
            ->setParameter('statuses', ['Pending', 'Failed'])
            ->setParameter('sessionStatus', 'Completed')
            ->orderBy('cs.endTime', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function save(ChargingSession $session, bool $flush = false): void
    {
        $this->getEntityManager()->persist($session);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ChargingSession $session, bool $flush = false): void
    {
        $this->getEntityManager()->remove($session);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
