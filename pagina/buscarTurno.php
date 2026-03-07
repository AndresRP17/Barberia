<?php
session_start();
include("../conx.php");

// Todos los horarios posibles
$horariosDisponibles = ["09:00","10:00","11:00","12:00","16:00","17:00","18:00","19:00"];
$horarios_ocupados = [];

if(isset($_POST['fecha'])){
    $fecha = $_POST['fecha'];

    $stmt = $conx->prepare("SELECT hora FROM turnos WHERE fecha = ?");
    $stmt->bind_param("s", $fecha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while($row = $resultado->fetch_assoc()){
        $horarios_ocupados[] = trim($row['hora']);
    }
}

// Sacar los horarios ocupados de los disponibles
$horarios_libres = array_diff($horariosDisponibles, $horarios_ocupados);

// Devolver solo los libres
echo json_encode(array_values($horarios_libres));