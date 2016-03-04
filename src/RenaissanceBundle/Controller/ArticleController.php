<?php

namespace RenaissanceBundle\Controller;

use Core\Exception\MissingParamsException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// imports for indexAction
// use AppBundle\Entity\News;
use AppBundle\Entity\ArticleCategory;
use AppBundle\Entity\Article;

use AppBundle\Entity\ArticleRepository;

// imports for CategoryAction


// imports for showAction
// use Doctrine\DBAL\Connection;
// use Symfony\Component\HttpFoundation\Request;
use Core\Service\ArticleProvider;


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

        $articles = (new ArticleProvider($repository))->getList($slug); // TODO: try catch clause

        return $this->render('RenaissanceBundle:Article:category.html.twig', array(
            'articles' => $articles
        ));
    }

    public function showAction($category, $slug)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $entityManager->getRepository('AppBundle:ArticleCategory');

        try {
            $articleProvider = new ArticleProvider($repository);
            $article = $articleProvider->get($category, $slug); // TODO: try catch clause
        } catch (MissingParamsException $e) {
            $this->addFlash('error', 'Missing parameter');
            $this->redirectTo('/');
        }

        // how to use flashbag: http://symfony.com/doc/current/book/controller.html#flash-messages

        return $this->render('RenaissanceBundle:Article:show.html.twig', array(
            'article' => $article,
        ));
    }

}
