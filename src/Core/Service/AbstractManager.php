<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 19/04/16
 * Time: 17:57
 */

namespace Core\Service;

use Core\Exception\MissingEntityException;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractManager
{
    use HydrationTrait;
    /**
     * @var EntityRepository
     */
    protected $entityRepository;

    /**
     * AbstractManager constructor.
     * @param EntityRepository $entityRepository
     */
    public function __construct(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;
    }

    public function find($id)
    {
        $entity = $this->entityRepository->find($id);

        if (!$entity) {
            throw new MissingEntityException();
        }

        return $entity;
    }

    public function edit(Request $request, $id)
    {
        $fields = $this->getHydrationMap($request);

        $entity = $this->find($id);

        if (isset($fields['modification_date'])) {
            $modificationDate = new \DateTime($fields['modification_date']);
        } else {
            $modificationDate = new \DateTime();
        }
        $entity->setModificationDate($modificationDate);

//        $entity = $this->beforeHydration($entity, $fields);

        $entity = $this->hydrate($entity, $fields);

//        $entity = $this->afterHydration($entity, $fields);

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

    protected function beforeHydration($entity, $fields)
    {
        // ready to override
        return $entity;
    }

    protected function afterHydration($entity, $fields)
    {
        // ready to override
        return $entity;
    }
}
