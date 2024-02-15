<!-- Header -->
<?php include "../header.php"?>
 <?php session_start(); 
  if ($_SESSION['user']) {                 
  }
  else{
    header ("location: ../index.php");
  }?>
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
        <a class="nav-link" href="#">Incidencias resueltas <?php echo $resueltas ?></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="../index.php" class="btn btn-warning mt-5">Cerrar sesión</a>
      </li>
    </ul>
  
  </div>
</nav> 
  <div class="container">
    <h1 class="text-center" >Bienvenido
      <?php
      echo $_SESSION['user'];
      ?>
      <!-- Barra de navegación--> 
    </h1>
      <a href="create.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Añadir incidencia</a>
      <a href="usuarios.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Añadir Usuario</a>
        <table class="table table-striped table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col">Id</th>
              <th  scope="col">Planta</th>
              <th  scope="col">Aula</th>
              <th  scope="col">Descripción</th>
              <th  scope="col">Fecha alta</th>
              <th  scope="col">Fecha revisión</th>
              <th  scope="col">Fecha solución</th>
              <th  scope="col">Comentario</th>
              <th  scope="col" colspan="3" class="text-center">Operaciones</th>
            </tr>  
          </thead>
            <tbody>
              <tr>

          <?php
            $query="SELECT * FROM incidencias";               
            $vista_incidencias= mysqli_query($conn,$query);

            while($row= mysqli_fetch_assoc($vista_incidencias)){
              $id = $row['id'];                
              $planta = $row['planta'];        
              $aula = $row['aula'];         
              $descripcion = $row['descripcion'];        
              $fecha_alta = $row['fecha_alta'];        
              $fecha_rev = $row['fecha_rev'];        
              $fecha_sol = $row['fecha_sol'];        
              $comentario = $row['comentario']; 
              echo $usuario;
              echo "<tr >";
              echo " <th scope='row' >{$id}</th>";
              echo " <td > {$planta}</td>";
              echo " <td > {$aula}</td>";
              echo " <td >{$descripcion} </td>";
              echo " <td >{$fecha_alta} </td>";
              echo " <td >{$fecha_rev} </td>";
              echo " <td >{$fecha_sol} </td>";
              echo " <td >{$comentario} </td>";
              echo " <td class='text-center'> <a href='view.php?incidencia_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i> Ver</a> </td>";
              echo " <td class='text-center' > <a href='update.php?editar&incidencia_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Editar</a> </td>";
              echo " <td class='text-center'>  <a href='delete.php?eliminar={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> Eliminar</a> </td>";
              echo " </tr> ";
                  }
               
                ?>
              </tr>  
            </tbody>
        </table>
                </div>
                
<?php include "../footer.php" ?>