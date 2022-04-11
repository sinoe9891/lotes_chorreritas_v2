<?php
include 'includes/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factura</title>
</head>

<body>
	<h1>Factura</h1>
	<?php
	$consulta1 = $conn->query("SELECT * FROM info_cai a, info_empresa b where a.id_empresa = b.id_empresa");
	//while el id_cuota_pagada
	while ($row = $consulta1->fetch_assoc()) {
		$cai = $row['cai'];
		$fechaa_emision = $row['fecha_emision'];
		$fecha_limite = $row['fecha_limite'];
		$rango_inicial = $row['rango_inicial'];
		$rango_final = $row['rango_final'];
		$id_empresa = $row['id_empresa'];
		$nombre = $row['nombre'];
		$direccion = $row['direccion'];
		$rtn = $row['rtn'];
		$telefono = $row['telefono'];
		$correo = $row['correo'];
	}
	?>
	<div>
		<h4><?php echo $nombre ?></h4>
		<h4><?php echo $direccion ?></h4>
		<h4><?php echo $rtn ?></h4>
		<h4><?php echo $telefono ?></h4>
		<h4><?php echo $correo ?></h4>
		<hr>
		<h4>Factura</h4>
		<h4>CAI: <?php echo $cai ?></h4>
		<h4>Fecha de emisión: <?php echo $fechaa_emision ?></h4>
		<h4>Fecha límite de emisión: <?php echo $fecha_limite ?></h4>
		<h4>Rango inicial: <?php echo $rango_inicial ?></h4>
		<h4>Rango final: <?php echo $rango_final ?></h4>
		<?php
		$str = str_replace("-", "", $rango_inicial);
		$str1 = str_replace("-", "", $rango_final);
		echo $str . '<br>';
		echo $str1 . '<br>';
		echo $str1 - ($str - 1) . '<br>'; 
		// $cantidadFacturas = $str1 - $str;
		$cantidadFacturas = 10;
		// $str2 = ltrim($rango_inicial, "0");
		// echo $str2.'<br>';
		for ($i = 0; $i <= $cantidadFacturas; ++$i) {
			$len = 16;
			// echo $rango_inicial . '<br>';
			$str = str_replace("-", "", $rango_inicial);
			$str = $str + $i;

			$new_str = str_pad($str, $len, "0", STR_PAD_LEFT);
			// echo $new_str . '<br>';

			$uno = substr($new_str, 0, 3);
			$dos = substr($new_str, 3, 3);
			$tres = substr($new_str, 6, 2);
			$cuatro = substr($new_str, 8, 8);
			$numero = $uno .'-'.$dos .'-'.$tres .'-'.$cuatro;
			// echo $numero . '<br>';
			$string1 = strval($numero);
			echo $string1 . '<br>';
			$estado = 'disponible';
			$insertarFechas = $conn->query("INSERT INTO facturas (no_factura, estado_factura) VALUES ('$string1', '$estado')");
		}
		?>




	</div>
</body>

</html>