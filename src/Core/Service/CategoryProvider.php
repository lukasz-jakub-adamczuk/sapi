<?php

namespace Core\Service;

use Doctrine\ORM\EntityRepository;

use AppBundle\Entity\ArticleCategory;

use Core\Exception\MissingParamsException;
use Core\Exception\MissingEntityException;

class CategoryProvider
{
    public function save(Article $article)
    {
        $this->getEntityManager()->persist($article);
        $this->getEntityManager()->flush();
    }

    public function delete(Article $article)
    {
        $this->getEntityManager()->remove($article);
        $this->getEntityManager()->flush();
    }

    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCategories()
    {
        $categories = $this->repository->getCategories();

        if (empty($categories)) {
            throw new MissingEntityException();
        }

        return $categories;
    }

     public function getCategoryArticles($category)
     {
         $articles = $this->repository->getCategoryArticles($category);

         return $articles;
     }
}
