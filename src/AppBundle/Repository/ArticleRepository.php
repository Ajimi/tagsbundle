<?php

namespace AppBundle\Repository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{
    public function findLatest()
    {
        return $this->latestQuery()
            ->getQuery();
    }


    public function findByTag($name)
    {
        return $this->latestQuery()
            ->where('t.name = :name')
            ->setParameter('name', $name)
            ->getQuery();
    }

    private function latestQuery()
    {
        return $this->createQueryBuilder('p')
            ->join('p.tags', 't')
            ->select('p, t');
    }
}
