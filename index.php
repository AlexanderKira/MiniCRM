<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//модели
require_once 'app/models/Database.php';
require_once 'app/models/UserModels.php';
//контроллеры
require_once 'app/controllers/users/AuthController.php';
require_once 'app/controllers/users/UsersController.php';
require_once 'app/controllers/homeController.php';
//маршруты
require_once 'app/router.php';



$router = new Route();
$router->run();


?>