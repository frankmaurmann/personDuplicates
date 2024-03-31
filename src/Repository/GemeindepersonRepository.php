<?php

namespace App\Repository;

use App\Entity\Gemeindeperson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gemeindeperson>
 *
 * @method Gemeindeperson|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gemeindeperson|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gemeindeperson[]    findAll()
 * @method Gemeindeperson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GemeindepersonRepository extends ServiceEntityRepository
{
    public const ALLOWED_FILTER_VALUES = ['name', 'vorname', 'strasse', 'plz', 'ort'];
    public const ALLOWED_FILTER_DEFAULT_VALUES = ['name', 'vorname'];

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gemeindeperson::class);
    }

    /**
     * @param array<int, string> $filter
     * @return array
     */
    public function getDuplicates(array $filter): array
    {
        $qb = $this->createQueryBuilder('g');
        $delimiter = '';
        $groupBy = '';
        foreach($filter as $value) {
            $groupBy .= \sprintf('%sp.%s', $delimiter, $value);
            $delimiter = ', ';
        }

        return
            $qb
            ->select('g', 'p', 'count(g)')
            ->leftJoin('g.person', 'p')
            ->groupBy($groupBy)
            ->having('count(g) > 1')
            ->getQuery()
            ->getResult();
    }
}
