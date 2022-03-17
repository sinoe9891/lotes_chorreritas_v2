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
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Logística</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Editar Bloque</h5>
						</div>
						<div class="card-body">
							<form class="form" id="nuevoLote" method="post">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<?php
													$bloques = obtenerTodo('bloques');
													?>
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Bloque</label>
																<select class="form-select" name="id_bloque" id="id_bloques">
																	<option name="id_bloques" value="" selected>Seleccione Bloque</option>
																	<?php
																	if ($bloques->num_rows > 0) {
																		while ($row = $bloques->fetch_assoc()) {
																			$id_bloques = $row['id_bloque'];
																			$bloque = $row['bloque'];
																			echo '<option name="id_bloque" value="' . $id_bloques . '">' . $bloque . '</option>';
																		}
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Número</label>
																<input type="text" class="form-control" id="numero" name="numero" value="0" required>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Varas2</label>
																<input type="text" class="form-control" id="areav2" name="areav2" value="300.00" required>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Estado</label>
																<select class="form-select" name="estado" id="estado">
																	<option name='estado' value='d'>Disponible</option>
																	<option name='estado' value='v'>Vendido</option>
																	<option name='estado' value='r'>Reservado</option>
																</select>
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="first-name-column">Colindancias</label>
																<textarea class="form-control" name="colindancias" id="colindancias" cols="30" rows="5"></textarea>
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<!-- <label for="first-name-column">Path SVG</label> -->
																<textarea class="form-control" hidden name="path_lote" id="path_lote" cols="130" rows="5" data-valorinicial=""></textarea>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 d-flex justify-content-end">
										<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="newlote">
										<input class="btn btn-primary me-1 mb-1" type="submit" value="Actualizar" name="update">
										<a href="lotes.php">
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