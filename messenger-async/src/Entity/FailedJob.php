<?php
namespace App\Entity;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Stamp\RedeliveryStamp;

class FailedJob
{

     private Envelope $envelope;


     public function __construct(Envelope $envelope)
     {
         $this->envelope = $envelope;
     }


     public function getTitle(): string
     {
          return get_class($this->envelope->getMessage());
     }


     public function getTrace(): string
     {
          /** @var RedeliveryStamp[] $stamps */
          $stamps = $this->envelope->all(RedeliveryStamp::class);
          return $stamps[0]->getFlattenException()->getTraceAsString();
     }
}