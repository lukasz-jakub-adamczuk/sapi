<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ArticleCategory;
use Core\Helpers\Utilities;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends FOSRestController
{
    public function getCategoriesAction()
    {
        $categories = $this->get('core.provider.category')->getCategories();

        $view = $this->view($categories, 200);

        return $this->handleView($view);
    }

//    public function getCategoryAction($id)
//    {
//        $news = $this->get('core.manager.news')->find($id);
//
//        $view = $this->view($news, 200);
//
//        return $this->handleView($view);
//    }

    public function getCategoryArticlesAction($category)
    {
        $articles = $this->get('core.provider.category')->getCategoryArticles($category);

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    public function postCategoryAction(Request $request)
    {
        $category = $this->get('core.manager.category')->create($request);

        $view = $this->view($category, 201);

        return $this->handleView($view);
    }

    public function putCategoryAction(Request $request, $id)
    {
        $news = $this->get('core.manager.category')->edit($request, $id);

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    public function deleteCategoryAction($id)
    {
        $this->get('core.manager.category')->delete($id);

        $view = $this->view([], 204);

        return $this->handleView($view);
    }
}
