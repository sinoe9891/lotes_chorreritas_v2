<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
}
date_default_timezone_set('America/Tegucigalpa');

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
		<section class="section">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Editar Usuario</h5>
				</div>
				<div class="card-body">
					<form class="form" id="editarUsuario" method="post">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="card">
									<div class="card-content">
										<div class="card-body">
											<?php
											if ($_GET) {
												// $solicitudes = obtenerInfoSolicitud($user_id);
												$solicitudes = obtenerInfoBloque($user_id);
												$obtenerUsuarios = obtenerRoles();
											} else {
												header('Location: clientes.php');
											};
											$bloques = obtenerTodo('bloques');
											$consulta = $conn->query("SELECT * FROM main_users WHERE id = $user_id;");
											$numero = 1;
											while ($solicitud = $consulta->fetch_array()) {
												$id = $solicitud['id'];
												$role_user = $solicitud['role_user'];
												$usuario_name = $solicitud['usuario_name'];
												$apellidos = $solicitud['apellidos'];
												$username = $solicitud['nickname'];
												$email = $solicitud['email_user'];
												$estado = $solicitud['estado_user'];

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
												<div class="row">
													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="first-name-column">Nombre</label>
															<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
															<input type="hidden" id="id_proyectob" name="id_proyectob" value="<?php echo $id_proyectob; ?>">
															<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario_name; ?>" required>
														</div>
													</div>
													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="first-name-column">Apellidos</label>
															<input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>" required>
														</div>
													</div>
													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="first-name-column">Nickname</label>
															<input type="text" class="form-control" id="nickname" name="nickname" value="<?php echo $username; ?>" required readonly>
														</div>
													</div>
													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="first-name-column">Correo Electrónico</label>
															<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required readonly>
														</div>
													</div>
													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="first-name-column">Role</label>
															<select class="form-select" name="role" id="role">
																<?php
																if ($obtenerUsuarios->num_rows > 0) {
																	while ($row = $obtenerUsuarios->fetch_assoc()) {
																		$id_role = $row['id_role'];
																		$descripcion = $row['descripcion'];
																		if ($id_role == $role_user) {
																			echo '<option name="role" value="' . $id_role . '" selected>' . $descripcion . '</option>';
																		} else {
																			echo '<option name="role" value="' . $id_role . '">' . $descripcion . '</option>';
																		}
																	}
																}
																?>
															</select>
														</div>
													</div>
													<div class="col-md-6 col-12">
														<div class="form-group">
															<label for="last-name-column">Estado</label>
															<select class="form-select" name="estado" id="estado">
																<?php
																if ($estado == 'a') {
																	echo "<option name='estado' value='a' selected>Habilitado</option>";
																	echo "<option name='estado' value='d'>Deshabilitado</option>";
																} elseif ($estado == 'd') {
																	echo "<option name='estado' value='a'>Habilitado</option>";
																	echo "<option name='estado' value='d' selected>Deshabilitado</option>";
																	$estado = 'Disponible';
																}
																?>
															</select>
														</div>
													</div>
												</div>
											<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="editUsuario">
								<input class="btn btn-primary me-1 mb-1" type="submit" value="Actualizar" name="update">
								<input class="btn btn-success me-1 mb-1" type="submit" value="Recuperar Contraseña" name="contrasena">
								<a href="usuarios.php">
									<div class="btn btn-light-secondary me-1 mb-1">Regresar</div>
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>

		</section>
	</div>

	<?php
	include('includes/templates/created.php');
	?>
</div>
</div>
<?php
include('includes/templates/footer.php');
?>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>