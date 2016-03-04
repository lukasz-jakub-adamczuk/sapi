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

    public function get($category, $slug)
    {
        if (empty($slug)) {
            throw new MissingParamsException();
        }

        $articles = $this->getList($category);

        $article = null;

        // filtering
        foreach ($articles as $item) {
            if ($item->getSlug() == $slug) {
                $article = $item;
                return $article;
            }
        }

        if (is_null($article)) {
            throw new MissingEntityException();
        }

        return $article;
    }

    /**
     * @param $category
     *
     * @return array
     */
    public function getList($category)
    {
        if (empty($category)) {
            throw new MissingParamsException();
        }
        $categoryRepo = $this->repository->findOneBy(['slug' => $category]);

        // var_dump($categoryRepo);
        if (!($categoryRepo instanceof ArticleCategory)) {
            throw new MissingEntityException();

        }

        $articles = $categoryRepo->getArticles();

        return $articles;
    }
}
