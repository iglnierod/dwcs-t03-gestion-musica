<?php
$head_title = "Inicio - App Musica";
include("includes/head.php");
include("includes/navbar.php");
?>

<?php
include("database.php"); // Conexión a la base de datos

// SELECT de prueba
$sql_numero_artistas = "select count(id) as total_artistas from artistas";
$sql_numero_generos = "SELECT DISTINCT genero FROM artistas";
$result = $conexion->query($sql_numero_artistas);
$numero_artistas = 0;
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $numero_artistas = $row["total_artistas"];
  }
} else {
  echo "0 resultados";
}

$result = $conexion->query($sql_numero_generos);
$numero_generos = $result->num_rows;
?>
<main class="container my-5">
  <h1 class="text-center mb-4">Bienvenido a la web de música</h1>
  <h2 class="text-center mb-4 text-muted">Esta página web sirve para gestionar una pequeña base de datos sobre distintos artistas</h2>
  <h3 class="text-center mb-3">Datos almacenados:</h3>
  <section class="dynamic-data row justify-content-center">
    <h3 class="c-black col-6 col-md-4 text-center mb-3"><?= $numero_artistas ?> artistas</h3>
    <h3 class="c-black col-6 col-md-4 text-center mb-3"><?= $numero_generos ?> géneros</h3>
  </section>
  <div class="text-center">
    <a href="app.php" class="btn btn-primary btn-lg">VER DATOS</a>
  </div>
</main>

<?php include("includes/footer.php") ?>