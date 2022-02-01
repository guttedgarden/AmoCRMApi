<?php

namespace App\Services;

use App\Http\AmoHttpClient;
use App\Model\Lead;
use App\Constants\UriConstants;
use App\Interfaces\ServicesInterface;

class LeadServices extends BaseServices implements ServicesInterface {

    public function __construct(string $uri, string $accessToken)
    {
        $this->httpClient = new AmoHttpClient($uri);
        $this->headers["Authorization"] = "Bearer " . $accessToken;
    }

    public function getAll($filter)
    {
        // TODO: Implement getAll() method.
        if (trim(empty($filter))) {
            $filter = [];
        }
        return $this->httpClient->request("GET",UriConstants::LEAD_URI_V2, $filter, $this->headers);
    }

    public function create(): Lead
    {
        return new Lead($this->httpClient, $this->headers);
    }
}