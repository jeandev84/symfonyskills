<?php
namespace App\Service\Http\Client;

use App\Service\Http\Client\Contract\HttpClientServiceInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class SymfonyHttpClientService implements HttpClientServiceInterface
{

    private $client;


    public function __construct(HttpClientInterface $client)
    {
         $this->client = $client;
    }


    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws TransportExceptionInterface
    */
    public function get(string $url, array $options = []): ResponseInterface
    {
        return $this->client->request('GET', $url, $options);
    }




    /**
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws TransportExceptionInterface
    */
    public function post(string $url, array $options = []): ResponseInterface
    {
        return $this->client->request('POST', $url, $options);
    }
}