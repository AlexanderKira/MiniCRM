<?php

//Укажем пространство имен для класса

namespace app;

use controllers\auth\AuthController;
use controllers\home\HomeController;
use controllers\roles\RoleController;
use controllers\pages\PageController;
use controllers\users\UsersController;

class Router{
    //определяем маршруты с помощью регулярных выражений
    //для каждого контроллера будет своё регулярное выражение
    private $routes = [
        '/^\/' . APP_BASE_PATH . '\/?$/' => ['controller' => 'home\\HomeController', 'action' => 'index'],
        // - '/^\/' . APP_BASE_PATH . '\/?$/' - это uri 
        '/^\/' . APP_BASE_PATH . '\/users(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'users\\UsersController'],
        '/^\/' . APP_BASE_PATH . '\/auth(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'auth\\AuthController'],
        '/^\/' . APP_BASE_PATH . '\/roles(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'roles\\RoleController'],
        '/^\/' . APP_BASE_PATH . '\/pages(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'pages\\PageController'],
        '/^\/' . APP_BASE_PATH . '\/(register|login|authenticate|logout)(\/(?P<action>[a-z]+))?$/' => ['controller' => 'users\\AuthController']
    ];
        

    public function run(){
        //получаем адрес 
        $uri = $_SERVER['REQUEST_URI']; //получаем запрос из супер глобального массива 
        $controller = null;
        $action = null;
        $params = null;
        //пробегаемся по маршрутам ($routes), пока не найдем нужный
        foreach ($this->routes as $pattern => $route) {//сравниваем 
            if(preg_match($pattern, $uri, $matches)) { //проверка. Если находим маршрут идентичный значению uri 
                //получаем имя контроллера с маршрута ($route)
                $controller = "controllers\\" . $route['controller'];
                //получаем действие из маршрута, если оно есть, или из URI
                $action = $route['action'] ?? $matches['action'] ?? 'index';
                // Получаем параметры из совпавших с регулярным выражением подстрок
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                // прерываем цикл, если нашли подходящий маршрут
                break;
            }
        }

        if (!$controller) {
            http_response_code(404);
            echo "Page not found!";
            return;
        }

        $controllerInstance = new $controller();
        if (!method_exists($controllerInstance, $action)) {
            http_response_code(404);
            echo "Action not found!";
            return;
        }
        call_user_func_array([$controllerInstance, $action], [$params]);
    }
}