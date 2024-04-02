<?php

namespace App\Repository;

use App\Entity\Person;
use App\Entity\Gemeindeperson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Person>
 *
 * @method Person|null find($id, $lockMode = null, $lockVersion = null)
 * @method Person|null findOneBy(array $criteria, array $orderBy = null)
 * @method Person[]    findAll()
 * @method Person[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Person::class);
    }

    public function findByNameFields(array $filter, Gemeindeperson $gemeindeperson): array
    {
        $person = $gemeindeperson->getPerson();
        $qb = $this->createQueryBuilder('g');
        $value = '';
        foreach ($filter as $key) {
            if ($key === 'name') {
                $value = $person->getName();
            } elseif ($key === 'vorname') {
                $value = $person->getVorname();
            } elseif ($key === 'plz') {
                $value = $person->getPlz();
            }  elseif ($key === 'strasse') {
                $value = $person->getStrasse();
            }  elseif ($key === 'ort') {
                $value = $person->getOrt();
            }

            $andWhere = 'g.' . $key . '=:' . $key;
            $qb->andWhere($andWhere)
                ->setParameter($key, $value);
        }


        return $qb->orderBy('g.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
