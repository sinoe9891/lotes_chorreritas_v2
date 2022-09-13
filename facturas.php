<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
include 'includes/templates/sidebar.php';
date_default_timezone_set('America/Tegucigalpa');
?>
<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>

	<div class="page-heading">
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h3>Facturas</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Configuración</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="section factura">
			<div class="card">
				<div class="card-body">
					<div>
						<?php

						$DateAndTime = date('d-m-Y', time());
						echo '<p>Hoy es: <strong>' . $DateAndTime . ' <span id="relojnumerico" onload"cargarReloj()"></span></strong><br>';
						$solicitudes = obtenerFacturas();
						if ($solicitudes->num_rows <= 20 && $solicitudes->num_rows >= 1) {
							echo 'Solo se cuenta con <span style="color:red;"><b>' . $solicitudes->num_rows . '</b></span> facturas disponibles</p>';
						} elseif ($solicitudes->num_rows == 0) {
							echo '<span style="color:red;"><b>No se cuenta con facturas disponibles</b></span></p>';
						} else {
							echo '</p>';
						}
						?>
						<p><span style="color:red;"><b>Importante:</b></span> El tiempo límite para anular una factura emitida es de 1hr, cumpliendo este tiempo, ya no se podrá realizar ningún cambio.</p>
					</div>
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>Factura</th>
								<th>Hora y Fecha</th>
								<th>Monto Pagado</th>
								<th>Contrato</th>
								<th>Saldo Pendiente</th>
								<th>Usuario</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$consulta = $conn->query("SELECT DISTINCT a.id_factura, a.id_cobro, a.no_factura, a.fecha_pago, a.monto_pagado, a.fecha_pago, b.id_contrato_compra, a.saldo_actual, a.estado_factura, a.usuario, c.estado_cobro, c.hora_pagada FROM facturas a, ficha_compra b, cobros c WHERE (a.estado_factura = 'emitida' OR a.estado_factura = 'anulada') AND b.id_ficha_compra = c.id_contrato and a.contrato = c.id_contrato and a.id_cobro = c.id_cobro ORDER BY a.no_factura DESC;");

							$numero = 1;
							$contador = 1;
							$total = 0;
							while ($solicitud = $consulta->fetch_array()) {
								date_default_timezone_set('America/Tegucigalpa');
								$id_factura = $solicitud['id_factura'];
								$id_cobro = $solicitud['id_cobro'];
								$no_factura = $solicitud['no_factura'];
								$fecha_pago = $solicitud['fecha_pago'];
								$hora_pagada = $solicitud['hora_pagada'];
								$monto_pagado = $solicitud['monto_pagado'];
								$contrato = $solicitud['id_contrato_compra'];
								$saldo_actual = $solicitud['saldo_actual'];
								$usuario = $solicitud['usuario'];
								$estado = $solicitud['estado_factura'];
								$view = '';
								$noview = '';
								if ($estado == 'disponible') {
									$status = 'Activo';
									$color = 'bg-primary';
									$noview = "display:none";
								} elseif ($estado == 'anulada') {
									$status = 'Anulada';
									$color = 'bg-danger';
									$view = "initial";
								} elseif ($estado == 'emitida') {
									$status = 'Emitida';
									$color = 'bg-success';
									$view = "initial";
								}
								$apertura = new DateTime($hora_pagada);
								$DateAndTime = date('Y-m-d H:i:s', time());
								$cierre = new DateTime($DateAndTime);
								$tiempo = $apertura->diff($cierre);
								$cierreAnular = $tiempo->format('%H');
								// $hora_pago = date("d/M/Y h:i:s a", strtotime($hora_pagada));
								$oldLocale = setlocale(LC_TIME, 'es_HN');
								setlocale(LC_TIME, $oldLocale);
								// $hora_pagada = utf8_encode(strftime("%d/%b/%G  %I:%M:%S %p", strtotime($hora_pagada)));
								$hora_pago = utf8_encode(strftime("%d/%m/%G | %I:%M:%S %p", strtotime($hora_pagada)));
							?>
								<tr id="solicitud:<?php echo $solicitud['id_factura'] ?>">
									<td><?php echo $contador++; ?></td>
									<td><?php echo $no_factura; ?></td>
									<td><?php echo $hora_pago; ?></td>
									<td><?php echo 'L.' . number_format($monto_pagado, 2, '.', ','); ?></td>
									<td><?php echo $contrato; ?></td>
									<td><?php echo 'L.' . number_format($saldo_actual, 2, '.', ','); ?></td>
									<td><?php echo $usuario; ?></td>
									<td>
										<span class="badge <?php echo $color ?>"><?php echo $status; ?></span>
									</td>
									<td>
										<?php

										$dia = $tiempo->format('%d');
										// echo 'día: ' . $dia . '<br>';
										// echo 'hora: ' . $cierreAnular . '<br>';
										// echo strcmp($dia, '0');
										if ($estado == 'emitida') {

											if ($cierreAnular == '00' && $dia != '0') {
												echo '<a href="doc/factura.php?ID=' . $id_cobro . '" target="_blank"><span class="badge bg-info">Ver</span></a>';
											} elseif ($cierreAnular == '00' && $dia == '0') {
												echo '<a href="doc/factura.php?ID=' . $id_cobro . '" target="_blank"><span class="badge bg-info">Ver</span></a>
													<span class="anular badge bg-primary">Anular</span>';
											} elseif ($cierreAnular != '00' && $dia != '0') {
												echo '<a href="doc/factura.php?ID=' . $id_cobro . '" target="_blank"><span class="badge bg-info">Ver</span></a>';
											} elseif ($cierreAnular != '00' && $dia == '0') {
												echo '<a href="doc/factura.php?ID=' . $id_cobro . '" target="_blank"><span class="badge bg-info">Ver</span></a>';
											};
										}if ($estado == 'anulada') {
											echo '<a href="doc/factura.php?ID=' . $id_cobro . '" target="_blank"><span class="badge bg-info">Ver</span></a>';
										}
										?>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>

	<?php
	include('includes/templates/created.php');
	?>
</div>
</div>

<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
	// Simple Datatable
	let table1 = document.querySelector('#table1');
	let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?php
include('includes/templates/footer.php');
?>
<script src="assets/js/main.js"></script>
</body>

</html>