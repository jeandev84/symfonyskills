<?php
namespace App\Service\Serializer;

use App\Event\AfterDtoCreatedEvent;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;



class DTOSerializer implements SerializerInterface
{


    /**
     * @var SerializerInterface
    */
    private SerializerInterface $serializer;
    private EventDispatcherInterface $eventDispatcher;



    /**
     * @param EventDispatcherInterface $eventDispatcher
    */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;

        $this->serializer = new Serializer(
            [new ObjectNormalizer(
                classMetadataFactory: new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader())),
                nameConverter: new CamelCaseToSnakeCaseNameConverter()
            )], // normalizers
            [new JsonEncoder()] // encoders
        );
    }


    /**
     * @param mixed $data
     * @param string $format
     * @param array $context
     * @return string
    */
    public function serialize(mixed $data, string $format, array $context = []): string
    {
        return $this->serializer->serialize($data, $format, $context);
    }





    /**
     * @param mixed $data
     * @param string $type
     * @param string $format
     * @param array $context
     * @return mixed
    */
    public function deserialize(mixed $data, string $type, string $format, array $context = []): mixed
    {
         $dto =  $this->serializer->deserialize($data, $type, $format, $context);

         $event = new AfterDtoCreatedEvent($dto);

         // Dispatch an after dto created event
         $this->eventDispatcher->dispatch($event, $event::NAME);

         return $dto;
    }
}