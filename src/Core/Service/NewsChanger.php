<?php

namespace Core\Service;

use AppBundle\Entity\News;
use Core\Helpers\Utilities;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class NewsChanger
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(Request $request)
    {
        $fields = $this->prepare($request);

        $news = new News();

        // setCreationDate if not set
        if (!isset($fields['creation_date'])) {
            $news->setCreationDate(new \DateTime());
        }

        $news = $this->set($news, $fields);

        $this->entityManager->persist($news);
        $this->entityManager->flush();

        return $news;
    }

    public function edit(Request $request, $id)
    {
        $fields = $this->prepare($request);

        $news = $this->find($id);

        // setModificationDate if not set
        if (!isset($fields['modification_date'])) {
            $news->setModificationDate(new \DateTime());
        }

        $news = $this->set($news, $fields);

        $this->entityManager->persist($news);
        $this->entityManager->flush();

        return $news;
    }

    public function delete($id)
    {
        $news = $this->find($id);

        return $news;
    }

    private function find($id)
    {
        $repository = $this->entityManager->getRepository('AppBundle:News');
        $news = $repository->find($id);

        if (!$news) {
            throw $this->createNotFoundException('No news found');
        }

        return $news;
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

    public function set($news, $fields)
    {
        // if creation
        foreach ($fields as $method => $arg) {
            $news->$method($arg);
        }

        return $news;
    }
}
