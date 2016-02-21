<?php

namespace RenaissanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function IndexAction()
    {
        return $this->render('RenaissanceBundle:Article:index.html.twig', array(
            // ...
        ));
    }

    public function ShowAction($slug)
    {
        return $this->render('RenaissanceBundle:Article:show.html.twig', array(
            // ...
        ));
    }

}
