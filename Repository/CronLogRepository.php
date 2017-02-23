<?php

namespace Bordeux\Bundle\CronBundle\Repository;

use Bordeux\Bundle\CronBundle\Entity\Cron;

/**
 * CronLogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CronLogRepository extends \Doctrine\ORM\EntityRepository
{

    /**
     * @param Cron $cron
     * @return int
     * @author Chris Bednarczyk <chris@tourradar.com>
     */
    public function getErrorCount(Cron $cron)
    {

        return $this->createQueryBuilder("a")
            ->select("COUNT(a.id) as _count")
            ->andWhere("a.cron = :cron")
            ->andWhere("a.success = false")
            ->setParameter(":cron", $cron)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
