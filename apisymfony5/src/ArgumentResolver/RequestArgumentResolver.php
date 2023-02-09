<?php

namespace App\ArgumentResolver;

use App\Attribute\RequestBody;
use App\Exception\Request\RequestBodyConvertException;
use App\Exception\Validation\DTO\Model\ValidationException;
use Generator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Throwable;

class RequestArgumentResolver implements ArgumentValueResolverInterface
{
    public function __construct(private SerializerInterface $serializer, private ValidatorInterface $validator)
    {
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        // Check concrete attribute RequestBody
        return count($argument->getAttributes(RequestBody::class, ArgumentMetadata::IS_INSTANCEOF)) > 0;
    }

    public function resolve(Request $request, ArgumentMetadata $argument): ?Generator
    {
        try {
            // DTO Model
            $model = $this->serializer->deserialize(
                $request->getContent(),
                $argument->getType(),
                JsonEncoder::FORMAT
            );
        } catch (Throwable $throwable) {
            throw new RequestBodyConvertException($throwable);
        }

        $errors = $this->validator->validate($model);

        if (count($errors) > 0) {
            throw new ValidationException($errors);
        }

        yield $model;
    }
}
