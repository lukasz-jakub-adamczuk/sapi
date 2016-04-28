<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

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
            $news = $this->get('core.provider.news')->getNews($year, $month, $day, $slug);
        } elseif ($year && $month) {
            $news = $this->get('core.provider.news')->getArchiveByYearAndMonth($year, $month);
        } elseif ($year) {
            $news = $this->get('core.provider.news')->getArchiveByYear($year);
        } elseif ($mode == 'archive') {
            $news = $this->get('core.provider.news')->getArchive();
        } else {
            $news = $this->get('core.provider.news')->getLatestsNews();
        }

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    public function getNewAction($id)
    {
        $news = $this->get('core.manager.news')->find($id);

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    public function postNewsAction(Request $request)
    {
        $news = $this->get('core.manager.news')->create($request);

        $view = $this->view($news, 201);

        return $this->handleView($view);
    }

    public function putNewsAction(Request $request, $id)
    {
        $news = $this->get('core.manager.news')->edit($request, $id);

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    public function deleteNewsAction($id)
    {
        $this->get('core.manager.news')->delete($id);

        $view = $this->view([], 204);

        return $this->handleView($view);
    }
}
