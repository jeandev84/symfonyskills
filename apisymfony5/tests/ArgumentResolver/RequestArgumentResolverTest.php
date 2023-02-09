<?php

namespace App\Tests\ArgumentResolver;

use App\ArgumentResolver\RequestArgumentResolver;
use App\Attribute\RequestBody;
use App\Exception\Request\RequestBodyConvertException;
use App\Exception\Validation\DTO\Model\ValidationException;
use App\Tests\AbstractTestCase;
use stdClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RequestArgumentResolverTest extends AbstractTestCase
{
    private SerializerInterface $serializer;

    private ValidatorInterface $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->validator = $this->createMock(ValidatorInterface::class);
    }

    public function testSupports(): void
    {
        $meta = new ArgumentMetadata('some', null, false, false, null, false, [
              new RequestBody(),
         ]);

        $this->assertTrue($this->createRequestArgumentResolver()->supports(new Request(), $meta));
    }

    public function testNotSupports(): void
    {
        $meta = new ArgumentMetadata('some', null, false, false, null);

        $this->assertFalse($this->createRequestArgumentResolver()->supports(new Request(), $meta));
    }

    public function testResolveThrowsWhenDeserialize(): void
    {
        $this->expectException(RequestBodyConvertException::class);

        $request = new Request([], [], [], [], [], [], 'testing content');
        $meta = new ArgumentMetadata('some', stdClass::class, false, false, null, false, [
            new RequestBody(),
        ]);

        $this->serializer->expects($this->once())
                         ->method('deserialize')
                         ->with('testing content', stdClass::class, JsonEncoder::FORMAT)
                         ->willThrowException(new \Exception());

        $this->createRequestArgumentResolver()->resolve($request, $meta)->next();
    }

    public function testResolveThrowsWhenValidationFails(): void
    {
        $this->expectException(ValidationException::class);

        $body = ['test' => true];
        $encodedBody = json_encode($body);

        $request = new Request([], [], [], [], [], [], $encodedBody);
        $meta = new ArgumentMetadata('some', stdClass::class, false, false, null, false, [
            new RequestBody(),
        ]);

        $this->serializer->expects($this->once())
            ->method('deserialize')
            ->with($encodedBody, stdClass::class, JsonEncoder::FORMAT)
            ->willReturn($body);

        $this->validator->expects($this->once())
              ->method('validate')
              ->with($body)
              ->willReturn(new ConstraintViolationList([
                 new ConstraintViolation('error', null, [], null, 'some', null),
             ]));

        $this->createRequestArgumentResolver()->resolve($request, $meta)->next();
    }

    public function testResolve(): void
    {
        $body = ['test' => true];

        $encodedBody = json_encode($body);

        $request = new Request([], [], [], [], [], [], $encodedBody);
        $meta = new ArgumentMetadata('some', stdClass::class, false, false, null, false, [
            new RequestBody(),
        ]);

        $this->serializer->expects($this->once())
            ->method('deserialize')
            ->with($encodedBody, stdClass::class, JsonEncoder::FORMAT)
            ->willReturn($body);

        $this->validator->expects($this->once())
            ->method('validate')
            ->with($body)
            ->willReturn(new ConstraintViolationList([]));

        $actual = $this->createRequestArgumentResolver()->resolve($request, $meta);

        $this->assertEquals($body, $actual->current());
    }

    private function createRequestArgumentResolver(): RequestArgumentResolver
    {
        return new RequestArgumentResolver($this->serializer, $this->validator);
    }
}
