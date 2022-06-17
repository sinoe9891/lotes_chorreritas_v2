<?php
include '../includes/conexion.php';
$consulta = $conn->query("SELECT IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 24, '0-24', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 34, '25-34', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 44, '35-44', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 54, '45-54', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 64, '55-64', IF(TIMESTAMPDIFF(YEAR, `fecha_nacimiento`, CURDATE())<= 65, '65+', '65+') ) ) ) ) ) edades, COUNT(*) cantidad FROM `ficha_directorio` GROUP BY edades ORDER BY `edades` ASC");

$data = array(); // Array donde vamos a guardar los datos
while ($r = $consulta->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
	$data[] = $r; // Guardar los resultados en la variable $data
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafica de Barra y Lineas con PHP y MySQL</title>
    <script src="chart.min.js"></script>
</head>
<body>
<h1>Grafica de Barra y Lineas con PHP y MySQL</h1>
<canvas id="chart1" style="width:100%;" height="100"></canvas>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [ 
        <?php foreach($data as $d):?>
        "<?php echo $d->edades?>", 
        <?php endforeach; ?>
        ],
        datasets: [{
            label: '$ Ventas',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->cantidad;?>, 
        <?php endforeach; ?>
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>
</body>
</html>