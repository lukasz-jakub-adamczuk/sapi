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

    @wip
    Scenario: Editing not existing article
        When the client requests PUT "/api/v1/articles/not-existing-article" with:
        """
        title=Our secret beauty for anger is to illuminate others oddly.
        """
        Then the response status code should be 404

    @wip
    Scenario: Editing existing article
        Given there are article categories:
            | name     | slug     |
            | Category | category |
        And there are articles:
            | category | title                 |
            | Category | Never trade a lagoon. |
        When the client requests PUT "/api/v1/articles/ARTICLE_1_ID" with:
        """
        title=Our secret beauty for anger is to illuminate others oddly.
        """
        Then the response should be a "200" with JSON:
        """
        [
            {
                "title": "Our secret beauty for anger is to illuminate others oddly.",
                "idArticle": "ARTICLE_1_ID",
                "idArticleCategory": "ARTICLE_CATEGORY_1_ID"
            }
        ]
        """

    @wip
    Scenario: Adding new article
        When the client requests POST "/api/v1/articles" with:
        """
        title=Our secret beauty for anger is to illuminate others oddly.
        """
        Then the response should be a "201" with JSON:
        """
        [
            {
                "title": "Our secret beauty for anger is to illuminate others oddly.",
                "idArticle": "ARTICLE_1_ID",
                "idArticleCategory": "ARTICLE_CATEGORY_1_ID"
            }
        ]
        """
    # Then print last response - drukuje ostatnia odpowiedz
    # bin/behat --append-snippets - dopisuje implementacje do contextu
    # bin/behat src/AppBundle/Features/filename.feature - odpala testy dla jednego pliku
    # bin/behat src/AppBundle/Features/filename.feature:13 - odpala jeden scenariusz
    # bin/behat src/AppBundle/Features/filename.feature:13-80 - odpala scenariusze z podanych linii
    # bin/behat src/AppBundle/Features/filename.feature:13- - odpala scenariusze od linii 13 do konca pliku