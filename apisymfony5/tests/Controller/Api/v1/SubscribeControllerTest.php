<?php

namespace App\Tests\Controller\Api\v1;

use App\Tests\AbstractControllerTest;
use Symfony\Component\HttpFoundation\Response;

class SubscribeControllerTest extends AbstractControllerTest
{
    public function testSubscribe(): void
    {
        $content = json_encode(['email' => 'test@demo.com', 'agreed' => true]);

        $this->client->request('POST', '/api/v1/subscribe', [], [], [], $content);

        $this->assertResponseIsSuccessful();
    }


    public function testSubscribeNotAgreed(): void
    {
        $content = json_encode(['email' => 'test@demo.com', 'agreed' => true]);

        $this->client->request('POST', '/api/v1/subscribe', [], [], [], $content);

        $responseContent = json_decode($this->client->getResponse()->getContent());

        $this->assertResponseStatusCodeSame(Response::HTTP_BAD_REQUEST);
        $this->assertJsonDocumentMatches($responseContent, [
             '$.message' => 'validation failed',
             '$.details' => self::countOf(1),
             '$.details.violations[0].field' => 'agreed',
        ]);
    }
}
