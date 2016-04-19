<?php

namespace Core\Service;

use Core\Repository\NewsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class NewsProvider
{

    public function __construct(NewsRepository $newsRepository)
    {
        $this->entityRepository = $newsRepository;
    }

    public function getLatestsNews()
    {
        $news = $this->entityRepository->getLatestsNews();

        if ($news) {
            return $news;
        }
        return [];
    }

    public function getArchive()
    {
        $news = $this->entityRepository->getArchive();

        if ($news) {
            return $news;
        }
        return [];
    }

    public function getArchiveByYear($year)
    {
        $news = $this->entityRepository->getArchiveByYear($year);

        if ($news) {
            return $news;
        }
        return [];
    }

    public function getArchiveByYearAndMonth($year, $month)
    {
        $news = $this->entityRepository->getArchiveByYearAndMonth($year, $month);

        if ($news) {
            return $news;
        }
        return [];
    }

    public function getNews($year, $month, $day, $title)
    {
        $news = $this->entityRepository->getArchiveByYearAndMonth($year, $month, $day, $title);

        if ($news) {
            return $news;
        }
        return null;
    }
}
