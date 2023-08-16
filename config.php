<?php

use LionDatabase\Driver;
use LionMailer\MailService;

Driver::run([
    'default' => 'php_mysql_crud',
    'connections' => [
        'php_mysql_crud' => [
            'type' => 'mysql',
            'host' => '127.0.0.1',
            'port' => 3306,
            'dbname' => 'php_mysql_crud',
            'user' => 'root',
            'password' => ''
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
