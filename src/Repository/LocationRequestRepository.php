<?php

namespace App\Repository;

use App\Entity\LocationRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LocationRequest>
 */
class LocationRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocationRequest::class);
    }

    /**
     * Demandes non traitées, les plus récentes en premier.
     *
     * @return LocationRequest[]
     */
    public function findNouvelles(): array
    {
        return $this->createQueryBuilder('lr')
            ->where('lr.statut = :statut')
            ->setParameter('statut', LocationRequest::STATUT_NOUVELLE)
            ->orderBy('lr.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Demandes déjà traitées, les plus récentes en premier.
     *
     * @return LocationRequest[]
     */
    public function findTraitees(): array
    {
        return $this->createQueryBuilder('lr')
            ->where('lr.statut = :statut')
            ->setParameter('statut', LocationRequest::STATUT_TRAITEE)
            ->orderBy('lr.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
