<?php

namespace App\Repository;

use App\Entity\Peloton;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Peloton|null find($id, $lockMode = null, $lockVersion = null)
 * @method Peloton|null findOneBy(array $criteria, array $orderBy = null)
 * @method Peloton[]    findAll()
 * @method Peloton[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PelotonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Peloton::class);
    }

//    /**
//     * @return Peloton[] Returns an array of Peloton objects
//     */
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
    public function findOneBySomeField($value): ?Peloton
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
