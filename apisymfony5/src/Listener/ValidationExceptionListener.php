<?php

namespace App\Listener;

use App\DTO\Model\Exception\Response\ErrorResponse;
use App\DTO\Model\Exception\Response\ErrorValidationDetails;
use App\Exception\Validation\DTO\Model\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationExceptionListener
{
    public function __construct(private SerializerInterface $serializer)
    {
    }

    public function __invoke(ExceptionEvent $event): void
    {
        $throwable = $event->getThrowable();

        if (!($throwable instanceof ValidationException)) {
            return;
        }

        $data = $this->serializer->serialize(new ErrorResponse($throwable->getMessage(), $this->formatViolations($throwable->getViolations())), JsonEncoder::FORMAT);

        $event->setResponse(new JsonResponse($data, Response::HTTP_BAD_REQUEST, [], true));
    }

    private function formatViolations(ConstraintViolationListInterface $violations): ErrorValidationDetails
    {
        $details = new ErrorValidationDetails();

        /** @var ConstraintViolationInterface $violation */
        foreach ($violations as $violation) {
            $details->addViolation($violation->getPropertyPath(), $violation->getMessage());
        }

        return $details;
    }
}
