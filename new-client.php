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
							<h3>Clientes</h3>
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
							<h5 class="card-title">Nuevo Cliente/Prospecto</h5>
						</div>
						<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cliente</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Información Personal</a>
								</li>

								<li class="nav-item" role="presentation">
									<a class="nav-link" id="laboral-tab" data-bs-toggle="tab" href="#laboral" role="tab" aria-controls="laboral" aria-selected="false">Información Laboral</a>
								</li>

								<li class="nav-item" role="presentation">
									<a class="nav-link" id="conyugue-tab" data-bs-toggle="tab" href="#conyugue" role="tab" aria-controls="conyugue" aria-selected="false">Conyugue</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="beneficiario-tab" data-bs-toggle="tab" href="#beneficiario" role="tab" aria-controls="beneficiario" aria-selected="false">Beneficiario</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="financiera-tab" data-bs-toggle="tab" href="#financiera" role="tab" aria-controls="financiera" aria-selected="false">Financiera</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="referencias-tab" data-bs-toggle="tab" href="#referencias" role="tab" aria-controls="referencias" aria-selected="false">Referencias</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="observaciones-tab" data-bs-toggle="tab" href="#observacion" role="tab" aria-controls="observaciones-tab" aria-selected="false">Observaciones</a>
								</li>
							</ul>
							<form class="form" id="nuevoRegistro" method="post">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Nombre Completo</label>
																<input type="hidden" id="fechaSolicitud" name="fechaSolicitud" value="<?php echo date('Y-m-d'); ?>">
																<input type="hidden" id="horaSolicitud" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
																<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="Nombre completo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Nacionalidad</label>
																<input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="" placeholder="Ej. hondureña en mínuscula">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Identidad</label>
																<input type="text" class="form-control" id="identidad" name="identidad" value="" placeholder="0000-0000-00000" max="15" min="15">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Género</label>
																<select class="form-select" id="estado_civil" name="estado_civil">
																	<option value="1">Soltero(a)</option>
																	<option value="2">Casado(a)</option>
																	<option value="3">Divorciado(a)</option>
																	<option value="4">Viudo(a)</option>
																	<option value="5">Unión Libre</option>
																</select>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Estado Civil</label>
																<select class="form-select" name="genero" id="genero">
																	<?php
																	if ($gender == 'M') {
																		echo "<option name='gender' value='M'selected>Masculino</option>";
																		echo "<option name='gender' value='F'>Femenino</option>";
																	} else {
																		echo "<option name='gender' value='F' selected>Femenino</option>";
																		echo "<option name='gender' value='M'>Masculino</option>";
																	}
																	?>
																</select>
															</div>
														</div>

														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Dependientes</label>
																<input type="number" name="dependientes" id="dependientes" class="form-control" value="0">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Profesión u Oficio</label>
																<input type="text" name="profesion" id="profesion" class="form-control" value="" placeholder="Ej. Comerciante, Ingeniero, Ama de Casa">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Fecha de Nacimiento</label>
																<input type="date" class="form-control" name="fechanac" id="fechanac" value="">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">País Residencia</label>
																<input type="text" class="form-control" name="pais_reside" id="pais_reside" value="" placeholder="Ej. Honduras, USA">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Lugar de residencia actual</label>
																<input type="text" class="form-control" name="direccion" id="direccion" value="" placeholder="Ej. Col. Los Robles, Bloque #, Casa #, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Ciudad</label>
																<input type="text" class="form-control" name="ciudad" id="ciudad" value="" placeholder="Ej. Tegucigalpa, San Pedro Sula">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Departamento/Estado</label>
																<input type="text" class="form-control" name="departamento" id="departamento" value="" placeholder="Ej. Francisco Morazán …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Correo electrónico</label>
																<input type="email" class="form-control" name="correo" id="correo" value="" placeholder="Correo Electrónico">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Celular</label>
																<input type="tel" class="form-control" name="celular" id="celular" value="" placeholder="94500123">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Teléfono</label>
																<input type="tel" class="form-control" name="telefono" id="telefono" value="" placeholder="22872000">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="laboral" role="tabpanel" aria-labelledby="laboral-tab">
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
									<div class="tab-pane fade" id="conyugue" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Nombre Completo</label>
																<input type="text" class="form-control" name="nombre_conyugue" id="nombre_conyugue" value="" placeholder="Nombre completo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Identidad</label>
																<input type="text" class="form-control" name="identidad_conyugue" id="identidad_conyugue" value="" placeholder="0000-0000-00000" max="15" min="15">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Celular</label>
																<input type="tel" class="form-control" name="celular_conyugue" id="celular_conyugue" value="" placeholder="94500123">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Fecha de Nacimiento</label>
																<input type="date" class="form-control" name="fechnac_conyugue" id="fechnac_conyugue" placeholder="2004" min="<?php echo date('Y') - 100; ?>" max="<?php echo date('Y') - 18; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Empresa donde labora</label>
																<input type="text" class="form-control" name="empresa_labora_conyugue" id="empresa_labora_conyugue" value="" placeholder="Ej. Col. Ruben Darío, Tegucigalpa, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Teléfono</label>
																<input type="tel" class="form-control" name="telefono_empleo_conyugue" id="telefono_empleo_conyugue" value="" placeholder="22872000">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Cargo que desempeña</label>
																<input type="text" class="form-control" name="cargo_conyugue" id="cargo_conyugue" value="" placeholder="Cargo que desempeña">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Tiempo de laborar</label>
																<input type="text" class="form-control" name="tiempo_laborando_conyugue" value="" id="tiempo_laborando_conyugue" placeholder="Eje. 5 años">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="beneficiario" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Nombre Completo</label>
																<input type="text" class="form-control" id="nombre_beneficiario" name="nombre_beneficiario" placeholder="Nombre completo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Identidad</label>

																<input type="text" class="form-control" id="identidad_beneficiario" name="identidad_beneficiario" value="" placeholder="0801-1989-07380">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Estado Civil</label>
																<select class="form-select" name="genero_beneficiario" id="genero_beneficiario">
																	<option value="F">Femenino</option>
																	<option value="M">Masculino</option>
																</select>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">País Residencia</label>
																<input type="text" class="form-control" name="pais_reside_beneficiario" id="pais_reside_beneficiario" value="" placeholder="Ej. Honduras, USA">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Dirección</label>
																<input type="text" class="form-control" name="direccion_beneficiario" id="direccion_beneficiario" value="" placeholder="Ej. Los Robles, Tegucigalpa, Honduras, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Ciudad donde vive</label>
																<input type="text" class="form-control" name="ciudad_beneficiario" id="ciudad_beneficiario" value="" placeholder="Ej. Los Robles, Tegucigalpa …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Departamento donde vive</label>
																<input type="text" class="form-control" name="departamento_beneficiario" id="departamento_beneficiario" value="" placeholder="Ej. Francisco Morazán …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Celular</label>
																<input type="tel" class="form-control" name="celular_beneficiario" id="celular_beneficiario" value="" placeholder="94500123">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="financiera" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<p for="first-name-column"><strong>Ingresos Mensuales</strong></p>

														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Sueldo</label>
																<input type="number" class="form-control" name="sueldos" id="sueldos" value="" placeholder="L. 10,000.00">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Remesas/Comisiones</label>
																<input type="number" class="form-control" name="remesas" id="remesas" value="" placeholder="L. 10,000.00">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Otros</label>
																<input type="number" class="form-control" name="otros_ingresos" id="otros_ingresos" value="" placeholder="L. 10,000.00">
															</div>
														</div>
														<p for="first-name-column"><strong>Egresos Mensuales</strong></p>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Prestamos</label>
																<input type="number" class="form-control" name="prestamos" id="prestamos" value="" placeholder="L. 10,000.00">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Alquiler/Alimentación</label>
																<input type="number" class="form-control" name="alquiler" id="alquiler" value="" placeholder="L. 10,000.00">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Otros</label>
																<input type="number" class="form-control" name="otros_egresos" id="otros_egresos" value="" placeholder="L. 10,000.00">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="referencias" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<p for="first-name-column"><strong>Referencia 1</strong></p>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Nombre Completo</label>
																<input type="text" class="form-control" name="nombre_referencia_1" id="nombre_referencia_1" placeholder="Nombre completo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Dirección</label>
																<input type="text" class="form-control" name="direccion_referencia_1" id="direccion_referencia_1" value="" placeholder="Ej. Los Robles, Tegucigalpa, Honduras, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Celular</label>
																<input type="tel" class="form-control" name="celular_referencia_1" id="celular_referencia_1" value="" placeholder="94500123">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Teléfono</label>
																<input type="tel" class="form-control" name="telefono_referencia_1" id="telefono_referencia_1" value="" placeholder="94500123">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Empresa donde labora</label>
																<input type="text" class="form-control" name="empresa_labora_referencia_1" id="empresa_labora_referencia_1" value="" placeholder="Ej. Col. Ruben Darío, Tegucigalpa, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Teléfono Empleo</label>
																<input type="tel" class="form-control" name="telefono_empleo_referencia_1" id="telefono_empleo_referencia_1" value="" placeholder="22872000">
															</div>
														</div>
														<p for="first-name-column"><strong>Referencia 2</strong></p>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">Nombre Completo</label>
																<input type="text" class="form-control" name="nombre_referencia_2" id="nombre_referencia_2" value="" placeholder="Nombre completo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Dirección</label>
																<input type="text" class="form-control" name="direccion_referencia_2" id="direccion_referencia_2"  value="" placeholder="Ej. Los Robles, Tegucigalpa, Honduras, …">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Celular</label>
																<input type="tel" class="form-control" name="celular_referencia_2" id="celular_referencia_2" value="" placeholder="94500123">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Teléfono</label>
																<input type="tel" class="form-control" name="telefono_referencia_2" id="telefono_referencia_2" placeholder="22872000">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Empresa donde labora</label>
																<input type="tel" class="form-control" name="empresa_labora_referencia_2" id="empresa_labora_referencia_2" value="">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Teléfono Empleo</label>
																<input type="tel" class="form-control" name="telefono_empleo_referencia_2" id="telefono_empleo_referencia_2" value="">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Observaciones</label>
																<textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="5"></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 d-flex justify-content-end">
										<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="solicitud">
										<input class="btn btn-primary me-1 mb-1" type="submit" value="Crear Cliente" name="update">
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