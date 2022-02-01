<?php

namespace App\Services;

use App\Http\AmoHttpClient;
use App\Model\Lead;
use App\Constants\UriConstants;
use App\Interfaces\ServicesInterface;

class LeadServices extends BaseServices implements ServicesInterface {

    /**
     * LeadServices Class constructor
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
     * Returns all leads as array
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
        return $this->httpClient->request("GET",UriConstants::LEAD_URI_V2, $filter, $this->headers);
    }

    /**
     * Creates a new instance of the Lead class
     *
     * @return Lead
     */
    public function create(): Lead
    {
        return new Lead($this->httpClient, $this->headers);
    }
}