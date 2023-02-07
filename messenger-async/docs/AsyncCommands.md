### Async Command

- https://github.com/jeandev84/Grafikart.fr/
- https://github.com/jeandev84/Grafikart.fr/blob/master/src/Infrastructure/Queue/Handler/ServiceMethodMessageHandler.php


1. Consumer une file d' attente
```php 
$ php bin/console messenger:consume <NOM_DU_TRANSPORT] <FLAG_POUR_LOGGER_LES_MESSAGES>
$ php bin/console messenger:consume async -vv

===========================================================
bin/console debug:messenger                  
bin/console make:messenger-middleware        
bin/console messenger:consume                
bin/console messenger:consume-messages       
bin/console messenger:setup-transports       
bin/console messenger:stop-workers    

==========================================================
Install Supervisor or if you use RabbitMQ you can supervise your message transport
$ sudo apt-get install supervisor
```


2. Debug Messenger
```php 
$ php bin/console debug:messenger
Messenger
=========

messenger.bus.default
---------------------

 The following messages can be dispatched:

 ----------------------------------------------------------- 
  App\Message\UserNotificationMessage                        
      handled by App\MessageHandler\UserNotificationHandler  
  Symfony\Component\Mailer\Messenger\SendEmailMessage        
      handled by mailer.messenger.message_handler            
 -----------------------------------------------------------
```


3. Stop Workers
```php 
$ bin/console messenger:stop-workers 
```



4. Show Failed Messages
```php 
$ bin/console messenger:failed:show
```



5. Retried Failed Messages
```php 
$ bin/console messenger:failed:retry -vv
```