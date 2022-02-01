<?php


namespace App\Http;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;


class AmoHttpClient{

    /**
     * Guzzle client
     *
     * @var Client
     */
    private $httpClient;

    /** AmoHttpClient Class constructor
     *
     * @param $domain
     */
    public function __construct($domain)
    {
        //Creating GuzzleHttp
        $this->httpClient = new Client([
            'base_uri' => $domain,
            'timeout' => 3.0,
            'http_errors' => true
        ]);
    }

    //Function for submitting a request and receiving a response
    public function request($method, $uri, array $jsonBody, array $headers)
    {
        try {
            $response = $this->httpClient->request($method, $uri, [
                //Headers array containing User-Agent and Content-Type
                "headers" => $headers,
                "json" => $jsonBody
            ]);
            //Response parsing
            $response = $this->responseParse($response);
        } catch (\Exception $exception){
            echo $exception;
        }

        return $response;
    }

    private function responseParse (ResponseInterface $response)
    {
        $body = $response->getBody();
        $decodeBody = json_decode($body, true);

        return $decodeBody ?? [];
    }
}