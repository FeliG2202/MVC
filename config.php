<?php

use LionDatabase\Driver;
use LionMailer\MailService;

Driver::run([
    'default' => 'database',
    'connections' => [
        'database' => [
            'type' => 'mysql',
            'host' => 'db',
            'port' => 3306,
            'dbname' => 'database',
            'user' => 'root',
            'password' => '2202'
        ],
    ]
]);

MailService::run([
    'default' => 'main',
    'accounts' => [
        'main' => [
            'services' => ['symfony'],
            'debug' => 0,
            'host' => 'smtp.office365.com',
            'encryption' => 'ssl',
            'port' => 587,
            'name' => 'Alfonso Bot',
            'account' => 'onedesk@junicalmedical.com.co',
            'password' => 'Junical2202*'
        ],
    ],
]);
