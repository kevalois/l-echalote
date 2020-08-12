<?php

namespace App\Repository;

use App\Entity\Gulp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gulp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gulp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gulp[]    findAll()
 * @method Gulp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GulpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gulp::class);
    }

    // /**
    //  * @return Gulp[] Returns an array of Gulp objects
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
    public function findOneBySomeField($value): ?Gulp
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
