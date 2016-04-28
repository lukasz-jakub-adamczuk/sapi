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
        $categoryRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');
        $categories = $categoryRepository->findAll();

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
//        echo $category;
        $categoryRepository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');
        $categoryEntity = $categoryRepository->find(['slug' => $category]);
//        print_r($categoryEntity);
//        $articles = $categoryEntity->getArticles();
        $articles = $category;

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    public function postCategoryAction(Request $request)
    {
//        $news = $this->get('core.manager.news')->create($request);

        $name = $request->request->get('name');
        $slug = Utilities::slugify($name);

        $em = $this->getDoctrine()->getEntityManager();



        $category = new ArticleCategory();
        $category->setName($name);
        $category->setSlug($slug);
        $category->setAbbr('');

        $em->persist($category);
        $em->flush();

        $view = $this->view($category, 201);

        return $this->handleView($view);
    }

//    public function putNewsAction(Request $request, $id)
//    {
//        $news = $this->get('core.manager.news')->edit($request, $id);
//
//        $view = $this->view($news, 200);
//
//        return $this->handleView($view);
//    }
//
//    public function deleteNewsAction($id)
//    {
//        $this->get('core.manager.news')->delete($id);
//
//        $view = $this->view([], 204);
//
//        return $this->handleView($view);
//    }
}
