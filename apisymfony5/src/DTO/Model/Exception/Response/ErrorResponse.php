<?php

namespace App\DTO\Model\Exception\Response;

use OpenApi\Annotations as OA;

class ErrorResponse
{
    public function __construct(protected string $message, private mixed $details = null)
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @OA\Property(type="object")
     */
    public function getDetails(): mixed
    {
        return $this->details;
    }
}
