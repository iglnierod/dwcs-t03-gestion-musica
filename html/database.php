<?php
  $servidor = "mysql";
  $usuario = "root";
  $contrasena = "rootpassword";
  $base_de_datos = "musica";

  // Crear la conexión
  $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

  // Verificar la conexión
  if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
  }
?>