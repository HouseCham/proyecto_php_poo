<?php

class Category{
    private $id;
    private $category;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    public function getId(){
        return $this->id;
    }
    public function getCategory(){
        return $this->category;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setCategory($category){
        $this->category = $this->db->real_escape_string($category);
    }

    public function getAll(){
        return $this->db->query("SELECT * FROM categories ORDER BY id DESC;");
    }

    public function getOne(){
        $category = $this->db->query("SELECT * FROM categories WHERE id={$this->getId()};");
        return $category->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO categories VALUES (NULL, '{$this->getCategory()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
}