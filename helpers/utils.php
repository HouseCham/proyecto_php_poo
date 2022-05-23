<?php

class Utils{
    public static function deleteSession($session){
        if(isset($_SESSION[$session])){
            $_SESSION[$session] = null;
            unset($_SESSION[$session]);   
        }
        return $session;
    }
    
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        } else{
            return true;
        }
    }

    public static function showCategories(){
        require_once 'models/category.php';
        $category = new Category();
        return $category->getAll();
    }
}