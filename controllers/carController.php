<?php
require_once 'models/product.php';

class carController{
    public function index(){
        if(isset($_SESSION['car'])){
            $cart = $_SESSION['car'];
            //var_dump($cart);
            //die();
            require_once 'views/car/index.php';
        }
    }

    public function add(){
        if($_GET['id']){
            $productoId = $_GET['id'];
        } else{
            header('Location:'.base_url);
        }
        $counter = 0;
        if(isset($_SESSION['car'])){
            foreach($_SESSION['car'] as $index => $element){
                if($element['id_product'] == $productoId){
                    $_SESSION['car'][$index]['units']++;
                    $counter++;
                }
            }

        }
        if($counter == 0){
            $product = new Product();
            $product->setId($productoId);
            $product = $product->getOne();

            if(is_object($product)){
                $_SESSION['car'][] = array(
                    "id_product" => $product->id,
                    "price" => $product->price,
                    "units" => 1,
                    "product" => $product
                );
            }
        }

        header('Location:'.base_url.'car/index');
    }
    public function remove(){
        
    }
    public function delete(){
        unset($_SESSION['car']);
        header('Location:'.base_url.'car/index');
    }    
}