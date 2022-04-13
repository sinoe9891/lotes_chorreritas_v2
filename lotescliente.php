<?php
	include 'includes/conexion.php';
	include 'includes/funciones.php';
	$id = $_GET['ID'];
	$loteClienteQuery = obtenerInfoLotesCliente($id);
	var_dump($loteClienteQuery);

	// if ($loteClienteQuery->num_rows > 0) {
		$sep = '';
		while ($row = $loteClienteQuery->fetch_array()) {
			$lote = $row['numero'];
			$bloque = $row['bloque'];
			$lotes = $bloque . '-' . $lote;
			$text = $lotes;
			$lotesa = '<a href="edicion-lote.php?ID=' . $lote . '1&bloque=' . $bloque . '">' . $sep . $text . '</a>';
			$sep = ', ';
			echo $lotesa;
		};
	// } else {
	// 	echo 'No tiene lotes asignados';
	// }
?>