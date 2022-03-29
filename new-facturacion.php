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
					<h3>Faturación</h3>
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
					<h5 class="card-title">Nuevo CAI</h5>
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
							<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="true">CAI</a>
						</li>
					</ul>
					<form class="form" id="nuevoCAI" name="cobroForm" method="post" enctype="multipart/form-data">
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
								<div class="card">
									<div class="card-content">
										<div class="card-body">
											<div class="row">
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="last-name-column">Código CAI *</label>
														<input type="text" id="codigo_cai" class="form-control" name="codigo_cai" placeholder="Eje. 233F51-65FF69....">
													</div>
													<div class="form-group">
														<label for="last-name-column">Fecha Emisión *</label>
														<input type="date" id="fecha_emision" class="form-control" name="fecha_emision">
													</div>
													<div class="form-group">
														<label for="last-name-column">Fecha Límite *</label>
														<input type="date" id="fecha_limite" class="form-control" name="fecha_limite">
													</div>
													<div class="form-group">
														<label for="last-name-column">Cantidad Otorgada *</label>
														<input type="number" id="cantidad_otorgada" class="form-control" name="cantidad_otorgada" placeholder="eje. 500">
													</div>

												</div>
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="last-name-column">Rango Inicial *</label>
														<input type="text" id="rango_inicial" class="form-control" name="rango_inicial" placeholder="eje. 000-001-01-00001001">
													</div>
													<div class="form-group">
														<label for="last-name-column">Rango Final *</label>
														<input type="text" id="rango_final" class="form-control" name="rango_final" placeholder="eje. 000-001-01-00001500">
													</div>
													<div class="form-group">
														<label for="first-name-column">Empresa</label>
														<select class="choices form-select" id="empresa_cai" name="empresa_cai">
															<option name="lote" value="">Buscar Empresa</option>
															<?php
															$nombres = obtenerEmpresa();
															if ($nombres->num_rows > 0) {
																while ($row = $nombres->fetch_assoc()) {
																	$id = $row['id_empresa'];
																	$nombre_completo = $row['nombre'];
																	echo '<option name="nombre_completo" value="' . $id . '">' . $nombre_completo . '</option>';
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
								<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="nuevoCAI">
								<input class="btn btn-primary me-1 mb-1" type="submit" value="Ingresar Pago" name="solicitud">
								<a href="facturacion.php">
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
<script src="autocomplate/jquery-3.4.1.min.js"></script>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/choices.js/choices.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>