<?php  include "../header.php"?>;
<?php session_start()?>;
<?php 
  if(isset($_POST['crear'])) 
    {
        $planta = htmlspecialchars($_POST['planta']);
        $aula = htmlspecialchars($_POST['aula']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $comentario = htmlspecialchars($_POST['comentario']);
        $fecha_alta = htmlspecialchars($_POST['fecha_alta']);
        $fecha_rev = htmlspecialchars($_POST['fecha_rev']);
        $fecha_sol = htmlspecialchars($_POST['fecha_sol']);
      
        $query= "INSERT INTO incidencias(planta, aula, descripcion, fecha_alta, fecha_rev, fecha_sol, comentario) VALUES('{$planta}','{$aula}','{$descripcion}','{$fecha_alta}','{$fecha_rev}','{$fecha_sol}','{$comentario}')";
        $resultado = mysqli_query($conn,$query);
    
          if (!$resultado) {
              echo "Algo ha ido mal añadiendo la incidencia: ". mysqli_error($conn);
          }
          else
          {
            echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!')</script>";
          }         
    }

?>

<h1 class="text-center">Añadir incidencia</h1>
  <div class="container">
    <form action="" method="post">
<div class="form-group">
<label for="selecciona">Selecciona el aula según la planta a la que corresponda:</label>
<select name="selecciona" id="selecciona" class="form-control">
<option value="select">Selecciona</option>    
<!-- <optgroup label="Planta 0" name='planta'> -->
          <?php 
          $sql_planta="SELECT id_plantas, nombre_plantas from plantas order by 1";
          $sql_aula="SELECT id_aulas, nombre_aula, id_plantas from aulas";
          $result_plantas=$conn->query($sql_planta);
          while ($row_planta = $result_plantas->fetch_assoc()) {
            echo "<optgroup label=" . $row_planta['nombre_plantas'] . " name=" . $row_planta['nombre_plantas'] . ">";  
            $result_aulas=$conn->query($sql_aula);
            while ($row_aulas = $result_aulas->fetch_assoc()) {
                 if ($row_aulas["id_plantas"] == $row_planta["id_plantas"]){
                  echo "<option value=" . $row_aulas["id_aulas"] . ">" . $row_aulas["nombre_aula"] . "</option>"; 
                }
              }  
            echo "</optgroup>";
            }
            
            
          ?>
      <!-- <option value="aula10">Aula 10</option>
      <option value="aula11">Aula 11</option>
      <option value="aula12">Aula 12</option>
      <option value="aula13">Aula 13</option>
    </optgroup>
    <optgroup label="Planta 1" name='planta'>
      <option value="aula200">Aula 200</option>
      <option value="aula201">Aula 201</option>
      <option value="aula202">Aula 202</option>
      <option value="aula203">Aula 203</option>
    </optgroup>
    <optgroup label="Planta 2" name='planta'>
      <option value="aula300">Aula 300</option>
      <option value="aula301">Aula 301</option>
      <option value="aula302">Aula 302</option>
      <option value="aula303">Aula 303</option>
    </optgroup> -->
  </select>
</div>
      <div class="form-group">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" name="descripcion"  class="form-control">
      </div>
      <div class="form-group">
        <label for="fecha_alta" class="form-label">Fecha Alta</label>
        <input type="date" name="fecha_alta"  class="form-control">
      </div>
      <div class="form-group">
        <label for="fecha_rev" class="form-label">Fecha Revisión</label>
        <input type="date" name="fecha_rev"  class="form-control">
      </div>
      <div class="form-group">
        <label for="fecha_sol" class="form-label">Fecha Solución</label>
        <input type="date" name="fecha_sol"  class="form-control">
      </div>
      <div class="form-group">
        <label for="comentario" class="form-label">Comentario</label>
        <input type="text" name="comentario"  class="form-control">
      </div>
      <div class="form-group">
        <input type="submit"  name="crear" class="btn btn-primary mt-2" value="Añadir">
      </div>
    </form> 
  </div>
  <div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Volver </a>
  <div>
    <?php if ($_SESSION['user']) {
                    
                  }
                  else{
                    header ("location: ../index.php");
                  }
  ?>
<?php include "../footer.php" ?>