<?php

namespace App\Services;

use App\Client\AmoApiClient;
use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ServicesInterface;

use App\Model\UserModel;
use App\Services\BaseServices;



class UserServices extends BaseServices {

    /**
     * Returns all task as array
     *
     * @param array $filter
     * @return array
     */
    public function getAllUsers(array $filter): array
    {
        // TODO: Implement getAll() method.
        return $this->httpClient->request("GET", UriConstants::USER_URI, $filter, $this->headers);
    }

    public function getAllRoles(array $filter): array{
        // TODO: Implement getAll() method.
        return $this->httpClient->request("GET", UriConstants::ROLE_URI, $filter, $this->headers);
    }

    /**
     * Creates a new instance of the TaskModel class
     *
     * @return UserModel
     */
    public function create(): UserModel
    {
        // TODO: Implement create() method.
        return new UserModel($this->httpClient, $this->headers);
    }
}