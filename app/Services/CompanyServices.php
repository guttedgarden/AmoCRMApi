<?php

namespace App\Services;

use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ServicesInterface;

class CompanyServices extends BaseServices implements ServicesInterface{

    private $fields;

    public function __construct(string $uri, string $accessToken)
    {
        $this->httpClient = new AmoHttpClient($uri);
        $this->headers["Authorization"] = "Bearer " . $accessToken;
    }

    public function getAll($filter)
    {
        // TODO: Implement getAll() method.
        return $this->httpClient->request("GET", UriConstants::COMPANY_URI, $filter, $this->headers);
    }

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
        return ($this->httpClient->request("GET",UriConstants::COMPANY_URI . "/" . $id, [], $this->headers));
    }

    public function save(array $array)
    {
        // TODO: Implement save() method.
        return $this->httpClient->request("POST",UriConstants::COMPANY_URI, [$array], $this->headers);
    }

    public function update(array $array)
    {
        // TODO: Implement update() method.
        return $this->httpClient->request("POST", UriConstants::COMPANY_URI, [$array], $this->headers);
    }

    public function addNoteById(int $id, array $note)
    {
        // TODO: Implement addNoteById() method.
        return $this->httpClient->request("POST", UriConstants::COMPANY_URI . '/' . $id . '/notes', [$note], $this->headers);
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

    public function getFields()
    {
        // TODO: Implement getFields() method.
        return $this->fields;
    }
}