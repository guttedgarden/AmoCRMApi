<?php


namespace App\Http;

use App\Client\AmoApiClient;
use App\Constants\UriConstants;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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

    /**
     * Function for submitting a request and receiving a response
     *
     * @param $method
     * @param $uri
     * @param array $jsonBody
     * @param array $headers
     * @return array|mixed|ResponseInterface
     * @throws GuzzleException
     */
    public function request($method, $uri, array $jsonBody, string $token = null)
    {
        $headers = UriConstants::HEADERS_TOKEN;

        if($token !=null){
            $headers["Authorization"] = "Bearer " . $token;
        }

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

    /**
     * @param ResponseInterface $response
     * @return array|mixed
     */
    private function responseParse (ResponseInterface $response)
    {
        $body = $response->getBody();
        $decodeBody = json_decode($body, true);

        return $decodeBody ?? [];
    }
}