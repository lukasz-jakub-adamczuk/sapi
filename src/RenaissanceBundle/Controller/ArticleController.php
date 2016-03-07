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
// use Doctrine\DBAL\Connection;
// use Symfony\Component\HttpFoundation\Request;
use Core\Service\ArticleProvider;
use Core\Service\ArticleCategoryProvider;


class ArticleController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:ArticleCategory');

        // $categories = $repository->findAll();
        $articleCategoryProvider = new ArticleCategoryProvider($repository);
        $categories = $articleCategoryProvider->getAll();

        return $this->render('RenaissanceBundle:Article:index.html.twig', [
            'categories' => $categories
        ]);
    }

    public function categoryAction($category)
    {
        $slug = $category;

        // ArticleCategoryListProvider

        
        // $repository = $this->getDoctrine()->getRepository('AppBundle:ArticleCategory');

        // $categoryRepo = $repository->findOneBy(['slug' => $slug]);
        // // $categoryRepo = $repository->findOneBySlug($slug);

        // $articles = $categoryRepo->getArticles();

        $repository = $this->getDoctrine()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);
        $articles = $articleProvider->getArticles($category);

        return $this->render('RenaissanceBundle:Article:category.html.twig', array(
            'articles' => $articles
        ));
    }

    public function showAction($category, $slug)
    {
        /*$repository = $this->getDoctrine()->getRepository('AppBundle:ArticleCategory');

        // 1st way
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
        }*/

        // 2nd way
        /*$queryBuilder = $this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('a')
            ->from('AppBundle:Article', 'a')
            ->innerJoin('a.category', 'ac')
            ->where('ac.slug=:category_slug', 'a.slug=:article_slug')
            ->setParameter(':category_slug', $category)
            ->setParameter(':article_slug', $slug);

        $article = $queryBuilder->getQuery()->getSingleResult();*/

        // 3rd way
        // $entityManager = $this->get('doctrine.orm.entity_manager');

        // $repository = $entityManager->getRepository('AppBundle:ArticleCategory');

        // $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $this->getDoctrine()->getRepository('AppBundle:ArticleCategory');


        $articleProvider = new ArticleProvider($repository);
        $article = $articleProvider->get($category, $slug);

        return $this->render('RenaissanceBundle:Article:show.html.twig', array(
            'article' => $article,
        ));
    }

}
