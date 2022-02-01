<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;

class Contact implements ModelInterface {

    private $fields;
    private $httpClient;
    private $headers;

    /**
     * Contact Class constructor
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
     * Saving, creating and sending a contact to AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function save(): Contact
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["name"])){
            $this->fields = $this->httpClient->request("POST",UriConstants::CONTACT_URI_V4, [$this->fields], $this->headers);
        } else {
            throw new Exception("The \"name\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Saving and updating the contact from AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function update(): Contact
    {
        // TODO: Implement update() method.
        if (!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::CONTACT_URI_V4 . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new Exception("The \"id\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Getting a contact from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getById(int $id): Contact
    {
        // TODO: Implement getById() method.
        if (!empty($id)){
            $this->fields = $this->httpClient->request("GET",UriConstants::CONTACT_URI_V4 . "/" . $id, [], $this->headers);
        } else{
            throw new Exception("The \"id\" field cannot be empty for a contact");
        }
        return $this;
    }

    /**
     * Adds a note to an existing contact
     *
     * @param array $note
     * @return $this
     * @throws Exception
     */
    public function addNote(array $note): Contact
    {
        // TODO: Implement addNote() method.
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::CONTACT_URI_V4 . '/' . $this->fields["id"] . '/notes', [$note], $this->headers);
        } else {
            throw new Exception("The \"id\", \"note_type\", \"text\" field cannot be empty for a contact");
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