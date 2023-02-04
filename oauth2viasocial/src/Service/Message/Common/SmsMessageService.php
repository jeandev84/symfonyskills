<?php
namespace App\Service\Message\Common;

use App\Service\Http\Client\SymfonyHttpClientService;
use App\Service\Message\Contract\Sender\MessageSenderInterface;
use App\Service\Message\Logger\MessageLoggerInterface;

abstract class SmsMessageService implements MessageSenderInterface, MessageLoggerInterface
{

    /**
     * @var SymfonyHttpClientService
    */
    protected $client;


    /**
     * @param SymfonyHttpClientService $client
    */
    public function __construct(SymfonyHttpClientService $client)
    {
          $this->client = $client;
    }
}