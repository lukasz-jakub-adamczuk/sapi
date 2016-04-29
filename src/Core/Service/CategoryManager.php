<?php

namespace Core\Service;

use AppBundle\Entity\ArticleCategory;
use Core\Exception\MissingParamsException;
use Core\Helpers\Utilities;
use Core\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

class CategoryManager extends AbstractManager
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct($categoryRepository);
    }

    public function create(Request $request)
    {
        $fields = $this->prepareParams($request);

        $this->validateParams($fields);

        $entity = new ArticleCategory();

        $entity = $this->hydrate($entity, $fields);

        $this->entityRepository->save($entity);

        return $entity;
    }

    protected function prepareParams(Request $request)
    {
        $fields = $this->convertParams($request);

        if (!isset($fields['slug']) && isset($fields['name'])) {
            $fields['slug'] = Utilities::slugify($fields['name']);
        }

        return $fields;
    }

    protected function validateParams($fields)
    {
        if (empty($fields['name'])) {
            throw new MissingParamsException('Missing name');
        }
        if (empty($fields['abbr'])) {
            throw new MissingParamsException('Missing abbrevation');
        }
    }
}
