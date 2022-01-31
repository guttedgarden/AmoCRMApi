<?php

namespace App\Services;

use App\Http\AmoHttpClient;
use App\Model\Lead;
use App\Services\BaseServices;
use App\Constants\UriConstants;
use App\Interfaces\ServicesInterface;

class LeadServices extends BaseServices implements ServicesInterface {

    public function __construct(string $uri, string $accessToken)
    {
        $this->httpClient = new AmoHttpClient($uri);
        //$this->headers = ['Authorization: Bearer ' . $accessToken];
        $this->headers["Authorization"] = "Bearer " . $accessToken;
    }

    public function getAll($filter)
    {
        if (trim(empty($filter))) {
            $filter = [];
        }
        // TODO: Implement getAll() method.
        return $this->httpClient->request("GET",UriConstants::LEAD_URI_V2, $filter, $this->headers);
    }


    public function getById(int $id)
    {
        // TODO: Implement getById() method.
        $this->fields = $this->httpClient->request("GET",UriConstants::LEAD_URI_V4 . "/" . $id, [], $this->headers);
        return $this->fields;
    }


    public function save(array $array) :array
    {
        // TODO: Implement create() method.
        return $this->httpClient->request("POST",UriConstants::LEAD_URI_V4, [$array], $this->headers);
    }

    public function update(array $array) : array
    {
//        print_r($this);
//        die();
        // TODO: Implement update() method.
        return $this->httpClient->request("PATCH", UriConstants::LEAD_URI_V4 . "/" . $array["id"], $array, $this->headers);
    }

    public function addNoteById (int $id, array $note){
        // TODO: Implement addNoteById() method.
        return $this->httpClient->request("POST", UriConstants::LEAD_URI_V4 . '/' . $id . '/notes', [$note], $this->headers);
    }


}