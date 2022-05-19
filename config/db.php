<?php 

class Database{
    public static function connect(){
        $server = 'localhost';
        $root = 'root';
        $password = '';
        $dbName = 'ella';

        $db = new mysqli($server, $root, $password, $dbName);
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}