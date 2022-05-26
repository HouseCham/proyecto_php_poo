<aside id="lateral">
    <div id="login" class="block_aside">
        <h3>My cart</h3>
        <a href="<?= base_url ?>car/index">Products</a>
        <br>
        <a href="<?= base_url ?>car/index">TOTAL</a>
        <br>
        <a href="<?= base_url ?>car/index">See my car</a>
        <br>
        <?php if (!isset($_SESSION['userLogged'])) : ?>
            <h3>Entrar a la web</h3>
            <form action="<?= base_url ?>user/login" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" class="input" />
                <label for="password">Password</label>
                <input type="password" name="password" class="input" />
                <input type="submit" value="Login" class="submit" />
            </form>
            <li><a href="<?= base_url ?>user/register">Registrarse</a></li>
        <?php else : ?>
            <h3>Welcome <?= $_SESSION['userLogged']->name ?></h3>
        <?php endif; ?>
        <ul>
            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="<?= base_url ?>category/index">Gestionar categorias</a></li>
                <li><a href="<?= base_url ?>product/manage">Gestionar productos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['userLogged'])) : ?>
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>user/logout">Cerrar sesion</a></li>
            <?php endif; ?>
        </ul>
    </div>
</aside>

<div id="central">