	<?php  
$mysql = new mysqli('localhost', 'root', '', 'usuarios') or die ('Hubo un error al conectarse con la base de datos');
$stmt = $mysql->prepare("SELECT * FROM estudiantes") or die ('error al hacer la consulta');
$stmt->execute();
$stmt->bind_result($Nombre,$Apellido,$Codigo,$Documento,$Carrera);

while ($row = $stmt->fetch()) :
echo $Nombre.'+';
echo $Apellido.'+';
echo $Codigo.'+';
echo $Documento.'+';
echo $Carrera.'+';
endwhile;?>