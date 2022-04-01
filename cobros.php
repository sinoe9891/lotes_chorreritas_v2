<?php
// session_start();
include 'includes/sesiones.php';
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
					<h3>Créditos</h3>

				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Ventas</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<section class="section eliminar-cuota-pagada">
			<div class="card">
				<div class="card-body">
					<div>
						<?php
						$DateAndTime = date('d-m-Y', time());
						echo '<p>Hoy es: <strong>' . $DateAndTime . ' <span id="relojnumerico" onload"cargarReloj()"></span></p></strong>';
						?>
					</div>
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>Cliente</th>
								<th>Cuota</th>
								<th>Comprobante</th>
								<th>Tipo</th>
								<th>Fecha</th>
								<th>Fact. Dig.</th>
								<th>Recibo</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$consultaProyecto = $conn->query("SELECT * FROM ficha_compra a, proyectos_ajustes b WHERE a.id_proyecto = b.id_proyecto");
							$ajusteProyecto = $consultaProyecto->fetch_assoc();
							if ($ajusteProyecto > 0) {
								$precio_vara2 = $ajusteProyecto['precio_vara2'];
							} else {
								$precio_vara2 = 0;
							}

							$consulta = $conn->query("SELECT DISTINCT a.id_cobro, d.nombre_completo, a.cantidad_pagada, a.no_referencia, a.tipo_comprobante, a.fecha_pagada, a.url_comprobante FROM cobros a, ficha_compra c, ficha_directorio d WHERE a.id_contrato = c.id_ficha_compra and c.id_registro = d.id ORDER BY a.id_cobro DESC;");
							$numero = 1;
							$contador = 1;
							$total = 0;
							while ($solicitud = $consulta->fetch_array()) {
								date_default_timezone_set('America/Tegucigalpa');
								$nombre_completo = $solicitud['nombre_completo'];
								$cantidad_pagada = $solicitud['cantidad_pagada'];
								$no_referencia = $solicitud['no_referencia'];
								$tipo_comprobante = $solicitud['tipo_comprobante'];
								$fecha_pagada = $solicitud['fecha_pagada'];
								$url_comprobante = $solicitud['url_comprobante'];
								$id_cobro = $solicitud['id_cobro'];
								$fecha_pagada = date('d-m-Y', strtotime($fecha_pagada));
							?>
								<tr id="solicitud:<?php echo $id_cobro ?>">
									<td><?php echo $contador++; ?></td>
									<td><?php echo $nombre_completo; ?></td>
									<td><?php echo $cantidad_pagada; ?></td>
									<td><?php echo $no_referencia; ?></td>
									<td><?php echo $tipo_comprobante; ?></td>
									<td><?php echo $fecha_pagada; ?></td>
									<td><a href="doc/factura.php?ID=<?php echo $id_cobro; ?>" target="_blank">Ver</a></td>
									<td><a href="<?php echo $url_comprobante; ?>" target="_blank">Ver</a></td>
									<td>
										<button type="button" class="fas fa-trash btn btn-danger btn-sm"  data-id="<?php echo $id_cobro ?>">Eliminar</button>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a href="new-cobro.php" class="btn btn-primary">Nuevo Cobro</a>
				</div>
			</div>
		</section>
	</div>

	<?php
	include('includes/templates/created.php');
	?>
</div>
</div>

<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script>
	// Simple Datatable
	let table1 = document.querySelector('#table1');
	let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?php
include('includes/templates/footer.php');
?>
<script src="assets/js/main.js"></script>
</body>

</html>