<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends FOSRestController
{
    public function getNewsAction() {} # GET /api/v1/news.json
    public function postNewsAction() {} # POST /api/v1/news.json

    public function deleteNewsAction($id) {} # DELETE /api/v1/news/{id}.json

    # GET /api/v1/categories/{category-slug}/articles.json
    public function getCategoriesArticlesAction($categorySlug) {}

    # DELETE /api/v1/categories/{category-slug}/articles/{id}.json
    public function deleteCategoriesArticlesAction(Request $request, $categorySlug, $id) {}

    public function getCategoriesAction() # GET /api/v1/categories.json
    {
        $view = $this->view([
            'foo' => 'bar',
        ], 200);

        return $this->handleView($view);
    }

    public function getArticlesAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Article');

        $articles = $repository->findAll();

        $view = $this->view($articles, 200);
        $view->setSerializationContext(SerializationContext::create()->setGroups(['list']));

        return $this->handleView($view);
    }
}
