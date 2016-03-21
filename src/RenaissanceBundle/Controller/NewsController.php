<?php

namespace RenaissanceBundle\Controller;

//use Core\Service\NewsProvider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//use AppBundle\Entity\News;

class NewsController extends Controller
{
    public function indexAction()
    {
        $newsProvider = $this->get('renaissance.service.news');

        $news = $newsProvider->getLatestNews();

        return $this->render('RenaissanceBundle:News:index.html.twig', [
            'news' => $news
        ]);
    }

    public function archiveAction()
    {
        $news = $this->get('renaissance.service.news')->getArchive();

        return $this->render('RenaissanceBundle:News:archive.html.twig', [
            'news' => $news
        ]);
    }

    public function archiveByYearAction($year)
    {
        $news = $this->get('renaissance.service.news')->getArchiveByYear($year);

        return $this->render('RenaissanceBundle:News:archiveByYear.html.twig', [
            'news' => $news,
            'params' => [
                'year' => $year
            ]
        ]);
    }

    public function archiveByYearAndMonthAction($year, $month)
    {
        $news = $this->get('renaissance.service.news')->getArchiveByYearAndMonth($year, $month);

        return $this->render('RenaissanceBundle:News:archiveByYearAndMonth.html.twig', [
            'news' => $news,
            'params' => [
                'year' => $year,
                'month' => $month
            ]
        ]);
    }

    public function showAction($year, $month, $day, $title)
    {
        $news = $this->get('renaissance.service.news')->getNews($year, $month, $day, $title);

        if (is_null($news)) {
            throw $this->createNotFoundException('News not found');
        }


        return $this->render('RenaissanceBundle:News:show.html.twig', [
            'news' => $news,
            'params' => [
                'year' => $year,
                'month' => $month,
                'day' => $day,
                'title' => $title
            ]
        ]);
    }

}
