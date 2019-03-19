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
    
    public function __construct() {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include $routesPath;
    }
    
    public function run(){
        //Получить строку запроса
        if(!empty($_SERVER['REQUEST_URI'])){
            $uri = trim($_SERVER['REQUEST_URI'], '/');
        }
        echo $uri;
        
        //Проверить наличие такого запроса в routes
        
        //Определить какой контроллер и action обрабатывает запрос
        
        //Подключить файл класса-контроллера
        
        //Создать объект, вызвать метод этого контроллера
    }
}
