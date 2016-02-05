<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

class ArticleCreator
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function create(array $fields) {}
}
