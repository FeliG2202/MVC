<?php

use LionDatabase\Driver;
use LionMailer\MailService;

Driver::run([
    'default' => 'sistema_medico',
    'connections' => [
        'sistema_medico' => [
            'type' => 'mysql',
            'host' => 'db',
            'port' => 3306,
            'dbname' => 'sistema_medico',
            'user' => 'root',
            'password' => 'lion'
        ],
    ]
]);

MailService::run([
    'default' => 'main',
    'accounts' => [
        'main' => [
            'services' => ['symfony'],
            'debug' => 0,
            'host' => 'smtp.gmail.com',
            'encryption' => 'ssl',
            'port' => 465,
            'name' => 'Sistema',
            'account' => 'felipegavilan2202@gmail.com',
            'password' => 'isrmkbqpvfhkaeoi'
        ],
    ],
]);
