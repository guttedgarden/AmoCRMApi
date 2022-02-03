<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;

class UserModel {

    private $fields;
    private $httpClient;
    private $headers;

    /**
     * UserModel Class constructor
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
     * Getting a User from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getUserById(int $id): UserModel
    {
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::USER_URI . "/" . $id, [], $this->headers);
        } else {
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }

    /**
     * Getting a Role from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws Exception
     */
    public function getRoleById(int $id): UserModel{
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::ROLE_URI . "/" . $id, [], $this->headers);
        } else {
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }
        public function getFieldsAsArray()
    {
        // TODO: Implement getFieldsAsArray() method.
        return $this->fields;
    }

}