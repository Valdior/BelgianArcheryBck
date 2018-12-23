<?php

namespace App\Repository;

use App\Entity\Participant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Participant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Participant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Participant[]    findAll()
 * @method Participant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Participant::class);
    }    

    /**
     * @var Participant[]
     * @return Participant[] Returns an array of Participant objects
     */
    public function ranking($idTournament): Array
    {
        return $this->createQueryBuilder('p')
                    ->leftJoin('p.peloton', 'pel')
                    ->andWhere('pel.tournament = :val')
                        ->setParameter('val', $idTournament)
                    ->OrderBy('p.category', 'ASC')
                        ->addOrderBy('p.points', 'DESC')
                        ->addOrderBy('p.numberOfX', 'DESC')
                        ->addOrderBy('p.numberOfTen', 'DESC')
                        ->addOrderBy('p.numberOfNine', 'DESC')
                    ->getQuery()
                    ->getResult()
                ;
    }

//    /**
//     * @return Participant[] Returns an array of Participant objects
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
    public function findOneBySomeField($value): ?Participant
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
