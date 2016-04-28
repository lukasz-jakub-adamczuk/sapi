<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    public function testGetarticles()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getArticles');
    }

    public function testGetarticle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/getArticle');
    }

}
