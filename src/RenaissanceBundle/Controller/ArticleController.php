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
    public function IndexAction()
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $entityManager->getRepository(ArticleCategory::class);

        $articleCategories = $repository->findAll();


        // $dql = "SELECT n FROM AppBundle:News n";
        // $query = $entityManager->createQuery($dql)
        //                        ->setFirstResult(0)
        //                        ->setMaxResults(20);

        // $news2 = new Paginator($query);

        // return $this->render(
        //     'news/index.html.twig',
        //     [
        //         'news' => $news,
        //         'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        //     ]
        // );

        return $this->render('RenaissanceBundle:Article:index.html.twig', array(
            'categories' => $articleCategories
        ));
    }

    public function CategoryAction($category)
    {
        // $req = new Request();
        // $db = new Connection();

        // $category = $req->get('category', false);

        // $sql = 'SELECT a.id_article, a.title, a.slug, a.creation_date, ac.slug AS category 
        //         FROM article a 
        //         LEFT JOIN article_category ac ON(ac.id_article_category=a.id_article_category)';

        // $whereParts = [];

        // if ($category) {
        //     $whereParts[] = sprintf('ac.slug="%s"', $category);

        //     $sql .= ' WHERE ' . implode(' AND ', $whereParts);
        // } else {
        //     $sql .= ' LIMIT 0,25';
        // }

        // $articles = $db->fetchAll($sql);

        $entityManager = $this->get('doctrine.orm.entity_manager');

        // $repository = $entityManager->getRepository(Article::class);
        $repository = $entityManager->getRepository('AppBundle:Article');

        // $articles = $repository->findByIdUser('140');
        $articles = $repository->findAll();
        // $articles = $repository->findOneByIdJoinedToCategory($category);


        $em = $this->get('doctrine.orm.entity_manager');

        $query = $em->createQuery('SELECT a, ac FROM AppBundle:Article a JOIN a.id_article_category ac');
        $articles2 = $query->getResult();

        return $this->render('RenaissanceBundle:Article:category.html.twig', array(
            'articles' => $articles2
        ));
    }

    public function ShowAction($category, $slug)
    {
        // $category = $req->get('category', false);
        // $slug = $req->get('slug', false);

        // if (empty($category) || empty($slug)) {
        //     throw new SquarezoneException();
        // }

        // $sql = 'SELECT a.*, ac.slug AS category 
        //         FROM article a 
        //         LEFT JOIN article_category ac ON(ac.id_article_category=a.id_article_category) 
        //         WHERE ac.slug="%s" AND a.slug="%s"';

        // $sql = sprintf($sql, $category, $slug);

        // $whereParts = [];

        // $whereParts[] = sprintf('ac.slug="%s"', $category);
        // $whereParts[] = sprintf('a.slug="%s"', $slug);

        // $sql .= ' WHERE ' . implode(' AND ', $whereParts);

        // if ($result = $db->fetchAssoc($sql)) {
        //     return $result;
        // }
        // return false;
        $id = 6;

        $article = $this->getDoctrine()
            ->getRepository('AppBundle:Article')
            // ->findOneByIdJoinedToCategory($s);
            ->findById($id);


        if (!$article) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        print_r($article);

        // return $this->render(
        //     'news/show.html.twig',
        //     [
        //         'news' => $news,
        //         'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        //     ]
        // );

        return $this->render('RenaissanceBundle:Article:show.html.twig', array(
            'article' => $article,
        ));
    }

}
