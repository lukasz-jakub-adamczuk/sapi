<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 23/03/16
 * Time: 21:35
 */

namespace AppBundle\Controller;

use Core\Service\ArticleProvider;
use Core\Service\ArticleCategoryProvider;
use FOS\RestBundle\Controller\FOSRestController;

class ApiController extends FOSRestController
{
    public function getTestAction()
    {
        $view = $this->view([
            'foo' => 'bar'
        ], 200);

        return $this->handleView($view);
    }

    public function getArticlesAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articles = $repository->findAll();

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    // news endpoints
    public function getNewsLatestAction()
    {
        $news = $this->get('renaissance.service.news')->getLatestNews();

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    public function getNewsAction()
    {
        $news = $this->get('renaissance.service.news')->getArchive();

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    /*public function getNewsAction($year)
    {
        $news = $this->get('renaissance.service.news')->getArchiveByYear($year);

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }*/

    // article endpoints
    public function getCategoriesAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleCategoryProvider = new ArticleCategoryProvider($repository);

        $categories = $articleCategoryProvider->getAll();

        $view = $this->view($categories, 200);

        return $this->handleView($view);
    }

    public function getCategoriesArticlesAction($slug)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);

        $articles = $articleProvider->getArticles($slug);

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }
/*
    public function getCategoriesArticlesAction($category, $slug)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);

        $article = $articleProvider->get($category, $slug);

        $view = $this->view($article, 200);

        return $this->handleView($view);
    }*/
}