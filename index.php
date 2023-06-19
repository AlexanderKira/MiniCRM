<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//модели
require_once 'app/models/Database.php';
require_once 'app/models/pages/PageModels.php';
require_once 'app/models/roles/Role.php';
require_once 'app/models/User.php';
require_once 'app/models/AuthUser.php';


//контроллеры
require_once 'app/controllers/HomeController.php';
require_once 'app/controllers/pages/PageController.php';
require_once 'app/controllers/users/AuthController.php';
require_once 'app/controllers/users/UsersController.php';
require_once 'app/controllers/roles/RoleController.php';

//маршруты
require_once 'app/router.php';
$router = new Router();
$router->run();