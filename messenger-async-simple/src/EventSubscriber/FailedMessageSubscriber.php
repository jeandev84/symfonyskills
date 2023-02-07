<?php
namespace App\EventSubscriber;

use App\Service\UserNotifierService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Messenger\Event\WorkerMessageFailedEvent;

class FailedMessageSubscriber implements EventSubscriberInterface
{


    protected UserNotifierService $notifierService;


    public function __construct(UserNotifierService $notifierService)
    {
          $this->notifierService = $notifierService;
    }

    public static function getSubscribedEvents()
    {
         return [
            WorkerMessageFailedEvent::class => 'onMessageFailed'
         ];
    }


    /**
     * @param WorkerMessageFailedEvent $event
     * @return void
    */
    public function onMessageFailed(WorkerMessageFailedEvent $event)
    {
        // dd($event->getEnvelope());

        // On envoie un message a l'administrator en cas de problem
        $message = get_class($event->getEnvelope()->getMessage());
        $trace   = $event->getThrowable()->getTraceAsString();


        $this->notifierService->notifyAdmin([
            'message' => "Une erreur est survenue lors du traitement d' une tache {$message} {$trace}"
        ]);
    }
}