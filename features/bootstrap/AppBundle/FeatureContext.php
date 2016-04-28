<?php

namespace AppBundle;

use AppBundle\Entity\Article;
use AppBundle\Entity\ArticleCategory;
use AppBundle\Entity\News;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Exception\ExpectationException;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Symfony2Extension\Context\KernelAwareContext;
use Behat\Symfony2Extension\Context\KernelDictionary;
use Codifico\ParameterBagExtension\Context\ParameterBagDictionary;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

class FeatureContext extends RawMinkContext implements SnippetAcceptingContext, KernelAwareContext
{
    use ParameterBagDictionary;
    use KernelDictionary;
    use HttpRequestTrait;

    protected $headers = [];

    /**
     * @BeforeScenario
     */
    public function setUp()
    {
        $entityManager = $this->getContainer()->get('doctrine')->getManager();
        $purger = new ORMPurger($entityManager);
        $executor = new ORMExecutor($entityManager, $purger);
        $executor->purge();
        $entityManager->clear();
    }

    /**
     * @When /^(?:|the )client requests (?P<method>GET|POST|PUT|DELETE|OPTIONS) "(?P<resource>[^"]*)" with:$/
     * @When /^(?:|the )client requests (?P<method>GET|HEAD|POST|PUT|DELETE|OPTIONS) "(?P<resource>[^"]*)"$/
     */
    public function theClientRequestsGet($method, $resource, PyStringNode $content = null)
    {
        $this->request(
            $method,
            $this->prepareResource($this->getParameterBag()->replace($resource)),
            $this->headers,
            $content ? $this->getParameterBag()->replace($content) : null
        );
    }

    /**
     * @Then /^(?:|the )response should be a "(?P<statusCode>[0-9]{3})" with JSON:$/
     */
    public function theResponseShouldBeWith($statusCode, PyStringNode $expectedContent)
    {
        $this->assertSession()->statusCodeEquals($statusCode);

        $content = $this->getClient()->getResponse()->getContent();

        $receivedJson = json_decode($content);
        $expectedJson = json_decode($this->getParameterBag()->replace($expectedContent));

        if ($expectedJson === null) {
            $this->printDebug('Can not parse JSON from test step');
            throw new ExpectationException('Can not parse JSON from test step', $this->getSession());
        }

        if ($receivedJson != $expectedJson) {
            $this->printDebug(
                sprintf(
                    "Response: %d:\n%s",
                    $this->getClient()->getResponse()->getStatusCode(),
                    $content
                )
            );
            $message = sprintf(
                'Expected to get "%s" but received: "%s"',
                $this->getParameterBag()->replace($expectedContent),
                $content
            );

            throw new ExpectationException($message, $this->getSession());
        }
    }

    /**
     * @Given there are article categories:
     */
    public function thereAreArticleCategories(TableNode $table)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        $i = 1;

        foreach ($table->getHash() as $row) {
            $category = new ArticleCategory();
            $category->setName($row['name']);
            $category->setSlug($row['slug']);
            $category->setAbbr('');

            $em->persist($category);
            $em->flush();

            $this->getParameterBag()->set(sprintf('ARTICLE_CATEGORY_%s_ID', $i), $category->getIdArticleCategory());

            $i++;
        }
    }

    public function findArticleCategory(array $criteria)
    {
        return $this->getContainer()->get('doctrine')->getManager()->getRepository(ArticleCategory::class)->findOneBy($criteria);
    }

    /**
     * @Given there are articles:
     */
    public function thereAreArticles(TableNode $table)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        $i = 1;

        foreach ($table->getHash() as $row) {
            $article = new Article();
            $article->setTitle($row['title']);
            $article->setCategory($this->findArticleCategory(['name' => $row['category']]));
            $article->setIdAuthor(1);
            $article->setSlug($row['title']);

            $em->persist($article);
            $em->flush();

            $this->getParameterBag()->set(sprintf('ARTICLE_%s_ID', $i), $article->getIdArticle());

            $i++;
        }
    }

    /**
     * @Given there are news:
     */
    public function thereAreNews(TableNode $table)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        $i = 1;

        foreach ($table->getHash() as $row) {
            $news = new News();
            $news->setTitle($row['title']);
//            $article->setCategory($this->findArticleCategory(['name' => $row['category']]));
            $news->setIdAuthor(1);
            $news->setSlug($row['title']);

            $em->persist($news);
            $em->flush();

//            var_dump($news->getModificationDate());

            $this->getParameterBag()->set(sprintf('NEWS_%s_ID', $i), $news->getIdNews());
            $this->getParameterBag()->set(sprintf('NEWS_AUTHOR_%s_ID', $i), $news->getIdAuthor());
//            $this->getParameterBag()->set('NEWS_MODIFICATION_DATE', $news->getModificationDate()->format(DATE_ISO8601));

            $i++;
        }
    }
}