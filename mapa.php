<?php
// session_start();
include 'includes/sesiones.php';
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
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
					<h3>Lotes</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Mapa</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="section">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<?php
								if (isset($_GET['lote'])) {
									$id_lote = $_GET['lote'];
									$consulta = $conn->query("SELECT * FROM `lotes` WHERE `id_lote` = $id_lote");
									$contador = 0;
									// CONDICIÓN FALLECIDO
									while ($row = $consulta->fetch_array()) {
										$contador++;
										$v2 = $row['areav2'];
										$bloque = $row['bloque'];
										$estado = $row['estado'];
										$preciovra = 750;

										if ($estado == 'v') {
											$estado = 'Vendido';
											$boton = 'btn-secondary';
										} elseif ($estado == 'd') {
											$boton = 'btn-success';
											$estado = 'Disponible';
										} elseif ($estado == 'r') {
											$boton = 'btn-info';
											$estado = 'Reservado';
										}
										echo '<p><strong>Estado: <a href="#" class="btn ' . $boton . '">' . $estado . '</a><br>Lote: ' . $bloque . '-' . $id_lote . '</p></strong>';
										echo '<div class="card-header">
												<h5 class="card-title">Estado: ' . $estado . '<br>Lote: ' . $bloque . '-' . $id_lote . '</h5>
											</div>';
								?>
										<table class="table table-striped mb-0">
											<tr>
												<th>Área:</th>
												<th>
													<?php echo $v2 . ' vr2'; ?>
												</th>
											</tr>
											<tr>
												<th>Precio:</th>
												<th>
													<?php echo 'L. ' . number_format($v2 * $preciovra); ?>
												</th>
											</tr>
											<tr>
												<th>Prima 10%:</th>
												<th>
													<?php echo 'L. ' . number_format(($v2 * $preciovra) * 0.1, 2); ?>
												</th>
											</tr>
											<tr>
												<th>Cuota 5 años:</th>
												<th>
													<?php echo 'L. ' . number_format((($v2 * $preciovra) - (($v2 * $preciovra) * 0.1)) / 60, 2); ?>
												</th>
											</tr>
											<tr>
												<th>Cuota 10 años:</th>
												<th>
													<?php echo 'L. ' . number_format((($v2 * $preciovra) - (($v2 * $preciovra) * 0.1)) / 120, 2); ?>
												</th>
											</tr>
										</table>
								<?php

									}
								}
								?>
							</div>
						</div>
						<div class="card-body">
							<?php
							include 'lotes/chorreritas.php';
							$consulta = $conn->query("SELECT * FROM lotes");
							$contador = 0;
							// CONDICIÓN FALLECIDO
							while ($row = $consulta->fetch_array()) {
								$contador++;
								$id = $row['numero'];
								$nombres = $row['bloque'];
								$path = $row['path_lote'];
								$bloqueN = $row['bloque'];
								$estado = $row['estado'];
							?>


								<a href="mapa.php?lote=<?php echo $id ?>">
									<path id="<?php echo $bloque . $id ?>" class="cls-1 
					<?php
								if ($estado == 'v') {
									echo 'occupied';
								} elseif ($estado == 'r') {
									echo 'reserved';
								} elseif ($estado == 'd') {
									echo 'enable';
								}
					?>" d="<?php echo $path ?>" transform="translate(-1069.07 -138.44)"></path>

									</path>
								</a>
								<text dy="17" x="3" y="20" font-family="Verdana" font-size="5" style="fill:#425b8e;">
									<textPath xlink:href="#<?php echo $bloque . $id ?>"><?php echo $id ?></textPath>
								</text>
							<?php
								echo $bloqueN . $id;
							}
							?>
							</svg>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<?php
	include('includes/templates/created.php');
	?>
</div>
</div>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>