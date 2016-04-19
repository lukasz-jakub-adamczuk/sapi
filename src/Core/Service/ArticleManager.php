<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 18/04/16
 * Time: 20:28
 */

namespace Core\Service;

use AppBundle\Entity\Article;
use Core\Helpers\Utilities;
use Core\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;

class ArticleManager extends AbstractManager
{

    public function __construct(ArticleRepository $articleRepository)
    {
        parent::__construct($articleRepository);
    }

    public function create(Request $request)
    {
        $fields = $this->getHydrationMap($request);

        $entity = new Article();

        // setCreationDate if not set
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

        if (!isset($fields['setSlug'])) {
            $fields['setSlug'] = Utilities::slugify($fields['setTitle']);
        }

        return $fields;
    }
}
