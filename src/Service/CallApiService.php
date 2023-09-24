<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;
    private $apiKey;

    public function __construct(HttpClientInterface $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    private function getApi (string $var)
    {
        $headers = [
            'HttpApiAccessToken' => $this->apiKey,
        ];
    
        $response  = $this->client->request(
            'GET',
            'https://api.oblyk.org/api/v1/public/crags/',
            [
                'headers' => $headers,
            ]
        );
    
        return $response->toArray();
        
    }
    public function getClimbingData(): array
    {
        return $this->getApi('546');
    }
}
