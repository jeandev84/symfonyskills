<?php

namespace App\DTO\Model\Exception\Response;

class ErrorResponse
{
    public function __construct(protected string $message, private mixed $details = null)
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getDetails(): mixed
    {
        return $this->details;
    }
}
