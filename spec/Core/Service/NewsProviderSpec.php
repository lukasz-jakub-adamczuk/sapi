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

    function it_returns_news_archive(EntityManager $entityManager, QueryBuilder $queryBuilder)
    {
        $firstNews = new News();
        $firstNews->setSlug('cos-ciekawego');

        $secondNews = new News();
        $secondNews->setSlug('pisanie-testow-jest-super');


        $entityManager->createQueryBuilder()->willReturn($queryBuilder);

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->from('AppBundle:News', 'n')->shouldBeCalled()->willReturn($queryBuilder);
        $queryBuilder->groupBy('year')->shouldBeCalled()->willReturn($queryBuilder);

        $queryBuilder->getQuery()->shouldBeCalled();

        $this->getArchive();
    }

    function it_returns_news_archive_by_year(EntityManager $entityManager, QueryBuilder $queryBuilder)
    {
        $this->getArchiveByYear();
    }
}
