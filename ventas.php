<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
?>


<body>
	<div id="app">
		<?php
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
							<h3>Ventas</h3>
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
				<section class="section ventas">
					<div class="card">
						<div class="card-body">
							<table class="table table-striped" id="table1">
								<thead>
									<tr>
										<th>No.</th>
										<th>Cliente</th>
										<th>ID</th>
										<th>Fecha</th>
										<th>Tip.V.</th>
										<th>Total</th>
										<th>Estado</th>
										<th>Contrato</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$consultaProyecto = $conn->query("SELECT * FROM ficha_compra a, proyectos_ajustes b WHERE a.id_proyecto = b.id_proyecto");
									while ($consulta = $consultaProyecto->fetch_array()) {
										$preciovara = $consulta['precio_vara2'];
									}
									$consulta = $conn->query("SELECT a.id_registro, b.nombre_completo, SUM(areav2) as suma, c.id, c.fecha_venta, b.identidad, c.estado, c.tipo, c.prima FROM lotes a, ficha_directorio b, ficha_compra c WHERE a.id_registro=b.id and c.id_registro = b.id GROUP BY id_registro ORDER BY a.id_registro DESC");
									$numero = 1;
									$contador = 0;
									$total = 0;
									while ($solicitud = $consulta->fetch_array()) {
									?>
										<tr id="solicitud:<?php echo $solicitud['id'] ?>">
											<td><?php echo $numero++; ?></td>
											<td><?php echo $solicitud['nombre_completo'] ?></td>
											<td><?php echo $solicitud['identidad'] ?></td>
											<td><?php echo $solicitud['fecha_venta'] ?></td>
											<td><?php echo $solicitud['tipo'] ?></td>
											<td>
											<?php
												// echo $contador++;
												$prima = $solicitud['prima'];
												$sumavaras = $solicitud['suma'];
												$grantotal = ($sumavaras * 750)-$prima;
												// echo $total;
												echo 'L.'.number_format($grantotal, 2, '.', ',');

												$estado = $solicitud['estado'];
												$view='';
												if ($estado == 'en') {
													$estadoVenta = 'En Curso';
													$color = 'bg-success';
													$noview = "display:none";
												} elseif ($estado == 'an') {
													$estadoVenta = 'Anulado';
													$color = 'bg-secondary';
													$view = "initial";
												}  elseif ($estado == 'co') {
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
												}else{
													$estadoVenta = 'Pendiente';
													$color = 'bg-warning';
													$view = "initial";
												}
												?>
											</td>
											
											<td> <span class="badge <?php echo $color ?> "> <?php echo $estadoVenta ?></span></td>
											<td>Contrato</td>
											<td>
												<a href="edit-cliente.php?ID=<?php echo $solicitud['id'] ?>" target="_self"><span class="badge bg-primary">Editar</span></a>
												<i class="far fa-check-circle <?php echo ($solicitud['estado'] === '1' ? 'completo' : '') ?>"></i>
												<i class="fas fa-trash" style="<?php echo $noview.$view ?>;"></i>
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
							<a href="new-venta.php" class="btn btn-primary">Nueva Venta</a>
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