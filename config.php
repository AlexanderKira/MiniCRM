<?php

//преформатирование в исходный формат
function tt($str){
    echo "<pre>";
        print_r($str);
    echo "</pre>";
}

//тоже самое, но еще прекращает работу скрипта
function tte($str){
    echo "<pre>";
        print_r($str);
    echo "</pre>";
    exit;
}

//config

define('APP_BASE_PATH', 'minicrm');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'minicrm');

define('START_ROLE', 1 );
