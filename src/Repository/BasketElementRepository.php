<?php

namespace App\Repository;

use App\Entity\BasketElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BasketElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method BasketElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method BasketElement[]    findAll()
 * @method BasketElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BasketElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BasketElement::class);
    }

    // /**
    //  * @return BasketElement[] Returns an array of BasketElement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BasketElement
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
