<?php
return [
    'goid' => env('GOPAY_GOID'),
    'clientId' => env('GOPAY_CLIENT_ID'),
    'clientSecret' => env('GOPAY_CLIENT_SECRET'),
    'defaultScope' => 'ALL', //GoPay\Definition\TokenScope Constants
    'languages' => [
        'en' => 'ENGLISH',
        'sk' => 'SLOVAK',
        'cs' => 'CZECH'
    ], //Map Laravel languages to GoPay\Definition\Language Constants
    'timeout' => 30
];