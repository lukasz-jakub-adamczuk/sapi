<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends FOSRestController
{
    public function getArticlesAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $offset = $request->query->get('offset', 20);

        $articles = $this->get('core.provider.article')->getArticles($page, $offset);

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    public function getArticleAction($id)
    {
        $article = $this->get('core.manager.article')->find($id);

        $view = $this->view($article, 200);

        return $this->handleView($view);
    }

    public function postArticlesAction(Request $request)
    {
        $article = $this->get('core.manager.article')->create($request);

        $view = $this->view($article, 201);

        return $this->handleView($view);
    }

    public function putArticleAction(Request $request, $id)
    {
        $article = $this->get('core.manager.article')->edit($request, $id);

        $view = $this->view($article, 200);

        return $this->handleView($view);
    }

    public function deleteArticleAction($id)
    {
        $this->get('core.manager.article')->delete($id);

        $view = $this->view([], 204);

        return $this->handleView($view);
    }
}
