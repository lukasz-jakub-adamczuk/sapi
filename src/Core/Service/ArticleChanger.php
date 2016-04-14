<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 14/04/16
 * Time: 22:31
 */

namespace Core\Service;


use AppBundle\Entity\Article;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class ArticleChanger
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManger = $entityManager;
    }

    public function create(Request $request)
    {
        $fields = $this->prepare($request);

        $article = new Article();

        // setCreationDate if not set
        if (!isset($fields['creation_date'])) {
            $article->setCreationDate(new \DateTime());
        }

        $article = $this->set($article, $fields);

        $this->entityManager->persist($article);
        $this->entityManager->flush();

        return $article;
    }

    public function edit(Request $request, $id)
    {
        $fields = $this->prepare($request);

        $article = $this->find($id);

        // setModificationDate if not set
        if (!isset($fields['modification_date'])) {
            $article->setModificationDate(new \DateTime());
        }

        $article = $this->set($article, $fields);

        return $article;
    }

    public function delete($id)
    {
        $article = $this->find($id);

        $this->entityManager->remove($article);
        $this->entityManager->flush();
    }

    private function find($id)
    {
        $repository = $this->entityManager->getRepository('AppBundle:Article');
        $article = $repository->find($id);

        if (!$article) {
            throw $this->createNotFoundException('No article found');
        }

        return $article;
    }

    private function prepare(Request $request)
    {
        $fields = [];

        foreach ($request->request->all() as $key => $value) {
            // toCamelCase
            $name = str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            $fields['set' . $name] = $value;
        }

        if (!isset($fields['setSlug'])) {
            $fields['setSlug'] = Utilities::slugify($fields['setTitle']);
        }

        return $fields;
    }

    private function set($article, $fields)
    {
        foreach ($fields as $method => $arg) {
            $article->$method($arg);
        }

        $this->entityManager->persist($article);
        $this->entityManager->flush();

        return $article;
    }
}