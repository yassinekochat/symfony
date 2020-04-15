<?php

namespace CauseBundle\Repository;

/**
 * CauseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CauseRepository extends \Doctrine\ORM\EntityRepository
{

    public function trierGoalsElv()
    {

        $query = $this->getEntityManager()

            ->createQuery("SELECT v from CauseBundle:Cause v ORDER BY v.goals DESC ");
        return $query->getResult();

    }
    public function trierGoalsBas()
    {
        $query = $this->getEntityManager()
            ->createQuery("SELECT v from CauseBundle:Cause v ORDER BY v.goals ASC ");
        return $query->getResult();

    }

    public function likeCause()
    {
        $query = $this->createQueryBuilder('p')
            ->orderBy('p.likes', 'DESC')
            ->getQuery();

        return $query->setMaxResults(3)->getResult();

    }
    public function RechercheTitreCause($keyWord)
    {
        $query = $this->getEntityManager()->createQuery('SELECT v from CauseBundle:Cause v WHERE v.id LiKE :val ')
            ->setParameter('val',$keyWord);

        return $query->getResult();

    }
}
