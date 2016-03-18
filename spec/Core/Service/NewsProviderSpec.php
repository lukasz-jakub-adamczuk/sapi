<?php

namespace spec\Core\Service;

use PhpSpec\ObjectBehavior;
use Core\Service\NewsProvider;

/**
 * @mixin NewsProvider
 */
class NewsProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(NewsProvider::class);
    }
}
