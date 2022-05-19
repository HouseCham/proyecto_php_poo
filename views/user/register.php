<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == "complete"): ?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == "failed"): ?>
    <strong class="alert_red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>

<?php Utils::deleteSession('register'); ?>

<form action="<?= base_url ?>user/save" method="POST">
    <label for="name">Nombre</label>
    <input type="text" name="name" class="input" required>

    <label for="lastname">Apellidos</label>
    <input type="text" name="lastname" class="input" required>

    <label for="email">Email</label>
    <input type="email" name="email" class="input" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" class="input" required>

    <input type="submit" class="submit" value="Registrarse">
</form>