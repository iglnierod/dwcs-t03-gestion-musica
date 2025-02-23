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

  // SELECT de prueba
  $sql_numero_artistas = "select count(id) as total_artistas from artistas";
  $sql_numero_generos = "SELECT DISTINCT genero FROM artistas";
  $result = $conexion->query($sql_numero_artistas);
  $numero_artistas = 0;
  if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $numero_artistas = $row["total_artistas"];
    }
  } else {
    echo "0 resultados";
  }

  $result = $conexion->query($sql_numero_generos);
  $numero_generos = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>T03 - Musica</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <h1>Bienvenido a la web de música</h1>
  <h2>Esta página web sirve para gestionar una pequeña base de datos sobre distintos artistas</h2>
  <h2>Datos almacenados:</h2>
  <section class="dynamic-data">
    <h3 class="c-black"><?=$numero_artistas?> artistas</h3>
    <h3 class="c-black"><?=$numero_generos?> géneros</h3>
  </section>
  <a href="app.php" class="btn">VER DATOS</a>
</body>
</html>