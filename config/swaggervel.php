<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Absolute path to location where parsed swagger annotations will be stored
      |--------------------------------------------------------------------------
    */
    'doc-dir' => storage_path('docs'),

    /*
      |--------------------------------------------------------------------------
      | Relative path to access parsed swagger annotations.
      |--------------------------------------------------------------------------
    */
    'doc-route' => 'docs',

    /*
      |--------------------------------------------------------------------------
      | Relative path to access public UI resources.
      |--------------------------------------------------------------------------
     */
    'ui-resource-path' => 'vendor/swaggervel',

    /*
      |--------------------------------------------------------------------------
      | Use secure protocol (http vs. https).
      |--------------------------------------------------------------------------
     */
    'secure-protocol' => false,

    /*
      |--------------------------------------------------------------------------
      | Relative path to access swagger ui.
      |--------------------------------------------------------------------------
    */
    'api-docs-route' => 'api/docs',

    /*
      |--------------------------------------------------------------------------
      | Absolute path to directory containing the swagger annotations are stored.
      |--------------------------------------------------------------------------
    */
    'app-dir' => 'app',

    /*
      |--------------------------------------------------------------------------
      | Absolute path to directories that you would like to exclude from swagger generation
      |--------------------------------------------------------------------------
    */
    'excludes' => [
    ],

    /*
      |--------------------------------------------------------------------------
      | If set to true, automatically regenerates the definitions everytime you open the UI
      |--------------------------------------------------------------------------
    */
    "auto-generate" => true,

    /*
      |--------------------------------------------------------------------------
      | Edit to trust the proxy's ip address - needed for AWS Load Balancer
      |--------------------------------------------------------------------------
    */
    'behind-reverse-proxy' => false,

    /*
      |--------------------------------------------------------------------------
      | Uncomment to add response headers when swagger is generated
      |--------------------------------------------------------------------------
    */
    'view-headers' => [
        // 'Access-Control-Allow-Origin' => '*',
        // 'Access-Control-Allow-Methods' => 'GET, POST',
        // 'Access-Control-Allow-Headers' => 'X-Requested-With',
    ],

    /*
      |--------------------------------------------------------------------------
      | You can configure OAuth2 authorization by changing value to true
      |--------------------------------------------------------------------------
    */
    'init-o-auth' => false,

    /*
      |--------------------------------------------------------------------------
      | Default clientId. MUST be a string
      |--------------------------------------------------------------------------
    */
    'client-id' => 'client_id',

    /*
      |--------------------------------------------------------------------------
      | Default clientSecret. MUST be a string
      |--------------------------------------------------------------------------
    */
    'client-secret' => 'client_secret',

    /*
      |--------------------------------------------------------------------------
      | Realm query parameter (for oauth1) added to authorizationUrl and tokenUrl.
      | MUST be a string
      |--------------------------------------------------------------------------
    */
    'realm' => '',

    /*
      |--------------------------------------------------------------------------
      | Application name, displayed in authorization popup. MUST be a string
      |--------------------------------------------------------------------------
    */
    'app-name' => 'swaggervel',

    /*
      |--------------------------------------------------------------------------
      | Scope separator for passing scopes, encoded before calling, default value is a space
      | (encoded value %20). MUST be a string
      |--------------------------------------------------------------------------
    */
    'scope-separator' => ' ',

    /*
      |--------------------------------------------------------------------------
      | Additional query parameters added to authorizationUrl and tokenUrl.
      |--------------------------------------------------------------------------
    */
    'additional-query-string-params' => [
        // 'QueryStringKey' => 'QueryStringValue'
    ],

    /*
      |--------------------------------------------------------------------------
      | Only activated for the accessCode flow. During the authorization_code request to the tokenUrl,
      | pass the Client Password using the HTTP Basic Authentication scheme
      | (Authorization header with Basic base64encoded[client_id:client_secret]).
      |--------------------------------------------------------------------------
    */
    'use-basic-auth-with-access-code-grant' => false,
    
    /*
      |--------------------------------------------------------------------------
      | Middleware settings to check for user authorization.
      |--------------------------------------------------------------------------
    */
    'middleware' => [
        'docs' => [],
        'api' => []
    ]
];
