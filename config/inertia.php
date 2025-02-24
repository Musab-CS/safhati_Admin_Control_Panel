<?php

return [

    'ssr' => [
        'enabled' => true,
        'url' => env('SSR_URL', 'http://127.0.0.1:13714'),
        'entry_point' => base_path('resources/js/servver.js'),
    ],

];
