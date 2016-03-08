<?php

namespace Core\Service;

use Doctrine\ORM\EntityRepository;

use AppBundle\Entity\ArticleCategory;

use Core\Exception\MissingParamsException;
use Core\Exception\MissingEntityException;

class ArticleCategoryProvider
{
    private $repository;

    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        $categories = $this->repository->findAll();

        if (empty($categories)) {
            throw new MissingEntityException();
        }

        return $categories;
    }

    // public function get($name)
    // {
    //     if (empty($name)) {
    //         throw new MissingParamsException();
    //     }

    //     return $this->repository->findOneBy(['slug' => $name]);
    // }
}
