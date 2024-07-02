<?php

use Aarchitecture\Repository\SecurityRepositoryInterface;

/**
 * @see /tests/concept_test.php
 */
class Concept
{
    private $client;
    private SecurityRepositoryInterface $security;

    public function __construct(SecurityRepositoryInterface $security)
    {
        $this->client = new \GuzzleHttp\Client();
        $this->security = $security;
    }

    public function getUserData()
    {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://jsonplaceholder.typicode.com/todos/1', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    private function getSecretKey()
    {
        return $this->security->getSecretKey();
    }

    private function saveSecretKey(string $secretKey)
    {
        $this->security->saveSecretKey($secretKey);
    }
}
