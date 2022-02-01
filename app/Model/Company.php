<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;

class Company implements ModelInterface {

    private $fields;
    private $httpClient;
    private $headers;

    /**
     * Company Class constructor
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
     * Saving, creating and sending a company to AmoCRM
     * @return $this
     * @throws Exception
     */
    public function save(): Company
    {
        // TODO: Implement save() method.
        if (!empty($this->fields["name"])){
            $this->fields = $this->httpClient->request("POST",UriConstants::COMPANY_URI, [$this->fields], $this->headers);
        } else {
            throw new Exception("The field \"name\" cannot be empty for the company");
        }
        return $this;
    }

    /**
     * Saving and updating the company from AmoCRM
     *
     * @return $this
     * @throws Exception
     */
    public function update(): Company
    {
        // TODO: Implement update() method.
        if (!empty($this->fields["id"])){
            $this->fields = $this->httpClient->request("PATCH", UriConstants::COMPANY_URI . "/" . $this->fields["id"], $this->fields, $this->headers);
        } else {
            throw new Exception("The field \"id\" cannot be empty for the company");
        }
        return $this;
    }

    /**
     * Getting a company from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getById(int $id): Company
    {
        // TODO: Implement getById() method.
        if(!empty($id)){
            $this->fields = $this->httpClient->request("GET",UriConstants::COMPANY_URI . "/" . $id, [], $this->headers);
        } else {
            throw new Exception("The field \"id\" cannot be empty for the company");
        }
        return $this;
    }

    /**
     * Adds a note to an existing company
     *
     * @param array $note
     * @return $this
     * @throws Exception
     */
    public function addNote(array $note): Company
    {
        // TODO: Implement addNote() method.
        if (!empty($this->fields["id"]) || !empty($note["note_type"]) || !empty($note["text"])) {
            $this->fields = $this->httpClient->request("POST", UriConstants::COMPANY_URI . '/' . $this->fields["id"] . '/notes', [$note], $this->headers);
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