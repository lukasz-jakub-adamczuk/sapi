<?php

namespace spec\Core\Service;

use Doctrine\ORM\EntityManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\ArticleCategory;
use AppBundle\Entity\Article;

use Core\Exception\MissingParamsException;
use Core\Exception\MissingEntityException;

class ArticleProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Service\ArticleProvider');
    }

    function let(EntityManager $entityManager)
    {
        $this->beConstructedWith($entityManager);
    }

//    function let(EntityRepository $repository)
//    {
//        $this->beConstructedWith($repository);
//    }

//    function it_returns_article_for_params(EntityRepository $repository, ArticleCategory $categoryEntity)
//    {
//        $category = 'chrono-trigger';
//        $title = 'recenzja';
//
//        $firstArticle = new Article();
//        $firstArticle->setSlug('wstep');
//
//        $secondArticle = new Article();
//        $secondArticle->setSlug('recenzja');
//
//        $repository->findOneBy(['slug' => $category])->willReturn($categoryEntity);
//        $categoryEntity->getArticles()->willReturn([$firstArticle, $secondArticle]);
//
//        $this->get($category, $title)->shouldReturn($secondArticle);
//    }
//
//    function it_throws_exception_when_article_is_missing(EntityRepository $repository, ArticleCategory $categoryEntity)
//    {
//        $category = 'chrono-trigger';
//        $title = 'solucja';
//
//        $firstArticle = new Article();
//        $firstArticle->setSlug('wstep');
//
//        $secondArticle = new Article();
//        $secondArticle->setSlug('recenzja');
//
//        $repository->findOneBy(['slug' => $category])->willReturn($categoryEntity);
//        $categoryEntity->getArticles()->willReturn([$firstArticle, $secondArticle]);
//
//        // $this->get($category, $title)->shouldThro($secondArticle);
//        $this->shouldThrow(MissingEntityException::class)->during('get', [$category, $title]);
//    }
//
//    function it_throws_exception_when_category_is_missing(EntityRepository $repository)
//    {
//        $category = 'abc';
//        $title = 'recenzja';
//
//        $repository->findOneBy(['slug' => $category])->willReturn(null);
//
//        $this->shouldThrow(MissingEntityException::class)->during('get', [$category, $title]);
//    }
//
//    function it_throws_exception_when_params_are_incorrect(EntityRepository $repository)
//    {
//        $category = false;
//        $title = false;
//
//        $repository->findOneBy(['slug' => $category])->shouldNotBeCalled();
//
//        $this->shouldThrow(MissingParamsException::class)->during('get', [$category, $title]);
//    }

}
