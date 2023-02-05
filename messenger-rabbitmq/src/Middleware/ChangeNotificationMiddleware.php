<?php
namespace App\Middleware;

use App\Message\SendNotificationMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;
use Symfony\Component\Messenger\Stamp\BusNameStamp;

class ChangeNotificationMiddleware implements MiddlewareInterface
{

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
         $stamps = $envelope->all();

         if (sizeof($stamps) === 1) {
              $message  = new SendNotificationMessage('Hello from Middleware');
              $envelope = Envelope::wrap($message, [new BusNameStamp('messenger.bus.default')]);
         }

         return $stack->next()->handle($envelope, $stack);
    }
}