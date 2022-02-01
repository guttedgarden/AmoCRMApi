<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ModelInterface;
use App\Services\BaseServices;

class Lead implements ModelInterface {

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


    public function update(): Lead
    {
        if (!empty($this->fields["id"])) {
            $this->httpClient->request("PATCH", UriConstants::LEAD_URI_V4 . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new \Exception("The \"id\" of the transaction cannot be empty");
        }
        return $this;
    }

    public function getById($id): Lead
    {
        if (!empty($id)){
            $this->fields = $this->httpClient->request("GET",UriConstants::LEAD_URI_V4 . "/" . $id, [], $this->headers);
        } else {
            throw new \Exception("The \"id\" of the transaction cannot be empty");
        }
        return $this;
    }

    public function addNote($note):Lead
    {
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->httpClient->request("POST", UriConstants::LEAD_URI_V4 . '/' . $this->fields["id"] . '/notes', [$note], $this->headers);
        }
        else {
            throw new \Exception("The \"id\" of the transaction cannot be empty");
        }
        return $this;
    }
}