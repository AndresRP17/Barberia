<?php include("../conx.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link  rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New user</title>
    </head>
    <body>

<div class="contenedor">
    <form action="agguser.php" method="post">
        <h1>Crear Cuenta</h1>

        <label>Inserte un correo</label>
        <input type="email" name="correo" placeholder="Ingrese un correo" required>

        <label>Inserte una clave</label>
        <input type="password" class="pass" name="password" placeholder="8 caracteres, una mayus y un numero" pattern="(?=.*[A-Z])(?=.*[0-9]).{6,}" title="Debe tener mínimo 8 caracteres, una mayúscula y un número" required>
        <i class="fa-solid fa-eye-slash" id="ojo"></i>

        <label>Inserte su nombre</label>
        <input type="text" name="nombre" placeholder="Ingrese un usuario" required>

         <label>Inserte un telefono</label>
        <input type="number" name="numero" placeholder="Ingrese un numero de telefono" required>


        <input type="submit" value="Registrarse">
    </form>
</div>

<script>
const pass = document.querySelector(".pass");
const icon = document.getElementById("ojo");

icon.addEventListener("click", function(){

    icon.classList.toggle("animar");


    if(pass.type === "password"){
        pass.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }else{
        pass.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }

});
</script>

</body>
</html>

</body>
<script src="https://kit.fontawesome.com/fae9314623.js" crossorigin="anonymous"></script>

</html>