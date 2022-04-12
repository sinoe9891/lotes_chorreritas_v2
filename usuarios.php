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
					<h3>Usuarios</h3>
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
		<section class="section usuarios">
			<div class="card">
				<div class="card-body">
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nombre</th>
								<th>Username</th>
								<th>Correo</th>
								<th>Role</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$consulta = $conn->query("SELECT * FROM main_users a, main_cargo b WHERE a.role_user = b.id_role");
							$contador = 1;
							while ($solicitud = $consulta->fetch_array()) {
								$id = $solicitud['id'];
								$descripcion = $solicitud['descripcion'];
								$usuario_name = $solicitud['usuario_name'];
								$apellidos = $solicitud['apellidos'];
								$username = $solicitud['nickname'];
								$email = $solicitud['email_user'];
								$estado = $solicitud['estado_user'];
								if ($estado == 'a') {
									$estadoUser = 'Habilitado';
									$color = 'bg-success';
								} elseif ($estado == 'd') {
									$estadoUser = 'Deshabilitado';
									$color = 'bg-secondary';
								}
							?>
								<tr id="solicitud:<?php echo $solicitud['id'] ?>">
									<td><?php echo $contador++; ?></td>
									<td><?php echo $usuario_name .' '. $apellidos ?></td>
									<td><?php echo '@'.$username ?></td>
									<td><?php echo $email ?></td>
									<td><?php echo '<span class="badge ' . $color . '">' . $descripcion ?></td>
									<td><?php echo '<span class="badge ' . $color . '">' . $estadoUser . '</span>' ?></td>
									<td>
										<a href="edit-usuario.php?ID=<?php echo $solicitud['id'] ?>" target="_self"><span class="badge bg-primary">Editar</span></a>
										<i class="fas fa-trash"></i>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a href="new-usuario.php" class="btn btn-primary">Nuevo Usuario</a>
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