<?php

$host = "localhost";
$us = "root";
$pass = "";
$database = "barberia";

$conx = new mysqli($host, $us, $pass, $database);

if ($conx->connect_error){
    echo "La conexion ha fallado";
}else {
};
?>