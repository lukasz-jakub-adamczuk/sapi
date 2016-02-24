<?php

namespace Core\Service;

// use Doctrine\DBAL\Connection;
// use Symfony\Component\HttpFoundation\Request;

// use Squarezone\Exception\SquarezoneException;

class ArticleProvider
{
    private $repository;
    
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function get($category, $slug)
    {
        // $repository = $this->getDoctrine()->getRepository('AppBundle:ArticleCategory');

        // 1st way
        $categoryRepo = $this->repository->findOneBy(['slug' => $category]);
        // $categoryRepo = $repository->findOneBySlug($slug);

        $articles = $categoryRepo->getArticles();

        // $article = $articles->findOneBy(['title' => $slug]);
        // print_r($articles->getValues());

        // filtering
        foreach ($articles as $item) {
            if ($item->getSlug() == $slug) {
                $article = $item;
            }
        }

        return $article;
    }
}
