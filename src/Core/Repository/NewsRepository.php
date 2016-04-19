<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 15/04/16
 * Time: 13:46
 */

namespace Core\Repository;

use AppBundle\Entity\News;
use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
    public function save(News $news)
    {
        $this->getEntityManager()->persist($news);
        $this->getEntityManager()->flush();
    }

    public function delete(News $news)
    {
        $this->getEntityManager()->remove($news);
        $this->getEntityManager()->flush();
    }

    public function getLatestsNews()
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n')
            ->from('AppBundle:News', 'n')
            ->orderBy('n.creationDate', 'DESC')
            ->setFirstResult(0)
            ->setMaxResults(20);

        $query = $queryBuilder->getQuery();
        if ($query) {
            $news = $query->getArrayResult();

            return $news;
        }
    }

    public function getArchive()
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('COUNT(n.idNews) items, YEAR(n.creationDate) year')
            ->from('AppBundle:News', 'n')
            ->groupBy('year');

        $query = $queryBuilder->getQuery();
        if ($query) {
            $news = $query->getArrayResult();

            return $news;
        }
    }

    public function getArchiveByYear($year)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')
            ->from('AppBundle:News', 'n')
            ->where('YEAR(n.creationDate)=:year')
            ->groupBy('month')
            ->setParameter(':year', $year);

        $query = $queryBuilder->getQuery();
        if ($query) {
            $news = $query->getArrayResult();

            return $news;
        }
    }

    public function getArchiveByYearAndMonth($year, $month)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')
            ->from('AppBundle:News', 'n')
            ->where('YEAR(n.creationDate)=:year', 'MONTH(n.creationDate)=:month')
            ->groupBy('n.idNews')
            ->setParameter(':year', $year)
            ->setParameter(':month', $month);

        $query = $queryBuilder->getQuery();
        if ($query) {
            $news = $query->getArrayResult();

            return $news;
        }
    }

    public function getNews($year, $month, $day, $title)
    {
        $date = implode('-', [$year, $month, $day]);

        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n')
            ->from('AppBundle:News', 'n')
            ->where('DATE(n.creationDate)=:date', 'n.slug=:slug')
            ->setParameter(':date', $date)
            ->setParameter(':slug', $title);

        $query = $queryBuilder->getQuery();
        if ($query) {
            $news = $query->getSingleResult();

            return $news;
        }
    }
}
