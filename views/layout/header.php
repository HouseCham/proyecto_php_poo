<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/main.css">
</head>

<body>
    <div id="main_container">
        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/imgs/logo.png" alt="t-shirt" id="logo_img" />
                <a href="<?= base_url ?>">
                    Coolest
                </a>
            </div>
        </header>

        <?php $categories = Utils::showCategories(); ?>

        <nav id="menu">
            <ul>
                <li>
                    <a href="<?= base_url ?>">Inicio</a>
                </li>
                <?php while ($cat = $categories->fetch_object()) : ?>
                    <li>
                        <a href="<?= base_url ?>category/view&category=<?= $cat->id ?>"><?= $cat->category ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </nav>
        <div id="content">