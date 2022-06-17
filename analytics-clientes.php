<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
include 'includes/templates/sidebar.php';
date_default_timezone_set('America/Tegucigalpa');

$consulta = $conn->query("SELECT IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 24, '0-24', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 34, '25-34', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 44, '35-44', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 54, '45-54', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 64, '55-64', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 65, '65+', '65+') ) ) ) ) ) edades, COUNT(*) cantidad FROM `ficha_directorio` GROUP BY edades ORDER BY `edades` ASC");

$data = array(); // Array donde vamos a guardar los datos
while ($r = $consulta->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
	$data[] = $r; // Guardar los resultados en la variable $data
}
$total = 0;
foreach ($data as $d) :
	$total = $total + $d->cantidad;
endforeach;

$totalclientes = 0;
foreach ($data as $d) :
	$totalclientes = $totalclientes + $d->cantidad;
endforeach;

// Genero 
$consulta = $conn->query("select sum(case when genero like '%F%' then 1 else 0 end) as Femenino, sum(case when genero like '%M%' then 1 else 0 end) as Masculino from ficha_directorio where genero like '%F%' OR genero like '%M%' ORDER BY genero ASC;");


$genero = array(); // Array donde vamos a guardar los datos
while ($r = $consulta->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
	$genero[] = $r; // Guardar los resultados en la variable $genero
};
foreach ($genero as $gener) :
	$masc = $gener->Masculino;
	$feme = $gener->Femenino;
	$totalgenero = $masc + $feme;
