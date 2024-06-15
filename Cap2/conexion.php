<?php
$conexion = mysqli_connect("localhost","root","","ventas2015");

// Check connection
if (mysqli_connect_errno()) {
  echo "No se pudo conectar a la base de datos: " . mysqli_connect_error();
  exit();
}
?>