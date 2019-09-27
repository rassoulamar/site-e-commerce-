<?php

namespace App\Repository;

use App\Entity\AdressDelivery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AdressDelivery|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdressDelivery|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdressDelivery[]    findAll()
 * @method AdressDelivery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdressDeliveryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdressDelivery::class);
    }

    // /**
    //  * @return AdressDelivery[] Returns an array of AdressDelivery objects
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
    public function findOneBySomeField($value): ?AdressDelivery
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
