<?php

namespace App\Repository;

use App\Entity\PaymentMethod\AbstractPaymentMethod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AbstractPaymentMethod|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbstractPaymentMethod|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbstractPaymentMethod[]    findAll()
 * @method AbstractPaymentMethod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AbstractPaymentMethodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AbstractPaymentMethod::class);
    }

    // /**
    //  * @return AbstractPaymentMethod[] Returns an array of AbstractPaymentMethod objects
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
    public function findOneBySomeField($value): ?AbstractPaymentMethod
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
