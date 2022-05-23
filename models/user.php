<?php

class User{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $password;
    private $role;
    private $image;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
    function getLastname(){
        return $this->lastname;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
    function getRole(){
        return $this->role;
    }
    function getImage(){
        return $this->image;
    }

    function setId($id){
        $this->id = $id;
    }
    function setName($name){
        $this->name = $this->db->real_escape_string($name);
    }
    function setLastname($lastname){
        $this->lastname = $this->db->real_escape_string($lastname);
    }
    function setEmail($email){
        $this->email = $this->db->real_escape_string($email);
    }
    function setPassword($password){
        $this->password = $password;
    }
    function setRole($role){
        $this->role = $role;
    }
    function setImage($image){
        $this->image = $image;
    }
    
    public function encryptPassword($password){
        $encrypted = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
        return $encrypted;
    }

    public function save(){
        $sql = "INSERT INTO users VALUES (NULL, '{$this->getName()}', '{$this->getLastname()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', NULL);";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function login(){

        $email = $this->getEmail();
        $password = $this->getPassword();

        // Check if user exists
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $login = $this->db->query($sql);
        $result = false;

        if($login && $login->num_rows == 1){
            $user = $login->fetch_object();

            // Verify password
            $verify = password_verify($password, $user->password);

            if($verify){
                return $user;
            }

        }
        return $result;
    }
}