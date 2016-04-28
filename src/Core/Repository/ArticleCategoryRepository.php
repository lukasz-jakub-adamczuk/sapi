<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 18/04/16
 * Time: 20:31
 */

namespace Core\Repository;

use AppBundle\Entity\Article;
use Doctrine\ORM\EntityRepository;

class ArticleCategoryRepository extends EntityRepository
{
    public function save(Article $article)
    {
        $this->getEntityManager()->persist($article);
        $this->getEntityManager()->flush();
    }

    public function delete(Article $article)
    {
        $this->getEntityManager()->remove($article);
        $this->getEntityManager()->flush();
    }
}
