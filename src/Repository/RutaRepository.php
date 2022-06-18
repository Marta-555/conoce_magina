<?php

namespace App\Repository;

use App\Entity\Ruta;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ruta>
 *
 * @method Ruta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ruta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ruta[]    findAll()
 * @method Ruta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RutaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ruta::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Ruta $entity, bool $flush = true): void
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
    public function remove(Ruta $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findUser(User $user)
    {
        $id_user = $user->getId();

        return $this->createQueryBuilder('r')
        ->where('r.user = :val')
        ->setParameter('val', $id_user)
        ->getQuery()
        ->getResult()
        ;
    }

    // /**
    //  * @return Ruta[] Returns an array of Ruta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ruta
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
