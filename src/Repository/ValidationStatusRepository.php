<?php

namespace App\Repository;

use App\Entity\ValidationStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ValidationStatus>
 *
 * @method ValidationStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValidationStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValidationStatus[]    findAll()
 * @method ValidationStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValidationStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValidationStatus::class);
    }

//    /**
//     * @return ValidationStatus[] Returns an array of ValidationStatus objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ValidationStatus
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
