<?php

namespace spec\Core\Service;

use AppBundle\Entity\News;
use Core\Repository\NewsRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NewsProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Service\NewsProvider');
    }

    function let(NewsRepository $newsRepository)
    {
        $this->beConstructedWith($newsRepository);
    }

    function it_returns_latests_news(NewsRepository $newsRepository)
    {
        $newsRepository->getLatestsNews()->shouldBeCalled();

        $this->getLatestsNews();
    }

    function it_returns_news_archive(NewsRepository $newsRepository)
    {
        $newsRepository->getArchive()->shouldBeCalled();
//        $entityManager->createQueryBuilder()->willReturn($queryBuilder);
//
//        $queryBuilder->select('COUNT(n.idNews) items, YEAR(n.creationDate) year')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->groupBy('year')->shouldBeCalled()->willReturn($queryBuilder);
//
//        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getArchive();
    }

    function it_returns_news_archive_by_year(NewsRepository $newsRepository)
    {
        $year = '2016';

        $newsRepository->getArchiveByYear($year)->shouldBeCalled();
//        $entityManager->createQueryBuilder()->willReturn($queryBuilder);
//
//        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->where('YEAR(n.creationDate)=:year')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->groupBy('month')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->setParameter(':year', $year)->shouldBeCalled()->willReturn($queryBuilder);
//
//        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getArchiveByYear($year);
    }

    function it_returns_news_archive_by_year_and_month(NewsRepository $newsRepository)
    {
        $year = '2016';
        $month = '01';

        $newsRepository->getArchiveByYearAndMonth($year, $month)->shouldBeCalled();
//        $entityManager->createQueryBuilder()->willReturn($queryBuilder);
//
//        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->where('YEAR(n.creationDate)=:year', 'MONTH(n.creationDate)=:month')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->groupBy('n.idNews')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->setParameter(':year', $year)->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->setParameter(':month', $month)->shouldBeCalled()->willReturn($queryBuilder);
//
//        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getArchiveByYearAndMonth($year, $month);
    }

    function it_returns_news(NewsRepository $newsRepository)
    {
        $year = '2016';
        $month = '01';
        $day = '01';
        $title = 'taki sobie bedzie';

//        $date = implode('-', [$year, $month, $day]);

        $newsRepository->getArchiveByYearAndMonth($year, $month, $month, $title)->shouldBeCalled();

//        $entityManager->createQueryBuilder()->willReturn($queryBuilder);
//
//        $queryBuilder->select('n')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->where('DATE(n.creationDate)=:date', 'n.slug=:slug')->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->setParameter(':date', $date)->shouldBeCalled()->willReturn($queryBuilder);
//        $queryBuilder->setParameter(':slug', $title)->shouldBeCalled()->willReturn($queryBuilder);
//
//        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getNews($year, $month, $day, $title);

    }
}
