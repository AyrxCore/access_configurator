<?php

namespace App\Repository;

use App\Entity\Product\Options;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Options|null find($id, $lockMode = null, $lockVersion = null)
 * @method Options|null findOneBy(array $criteria, array $orderBy = null)
 * @method Options[]    findAll()
 * @method Options[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Options::class);
    }

    // /**
    //  * @return HouseModel[] Returns an array of HouseModel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HouseModel
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}