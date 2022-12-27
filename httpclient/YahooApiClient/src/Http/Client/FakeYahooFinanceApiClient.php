<?php
namespace App\Http\Client;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * For Testing API
*/
class FakeYahooFinanceApiClient
{
    public static $statusCode = 200;
    public static $content = '';

    public function fetchStockProfile(string $symbol, string $region): JsonResponse
    {
        return new JsonResponse(self::$content, self::$statusCode, [], $json = true); // Already json, don't encode
    }


    public static function setContent(array $overrides): void
    {
         self::$content = json_encode(array_merge([
             'symbol' => 'AMZN',
             'region' => 'US',
             'exchange_name' => 'NasdaqGS',
             'short_name' => 'Amazon.com, Inc.'
         ], $overrides));
    }
}