<?php

namespace spec\Core\Service;

use AppBundle\Entity\News;
use Core\Repository\NewsRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\Request;

class NewsManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Service\NewsManager');
    }

    function let(NewsRepository $newsRepository)
    {
        $this->beConstructedWith($newsRepository);
    }

//    function it_returns_news_created_with_params(Request $request, NewsRepository $newsRepository)
//    {
//        $fields = [];
//        $news = new News();
//
//        $this->hydrate($news, $fields);
//
//        $newsRepository->save($news);
//
//        $this->create($request);
//    }
}
