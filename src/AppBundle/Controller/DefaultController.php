<?php

namespace AppBundle\Controller;

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
        $entityManager = $this->get('doctrine.orm.entity_manager');

        // $article = new Advertiser();
        // $advertiser->setName('Test');
        // $advertiser->setInstagramusername('XYZ');

        // $entityManager->persist($advertiser);
        // $entityManager->flush();

        $repository = $entityManager->getRepository(ArticleCategory::class);

        // print_r($repository);

        $categories = $repository->findAll();

        // print_r($cats);

        // $advertiserWithId123 = $repository->find('123');

        // $advertiserWithId123->setName('Test123456');

        // $entityManager->persist($advertiserWithId123);
        // $entityManager->flush();
        return $this->render(
            // 'article/recent_list.html.twig',
            'default/index.html.twig',
            [
                'categories' => $categories,
                'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
            ]
        );

        // replace this example code with whatever you need
        // return $this->render('default/index.html.twig', [
        //     'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        // ]);
    }
}
