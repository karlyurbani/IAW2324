<!-- Header -->
<?php include "../header.php"?>
 <?php session_start(); ?>
  <div class="container">
    <h1 class="text-center" >Bienvenido
      <?php
      echo $_SESSION['user'];
      ?>
    </h1>
      <a href="create.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Añadir incidencia</a>
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
                  
                  if ($_SESSION['user']) {
                    
                  }
                  else{
                    header ("location: ../index.php");
                  }
                  
                  /*function contadorIncidencias($fecha_alta){
                    $incidencias_pendientes = 0;
                    $incidencias_resueltas = 0;
                    foreach ($fecha_alta as $fila) {
                      if (empty($fila['fecha_solucion'])){
                        $incidencias_pendientes++;
                      } else {
                        $incidencias_resueltas++;
                      }
                    }
                    return array(
                      'resueltas' => $incidencias_resueltas;
                      'pendientes' => $incidencias_pendientes;
                      $tabla_incidencias = array(
                        array('fecha_solucion' => '2024-01-25'),
                        array('fecha_solucion' => ''),
                        array('fecha_solucion' => '2024-01-28'),
                        array('fecha_solucion' => '')
                    );
                    
                    $contar_incidencias = contarIncidencias($tabla_incidencias);
                    echo "Incidencias resueltas: " . $contar_incidencias['resueltas'] . "<br>";
                    echo "Incidencias pendientes: " . $contar_incidencias['pendientes'] . "<br>";
                    )
                  }*/

                ?>
              </tr>  
            </tbody>
        </table>
                </div>
                
<?php include "../footer.php" ?>