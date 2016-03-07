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

    function it_returns_article_category_for_params(EntityRepository $repository)
    {
        $category = 'chrono-trigger';
        // $title = 'recenzja';

        $firstArticleCategory = new ArticleCategory();
        $firstArticleCategory->setSlug('chrono-trigger');

        $secondArticleCategory = new ArticleCategory();
        $secondArticleCategory->setSlug('chrono-cross');

        $repository->findOneBy(['slug' => $category])->willReturn($firstArticleCategory);
        // $categoryEntity->getArticles()->willReturn([$firstArticle, $secondArticle]);

        // $this->get($category, $slug)->shouldReturn($secondArticle);

        $this->get($category)->shouldReturn($firstArticleCategory);
    }
}
