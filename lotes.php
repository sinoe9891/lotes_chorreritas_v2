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
					<h3>Lotes</h3>
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
		<section class="section lotes">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>Descripción</th>
								<th>Precio</th>
								<th>Varas2</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$consulta = $conn->query("SELECT DISTINCT a.id_lote, a.numero, a.areav2, a.estado, b.bloque, d.precio_vara2, a.estado, c.nombre FROM lotes a, bloques b, proyectos c, proyectos_ajustes d WHERE a.id_bloque = b.id_bloque and b.id_proyecto = c.id_proyecto and c.id_proyecto = d.id_proyecto");
							$contador = 1;
							while ($solicitud = $consulta->fetch_array()) {
								$id_lote = $solicitud['id_lote'];
								$bloque = $solicitud['bloque'];
								$preciov2 = $solicitud['precio_vara2'];
								$estado = $solicitud['estado'];
								$nombre = $solicitud['nombre'];
								$numero = $solicitud['numero'];
								$areav2 = $solicitud['areav2'];

								$estado = $solicitud['estado'];
								if ($estado == 'v') {
									$estadoLote = 'Vendido';
									$color = 'bg-secondary';
								} elseif ($estado == 'd') {
									$estadoLote = 'Disponible';
									$color = 'bg-success';
								} elseif ($estado == 'r') {
									$estadoLote = 'Reservado';
									$color = 'bg-info';
								}
							?>
								<tr id="solicitud:<?php echo $solicitud['id_lote'] ?>">
									<td><?php echo $contador++; ?></td>
									<td><?php echo 'Bloque ' . $bloque . '-' . $numero ?></td>
									<td><?php echo 'L. ' . number_format($preciov2 * $areav2) ?></td>
									<td><?php echo $areav2 . 'v2 ' ?></td>
									<td><?php echo '<span class="badge ' . $color . '">' . $estadoLote . '</span>' ?></td>
									<td>
										<a href="edit-lote.php?ID=<?php echo $solicitud['id_lote'] ?>" target="_self"><span class="badge bg-primary">Editar</span></a>
										<i class="fas fa-trash"></i>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a href="new-lote.php" class="btn btn-primary">Nuevo Lote</a>
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