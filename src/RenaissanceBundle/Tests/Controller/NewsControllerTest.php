<?php

namespace RenaissanceBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/index');
    }

    public function testShow()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'show/{id}');
    }
}
