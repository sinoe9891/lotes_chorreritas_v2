<?php
include("abrir_conexion.php");

// echo
// '
// <select class="form-control" id="tipo_venta" name="tipo_venta">
// 	';

$accion = $_POST['accion'];

if ($accion == 4) {
	$mi_busqueda = $_POST['mi_busqueda'];
	// $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE numero LIKE '%$mi_busqueda%' LIMIT 5");
	// echo $mi_busqueda;
	$resultados = mysqli_query($conexion, "SELECT b.fecha_pago, b.no_cuota, a.cuota FROM ficha_compra a, control_credito_lote b, ficha_directorio c WHERE a.id_ficha_compra = b.id_compra and b.estado_cuota = 'sig' and a.id_registro = '$mi_busqueda';");
	echo "SELECT b.fecha_pago, b.no_cuota, a.cuota FROM ficha_compra a, control_credito_lote b, ficha_directorio c WHERE a.id_ficha_compra = b.id_compra and b.estado_cuota = 'sig' and a.id_registro = '$mi_busqueda'";
	// $resultados = mysqli_query($conexion, "SELECT concat_ws('', b.bloque, a.numero) AS bloqueresult, a.id_lote, a.numero, a.areav2, a.estado, b.bloque, a.estado FROM lotes a, bloques b WHERE a.id_bloque = b.id_bloque and a.estado = 'd' AND concat_ws('', b.bloque, a.numero) LIKE '%$mi_busqueda%'");
	while ($consulta = mysqli_fetch_array($resultados)) {
		echo
		'	
				<div class="caja">
				<p>' . $consulta['fecha_pago'] . '</p>
				<p>' . $consulta['no_cuota'] . '</p>
				<p>' . $consulta['cuota'] . '</p>
				</div>
	    ';
	}
} else {
	if ($accion == 1) {
		$tabla = $tabla_db1;
	}
	if ($accion == 2) {
		$tabla = $tabla_db2;
	}
	if ($accion == 3) {
		$tabla = $tabla_db3;
	}


	// CONSULTAR
	$resultados = mysqli_query($conexion, "SELECT * FROM ficha_directorio");
	while ($consulta = mysqli_fetch_array($resultados)) {
		echo
		'
				<option value="CRÉDITO">' . $consulta['nombre_completo'] . '</option>
				
	    ';
	}
}

// echo '<select>';
