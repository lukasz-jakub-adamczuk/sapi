<?php

namespace spec\Core\Service;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArticleCategoryProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Service\ArticleCategoryProvider');
    }
}
