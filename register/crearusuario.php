<?php include("../conx.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

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
    
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro</title>

<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    height: 100vh;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    display: flex;
    justify-content: center;
    align-items: center;
}

.contenedor {
    background: white;
    padding: 40px;
    border-radius: 12px;
    width: 350px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

form label {
    font-size: 14px;
    color: #555;
}

form input[type="email"],
form input[type="number"],
form input[type="text"],
form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0 18px 0;
    border: 1px solid #ccc;
    border-radius: 6px;
    transition: 0.3s;
}

form input[type="email"]:focus,
form input[type="number"]:focus,
form input[type="text"]:focus,
form input[type="password"]:focus {
    border-color: #2a5298;
    outline: none;
}

form input[type="submit"] {
    width: 100%;
    padding: 12px;
    border: none;
    background: #2a5298;
    color: white;
    font-weight: bold;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

form input[type="submit"]:hover {
    background: #1e3c72;
}

#ojo{
    cursor: pointer;
    position: absolute;
    transition: 0.5s ease;
    transform: translateX(240px) translateY(-45px);
}

#ojo.animar{
    transform: translateX(240px) translateY(-45px) scale(1.3) rotate(40deg);
}
</style>
</head>

<body>

<div class="contenedor">
    <form action="agguser.php" method="post">
        <h1>Crear Cuenta</h1>

        <label>Inserte un correo</label>
        <input type="email" name="correo" placeholder="Ingrese un correo" required>

        <label>Inserte una clave</label>
        <input type="password" class="pass" name="password" placeholder="Inserte una clave" pattern="(?=.*[A-Z])(?=.*[0-9]).{6,}" title="Debe tener mínimo 8 caracteres, una mayúscula y un número" required>
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