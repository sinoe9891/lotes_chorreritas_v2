

<?php

// importar la conexion
include 'includes/conexion.php';
$consulta = $conn->query("SELECT DISTINCT a.id_factura, a.id_cobro, a.no_factura, a.fecha_pago, a.monto_pagado, a.fecha_pago, b.id_contrato_compra, a.saldo_actual, a.estado_factura, a.usuario, c.estado_cobro, c.hora_pagada FROM facturas a, ficha_compra b, cobros c WHERE (a.estado_factura = 'emitida' OR a.estado_factura = 'anulada') AND b.id_ficha_compra = c.id_contrato and a.contrato = c.id_contrato and a.id_cobro = c.id_cobro ORDER BY a.no_factura DESC;;");
while ($solicitud = $consulta->fetch_array()) {
	date_default_timezone_set('America/Tegucigalpa');
	$id_factura = $solicitud['id_factura'];
	$id_cobro = $solicitud['id_cobro'];
	$fecha_pago = $solicitud['fecha_pago'];
	$hora_pagada = $solicitud['hora_pagada'];
	$estado = $solicitud['estado_factura'];
	$apertura = new DateTime($hora_pagada);
	$DateAndTime = date('Y-m-d H:i:s', time());
	$cierre = new DateTime($DateAndTime);
	$tiempo = $apertura->diff($cierre);
	$cierreAnular = $tiempo->format('%H');
	$dia = $tiempo->format('%d');
	echo 'día: ' . $dia . '<br>';
	echo 'hora: ' . $cierreAnular . '<br>';
}


?>