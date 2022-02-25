<?php

namespace App\Services;

use App\Client\AmoApiClient;
use App\Http\AmoHttpClient;
use App\Model\LeadModel;
use App\Constants\UriConstants;
use App\Interfaces\ServicesInterface;

class LeadServices extends BaseServices implements ServicesInterface {

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
        return $this->httpClient->request("GET",UriConstants::LEAD_URI_V2, $filter, $this->token);
    }

    /**
     * Creates a new instance of the LeadModel class
     *
     * @return LeadModel
     */
    public function create(): LeadModel
    {
        return new LeadModel($this->httpClient,$this->token);
    }
}