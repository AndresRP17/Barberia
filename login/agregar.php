<?php
session_start();

include("../conx.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE correo = ? AND password = ?";
    $stmt = $conx->prepare($sql);

    if (!$stmt) {
        die("Error SQL: " . $conx->error);
    }

    $stmt->bind_param("ss", $usuario, $password);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {

        $fila = $resultado->fetch_assoc();

        $_SESSION['usuario'] = $fila['correo'];

        $_SESSION['id'] = $fila['id_cliente'];
        $_SESSION['name'] = $fila['nombre'];   // 👈 guardamos el nombre

        header("location: ../pagina/pagina.php");
        exit();

    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>


