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
					<h3>Ventas</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Facturación</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="section">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Editar Venta</h5>
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
					<form class="form" id="editarventa" method="post">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
								<div class="card">
									<div class="card-content">
										<div class="card-body">
											<?php
											if ($_GET) {
												// $solicitudes = obtenerInfoSolicitud($user_id);
												$solicitudes = obtenerInfoVenta($user_id);
											} else {
												header('Location: ventas.php');
											};;
											if ($solicitudes->num_rows > 0) {
												while ($filasVentas = $solicitudes->fetch_assoc()) {
													$id_compra = $filasVentas['id_ficha_compra'];
													$id_registro = $filasVentas['id_registro'];
													$nombre_completo = $filasVentas['nombre_completo'];
													$fecha_venta = $filasVentas['fecha_venta'];
													$tipo = $filasVentas['tipo'];
													$estado = $filasVentas['estado'];
													$prima = $filasVentas['prima'];
													$plazo_meses = $filasVentas['plazo_meses'];
													$id_vendedor = $filasVentas['vendedor'];
													$id_proyecto = $filasVentas['id_proyecto'];
													$cuentabank = $filasVentas['cuenta_bancaria'];
													$fecha_primer_cuota = $filasVentas['fecha_primer_cuota'];
													$dia_pago = $filasVentas['dia_pago'];

											?>
													<div class="row">
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="first-name-column">Nombre Completo</label>
																<input type="hidden" id="fechaSolicitud" name="fechaSolicitud" value="<?php echo date('Y-m-d'); ?>">
																<input type="hidden" id="horaSolicitud" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
																<input type="hidden" class="form-control" id="id_registro" name="id_registro" value="<?php echo $id_registro; ?>" readonly>
																<input type="hidden" class="form-control" id="id_ficha_compra" name="id_ficha_compra" value="<?php echo $id_compra; ?>" readonly>
																<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="<?php echo $nombre_completo; ?>" readonly>
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="first-name-column">Fecha de Contrato</label>
																<input type="date" class="form-control" name="fecha_venta" id="fecha_venta" value="<?php echo $fecha_venta; ?>" required>
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="last-name-column">Tipo de Venta</label>
																<select class="form-select" id="tipo_venta" name="tipo_venta">
																	<?php
																	if ($tipo == 'CRÉDITO') {
																		echo '<option value="CRÉDITO" selected>Crédito</option>';
																		echo '<option value="VENTA">Venta</option>';
																	} elseif ($tipo == 'VENTA') {
																		echo '<option value="CRÉDITO">Crédito</option>';
																		echo '<option value="VENTA" selected>Venta</option>';
																	}
																	?>
																</select>
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="company-column">Prima</label>
																<input type="number" class="form-control" name="prima" id="prima" value="<?php echo $prima; ?>" placeholder="00.00" required>
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<label for="country-floating">No. de Cuotas(meses)</label>
																<input type="number" class="form-control" id="plazo_meses" name="plazo_meses" value="<?php echo $plazo_meses; ?>" required>
															</div>
														</div>
														<div class="col-md-12 col-12">
															<div class="form-group">
																<select class="form-select" id="estado" name="estado">
																	<?php
																	//array de las opciones de un select
																	$opciones = array('en', 'an', 'co', 'pa', 'ca', 'pe');
																	$nombres = array('En curso', 'Anulado', 'Concluido', 'Inactivo', 'Cancelado', 'Pendiente');
																	//array bidimensional con las $opciones y $nombres
																	$select = array_combine($opciones, $nombres);
																	//recorremos el array bidimensional
																	foreach ($select as $opcion => $nombre) {
																		//si la opcion es igual a la que esta en la base de datos 
																		if ($opcion == $estado) {
																			//seleccionamos la opcion
																			echo '<option value="' . $opcion . '" selected>' . $nombre . '</option>';
																		} else {
																			//sino seleccionamos la opcion
																			echo '<option value="' . $opcion . '">' . $nombre . '</option>';
																		}
																	}
																	?>
																</select>
															</div>
														</div>
													</div>
											<?php
												}
											}
											?>
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
													<input type="hidden" id="proyecto" name="proyecto" class="form-control" value="<?php echo $id_proyecto; ?>" placeholder="<?php echo $id_proyecto; ?>">
													<?php
													$bloque = obtenerTodoBloque();
													?>
													<div class="form-group">
														<select class="choices form-select" id="bloque" name="bloque">
															<option name="lote" value="">Buscar Lote...(Ej. B2)</option>
															<?php
															if ($bloque->num_rows > 0) {
																while ($row = $bloque->fetch_assoc()) {
																	$id_lote = $row['id_lote'];
																	$nombre = $row['bloqueresult'];
																	echo '<option name="lote" value="' . $id_lote . '">' . $nombre . '</option>';
																}
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-12 d-flex justify-content-end">
													<div class="btn btn-primary me-1 mb-1">
														<i class="fa fa-arrow-down" style="color:white;" aria-hidden="true"></i>
														<input class="btn" style="color:white" value="Agregar" name="update" onclick="addAddressLine()">
													</div>
												</div>
												<div class="col-12 d-flex justify-content-end">
													<table class="table table-lg">
														<thead>
															<tr>
																<th>No.</th>
																<th>Descripción</th>
																<th>Quitar</th>
															</tr>
														</thead>
														<tbody id="tabla">
															<?php
															$compralot = obtenerInfoLoteComprado($id_compra);
															if ($compralot->num_rows > 0) {
																while ($compra = $compralot->fetch_assoc()) {
																	$id_compra_lote = $compra['id_compra_lote'];
																	$id_lote_compra = $compra['id_lote'];
																	$bloque = $compra['bloque'];
																	$id_registro = $compra['id_registro'];
																	$id_compra = $compra['id_compra'];
															?>
																	<tr>
																		<td class="text-bold-500 tabla-bloque" name="fila[]" id="<?php echo $id_lote_compra; ?>" value="<?php echo $id_compra_lote; ?>">1</td>
																		<td class="text-bold-500"><?php echo $bloque . $id_lote_compra; ?></td>
																		<td class="text-bold-500"><button class="btn btn-danger" onclick="deleteRow(this)">Quitar</button></td>
																	</tr>
															<?php
																}
															}
															?>
															<div id="opciones">
															</div>
														</tbody>
													</table>
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
												<div class="col-md-12 col-12">
													<div class="form-group">
														<label for="first-name-column">Vendedor</label>
														<select class="choices form-select" id="vendedor" name="vendedor">
															<option name="lote" value="">Buscar Vendedor</option>
															<?php
															$vendedor = obtenerTodo('vendedores');
															if ($vendedor->num_rows > 0) {
																while ($row = $vendedor->fetch_assoc()) {
																	$id_vend = $row['id_vendedor'];
																	$nombre_vendedor = $row['nombre_vendedor'];
																	if ($id_vend == $id_vendedor) {
																		echo '<option name="id_vendedor" value="' . $id_vend . '" selected>' . $nombre_vendedor . '</option>';
																	} else {
																		echo '<option name="id_vendedor" value="' . $id_vend . '">' . $nombre_vendedor . '</option>';
																	}
																}
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-md-12  col-12">
													<div class="form-group">
														<label for="last-name-column">Deposito en Banco</label>
														<select class="choices form-select" id="cuenta_bancaria" name="cuenta_bancaria">
															<option name="lote" value="">Buscar Banco</option>
															<?php
															$cuenta_bancaria = obtenerTodo('cuentas_bancarias');
															if ($cuenta_bancaria->num_rows > 0) {
																while ($row = $cuenta_bancaria->fetch_assoc()) {
																	$id = $row['id_cuenta'];
																	$nombre_completo = $row['institucion_bancaria'];
																	if ($id == $cuentabank) {
																		echo '<option name="cuenta_bancaria" value="' . $id . '" selected>' . $nombre_completo . '</option>';
																	} else {
																		echo '<option name="cuenta_bancaria" value="' . $id . '">' . $nombre_completo . '</option>';
																	}
																}
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="city-column">Fecha Pago Primera Cuota *</label>
														<input type="date" class="form-control" name="fecha_primer_cuota" id="fecha_primer_cuota" value="<?php echo $fecha_primer_cuota; ?>">
													</div>
												</div>
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="city-column">Día de Pago *</label>
														<input type="number" class="form-control" name="dia_pago" id="dia_pago" max="30" min="1" value="<?php echo $dia_pago; ?>" placeholder="1 al 30">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="editarventa">
								<input class="btn btn-primary me-1 mb-1" type="submit" value="Actualizar" name="update">
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