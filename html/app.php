<?php include("database.php"); ?>

<?php
$head_title = "App Musica - Base de datos";
include("includes/head.php");
include("includes/navbar.php")
?>

<main class="container my-5">
  <h1 class="text-center mb-4">Gestionar base de datos</h1>
  <div class="row justify-content-center">
    <!-- Formulario -->
    <section class="col-12 col-md-4 border rounded p-3 mb-3 mb-md-0">
      <form action="anadir_artista.php" method="POST">
        <h4 class="text-center">Añadir artista</h4>
        <input type="text" name="nombre" class="form-control my-3" placeholder="Nombre" required />
        <input type="text" name="genero" class="form-control my-3" placeholder="Género" required />
        <input type="number" name="anio_debut" class="form-control my-3" min="1900" max="2999" placeholder="Año debut">
        <input type="submit" name="anadir_artista" class="btn btn-success w-100" value="Añadir" />
      </form>
    </section>
    <!-- Tabla -->
    <section class="col-12 col-md-8">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Género</th>
            <th>Año debut</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- CARGAR DATOS DE BASE DE DATOS -->
          <?php
          $query = "SELECT * FROM artistas";
          $result = mysqli_query($conexion, $query);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                <td><?= $row["nombre"] ?></td>
                <td><?= $row["genero"] ?></td>
                <td><?= $row["anio_debut"] ?></td>
                <td>Editar</td>
              </tr>
            <?php }
          } else {
            ?>
            <tr>
              <td colspan="4" class="text-center">No hay artsitas registrados</td>
            </tr>
          <?php }
          mysqli_free_result($result);
          ?>
        </tbody>
      </table>
    </section>
  </div>
</main>

<?php include("includes/footer.php"); ?>