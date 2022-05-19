<h1>Registrarse</h1>

<form action="index.php?controller=user&action=save" method="POST">
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