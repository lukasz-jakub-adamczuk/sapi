<?php

namespace Core\Service;

use Doctrine\ORM\EntityManager;

class NewsProvider
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getNewsArchive()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year')
            ->from('AppBundle:News', 'n')
            ->groupBy('year');

        $news = $queryBuilder->getQuery()->getArrayResult();

        return $news;
    }
}
