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

    /**
     * @return TaskServices
     */
    public function task(): TaskServices
    {
        return new TaskServices($this);
    }

    /**
     * @return CustomerServices
     */
    public function customers(): CustomerServices
    {
        return new CustomerServices($this);
    }

    /**
     * @return UserServices
     */
    public function users(): UserServices
    {
        return new UserServices($this);
    }
}