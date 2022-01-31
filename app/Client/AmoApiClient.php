<?php

namespace App\Client;

use App\Model\Lead;
use App\Services\BaseServices;
use App\Services\CompanyServices;
use App\Services\LeadServices;
use App\Services\ContactServices;

use App\Oauth\AmoOauth;

class AmoApiClient extends AmoOauth{

    public function __construct($subDomain, $client_id, $client_secret, $code, $redirect_uri, $pathToConfig)
    {
        parent::__construct($subDomain, $client_id, $client_secret, $code, $redirect_uri, $pathToConfig);
    }

    private function getService($name)
    {
        if ($name === "leads"){
            //return new LeadServices($this->apiUri, "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjNlNWIzMTBjYjY2ZTRjODg3NWEzNmJmYTk2YzNiZGFjNjc4ODlmZGViN2JiYWEzMDUxMzQ5ZGI4NDVkNDJlZDRiNGEzYTU4ZDI5MTcxMTE3In0");
            return new LeadServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "contacts"){
            return new ContactServices($this->apiUri, $this->configJSON["access_token"]);
        } elseif ($name === "company"){
            return new CompanyServices($this->apiUri, $this->configJSON["access_token"]);
        }
    }

    public function __get($key){
        return $this->$key;
    }

    public function leads(): LeadServices{
        return $this->getService("leads");
    }
    public function contacts(): ContactServices{
        return $this->getService("contacts");
    }
    public function company(): CompanyServices{
        return $this->getService("company");
    }
}