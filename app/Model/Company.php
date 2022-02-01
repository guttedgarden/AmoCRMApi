<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;

class Company implements ModelInterface {

    private $fields;
    private $httpClient;
    private $headers;

    public function __construct($httpClient, $headers)
    {
        $this->httpClient = $httpClient;
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

    public function save(): Company
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["name"])){
            $this->fields = $this->httpClient->request("POST",UriConstants::COMPANY_URI, [$this->fields], $this->headers);
        } else {
            throw new \Exception("The field \"name\" cannot be empty for the company");
        }
        return $this;
    }

    public function update(): Company
    {
        // TODO: Implement update() method.
        if (!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::COMPANY_URI . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new \Exception("The field \"id\" cannot be empty for the company");
        }
        return $this;
    }

    public function getById($id): Company
    {
        // TODO: Implement getById() method.
        if(!empty($id)){
            $this->fields = $this->httpClient->request("GET",UriConstants::COMPANY_URI . "/" . $id, [], $this->headers);
        } else {
            throw new \Exception("The field \"id\" cannot be empty for the company");
        }
        return $this;
    }

    public function addNote($note): Company
    {
        // TODO: Implement addNote() method.
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::COMPANY_URI . '/' . $this->fields["id"] . '/notes', [$note], $this->headers);
        } else {
            throw new \Exception("The \"id\", \"note_type\", \"text\" field cannot be empty for a contact");
        }
        return $this;
    }

    public function getFieldsAsArray()
    {
        // TODO: Implement getFieldsAsArray() method.
        return $this->fields;
    }
}