1. install JMSSerializer - composer require jms/serializer-bundle
2. enable JMSSerializerBundle in AppKernel - new JMS\SerializerBundle\JMSSerializerBundle(),
3. composer require friendsofsymfony/rest-bundle
4. enable FosRestBundle in AppKernel - new FOS\RestBundle\FOSRestBundle(),
5. Prepare first controller:
```
<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class ApiController extends FOSRestController
{
    public function getCategoriesAction()
    {
        $view = $this->view([
            'foo' => 'bar',
        ], 200);

        return $this->handleView($view);
    }
}

```

[Author] try here to write some endpoints
* GET /api/v1/categories.json
* POST /api/v1/categories.json
* GET /api/v1/categories/12345.json
* GET /api/v1/categories/12345/articles.json

6. Set up routing in app/config/routing.yml

```
api:
    type:     rest
    resource: AppBundle\Controller\ApiController
    prefix:   /api/v1
```

7. Test url:

```
http://squarezone-sapi.local/app_dev.php/api/v1/categories.json
```

8. Create endpoint for articles
9. Add serializer config:

```
# src/AppBundle/Resources/config/serializer/Entity.Article.yml

AppBundle\Entity\Article:
    exclusion_policy: ALL
    properties:
        idArticle:
            expose: true
        sum:
            expose: true
        slug:
            expose: true
        title:
            expose: true

```

10. Use serialization groups. Modify following code:

```
# src/AppBundle/Controller/ApiController.php

public function getArticlesAction()
{
    $repository = $this->getDoctrine()->getEntityManager()->getRepository('AppBundle:Article');

    $articles = $repository->findAll();

    $view = $this->view($articles, 200);
    $view->setSerializationContext(SerializationContext::create()->setGroups('list'));

    return $this->handleView($view);
}

# src/AppBundle/Resource/config/serializer/Entity.Article.yml

AppBundle\Entity\Article:
    exclusion_policy: ALL
    properties:
        idArticle:
            expose: true
            groups: [list]
        sum:
            expose: true
            groups: [detail]
        slug:
            expose: true
            groups: [list]
        title:
            expose: true
            groups: [list]
```

Documentation:
* http://symfony.com/doc/master/bundles/FOSRestBundle/index.html
* http://jmsyst.com/bundles/JMSSerializerBundle
* http://jmsyst.com/libs/serializer
