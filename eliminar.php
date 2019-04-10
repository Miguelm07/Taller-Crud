<?php
$conexion = mysqli_connect("localhost", "root", "", "usuarios");
 
$id = $_POST['argument'];
 
mysqli_query($conexion, "DELETE FROM estudiantes WHERE Codigo = " . $id);
mysqli_close($conexion);
?>