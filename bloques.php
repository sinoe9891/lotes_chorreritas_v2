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
					<h3>Bloques</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Clientes</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="section bloques">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>Bloque</th>
								<th>Proyecto</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>

							<?php
							// $solicitudes = traerTodo('bloques');
							$consulta = $conn->query("SELECT * FROM bloques a, proyectos b WHERE a.id_proyecto = b.id_proyecto ORDER BY a.bloque ASC");
							$numero = 1;
							while ($solicitud = $consulta->fetch_array()) {
							?>
								<tr id="solicitud:<?php echo $solicitud['id_bloque'] ?>">
									<td><?php echo $numero++; ?></td>
									<td><?php echo $solicitud['bloque'] ?></td>
									<td><?php echo $solicitud['nombre'] ?></td>
									<td>
										<a href="edit-bloque.php?ID=<?php echo $solicitud['id_bloque'] ?>" target="_self"><span class="badge bg-primary">Editar</span></a>
										<i class="fas fa-trash"></i>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a href="new-bloque.php" class="btn btn-primary">Nuevo Bloque</a>
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