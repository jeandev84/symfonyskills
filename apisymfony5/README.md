### API Symfony 5 (Example project : https://www.manning.com/)


1. Packages (For Skeleton project)
```
$ composer require symfony/orm-pack
$ composer require symfony/maker-bundle
```


2. Docker Integration via Symfony CLI
- https://symfony.com/doc/current/setup/symfony_server.html#docker-integration
- Configuration "docker-compose.yaml"
```
version: '3.9'

services:
   database:
     container_name: postgres
     image: postgres:13.3-alpine
     environment:
       POSTGRES_USER: postgres
       POSTGRES_PASSWORD: 12345
       POSTGRES_HOST_AUTH_METHOD: trust
     ports:
       - "5432:5432"

```


2. Lunch Docker Compose
```
$ docker compose up -d
```

3. Make and Import environment for .env.local
- Very important for working with docker
```
$ symfony var:export --multiline > .env.local
```

4. Make migration and Migrate
```
$ bin/console make:migration
$ bin/console doctrine:migrations:migrate
```

5. Install Serializer
```
$ composer require symfony/serializer-pack
```

6. PHP CS Fixer (PHP Code Style Fixer)

- https://cs.symfony.com/
- https://www.jetbrains.com/help/phpstorm/using-php-cs-fixer.html#installing-configuring-php-cs-fixer
- https://packagist.org/packages/friendsofphp/php-cs-fixer

```
Recommanded
$ composer require --dev friendsofphp/php-cs-fixer:*


=====================================================================================
Lunch PHP CS Fixer
$ ./vendor/bin/php-cs-fixer fix

Loaded config default from "/root/to-your-project/.php-cs-fixer.dist.php".
   1) src/Manager/BookManager.php
   2) src/Controller/DefaultController.php

Fixed all files in 0.042 seconds, 16.000 MB memory used

```


7. PHP Stan (More recommended for )
- https://phpstan.org/
- https://github.com/phpstan/phpstan

```
$ composer require --dev phpstan/phpstan

===================================================================================
Lunch PHP Stan

$ ./vendor/bin/phpstan analyse src

 ! [NOTE] The Xdebug PHP extension is active, but "--xdebug" is not used. This may slow down performance and the process
 !        will not halt at breakpoints.

 5/5 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%



 [OK] No errors


💡 Tip of the Day:
PHPStan is performing only the most basic checks.
You can pass a higher rule level through the --level option
(the default and current level is 0) to analyse code more thoroughly.

```


8. Make Fixtures
```
$ composer require orm-fixtures --dev
$ bin/console make:fixtures
$ bin/console doctrine:fixtures:load --help

Description:
  Load data fixtures to your database

Usage:
  doctrine:fixtures:load [options]

Options:
      --append                             Append the data fixtures instead of deleting all data from the database first.
      --group=GROUP                        Only load fixtures that belong to this group (multiple values allowed)
      --em=EM                              The entity manager to use for this command.
      --purger=PURGER                      The purger to use for this command [default: "default"]
      --purge-exclusions=PURGE-EXCLUSIONS  List of database tables to ignore while purging (multiple values allowed)
      --shard=SHARD                        The shard connection to use for this command.
      --purge-with-truncate                Purge data by using a database-level TRUNCATE statement
  -h, --help                               Display help for the given command. When no command is given display help for the list command
  -q, --quiet                              Do not output any message
  -V, --version                            Display this application version
      --ansi|--no-ansi                     Force (or disable --no-ansi) ANSI output
  -n, --no-interaction                     Do not ask any interactive question
  -e, --env=ENV                            The Environment name. [default: "dev"]
      --no-debug                           Switch off debug mode.
  -v|vv|vvv, --verbose                     Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  The doctrine:fixtures:load command loads data fixtures from your application:

    php bin/console doctrine:fixtures:load

  Fixtures are services that are tagged with doctrine.fixture.orm.

  If you want to append the fixtures instead of flushing the database first you can use the --append option:

    php bin/console doctrine:fixtures:load --append

  By default Doctrine Data Fixtures uses DELETE statements to drop the existing rows from the database.
  If you want to use a TRUNCATE statement instead you can use the --purge-with-truncate flag:

    php bin/console doctrine:fixtures:load --purge-with-truncate

  To execute only fixtures that live in a certain group, use:

    php bin/console doctrine:fixtures:load --group=group1

=========================================================================
Load Fixtures

$ bin/console doctrine:fixtures:load --purge-with-truncate

Careful, database "postgres" will be purged. Do you want to continue? (yes/no) [no]:
> yes

> purging database
> loading App\DataFixtures\BookCategoryFixtures

```

### DDD (Domain Driven Development)
```
src/
 - BookDomain
    - Controller/BookController
    - Entity/Book

- UserDomain
   - Controller/UserController
   - Entity/User
```
