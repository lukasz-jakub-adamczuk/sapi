<?php

namespace Core\Service;

use Doctrine\ORM\EntityManager;

class NewsProvider
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getLatestNews()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

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
        $queryBuilder = $this->entityManager->createQueryBuilder();

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
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')
            ->from('AppBundle:News', 'n')
            ->where('YEAR(n.creationDate)=:year')
            ->groupBy('month')
            ->setParameter(':year', $year);

        $news = $queryBuilder->getQuery()->getArrayResult();

        return $news;
    }

    public function getArchiveByYearAndMonth($year, $month)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')
            ->from('AppBundle:News', 'n')
            ->where('YEAR(n.creationDate)=:year', 'MONTH(n.creationDate)=:month')
            ->groupBy('n.idNews')
            ->setParameter(':year', $year)
            ->setParameter(':month', $month);

        $news = $queryBuilder->getQuery()->getArrayResult();

        return $news;
    }

    public function getNews($year, $month, $day, $title)
    {
        $date = implode('-', [$year, $month, $day]);

        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('n')
            ->from('AppBundle:News', 'n')
            ->where('DATE(n.creationDate)=:date', 'n.slug=:slug')
            ->setParameter(':date', $date)
            ->setParameter(':slug', $title);

        $news = $queryBuilder->getQuery()->getSingleResult();

        return $news;
    }
}
