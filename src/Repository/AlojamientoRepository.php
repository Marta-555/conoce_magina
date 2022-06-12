<?php

namespace App\Repository;

use App\Entity\Alojamiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Alojamiento>
 *
 * @method Alojamiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alojamiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alojamiento[]    findAll()
 * @method Alojamiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlojamientoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alojamiento::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Alojamiento $entity, bool $flush = true): void
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
    public function remove(Alojamiento $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


    public function findAlojamiento($id)
    {
        return $this->createQueryBuilder('a')
        ->where('a.municipio = :val')
        ->setParameter('val', $id)
        ->getQuery()
        ->getResult()
        ;
    }

    // /**
    //  * @return Alojamiento[] Returns an array of Alojamiento objects
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
    public function findOneBySomeField($value): ?Alojamiento
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
