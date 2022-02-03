<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;

class CustomerModel implements ModelInterface{


    private $httpClient;
    private $headers;
    private $fields;

    /**
     * CustomerModel Class constructor
     *
     * @param $httpClient
     * @param $headers
     */
    public function __construct($httpClient, $headers)
    {
        $this->httpClient = $httpClient;
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
     * Saving, creating and sending a customer to AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function save(): CustomerModel
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["name"])){
            $this->fields = $this->httpClient->request("POST",UriConstants::CUSTOMER_URI, [$this->fields], $this->headers);
        } else {
            throw new Exception("The \"name\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Saving and updating the customer from AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function update(): CustomerModel
    {
        // TODO: Implement update() method.
        if (!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::CUSTOMER_URI . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new Exception("The \"id\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Getting a CustomerModel from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getById(int $id): CustomerModel
    {
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::CUSTOMER_URI . "/" . $id, [], $this->headers);
        } else{
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }

    /**
     * Adds a note to an existing customer
     *
     * @param NoteModel $note
     * @return $this
     * @throws Exception
     */
    public function addNote(NoteModel $note): CustomerModel
    {
        $note = $note->getFields();
        // TODO: Implement addNote() method.
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::CUSTOMER_URI . '/' . $this->fields["id"] . '/notes', [$note], $this->headers);
        } else {
            throw new Exception("The \"id\", \"note_type\", \"text\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Returns an array of customer fields
     *
     * @return mixed
     */
    public function getFieldsAsArray()
    {
        // TODO: Implement getFieldsAsArray() method.
        return $this->fields;
    }
}