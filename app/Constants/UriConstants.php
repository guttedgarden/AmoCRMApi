<?php

namespace App\Constants;

class UriConstants{
    public const HEADERS_TOKEN = [
        'User-Agent' => 'amoCRM/oAuth Client 1.0',
        'Content-Type' => 'application/json'
    ];

    public const OAUTH_URI = 'oauth2/access_token';

    public const LEAD_URI_V4 = "/api/v4/leads";

    public const LEAD_URI_V2 = "/api/v2/leads";

    public const CONTACT_URI_V4 = "/api/v4/contacts";

    public const CONTACT_URI_V2 = "/api/v2/contacts";

    public const COMPANY_URI = "/api/v4/companies";
}
