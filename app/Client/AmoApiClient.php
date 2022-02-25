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
     * This method looks for the desired service
     *
     * @param $name
     * @return CompanyServices|ContactServices|CustomerServices|UserServices|LeadServices|TaskServices|void
     */
//    private function getService($name)
//    {
//        if ($name === "leads"){
//            return new LeadServices($this);
//        } elseif ($name === "contacts"){
//            return new ContactServices($this);
//        } elseif ($name === "company"){
//            return new CompanyServices($this);
//        } elseif ($name === "task"){
//            return new TaskServices($this);
//        } elseif ($name === "customers"){
//            return new CustomerServices($this);
//        } elseif ($name === "users"){
//            return new UserServices($this);
//        }
//    }

    /**
     * @return LeadServices
     */
    public function leads(): LeadServices
    {
        return new LeadServices($this);
    }

    /**
     * @return ContactServices
     */
    public function contacts(): ContactServices
    {
        return new ContactServices($this);
    }

    /**
     * @return CompanyServices
     */
    public function company(): CompanyServices
    {
        return new CompanyServices($this);
    }

    public function task(): TaskServices
    {
        return new TaskServices($this);
    }

    public function customers(): CustomerServices
    {
        return new CustomerServices($this);
    }

    public function users(): UserServices
    {
        return new UserServices($this);
    }
}