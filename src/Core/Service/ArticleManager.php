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

class ArticleManager
{
    use HydrationTrait;
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function find($id)
    {
        $article = $this->articleRepository->find($id);

        if (!$article) {
            throw $this->createNotFoundException('No news found');
        }

        return $article;
    }

    public function create(Request $request)
    {
        $fields = $this->getHydrationMap($request);

        $article = new Article();

        // setCreationDate if not set
        if (!isset($fields['creation_date'])) {
            $article->setCreationDate(new \DateTime());
        }

        $article = $this->hydrate($article, $fields);

        $this->articleRepository->save($article);

        return $article;
    }

    public function edit(Request $request, $id)
    {
        $fields = $this->getHydrationMap($request);

        $article = $this->find($id);

        // setModificationDate if not set
        if (!isset($fields['modification_date'])) {
            $article->setModificationDate(new \DateTime());
        }

        $article = $this->hydrate($article, $fields);

        $this->articleRepository->save($article);

        return $article;
    }

    public function delete($id)
    {
        $article = $this->find($id);

        $this->articleRepository->delete($article);

        return $article;
    }

    private function getHydrationMap(Request $request)
    {
        $fields = $this->prepareHydrationMap($request);

        if (!isset($fields['setSlug'])) {
            $fields['setSlug'] = Utilities::slugify($fields['setTitle']);
        }

        return $fields;
    }
}
