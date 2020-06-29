<?php

namespace App\Repository;

use App\Entity\LoginWay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LoginWay|null find($id, $lockMode = null, $lockVersion = null)
 * @method LoginWay|null findOneBy(array $criteria, array $orderBy = null)
 * @method LoginWay[]    findAll()
 * @method LoginWay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoginWayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LoginWay::class);
    }

    // /**
    //  * @return LoginWay[] Returns an array of LoginWay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LoginWay
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
