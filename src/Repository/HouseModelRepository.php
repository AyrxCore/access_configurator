<?php

namespace App\Repository;

use App\Entity\House\HouseModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HouseModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method HouseModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method HouseModel[]    findAll()
 * @method HouseModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HouseModelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HouseModel::class);
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
    
    public function findAllQuery()
    {
        return $this->createQueryBuilder('all')
            ->from(HouseModel::class,'all')
            ->getQuery()
            ->getResult();
    }
}
