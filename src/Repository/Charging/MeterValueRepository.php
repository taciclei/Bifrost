<?php

declare(strict_types=1);

namespace App\Repository\Charging;

use App\Entity\Charging\ChargingSession;
use App\Entity\Charging\MeterValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MeterValue>
 */
class MeterValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeterValue::class);
    }

    /**
     * Encontra meter values de uma sessão
     *
     * @param ChargingSession $session
     * @return MeterValue[]
     */
    public function findBySession(ChargingSession $session): array
    {
        return $this->createQueryBuilder('mv')
            ->where('mv.chargingSession = :session')
            ->setParameter('session', $session)
            ->orderBy('mv.timestamp', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Encontra último meter value de uma sessão
     */
    public function findLatestBySession(ChargingSession $session): ?MeterValue
    {
        return $this->createQueryBuilder('mv')
            ->where('mv.chargingSession = :session')
            ->setParameter('session', $session)
            ->orderBy('mv.timestamp', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Calcula potência média de uma sessão
     */
    public function calculateAveragePower(ChargingSession $session): ?float
    {
        $result = $this->createQueryBuilder('mv')
            ->select('AVG(mv.powerKw) as avg_power')
            ->where('mv.chargingSession = :session')
            ->andWhere('mv.powerKw IS NOT NULL')
            ->setParameter('session', $session)
            ->getQuery()
            ->getSingleScalarResult();

        return $result ? (float) $result : null;
    }

    public function save(MeterValue $meterValue, bool $flush = false): void
    {
        $this->getEntityManager()->persist($meterValue);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
