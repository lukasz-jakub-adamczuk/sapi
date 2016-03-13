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

    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:News');

        $news = $repository->findOneBy(['idNews' => $id]);
        // $news = $repository->findOneByIdNews($id);

        return $this->render('RenaissanceBundle:News:show.html.twig', [
            'news' => $news
        ]);
    }

}
