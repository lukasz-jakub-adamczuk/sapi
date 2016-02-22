<?php

namespace RenaissanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// imports for indexAction
// use AppBundle\Entity\News;
use AppBundle\Entity\ArticleCategory;
use AppBundle\Entity\Article;

use AppBundle\Entity\ArticleRepository;

// imports for CategoryAction


// imports for showAction
use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;


class ArticleController extends Controller
{
    public function indexAction()
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $entityManager->getRepository('AppBundle:ArticleCategory');

        $articleCategories = $repository->findAll();

        return $this->render('RenaissanceBundle:Article:index.html.twig', [
            'categories' => $articleCategories
        ]);
    }

    public function categoryAction($category)
    {
        $slug = $category;

        
        $repository = $this->getDoctrine()->getRepository('AppBundle:ArticleCategory');

        $categoryRepo = $repository->findOneBy(['slug' => $slug]);
        // $categoryRepo = $repository->findOneBySlug($slug);

        $articles = $categoryRepo->getArticles();

        return $this->render('RenaissanceBundle:Article:category.html.twig', array(
            'articles' => $articles
        ));
    }

    public function showAction($category, $slug)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:ArticleCategory');

        $categoryRepo = $repository->findOneBy(['slug' => $category]);
        // $categoryRepo = $repository->findOneBySlug($slug);

        $articles = $categoryRepo->getArticles();

        // $article = $articles->findOneBy(['title' => $slug]);
        // print_r($articles->getValues());

        // filtering
        foreach ($articles as $item) {
            if ($item->getSlug() == $slug) {
                $article = $item;
            }
        }


        return $this->render('RenaissanceBundle:Article:show.html.twig', array(
            'article' => $article,
        ));
    }

}
