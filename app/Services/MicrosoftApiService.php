<?php

namespace App\Services;

use App\Contracts\CustomerInterface;
use App\Contracts\ExternalApiInterface;
use GuzzleHttp\Client;
use Laravel\Passport\Exceptions\InvalidAuthTokenException;

class MicrosoftApiService implements ExternalApiInterface
{
    public function __construct(public CustomerInterface $customer)
    {
    }

    public function getHttpHeaders(): array
    {
        $bearerToken = config('api_configs.microsoft.bearerToken');
        $headers = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearerToken,
            ],
            'http_errors' => false,
        ];
        return $headers;
    }

    public function getApiFullUrl()
    {
        return config('api_configs.microsoft.url');
    }

    public function getDataByEndPoint($endpoint = 'team'): array
    {
        return $this->getTeamUsers();
    }

    public function getTeamUsers(): array
    {
        $url = $this->getApiFullUrl();
        $client = new Client($this->getHttpHeaders());
        $response = $client->get($url);
        $resp['statusCode'] = $response->getStatusCode();
        $resp['bodyContents'] = $response->getBody()->getContents();
        if (array_key_exists('error', json_decode($resp['bodyContents'], true))) {
            throw new InvalidAuthTokenException(json_decode($resp['bodyContents'], true)['error']['message']);
        }
        $this->customer->fillNewCustomers(json_decode($resp['bodyContents'], true)['value']);

        return json_decode($resp['bodyContents'], true)['value'];
    }
}
