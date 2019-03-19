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

include_once ROOT . '/models/News.php';

/**
 * Description of NewsController
 *
 * @author vladislav
 */
class NewsController {
    
    public function  actionIndex(){
        $newsList = array();
        $newsList = News::getNewsList();
        
        echo '<pre>';
        print_r($newsList);
        echo '</pre>';
        return true;
    }
    
    public function actionView($category, $id){
        echo $category;
        echo 'Просмотр одной новости';
        return true;
    }
    
}
