<?php

namespace App\Repository;

use App\Entity\Gastos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gastos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gastos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gastos[]    findAll()
 * @method Gastos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GastosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gastos::class);
    }

    // /**
    //  * @return Gastos[] Returns an array of Gastos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gastos
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
