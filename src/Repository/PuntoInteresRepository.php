<?php

namespace App\Repository;

use App\Entity\PuntoInteres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PuntoInteres>
 *
 * @method PuntoInteres|null find($id, $lockMode = null, $lockVersion = null)
 * @method PuntoInteres|null findOneBy(array $criteria, array $orderBy = null)
 * @method PuntoInteres[]    findAll()
 * @method PuntoInteres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PuntoInteresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PuntoInteres::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PuntoInteres $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(PuntoInteres $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PuntoInteres[] Returns an array of PuntoInteres objects
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
    public function findOneBySomeField($value): ?PuntoInteres
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
