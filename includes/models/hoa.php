<?php
include '../funciones.php';


// $row = $resultado->fetch_assoc();
function cuotaLote($preciovara, $idcompra, $meses, $idcontrato, $prim)
{
	$resultado = obtenerTotalVarasContrato($idcontrato);
	while ($row = $resultado->fetch_assoc()) {
		$sumavaras = $row['suma'];
	}
	echo $sumavaras . '</br>';
	$cuota = $preciovara * $sumavaras;
	echo $cuota . '</br>';
	$cuota = $cuota / $meses;
	echo $cuota . '</br>';
	$cuota = $cuota + $prim;
	echo $cuota . '</br>';
	return $cuota;
}


$precio_vara2 = '750';
$id_ficha_compra = '1';
$plazo_meses = '120';
$id_contrato = 'LO2203-31-1';
$prima = '00.00';


cuotaLote($precio_vara2, $id_ficha_compra, $plazo_meses, $id_contrato, $prima);