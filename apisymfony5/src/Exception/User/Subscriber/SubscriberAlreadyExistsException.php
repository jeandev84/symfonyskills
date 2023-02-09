<?php
namespace App\Exception\User\Subscriber;

class SubscriberAlreadyExistsException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('subscriber already exists');
    }
}
