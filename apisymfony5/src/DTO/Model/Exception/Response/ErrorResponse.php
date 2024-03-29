<?php

namespace App\DTO\Model\Exception\Response;

use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;
use App\DTO\Model\Exception\Response\ErrorDebugDetails;
use App\DTO\Model\Exception\Response\ErrorValidationDetails;


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
     * @OA\Property(type="object", oneOf={
     *     @OA\Schema(ref=@Model(type=ErrorDebugDetails::class)),
     *     @OA\Schema(ref=@Model(type=ErrorValidationDetails::class))
     * })
     */
    public function getDetails(): mixed
    {
        return $this->details;
    }
}
