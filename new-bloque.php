<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
date_default_timezone_set('America/Tegucigalpa');
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
							<h3>Bloques</h3>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Logística</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Nuevo Bloque</h5>
						</div>
						<div class="card-body">
							<form class="form" id="nuevoBloque" method="post">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<?php
														$proyectos = obtenerTodo('proyectos');
														?>
														<div class="row">
															<div class="col-md-6 col-12">
																<div class="form-group">
																	<label for="first-name-column">Bloque</label>
																	<input type="text" class="form-control" id="nombre" name="nombre" value="" required>
																	<!-- <input type="text" id="first-name-column" placeholder="First Name" name="fname-column" required> -->
																</div>
															</div>
															<div class="col-md-6 col-12">
																<div class="form-group">
																	<label for="last-name-column">Proyecto</label>
																	<select class="form-select" name="proyecto" id="proyecto">
																		<?php
																		if ($proyectos->num_rows > 0) {
																			while ($row = $proyectos->fetch_assoc()) {
																				$id_proyecto = $row['id_proyecto'];
																				$nombre = $row['nombre'];
																				if ($id_proyecto == $id_proyectob) {
																					echo '<option name="proyecto" value="' . $id_proyecto . '" selected>' . $nombre . '</option>';
																				} else {
																					echo '<option name="proyecto" value="' . $id_proyecto . '">' . $nombre . '</option>';
																				}
																			}
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 d-flex justify-content-end">
											<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="nuevoBloque">
											<input class="btn btn-primary me-1 mb-1" type="submit" value="Crear Bloque" name="update">
											<a href="clientes.php">
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