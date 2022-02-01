<?php

namespace App\Client;

use App\Oauth\AmoOauth;
use App\Services\CompanyServices;
use App\Services\LeadServices;
use App\Services\ContactServices;


class AmoApiClient extends AmoOauth
{

    /**
     * AmoApiClient Class constructor
     *
     * @param $subDomain
     * @param $client_id
     * @param $client_secret
     * @param $code
     * @param $redirect_uri
     * @param $pathToConfig
     */
    public function __construct($subDomain, $client_id, $client_secret, $code, $redirect_uri, $pathToConfig)
    {
        //Calling the parent method
        parent::__construct($subDomain, $client_id, $client_secret, $code, $redirect_uri, $pathToConfig);
    }

    /**
     * This method looks for the desired service
     *
     * @param $name
     * @return CompanyServices|ContactServices|LeadServices|void
     */
    private function getService($name)
    {
        if ($name === "leads"){
            return new LeadServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "contacts"){
            return new ContactServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "company"){
            return new CompanyServices($this->apiUri, $this->configJSON["access_token"]);
        }
    }

    /**
     * @return LeadServices
     */
    public function leads(): LeadServices
    {
        return $this->getService("leads");
    }

    /**
     * @return ContactServices
     */
    public function contacts(): ContactServices
    {
        return $this->getService("contacts");
    }

    /**
     * @return CompanyServices
     */
    public function company(): CompanyServices
    {
        return $this->getService("company");
    }
}