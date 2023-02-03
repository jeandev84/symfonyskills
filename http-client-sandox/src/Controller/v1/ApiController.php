<?php
namespace App\Controller\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/api/v1", name="api.v1.")
*/
class ApiController extends AbstractController
{
    /**
     * @Route("/", name="list")
     * @param HttpClientInterface $client
     * @return Response
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws DecodingExceptionInterface
    */
    public function list(HttpClientInterface $client): Response
    {
        $response = $client->request('GET', 'https://api.github.com/users/jeandev84/repos', [
            'query' => [
                'sort' => 'created', // sort by createdAt
            ]
        ]);

        // dd($response->getContent());
        // dd($response->toArray());

        return $this->render('api/v1/list.html.twig', [
            'repositories' => $response->toArray()
        ]);
    }


    /**
     * @Route("/show/{id}", name="show")
     * @param $id
     * @param HttpClientInterface $client
     * @return Response
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
    */
    public function show($id, HttpClientInterface $client): Response
    {
        $response = $client->request('GET', "https://api.github.com/repositories/{$id}");

        return $this->render('api/v1/show.html.twig', [
            'repository' => $response->toArray()
        ]);
    }

    /**
     * @Route("/create", name="app_api")
     * @param HttpClientInterface $client
     * @return Response
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws DecodingExceptionInterface
    */
    public function create(HttpClientInterface $client): Response
    {
        $response = $client->request('GET', 'https://api.github.com/users/jeandev84/repos', [
            'query' => [
                'sort' => 'created', // sort by createdAt
            ]
        ]);

        // dd($response->getContent());
        // dd($response->toArray());

        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
            'users' => $response->toArray()
        ]);
    }
}
