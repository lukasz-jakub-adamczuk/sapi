<?php

namespace spec\Core\Service;

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

    function let(EntityRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_returns_article_for_params(EntityRepository $repository, ArticleCategory $categoryRepo)
    {
        $category = 'chrono-trigger';
        $slug = 'recenzja';

        $firstArticle = new Article();
        $firstArticle->setSlug('wstep');

        $secondArticle = new Article();
        $secondArticle->setSlug('recenzja');

        $repository->findOneBy(['slug' => $category])->willReturn($categoryRepo);
        $categoryRepo->getArticles()->willReturn([$firstArticle, $secondArticle]);

        $this->get($category, $slug)->shouldReturn($secondArticle);
    }

    function it_throws_exception_when_article_is_missing(EntityRepository $repository, ArticleCategory $categoryRepo)
    {
        $category = 'chrono-trigger';
        $slug = 'solucja';

        $firstArticle = new Article();
        $firstArticle->setSlug('wstep');

        $secondArticle = new Article();
        $secondArticle->setSlug('recenzja');

        $repository->findOneBy(['slug' => $category])->willReturn($categoryRepo);
        $categoryRepo->getArticles()->willReturn([$firstArticle, $secondArticle]);

        // $this->get($category, $slug)->shouldThro($secondArticle);
        $this->shouldThrow(MissingEntityException::class)->during('get', [$category, $slug]);
    }

    function it_throws_exception_when_category_is_missing(EntityRepository $repository)
    {
        $category = 'abc';
        $slug = 'recenzja';

        $repository->findOneBy(['slug' => $category])->willReturn(null);

        $this->shouldThrow(MissingEntityException::class)->during('get', [$category, $slug]);
    }

    function it_throws_exception_when_params_are_incorrect(EntityRepository $repository)
    {
        $category = false;
        $slug = false;

        $repository->findOneBy(['slug' => $category])->shouldNotBeCalled();

        $this->shouldThrow(MissingParamsException::class)->during('get', [$category, $slug]);
    }

}
