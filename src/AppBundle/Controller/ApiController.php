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
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends FOSRestController
{
    // news endpoints
    //public function getNewsAction($year = null, $month = null, $day = null, $slug = null, $mode = null)
    public function getNewsAction(Request $request)
    {
        $mode = $request->get('mode');
        $year = $request->get('year');
        $month = $request->get('month');
        $day = $request->get('day');

        if ($mode == 'archive') {
            $news = $this->get('renaissance.service.news')->getArchive();
        } elseif ($year) {
            $news = $this->get('renaissance.service.news')->getArchiveByYear($year);
        } elseif ($year && $month) {
            $news = $this->get('renaissance.service.news')->getArchiveByYearAndMonth($year, $month);
        } elseif ($year && $month && $day && $slug) {
            $news = $this->get('renaissance.service.news')->getNews($year, $month, $day, $slug);
        } else {
            $news = $this->get('renaissance.service.news')->getNewsLatest();
        }

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    /*public function getNewAction($id)
    {
        $news = $this->get('renaissance.service.news')->getArchiveByYear($year);

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }*/

    // article endpoints
    public function getArticlecategoriesAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleCategoryProvider = new ArticleCategoryProvider($repository);

        $categories = $articleCategoryProvider->getAll();

        $view = $this->view($categories, 200);

        return $this->handleView($view);
    }

    public function getArticlecategoriesArticlesAction($category)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);

        $articles = $articleProvider->getArticles($category);

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    public function getArticlecategoriesArticleAction($category, $slug)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);

        $article = $articleProvider->get($category, $slug);

        $view = $this->view($article, 200);
//        $view->setSerializationContext(SerializationContext::create()->setGroups(['list']));

        $view->setSerializationContext(SerializationContext::create());
        
        return $this->handleView($view);
    }
}