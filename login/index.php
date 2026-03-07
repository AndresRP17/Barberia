<?php include("../conx.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>

<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    height: 100vh;
    background: linear-gradient(135deg, #141e30, #243b55);
    display: flex;
    justify-content: center;
    align-items: center;
}

.contenedor {
    background: #ffffff;
    width: 380px;
    padding: 40px;
    border-radius: 14px;
    box-shadow: 0 25px 50px rgba(0,0,0,0.3);
    text-align: center;
}

.contenedor h1 {
    margin-bottom: 25px;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    text-align: left;
    font-size: 14px;
    margin-bottom: 5px;
    color: #555;
}

input[type="text"],
input[type="password"] {
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ccc;
    transition: 0.3s;
    font-size: 14px;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #243b55;
    outline: none;
    box-shadow: 0 0 5px rgba(36,59,85,0.3);
}

input[type="submit"] {
    padding: 12px;
    border: none;
    border-radius: 8px;
    background: #243b55;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background: #141e30;
}

a {
    margin-top: 15px;
    font-size: 13px;
    text-decoration: none;
    color: #243b55;
}

a:hover {
    text-decoration: underline;
}

footer {
    margin-top: 20px;
    font-size: 12px;
    color: #888;
}
</style>
</head>

<body>

<div class="contenedor">
    <h1>Iniciar Sesión</h1>

    <form action="agregar.php" method="post">
        <label>Usuario</label>
        <input type="text" name="correo" placeholder="Inserte su usuario">

        <label>Contraseña</label>
        <input type="password" name="password" placeholder="Inserte su clave">

        <input type="submit" value="Ingresar">

        <a href="../register/crearusuario.php">¿Primera vez? Crear cuenta</a>

        <footer>
            &copy; 2010-<?php echo date("Y"); ?>
        </footer>
    </form>
</div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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