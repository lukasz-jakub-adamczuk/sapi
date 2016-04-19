<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 19/04/16
 * Time: 17:57
 */

namespace Core\Service;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractManager
{
    use HydrationTrait;
    /**
     * @var EntityRepository
     */
    protected $entityRepository;

    public function __construct(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    public function find($id)
    {
        $entity = $this->entityRepository->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No news found');
        }

        return $entity;
    }

    public function edit(Request $request, $id)
    {
        $fields = $this->getHydrationMap($request);

        $entity = $this->find($id);

        // setModificationDate if not set
        if (!isset($fields['modification_date'])) {
            $entity->setModificationDate(new \DateTime());
        }

        $entity = $this->hydrate($entity, $fields);

        $this->entityRepository->save($entity);

        return $entity;
    }

    public function delete($id)
    {
        $entity = $this->find($id);

        $this->entityRepository->delete($entity);

        return $entity;
    }

    protected function getHydrationMap(Request $request)
    {
        // ready to override
    }
}
