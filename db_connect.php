<?php
        $host_name = "localhost";
        $user = "root";
        $password = '';
        $db_name = "db_news";
        
        try{
            $db_connect = new PDO("mysql:host={$host_name};dbname={$db_name}", $user, $password ); 
        } 
        catch (PDOException $ex) {
            $ex->getMessage();
        }
        