# Symfony 6 Messenger & RabbitMQ and Middleware

## Documentation
- https://symfony.com/doc/current/messenger.html
- https://symfony.com/doc/current/messenger.html#middleware
- RabbitMQ php-amqp (Advanced Message Queuing Protocol)




1. Installation Symfony 6
```
$ composer create-project symfony/website-skeleton:"6.1.*" messenger-middleware


              
 What's next? 
              

Some files have been created and/or updated to configure your new packages.
Please review, edit and commit them: these files are yours.

 symfony/framework-bundle  instructions:

  * Run your application:
    1. Go to the project directory
    2. Create your code repository with the git init command
    3. Download the Symfony CLI at https://symfony.com/download to install a development web server

  * Read the documentation at https://symfony.com/doc

 doctrine/doctrine-bundle  instructions:

  * Modify your DATABASE_URL config in .env

  * Configure the driver (postgresql) and
    server_version (15) in config/packages/doctrine.yaml

 symfony/messenger  instructions:

  * You're ready to use the Messenger component. You can define your own message buses
    or start using the default one right now by injecting the message_bus service
    or type-hinting Symfony\Component\Messenger\MessageBusInterface in your code.

  * To send messages to a transport and handle them asynchronously:

    1. Uncomment the MESSENGER_TRANSPORT_DSN env var in .env
       and framework.messenger.transports.async in config/packages/messenger.yaml;
    2. Route your message classes to the async transport in config/packages/messenger.yaml.

  * Read the documentation at https://symfony.com/doc/current/messenger.html

 symfony/phpunit-bridge  instructions:

  * Write test cases in the tests/ folder
  * Use MakerBundle's make:test command as a shortcut!
  * Run the tests with php bin/phpunit

 symfony/mailer  instructions:

  * You're ready to send emails.

  * If you want to send emails via a supported email provider, install
    the corresponding bridge.
    For instance, composer require mailgun-mailer for Mailgun.

  * If you want to send emails asynchronously:

    1. Install the messenger component by running composer require messenger;
    2. Add 'Symfony\Component\Mailer\Messenger\SendEmailMessage': amqp to the
       config/packages/messenger.yaml file under framework.messenger.routing
       and replace amqp with your transport name of choice.

  * Read the documentation at https://symfony.com/doc/master/mailer.html


```


2. Create project with Docker 
```
$ docker compose up -d
$ docker compose exec php composer create-project symfony/skeleton:"6.1.*" messenger-rabbitmq
$ sudo chown -R yao project-catalog/
$ docker compose exec php composer require symfony/messenger
```


3. Start JOBS and Workers
```
$ docker compose exec php php bin/console messenger:consume async
$ docker compose exec php php bin/console app:send-notification
$ docker compose exec php php bin/console app:send-notification --via=sms
$ docker compose exec php php bin/console app:send-notification --via=whatsapp
$ docker compose exec php php bin/console app:send-notification --via=telegram
$ docker compose exec php php bin/console app:send-notification --via=push-sms
$ docker compose exec php php bin/console app:send-notification --via=xxxx
```
