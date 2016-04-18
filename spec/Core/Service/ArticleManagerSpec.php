<?php

namespace spec\Core\Service;

use Core\Repository\ArticleRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArticleManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Service\ArticleManager');
    }

    function let(ArticleRepository $articleRepository)
    {
        $this->beConstructedWith($articleRepository);
    }
}
