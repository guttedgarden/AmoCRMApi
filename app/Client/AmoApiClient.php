<?php

namespace App\Client;

use App\Model\TaskModel;
use App\Oauth\AmoOauth;
use App\Services\CompanyServices;
use App\Services\CustomerServices;
use App\Services\LeadServices;
use App\Services\ContactServices;
use App\Services\TaskServices;
use App\Services\UserServices;


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
     * @return CompanyServices|ContactServices|CustomerServices|UserServices|LeadServices|TaskServices|void
     */
    private function getService($name)
    {
        if ($name === "leads"){
            return new LeadServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "contacts"){
            return new ContactServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "company"){
            return new CompanyServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "task"){
            return new TaskServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "customers"){
            return new CustomerServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "users"){
            return new UserServices($this->apiUri, $this->configJSON["access_token"]);
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

    public function task(): TaskServices
    {
        return $this->getService("task");
    }

    public function customers(): CustomerServices
    {
        return $this->getService("customers");
    }

    public function users(): UserServices
    {
        return $this->getService("users");
    }
}