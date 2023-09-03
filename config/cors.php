<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Options
    |--------------------------------------------------------------------------
    |
    | The allowed_methods and allowed_headers options are case-insensitive.
    | You don't need to include any headers used or added in your
    | application, because all requests are already whitelisted in the
    | default Laravel middleware stack.
    |
    */

    /*
     * You can enable CORS for 1 or multiple paths.
     * Example: ['api/*']
     */
    'paths' => ['api/*'],

    /*
    * Matches the request method. `[*]` allows all methods.
    */
    'allowed_methods' => ['*'],

    /*
    * Matches the request origin. `[*]` allows all origins. Wildcards can be used, for example `*.mydomain.com`
    */
    'allowed_origins' => ['*'],

    /*
    * Matches the request origin with, similar to `Request::is()`
    */
    'allowed_origins_patterns' => [],

    /*
    * Sets the Access-Control-Allow-Headers response header. `[*]` allows all headers.
    */
    'allowed_headers' => ['*'],

    /*
    * Sets the Access-Control-Expose-Headers response header with these headers.
    */
    'exposed_headers' => [],

    /*
    * Sets the Access-Control-Max-Age response header in seconds. You can set this to a high value like 3600 (1 hour) so that the pre-flight OPTIONS request is only made once
    */
    'max_age' => 0,

    /*
     * Sets the Access-Control-Allow-Credentials header.
     */
    'supports_credentials' => false,
];
