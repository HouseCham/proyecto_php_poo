<?php
require_once 'models/category.php';
require_once 'models/product.php';

class categoryController{
    public function index(){
        Utils::isAdmin();
        $category = new Category();
        $categories = $category->getAll();
        require_once 'views/category/index.php';
    }
    public function create(){
        Utils::isAdmin();
        require_once 'views/category/create.php';
    }
    public function save(){
        Utils::isAdmin();
        if(isset($_POST['category'])){
            $category = new Category();
            $category->setCategory($_POST['category']);
            $save = $category->save();
        }

        header("Location:".base_url."category/index");
    }
    public function view(){
        if(isset($_GET['category'])){
            $category = new Category();
            $category->setId($_GET['category']);
            $oneCategory = $category->getOne();

            $product = new Product();
            $product->setCategoryId($_GET['category']);
            $products = $product->getByCategory();
        }
        require_once 'views/category/view.php';
    }
}