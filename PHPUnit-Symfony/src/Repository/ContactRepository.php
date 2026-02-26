<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Contact>
 *
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

//    /**
//     * @return Contact[] Returns an array of Contact objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    public function findAll($withCompanies = false): array
    {
        $qb =  $this->createQueryBuilder('ctc')
            ->select('ctc, cpn')
            ->orderBy('ctc.id', 'ASC');

        if ($withCompanies) {
           $qb->leftJoin('ctc.company', 'cpn');
        }

        return $qb->setMaxResults(100)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllWithCompaniesDQL(): array
    {
        $dql = <<<DQL
SELECT ctc, cpn
FROM App\Entity\Contact ctc
LEFT JOIN ctc.company cpn
ORDER BY ctc.id ASC
DQL;

        return $this->getEntityManager()->createQuery($dql)
            ->setMaxResults(100)
            ->getResult()
            ;
    }

//    public function findOneBySomeField($value): ?Contact
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
