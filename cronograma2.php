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
						<thead>
							<tr>
								<th>No.</th>
								<th>Fecha de Pago</th>
								<th>Cuota</th>
								<th>Cuota Pagada</th>
								<th>Saldo Inicial</th>
								<th>Saldo Actual</th>
								<th>Retraso</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$consultaProyecto = $conn->query("SELECT * FROM ficha_compra a, proyectos_ajustes b WHERE a.id_proyecto = b.id_proyecto");
							$ajusteProyecto = $consultaProyecto->fetch_assoc();
							if ($ajusteProyecto > 0) {
								$precio_vara2 = $ajusteProyecto['precio_vara2'];
							} else {
								$precio_vara2 = 0;
							}
							$idcompra = $_GET['ID'];
							$consulta = $conn->query("SELECT * FROM control_credito_lote a, ficha_compra b WHERE a.id_compra = $idcompra and b.id_ficha_compra = $idcompra");
							$numero = 1;
							$contador = 1;
							$total = 0;
							while ($solicitud = $consulta->fetch_array()) {
								$fecha_pago = $solicitud['fecha_pago'];
								$saldo_actual = $solicitud['monto_restante'];
								$cuota = $solicitud['cuota'];
								$total_venta = $solicitud['total_venta'];
								$estado = $solicitud['estado_cuota'];
								$monto_restante = $solicitud['monto_restante'];
								$monto_pagado = $solicitud['monto_pagado'];

								$view = '';
								$noview ='';

							?>
								<tr>
									<td><?php echo $contador++; ?></td>
									<td>
										<?php
										$fecha_pago1 = new DateTime($fecha_pago);
										// echo '<p>' . $fecha_pago1->format('d-m-Y') . '</p>';
										$fechahoy = new DateTime();
										$interval = $fecha_pago1->diff($fechahoy);
										$dias = $interval->format('%r%a');


										if ($estado == 'pag') {
											$status = "Pagado";
											$coloractual = 'bg-secondary';
										}


										if ($estado == 'sig') {
											 if ($dias === '0') {
												$status = "Vence Hoy";
												$coloractual = 'bg-warning';
											} else if ($dias > '0') {
												$status = "Vencido";
												$coloractual = 'bg-danger';
											} else if ($dias === '-0') {
												$status = "Vence Mañana";
												$coloractual = 'bg-warning';
											} else if ($dias < '-0' ) {
												$status =  "Pendiente";
												$coloractual = 'bg-success';
											}
										}
										
										if ($estado == 'pen') {
											if ($dias == '-1') {
												$status = "Pendiente";
												$coloractual = 'bg-warning';
											} else if ($dias > '0') {
												$status = "Vencido";
												$coloractual = 'bg-danger';
											} else if ($dias == '0') {
												$status = "Vence hoy";
												$coloractual = 'bg-warning';
											} else if ($dias < '0' ) {
												$status =  "Pendiente";
												$coloractual = 'bg-success';
											}
										}



										?>
										<span class="badge <?php echo $coloractual ?> "><?php echo $fecha_pago; ?></span>
									</td>
									<td><span class="badge bg-primary"><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></span></td>
									<td><span class="badge bg-primary"><?php echo 'L.' . number_format($monto_pagado, 2, '.', ','); ?></span></td>
									<td><span class="badge bg-info"><?php echo 'L.' . number_format($saldo_actual, 2, '.', ','); ?></span></td>
									<?php
										$saldo_actual = $saldo_actual - $cuota;
										$monto_restante = $monto_restante - $monto_pagado;
									?>
									<td>
										<span class=""><?php echo 'L.' . number_format($monto_restante, 2, '.', ','); ?></span>
									</td>
									<td>
										<span class="badge <?php echo $coloractual ?>"><?php echo $dias; ?></span>
									</td> 
									<td>
										<span class="badge <?php echo $coloractual ?>"><?php echo $status; ?></span>
									</td>
									<td>
										<a href="cobro_cuota.php?ID=<?php echo $solicitud['id_ficha_compra'] ?>" target="_self"><span class="badge bg-primary">Realizar Cobro</span></a>
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

