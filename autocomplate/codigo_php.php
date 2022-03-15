<?php
include("abrir_conexion.php");

echo
'
<select class="form-control" id="tipo_venta" name="tipo_venta">
	';

$accion = $_POST['accion'];

if ($accion == 4) {
	$mi_busqueda = $_POST['mi_busqueda'];
	// $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE numero LIKE '%$mi_busqueda%' LIMIT 5");
	$resultados = mysqli_query($conexion, "SELECT concat_ws('', b.bloque, a.numero) AS bloqueresult, a.id_lote, a.numero, a.areav2, a.estado, b.bloque, a.estado FROM lotes a, bloques b WHERE a.id_bloque = b.id_bloque and a.estado = 'd' AND concat_ws('', b.bloque, a.numero) LIKE '%$mi_busqueda%'");
	while ($consulta = mysqli_fetch_array($resultados)) {
		echo
		'
				<option value="CRÉDITO">' . $consulta['bloqueresult'] . '</option>
	    ';
	}
} else {
	if ($accion == 1) {
		$tabla = $tabla_db1;
	}
	if ($accion == 2) {
		$tabla = $tabla_db2;
	}


	//CONSULTAR
	$resultados = mysqli_query($conexion, "SELECT concat_ws('', b.bloque, a.numero) AS bloqueresult, a.id_lote, a.numero, a.areav2, a.estado, b.bloque, a.estado FROM lotes a, bloques b WHERE a.id_bloque = b.id_bloque and a.estado = 'd'");
	while ($consulta = mysqli_fetch_array($resultados)) {
		echo
		'
				<option value="CRÉDITO">' . $consulta['bloqueresult'] . '</option>
				
	    ';
	}
}

echo '<select>';
