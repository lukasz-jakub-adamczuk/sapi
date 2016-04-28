Feature: My awesome feature
    In order to use API
    As an end user
    I want to be able to get news list

    Scenario: Getting empty list when there are no news
        When the client requests GET "/api/v1/news"
        Then the response should be a "200" with JSON:
        """
        []
        """

    Scenario: Getting list with one news
        Given there are news:
            | category | title                  |
            | Category | Squarezone is on fire. |
        When the client requests GET "/api/v1/news"
        Then the response should be a "200" with JSON:
        """
        [
            {
                "title": "Squarezone is on fire.",
                "idNews": "NEWS_1_ID"
            }
        ]
        """

    Scenario: Editing not existing news
        When the client requests PUT "/api/v1/news/not-existing-news" with:
        Then the response status code should be 404
        """
        title=Creating good test is really difficult.
        """

    Scenario: Editing existing news
        Given there are news:
            | title                 |
            | Our secret beauty for anger is to illuminate others oddly. |
        When the client requests PUT "/api/v1/news/NEWS_1_ID" with:
        """
        title=Our secret beauty for anger is to illuminate others oddly.
        slug=our-secret-beauty-for-anger-is-to-illuminate-others-oddly
        comments=true
        """
        Then the response should be a "200" with JSON:
        """
        [
            {
                "title": "Our secret beauty for anger is to illuminate others oddly.",
                "slug": "our-secret-beauty-for-anger-is-to-illuminate-others-oddly",
                "id_news": "NEWS_1_ID",
                "id_author": "NEWS_AUTHOR_1_ID",
                "comments": true,
                "origin": "",
                "modification_date": "NEWS_MODIFICATION_DATE",
                "verified": false,
                "visible": true,
                "deleted": false
            }
        ]
        """


    Scenario: Adding new article
        When the client requests POST "/api/v1/news" with:
        """
        title=Our secret beauty for anger is to illuminate others oddly.
        id_author=140
        """
        Then the response should be a "201" with JSON:
        """
        [
            {
                "title": "Our secret beauty for anger is to illuminate others oddly.",
                "idNews": "NEWS_1_ID",
                "idAuthor": "140",
                "slug": "our-secret-beauty-for-anger-is-to-illuminate-others-oddly"
            }
        ]
        """

    # Then print last response - drukuje ostatnia odpowiedz
    # bin/behat --append-snippets - dopisuje implementacje do contextu
    # bin/behat src/AppBundle/Features/filename.feature - odpala testy dla jednego pliku
    # bin/behat src/AppBundle/Features/filename.feature:13 - odpala jeden scenariusz
    # bin/behat src/AppBundle/Features/filename.feature:13-80 - odpala scenariusze z podanych linii
    # bin/behat src/AppBundle/Features/filename.feature:13- - odpala scenariusze od linii 13 do konca pliku