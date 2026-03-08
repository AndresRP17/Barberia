<?php include("../conx.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

<div class="contenedor">
    <h1>Iniciar Sesión</h1>

    <form action="login.php" method="post">
        <label>Usuario</label>
        <input type="text" name="correo" placeholder="Inserte su usuario">

        <label>Contraseña</label>
        <input type="password" name="password" placeholder="Inserte su clave">

        <input type="submit" value="Ingresar">

        <a href="../register/register.php">¿Primera vez? Crear cuenta</a>

        <footer>
            &copy;-<?php echo date("Y"); ?>
        </footer>
    </form>
</div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_GET['error'])){ ?>
<script>

    swal.fire({
        title: 'Oops...',
        text:  'Usuario o contraseña incorrectos',
        icon: 'error',
        confirmButtonText: 'Intentar otra vez'
}).then(() => {
  window.history.replaceState({}, document.title, "index.php");
});

</script>
<?php } ?>


<?php if(isset($_GET['ok'])){ ?>
<script>
Swal.fire({
  title: 'Nueva cuenta',
  text: 'Tu cuenta fue creada correctamente',
  icon: 'success'
}).then(() => {
  window.history.replaceState({}, document.title, "index.php");
});
</script>
<?php } ?>