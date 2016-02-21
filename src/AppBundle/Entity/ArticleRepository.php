<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    public function findOneByIdJoinedToCategory($category)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT a, ac FROM AppBundle:Article a
                JOIN a.id_article_category ac
                WHERE ac.slug = :category'
            )
            ->setParameter('category', $category);

        return $query->getSingleResult();
    }
}
