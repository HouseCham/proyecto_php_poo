<?php
require_once 'models/product.php';

class productController{
    public function index(){
        require_once 'views/layout/main_product.php';
    }

    public function manage(){
        Utils::isAdmin();

        $product = new Product();
        $products = $product->getAll();
        require_once 'views/product/manage.php';
    }

    public function create(){
        Utils::isAdmin();

        require_once 'views/product/create.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            var_dump($_POST);
        }
    }
}