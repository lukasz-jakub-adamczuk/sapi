<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 23/03/16
 * Time: 21:35
 */

namespace AppBundle\Controller;

//use AppBundle\AppBundle;
use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleCategory;
use AppBundle\Entity\News;
use Core\Service\ArticleProvider;
use Core\Service\ArticleCategoryProvider;
use FOS\RestBundle\Controller\FOSRestController;
//use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends FOSRestController
{
    // news endpoints
    //public function getNewsAction($year = null, $month = null, $day = null, $slug = null, $mode = null)
    public function getNewsAction(Request $request)
    {
        $mode = $request->get('mode');
        $year = $request->get('year');
        $month = $request->get('month');
        $day = $request->get('day');

        if ($mode == 'archive') {
            $news = $this->get('renaissance.service.news')->getArchive();
        } elseif ($year) {
            $news = $this->get('renaissance.service.news')->getArchiveByYear($year);
        } elseif ($year && $month) {
            $news = $this->get('renaissance.service.news')->getArchiveByYearAndMonth($year, $month);
        } elseif ($year && $month && $day && $slug) {
            $news = $this->get('renaissance.service.news')->getNews($year, $month, $day, $slug);
        } else {
            $news = $this->get('renaissance.service.news')->getNewsLatest();
        }

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }

    public function postNewsAction()
    {
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $news = new News();
        $news->setTitle('Test');
        $news->setSlug('test');
        $news->setMarkup('ot bedzie długi tekst o pisanie na komputerze...');
        $news->setIdAuthor(140);

        $entityManager->persist($news);
        $entityManager->flush();

        $view = $this->view($news, 201);

        return $this->handleView($view);
    }

    /*public function getNewAction($id)
    {
        $news = $this->get('renaissance.service.news')->getArchiveByYear($year);

        $view = $this->view($news, 200);

        return $this->handleView($view);
    }*/

    // article endpoints
    public function getArticlecategoriesAction()
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleCategoryProvider = new ArticleCategoryProvider($repository);

        $categories = $articleCategoryProvider->getAll();

        $view = $this->view($categories, 200);

        return $this->handleView($view);
    }

    public function getArticlecategoriesArticlesAction($category)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);

        $articles = $articleProvider->getArticles($category);

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    public function getArticlecategoriesArticleAction($category, $slug)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);

        $article = $articleProvider->get($category, $slug);

        $view = $this->view($article, 200);

//        var_dump(get_class($article));die;
//        $view->setSerializationContext(SerializationContext::create()->setGroups(['list']));

//        $view->setSerializationContext(SerializationContext::create());

        return $this->handleView($view);
    }



    public function postArticlecategoriesAction()
    {
        $entityManager = $this->getDoctrine()->getEntityManager();
        $repository = $entityManager->getRepository('AppBundle:ArticleCategory');

        $number = random_int(1, 100);

        $category = new ArticleCategory();

//        name, slug, abbr, creation_date, modification_date, idx, se, visible, deleted
        $category->setName('Nowa kategoria dla api ' . $number);
        $category->setSlug('nowa-kategoria-dla-api-' . $number);
        $category->setAbbr('nkda' . $number);
//        $category->setCreationDate();
        $category->setIdx('0');

        $entityManager->persist($category);
        $entityManager->flush();

        $view = $this->view($category, 201);

        return $this->handleView($view);
    }





    public function getCategoryArticlesAction($category)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);

        $articles = $articleProvider->getArticles($category);

        $view = $this->view($articles, 200);

        return $this->handleView($view);
    }

    public function getCategoryArticleAction($category, $slug)
    {
        $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:ArticleCategory');

        $articleProvider = new ArticleProvider($repository);

        $article = $articleProvider->get($category, $slug);

        $view = $this->view($article, 200);

        return $this->handleView($view);
    }

    public function postCategoryArticlesAction(Request $request, $category)
    {
        $entityManager = $this->getDoctrine()->getEntityManager();
        $repository = $entityManager->getRepository('AppBundle:ArticleCategory');

        $categoryEntity = $repository->findOneBy(['slug' => $category]);

//        $category = new ArticleCategory();
//        print_r($category);

        $title = $request->request->get('title');
        $slug = $request->request->get('slug');

        $number = random_int(1, 100);

        $article = new Article();

        //id_article_category, id_article_template, id_author, title, slug, old_url, markup, markdown, creation_date,
        // modification_date, rated, sum, views, idx, verified, visible, deleted) VALUES
        // (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)' with params
        // [null, null, 2, \"Test artykulu 17\", \"test-artykulu-17\", null, \"To bedzie d\\u0142ugi artykul...\", null, null, null, \"0\", \"0\", \"0\", \"0\", \"0\", \"1\", \"0\"]:\n\nSQLSTATE[23000]: Integrity constraint violation: 1048 Column 'id_article_category' cannot be null",
        //$article->setIdArticleCategory(86);
        $article->setCategory($categoryEntity);

//        $article->setIdArticleTemplate(null);
        $article->setIdAuthor(140);
        $article->setTitle($title . $number);
        $article->setSlug($slug . $number);
        $article->setMarkup('<p>To bedzie długi artykul...</p>');
        $article->setMarkup('To bedzie długi artykul...');
        $article->setCreationDate(new \DateTime());
//        $article->setModificationDate();
//        $article->setRated();
//        $article->getSum();

//        print_r($article);

//        $article->setIdArticleCategory(86);
//        $article->setIdArticleTemplate(1);

        $entityManager->persist($article);
        $entityManager->flush();

        $view = $this->view($article, 201);

        return $this->handleView($view);
    }

    public function putCategoryArticleAction(Request $request, $category, $id)
    {
        $entityManager = $this->getDoctrine()->getEntityManager();
        $repository = $entityManager->getRepository('AppBundle:Article');

//        $categoryEntity = $repository->findOneBy(['slug' => $category]);

        $number = random_int(1, 100);

        $article = $repository->find($id);

//        $category = new ArticleCategory();
//        print_r($category);

        $title = $request->request->get('title');
        $slug = $request->request->get('slug');

//        $article = new Article($id);

        $article->setTitle($title . ' po zmianie' . $number);
        $article->setSlug($slug . '-po-zmienie-' . $number);
        $article->setMarkup('ot bedzie długi tekst o pisaniu api po zmianie...');
//        $article->setIdAuthor(140);
//        $article->setIdArticleCategory(1);

        $entityManager->persist($article);
        $entityManager->flush();

        $view = $this->view($article, 200);

        return $this->handleView($view);
    }

    public function deleteArticlecategoriesArticleAction($id)
    {
//        $this->get('core.service.article')->get($category, $slug);
//
//        $this->get('core.service.article')->;

        $entityManager = $this->getDoctrine()->getEntityManager();
        $repository = $entityManager->getRepository('AppBundle:Article');

        $article = $repository->find($id);

        if (is_null($article)) {
            throw $this->createNotFoundException('404 Not Found');
        }

        $entityManager->remove($article);
        $entityManager->flush();

        $view = $this->view([], 204);

        return $this->handleView($view);
    }
}
