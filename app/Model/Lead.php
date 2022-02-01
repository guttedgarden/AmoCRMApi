<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;

class Lead implements ModelInterface {

    private $fields;
    private $httpClient;
    private $headers;


    /**
     * Lead Class constructor
     *
     * @param $httpClient
     * @param $headers
     */
    public function __construct($httpClient, $headers)
    {
        $this->httpClient = $httpClient;
        //$this->headers = ['Authorization: Bearer ' . $accessToken];
        $this->headers = $headers;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->fields[$key];
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function __set($key, $value)
    {
        // TODO: Implement __set() method.
        return $this->fields[$key] = $value;
    }

    /**
     * Saving, creating and sending a lead to AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function save(): Lead
    {
        if (!empty($this->fields["name"]) || !empty($this->fields["price"])) {
            $this->fields = $this->httpClient->request("POST",UriConstants::LEAD_URI_V4, [$this->fields], $this->headers);
        } else {
            throw new Exception("The \"name\" or \"price\" of the transaction cannot be empty");
        }
        return $this;
    }


    /**
     * Saving and updating the lead from AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function update(): Lead
    {
        if (!empty($this->fields["id"])) {
            $this->fields = $this->httpClient->request("PATCH", UriConstants::LEAD_URI_V4 . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new Exception("The \"id\" of the transaction cannot be empty");
        }
        return $this;
    }

    /**
     * Getting a lead from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getById(int $id): Lead
    {
        if (!empty($id)){
            $this->fields = $this->httpClient->request("GET",UriConstants::LEAD_URI_V4 . "/" . $id, [], $this->headers);
        } else {
            throw new Exception("The \"id\" of the transaction cannot be empty");
        }
        return $this;
    }

    /**
     * Adds a note to an existing lead
     *
     * @param array $note
     * @return $this
     * @throws Exception
     */
    public function addNote(array $note):Lead
    {
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::LEAD_URI_V4 . '/' . $this->fields["id"] . '/notes', [$note], $this->headers);
        }
        else {
            throw new Exception("The \"id\" of the transaction cannot be empty");
        }
        return $this;
    }

    /**
     * Returns an array of company fields
     *
     * @return mixed
     */
    public function getFieldsAsArray()
    {
        // TODO: Implement getFieldsAsArray() method.
        return $this->fields;
    }
}