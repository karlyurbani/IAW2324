<?php
$host = 'sql307.thsite.top';   
$user = 'thsi_35748554';   
$pass = "mB?aD8Xy";   
$database = 'thsi_35748554_proyecto';     
$conn = mysqli_connect($host,$user,$pass,$database);   
if (!$conn) {                                             
    die("Conexión fallida con base de datos: " . mysqli_connect_error());     
  }
?>


