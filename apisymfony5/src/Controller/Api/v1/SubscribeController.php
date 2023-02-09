<?php

namespace App\Controller\Api\v1;

use App\DTO\Model\User\Subscriber\SubscriberRequest;
use App\Service\User\Subscriber\SubscriberService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use OpenApi\Attributes\RequestBody;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SubscribeController extends AbstractController
{
    public function __construct(protected SubscriberService $subscriberService)
    {
    }

    /**
     * @OA\Response(
     *     response=200,
     *     description="Subscribe email to newsletter mailing list",
     *     @Model(type=BookListResponse::class)
     * )
     */
    #[Route(path: '/api/v1/subscribe', name: 'api.v1.subscribe', methods: ['POST'])]
    public function subscribe(#[RequestBody] SubscriberRequest $subscriberRequest): JsonResponse
    {
        $this->subscriberService->subscribe($subscriberRequest);

        return $this->json(null);
    }
}
