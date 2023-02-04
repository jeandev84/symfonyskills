<?php
namespace App\Service\Github;

use App\Security\User;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GithubUserProvider
{
     private $githubClient;
     private $githubId;
     private $httpClient;


     /**
      * GithubUserProvider
      *
      * @param HttpClientInterface $httpClient
      * @param $githubClient
      * @param $githubId
    */
    public function __construct(HttpClientInterface $httpClient, $githubClient, $githubId)
    {
        $this->httpClient = $httpClient;
        $this->githubClient = $githubClient;
        $this->githubId = $githubId;
    }


    /**
     * @param string $code
     * @return User|null
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
    */
    public function loadUserFromGithub(string $code): ?User
    {
          $url = sprintf("https://github.com/login/oauth/access_token?client_id=%s&client_secret=%s&code=%s",
                 $this->githubClient,
                 $this->githubId,
                 $code
          );


          $response = $this->httpClient->request('POST', $url, [
              'headers' => [
                  'Accept' => 'application/json'
              ]
          ]);

          $payload = $response->toArray();

          // dd($payload);

          if (! isset($payload['access_token'])) {
               return null;
          }

          $token = $payload['access_token'];

          // FIND USER BY TOKEN
          $response = $this->httpClient->request('GET', 'https://api.github.com/user', [
              'headers' => [
                  'Authorization' => "token $token"
              ]
          ]);


          return new User($response->toArray());
    }

}