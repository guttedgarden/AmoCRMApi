<?php

namespace App\Model;

use App\Constants\UriConstants;
use App\Interfaces\ModelInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class UserModel extends BaseModel {


    /**
     * Getting a User from AmoCRM by ID
     *
     * @param int $id
     * @return $this
     * @throws GuzzleException
     * @throws Exception
     */
    public function getUserById(int $id): UserModel
    {
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::USER_URI . "/" . $id);
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
     * @throws GuzzleException
     * @throws Exception
     */
    public function getRoleById(int $id): UserModel{
        // TODO: Implement getById() method.
        if($id > 0){
            $this->fields = $this->httpClient->request("GET",UriConstants::ROLE_URI . "/" . $id);
        } else {
            throw new Exception("The \"id\" field cannot be a negative number!");
        }
        return $this;
    }
}