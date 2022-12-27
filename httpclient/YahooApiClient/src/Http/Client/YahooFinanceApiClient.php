<?php
namespace App\Http\Client;

use App\Http\FinanceApiClientInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;


/**
 * @class YahooFinanceApiClient
 *
 * @package App\Http\Client
*/
class YahooFinanceApiClient implements FinanceApiClientInterface
{

      /**
       * @var HttpClientInterface
      */
      private HttpClientInterface $client;


      private const URL              = 'https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-profile';
      private const X_RAPID_API_HOST = 'apidojo-yahoo-finance-v1.p.rapidapi.com';
      private $rapidApiKey;




      /**
       * @param HttpClientInterface $client
       * @param string $rapidApiKey
      */
      public function __construct(HttpClientInterface $client, $rapidApiKey)
      {
            $this->client      = $client;
            $this->rapidApiKey = $rapidApiKey;
      }


      /**
       * @inheritDoc
       * @return JsonResponse
      */
      public function fetchStockProfile($symbol, $region): JsonResponse
      {
          $response = $this->client->request('GET', self::URL, [
              'query'   => [
                  'symbol' => $symbol,
                  'region' => $region
              ],
              'headers' => [
                  'x-rapidapi-host' => self::X_RAPID_API_HOST,
                  'x-rapidapikey'   => $this->rapidApiKey,
              ]
          ]);


          // @todo handle non 200 responses
          if ($response->getStatusCode() !== 200) {
              return new JsonResponse('Finance API Client Error ', 400);
          }

          // We need the price endpoint from client content
          $stockProfile = json_decode($response->getContent())->price; /* dd($stockProfile); */


          $stockProfileAsArray = [
              'symbol'        => $stockProfile->symbol,
              'shortName'     => $stockProfile->shortName,
              'region'        => $region,
              'exchangeName'  => $stockProfile->exchangeName,
              'currency'      => $stockProfile->currency,
              'price'         => $stockProfile->regularMarketPrice->raw,
              'previousClose' => $stockProfile->regularMarketPreviousClose->raw,
              'priceChange'   => $stockProfile->regularMarketPrice->raw - $stockProfile->regularMarketPreviousClose->raw
          ];

          return new JsonResponse($stockProfileAsArray, 200);
      }
}