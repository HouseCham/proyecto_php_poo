<?php

class Product{
    private $id;
    private $categoryId;
    private $product;
    private $description;
    private $price;
    private $stock;
    private $sale;
    private $image;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function getCategoryId(){
        return $this->categoryId;
    }
    public function getProduct(){
        return $this->product;
    }
    public function getDescripcion(){
        return $this->description;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getSale(){
        return $this->sale;
    }
    public function getImage(){
        return $this->image;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    public function setCategoryId($categoryId){
        $this->categoryId = $categoryId;
    }
    public function setProduct($product){
        $this->product = $product;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setStock($stock){
        $this->stock = $stock;
    }
    public function setSale($sale){
        $this->sale = $sale;
    }
    public function setImage($image){
        $this->image = $image;
    }

    public function getAll(){
        $products = $this->db->query("SELECT * FROM products ORDER BY id DESC;");
        return $products;
    }
    
}