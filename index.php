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

//FRONT CONTORLLER

//1. Общие настройки
ini_set("display_errors", 1);
error_reporting(E_ALL);

//2. Подключение файлов системы
define("ROOT", dirname(__FILE__));
require_once ROOT . '/components/Router.php';

//3. Установка соединения с БД

//4. Вызов Router
$router = new Router();
$router->run();

