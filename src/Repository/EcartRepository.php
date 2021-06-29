<?php

namespace App\Repository;

use App\Entity\Ecart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ecart|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ecart|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ecart[]    findAll()
 * @method Ecart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ecart::class);
    }

    // /**
    //  * @return Ecart[] Returns an array of Ecart objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ecart
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
