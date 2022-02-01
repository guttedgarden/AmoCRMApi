<?php

namespace App\Services;

use App\Http\AmoHttpClient;
use App\Constants\UriConstants;
use App\Interfaces\ServicesInterface;
use App\Model\Contact;
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


    public function create(): Contact
    {
        // TODO: Implement create() method.
        return new Contact($this->httpClient, $this->headers);
    }
}