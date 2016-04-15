<?php

namespace AppBundle\Controller;

use AppBundle\Entity\News;
use Core\Service\NewsChanger;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Core\Helpers\Utilities;

class NewsController extends FOSRestController
{
    public function getNewsAction(Request $request)
    {
        $mode   = $request->get('mode');
        $year   = $request->get('year');
        $month  = $request->get('month');
        $day    = $request->get('day');
        $slug   = $request->get('slug');

        if ($year && $month && $day && $slug) {
            $news = $this->get('renaissance.service.news')->getNews($year, $month, $day, $slug);
        } elseif ($year && $month) {
            $news = $this->get('renaissance.service.news')->getArchiveByYearAndMonth($year, $month);
        } elseif ($year) {
            $news = $this->get('renaissance.service.news')->getArchiveByYear($year);
        } elseif ($mode == 'archive') {
            $news = $this->get('renaissance.service.news')->getArchive();
        } else {
            $news = $this->get('renaissance.service.news')->getLatestNews();
        }

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    public function getNewAction($id)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $entityManager->getRepository('AppBundle:News');
        $news = $repository->find($id);

        if (!$news) {
            throw $this->createNotFoundException('No news found');
        }

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    public function postNewsAction(Request $request)
    {
//        $entityManager = $this->get('doctrine.orm.entity_manager');

        $newsRepository = $this->get('core.repository.news');

        $newsChanger = new NewsChanger($newsRepository);
        $news = $newsChanger->create($request);

        $view = $this->view($news, 201);

        return $this->handleView($view);
    }

    public function putNewsAction(Request $request, $id)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $entityManager->getRepository('AppBundle:News');
        $news = $repository->find($id);

        if (!$news) {
            throw $this->createNotFoundException('No news found');
        }

        $newsChanger = new NewsChanger($entityManager);
        $news = $newsChanger->edit($request, $id);

        $view = $this->view($news, 200);
//        $view = $this->view([], 204);

        return $this->handleView($view);
    }

    public function deleteNewsAction($id)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $repository = $entityManager->getRepository('AppBundle:News');
        $news = $repository->find($id);

        if (!$news) {
            throw $this->createNotFoundException('No news found');
        }

        $entityManager->remove($news);
        $entityManager->flush();

        $view = $this->view([], 204);

        return $this->handleView($view);
    }
}
