### API Symfony 5


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
