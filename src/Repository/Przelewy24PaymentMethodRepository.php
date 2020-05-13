<?php

namespace App\Repository;

use App\Entity\PaymentMethod\Przelewy24PaymentMethod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Przelewy24PaymentMethod|null find($id, $lockMode = null, $lockVersion = null)
 * @method Przelewy24PaymentMethod|null findOneBy(array $criteria, array $orderBy = null)
 * @method Przelewy24PaymentMethod[]    findAll()
 * @method Przelewy24PaymentMethod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Przelewy24PaymentMethodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Przelewy24PaymentMethod::class);
    }

    // /**
    //  * @return Przelewy24PaymentMethod[] Returns an array of Przelewy24PaymentMethod objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Przelewy24PaymentMethod
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
