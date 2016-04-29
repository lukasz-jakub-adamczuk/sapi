<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 18/04/16
 * Time: 20:31
 */

namespace Core\Repository;

use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleCategory;
use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function save(ArticleCategory $category)
    {
        $this->getEntityManager()->persist($category);
        $this->getEntityManager()->flush();
    }

    public function delete(ArticleCategory $category)
    {
        $this->getEntityManager()->remove($category);
        $this->getEntityManager()->flush();
    }

    public function getCategories()
    {
        $categories = $this->findAll();

        return $categories;
    }

    public function getCategoryArticles($category)
    {
        $categoryEntity = $this->findOneBy(['slug' => $category]);
        $articles = $categoryEntity->getArticles();

        return $articles;
    }
}
