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
		<section class="section eliminar-cai">
			<div class="card">
				<div class="card-body">
					<div>
						<?php
						
						$DateAndTime = date('d-m-Y', time());
						echo '<p>Hoy es: <strong>' . $DateAndTime . ' <span id="relojnumerico" onload"cargarReloj()"></span></strong><br>';
						$solicitudes = obtenerFacturas();
						if ($solicitudes->num_rows <= 20 && $solicitudes->num_rows >= 1) {
							echo 'Solo se cuenta con <span style="color:red;"><b>'.$solicitudes->num_rows.'</b></span> facturas disponibles</p>';
						}elseif($solicitudes->num_rows == 0){
							echo '<span style="color:red;"><b>No se cuenta con facturas disponibles</b></span></p>';
						}else{
							echo '</p>';
						}
						?>
						<p><span style="color:red;"><b>Importante:</b></span> El tiempo límite para anular una factura se de 1hr después de su emisión, subsiguiente de esto, ya no se podrá realizar ningún cambio.</p>
					</div>
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>Factura</th>
								<th>Fecha Pago</th>
								<th>Monto Pagado</th>
								<th>Contrato</th>
								<th>Saldo Pendiente</th>
								<th>Estado</th>
								<th>Usuario</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// $consultaProyecto = $conn->query("SELECT * FROM ficha_compra a, proyectos_ajustes b WHERE a.id_proyecto = b.id_proyecto");
							// $ajusteProyecto = $consultaProyecto->fetch_assoc();
							// if ($ajusteProyecto > 0) {
							// 	$precio_vara2 = $ajusteProyecto['precio_vara2'];
							// } else {
							// 	$precio_vara2 = 0;
							// }

							$consulta = $conn->query("SELECT a.id_factura, a.no_factura, a.fecha_pago, a.monto_pagado, a.fecha_pago, b.id_contrato_compra, a.saldo_actual, a.estado_factura, a.usuario FROM facturas a, ficha_compra b WHERE (a.estado_factura = 'emitida' OR a.estado_factura = 'anulada') AND a.contrato = b.id_ficha_compra;");
							$numero = 1;
							$contador = 1;
							$total = 0;
							while ($solicitud = $consulta->fetch_array()) {
								date_default_timezone_set('America/Tegucigalpa');
								$id_factura = $solicitud['id_factura'];
								$no_factura = $solicitud['no_factura'];
								$fecha_pago = $solicitud['fecha_pago'];
								$monto_pagado = $solicitud['monto_pagado'];
								$contrato = $solicitud['id_contrato_compra'];
								$saldo_actual = $solicitud['saldo_actual'];
								$usuario = $solicitud['usuario'];
								$estado = $solicitud['estado_factura'];
								$view = '';
								$noview = '';
								if ($estado == 'disponible') {
									$status = 'Activo';
									$color = 'bg-success';
									$noview = "display:none";
								} elseif ($estado == 'anulada') {
									$status = 'Anulada';
									$color = 'bg-danger';
									$view = "initial";
								} elseif ($estado == 'emitida') {
									$status = 'Emitida';
									$color = 'bg-secondary';
									$view = "initial";
								}
							?>
								<tr id="solicitud:<?php echo $solicitud['id_cai'] ?>">
									<td><?php echo $contador++; ?></td>
									<td><?php echo $no_factura; ?></td>
									<td><?php echo $fecha_pago; ?></td>
									<td><?php echo $monto_pagado; ?></td>
									<td><?php echo $contrato; ?></td>
									<td><?php echo $saldo_actual; ?></td>
									<td>
										<span class="badge <?php echo $color ?>"><?php echo $status; ?></span>
									</td>
									<td><?php echo $usuario; ?></td>
									<td>
										<a href="edit-factura.php?ID=<?php echo $id_cai ?>" target="_self"><span class="badge bg-primary">Anular</span></a>
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