<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use Core\Service\ArticleChanger;
use Core\Service\ArticleProvider;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends FOSRestController
{
    public function getArticlesAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $offset = $request->query->get('offset', 10);

        $page = $page < 1 ? 0 : $page-1;

        $queryBuilder = $this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('a.title, a.idArticle, a.idArticleCategory')
            ->from('AppBundle:Article', 'a')
            ->orderBy('a.creationDate', 'DESC')
            ->setFirstResult($page * $offset)
            ->setMaxResults($offset);

        $query = $queryBuilder->getQuery();
        if ($query) {
            $articles = $query->getArrayResult();
        }

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    public function getArticleAction($id)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $articleChanger = new ArticleChanger($entityManager);
        $article = $articleChanger->find($id);

        $view = $this->view($article, 200);

        return $this->handleView($view);
    }

    public function postArticlesAction(Request $request)
    {
//        $entityManager = $this->get('doctrine.orm.entity_manager');
//
//        $articleChanger = new ArticleChanger($entityManager);
//        $article = $articleChanger->create($request);
        $article = $this->get('core.manager.article')->create($request);

        $view = $this->view($article, 201);

        return $this->handleView($view);
    }

    public function putArticleAction(Request $request, $id)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $articleChanger = new ArticleChanger($entityManager);
        $article = $articleChanger->edit($request, $id);

        $view = $this->view($article, 200);

        return $this->handleView($view);
    }

    public function deleteArticleAction($id)
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $articleChanger = new ArticleChanger($entityManager);
        $articleChanger->delete($id);

        $view = $this->view([], 204);

        return $this->handleView($view);
    }

    public function getCategoryArticlesAction($category)
    {
        $entityManager = $this->getDoctrine()->getEntityManager();

        $articleProvider = new ArticleProvider($entityManager);

        $articles = $articleProvider->getArticlesByCategory($category);

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    public function getCategoryArticleAction($category, $slug)
    {
        $entityManager = $this->getDoctrine()->getEntityManager();

        $articleProvider = new ArticleProvider($entityManager);

        $article = $articleProvider->get($category, $slug);

        $view = $this->view($article, 200);

        return $this->handleView($view);
    }

    public function postCategoryArticlesAction(Request $request, $category)
    {
        $entityManager = $this->getDoctrine()->getEntityManager();
        $repository = $entityManager->getRepository('AppBundle:ArticleCategory');

        $categoryEntity = $repository->findOneBy(['slug' => $category]);

        $title = $request->request->get('title');
        $slug = $request->request->get('slug');

        $number = random_int(1, 100);

        $article = new Article();

        // id_article_category, id_article_template, id_author, title, slug, old_url, markup, markdown, creation_date,
        // modification_date, rated, sum, views, idx, verified, visible, deleted
        $article->setCategory($categoryEntity);
//        $article->setIdArticleTemplate(null);
        $article->setIdAuthor(140);
        $article->setTitle($title . ' ' . $number);
        $article->setSlug($slug . ' ' . $number);

        $article->setMarkup('ot bedzie długi tekst o pisaniu api po zmianie...');
        $article->setCreationDate(new \DateTime());
//        $article->setModificationDate();
//        $article->setRated();
//        $article->getSum();


        $entityManager->persist($article);
        $entityManager->flush();

        $view = $this->view($article, 201);

        return $this->handleView($view);

    }
}
