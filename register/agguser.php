<?php 
include("../conx.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];


    // 1️⃣ Verificar si el correo ya existe
    $verificar = $conx->prepare("SELECT id_cliente FROM usuarios WHERE correo = ?");
    $verificar->bind_param("s", $correo);
    $verificar->execute();
    $resultado = $verificar->get_result();

    if($resultado->num_rows > 0){
        // 2️⃣ Alert si ya existe
        echo "<script>
                alert('Este correo ya se encuentra registrado, ingrese otro por favor');
                window.location.href='crearusuario.php';
              </script>";
        exit(); // termina el script aquí
    }

    // 3️⃣ Insertar usuario solo si no existe
    $stmt = $conx->prepare("INSERT INTO usuarios (correo, password, nombre, numero) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $correo, $password, $nombre, $numero);
    $stmt->execute();

    // 4️⃣ Redirigir al login
    header("Location: ../login/index.php?ok=1");
    exit();
}
?>

