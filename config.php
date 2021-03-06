<?php
// General
define('VISTA_PORDEFECTO', 'menu');
// Directories
define('PAGE_PATH', dirname(__FILE__));
define('VISTAS_PATH', PAGE_PATH . '/mvc/vista/');
// MYSQL
const MYSQL_CONFIG = array(
    'database_type' => 'mysql',
    'database_name' => 'mispruebas',
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    // [optional]
    'port' => 3306,
    //driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
    'option' => [
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
);
