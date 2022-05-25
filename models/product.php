<?php

class Product{
    private $id;
    private $categoryId;
    private $product;
    private $description;
    private $price;
    private $stock;
    private $sale;
    private $image = null;
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
        $this->product = $this->db->real_escape_string($product);
    }
    public function setDescription($description){
        $this->description = $this->db->real_escape_string($description);
    }
    public function setPrice($price){
        $this->price = $this->db->real_escape_string($price);
    }
    public function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
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
    public function getByCategory(){
        $products = $this->db->query("SELECT p.*, c.category FROM products p "
                                    ."INNER JOIN categories c ON c.id = p.category_id "
                                    ."WHERE p.category_id = {$this->getCategoryId()} "
                                    ."ORDER BY id DESC;");
        return $products;
    }
    public function getRandom($limit){
        $products = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit;");
        return $products;
    }
    public function getOne(){
        $product = $this->db->query("SELECT * FROM products WHERE id={$this->getId()};");
        return $product->fetch_object();
    }
    public function save(){
        $sql = "INSERT INTO products VALUES (NULL, '{$this->getCategoryId()}', '{$this->getProduct()}', '{$this->getDescripcion()}', '{$this->getPrice()}', '{$this->getStock()}', null, '{$this->getImage()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function edit(){
        $sql = "UPDATE products SET category_id='{$this->getCategoryId()}', product='{$this->getProduct()}', description='{$this->getDescripcion()}', price='{$this->getPrice()}', stock='{$this->getStock()}'";
        if($this->getImage() != null){
            $sql .= ", image='{$this->getImage()}'";
        }
        $sql .= " WHERE id={$this->getId()};";

        $edit = $this->db->query($sql);

        $result = false;
        if($edit){
            $result = true;
        }
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM products WHERE id={$this->id};";
        $delete = $this->db->query($sql);

        if($delete){
            return true;
        } else{
            return false;
        }
    }
}