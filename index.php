<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<div class="container mt-5">
    <h1 class="text-center"> Gestión simple de incidencias</h1>
        <p class="text-center">
            Ejemplo sin uso de cookies ni sesiones para implementar un CRUD en PHP con MySQL
        </p>
  <div class="container">
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
        <div class="from-group text-center">
        <label for="usuario">Usuario:</label><input type="text" name="usuario"><br>
    <label for="contrasena">Contraseña</label><input type="password" name="contrasena"><br>
            <input type="submit" class="btn btn-primary mt-2" value="¡Al lío!">
        </div>
    </form>
  </div>
</div>
<?php
echo "<p>Algo 1</p>";
if ($_POST){
    echo "<p>Algo 2</p>";
        $usuario = htmlspecialchars($_POST["usuario"]);
        $contrasena = htmlspecialchars(base64_encode($_POST['contrasena']));
        echo "Entro aqui";
        include_once 'db.php';
        // Intentamos la conexión con MySQL
        $enlace = mysqli_connect("sql307.thsite.top","thsi_35748554","mB?aD8Xy","thsi_35748554_proyecto");
            
        if ($enlace)
            //$query = "SELECT * FROM usuarios WHERE username='".$_POST['usuario']."' AND password='".$_POST['contrasena']."'";
            $query = "SELECT * FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$usuario)."' AND password='".mysqli_real_escape_string($enlace,base64_encode($_POST['contrasena']))."'";
            $result = mysqli_query($enlace,$query);
            if (mysqli_num_rows($result)==1)
            {

                header("location: includes/home.php");
                //echo "<p>Bienvenido " . $usuario . "</p>";
                session_start();
                $_SESSION['user'] = $usuario;
            }
            else {
                echo "<p>Acceso denegado</p>";
            }
}     
?>
<img src="" alt="">
<?php include "footer.php" ?>
