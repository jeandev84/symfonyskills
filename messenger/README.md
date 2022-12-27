### MESSENGER + RabbitMQ

1. INSTALL RABBITMQ AND LUNCH JOBS
```
$ docker compose up -d
$ symfony console messenger:consume async -vv
                                                                                                                        
[OK] Consuming messages from transport "async".                                                                        
                                                                                                                    

// The worker will automatically exit once it has received a stop signal via the messenger:stop-workers command.       

// Quit the worker with CONTROL-C.  
 
 
AFTER REFRESHING MY PAGE (WILL BE SEE JOB/WORKER successfully worked!)
SENT OrderConfirmationEmailMessage
=======================================================================
$ symfony console messenger:consume async -vv
                                                                                            

                                                                                                                        
 [OK] Consuming messages from transport "async".                                                                        
                                                                                                                        

 // The worker will automatically exit once it has received a stop signal via the messenger:stop-workers command.       

 // Quit the worker with CONTROL-C.                                                                                     

[info] Received message App\Message\OrderConfirmationEmailMessage
Sending email now ...[info] Message App\Message\OrderConfirmationEmailMessage handled by App\Message\MessageHandler\OrderConfirmationEmailHandler::__invoke
[info] App\Message\OrderConfirmationEmailMessage was handled successfully (acknowledging to transport).
[info] Received message App\Message\OrderConfirmationEmailMessage
Sending email now ...[info] Message App\Message\OrderConfirmationEmailMessage handled by App\Message\MessageHandler\OrderConfirmationEmailHandler::__invoke
[info] App\Message\OrderConfirmationEmailMessage was handled successfully (acknowledging to transport).
[info] Received message App\Message\OrderConfirmationEmailMessage
```


2. Symfony open:local:rabbitmq
```
$ symfony open:local:rabbitmq

 INFO  A new Symfony CLI version is available (5.4.20, currently running 5.4.19).

       If you installed the Symfony CLI via a package manager, updates are going to be automatic.
       If not, upgrade by downloading the new version at https://github.com/symfony-cli/symfony-cli/releases
       And replace the current binary (symfony) by the new one.

Opened: http://127.0.0.1:32768

http://127.0.0.1:32768/
username: guest | password: guest

====================================================================
TRY TO REFRESH PAGE 5 times AND SEE http://127.0.0.1:32768/

====================================================================
LUNCH NEXT COMMAND
$ symfony console messenger:consume async -vv
```