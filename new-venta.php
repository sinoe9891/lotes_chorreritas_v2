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
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Facturación</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Nueva Venta</h5>
						</div>
						<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="true">Datos</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#detalle" role="tab" aria-controls="detalle" aria-selected="false">Detalles</a>
								</li>

								<li class="nav-item" role="presentation">
									<a class="nav-link" id="laboral-tab" data-bs-toggle="tab" href="#convenio" role="tab" aria-controls="convenio" aria-selected="false">Convenio</a>
								</li>
							</ul>
							<form class="form" id="nuevoRegistro" method="post">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="first-name-column">Nombre Completo</label>
																<input type="hidden" id="fechaSolicitud" name="fechaSolicitud" value="<?php echo date('Y-m-d'); ?>">
																<input type="hidden" id="horaSolicitud" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
																<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo">
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="first-name-column">Fecha de Venta</label>
																<input type="date" class="form-control" name="fecha_venta" id="fecha_venta" value="">
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="last-name-column">Tipo de Venta</label>
																<select class="form-select" id="tipo_venta" name="tipo_venta">
																	<option value="CRÉDITO">Crédito</option>
																	<option value="VENTA">Venta</option>
																</select>
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="company-column">Prima</label>
																<input type="number" class="form-control" name="prima" id="prima" value="" placeholder="00.00">
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="country-floating">No. de Cuotas(meses)</label>
																<input type="number" class="form-control" id="plazo_meses" name="plazo_meses" value="" placeholder="0">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-12 mb-12">
															<label for="country-floating">Bloque</label>
															<?php
															$proyectos = obtenerTodoBloque();
															?>
															<div class="form-group">
																<select class="choices form-select" id="bloque" name="bloque">
																	<option name="proyecto" value="">Buscar Bloque</option>
																	<?php
																	if ($proyectos->num_rows > 0) {
																		while ($row = $proyectos->fetch_assoc()) {
																			$id_bloque = $row['id_bloque'];
																			$id_lote = $row['id_lote'];
																			$areav2 = $row['areav2'];
																			$nombre = $row['bloqueresult'];
																			echo '<option name="proyecto" value="' . $id_lote . '">' . $nombre . '</option>';
																		}
																		?>
																</select>
															</div>
														</div>
														<div class="col-12 col-md-12">
															<div class="card">
																<div class="card-header">
																	<h4 class="card-title">Table with outer spacing</h4>
																</div>
																<div class="card-content">
																	<div class="card-body">
																		<!-- Table with outer spacing -->
																		<div class="table-responsive">
																			<table class="table table-lg">
																				<thead>
																					<tr>
																						<th>Descripción</th>
																						<th>Precio</th>
																						<th>Quitar</th>
																					</tr>
																				</thead>
																				<tbody>
																					<tr>
																						<td class="text-bold-500"><?php echo $nombre ?></td>
																						<td><?php echo $areav2 *750 ?></td>
																						<td class="text-bold-500">UI/UX</td>

																					</tr>
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
																		<?php
																	}
																	?>
														<div class="col-12 d-flex justify-content-end">
															<div class="btn btn-primary me-1 mb-1">

																<i class="fa fa-arrow-down" style="color:white;" aria-hidden="true"></i>
																<input class="btn" style="color:white" type="submit" value="Agregar" name="update" onclick="addAddressLine()">
															</div>
														</div>
														<div class="col-12 d-flex justify-content-end">
															<div class="btn btn-primary me-1 mb-1" id="opciones">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="detalle" role="tabpanel" aria-labelledby="detalle-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Lote</label>
																<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Precio</label>
																<input type="text" class="form-control" name="pais_reside" id="pais_reside" value="" placeholder="Ej. Honduras, USA">
															</div>
														</div>
														<div class="col-12 d-flex justify-content-end">
															<div class="btn btn-primary me-1 mb-1">

																<i class="fa fa-arrow-down" style="color:white;" aria-hidden="true"></i>
																<input class="btn" style="color:white" type="submit" value="Agregar" name="update">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="convenio" role="tabpanel" aria-labelledby="convenio-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Empresa donde labora</label>
																<input type="tel" class="form-control" name="empresa_labora" id="empresa_labora" value="" placeholder="Nombre Empresa, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Dirección Empleo</label>
																<input type="text" class="form-control" name="direccion_empleo" id="direccion_empleo" value="" placeholder="Ej. Col. Ruben Darío, Tegucigalpa, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Cargo que desempeña</label>
																<input type="text" class="form-control" name="cargo" id="cargo" value="" placeholder="Ej. Motorista, Contador, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Tiempo Laborando</label>
																<input type="text" class="form-control" name="tiempo_laborando" id="tiempo_laborando" value="" placeholder="Eje. 5 años">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Teléfono Empleo</label>
																<input type="tel" class="form-control" name="telefono_empleo" id="telefono_empleo" value="" placeholder="22872000">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 d-flex justify-content-end">
										<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="solicitud">
										<input class="btn btn-primary me-1 mb-1" type="submit" value="Generar Venta" name="update">
										<a href="ventas.php">
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
	<script src="assets/vendors/choices.js/choices.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>

</html>