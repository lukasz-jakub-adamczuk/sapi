<?php

namespace Core\Service;

use Doctine\ORM\EntityRepository;

use AppBindle\Entity\ArticleCategory;

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
        return $this->repository->findAll();
    }

    public function get($name)
    {
        if (empty($name)) {
            throw new MissingParamsException();
        }

        return $this->repository->findOneBy(['slug' => $name]);
    }
}
