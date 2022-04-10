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
					<div>
						<?php
						$DateAndTime = date('d-m-Y', time());
						echo '<p>Hoy es: <strong>' . $DateAndTime . ' <span id="relojnumerico" onload"cargarReloj()"></span></p></strong>';
						?>
					</div>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="true">Cuota Mensual</a>
						</li>
					</ul>
					<form class="form" id="nuevoCobro" name="cobroForm" method="post" enctype="multipart/form-data">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
								<div class="card">
									<div class="card-content">
										<div class="card-body">
											<div class="row">
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="first-name-column">Nombre Completo</label>
														<input type="hidden" id="fecha_pago" name="fecha_pago" value="<?php echo date('Y-m-d'); ?>">
														<input type="hidden" id="hora_pago" name="horaSolicitud" value="<?php echo date('H:i:s'); ?>">
														<select class="choices form-select" id="nombre_completo" name="nombre_completo" onchange="mi_busqueda();">
															<option name="lote" value="">Buscar Contrato</option>
															<?php
															$nombres = obtenerFichasCompra();
															if ($nombres->num_rows > 0) {
																while ($row = $nombres->fetch_assoc()) {
																	$id = $row['id_ficha_compra'];
																	$id_contrato_compra = $row['id_contrato_compra'];
																	// $id = $row['id'];
																	$nombre_completo = $row['nombre_completo'];
																	echo '<option name="nombre_completo" value="' . $id . '">' . $id_contrato_compra . '</option>';
																}
															}
															?>

														</select>
														<!-- <input type="text" id="cuadro_buscar" class="form-control" onkeypress="mi_busqueda();"> -->
													</div>
													<div class="form-group">
														<label for="last-name-column">Deposito en Banco</label>
														<select class="choices form-select" id="id_banco" name="id_banco">
															<option name="id_banco" value="">Buscar Banco</option>
															<?php
															$cuenta_bancaria = obtenerTodo('cuentas_bancarias');
															if ($cuenta_bancaria->num_rows > 0) {
																while ($row = $cuenta_bancaria->fetch_assoc()) {
																	$id = $row['id_cuenta'];
																	$nombre_completo = $row['institucion_bancaria'];
																	echo '<option name="id_banco" value="' . $id . '">' . $nombre_completo . '</option>';
																}
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="last-name-column">Tipo Comprobante *</label>
														<select class="form-select" id="tipo_comprobante" name="tipo_comprobante">
															<option value="1">RECIBO DIGITAL</option>
															<option value="2">RECIBO</option>
														</select>
													</div>
													<div class="form-group">
														<label for="company-column">No. de Referencia Bancaria</label>
														<input type="text" class="form-control" name="no_referencia" id="no_referencia" value="" placeholder="Ref00001">
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
													<div id="mostrar_mensaje">

													</div>
												</div>
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="first-name-column">Fecha en la que se pagó</label>
														<input type="date" class="form-control" name="fecha_pago" id="fecha_pago" value="<?php echo date("Y-m-d"); ?>">
													</div>
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
															#contenedorimg {
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
																-webkit-transform: scale(2);
																-moz-transform: scale(2);
																-o-transform: scale(2);
																transform: scale(2);
																overflow: scroll;
															}

															#contenedorimg:hover {
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
							<div id="mostrar_mensaje">

							</div>
							<div class="barra">
								<div class="barra_azul" id="barra_estado">
									<span></span>
								</div>
							</div>
							<div class="col-12 d-flex justify-content-end">
								<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="newCobro">
								<input class="btn btn-primary me-1 mb-1" type="submit" value="Ingresar Pago" name="solicitud">
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
<script>
	function mi_busqueda() {
		buscar = document.getElementById('nombre_completo').value;
		console.log(buscar);
		var parametros = {
			"mi_busqueda": buscar,
			"accion": "4"
		};

		$.ajax({
			data: parametros,
			url: 'includes/models/model-autocomplete.php',
			type: 'POST',

			beforesend: function() {
				$('#mostrar_mensaje').html("Mensaje antes de Enviar");
			},

			success: function(mensaje) {
				$('#mostrar_mensaje').html(mensaje);
			}
		});
	}
</script>
<script src="autocomplate/jquery-3.4.1.min.js"></script>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/choices.js/choices.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>