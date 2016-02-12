<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\News;
use AppBundle\Entity\ArticleCategory;

use Doctrine\ORM\Tools\Pagination\Paginator;

class NewsController extends Controller
{
    /**
     * @Route("/news", name="news-index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $entityManager->getRepository(News::class);

        $news = $repository->findAll();


        // $dql = "SELECT n FROM AppBundle:News n";
        // $query = $entityManager->createQuery($dql)
        //                        ->setFirstResult(0)
        //                        ->setMaxResults(20);

        // $news2 = new Paginator($query);

        return $this->render(
            'news/index.html.twig',
            [
                'news' => $news,
                'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            ]
        );
    }

    /**
     * @Route("/news/{id}", name="news-show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $news = $this->getDoctrine()
            ->getRepository('AppBundle:News')
            ->find($id);

        if (!$news) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return $this->render(
            'news/show.html.twig',
            [
                'news' => $news,
                'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            ]
        );
    }

    /**
     * @Route("/news", name="news-create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $fields = $request->request->all();

        $news = new News();

        $news->setTitle($fields['title']);
        $news->setSlug($fields['slug']);
        $news->setIdAuthor(140);

        $entityManager->persist($news);
        $entityManager->flush();

        // print_r($result);


        $news = [
            'title' => $fields['title']
        ];
        // $this->getDoctrine()
        //     ->getRepository('AppBundle:News')
        //     ->find($id);
        // $repository = $entityManager->getRepository(News::class);

        // $result = $repository->find();

        // create a JSON-response with a 200 status code
        $response = new Response(json_encode($news));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/news/{id}")
     * @Method("PUT")
     */
    public function editAction($id, Request $request)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $fields = $request->request->all();

        $repository = $entityManager->getRepository(News::class);
        $news = $repository->find($id);

        $news->setTitle($fields['title']);
        $news->setSlug($fields['slug']);
        $news->setMarkup($fields['markup']);
        $news->setMarkdown($fields['markdown']);

        $entityManager->persist($news);
        $entityManager->flush();

        $news = [
            'title' => $fields['title']
        ];
        
        // create a JSON-response with a 200 status code
        $response = new Response(json_encode($news));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/news/{id}")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $entityManager->getRepository(News::class);
        $news = $repository->find($id);

        if (!$news) {
            throw $this->createNotFoundException('No news found');
        }

        $entityManager->remove($news);
        $entityManager->flush();
        
        // create a JSON-response with a 200 status code
        // $response = new Response(json_encode($news));
        // $response->headers->set('Content-Type', 'application/json');

        // return $response;

        return new Response(
            json_encode(null),
            204,
            ['Content-Type' => 'application/json']
        );
    }
}
