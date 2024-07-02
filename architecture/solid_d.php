<?php

/**
 * если XMLHttpService определен как модуль нижнего уровня,
 * Http как модуль верхнего уровня, то разворачиваем зависимость
 * в сторону абстракции XMLHTTPRequestService
 */
class XMLHttpService extends XMLHTTPRequestService
{
}

class Http
{
    private $service;

    public function __construct(XMLHTTPRequestService $service)
    {
    }

    public function get(string $url, array $options)
    {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url, array $options)
    {
        $this->service->request($url, 'POST', $options);
    }
}

/**
 * случай если Http - модуль нижнего уровня, 
 * XMLHttpService - модуль/сервис верхнего уровня,
 * то разворачиваем зависимость в сторону абстракции HttpInterface
 */
interface HttpInterface
{
    public function get(string $url, array $options);
    public function post(string $url, array $options);
}

class HttpClient implements HttpInterface
{
    public function get(string $url, array $options)
    {
        echo sprintf('GET Request: %s?%s', $url, http_build_query($options));
    }
    public function post(string $url, array $options)
    {
        echo 'POST Request: ' . $url;
    }
}

abstract class XMLHTTPRequestService
{

    public function __construct(protected readonly HttpInterface $service)
    {
    }

    public function request(string $url, string $method, array $options = [])
    {
        return match ($method) {

            'GET' => $this->service->get($url, $options),
            'POST' => $this->service->post($url, $options)
        };
    }
}
