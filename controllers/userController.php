<?php

require_once 'models/user.php';

class userController
{
    public function index()
    {
        echo "Controlador Usuarios, Accion index";
    }

    public function register()
    {
        require_once 'views/user/register.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $user = new User();

            $name = isset($_POST['name']) ? $_POST['name'] : false;
            $lastname =  isset($_POST['lastname']) ? $_POST['lastname'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($name && $lastname && $email && $password) {
                $user->setName($name);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $user->setPassword($password);

                $save = $user->save();

                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else{
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        header("Location:" . base_url . "user/register");
    }
}
