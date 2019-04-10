<?php  ?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Datos Estudiantes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="bg-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary">Registro de datos</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"></h5>
        <form action="crear.php" method="post" id="form-box" class="p-2">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Nombre" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" name="apellido" class="form-control" placeholder="Apellidos" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" name="codigo" class="form-control" placeholder="Codigo" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" name="carrera" class="form-control" placeholder="Carrera" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" name="documento" class="form-control" placeholder="Documento" required>
          </div>
          <div class="form-group input-group">
            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Send">
           
            
          </div>
        </form>
      </div>
    </div>
  </div>

  <table class="table">
  <thead>
    <tr>
    
      <th >Nombre</th>
      <th>Apellido</th>
      <th>Codigo</th>
      <th>Documento</th>
      <th>Carrera</th>
      <th>Eliminar</th>
      <th>Editar</th>
    </tr>
  </thead>
  <tbody id="infor">

  </tbody>
</table>
  <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script>



    function eliminar(argument) {
      // body...
      alert(argument);
       $('#infor').empty();
   $.ajax({
                url: "eliminar.php",
                type: "POST",
                cache: false,
                data:{argument:argument},
                success: function(data){
                    console.log(data);
                  
                },
                error: function(data){
                    console.log(data);
                }
            });
   leer();
}

function insert(nombre,apellido,codigo,documento,carrera) {
  console.log(nombre+apellido+codigo+documento+carrera);
  //$('#infor').empty();
  $('#infor').append('<tr>'+
                        '<td>'+nombre+'</td>'+
                        '<td>'+apellido+'</td>'+
                        '<td>'+codigo+'</td>'+
                        '<td>'+documento+'</td>'+
                        '<td>'+carrera+'</td>'+
                        '<td><button onclick="eliminar('+codigo+')">eliminar</button></td>'+
                        '<td><button>editar</button></td>'+
                        '</tr>');
}

  function leer() {
       $.ajax({
                url: "leer.php",
                type: "GET",
                cache: false,
               success: function(data){
                    console.log(data);
                   var dato= data.split('+');
                   console.log(dato.length);
                    for (var i =0;  i< dato.length -1; i=i+5) {
                    
                        insert(dato[i],dato[i+1],dato[i+2],dato[i+3],dato[i+4]);
                      

                    }

                  
                },
                error: function(data){
                    console.log(data);
                }
            });
  }
    leer();



  </script>
</body>
</html>