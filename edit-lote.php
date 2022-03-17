<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
}
$registroLote = "SELECT ficha_directorio.nombre_completo, lotes.id_registro FROM lotes, ficha_directorio WHERE lotes.id_lote = '$user_id' and lotes.id_registro = ficha_directorio.id ORDER BY id_lote ASC;";
$resultRegistro = $conn->query($registroLote);
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
							<h3>Lote</h3>
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
							<h5 class="card-title">Editar Lote</h5>
						</div>
						<div class="card-body">
							<form class="form" id="editarRegistroLote" method="post">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<?php
													$bloques = obtenerTodo('bloques');
													$consulta = $conn->query("SELECT a.id_lote, a.id_bloque, a.colindancias, a.path_lote, a.numero, a.areav2, a.estado, b.bloque, d.precio_vara2, c.nombre FROM lotes a, bloques b, proyectos c, proyectos_ajustes d WHERE a.id_lote = $user_id and a.id_bloque = b.id_bloque and b.id_proyecto = c.id_proyecto and c.id_proyecto = d.id_proyecto;");
													$numero = 1;
													while ($solicitud = $consulta->fetch_array()) {
														$id_lote = $solicitud['id_lote'];
														$id_bloque = $solicitud['id_bloque'];
														$bloque = $solicitud['bloque'];
														$preciov2 = $solicitud['precio_vara2'];
														$estado = $solicitud['estado'];
														$nombre = $solicitud['nombre'];
														$areav2 = $solicitud['areav2'];
														$numero = $solicitud['numero'];
														$path_lote = $solicitud['path_lote'];
														$estado = $solicitud['estado'];
														$colindancias = $solicitud['colindancias'];

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
																	<label for="first-name-column">Bloque</label>
																	<select class="form-select" name="bloque" id="bloque">
																		<?php
																		if ($bloques->num_rows > 0) {
																			while ($row = $bloques->fetch_assoc()) {
																				$id_bloques = $row['id_bloque'];
																				$bloque = $row['bloque'];
																				if ($id_bloques == $id_bloque) {
																					echo '<option name="id_bloque" value="' . $id_bloques . '" selected>' . $bloque . '</option>';
																				} else {
																					echo '<option name="id_bloque" value="' . $id_bloques . '">' . $bloque . '</option>';
																				}
																			}
																		}
																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-6 col-12">
																<div class="form-group">
																	<label for="first-name-column">Número</label>
																	<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
																	<input type="hidden" id="id_proyectob" name="id_proyectob" value="<?php echo $id_proyectob; ?>">
																	<input type="text" class="form-control" id="numero" name="numero" value="<?php echo $numero; ?>" required>
																</div>
															</div>
															<div class="col-md-6 col-12">
																<div class="form-group">
																	<label for="first-name-column">Varas2</label>
																	<input type="text" class="form-control" id="areav2" name="areav2" value="<?php echo $areav2; ?>" required>
																</div>
															</div>
															<div class="col-md-6 col-12">
																<div class="form-group">
																	<label for="last-name-column">Estado</label>
																	<select class="form-select" name="estado" id="estado">
																		<?php
																		if ($estado == 'v') {
																			echo "<option name='estado' value='v' selected>Vendido</option>";
																			echo "<option name='estado' value='r'>Reservado</option>";
																			echo "<option name='estado' value='d'>Disponible</option>";
																		} elseif ($estado == 'd') {
																			echo "<option name='estado' value='d' selected>Disponible</option>";
																			echo "<option name='estado' value='r'>Reservado</option>";
																			echo "<option name='estado' value='v'>Vendido</option>";
																			$estado = 'Disponible';
																		} elseif ($estado == 'r') {
																			echo "<option name='estado' value='r' selected>Reservado</option>";
																			echo "<option name='estado' value='d'>Disponible</option>";
																			echo "<option name='estado' value='v'>Vendido</option>";
																		}
																		?>
																	</select>
																</div>
															</div>
															<div class="col-md-12 col-12">
																<div class="form-group">
																	<label for="first-name-column">Comprador</label>
																	<?php
																	if ($resultRegistro->num_rows > 0) {
																		while ($f = $resultRegistro->fetch_assoc()) {
																			$nombre = $f['nombre_completo'];
																			$id_register = $f['id_registro'];
																			// echo '<input type="hidden" id="id_register" name="id_register" class="form-control"  value="' . $id_register . '" readonly="readonly">';
																			echo '<input type="text" id="" name="" class="form-control"  value="' . $nombre . '" readonly="readonly">';
																		}
																	} else {
																		$nombre = 'No hay comprador';
																		echo '<input type="text" id="" name="" class="form-control"  value="' . $nombre . '" readonly="readonly">';
																	}
																	?>

																</div>
															</div>
															<div class="col-md-12 col-12">
																<div class="form-group">
																	<label for="first-name-column">Colindancias</label>
																	<textarea  class="form-control" name="colindancias" id="colindancias" cols="30" rows="5"><?php echo $colindancias; ?></textarea>
																</div>
															</div>
															<div class="col-md-12 col-12">
																<div class="form-group">
																	<label for="first-name-column">Path SVG</label>
																	<textarea class="form-control" name="path_lote" id="path_lote" cols="130" rows="5" data-valorinicial="" readonly><?php echo $path_lote; ?></textarea>
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
										<input type="hidden" class="btn btn-primary me-1 mb-1" id="tipo" value="editlote">
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