<?php

namespace Core\Service;

use AppBundle\Entity\News;
use Core\Helpers\Utilities;
use Symfony\Component\HttpFoundation\Request;

class NewsCreator
{
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(Request $request)
    {
        $fields = $this->prepare($request);

//        $title = $request->request->get('title');
//        $slug = $request->request->get('slug', Utilities::slugify($title));
//        $markup = $request->request->get('markup');
//        $markdown = $request->request->get('markdown');

        $news = new News();
//        $news->setTitle($title);
//        $news->setSlug($slug);
//        $news->setMarkup($markup);
//        $news->setMarkdown($markdown);
//        $news->setIdAuthor(140);
////        $news->set
//        $news->setCreationDate(new \DateTime());

        $news = $this->set($news, $fields);

        $this->entityManager->persist($news);
        $this->entityManager->flush();

        return $news;
    }

    public function edit(Request $request, $id)
    {
        $fields = $this->prepare($request);

//        $title = $request->request->get('title');
//        $slug = $request->request->get('slug', Utilities::slugify($title));
//        $markup = $request->request->get('markup');
//        $markdown = $request->request->get('markdown');

        $news = $this->find($id);

        $news = $this->set($news, $fields);

//        foreach ($fields as $method => $arg) {
//            $news->$method($arg);
//        }

//        $news->setTitle($title);
//        $news->setSlug($slug);
//        $news->setMarkup($markup);
//        $news->setMarkdown($markdown);
//        $news->setModificationDate(new \DateTime());

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
        foreach ($fields as $method => $arg) {
            $news->$method($arg);
        }

        return $news;
    }
}
