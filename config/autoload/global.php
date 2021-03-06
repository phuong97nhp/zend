<?php
return [
    'db' => array(
        'driver'         => 'Pdo',
        'dsn'            => 'mysql:dbname=zend_db;host=127.0.0.1',
        'username'       => 'root',
        'password'       => 'example',
        'driver_otions'  => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
        ]
     ),
     'service_manager' => array(
        'factories' => array(
           'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
     ),
];
