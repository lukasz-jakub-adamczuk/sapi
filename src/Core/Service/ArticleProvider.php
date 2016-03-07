<?php

namespace Core\Service;

use Doctrine\ORM\EntityRepository;

use AppBundle\Entity\ArticleCategory;

use Core\Exception\MissingParamsException;
use Core\Exception\MissingEntityException;

class ArticleProvider
{
    private $repository;
    
    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getArticles($category)
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

        $articles = $this->getArticles($category);

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
    }
}
