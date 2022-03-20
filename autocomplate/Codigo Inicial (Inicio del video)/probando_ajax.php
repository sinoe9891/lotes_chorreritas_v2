<!DOCTYPE html>
<html>
<head>
	<title>Probando</title>
	<script src="jquery-3.4.1.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
  <h1 class="text-center">PLATAFORMA DE CONTROL</h1>
  <hr>
  <div class="row text-center">
    <div class="col"><input type="button" class="btn btn-primary" value="CLIENTES" onclick="saludame();"></div>
    <div class="col"><input type="button" class="btn btn-primary" value="EMPLEADOS" onclick="saludame();"></div>
    <div class="col"><input type="button" class="btn btn-primary" value="ADMINISTRADORES" onclick="saludame();"></div>
  </div>
  <hr>
  <h2 class="text-center">LISTAS DETALLADAS</h2>
  <div class="row justify-content-md-center">
    <div class="col-md-8">
      <table class="table table-hover">
        <tr>
          <th scope="col">#</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDO</th>
          <th scope="col">TELEFONO</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Dostin</td>
          <td>Hurtado</td>
          <td>www.DostinHurtado.com</td>
        </tr>
      </table>
    </div>
  </div>
</div>

<div id="mostrar_mensaje"></div>


<script>
	function saludame()
    { 
      var parametros = 
      {
        "nombre" : "dostin",
        "apellido" : "hurtado",
        "telefono" : "123456789"
      };

      $.ajax({
        data: parametros,
        url: 'codigo_php.php',
        type: 'POST',
        
        beforesend: function()
        {
          $('#mostrar_mensaje').html("Mensaje antes de Enviar");
        },

        success: function(mensaje)
        {
          $('#mostrar_mensaje').html(mensaje);
        }
      });
    }


</script>
</body>
</html>