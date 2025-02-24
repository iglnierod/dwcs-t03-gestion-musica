<?php
include("database.php");

if (isset($_POST["anadir_artista"])) {
  $nombre = $_POST["nombre"];
  $genero = $_POST["genero"];
  $anio_debut = $_POST["anio_debut"];

  if (empty($nombre) || empty($genero)) {
    die("El nombro/género está vació.");
  }

  if (!empty($anio_debut) && (!is_numeric($anio_debut) || $anio_debut < 1900 || $anio_debut > 2999)) {
    die("El año de debut no es correcto. Debe estar entr 1900 y 2999.");
  }

  $anio_debut = !empty($anio_debut) ? (int)$anio_debut : null;

  $query = "INSERT INTO artistas (nombre, genero, anio_debut) VALUES (?, ?, ?)";
  $stmt = $conexion->prepare($query);
  $stmt->bind_param("ssi", $nombre, $genero, $anio_debut);
  $stmt->execute();

  header("Location: app.php");
}
