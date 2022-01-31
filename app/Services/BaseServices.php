<?php

namespace App\Services;

use App\Http\AmoHttpClient;
use App\Constants\UriConstants;

class BaseServices{
    protected $httpClient;

    protected $headers = UriConstants::HEADERS_TOKEN;
}