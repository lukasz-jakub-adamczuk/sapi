<?php

namespace Core\Service;

use AppBundle\Entity\News;
use Core\Helpers\Utilities;
use Core\Repository\NewsRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class NewsChanger
{
    use HydrationTrait;
    /**
     * @var NewsRepository
     */
    private $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function create(Request $request)
    {
        $fields = $this->getHydrationMap($request);

        $news = new News();

        // setCreationDate if not set
        if (!isset($fields['creation_date'])) {
            $news->setCreationDate(new \DateTime());
        }

        $news = $this->hydrate($news, $fields);

        $this->newsRepository->save($news);

        return $news;
    }

    public function edit(Request $request, $id)
    {
        $fields = $this->getHydrationMap($request);

        $news = $this->find($id);

        // setModificationDate if not set
        if (!isset($fields['modification_date'])) {
            $news->setModificationDate(new \DateTime());
        }

        $news = $this->hydrate($news, $fields);

        $this->newsRepository->save($news);

        return $news;
    }

    public function delete($id)
    {
        $news = $this->find($id);

//        $this->newsRepository->delete($news);

        return $news;
    }

    private function find($id)
    {
        $news = $this-$this->newsRepository->find($id);

        if (!$news) {
            throw $this->createNotFoundException('No news found');
        }

        return $news;
    }

    private function getHydrationMap(Request $request)
    {
        $fields = $this->prepareHydrationMap($request);

        if (!isset($fields['setSlug'])) {
            $fields['setSlug'] = Utilities::slugify($fields['setTitle']);
        }

        return $fields;
    }
}
