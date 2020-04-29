<?php

namespace App\Repository;

use App\Entity\IdUsuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IdUsuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdUsuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdUsuario[]    findAll()
 * @method IdUsuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdUsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdUsuario::class);
    }

    // /**
    //  * @return IdUsuario[] Returns an array of IdUsuario objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IdUsuario
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
