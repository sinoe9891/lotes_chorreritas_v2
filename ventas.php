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
				<section class="section clientes">
					<div class="card">
						<div class="card-body">
							<table class="table table-striped" id="table1">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nombre Completo</th>
										<th>Identidad</th>
										<th>Celular</th>
										<th>Observaciones</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$consulta = $conn->query("SELECT * FROM fucha_compra");
									$numero = $consulta->num_rows;
									while ($solicitud = $consulta->fetch_array()) {
									?>
										<tr id="solicitud:<?php echo $solicitud['id'] ?>">
											<td><?php echo $numero--; ?></td>
											<td><?php echo $solicitud['nombre_completo'] ?></td>
											<td><?php echo $solicitud['identidad'] ?></td>
											<td><?php echo $solicitud['celular'] ?></td>
											<td><?php echo $solicitud['observaciones'] ?></td>
											<td>
												<a href="edit-cliente.php?ID=<?php echo $solicitud['id'] ?>" target="_self"><span class="badge bg-primary">Editar</span></a>
												<i class="far fa-check-circle <?php echo ($solicitud['estado'] === '1' ? 'completo' : '') ?>"></i>
												<i class="fas fa-trash"></i>
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