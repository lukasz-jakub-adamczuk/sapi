<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\News;
use AppBundle\Entity\ArticleCategory;

use Doctrine\ORM\Tools\Pagination\Paginator;

class NewsController extends FOSRestController
{
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

    public function postNewsAction(Request $request)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $title = $request->request->get('title');
        $slug = $request->request->get('slug');

        $number = random_int(1, 100);

        $news = new News();
        $news->setTitle($title . ' ' . $number);
        $news->setSlug($slug . ' ' . $number);
        $news->setMarkup('To bedzie nasz news z API dodadny...');
        $news->setIdAuthor(140);

        $entityManager->persist($news);
        $entityManager->flush();

        $view = $this->view($news, 201);

        return $this->handleView($view);
    }

    public function putNewsAction(Request $request, $id)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $title = $request->request->get('title');
        $slug = $request->request->get('slug');

        $number = random_int(1, 100);

        $news = new News();
        $news->setTitle($title . ' ' . $number);
        $news->setSlug($slug . ' ' . $number);
        $news->setMarkup('To bedzie nasz news z API dodadny...');
        $news->setIdAuthor(140);

        $entityManager->persist($news);
        $entityManager->flush();

        $view = $this->view($news, 201);

        return $this->handleView($view);
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
