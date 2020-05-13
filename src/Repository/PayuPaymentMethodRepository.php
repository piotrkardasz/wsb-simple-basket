<?php

namespace App\Repository;

use App\Entity\PaymentMethod\PayuPaymentMethod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PayuPaymentMethod|null find($id, $lockMode = null, $lockVersion = null)
 * @method PayuPaymentMethod|null findOneBy(array $criteria, array $orderBy = null)
 * @method PayuPaymentMethod[]    findAll()
 * @method PayuPaymentMethod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PayuPaymentMethodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PayuPaymentMethod::class);
    }

    // /**
    //  * @return PayuPaymentMethod[] Returns an array of PayuPaymentMethod objects
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
    public function findOneBySomeField($value): ?PayuPaymentMethod
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
