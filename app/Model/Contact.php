<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;

class Contact implements ModelInterface {

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

    public function save(): Contact
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["name"])){
            $this->fields = $this->httpClient->request("POST",UriConstants::CONTACT_URI_V4, [$this->fields], $this->headers);
        } else {
            throw new \Exception("The \"name\" field cannot be empty for a contact");
        }
        return $this;
    }

    public function update(): Contact
    {
        // TODO: Implement update() method.
        if (!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::CONTACT_URI_V4 . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new \Exception("The \"id\" field cannot be empty for a contact");
        }
        return $this;
    }

    public function getById($id): Contact
    {
        // TODO: Implement getById() method.
        if (!empty($id)){
            $this->fields = $this->httpClient->request("GET",UriConstants::CONTACT_URI_V4 . "/" . $id, [], $this->headers);
        } else{
            throw new \Exception("The \"id\" field cannot be empty for a contact");
        }
        return $this;
    }

    public function addNote($note): Contact
    {
        // TODO: Implement addNote() method.
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::CONTACT_URI_V4 . '/' . $this->fields["id"] . '/notes', [$note], $this->headers);
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