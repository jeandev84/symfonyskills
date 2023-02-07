<?php
namespace App\Repository;

use App\Entity\FailedJob;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Receiver\ListableReceiverInterface;

class FailedJobRepository
{

    /**
     * @var ListableReceiverInterface
    */
    protected ListableReceiverInterface  $receiver;


    /**
     * @param ListableReceiverInterface $receiver
    */
    public function __construct(ListableReceiverInterface $receiver)
    {
         $this->receiver = $receiver;

         /* iterable|Envelope[]{ dd($receiver->all()); */
    }


    /**
     * @param string $id
     * @return FailedJob
    */
    public function find(string $id): FailedJob
    {
         return new FailedJob($this->receiver->find($id));
    }



    /**
     * Find all Failed Jobs
     * @return FailedJob[]
    */
    public function findAll(): array
    {
        /* return $this->receiver->all(); */

        return array_map(fn (Envelope $envelope) => new FailedJob($envelope),
            iterator_to_array($this->receiver->all())
        );
    }


    /**
     * Supprimer une Failed Job
     * Supprimmer une tache se trouvant dans la list des taches echouees
     *
     * @param string $envelopId
     * @return void
     */
    public function reject(string $envelopId)
    {
         $this->receiver->reject($this->receiver->find($envelopId));
    }
}