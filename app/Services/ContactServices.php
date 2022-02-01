<?php

namespace App\Services;

use App\Http\AmoHttpClient;
use App\Constants\UriConstants;
use App\Interfaces\ServicesInterface;
use App\Model\Contact;

class ContactServices extends BaseServices implements ServicesInterface{


    /**
     * ContactServices Class constructor
     *
     * @param string $uri
     * @param string $accessToken
     */
    public function __construct(string $uri, string $accessToken)
    {
        $this->httpClient = new AmoHttpClient($uri);
        $this->headers["Authorization"] = "Bearer " . $accessToken;
    }

    /**
     * Returns all contact as array
     *
     * @param array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        // TODO: Implement getAll() method.
        if (trim(empty($filter))) {
            $filter = [];
        }
        return $this->httpClient->request("GET", UriConstants::CONTACT_URI_V2, $filter, $this->headers);
    }


    /**
     * Creates a new instance of the Contact class
     *
     * @return Contact
     */
    public function create(): Contact
    {
        // TODO: Implement create() method.
        return new Contact($this->httpClient, $this->headers);
    }
}