<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\News;
use AppBundle\Entity\ArticleCategory;

use Doctrine\ORM\Tools\Pagination\Paginator;

class NewsController extends Controller
{
    /**
     * @Route("/news", name="news-index")
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
     */
    public function createAction()
    {
        $news = $this->getDoctrine()
            ->getRepository('AppBundle:News')
            ->find($id);

        return $this->render(
            'news/show.html.twig',
            [
                'news' => $news,
                'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            ]
        );
    }
}
