<?php 
$conexion = mysqli_connect("localhost", "root", "", "usuarios");
 
$nombre = $_POST['name'];
$apellido = $_POST['apellido'];
$edad = $_POST['codigo'];
$documento= $_POST['documento'];
$carrera= $_POST['carrera'];
 
mysqli_query($conexion, "INSERT INTO estudiantes(Nombre, Apellidos, Codigo,Documento,Carrera) VALUES ('$nombre', '$apellido', '$edad' ,       '$documento' , '$carrera')");
mysqli_close($conexion); 

header('Location: index.php');
?>