<?php

namespace spec\Core;

use PhpSpec\ObjectBehavior;
use Core\NewsProvider;

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
