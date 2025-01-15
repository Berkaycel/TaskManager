<?php

/**
 *  Task Providers
 */
return array (
    [
        'class' => \App\Library\ThirdParty\Providers\FirstTaskProvider::class,
        'apiUrl' => 'http://localhost:8000',
        'options' => [
            'auth_token' => 'first-provider-token',
        ],
    ],
    [
        'class' => \App\Library\ThirdParty\Providers\SecondTaskProvider::class,
        'apiUrl' => 'http://localhost:8000',
        'options' => [
            'auth_token' => 'second-provider-token',
        ],
    ],
);
