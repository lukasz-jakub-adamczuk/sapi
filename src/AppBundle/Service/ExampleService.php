<?php

namespace AppBundle\Service;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Console\Input\InputInterface;

class ExampleService
{
    private $parameter;

    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router, $parameter)
    {
        $this->parameter = $parameter;
        $this->router = $router;
    }

    public function generateUrl(InputInterface $url)
    {
        return $this->router->generate($url, []);
    }
}
