<?php

namespace Core\Service;

use Doctrine\ORM\EntityManager;
//use Doctrine\ORM\EntityRepository;

use AppBundle\Entity\ArticleCategory;

use Core\Exception\MissingParamsException;
use Core\Exception\MissingEntityException;

class ArticleProvider
{
    private $entityManager;

    private $repository;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository('AppBundle:ArticleCategory');
    }

    public function getArticles()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('a')
            ->from('AppBundle:Article', 'a')
            ->orderBy('a.creationDate', 'DESC')
            ->setFirstResult(0)
            ->setMaxResults(20);

        $query = $queryBuilder->getQuery();
        if ($query) {
            $articles = $query->getArrayResult();

            return $articles;
        }
        return [];
    }

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
    }
}
