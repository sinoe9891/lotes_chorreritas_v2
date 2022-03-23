<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
include 'includes/templates/sidebar.php';

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
					<h3>Créditos</h3>

				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Ventas</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="section eliminar-credito">
			<div class="card">
				<div class="card-body">
					<div>
						<?php
						$DateAndTime = date('d-m-Y', time());
						echo '<p>Hoy es: <strong>' . $DateAndTime . ' <span id="relojnumerico" onload"cargarReloj()"></span></p></strong>';
						?>
					</div>
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>Cliente</th>
								<th>Cuota</th>
								<th>Comprobante</th>
								<th>Tipo</th>
								<th>Fecha</th>
								<th>Fact. Dig.</th>
								<th>Recibo</th>
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

							$consulta = $conn->query("SELECT c.nombre_completo, b.id_ficha_compra, a.fecha_pago, b.cuota, b.saldo_actual, b.total_venta, b.estado, MIN(id_credito_lote) id_cuota FROM control_credito_lote a, ficha_compra b, ficha_directorio c WHERE a.estado_cuota = 'sig' and b.id_registro = c.id and a.id_compra = b.id_ficha_compra GROUP BY b.id_contrato_compra ORDER BY a.fecha_pago;");
							$numero = 1;
							$contador = 1;
							$total = 0;
							while ($solicitud = $consulta->fetch_array()) {
								date_default_timezone_set('America/Tegucigalpa');
								$fecha_pago = $solicitud['fecha_pago'];
								$id_compra = $solicitud['id_ficha_compra'];
								$nombre_completo = $solicitud['nombre_completo'];
								$saldo_actual = $solicitud['saldo_actual'];
								$cuota = $solicitud['cuota'];
								$total_venta = $solicitud['total_venta'];
								$estado = $solicitud['estado'];
								$view = '';
								$noview = '';
								if ($estado == 'en') {
									$estadoVenta = 'En Curso';
									$color = 'bg-success';
									$noview = "display:none";
								} elseif ($estado == 'an') {
									$estadoVenta = 'Anulado';
									$color = 'bg-secondary';
									$view = "initial";
								} elseif ($estado == 'co') {
									$estadoVenta = 'Concluido';
									$color = 'bg-primary';
									$noview = "none";
								} elseif ($estado == 'pa') {
									$estadoVenta = 'Inactivo';
									$color = 'bg-info';
									$view = "initial";
								} elseif ($estado == 'ca') {
									$estadoVenta = 'Cancelado';
									$color = 'bg-danger';
									$view = "initial";
								} else {
									$estadoVenta = 'Pendiente';
									$color = 'bg-warning';
									$view = "initial";
								}

							?>
								<tr id="solicitud:<?php echo $solicitud['id_ficha_compra'] ?>">
									<td><?php echo $contador++; ?></td>
									<td><?php echo $nombre_completo; ?></td>
									<td>
										<?php
										$fecha_pago1 = new DateTime($fecha_pago);
										// echo '<p>' . $fecha_pago1->format('d-m-Y') . '</p>';
										$fechahoy = new DateTime();
										$interval = $fecha_pago1->diff($fechahoy);
										$dias = $interval->format('%r%a');
										// echo '<p>' . $dias . '</p>';
										if ($dias == 0) {
											$status = "Vence hoy";
											$color = 'bg-warning';
										}
										if ($dias == -0) {
											$status = "Pendiente";
											$color = 'bg-warning';
										} elseif ($dias > 0) {
											$status = "Vencido";
											$color = 'bg-danger';
										} elseif ($dias < 0) {
											$status =  "Pendiente";
											$color = 'bg-success';
										}
										?>
										<span class="badge <?php echo $color ?> "><?php echo $fecha_pago; ?></span>
									</td>
									<td><span class="badge bg-primary"><?php echo 'L.' . number_format($cuota, 2, '.', ','); ?></span></td>
									<td><span class="badge bg-info"><?php echo 'L.' . number_format($saldo_actual, 2, '.', ','); ?></span></td>
									<td><span class="badge bg-secondary"><?php echo 'L.' . number_format($total_venta, 2, '.', ','); ?></span></td>
									<td>
										<a href="cronograma.php?ID=<?php echo $id_compra ?>" class="btn btn-sm btn-outline-secondary">Cronograma</a>
									</td>
									<td>
										<a href="letra.php?ID=<?php echo $solicitud['id_compra'] ?>" class="btn btn-sm btn-outline-secondary">Letra</a>
									</td>
									<td>
										<a href="edit-venta.php?ID=<?php echo $solicitud['id_compra'] ?>" target="_self"><span class="badge bg-primary">Realizar Cobro</span></a>
									</td>
									<td>
										<i class="fas fa-trash" style="<?php echo $noview . $view ?>;"></i>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a href="new-cobro.php" class="btn btn-primary">Nuevo Cobro</a>
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