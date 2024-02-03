<?php include "../header.php" ?>
<?php session_start()?>;
<?php 
     if(isset($_GET['eliminar']))
     {
         $id= htmlspecialchars($_GET['eliminar']);
         $query = "DELETE FROM incidencias WHERE id = {$id}"; 
         $delete_query= mysqli_query($conn, $query);
         // header("Location: home.php");
         echo "<script>window.location='home.php';</script>";
     }
?>
 <?php if ($_SESSION['user']) {
                    
                }
                else{
                  header ("location: ../index.php");
                }
?>
<?php include "../footer.php" ?>