<?php

/*
 * Copyright (C) 2019 vladislav
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Description of Router
 *
 * @author vladislav
 */
class Router {

    private $routes;

    /**
     * Конструктор класса
     */
    public function __construct() {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include $routesPath;
    }

    /**
     * Возвращает строку запроса
     * @return string
     */
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Точка входа в приложение
     */
    public function run() {
        //Получить строку запроса
        $uri = $this->getURI();

        //Проверить наличие такого запроса в routes
        foreach ($this->routes as $uriPattern => $path) {
            //Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                //Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);


                //Определить какой контроллер и action
                //обрабатывает запрос
                $segments = explode("/", $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parametrs = $segments;

                //Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' .
                        $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }
                //Создать объект, вызвать метод этого контроллера
                $controllerObject = new $controllerName;


                $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);
                //$result = $controllerObject->$actionName($parametrs);

                if ($result != null) {
                    break;
                }
            }
        }
    }

}