endforeach;


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
					<h3>Métricas</h3>
				</div>
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
							<li class="breadcrumb-item active" aria-current="page">Configuración</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h5>Grupos Demográficos</h5>
				</div>
			</div>
		</div>
		<section class="section">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Edad</h4>
						</div>
						<div class="card-body">
							<canvas id="bar"></canvas>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4>Género</h4>
						</div>
						<canvas id="oilChart"></canvas>
					</div>
				</div>
			</div>
		</section>
		<div class="page-title">
			<div class="row">
				<div class="col-12 col-md-6 order-md-1 order-last">
					<h5>Información Geográfica</h5>
				</div>
			</div>
		</div>
		<section class="section factura">
			<div class="card">
				<div class="card-header">
					<h4>Ubicación</h4>
				</div>
				<div class="card-body">
					<table class="table table-striped" id="table1">
						<thead>
							<tr>
								<th>No.</th>
								<th>País Reside</th>
								<th>Ciudad</th>
								<th>Departamento/Estado</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$consultanacionalidad = $conn->query("select `ciudad`, `departamento`, `pais_reside`, nacionalidad, count('%M%'+'%F%') as Total from ficha_directorio where genero like '%F%' OR genero like '%M%' group by `ciudad` ORDER BY `pais_reside` ASC;");

							$numero1 = 1;
							$contador1 = 1;
							$total1 = 0;
							while ($solicitudnac = $consultanacionalidad->fetch_array()) {
								$ciudad = $solicitudnac['ciudad'];
								$departamento = $solicitudnac['departamento'];
								$pais_reside = $solicitudnac['pais_reside'];
								$Total = $solicitudnac['Total'];
							?>
								<tr ?>
									<td><?php echo $contador1++; ?></td>
									<td><?php echo $pais_reside; ?></td>
									<td><?php echo $ciudad; ?></td>
									<td><?php echo $departamento; ?></td>
									<td><?php echo $Total; ?></td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<section class="section">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<?php
							$consultanacionalidad = $conn->query("select nacionalidad, sum(case when genero like '%F%' then 1 else 0 end) as Femenino, sum(case when genero like '%M%' then 1 else 0 end) as Masculino, count('%M%'+'%F%') as Total from ficha_directorio where genero like '%F%' OR genero like '%M%' group by nacionalidad ORDER BY nacionalidad ASC;");
							$rowcount = mysqli_num_rows($consultanacionalidad);;
							?>
							<h4>Nacionalidad (total <?php echo $rowcount ?>)</h4>
						</div>
						<div class="card-body">
							<table class="table table-striped" id="table2">
								<thead>
									<tr>
										<th>No.</th>
										<th>Nacionalidad</th>
										<th>Femenino</th>
										<th>Masculino</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php


									$numero1 = 1;
									$contador1 = 1;
									$total1 = 0;
									while ($solicitudnac = $consultanacionalidad->fetch_array()) {
										$nacionalidad = $solicitudnac['nacionalidad'];
										$Femenino = $solicitudnac['Femenino'];
										$Masculino = $solicitudnac['Masculino'];
										$Total = $solicitudnac['Total'];
									?>
										<tr ?>
											<td><?php echo $contador1++; ?></td>
											<td><?php echo $nacionalidad; ?></td>
											<td><?php echo $Femenino; ?></td>
											<td><?php echo $Masculino; ?></td>
											<td><?php echo $Total; ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<?php
						$paisreside = $conn->query("select pais_reside, sum(case when genero like '%F%' then 1 else 0 end) as Femenino, sum(case when genero like '%M%' then 1 else 0 end) as Masculino, count('%M%'+'%F%') as Total from ficha_directorio where genero like '%F%' OR genero like '%M%' group by pais_reside ORDER BY pais_reside ASC;");
						$rowcount = mysqli_num_rows($paisreside);
						?>
						<div class="card-header">
							<h4>País Reside (total <?php echo $rowcount ?>)</h4>
						</div>
						<div class="card-body">
							<table class="table table-striped" id="table3">
								<thead>
									<tr>
										<th>No.</th>
										<th>País Reside</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php


									$numero1 = 1;
									$contador1 = 1;
									$total1 = 0;
									while ($solicitudnac = $paisreside->fetch_array()) {
										$pais_reside = $solicitudnac['pais_reside'];
										$Total = $solicitudnac['Total'];
									?>
										<tr ?>
											<td><?php echo $contador1++; ?></td>
											<td><?php echo $pais_reside; ?></td>
											<td><?php echo $Total; ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="page-title">
					<div class="row">
						<div class="col-12 col-md-6 order-md-1 order-last">
							<h5>Adquisición</h5>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<?php
						$adquisicion = $conn->query("select sum(case when `adquisicion` like '%RRSS%' then 1 else 0 end) as social, sum(case when `adquisicion` like '%Directo%' then 1 else 0 end) as directo, sum(case when `adquisicion` like '%Email%' then 1 else 0 end) as email, sum(case when `adquisicion` like '%Referido%' then 1 else 0 end) as referido, count(`adquisicion`) as totaladquisicion from `ficha_directorio` ORDER BY `adquisicion` ASC;");
						while ($adquisiciones = $adquisicion->fetch_array()) {
							$social = $adquisiciones['social'];
							$directo = $adquisiciones['directo'];
							$email = $adquisiciones['email'];
							$referido = $adquisiciones['referido'];
							$totaladquisicion = $adquisiciones['totaladquisicion'];
						}

						?>
						<div class="card-header">
							<h4>Canales de Contacto</h4>
						</div>
						<div class="card-body">
							<table class="table table-striped" id="table3">
								<thead>
									<tr>
										<th>No.</th>
										<th>Estado Civil</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php


									$numero1 = 1;
									$contador1 = 1;
									$total1 = 0;
									?>
									<tr>
										<td>1</td>
										<td>Social</td>
										<td COLSPAN=2><?php echo $social . ' (' . round(($social * 100) / $totaladquisicion, 2) . '%)'; ?></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Directo</td>
										<td COLSPAN=2><?php echo $directo . ' (' . round(($directo * 100) / $totaladquisicion, 2) . '%)'; ?></td>
									</tr>
									<tr>
										<td>3</td>
										<td>Email</td>
										<td COLSPAN=2><?php echo $email . ' (' . round(($email * 100) / $totaladquisicion, 2) . '%)'; ?></td>
									</tr>
									<tr>
										<td>4</td>
										<td>Referido</td>
										<td COLSPAN=2><?php echo $referido . ' (' . round(($referido * 100) / $totaladquisicion, 2) . '%)'; ?></td>
									</tr>
									<?php

									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card">
						<?php
						$fuentequery = $conn->query("select fuente, COUNT(fuente) as total from ficha_directorio group by fuente ORDER BY fuente ASC;");
						$rowcount = mysqli_num_rows($fuentequery);
						?>
						<div class="card-header">
							<h4>Fuente/Medio (total <?php echo $rowcount ?>)</h4>
						</div>
						<div class="card-body">
							<table class="table table-striped" id="table3">
								<thead>
									<tr>
										<th>No.</th>
										<th>País Reside</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$numero1 = 1;
									$contador1 = 1;
									
									while ($fuentes = $fuentequery->fetch_array()) {
										$fuente = $fuentes['fuente'];
										$total = $fuentes['total'];
									?>
										<tr ?>
											<td><?php echo $contador1++; ?></td>
											<td><?php echo $fuente; ?></td>
											<td><?php echo $total . ' (' . round(($total * 100) / $totaladquisicion, 2) . '%)'; ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="page-title">
				<div class="row">
					<div class="col-12 col-md-6 order-md-1 order-last">
						<h5>Información Extra</h5>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<?php
					$estadocivil = $conn->query("select sum(case when `estado_civil` like '%1%' then 1 else 0 end) as Soltero, sum(case when `estado_civil` like '%2%' then 1 else 0 end) as Casado, sum(case when `estado_civil` like '%3%' then 1 else 0 end) as Divorciado, sum(case when `estado_civil` like '%4%' then 1 else 0 end) as Viudo, sum(case when `estado_civil` like '%5%' then 1 else 0 end) as Union_Libre, count(`estado_civil`) as totaestadocivil from `ficha_directorio` ORDER BY `estado_civil` ASC;");
					while ($solicitudnac = $estadocivil->fetch_array()) {
						$soltero = $solicitudnac['Soltero'];
						$casado = $solicitudnac['Casado'];
						$divorciado = $solicitudnac['Divorciado'];
						$viudo = $solicitudnac['Viudo'];
						$union_Libre = $solicitudnac['Union_Libre'];
						$Total = $solicitudnac['totaestadocivil'];
					}

					?>
					<div class="card-header">
						<h4>Estado Civil (total <?php echo $Total ?>)</h4>
					</div>
					<div class="card-body">
						<table class="table table-striped" id="table3">
							<thead>
								<tr>
									<th>No.</th>
									<th>Estado Civil</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php


								$numero1 = 1;
								$contador1 = 1;
								$total1 = 0;
								?>
								<tr>
									<td>1</td>
									<td>Soltero(a)</td>
									<td COLSPAN=2><?php echo $soltero . ' (' . round(($soltero * 100) / $Total, 2) . '%)'; ?></td>
								</tr>
								<tr>
									<td>2</td>
									<td>Casado(a)</td>
									<td COLSPAN=2><?php echo $casado . ' (' . round(($casado * 100) / $Total, 2) . '%)'; ?></td>
								</tr>
								<tr>
									<td>3</td>
									<td>Divorciado(a)</td>
									<td COLSPAN=2><?php echo $divorciado . ' (' . round(($divorciado * 100) / $Total, 2) . '%)'; ?></td>
								</tr>
								<tr>
									<td>4</td>
									<td>Viudo(a)</td>
									<td COLSPAN=2><?php echo $viudo . ' (' . round(($viudo * 100) / $Total, 2) . '%)'; ?></td>
								</tr>
								<tr>
									<td>5</td>
									<td>Unión Libre</td>
									<td COLSPAN=2><?php echo $union_Libre . ' (' . round(($union_Libre * 100) / $Total, 2) . '%)'; ?></td>
								</tr>
								<?php

								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4>Vendidos</h4>
						</div>
						<div class="card-body">
							<div id="chart-visitors-profile"></div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Ventas por Mes</h4>
						</div>
						<div class="card-body">
							<canvas id="line"></canvas>
						</div>
					</div>
				</div> -->

	</div>
	</section>

</div>
<?php
include('includes/templates/created.php');
?>
</div>

</div>


</script>



<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>'

<script src="assets/vendors/chartjs/Chart.min.js"></script>
<script src="assets/js/pages/ui-chartjs.js"></script>

<script>
	var ctxBar = document.getElementById("bar").getContext("2d");

	var myBar = new Chart(ctxBar, {
		// type: 'horizontalBar',
		type: 'bar',
		data: {

			labels: [
				<?php foreach ($data as $d) : ?> "<?php echo $d->edades ?>",
				<?php endforeach; ?>
			],
			datasets: [{
				label: 'Clientes %',
				backgroundColor: [chartColors.blue, chartColors.info, chartColors.blue, chartColors.info, chartColors.blue, chartColors.info],
				data: [
					<?php foreach ($data as $d) : ?>
						<?php echo round($d->cantidad, 2) ?>,
						// <?php echo round(($d->cantidad * 100) / $totalclientes, 2) ?>,
					<?php endforeach; ?>
				]
			}]
		},
		options: {
			responsive: true,
			barRoundness: 1,
			title: {
				display: true,
				text: "Edad de Clientes <?php echo date('Y'); ?>"
			},
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						suggestedMax: 40 + 20,
						padding: 10,
					},
					gridLines: {
						drawBorder: false,
					}
				}],
				xAxes: [{
					gridLines: {
						display: false,
						drawBorder: false
					}
				}]
			}
		}
	});
