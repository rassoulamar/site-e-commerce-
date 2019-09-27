<?php

namespace App\Repository;

use App\Entity\AdressBilling;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AdressBilling|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdressBilling|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdressBilling[]    findAll()
 * @method AdressBilling[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdressBillingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdressBilling::class);
    }

    // /**
    //  * @return AdressBilling[] Returns an array of AdressBilling objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdressBilling
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
