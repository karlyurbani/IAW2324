<?php include_once 'db.php';?>
<?php  include "../header.php"?>
<?php
    // Conexion con la base de datos
    header("Content-type:text/html;charset=utf-8");
    if (array_key_exists('username',$_POST) OR array_key_exists('password',$_POST))
    {
        if ($_POST['username']=='')
        {
            echo "<p>El nombre de usuario es obligatorio</p>";
        }
        else if ($_POST['password']=='')
        {
            echo "<p>La contraseña es obligatoria</p>";
        }
        else
        {
            // campos obligatorios
            $registra = "SELECT username FROM usuarios WHERE username='".mysqli_real_escape_string($conn,$_POST['username'])."'";
            $result = mysqli_query($conn,$registra);
            if (mysqli_num_rows($result)>0)
            {
                echo "<p>Ese nombre de usuario ya está registrado. Intenta con otro</p>";
            }
            else
            {
                // Añadir a nuestro usuario a la BD
                $registra="INSERT INTO usuarios (username, password) VALUES('".mysqli_real_escape_string($conn,$_POST['username'])."','".mysqli_real_escape_string($conn,base64_encode($_POST['password']))."')";
                if (mysqli_query($conn,$registra)){
                    echo "<p>¡Enhorabuena! Has registrado tu cuenta</p>";
                
                }
                else
                {
                    echo "<p>Hubo algún problema al registrar el usuario. Inténtelo más tarde</p>";
                }
            }
        }
    }

?>
<h1>Registro de usuario</h1>
<form method="POST">
<div class="row g-3 align-items-center">
<div class="col-auto">
    <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
    <input type="text" name="username" class="form-control" id="exampleInputName1" aria-describedby="namelHelp">
</div>
<div class="col-auto">
    <label for="InputPassword2" class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control" id="InputPassword2">
</div>
<div class="col-auto">
  <button type="submit" value="Registrar" class="btn btn-primary">Crear usuario</button>
</div>
</div>
</form>

