### ESHOP & MICROSERVICES APP (RABBITMQ & CQRS)

1. Create EshopController
```php 
$ composer create-project symfony/website-skeleton:"^4.3.99" eshop

$ bin/console make:controller

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EshopController extends AbstractController
{
    /**
     * @Route("/", name="eshop")
    */
    public function index(): Response
    {
        return $this->render('eshop/index.html.twig', [
            'controller_name' => 'EshopController',
        ]);
    }




    /**
      * @Route("/search", name="search")
    */
    public function search()
    {
         $search = 'laptops';

         // call database
         sleep(1);

         $result = ' result from database';

         return new Response('You search results for '. $search . $result);
    }



    /**
     * @Route("/signup-sms", name="signup.sms")
    */
    public function signupSMS()
    {
         $phoneNumber = '111 222 333';

         // connect to api of external sms service provider
         sleep(2);

        return new Response(sprintf('You phone number %s successfully signed up to SMS newsletter!', $phoneNumber));
    }




    /**
     * @Route("/order", name="order")
    */
    public function order()
    {
        $productId = 243;
        $productName = 'product name';
        $productAmount = 2;

        // save the order in the database


        // send email to client confirming the order (product name, amount, price, etc.)

        // update warehouse database to keep stock up to date in physical stores
        sleep(4);


        return new Response('You successfully ordered your product!' . $productName);
    }
}


./templates/eshop/index.html.twig

{% extends 'base.html.twig' %}

{% block title %}Hello EshopController!{% endblock %}

{% block body %}
<style>
    .example-wrapper { margin: 1em auto; max-width: 800px; width: 95%; font: 18px/1.5 sans-serif; }
    .example-wrapper code { background: #F5F5F5; padding: 2px 6px; }
</style>

<div class="example-wrapper">
    <h1>E-shop website ✅</h1>

    Search for products, order products or sign up to our SMS newsletter:
    <ul>
        <li>
            <a href="{{ path('search') }}">Search for products</a>
        </li>
        <li>
            <a href="{{ path('order') }}">Finalize your e-basket</a>
        </li>
        <li>
            <a href="{{ path('signup.sms') }}">Signup to SMS newsletter</a>
        </li>
    </ul>
</div>
{% endblock %}


```


2. Install messenger 
```php 
$ composer require symfony/messenger

./config/services.yaml

services:

    # add more service definitions when explicit configuration is needed
    # please note that last definitions always *replace* previous ones
    App\MessageHandler\:
        resource: '../src/MessageHandler/'
        tags: [ 'messenger.message_handler' ]
    
    
```


3. Debug Messenger (Follow messages can be dispatch)
```php 
$ bin/console debug:messenger
```


4. Create database 
```php 

.env 

# DATABASE
DATABASE_URL="mysql://brown:secret123456@127.0.0.1:3306/eshoprmq?serverVersion=8&charset=utf8mb4"

....

# MESSENGER (Send message vida doctrine)

MESSENGER_TRANSPORT_DSN=doctrine://default
# MESSENGER_TRANSPORT_DSN=amqp://guest:guest@localhost:5672/%2f/messages
# MESSENGER_TRANSPORT_DSN=redis://localhost:6379/messages

./config/packages/messenger.yaml

framework:
    messenger:
        # Uncomment this (and the failed transport below) to send failed messages to this transport for later handling.
        # failure_transport: failed

        transports:
            # https://symfony.com/doc/current/messenger.html#transport-configuration
             async: '%env(MESSENGER_TRANSPORT_DSN)%'
            # failed: 'doctrine://default?queue_name=failed'
            # sync: 'sync://'

        routing:
            # Route your messages to the transports
            # 'App\Message\YourMessage': async
             'App\Message\Command\Order\CreateOrder': async
             'App\Message\Command\Sms\SignupSms': async

=========================================================
$ bin/console doctrine:database:create

```


