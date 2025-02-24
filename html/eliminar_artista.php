<?php
include("database.php");
if (isset($_GET["id"])) {
  if (empty($_GET["id"])) {
    die("El ID no es válido.");
    exit;
  }
  $id = (int)($_GET["id"]);

  $query = "DELETE FROM artistas WHERE id = ?";
  $stmt = $conexion->prepare($query);
  $stmt->bind_param("i", $id);

  if (!$stmt) {
    die("No se ha podido preparar la consulta correctamente: " . $conexion->error);
  }

  $stmt->execute();

  $stmt->close();

  header("Location: app.php");
}
