<?php  include "../header.php"?>
<?php     
                //  inc totales
                $inc_totales ="SELECT COUNT(*) as totales FROM incidencias";
                $result_totales = mysqli_query($conn, $inc_totales);
                $totales = mysqli_fetch_assoc($result_totales)['totales'];
                // inc pendientes
                $inc_pendientes ="SELECT COUNT(*) as pendientes FROM incidencias WHERE fecha_sol = '0000-00-00'";
                $result_pend = mysqli_query($conn, $inc_pendientes);
                $pendientes = mysqli_fetch_assoc($result_pend)['pendientes'];
                // inc resueltas
                $inc_resueltas ="SELECT COUNT(*) as resueltas FROM incidencias WHERE fecha_sol <> '0000-00-00' ";
                $result_resueltas = mysqli_query($conn, $inc_resueltas);
                $resueltas = mysqli_fetch_assoc($result_resueltas)['resueltas'];
      ?>
 <!-- Barra de navegación-->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Gestión de incidencias</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Incidencias totales  <?php echo $totales ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Incidencias pendientes <?php echo $pendientes ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Incidencias resueltas <?php echo $pendientes ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php" class="btn btn-warning mt-5">Cerrar sesión</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>  

<?php session_set_cookie_params();?>
<?php session_start();?>
<?php 
  if(isset($_POST['crear'])) 
    {
        $aula = htmlspecialchars($_POST['selecciona']);
        $descripcion = htmlspecialchars($_POST['descripcion']);
        $comentario = htmlspecialchars($_POST['comentario']);
        $fecha_alta = htmlspecialchars($_POST['fecha_alta']);
        $fecha_rev = htmlspecialchars($_POST['fecha_rev']);
        $fecha_sol = htmlspecialchars($_POST['fecha_sol']);

        
        $plantaula = $conn->prepare("SELECT * FROM aulas");
        $plantaula->execute();
        $result_plantaula = $plantaula->get_result();
        while ($row = $result_plantaula->fetch_assoc()) {
          if ($row['id_aulas'] == $aula) {
            $id_planta = $row['id_plantas'];
          }
        }

        $query= "INSERT INTO incidencias(planta, aula, descripcion, fecha_alta, fecha_rev, fecha_sol, comentario) VALUES('{$id_planta}','{$aula}','{$descripcion}','{$fecha_alta}','{$fecha_rev}','{$fecha_sol}','{$comentario}')";
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
<select name="selecciona" id="selecciona" class="form-control" required>
<option value="">Selecciona</option>   
          <?php 
          $sql_planta="SELECT id_plantas, nombre_plantas from plantas order by 1";
          $sql_aula="SELECT id_aulas, nombre_aula, id_plantas from aulas";
          $result_plantas=$conn->query($sql_planta);
          while ($row_planta = $result_plantas->fetch_assoc()) {
            echo "<optgroup label=" . $row_planta['nombre_plantas'] . " name=" . $row_planta['nombre_plantas'] .">";  
            $result_aulas=$conn->query($sql_aula);
            while ($row_aulas = $result_aulas->fetch_assoc()) {
                 if ($row_aulas["id_plantas"] == $row_planta["id_plantas"]){
                  echo "<option value=" . $row_aulas["id_aulas"] . ">" . $row_aulas["nombre_aula"] . "</option>";   
                }
              }  
            echo "</optgroup>";
            }
            
            
          ?>
  </select>
</div>
      <div class="form-group">
        <label for="descripcion" class="form-label">Descripcion</label>
        <input type="text" name="descripcion"  class="form-control" required>
      </div>
      <div class="form-group">
        <label for="fecha_alta" class="form-label">Fecha Alta</label>
        <input type="date" name="fecha_alta"  class="form-control" required>
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
