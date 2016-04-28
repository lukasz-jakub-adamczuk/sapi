<?php

namespace Core\Service;

use AppBundle\Entity\News;
use Core\Helpers\Utilities;
use Core\Repository\NewsRepository;
use Symfony\Component\HttpFoundation\Request;

class NewsManager extends AbstractManager
{
    public function __construct(NewsRepository $newsRepository)
    {
        parent::__construct($newsRepository);
    }

    public function create(Request $request)
    {
        $fields = $this->getHydrationMap($request);

        $entity = new News();

        if (!isset($fields['creation_date'])) {
            $entity->setCreationDate(new \DateTime());
        }

        $entity = $this->hydrate($entity, $fields);

        $this->entityRepository->save($entity);

        return $entity;
    }

    protected function getHydrationMap(Request $request)
    {
        $fields = $this->prepareHydrationMap($request);

        if (!isset($fields['setSlug']) && isset($fields['setTitle'])) {
            $fields['setSlug'] = Utilities::slugify($fields['setTitle']);
        }

        return $fields;
    }
}
