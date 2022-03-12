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
							<h5 class="card-title">Editar Cliente/Prospecto</h5>
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
									<a class="nav-link" id="observaciones-tab" data-bs-toggle="tab" href="#observaciones" role="tab" aria-controls="observaciones" aria-selected="false">Observaciones</a>
								</li>
							</ul>
							<form class="form" id="editarRegistro" method="post">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<?php
													// obtiene las información del graduado
													if ($_GET) {
														// $solicitudes = obtenerInfoSolicitud($user_id);
														$solicitudes = obtenerInfoFichaPerfil($user_id);
														$referenciasQuery = obtenerRerferencias($user_id);
														$beneficiarioQuery = obtenerBeneficiario($user_id);
														$financieraQuery = obtenerFinanciera($user_id);
													} else {
														header('Location: editar-perfil.php');
													};

													if ($solicitudes->num_rows > 0) {
														while ($row = $solicitudes->fetch_assoc()) {
															$id = $row['id'];
															$estado = $row['estado'];
															$nombres = $row['nombre_completo'];
															$fechaN = $row['fecha_nacimiento'];
															setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
															$newDate = date("F j, Y", strtotime($fechaN));
															$fechaNac = strftime("%d de %B de %Y", strtotime($newDate));
															$identidad = $row['identidad'];
															$nacionalidad = $row['nacionalidad'];
															$estado_civil = $row['estado_civil'];
															$gender = $row['genero'];
															$pais_reside = $row['pais_reside'];
															$direccion = $row['direccion'];
															$ciudad = $row['ciudad'];
															$departamento = $row['departamento'];
															$telefono = $row['telefono'];
															$celular = $row['celular'];
															$dependientes = $row['dependientes'];
															$correo = $row['correo'];

															$profesion = $row['profesion'];
															$lugar_empleo = $row['lugar_empleo'];
															$direccion_empleo = $row['direccion_empleo'];
															$cargo = $row['cargo'];
															$tiempo_laborando = $row['tiempo_laborando'];
															$telefono_empleo = $row['telefono_empleo'];

															$sueldos = $row['sueldos'];
															$remesas = $row['remesas'];
															$otros_ingresos = $row['otros_ingresos'];
															$prestamos = $row['prestamos'];
															$alquiler = $row['alquiler'];
															$otros_egresos = $row['otros_egresos'];
															//Conyugue
															$nombre_conyugue = $row['nombre_conyugue'];
															$identidad_conyugue = $row['identidad_conyugue'];
															$celular_conyugue = $row['celular_conyugue'];
															$fechanac_conyugue = $row['fechnac_conyugue'];
															$empresa_labora_conyugue = $row['empresa_labora_conyugue'];
															$telefono_empleo_conyugue = $row['telefono_empleo_conyugue'];
															$cargo_conyugue = $row['cargo_conyugue'];
															$tiempo_laborando_conyugue = $row['tiempo_laborando_conyugue'];
															//Beneficiario
															$nombre_beneficiario = $row['nombre_beneficiario'];
															$identidad_beneficiario = $row['identidad_beneficiario'];
															$genero_beneficiario = $row['genero_beneficiario'];
															$pais_reside_beneficiario = $row['pais_reside_beneficiario'];
															$direccion_beneficiario = $row['direccion_beneficiario'];
															$ciudad_beneficiario = $row['ciudad_beneficiario'];
															$departamento_beneficiario = $row['departamento_beneficiario'];
															$celular_beneficiario = $row['celular_beneficiario'];
															//Financiera
															$sueldos = $row['sueldos'];
															$remesas = $row['remesas'];
															$otros_ingresos = $row['otros_ingresos'];
															$prestamos = $row['prestamos'];
															$alquiler = $row['alquiler'];
															$otros_egresos = $row['otros_egresos'];
															//Observaciones
															$observaciones = $row['observaciones'];

													?>
															<div class="row">
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="first-name-column">Nombre Completo</label>
																		<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
																		<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombres; ?>" required>
																		<!-- <input type="text" id="first-name-column" placeholder="First Name" name="fname-column" required> -->
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="country-floating">Nacionalidad</label>
																		<input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?php echo $nacionalidad; ?>" placeholder="Nacionalidad">
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="city-column">Identidad</label>
																		<input type="text" class="form-control" id="identidad" name="identidad" value="<?php echo $identidad; ?>" placeholder="Identidad">
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="last-name-column">Género</label>
																		<select class="form-select" id="estado_civil" name="estado_civil">
																			<?php
																			if ($estado_civil == "1") {
																				echo "<option value='1' selected>Soltero</option>
																					<option value='2'>Casado</option>;
																					<option value='3'>Divorciado</option>;
																					<option value='4'>Viudo</option>
																					<option value='5'>Unión Libre</option>";
																			} elseif ($estado_civil == "2") {
																				echo "<option value='1'>Soltero(a)</option>
																					<option value='2' selected>Casado(a)</option>
																					<option value='3'>Divorciado(a)</option>
																					<option value='4'>Viudo(a)</option>
																					<option value='5'>Unión Libre</option>";
																			} elseif ($estado_civil == "3") {
																				echo "<option value='1'>Soltero(a)</option>
																					<option value='2'>Casado(a)</option>
																					<option value='3' selected>Divorciado(a)</option>
																					<option value='4'>Viudo(a)</option>
																					<option value='5'>Unión Libre</option>";
																			} elseif ($estado_civil == "4") {
																				echo "<option value='1'>Soltero(a)</option>
																					<option value='2'>Casado(a)</option>
																					<option value='3'>Divorciado(a)</option>
																					<option value='4' selected>Viudo(a)</option>
																					<option value='5'>Unión Libre</option>";
																			} elseif ($estado_civil == "5") {
																				echo "<option value='1'>Soltero(a)</option>
																					<option value='2'>Casado(a)</option>
																					<option value='3'>Divorciado(a)</option>
																					<option value='4'>Viudo(a)</option>
																					<option value='5' selected>Unión Libre</option>";
																			}
																			?>
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
																		<input type="number" name="dependientes" id="dependientes" class="form-control" value="<?php echo $dependientes; ?>">
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="email-id-column">Profesión u Oficio</label>
																		<input type="text" name="profesion" id="profesion" class="form-control" value="<?php echo $profesion; ?>">
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
																<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $fechaN; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">País Residencia</label>
																<input type="text" class="form-control" name="pais_reside" id="pais_reside" value="<?php echo $pais_reside; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Dirección</label>
																<input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $direccion; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Ciudad</label>
																<input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $ciudad; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Departamento</label>
																<input type="text" class="form-control" name="departamento" id="departamento" value="<?php echo $departamento; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Email</label>
																<input type="email" class="form-control" name="correo" id="correo" value="<?php echo $correo; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Celular</label>
																<input type="tel" class="form-control" name="celular" id="celular" value="<?php echo $celular; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Teléfono</label>
																<input type="tel" class="form-control" name="telefono" id="telefono" value="<?php echo $telefono; ?>">
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
																<input type="tel" class="form-control" name="lugar_empleo" id="lugar_empleo" value="<?php echo $lugar_empleo; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Dirección Empleo</label>
																<input type="text" class="form-control" name="direccion_empleo" value="<?php echo $direccion_empleo; ?>" id="direccion_empleo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Cargo que desempeña</label>
																<input type="text" class="form-control" name="cargo" value="<?php echo $cargo; ?>" id="cargo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Tiempo Laborando</label>
																<input type="text" class="form-control" name="tiempo_laborando" value="<?php echo $tiempo_laborando; ?>" id="tiempo_laborando" placeholder="Eje. 5 años">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Teléfono Empleo</label>
																<input type="tel" class="form-control" name="telefono_empleo" id="telefono_empleo" value="<?php echo $telefono_empleo; ?>">
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
																<input type="text" class="form-control" name="nombre_conyugue" id="nombre_conyugue" value="<?php echo $nombre_conyugue; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Identidad</label>
																<input type="text" class="form-control" name="identidad_conyugue" id="identidad_conyugue" value="<?php echo $identidad_conyugue; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Celular</label>
																<input type="tel" class="form-control" name="celular_conyugue" id="celular_conyugue" value="<?php echo $celular_conyugue; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Fecha de Nacimiento</label>
																<input type="date" class="form-control" name="fechanac_conyugue" id="fechanac_conyugue" value="<?php echo $fechanac_conyugue; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Empresa donde labora</label>
																<input type="text" class="form-control" name="empresa_labora_conyugue" id="empresa_labora_conyugue" value="<?php echo $empresa_labora_conyugue; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Teléfono</label>
																<input type="tel" class="form-control" name="telefono_empleo_conyugue" id="telefono_empleo_conyugue" value="<?php echo $telefono_empleo_conyugue; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Cargo que desempeña</label>
																<input type="text" class="form-control" name="cargo_conyugue" value="<?php echo $cargo_conyugue; ?>" id="cargo_conyugue" placeholder="">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Tiempo de laborar</label>
																<input type="text" class="form-control" name="tiempo_laborando_conyugue" value="<?php echo $tiempo_laborando_conyugue; ?>" id="tiempo_laborando_conyugue" placeholder="Eje. 5 años">
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
																<label for="first-name-column">First Name</label>
																<input type="text" class="form-control" id="nombre_beneficiario" name="nombre_beneficiario" value="<?php echo $nombre_beneficiario; ?>" placeholder="Nombre Completo">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Last Name</label>
																<input type="text" class="form-control" id="identidad_beneficiario" name="identidad_beneficiario" value="<?php echo $identidad_beneficiario; ?>" placeholder="0801-1989-07280" required>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Estado Civil</label>
																<select class="form-select" name="genero_beneficiario" id="genero_beneficiario">
																	<?php
																	if ($genero_beneficiario == 'M') {
																		echo "<option name='genero_beneficiario' value='M'selected>Masculino</option>";
																		echo "<option name='genero_beneficiario' value='F'>Femenino</option>";
																	} else {
																		echo "<option name='genero_beneficiario' value='F' selected>Femenino</option>";
																		echo "<option name='genero_beneficiario' value='M'>Masculino</option>";
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">País Residencia</label>
																<input type="text" class="form-control" name="pais_reside_beneficiario" id="pais_reside_beneficiario" value="<?php echo $pais_reside_beneficiario; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Dirección</label>
																<input type="text" class="form-control" name="direccion_beneficiario" id="direccion_beneficiario" value="<?php echo $direccion_beneficiario; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Ciudad donde vive</label>
																<input type="text" class="form-control" name="ciudad_beneficiario" id="ciudad_beneficiario" value="<?php echo $ciudad_beneficiario; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Departamento donde vive</label>
																<input type="text" class="form-control" name="departamento_beneficiario" id="departamento_beneficiario" value="<?php echo $departamento_beneficiario; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Celular</label>
																<input type="tel" class="form-control" name="celular_beneficiario" id="celular_beneficiario" value="<?php echo $celular_beneficiario; ?>">
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
																<input type="number" class="form-control" name="sueldos" id="sueldos" value="<?php echo $sueldos; ?>">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Remesas/Comisiones</label>
																<input type="number" class="form-control" name="remesas" id="remesas" value="<?php echo $remesas; ?>" placeholder="">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">Otros</label>
																<input type="number" class="form-control" name="otros_ingresos" id="otros_ingresos" value="<?php echo $otros_ingresos; ?>" placeholder="">
															</div>
														</div>
														<p for="first-name-column"><strong>Egresos Mensuales</strong></p>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Prestamos</label>
																<input type="number" class="form-control" name="prestamos" id="prestamos" value="<?php echo $prestamos; ?>" placeholder="">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Alquiler/Alimentación</label>
																<input type="number" class="form-control" name="alquiler" id="alquiler" value="<?php echo $alquiler; ?>" placeholder="">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Otros</label>
																<input type="number" class="form-control" name="otros_egresos" id="otros_egresos" value="<?php echo $otros_egresos; ?>" placeholder="">
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
														<?php
															if ($referenciasQuery->num_rows > 0) {
																$contador = 0;
																while ($row = $referenciasQuery->fetch_assoc()) {
																	//Referencias
																	$contador++;
																	$id_referencia = $row['id_referencia'];
																	$nombre_referencia = $row['nombre_referencia'];
																	$direccion_referencia = $row['direccion_referencia'];
																	$celular_referencia = $row['celular_referencia'];
																	$telefono_referencia = $row['telefono_referencia'];
																	$empresa_labora_referencia = $row['empresa_labora_referencia'];
																	$telefono_empleo_referencia = $row['telefono_empleo_referencia'];

																	// $hddate = date("d-m-Y", strtotime($fechaN)); 
														?>
																<p for="first-name-column"><strong>Referencia <?php echo $contador; ?></strong></p>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="first-name-column">Nombre Completo</label>
																		<input type="hidden" class="form-control" name="id_referencia_<?php echo $contador; ?>" id="id_referencia_<?php echo $contador; ?>" value="<?php echo $id_referencia; ?>">
																		<input type="text" class="form-control" name="nombre_referencia_<?php echo $contador; ?>" id="nombre_referencia_<?php echo $contador; ?>" value="<?php echo $nombre_referencia; ?>">
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="last-name-column">Dirección</label>
																		<input type="text" class="form-control" name="direccion_referencia_<?php echo $contador; ?>" id="direccion_referencia_<?php echo $contador; ?>" value="<?php echo $direccion_referencia; ?>">
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="city-column">Celular</label>
																		<input type="tel" class="form-control" name="celular_referencia_<?php echo $contador; ?>" id="celular_referencia_<?php echo $contador; ?>" value="<?php echo $celular_referencia; ?>">
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="country-floating">Teléfono</label>
																		<input type="tel" class="form-control" name="telefono_referencia_<?php echo $contador; ?>" id="telefono_referencia_<?php echo $contador; ?>" value="<?php echo $telefono_referencia; ?>">
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="company-column">Empresa donde labora</label>
																		<input type="tel" class="form-control" name="empresa_labora_referencia_<?php echo $contador; ?>" id="empresa_labora_referencia_<?php echo $contador; ?>" value="<?php echo $empresa_labora_referencia; ?>">
																	</div>
																</div>
																<div class="col-md-6 col-12">
																	<div class="form-group">
																		<label for="email-id-column">Teléfono Empleo</label>
																		<input type="tel" class="form-control" name="telefono_empleo_referencia_<?php echo $contador; ?>" id="telefono_empleo_referencia_<?php echo $contador; ?>" value="<?php echo $telefono_empleo_referencia; ?>">
																	</div>
																</div>
														<?php
																}
															};
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="observaciones" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Observaciones</label>
																<textarea  class="form-control" name="observaciones" id="observaciones" cols="30" rows="10"><?php echo $observaciones; ?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							<?php
														}
													}
							?>
							<div class="col-12 d-flex justify-content-end">
								<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="solicitud">
								<input class="btn btn-primary me-1 mb-1" type="submit" value="Actualizar" name="update">
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