<?php

namespace App\Repository;

use App\Entity\Operacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Operacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Operacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Operacion[]    findAll()
 * @method Operacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Operacion::class);
    }

    // /**
    //  * @return Operacion[] Returns an array of Operacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Operacion
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
