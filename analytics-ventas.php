<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
include 'includes/templates/sidebar.php';
date_default_timezone_set('America/Tegucigalpa');

$consulta = $conn->query("SELECT MONTH(`fecha_venta`) Mes, count(`total_venta`) total_mes FROM ficha_compra GROUP BY Mes;");

$data = array(); // Array donde vamos a guardar los datos
while ($r = $consulta->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
	$data[] = $r; // Guardar los resultados en la variable $data
}
$total = 0;
foreach ($data as $d) :
	$total = $total + $d->total_mes;
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	echo $hola =  $meses[($d->Mes) - 1];
endforeach;



// Genero 
$consulta = $conn->query("select sum(case when estado like '%v%' then 1 else 0 end) as Vendido, sum(case when estado like '%d%' then 1 else 0 end) as Disponible, sum(case when estado like '%r%' then 1 else 0 end) as Reservado from `lotes` ORDER BY estado ASC;");


$lotes = array(); // Array donde vamos a guardar los datos
while ($r = $consulta->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
	$lotes[] = $r; // Guardar los resultados en la variable $lotes
};
foreach ($lotes as $lote) :
	$disponible = $lote->Disponible;
	$vendido = $lote->Vendido;
	$reservado = $lote->Reservado;
	$totalotes = $disponible + $vendido + $reservado;
endforeach;

echo $totalotes;





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
					<h3>Métricas Ventas</h3>
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
		<section class="section">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4>Total de Cuotas Pagadas</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-lg">
										<thead>
											<tr>
												<th>No.</th>
												<th>Total Pagado(L.)</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$consultacuotascobradas = $conn->query("select sum(case when `estado_factura` like '%emitida%' then 1 else 0 end) as Total from facturas ORDER BY estado_factura ASC;");
											$consultasumado = $conn->query("select sum(`monto_pagado`) as sumadopagado from facturas ORDER BY monto_pagado ASC;");
											while ($totalcuotas = $consultacuotascobradas->fetch_array()) {
												$totalcuot = $totalcuotas['Total'];
											}
											$numero1 = 1;
											$contador1 = 1;
											$total1 = 0;
											while ($sumacuotas = $consultasumado->fetch_array()) {
												$sumadopagado = $sumacuotas['sumadopagado'];
											?>
												<tr ?>
													<td style="font-weight: 800;"><?php echo $totalcuot . ' Cuotas Pagadas'; ?></td>
													<td style="font-weight: 800;"><?php echo 'L.' . number_format($sumadopagado, 2, '.', ',');; ?></td>
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
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4>Lotes (total <?php echo $totalotes; ?>)</h4>
						</div>
						<canvas id="oilChart"></canvas>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Ventas por mes</h4>
						</div>
						<div class="card-body">
							<canvas id="bar"></canvas>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h4>Total Ventas por Mes (L.)</h4>
						</div>
						<div class="card-content">
							<div class="card-body">
							<div class="table-responsive">
                                        <table class="table table-light mb-0">
										<thead>
											<tr>
												<th>No.</th>
												<th>Total Pagado(L.)</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$consultacuotascobradas = $conn->query("select sum(case when `estado_factura` like '%emitida%' then 1 else 0 end) as Total from facturas ORDER BY estado_factura ASC;");
											$consultasumado = $conn->query("SELECT MONTH(`fecha_venta`) Mes, SUM(`total_venta`) total_mes FROM ficha_compra GROUP BY Mes;");
											while ($totalcuotas = $consultacuotascobradas->fetch_array()) {
												$totalcuot = $totalcuotas['Total'];
											}
											$numero1 = 1;
											$contador1 = 1;
											$total1 = 0;
											$grantotal = 0;
											while ($sumacuotas = $consultasumado->fetch_array()) {
												$mesvent = $sumacuotas['Mes'];
												$mestotal = $sumacuotas['total_mes'];
												$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
												$ventames =  $meses[($mesvent) - 1];
											?>
												<tr ?>
													<td style="font-weight: 800;"><?php echo $ventames; ?></td>
													<!-- <td style="font-weight: 800;"><?php echo $totalcuot . ' Cuotas Pagadas'; ?></td> -->
													<td style="font-weight: 800;"><?php echo 'L.' . number_format($mestotal, 2, '.', ','); ?></td>
												</tr>
											<?php
											$grantotal += $mestotal;
											}
											?>
										</tbody>
										<thead>
											<tr>
												<th style="font-weight: 800;">Total</th>
												<th style="font-weight: 800;"><?php
													echo 'L.'. number_format($grantotal, 2, '.', ',');
												?></th>

											</tr>
										</thead>
									</table>
								</div>
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
				<?php foreach ($data as $d) : ?> "<?php
													$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
													echo $hola =  $meses[($d->Mes) - 1];

													?>",
				<?php endforeach; ?>
			],
			datasets: [{
				label: 'Clientes %',
				backgroundColor: [chartColors.blue, chartColors.info, chartColors.blue, chartColors.info, chartColors.blue, chartColors.info],
				data: [
					<?php foreach ($data as $d) : ?>
						<?php echo round(($d->total_mes * 100) / $total, 2) ?>,
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





<!-- Lotes -->
<script>
	var oilCanvas = document.getElementById("oilChart");

	Chart.defaults.global.defaultFontFamily = "Lato";
	Chart.defaults.global.defaultFontSize = 18;

	var oilData = {
		labels: [
			"Disponible (%)",
			"Vendido (%)",
			"Reservado (%)",
		],
		datasets: [{
			data: [
				<?php foreach ($lotes as $lote) : ?>
					<?php echo round(($lote->Disponible * 100) / $totalotes, 2) ?>,
					<?php echo round(($lote->Vendido * 100) / $totalotes, 2) ?>,
					<?php echo round(($lote->Reservado * 100) / $totalotes, 2) ?>,
				<?php endforeach; ?>
			],
			backgroundColor: [
				"#9b59b6",
				"#3498db",
				"#2ecc71"
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