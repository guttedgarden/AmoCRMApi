<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Services\BaseServices;

class Lead {

    private $fields;
    private $httpClient;
    private $headers;

    /**
     * @var AmoHttpClient
     */

    public function __construct($httpClient, $headers)
    {
        $this->httpClient = $httpClient;
        //$this->headers = ['Authorization: Bearer ' . $accessToken];
        $this->headers = $headers;
    }

    public function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->fields[$key];
    }

    public function __set($key, $value)
    {
        // TODO: Implement __set() method.
        return $this->fields[$key] = $value;
    }


    public function save(): Lead
    {
        if (!empty($this->fields["name"]) || !empty($this->fields["price"])) {
            $this->httpClient->request("POST",UriConstants::LEAD_URI_V4, [$this->fields], $this->headers);
        } else {
            throw new \Exception("The \"name\" or \"price\" of the transaction cannot be empty");
        }
        return $this;
    }



    public function update(): Lead{
        $this->httpClient->request("PATCH", UriConstants::LEAD_URI_V4 . "/" . $array["id"], $array, $this->headers);
        return $this;
    }
}