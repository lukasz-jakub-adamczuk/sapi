<?php

namespace spec\Core\Service;

use AppBundle\Entity\News;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NewsProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Service\NewsProvider');
    }

    function let(EntityManager $entityManager)
    {
        $this->beConstructedWith($entityManager);
    }

    function it_returns_latests_news(EntityManager $entityManager, QueryBuilder $queryBuilder)
    {
        $entityManager->createQueryBuilder()->willReturn($queryBuilder);

        $queryBuilder->select('n')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->orderBy('n.creationDate', 'DESC')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setFirstResult(0)->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setMaxResults(20)->shouldBeCalled()->willReturn($queryBuilder);

        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getLatestsNews();
    }

    function it_returns_news_archive(EntityManager $entityManager, QueryBuilder $queryBuilder)
    {
        $entityManager->createQueryBuilder()->willReturn($queryBuilder);

        $queryBuilder->select('COUNT(n.idNews) items, YEAR(n.creationDate) year')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->groupBy('year')->shouldBeCalled()->willReturn($queryBuilder);

        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getArchive();
    }

    function it_returns_news_archive_by_year($year, EntityManager $entityManager, QueryBuilder $queryBuilder)
    {
        $entityManager->createQueryBuilder()->willReturn($queryBuilder);

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->where('YEAR(n.creationDate)=:year')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->groupBy('month')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setParameter(':year', $year)->shouldBeCalled()->willReturn($queryBuilder);

        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getArchiveByYear($year);
    }

    function it_returns_news_archive_by_year_and_month($year, $month, EntityManager $entityManager, QueryBuilder $queryBuilder)
    {
        $entityManager->createQueryBuilder()->willReturn($queryBuilder);

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->where('YEAR(n.creationDate)=:year', 'MONTH(n.creationDate)=:month')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->groupBy('n.idNews')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setParameter(':year', $year)->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setParameter(':month', $month)->shouldBeCalled()->willReturn($queryBuilder);

        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getArchiveByYearAndMonth($year, $month);
    }

    function it_returns_news($year, $month, $day, $title, EntityManager $entityManager, QueryBuilder $queryBuilder)
    {
//        $date = implode('-', [$year, $month, $day]);

        $entityManager->createQueryBuilder()->willReturn($queryBuilder);

        $queryBuilder->select('n')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->where('DATE(n.creationDate)=:date', 'n.slug=:slug')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setParameter(':date', $date)->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->setParameter(':slug', $title)->shouldBeCalled()->willReturn($queryBuilder);

        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getNews($year, $month, $day, $title);

    }
}
