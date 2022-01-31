<?php

namespace App\Services;

use App\Http\AmoHttpClient;
use App\Constants\UriConstants;
use App\Interfaces\ServicesInterface;
use App\Services\BaseServices;

class ContactServices extends BaseServices implements ServicesInterface{


    public function __construct(string $uri, string $accessToken)
    {
        $this->httpClient = new AmoHttpClient($uri);
        $this->headers["Authorization"] = "Bearer " . $accessToken;
    }

    public function getAll($filter): array
    {
        // TODO: Implement getAll() method.
        if (trim(empty($filter))) {
            $filter = [];
        }
        return $this->httpClient->request("GET", UriConstants::CONTACT_URI_V2, $filter, $this->headers);
    }


    public function getById(int $id)
    {
        // TODO: Implement getById() method.
        return $this->httpClient->request("GET",UriConstants::CONTACT_URI_V4 . "/" . $id, [], $this->headers);
    }

    public function update(array $array)
    {
        // TODO: Implement update() method.
        return $this->httpClient->request("PATCH", UriConstants::CONTACT_URI_V4 . "/" . $array["id"], $array, $this->headers);
    }

    public function save(array $array) :array
    {
        // TODO: Implement save() method.
        return $this->httpClient->request("POST",UriConstants::CONTACT_URI_V4, [$array], $this->headers);
    }

    public function addNoteById(int $id, array $note)
    {
        // TODO: Implement addNoteById() method.
        return $this->httpClient->request("POST", UriConstants::CONTACT_URI_V4 . '/' . $id . '/notes', [$note], $this->headers);
    }

}