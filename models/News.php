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
 * Description of News
 *
 * @author vladislav
 */
class News {
    
    /**
     * Возвращает одну новость по идентификатором
     * @param type $id
     */
    public static function getNewsItemById($id){
        $host = 'localhost';
        $dbname = 'rasul';
        $user = 'user';
        $password = 'qwerty';
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        
        $newsList = array();
        
        $result = $db->query('SELECT id, title, date, short_content'
                . 'FROM news'
                . 'ORDER BY date DESC'
                . 'LIMIT 10');
        
        $i = 0;
        while ($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        
        return $newsList;
    }
    
    /**
     * Возвращает массив новостей
     */
    public static function getNewsList(){
        
    }
    
}
