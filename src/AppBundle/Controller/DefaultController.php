<?php

namespace AppBundle\Controller;

use AppBundle\Service\ArticleCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\ArticleCategory;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $articleCreator = $this->container->get('articleCreator');

        $articleCreator->create([
            // ###
        ]);

        $repository = $entityManager->getRepository(ArticleCategory::class);

        $categories = $repository->findAll();

        return $this->render(
            // 'article/recent_list.html.twig',
            'default/index.html.twig',
            [
                'categories' => $categories,
                'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            ]
        );
    }

    /**
     * @Route("/article-list", name="article_list")
     */
    public function listAction(Request $request)
    {
        $articleList = $this->get('articleProvider')->get();

        return $this->render(); // ....
    }

    /*
     * - zainstalowac phpspeca
     * - przeniesc serwisy do jednego typu zasobu (newsy albo artykuly)
     * - napisac definicje serwisow w polku app/config/services.yml
     */
}
