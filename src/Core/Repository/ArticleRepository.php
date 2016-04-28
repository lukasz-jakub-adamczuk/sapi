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

class ArticleRepository extends EntityRepository
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

    public function getArticles($page, $offset)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('a.title, a.idArticle, a.idArticleCategory')
            ->from('AppBundle:Article', 'a')
            ->orderBy('a.creationDate', 'DESC')
            ->setFirstResult($page * $offset)
            ->setMaxResults($offset);

        $query = $queryBuilder->getQuery();
        if ($query) {
            $articles = $query->getArrayResult();

            return $articles;
        }
        return [];
    }
}
