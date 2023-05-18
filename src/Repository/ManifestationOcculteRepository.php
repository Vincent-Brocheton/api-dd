<?php

namespace App\Repository;

use App\Entity\ManifestationOcculte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ManifestationOcculte>
 *
 * @method ManifestationOcculte|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManifestationOcculte|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManifestationOcculte[]    findAll()
 * @method ManifestationOcculte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManifestationOcculteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManifestationOcculte::class);
    }

    public function save(ManifestationOcculte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ManifestationOcculte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ManifestationOcculte[] Returns an array of ManifestationOcculte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ManifestationOcculte
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
