<?php
require_once 'models/product.php';

class productController
{
    public function index()
    {
        require_once 'views/layout/main_product.php';
    }

    public function manage()
    {
        Utils::isAdmin();

        $product = new Product();
        $products = $product->getAll();
        require_once 'views/product/manage.php';
    }

    public function create()
    {
        Utils::isAdmin();
        require_once 'views/product/create.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $name = isset($_POST['product']) ? $_POST['product'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $price = isset($_POST['price']) ? $_POST['price'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $category = isset($_POST['category']) ? $_POST['category'] : false;
            //$img = isset($_POST['image']) ? $_POST['image'] : false;

            if ($name && $description && $price && $stock && $category) {
                $product = new Product();

                $product->setProduct($name);
                $product->setDescription($description);
                $product->setPrice((float)$price);
                $product->setStock($stock);
                $product->setCategoryId($category);

                // Save img
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                }

                if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png") {
                    if (!is_dir('uploads/images')) {
                        mkdir("uploads/images", 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    $product->setImage($filename);
                }

                if(isset($_GET['id'])){
                    $product->setId($_GET['id']);
                    $save = $product->edit();
                } else{
                    $save = $product->save();
                }

                if ($save) {
                    $_SESSION['product'] = "complete";
                } else {
                    $_SESSION['product'] = "failed";
                }

            } else {
                $_SESSION['product'] = "failed";
            }
        } else {
            $_SESSION['product'] = "failed";
        }
        header("Location:" . base_url . "product/manage");
    }

    public function edit()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $product = new Product();
            $product->setId($_GET['id']);
            $productToEdit = $product->getOne();
        } else {
            $_SESSION['edit'] = "failed";
            header('Location:' . base_url . 'product/manage');
        }

        $edit = true;
        require_once 'views/product/create.php';
    }

    public function delete()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $product = new Product();
            $product->setId($_GET['id']);
            $delete = $product->delete();

            if ($delete) {
                $_SESSION['delete'] = "complete";
            } else {
                $_SESSION['delete'] = "failed";
            }
        } else {
            $_SESSION['delete'] = "failed";
        }
        header('Location:' . base_url . 'product/manage');
    }
}
