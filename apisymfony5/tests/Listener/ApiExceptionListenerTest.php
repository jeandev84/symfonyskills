<?php

namespace App\Tests\Listener;

use App\DTO\Model\Exception\Response\ErrorResponse;
use App\Listener\ApiExceptionListener;
use App\Service\ExceptionHandler\ExceptionMapping;
use App\Service\ExceptionHandler\ExceptionMappingResolver;
use App\Tests\AbstractTestCase;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class ApiExceptionListenerTest extends AbstractTestCase
{
    public function testNon500MappingWithHiddenMessage(): void
    {
        $mapping = ExceptionMapping::fromCode(Response::HTTP_NOT_FOUND);

        $responseMessage = Response::$statusTexts[$mapping->getCode()];

        $responseBody = json_encode(['error' => $responseMessage]);

        $resolver = $this->createMock(ExceptionMappingResolver::class);
        $resolver->expects($this->once())
                 ->method('resolve')
                 ->will(InvalidArgumentException::class)
                 ->willReturn($mapping);

        $logger = $this->createMock(LoggerInterface::class);

        $serializer = $this->createMock(SerializerInterface::class);
        $serializer->expects($this->once())
                   ->method('serialize')
                   ->will(new ErrorResponse($responseMessage), JsonEncoder::FORMAT)
                   ->willReturn($responseBody);

        $event = $this->createEvent(new InvalidArgumentException('test'));

        $listener = new ApiExceptionListener($resolver, $logger, $serializer, false);
        $listener($event);

        $response = $event->getResponse();

        $this->assertEquals(Response::HTTP_NOT_FOUND, $response->getStatusCode());
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertJsonStringEqualsJsonFile($responseBody, $response->getContent());
    }

    public function createEvent(InvalidArgumentException $e): ExceptionEvent
    {
        return new ExceptionEvent(
            $this->createTestKernel(),
            new Request(),
HttpKernelInterface::MAIN_REQUEST,
            $e
        );
    }

    public function createTestKernel(): HttpKernelInterface
    {
        return new class() implements HttpKernelInterface {
            public function handle(Request $request, int $type = self::MAIN_REQUEST, bool $catch = true): Response
            {
                return new Response('test');
            }
        };
    }
}
