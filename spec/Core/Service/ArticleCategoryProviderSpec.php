<?php

namespace spec\Core\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\ArticleCategory;
// use AppBundle\Entity\Article;

use Core\Exception\MissingParamsException;
use Core\Exception\MissingEntityException;


class ArticleCategoryProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Service\ArticleCategoryProvider');
    }

    function let(EntityRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_returns_article_category_list(EntityRepository $repository)
    {
        $firstArticleCategory = new ArticleCategory();
        $firstArticleCategory->setSlug('chrono-trigger');

        $secondArticleCategory = new ArticleCategory();
        $secondArticleCategory->setSlug('chrono-cross');
        
        $repository->findAll()->willReturn([$firstArticleCategory, $secondArticleCategory]);

        $this->getAll()->shouldReturn([$firstArticleCategory, $secondArticleCategory]);
    }

    // function it_returns_article_category_for_params(EntityRepository $repository)
    // {
    //     $category = 'chrono-trigger';

    //     $firstArticleCategory = new ArticleCategory();
    //     $firstArticleCategory->setSlug('chrono-trigger');

    //     $secondArticleCategory = new ArticleCategory();
    //     $secondArticleCategory->setSlug('chrono-cross');

    //     $repository->findOneBy(['slug' => $category])->willReturn($firstArticleCategory);

    //     $this->get($category)->shouldReturn($firstArticleCategory);
    // }

    // function it_throws_exception_when_article_category_is_missing(EntityRepository $repository)
    // {
    //     $category = 'abc';

    //     $repository->findOneBy(['slug' => $category])->willReturn([]);

    //     $this->shouldThrow(MissingEntityException::class)->during('get', [$category]);
    // }

    // function it_throws_exception_when_params_are_incorrect(EntityRepository $repository)
    // {
    //     $category = false;

    //     $repository->findAll()->shouldNotBeCalled();

    //     $this->shouldThrow(MissingParamsException::class)->during('get', [$category]);
    // }
}
