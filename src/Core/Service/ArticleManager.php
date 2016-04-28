<?php

namespace Core\Service;

use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleCategory;
use Core\Helpers\Utilities;
use Core\Repository\ArticleCategoryRepository;
use Core\Repository\ArticleRepository;
use Core\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;

class ArticleManager extends AbstractManager
{

    /**
     * @var ArticleCategoryRepository
     */
    private $categoryRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ArticleRepository $articleRepository, ArticleCategoryRepository $categoryRepository, UserRepository $userRepository)
    {
        parent::__construct($articleRepository);

        $this->categoryRepository = $categoryRepository;
        $this->userRepository = $userRepository;
    }

    public function create(Request $request)
    {
        $fields = $this->getHydrationMap($request);

        $entity = new Article();

        if (!isset($fields['creation_date'])) {
            $entity->setCreationDate(new \DateTime());
        }

//        $entity = $this->beforeHydration($entity, $fields);

        $entity = $this->hydrate($entity, $fields);

        if ($idArticleCategory = $request->request->get('id_article_category')) {
            $categoryEntity = $this->categoryRepository->find($idArticleCategory);

            $entity->setCategory($categoryEntity);
        }

        if ($idAuthor = $request->request->get('id_author')) {
            $userEntity = $this->userRepository->find($idAuthor);

            $entity->setAuthor($userEntity);
        }

        $this->entityRepository->save($entity);

        return $entity;
    }

    protected function afterHydration($entity, $fields)
    {
        return $entity;
    }

    public function edit(Request $request, $id)
    {
        $entity = parent::edit($request, $id);

        if ($idArticleCategory = $request->request->get('id_article_category')) {
            $categoryEntity = $this->categoryRepository->find($idArticleCategory);

            $entity->setCategory($categoryEntity);
        }

        if ($idAuthor = $request->request->get('id_author')) {
            $userEntity = $this->userRepository->find($idAuthor);

            $entity->setAuthor($userEntity);
        }
        return $entity;
    }

    protected function getHydrationMap(Request $request)
    {
        $fields = $this->prepareHydrationMap($request);

        if (!isset($fields['setSlug']) && isset($fields['setTitle'])) {
            $fields['setSlug'] = Utilities::slugify($fields['setTitle']);
        }

        return $fields;
    }


}
