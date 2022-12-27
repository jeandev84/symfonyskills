### WAREHOUSE-SYSTEM (Microservice) RECEIVER APPLICATION

```php 
$ composer require symfony/messenger


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

        routing:
            # Route your messages to the transports
            # 'App\Message\YourMessage': async
            'App\Message\Command\Order\CreateOrder': fanout
            # 'App\Message\Command\Sms\SignupSms': async



$ bin/console messenger:consume -vv


                                                                                                                        
 [OK] Consuming messages from transport "fanout".                                                                       
                                                                                                                        

 // The worker will automatically exit once it has received a stop signal via the messenger:stop-workers command.       

 // Quit the worker with CONTROL-C.                                                                                     

[info] Received message App\Message\Command\Order\CreateOrder
object(App\Message\Command\Order\CreateOrder)#352 (2) {
  ["productId":protected]=>
  int(243)
  ["productAmount":protected]=>
  int(2)
}
[info] Message App\Message\Command\Order\CreateOrder handled by App\MessageHandler\Command\Order\CreateOrderHandler::__invoke
[info] App\Message\Command\Order\CreateOrder was handled successfully (acknowledging to transport).
[info] Received message App\Message\Command\Order\CreateOrder
object(App\Message\Command\Order\CreateOrder)#3072 (2) {
  ["productId":protected]=>
  int(243)
  ["productAmount":protected]=>
  int(2)
}
[info] Message App\Message\Command\Order\CreateOrder handled by App\MessageHandler\Command\Order\CreateOrderHandler::__invoke
[info] App\Message\Command\Order\CreateOrder was handled succe
```