<?php

namespace App\Model;

use App\Client\AmoApiClient;
use App\Http\AmoHttpClient;

class BaseModel
{
    protected $fields;
    protected $httpClient;

    /**
     * CompanyServices Class constructor
     *
     * @param AmoApiClient $client
     */
    public function __construct(AmoApiClient $client)
    {
        $this->httpClient = new AmoHttpClient($client->apiUri, $client->getAccessToken());
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->fields[$key];
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function __set($key, $value)
    {
        // TODO: Implement __set() method.
        return $this->fields[$key] = $value;
    }

    /**
     * Adds a note to an existing lead
     *
     * @return NoteModel
     */
    public function newNote(): NoteModel
    {
        return new NoteModel();
    }

    public function getFieldsAsArray()
    {
        return $this->fields;
    }
}