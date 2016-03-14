<?php

namespace RenaissanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\News;

class NewsController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:News');

        $news = $repository->findAll();

        return $this->render('RenaissanceBundle:News:index.html.twig', [
            'news' => $news
        ]);
    }

    public function showAction($year, $month, $day, $title)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:News');

        $date = implode('-', [$year, $month, $day]);
        // echo $date;

        $criteria = [
            // 'idNews' => 1
            // 'creationDate' => implode('-', [$year, $month, $day]),
            // 'creationDate' => new \DateTime($date),
            'slug' => $title
        ];

        $news = $repository->findOneBy($criteria);
        // $news = $repository->findOneByIdNews($id);

        return $this->render('RenaissanceBundle:News:show.html.twig', [
            'news' => $news
        ]);
    }

}
