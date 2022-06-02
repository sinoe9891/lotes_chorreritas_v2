<?php
date_default_timezone_set('America/Tegucigalpa');
include '../includes/conexion.php';
include '../includes/funciones.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once 'model.php';
require_once 'convertidor/convertidor.php';
require_once 'convertidor/convertidor_fecha.php';
$modelonumero = new modelonumero();
$modelofecha = new modelofecha();
$stylesheet = file_get_contents('css/style.css');

if (isset($_GET['ID'])) {
	$id = $_GET['ID'];
	$estadoCuenta = $conn->query("SELECT * FROM ficha_compra a, ficha_directorio b WHERE a.id_ficha_compra = $id and a.id_registro = b.id;");
	$contador = 1;
	$bandera = false;
	while ($consultContrato = $estadoCuenta->fetch_array()) {
		$cuota = $consultContrato['cuota'];
		$total_venta = $consultContrato['total_venta'];
		$nombre_completo = $consultContrato['nombre_completo'];
		$id_contrato_compra = $consultContrato['id_contrato_compra'];
		$identidad = $consultContrato['identidad'];
		$prima = $consultContrato['prima'];
		$plazo_meses = $consultContrato['plazo_meses'];
		// echo $cuota;

	}

	$empresa = $conn->query("SELECT * FROM info_empresa;");
	$contador = 1;
	$bandera = false;
	while ($consultEmpresa = $empresa->fetch_array()) {
		$nombre = $consultEmpresa['nombre'];
		$abreviacion = $consultEmpresa['abreviacion'];
		$direccion = $consultEmpresa['direccion'];
		$rtn = $consultEmpresa['rtn'];
		$telefono = $consultEmpresa['telefono'];
		$correo = $consultEmpresa['correo'];
		// echo $cuota;
	}

	$estadoCuenta = $conn->query("SELECT a.fecha_cuota, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante, b.plazo_meses, b.estado FROM cobros a, ficha_compra b WHERE b.id_ficha_compra = $id AND a.id_contrato = b.id_ficha_compra AND a.estado_cobro = 'emitida';");
	$contador = 1;
	$numero = $estadoCuenta->num_rows;

	if ($estadoCuenta->num_rows > 0) {

		$html = '<div class="card" >
				<img class="bck_icon" src="../assets/images/logo/logo.png" alt="red">
			</div>';
		$html .= '<div class="container_cronograma"><h3>' . $abreviacion . '</h3>';
		$html .= '<p>RTN: ' . $rtn . '</p>';
		$html .= '<p>' . $direccion . '</p>';
		$html .= '<p>Teléfonos: ' . $telefono . '</p>';
		$html .= '</div>';
		$html .= '<div style="text-align:center;"><h4>PROYECTO CHORRERITAS</h4></div>';
		// $html .= '<img class="bck_icon" src="../assets/images/logo/logo.svg" alt="red">
		// </div>';
		$html .= '<div class="container_cliente">';
		$html .= '<table class="tablecliente">
					<tr>
						<th>Cliente: </th>
						<td style="width:30%;">' . $nombre_completo . '</td>
						<th>Identidad: </th>
						<td>' . $identidad . '</td>
						<th></th>
						<td></td>
					</tr>
					<tr>
						<th>Contrato: </th>
						<td>' . $id_contrato_compra . '</td>
						<th>Lotes: </th>
						<td>';
		$loteClienteQuery = obtenerInfoLotesCliente($id);
		$sep = '';
		while ($row = $loteClienteQuery->fetch_array()) {
			$lote = $row['numero'];
			$bloque = $row['bloque'];
			$lotes = $bloque . '-' . $lote;
			$text = $lotes;
			$lotesa = $sep . $text;
			$html .= $lotesa;
			$sep = ', ';
		};

		$html .= '</td></tr>

					<tr>
						<th>Crédito: </th>
						<td>L.' . number_format(($total_venta - $prima), 2, '.', ',') . '</td>
						<th>Prima: </th>
						<td>L.' . number_format($prima, 2, '.', ',') . '</td>
						<th>Total Venta: </th>
						<td>L.' . number_format($total_venta, 2, '.', ',') . '</td>
					</tr>
					<tr>
						<th>No. Cuotas: </th>
						<td>' . $plazo_meses . ' Cuotas Mensuales</td>
						<th></th>
						<td></td>
						<th></th>
						<td></td>
					</tr>
			</table>';

		$html .= '<div class="container_cronograma"><h4>CRONOGRAMA DE PAGOS MENSUALES - VENTAL AL CRÉDITO</h4></div>
			<table class="tablecronograma">
				<tr>
					<th>No.</th>
					<th>Fecha de Pago </th>
					<th>Cuota a pagar</th>
					<th>Estado</th>
					<th>Monto Restante</th>
				</tr>
				';
		$html .= '<tr>
			<td>0</td>
			<td></td>
			<td></td>
			<td>Saldo Inicial</td>
			<td><b>L.' . number_format($total_venta, 2, '.', ',') . '</b></td>
		</tr>';
		if($prima > 0){
			$pendiente = $total_venta - $prima;
			$html .= '<tr>
			<td>0</td>
			<td>Prima</td>
			<td><b>L.' . number_format($prima, 2, '.', ',') . '</b></td>
			<td>Pagado</td>
			<td><b>L.' . number_format($pendiente, 2, '.', ',') . '</b></td>
		</tr>';
		}
		if ($estadoCuenta->num_rows > 0) {
			while ($solicitud = $estadoCuenta->fetch_array()) {
				date_default_timezone_set('America/Tegucigalpa');
				$fecha_pago = $solicitud['fecha_cuota'];
				$fecha_pago = new DateTime($fecha_pago);
				$fecha_pago1 = $fecha_pago->format('d-m-Y');
				$fecha_pago3 = $fecha_pago->format('d-m-Y');
				$cuota = $solicitud['cuota'];
				$cantidad_pagada = $solicitud['cantidad_pagada'];
				$total_venta = $solicitud['total_venta'];
				$plazo_meses = $solicitud['plazo_meses'];
				$estado = $solicitud['estado'];
				$monto_restante = $solicitud['monto_restante'];
				if ($monto_restante == 0) {
					$cuota = $cantidad_pagada;
				}
				if ($estado == 'pag') {
					$status = "Pagado";
					$coloractual = 'bg-secondary';
				}
				$fecha_pago = date("d/m/Y", strtotime($fecha_pago1 . " +1 month"));
				$fecha_pago5 = date("d/m/Y", strtotime($fecha_pago3));
				// $fecha_pago2 = date("d/m/Y", strtotime($fecha_pago3 . " +1 month")) . "<br>";


				$html .= '<tr>
						<td>' . $contador++ . '</td>
						<td>' . $fecha_pago5 . '</td>
						<td><b>L.' . number_format($cuota, 2, '.', ',') . '</b></td>
						<td>Pagado</td>
						<td>L.' . number_format($monto_restante, 2, '.', ',') . '</td>
					</tr>';
			}
		// 	$html .= '<tr>
		// 	<td></td>
		// 	<td></td>
		// 	<td>dIVISIÓN</td>
		// 	<td></td>
		// </tr>';
			$cantidad_pagada = 0;
			$bandera = false;
			// echo $fecha_pago . "<br>";
			// $fecha_pago1 = $fecha_pago->format('d-M-Y');
			$fecha_pago = date("d-m-Y", strtotime($fecha_pago1 . " +1 month"));
			// $fecha_pago2 = date("d-m-Y", strtotime($fecha_pago . "+2 month")) . "<br>";
			// echo $fecha_pago2;
			$plazo_meses = $plazo_meses - $numero;
			
			if ($monto_restante != 0) {
				for ($i = 0; $i < $plazo_meses; ++$i) {

					$fecha_pago2 = date("d/m/Y", strtotime($fecha_pago . " +$i month")) . "<br>";
					// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
					//ultima cuota sea igual al monto_restante
					if ($monto_restante <= $cuota && $monto_restante >= 0) {
						$cuota = $monto_restante;
						$monto_restante = 0;
						$bandera = true;
					}

					//restar la cuota de $total_venta\
					if ($monto_restante > $cuota) {
						$no_cuota = $i + 1;
						$total_venta = $monto_restante - $cuota;
						$monto_restante = $total_venta - $cantidad_pagada;
					}



					$html .= '<tr>
						<td>' . $contador++ . '</td>
						<td>' . $fecha_pago2 . '</td>
						<td><b>L.' . number_format($cuota, 2, '.', ',') . '</b></td>
						<td>Pendiente</td>
						<td>L.' . number_format($monto_restante, 2, '.', ',') . '</td>
					</tr>';
					if ($bandera) {
						// $cuota = $monto_restante;
						break;
					}
				}
			}
		}
		$html .= '</table>';


		try {
			// $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
			$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
			// son mm 
			// $mpdf = new \Mpdf\Mpdf(['format' => [75.9989, 355.6]]);
			$mpdf->adjustFontDescLineheight = 1.2;
			// $mpdf->SetMargins(10, 250, 10);
			// $mpdf->AddPageByArray([
			// 	'margin-left' => 2.5,
			// 	'margin-right' => 2.5,
			// 	'margin-top' => 11,
			// 	'margin-bottom' => 0,
			// ]);
			$mpdf->SetAutoPageBreak(true, 25);
			// $mpdf->debug = true;
			// ob_end_clean();
			$mpdf->WriteHTML($stylesheet, 1);
			$mpdf->WriteHTML($html);
			$nombrecronograma = "cronograma-" . $nombre_completo . '-' . $id_contrato_compra . ".pdf";
			$mpdf->Output(strtolower($nombrecronograma) . "", "I");
			// $mpdf->Output("facturas/" . ucwords(strtolower($nombrecronograma)), "F");
			//si no existe el directorio factura se debe crear el directorio

			// $mpdf->Output("Contrato ".$bloque .'-'. $numero .' '. ucwords(strtolower($nombre)) . ".pdf", "D");
		} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
			//       name used for catch
			// Process the exception, log, print etc.
			echo $e->getMessage();
		}
		//convertir pdf a jpg
		// $im = imagecreatefromjpeg('galería/Nota de Duelo '.ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).'.jpg');
		// $mpdf->Output("galería/Nota de Duelo ".ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).".jpg", "F");


		// }
	} else {
		// ESTA CONDICIÓN ESTA CORRECTA YA QUE NO SE HA REALIZADO NINGUN PAGO ES UN CRONOGRAMA EN LIMPIO
		$estadoCuenta = $conn->query("SELECT a.nombre_completo, b.fecha_primer_cuota, b.total_venta, b.saldo_actual, b.cuota, b.total_venta, b.plazo_meses, b.prima FROM ficha_directorio a, ficha_compra b WHERE b.id_ficha_compra = $id and b.id_registro = a.id;");
		$contador = 1;
		$numero = $estadoCuenta->num_rows;
		$html = '<div class="card" >
				<img class="bck_icon" src="../assets/images/logo/logo.png" alt="red">
			</div>';
		$html .= '<div class="container_cronograma"><h3>' . $abreviacion . '</h3>';
		$html .= '<p>RTN: ' . $rtn . '</p>';
		$html .= '<p>' . $direccion . '</p>';
		$html .= '<p>Teléfonos: ' . $telefono . '</p>';
		$html .= '</div>';
		$html .= '<div style="text-align:center;"><h4>PROYECTO CHORRERITAS</h4></div>';
		// $html .= '<img class="bck_icon" src="../assets/images/logo/logo.svg" alt="red">
		// </div>';
		$html .= '<div class="container_cliente">';
		$html .= '<table class="tablecliente">
					<tr>
						<th>Cliente: </th>
						<td style="width:30%;">' . $nombre_completo . '</td>
						<th>Identidad: </th>
						<td>' . $identidad . '</td>
						<th></th>
						<td></td>
					</tr>
					<tr>
						<th>Contrato: </th>
						<td>' . $id_contrato_compra . '</td>
						<th>Lotes: </th>
						<td>';
		$loteClienteQuery = obtenerInfoLotesCliente($id);
		$sep = '';
		while ($row = $loteClienteQuery->fetch_array()) {
			$lote = $row['numero'];
			$bloque = $row['bloque'];
			$lotes = $bloque . '-' . $lote;
			$text = $lotes;
			$lotesa = $sep . $text;
			$html .= $lotesa;
			$sep = ', ';
		};

		$html .= '</td></tr>

					<tr>
						<th>Crédito: </th>
						<td>L.' . number_format(($total_venta - $prima), 2, '.', ',') . '</td>
						<th>Prima: </th>
						<td>L.' . number_format($prima, 2, '.', ',') . '</td>
						<th>Total Venta: </th>
						<td>L.' . number_format($total_venta, 2, '.', ',') . '</td>
					</tr>
					<tr>
						<th>No. Cuotas: </th>
						<td>' . $plazo_meses . ' Cuotas Mensuales</td>
						<th></th>
						<td></td>
						<th></th>
						<td></td>
					</tr>
			</table>';

		$html .= '<div class="container_cronograma"><h4>CRONOGRAMA DE PAGOS MENSUALES - VENTAL AL CRÉDITO</h4></div>
			<table class="tablecronograma">
				<tr>
					<th>No.</th>
					<th>Fecha de Pago</th>
					<th>Cuota a pagar</th>
					<th>Monto Restante</th>
					<th>Estado</th>
				</tr>
				';
		$html .= '<tr>
			<td>0</td>
			<td></td>
			<td></td>
			<td><b>L.' . number_format($total_venta, 2, '.', ',') . '</b></td>
			<td>Saldo Inicial</td>
		</tr>';
		if ($estadoCuenta->num_rows > 0) {
			while ($solicitud = $estadoCuenta->fetch_array()) {
				$fecha_primer_cuota = $solicitud['fecha_primer_cuota'];
				$fecha_pago = new DateTime($fecha_primer_cuota);
				$fecha_pago1 = $fecha_pago->format('d-M-Y');
				$nombre_completo = $solicitud['nombre_completo'];
				$plazo_meses = $solicitud['plazo_meses'];
				$saldo_actual = $solicitud['saldo_actual'];
				$prima = $solicitud['prima'];
				$cuota = $solicitud['cuota'];
				$total_venta = $solicitud['total_venta'];
				$total_venta = ($total_venta - $prima);
				for ($i = 0; $i <= $plazo_meses; ++$i) {
					// cambiar estado de la primera cuota por siguiente
					if ($i == 0) {

						$total_venta = $total_venta;
						$fecha_pago1 = date("Y-m-d", strtotime($fecha_primer_cuota));
					} else {

						$fecha_pago1 = date("Y-m-d", strtotime($fecha_primer_cuota . " +$i month"));
						$total_venta = $total_venta - $cuota;
					}
					// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
					$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago1 . " +$i month"));
					//restar la cuota de $total_venta
					$saldo_actual = $total_venta - $cuota;
					if ($total_venta <= $cuota && $total_venta >= 0) {
						$cuota = $total_venta;
						$total_venta = 0;
						if ($saldo_actual < 0) {
							$saldo_actual = 0;
						}
						$bandera = true;
					}
					$fecha_pago1 = new DateTime($fecha_pago1);
					$fecha = $fecha_pago1->format('d/m/Y');
					$fechahoy = new DateTime();
					$interval = $fecha_pago1->diff($fechahoy);
					$dias = $interval->format('%r%a');




					$html .= '<tr>
					<td>' . $contador++ . '</td>
					<td>' . $fecha . '</td>
					<td><b>L.' . number_format($cuota, 2, '.', ',') . '</b></td>
					<td>Pendiente</td>
					<td>L.' . number_format($saldo_actual, 2, '.', ',') . '</td>
				</tr>';
					if ($bandera) {
						// $cuota = $monto_restante;
						break;
					}
				}
			}
		}

		$html .= '</table>';
		try {
			// $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
			$mpdf = new \Mpdf\Mpdf(['format' => 'Letter']);
			// son mm 
			// $mpdf = new \Mpdf\Mpdf(['format' => [75.9989, 355.6]]);
			$mpdf->adjustFontDescLineheight = 1.2;
			// $mpdf->SetMargins(10, 250, 10);
			// $mpdf->AddPageByArray([
			// 	'margin-left' => 2.5,
			// 	'margin-right' => 2.5,
			// 	'margin-top' => 11,
			// 	'margin-bottom' => 0,
			// ]);
			$mpdf->SetAutoPageBreak(true, 25);
			// $mpdf->debug = true;
			// ob_end_clean();
			$mpdf->WriteHTML($stylesheet, 1);
			$mpdf->WriteHTML($html);
			$nombrecronograma = "cronograma-" . $nombre_completo . '-' . $id_contrato_compra . ".pdf";
			$mpdf->Output(strtolower($nombrecronograma) . "", "I");
			// $mpdf->Output("facturas/" . ucwords(strtolower($nombrecronograma)), "F");
			//si no existe el directorio factura se debe crear el directorio

			// $mpdf->Output(ucwords(strtolower($nombrecronograma)), "D");
		} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
			//       name used for catch
			// Process the exception, log, print etc.
			echo $e->getMessage();
		}
		//convertir pdf a jpg
		// $im = imagecreatefromjpeg('galería/Nota de Duelo '.ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).'.jpg');
		// $mpdf->Output("galería/Nota de Duelo ".ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).".jpg", "F");


	}
}
