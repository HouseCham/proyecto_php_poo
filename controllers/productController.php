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
            $name = isset($_POST['product']) ? $_POST['product'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $category = isset($_POST['category']) ? $_POST['category'] : false;
            //$img = isset($_POST['image']) ? $_POST['image'] : false;

            if($name && $description && $price && $stock && $category){
                $product = new Product();

                $product->setProduct($name);
                $product->setDescription($description);
                $product->setPrice((float)$price);
                $product->setStock($stock);
                $product->setCategoryId($category);

                $save = $product->save();

                if($save){
                    $_SESSION['product'] = "complete";
                } else{
                    $_SESSION['product'] = "failed";
                }
            } else{
                $_SESSION['product'] = "failed";
            }
        } else{
            $_SESSION['product'] = "failed";
        }
        header("Location:".base_url."product/manage");
    }
}