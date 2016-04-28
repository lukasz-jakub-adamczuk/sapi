<?php

namespace Core\Service;

use Core\Repository\ArticleRepository;
use Doctrine\ORM\EntityManager;
//use Doctrine\ORM\EntityRepository;

use AppBundle\Entity\ArticleCategory;

use Core\Exception\MissingParamsException;
use Core\Exception\MissingEntityException;
use Symfony\Component\HttpFoundation\Request;

class ArticleProvider
{
    /**
     * @var ArticleRepository
     */
    private $entityRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->entityRepository = $articleRepository;
    }

    public function getArticles($page, $offset)
    {
        $page = $page < 1 ? 0 : $page-1;

        $articles = $this->entityRepository->getArticles($page, $offset);

        if ($articles) {
            return $articles;
        }
        return [];
    }
/*
    public function getArticlesByCategory($category)
    {
        if (empty($category)) {
            throw new MissingParamsException();
        }

        $categoryEntity = $this->repository->findOneBy(['slug' => $category]);

        if (!($categoryEntity instanceof ArticleCategory)) {
            throw new MissingEntityException();
        }

        return $categoryEntity->getArticles();
    }

    public function get($category, $title)
    {
        if (empty($title)) {
            throw new MissingParamsException();
        }

        $articles = $this->getArticlesByCategory($category);

        $article = null;

        // filtering
        foreach ($articles as $item) {
            if ($item->getSlug() == $title) {
                $article = $item;
                return $article;
            }
        }

        if (is_null($article)) {
            throw new MissingEntityException();
        }

        return $article;
    }*/
}
