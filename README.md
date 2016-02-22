# Setup

  php bin/console doctrine:mapping:import --force AppBundle

  php bin/console doctrine:generate:entities AppBundle

  php bin/console generate:bundle AppBundle:Article

  php bin/console generate:controller ...

# Development

## Vagrant machine

To run Vagrant, type in console:
```
vagrant up
```

then 

```
vagrant ssh
```

to play with it.

## XDebug

https://www.dropbox.com/s/t0s43m8htd4vspa/phpuk-step-into-debugging.pdf?dl=0
http://piotrpasich.com/phpstorm-vagrant-and-xdebug/
https://sandro-keil.de/blog/2014/12/30/vagrant-remote-php-cli-debugging/

Tip: for debugging CLI type:

```
bin/cli_debug.sh YOUR_COMMAND
```

for example

```
bin/cli_debug.sh bin/console app:test
```

Symfony Standard Edition
========================

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

  

[1]:  https://symfony.com/doc/3.0/book/installation.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.0/book/doctrine.html
[8]:  https://symfony.com/doc/3.0/book/templating.html
[9]:  https://symfony.com/doc/3.0/book/security.html
[10]: https://symfony.com/doc/3.0/cookbook/email.html
[11]: https://symfony.com/doc/3.0/cookbook/logging/monolog.html
[13]: https://symfony.com/doc/3.0/bundles/SensioGeneratorBundle/index.html