</script>






<script>
	var oilCanvas = document.getElementById("oilChart");

	Chart.defaults.global.defaultFontFamily = "Lato";
	Chart.defaults.global.defaultFontSize = 18;

	var oilData = {
		labels: [
			"Masculino (%)",
			"Femenino (%)",
		],
		datasets: [{
			data: [
				<?php foreach ($genero as $generos) : ?>
					<?php echo round(($generos->Masculino * 100) / $totalgenero, 2) ?>,
					<?php echo round(($generos->Femenino * 100) / $totalgenero, 2) ?>,
				<?php endforeach; ?>
			],
			backgroundColor: [
				"#6384FF",
				"#FF6384"
			]
		}]
	};

	var pieChart = new Chart(oilCanvas, {
		type: 'pie',
		data: oilData
	});
</script>
<script>
	// Simple Datatable
	let table1 = document.querySelector('#table1');
	let dataTable = new simpleDatatables.DataTable(table1);
</script>
<script>
	// Simple Datatable
	let table2 = document.querySelector('#table2');
	let dataTable = new simpleDatatables.DataTable(table2);
</script>
<script>
	// Simple Datatable
	let table3 = document.querySelector('#table3');
	let dataTable = new simpleDatatables.DataTable(table3);
</script>
<?php
include('includes/templates/footer.php');
?>
<script src="assets/js/main.js"></script>
</body>

</html>