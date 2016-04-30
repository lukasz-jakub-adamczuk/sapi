1. Install Behat & Behat Symfony2 extension using composer
```
composer require --dev behat/behat
composer require --dev behat/symfony2-extension
composer require --dev behat/mink
composer require --dev behat/mink-extension
composer require --dev behat/mink-browserkit-driver
composer require --dev codifico/parameter-bag-extension:dev-master
composer require --dev doctrine/doctrine-fixtures-bundle
```

2. Create `behat.yml` file in application root directory, fill in with following content:
```
default:
    suites:
        default:
            type: symfony_bundle
            bundle: AppBundle
            filters:
                tags: ~@wip
            contexts:
                - AppBundle\FeatureContext
                - Behat\MinkExtension\Context\MinkContext
    extensions:
        Behat\Symfony2Extension: ~
        Behat\MinkExtension:
          sessions:
            default:
              symfony2: ~
        Codifico\ParameterBagExtension\ServiceContainer\ParameterBagExtension:
            parameter_bag:
                class: Codifico\ParameterBagExtension\Bag\InMemoryPlaceholderBag
```

3. Create directory structure: `features/bootstrap/AppBundle`, inside `AppBundle` create a class `FeatureContext`:
```
<?php

namespace AppBundle;

use Behat\Behat\Context\SnippetAcceptingContext;

class FeatureContext implements SnippetAcceptingContext
{}
```

4. Create first scenario. Inside `src/AppBundle` create directory `Features`, go to directory and create file `first_feature.feature`:
```
Feature: My awesome feature
    In order to use API
    As an end user
    I want to be able to get articles list

    Scenario: Getting empty list when there are no articles
        When the client requests GET "/api/v1/articles"
        Then the response should be a "200" with JSON:
        """
        []
        """
```

5. Fill in `FeatureContext` with following content:
```
<?php

namespace AppBundle;

use Behat\Gherkin\Node\PyStringNode;
use Behat\Behat\Context\SnippetAcceptingContext;
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
}
```

6. In `features/bootstrap/AppBundle` create `HttpRequestTrait.php` file and fill in with following content:
```
<?php

namespace AppBundle;

use Behat\Gherkin\Node\PyStringNode;
use Symfony\Bundle\FrameworkBundle\Client;

trait HttpRequestTrait
{
    /**
     * @param string $method
     * @param string $resource
     * @param array $headers
     * @param PyStringNode|string|null $content
     */
    protected function request($method, $resource, array $headers = [], $content = null)
    {
        $content = $content instanceof PyStringNode ? $content->getRaw() : $content;
        $content = implode('&', explode("\n", $content));
        parse_str($content, $params);

        $server = $this->createServerArray($headers);

        $this->getClient()->request($method, $this->locatePath($resource), $params, [], $server);
    }

    /**
     * @param string $resource
     *
     * @return string
     */
    protected function prepareResource($resource)
    {
        return preg_replace('/^(https?\:\/\/[^\/]+)(\/[^\/]+\.php)?/', '$1', $resource);
    }

    /**
     * @param array $headers
     *
     * @return array
     */
    protected function createServerArray(array $headers = [])
    {
        $server = [];
        $nonPrefixed = ['CONTENT_TYPE'];

        foreach ($headers as $name => $value) {
            $headerName = strtoupper(str_replace('-', '_', $name));
            $headerName = in_array($headerName, $nonPrefixed) ? $headerName : 'HTTP_'.$headerName;
            $server[$headerName] = $value;
        }

        return $server;
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        $driver = $this->getSession()->getDriver();

        return $driver->getClient();
    }

    /**
     * @param string $string
     */
    protected function printDebug($string)
    {
        echo "\n\033[36m|  " . strtr($string, ["\n" => "\n|  "]) . "\033[0m\n\n";
    }
}
```

7. Add following code to `app/config/config_test.yml`:
```
doctrine:
    dbal:
        dbname:   "sapi-test"
```

Create database `sapi-test` in your MySQL service.


8. Run behat: `bin/behat` and see results.

9. Add second test case to `first_features.feature`:
```
    Scenario: Getting list with one article
        Given there are article categories:
        | name     | slug     |
        | Category | category |
        And there are articles:
        | category | title                 |
        | Category | Never trade a lagoon. |
        When the client requests GET "/api/v1/articles"
        Then the response should be a "200" with JSON:
        """
        [
            {
                "title": "Never trade a lagoon.",
                "idArticle": "ARTICLE_1_ID",
                "idArticleCategory": "ARTICLE_CATEGORY_1_ID"
            }
        ]
        """
```

10. Add required steps to `FeatureContext.php`:
```
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
```

Links:

* Behat documentation - http://docs.behat.org/en/v3.0/
