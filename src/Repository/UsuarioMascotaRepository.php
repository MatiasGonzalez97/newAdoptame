<?php

namespace App\Repository;

use App\Entity\UsuarioMascota;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuarioMascota|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuarioMascota|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuarioMascota[]    findAll()
 * @method UsuarioMascota[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioMascotaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuarioMascota::class);
    }

    // /**
    //  * @return UsuarioMascota[] Returns an array of UsuarioMascota objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UsuarioMascota
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
