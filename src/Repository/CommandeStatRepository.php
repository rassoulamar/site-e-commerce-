<?php

namespace App\Repository;

use App\Entity\CommandeStat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CommandeStat|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandeStat|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandeStat[]    findAll()
 * @method CommandeStat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeStatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommandeStat::class);
    }

    // /**
    //  * @return CommandeStat[] Returns an array of CommandeStat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommandeStat
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