5. Consume Message (Run CRON JOBS ON SERVER EVERY 5 minutes, 1 week etc...) 
```php 
RUN WORKERS

$ bin/console messenger:consume -vv


 // The worker will automatically exit once it has received a stop signal via the messenger:stop-workers command.       

 // Quit the worker with CONTROL-C.                                                                                     

01:35:18 INFO      [messenger] Received message App\Message\Command\Order\CreateOrder ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:22 INFO      [messenger] Message App\Message\Command\Order\CreateOrder handled by App\MessageHandler\Command\Order\CreateOrderHandler::__invoke ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder","handler" => "App\MessageHandler\Command\Order\CreateOrderHandler::__invoke"]
01:35:22 INFO      [messenger] App\Message\Command\Order\CreateOrder was handled successfully (acknowledging to transport). ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:22 INFO      [messenger] Received message App\Message\Command\Order\CreateOrder ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:26 INFO      [messenger] Message App\Message\Command\Order\CreateOrder handled by App\MessageHandler\Command\Order\CreateOrderHandler::__invoke ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder","handler" => "App\MessageHandler\Command\Order\CreateOrderHandler::__invoke"]
01:35:26 INFO      [messenger] App\Message\Command\Order\CreateOrder was handled successfully (acknowledging to transport). ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:26 INFO      [messenger] Received message App\Message\Command\Order\CreateOrder ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:30 INFO      [messenger] Message App\Message\Command\Order\CreateOrder handled by App\MessageHandler\Command\Order\CreateOrderHandler::__invoke ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder","handler" => "App\MessageHandler\Command\Order\CreateOrderHandler::__invoke"]
01:35:30 INFO      [messenger] App\Message\Command\Order\CreateOrder was handled successfully (acknowledging to transport). ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:30 INFO      [messenger] Received message App\Message\Command\Order\CreateOrder ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:34 INFO      [messenger] Message App\Message\Command\Order\CreateOrder handled by App\MessageHandler\Command\Order\CreateOrderHandler::__invoke ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder","handler" => "App\MessageHandler\Command\Order\CreateOrderHandler::__invoke"]
01:35:34 INFO      [messenger] App\Message\Command\Order\CreateOrder was handled successfully (acknowledging to transport). ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:34 INFO      [messenger] Received message App\Message\Command\Order\CreateOrder ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:38 INFO      [messenger] Message App\Message\Command\Order\CreateOrder handled by App\MessageHandler\Command\Order\CreateOrderHandler::__invoke ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder","handler" => "App\MessageHandler\Command\Order\CreateOrderHandler::__invoke"]
01:35:38 INFO      [messenger] App\Message\Command\Order\CreateOrder was handled successfully (acknowledging to transport). ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:38 INFO      [messenger] Received message App\Message\Command\Order\CreateOrder ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:42 INFO      [messenger] Message App\Message\Command\Order\CreateOrder handled by App\MessageHandler\Command\Order\CreateOrderHandler::__invoke ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder","handler" => "App\MessageHandler\Command\Order\CreateOrderHandler::__invoke"]
01:35:42 INFO      [messenger] App\Message\Command\Order\CreateOrder was handled successfully (acknowledging to transport). ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]
01:35:42 INFO      [messenger] Received message App\Message\Command\Sms\SignupSms ["message" => App\Message\Command\Sms\SignupSms { …},"class" => "App\Message\Command\Sms\SignupSms"]
01:35:44 INFO      [messenger] Message App\Message\Command\Sms\SignupSms handled by App\MessageHandler\Command\Sms\SignupSmsHandler::__invoke ["message" => App\Message\Command\Sms\SignupSms { …},"class" => "App\Message\Command\Sms\SignupSms","handler" => "App\MessageHandler\Command\Sms\SignupSmsHandler::__invoke"]
01:35:44 INFO      [messenger] App\Message\Command\Sms\SignupSms was handled successfully (acknowledging to transport). ["message" => App\Message\Command\Sms\SignupSms { …},"class" => "App\Message\Command\Sms\SignupSms"]
01:35:44 INFO      [messenger] Received message App\Message\Command\Order\CreateOrder ["message" => App\Message\Command\Order\CreateOrder { …},"class" => "App\Message\Command\Order\CreateOrder"]

```


6. Install RabbitMQ in Linux
```php 
a) Install extension amqp
$ sudo apt-get install php-amqp

# php.ini 
# extension=amqp.so



b) Install RabbitMQ server
$ sudo apt-get install rabbitmq-server


c) Enable Service RabbitMQ
$ sudo systemctl start rabbitmq-server.service
$ systemctl start rabbitmq-server

###> symfony/messenger ###
# Choose one of the transports below
# MESSENGER_TRANSPORT_DSN=doctrine://default
MESSENGER_TRANSPORT_DSN=amqp://guest:guest@localhost:5672/%2f/messages
# MESSENGER_TRANSPORT_DSN=redis://localhost:6379/messages
###< symfony/messenger ###

Browse : http://localhost:15672

$ systemctl status rabbitmq-server
```

7. Microservice 
```php 

./config/packages/messenger.yaml

framework:
    messenger:
        # Uncomment this (and the failed transport below) to send failed messages to this transport for later handling.
        # failure_transport: failed

        transports:
            # https://symfony.com/doc/current/messenger.html#transport-configuration
            # async: '%env(MESSENGER_TRANSPORT_DSN)%'
            # failed: 'doctrine://default?queue_name=failed'
            # sync: 'sync://'
            fanout:
               dsn: '%env(MESSENGER_TRANSPORT_DSN)%'
               options:
                  exchange:
                     name: order.fanout
                     type: fanout
                  queues:
                     order1.fanout:
                     order2.fanout:

        routing:
            # Route your messages to the transports
            # 'App\Message\YourMessage': async
             'App\Message\Command\Order\CreateOrder': fanout
             # 'App\Message\Command\Sms\SignupSms': async

========================================================================

$ composer create-project symfony/skeleton:"^4.3.99" warehouse-system
```