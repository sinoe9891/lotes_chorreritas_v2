<!DOCTYPE html>
<html>
<head>
	<title>Probando</title>
	<script src="jquery-3.4.1.min.js"></script>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>

	<div class="container">
		<h1 class="text-center">PLATAFORMA DE CONTROL</h1>
		<hr>
		<div class="row text-center">
			<div class="col"><input type="button" class="btn btn-primary" value="CLIENTES" onclick="saludame(1);"></div>
			<div class="col">
				<input type="button" class="btn btn-primary" value="EMPLEADOS" onclick="saludame(4);"><br><br>
				
				<input type="text" id="cuadro_buscar" class="form-control" onkeypress="mi_busqueda();">

			</div>
			<div class="col"><input type="button" class="btn btn-primary" value="ADMINISTRADORES" onclick="saludame(3);"></div>
		</div>

		<hr>
		<h2 class="text-center">LISTAS DETALLADAS</h2>
		<div class="row justify-content-md-center">		
			<div class="col-md-8">
				<div id="mostrar_mensaje">

				</div>
			</div>
		</div>
	</div>


<!-- ----------------- EMPIEZA CODIGO AJAX ---------------------------------> 
<script>
	function mi_busqueda()
    { 
    	buscar = document.getElementById('cuadro_buscar').value;
      var parametros = 
      {
        "mi_busqueda" : buscar,
        "accion" : "4"
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

	function saludame(boton)
    { 
    	accion = boton;
      var parametros = 
      {
        "accion" : accion
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
<!-- ----------------- TERMINA CODIGO AJAX ---------------------------------> 
</body>
</html>