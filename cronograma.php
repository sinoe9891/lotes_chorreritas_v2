<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
include 'includes/templates/sidebar.php';

if (isset($_GET['ID'])) {
	$id = $_GET['ID'];
}
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
					<h3>Cronograma de Pagos</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Créditos</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="section ventas">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped" id="table1">
						<?php
						// SELECT a.fecha_pago, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante FROM cobros a, ficha_compra b, control_credito_lote c WHERE b.id_ficha_compra = 1;
						$estadoCuenta = $conn->query("SELECT * FROM ficha_compra WHERE id_ficha_compra = $id");
						$contador = 1;
						while ($cuotaresult = $estadoCuenta->fetch_array()) {
							$cuota = $cuotaresult['cuota'];
							// echo $cuota;
						}
						$estadoCuenta = $conn->query("SELECT a.fecha_cuota, b.cuota, a.cantidad_pagada, b.total_venta, a.monto_restante, b.plazo_meses, b.estado FROM cobros a, ficha_compra b WHERE b.id_ficha_compra = $id;");
						$contador = 1;
						$numero = $estadoCuenta->num_rows;
						// echo $numero;
						if ($estadoCuenta->num_rows > 0) {
						?>
							<thead>
								<tr>
									<th>No.</th>
									<th>Fecha de Pago</th>
									<th>Cuota a pagar</th>
									<th>Cuota Pagada</th>
									<th>Saldo Pendiente</th>
									<th>Retraso</th>
									<th>Estado</th>
								</tr>
							</thead>
							<tbody>
								<?php
								while ($solicitud = $estadoCuenta->fetch_array()) {
									date_default_timezone_set('America/Tegucigalpa');
									$fecha_pago = $solicitud['fecha_cuota'];
									$fecha_pago = new DateTime($fecha_pago);
									$fecha_pago1 = $fecha_pago->format('d-M-Y');
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
									// $fecha_vencimiento = new DateTime($fecha_vencimiento);
									// $fecha_pago2 = date("d-M-Y", strtotime($fecha_pago . " +$i month")) . "<br>";
									// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
									$fecha_pago = date("d-m-Y", strtotime($fecha_pago1 . " +1 month"));
									// $fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago . " +1 month"));
									$fecha_vencimiento = new DateTime($fecha_pago);
									// echo '<p>' . $fecha_vencimiento->format('d-m-Y') . '</p>';
									$fechahoy = new DateTime();
									$interval = $fecha_vencimiento->diff($fechahoy);
									$dias = $interval->format('%r%a');

									if ($dias === '0') {
										$status = "Vence Hoy";
										$coloractual = 'bg-warning';
									} else if ($dias > '0') {
										$status = "Vencido";
										$coloractual = 'bg-danger';
									} else if ($dias === '-0') {
										$status = "Vence Mañana";
										$coloractual = 'bg-warning';
									} else if ($dias < '-0') {
										$status =  "Pendiente";
										$coloractual = 'bg-success';
									}



									if ($dias == '-1') {
										$status = "Pendiente";
										$coloractual = 'bg-warning';
									} else if ($dias > '0') {
										$status = "Vencido";
										$coloractual = 'bg-danger';
									} else if ($dias == '0') {
										$status = "Vence hoy";
										$coloractual = 'bg-warning';
									} else if ($dias < '0') {
										$status =  "Pendiente";
										$coloractual = 'bg-success';
									}


								?>
									<tr>
										<td><?php echo $contador++; ?></td>
										<td><span class="badge bg-secondary"><?php echo $fecha_pago1; ?></span></td>
										<td><span class="badge bg-secondary"><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></span></td>
										<td><span class="badge bg-secondary"><?php echo 'L.' . number_format($cantidad_pagada, 2, '.', ','); ?></span></td>
										<td><span class="badge bg-secondary"><?php echo 'L.' . number_format($monto_restante, 2, '.', ','); ?></span></td>
										<td><span class="badge bg-secondary">0</span></td>
										<td>
											<span class="badge bg-secondary">Pagado</span>
										</td>
									<?php

								}
									?>
									</tr>
									<tr>
										<?php
										$cantidad_pagada = 0;
										$bandera = false;
										// echo $fecha_pago . "<br>";
										// $fecha_pago1 = $fecha_pago->format('d-M-Y');
										$fecha_pago = date("d-m-Y", strtotime($fecha_pago1 . " +1 month"));
										// $fecha_pago2 = date("d-m-Y", strtotime($fecha_pago . "+2 month")) . "<br>";
										// echo $fecha_pago2;
										$plazo_meses = $plazo_meses - $numero;
										// echo $plazo_meses;
										if ($monto_restante != 0) {
											for ($i = 0; $i <= $plazo_meses; ++$i) {

												$fecha_pago2 = date("d-M-Y", strtotime($fecha_pago . " +$i month")) . "<br>";
												// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
												$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago . " +$i month"));
												//restar la cuota de $total_venta\
												if ($monto_restante > $cuota) {
													$total_venta = $monto_restante - $cuota;
													$no_cuota = $i + 1;
													$monto_restante = $total_venta - $cantidad_pagada;
												}

												//ultima cuota sea igual al monto_restante
												if ($monto_restante < $cuota && $monto_restante >= 0) {
													$cuota = $monto_restante;
													$monto_restante = 0;
													$bandera = true;
												}

												# code...

										?>
												<td><?php echo $contador++; ?></td>
												<td><span class="badge <?php echo $coloractual ?> "><?php echo $fecha_pago2; ?></span></td>
												<td><span class="badge bg-primary"><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></span></td>
												<td><span class="badge bg-primary"><?php echo 'L.' . number_format($cantidad_pagada, 2, '.', ','); ?></span></td>
												<td><span class="badge bg-info"><?php echo 'L.' . number_format($monto_restante, 2, '.', ','); ?></span></td>
												<td>
													<span class="badge <?php echo $coloractual ?>"><?php echo $dias; ?></span>
												</td>
												<td>
													<?php
													$fecha_vencimiento = new DateTime($fecha_vencimiento);
													// echo '<p>' . $fecha_vencimiento->format('d-m-Y') . '</p>';
													$fechahoy = new DateTime();
													$interval = $fecha_vencimiento->diff($fechahoy);
													$dias = $interval->format('%r%a');
													// echo '<p>' . $dias . '</p>';
													if ($dias == '-1') {
														$status = "Pendiente";
														$coloractual = 'bg-warning';
													} else if ($dias > '0') {
														$status = "Vencido";
														$coloractual = 'bg-danger';
													} else if ($dias == '0') {
														$status = "Vence hoy";
														$coloractual = 'bg-warning';
													} else if ($dias < '0') {
														$status =  "Pendiente";
														$coloractual = 'bg-success';
													}

													?>
													<span class="badge <?php echo $coloractual ?>"><?php echo $status; ?></span>
												</td>
									</tr>
							<?php
												if ($bandera) {
													// $cuota = $monto_restante;
													break;
												}
											}
										}
									} else {
										$estadoCuenta = $conn->query("SELECT a.nombre_completo, b.fecha_primer_cuota, b.total_venta, b.saldo_actual, b.cuota, b.total_venta, b.plazo_meses FROM ficha_directorio a, ficha_compra b WHERE b.id_ficha_compra = $id and b.id_registro = a.id;");
										$contador = 1;
										$numero = $estadoCuenta->num_rows;
										// echo $numero;
							?>
							<thead>
								<tr>
									<th>No.</th>
									<th>Fecha de Pago</th>
									<th>Cuota Pagada</th>
									<th>Cuota a pagar</th>
									<th>Saldo Inicial</th>
									<th>Saldo Actual</th>
									<th>Retraso</th>
								</tr>
							</thead>
							<tbody>
								<?php
										while ($solicitud = $estadoCuenta->fetch_array()) {

											$fecha_primer_cuota = $solicitud['fecha_primer_cuota'];
											$fecha_pago = new DateTime($fecha_primer_cuota);
											$fecha_pago1 = $fecha_pago->format('d-M-Y');
											$nombre_completo = $solicitud['nombre_completo'];
											$plazo_meses = $solicitud['plazo_meses'];
											$saldo_actual = $solicitud['saldo_actual'];
											$cuota = $solicitud['cuota'];
											$total_venta = $solicitud['total_venta'];
											
											for ($i = 0; $i <= $plazo_meses; ++$i) {
												// cambiar estado de la primera cuota por siguiente
												if ($i == 0) {

													$total_venta = $total_venta;
													$fecha_pago1 = date("Y-m-d", strtotime($fecha_primer_cuota));
												} else {

													$fecha_pago1 = date("Y-m-d", strtotime($fecha_primer_cuota . " +$i month"));
													$total_venta = $total_venta - $cuota;
												}
												// $fecha_pago = date("d-m-Y", strtotime($fecha_cuota . " +$i month")) . "<br>";
												// insertar fechas en la tabla control_credito_lote con fecha_pago y fecha_vencimiento y no_cuota
												$fecha_vencimiento = date("Y-m-d", strtotime($fecha_pago1 . " +$i month"));
												//restar la cuota de $total_venta
												$saldo_actual = $total_venta - $cuota;
												// $no_cuota = $i + 1;


								?>
										<tr>
											<td><?php echo $contador++; ?></td>
											<?php
												$fecha_pago1 = new DateTime($fecha_pago1);
												$fecha = $fecha_pago1->format('d-m-Y');
												$fechahoy = new DateTime();
												$interval = $fecha_pago1->diff($fechahoy);
												$dias = $interval->format('%r%a');
												if ($dias === '0') {
													$status = "Vence Hoy";
													$coloractual = 'bg-warning';
												} else if ($dias > '0') {
													$status = "Vencido";
													$coloractual = 'bg-danger';
												} else if ($dias === '-0') {
													$status = "Vence Mañana";
													$coloractual = 'bg-warning';
												} else if ($dias < '-0') {
													$status =  "Pendiente";
													$coloractual = 'bg-success';
												}
	
	
	
												if ($dias == '-1') {
													$status = "Pendiente";
													$coloractual = 'bg-warning';
												} else if ($dias > '0') {
													$status = "Vencido";
													$coloractual = 'bg-danger';
												} else if ($dias == '0') {
													$status = "Vence hoy";
													$coloractual = 'bg-warning';
												} else if ($dias < '0') {
													$status =  "Pendiente";
													$coloractual = 'bg-success';
												}
											?>
											<td><span class="badge <?php echo $coloractual ?> "><?php echo $fecha; ?></span></td>
											<td><span class="badge bg-primary">L.00.00</span></td>
											<td><span class="badge bg-primary"><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></span></td>
											<td><span class="badge bg-primary"><?php echo 'L.' . number_format($total_venta, 2, '.', ','); ?></span></td>
											<td><span class="badge bg-info"><?php echo 'L.' . number_format($saldo_actual, 2, '.', ','); ?></span></td>
											<td>
												<?php
												
									

												?>
												<span class="badge <?php echo $coloractual ?>"><?php echo $status; ?></span>

											</td>
										</tr>

							<?php
											}
										}
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