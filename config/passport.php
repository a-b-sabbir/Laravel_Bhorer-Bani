<?php

return [

    'client_credentials' => env('PASSPORT_CLIENT_CREDENTIALS', false),

    'personal_access_client' => env('PASSPORT_PERSONAL_ACCESS_CLIENT', false),

    'private_key' => storage_path('oauth-private.key'),

    'public_key' => storage_path('oauth-public.key'),

    'token_expiration' => 60 * 60, // Token expiration time (in seconds)

];
