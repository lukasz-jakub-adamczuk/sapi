<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 15/04/16
 * Time: 13:46
 */

namespace Core\Repository;


use AppBundle\Entity\News;
use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository
{
    public function save(News $news)
    {
        $this->getEntityManager()->persist($news);
        $this->getEntityManager()->flush();
    }

    public function delete(News $news)
    {
        $this->getEntityManager()->remove($news);
        $this->getEntityManager()->flush();
    }
}