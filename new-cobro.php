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
					<h3>Cobros</h3>
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
					<h5 class="card-title">Nuevo Cobro</h5>
				</div>
				<div class="card-body">
					<?php
					$DateAndTime = date('m-d-Y h:i:s a', time());
					echo 'Hoy es:<strong> <span id="relojnumerico" onload"cargarReloj()"></span></strong>';
					?>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="true">Cuota Mensual</a>
						</li>
					</ul>
					<form class="form" id="nuevaventa" method="post">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
								<div class="card">
									<div class="card-content">
										<div class="card-body">
											<div class="row">
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="first-name-column">Nombre Completo</label>
														<input type="hidden" id="fechaSolicitud" name="fechaSolicitud" value="<?php echo date('Y-m-d'); ?>">
														<input type="hidden" id="horaSolicitud" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
														<select class="choices form-select" id="nombre_completo" name="nombre_completo">
															<option name="lote" value="">Buscar Cliente</option>
															<?php
															$nombres = obtenerFichas();
															if ($nombres->num_rows > 0) {
																while ($row = $nombres->fetch_assoc()) {
																	$id = $row['id'];
																	$nombre_completo = $row['nombre_completo'];
																	echo '<option name="nombre_completo" value="' . $id . '">' . $nombre_completo . '</option>';
																}
															}
															?>
														</select>
													</div>
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
																	echo '<option name="cuenta_bancaria" value="' . $id . '">' . $nombre_completo . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="last-name-column">Comprobante *</label>
														<select class="form-select" id="recibo" name="recibo">
															<option value="1">RECIBO DIGITAL</option>
															<option value="2">RECIBO</option>
														</select>
													</div>
													<div class="form-group">
														<label for="company-column">No. de Referencia Bancaria</label>
														<input type="text" class="form-control" name="referencia_bancaria" id="referencia_bancaria" value="" placeholder="Ref00001">
													</div>
													<div class="form-group">
														<label for="last-name-column">Forma de Pago *</label>
														<select class="form-select" id="forma_pago" name="forma_pago">
															<option value="1">DEPOSITO BANCARIO</option>
															<option value="2">TRANSFERENCIA BANCARIA</option>
															<option value="3">TRANSFERENCIA ACH</option>
															<option value="4">PAGO EN EFECTIVO</option>
															<option value="5">TARJETA DE CRÉDITO</option>
															<option value="6">TARJETA DE DEBITO</option>
															<option value="7">PAGO CON CHEQUE</option>
														</select>
													</div>
													<div class="form-group">
														<label for="first-name-column">Fecha de de Pago</label>
														<input type="date" class="form-control" name="fecha_venta" id="fecha_venta" value="">
													</div>
													<div class="form-group">
														<label for="company-column">No. de Comprobante</label>
														<input type="number" class="form-control" name="comprabante" id="comprabante" value="" placeholder="00001">
													</div>
													<div class="form-group">
														<label for="company-column">Cuota Mensual (L.)</label>
														<input type="number" class="form-control" name="cuota" id="cuota" value="" placeholder="00.00">
													</div>
												</div>
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="company-column">Subir Comprobante</label>
														<input type="file" accept="image/*" class="form-control" name="comprobante_fisico" id="seleccionArchivos" value="" onchage="javascript:leer()">
													</div>
													<div class="form-group">
														<label for="company-column">Ver Comprobante</label>
														<div id="contenedorimg" style="text-align:center;width:100%;">
															<img id="imagenPrevisualizacion" src="">
														</div>
														<style>
															/* //Efecto zoom en imagenPrevisualizacion */
															#contenedorimg{
																overflow: hidden;
															}
															#imagenPrevisualizacion {
																width: 50%;
																/* height: 200px; */
																transition: all .2s ease-in-out;
																-moz-transition: all .2s ease-in-out;
																-o-transition: all .2s ease-in-out;
																-ms-transition: all .2s ease-in-out;
																object-fit: cover;
															}

															#imagenPrevisualizacion:hover {
																-webkit-transform: scale(1.8);
																-moz-transform: scale(1.8);
																-o-transform: scale(1.8);
																transform: scale(1.8);
																overflow: scroll;
															}
															#contenedorimg:hover{
																overflow: scroll;
															}
														</style>
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
													$bloque = obtenerTodoBloque();
													$proyectos = obtenerProyecto('1');
													if ($proyectos->num_rows > 0) {
														while ($row = $proyectos->fetch_assoc()) {
															$id_proyecto = $row['id_proyecto'];
															$nombre = $row['nombre'];
															echo '<input type="hidden" id="proyecto" name="proyecto" class="form-control" value="' . $id_proyecto . '" placeholder="' . $nombre . '">';
														}
													}

													?>

													<div class="form-group">
														<select class="choices form-select" id="bloque" name="bloque">
															<option name="lote" value="">Buscar Lote...(Ej. B2)</option>
															<?php
															if ($bloque->num_rows > 0) {
																while ($row = $bloque->fetch_assoc()) {
																	$id_bloque = $row['id_bloque'];
																	$id_lote = $row['id_lote'];
																	$areav2 = $row['areav2'];
																	$precio = $row['areav2'] * $row['precio_vara2'];
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
																	$id = $row['id_vendedor'];
																	$nombre_completo = $row['nombre_vendedor'];
																	echo '<option name="vendedor" value="' . $id . '">' . $nombre_completo . '</option>';
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
																	echo '<option name="cuenta_bancaria" value="' . $id . '">' . $nombre_completo . '</option>';
																}
															}
															?>
														</select>
													</div>
												</div>
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="city-column">Fecha Pago Primera Cuota *</label>
														<input type="date" class="form-control" name="fecha_primer_cuota" id="fecha_primer_cuota" value="">
													</div>
												</div>
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="city-column">Día de Pago *</label>
														<input type="number" class="form-control" name="dia_pago" id="dia_pago" max="30" min="1" vvalue="" placeholder="1 al 30">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="newventa">
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