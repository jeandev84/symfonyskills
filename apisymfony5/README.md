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
