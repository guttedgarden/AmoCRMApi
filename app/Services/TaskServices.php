<?php

namespace App\Services;

use App\Constants\UriConstants;
use App\Http\AmoHttpClient;
use App\Interfaces\ServicesInterface;
use App\Model\LeadModel;
use App\Model\TaskModel;

class TaskServices extends BaseServices implements ServicesInterface {

    /**
     * TaskServices Class constructor
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
     * Returns all task as array
     *
     * @param array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        // TODO: Implement getAll() method.
        return $this->httpClient->request("GET", UriConstants::TASK_URI, $filter, $this->headers);
    }

    /**
     * Creates a new instance of the TaskModel class
     *
     * @return TaskModel
     */
    public function create(): TaskModel
    {
        // TODO: Implement create() method.
        return new TaskModel($this->httpClient, $this->headers);
    }
}