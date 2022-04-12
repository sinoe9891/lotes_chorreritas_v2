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
					<h3>Facturación</h3>

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
							echo 'Solo se cuenta con <span style="color:red;"><b>' . $solicitudes->num_rows . '</b></span> facturas disponibles</p>';
						} elseif ($solicitudes->num_rows == 0) {
							echo 'No se cuenta con facturas disponibles</p>';
						} else {
							echo '</p>';
						}
						?>
					</div>
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>CAI</th>
								<th>Fecha Límite</th>
								<th>Rango Inicial</th>
								<th>Cantidad</th>
								<th>Empresa</th>
								<th>Estado</th>
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

							$consulta = $conn->query("SELECT * FROM info_cai");
							$numero = 1;
							$contador = 1;
							$total = 0;
							while ($solicitud = $consulta->fetch_array()) {
								date_default_timezone_set('America/Tegucigalpa');
								$id_cai = $solicitud['id_cai'];
								$cai = $solicitud['cai'];
								$fecha_limite = $solicitud['fecha_limite'];
								$rango_inicial = $solicitud['rango_inicial'];
								$cantidad_otorgada = $solicitud['cantidad_otorgada'];
								$id_empresa = $solicitud['id_empresa'];
								$estado_cai = $solicitud['estado_cai'];
								$view = '';
								$noview = '';
								if ($estado_cai == 'act') {
									$status = 'Activo';
									$color = 'bg-success';
									$noview = "display:none";
								} elseif ($estado_cai == 'sus') {
									$status = 'Suspendido';
									$color = 'bg-secondary';
									$view = "initial";
								} elseif ($estado_cai == 'fin') {
									$status = 'Concluido';
									$color = 'bg-primary';
									$noview = "none";
								} elseif ($estado_cai == 'com') {
									$status = 'Completado';
									$color = 'bg-info';
									$view = "initial";
								} elseif ($estado_cai == 'ina') {
									$status = 'Inactivo';
									$color = 'bg-secondary';
									$view = "initial";
								}
							?>
								<tr id="solicitud:<?php echo $solicitud['id_cai'] ?>">
									<td><?php echo $contador++; ?></td>
									<td><?php echo $cai; ?></td>
									<td><?php echo $fecha_limite; ?></td>
									<td><?php echo $rango_inicial; ?></td>
									<td><?php echo $cantidad_otorgada; ?></td>
									<td><?php echo $id_empresa; ?></td>
									<td>
										<span class="badge <?php echo $color ?>"><?php echo $status; ?></span>
									</td>
									<td>
										<a href="edit-cai.php?ID=<?php echo $id_cai ?>" target="_self"><span class="badge bg-primary">Editar</span></a>
										<button type="button" class="fas fa-trash btn btn-danger btn-sm" style="<?php echo $noview . $view ?>;" data-id="<?php echo $solicitud['id_cai'] ?>">Eliminar</button>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a href="new-facturacion.php" class="btn btn-primary">Nuevo CAI</a>
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