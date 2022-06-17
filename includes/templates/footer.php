    <script src="js/sweetalert2.all.min.js?v=<?php echo(rand()); ?>"></script>
    <a href="#0" class="cd-top js-cd-top">Top</a>
    <script src="js/back-to-top.js?v=<?php echo(rand()); ?>"></script>
<?php  
    $actual = obtenerPaginaActual();
    if ($actual === 'register' || $actual === 'login') {
        echo '<script src="js/formulario.js?v='.(rand()).'"></script>';
    }elseif ($actual === 'index' || $actual === 'mapa'|| $actual === 'analytics-clientes' || $actual === 'actualizar-graduado' || $actual === 'editar-bloque' || $actual === 'contrato' || $actual === 'exportar'  || $actual === 'ver-fichas') {
        echo '<script> console.log("No accede porque la ruta actual no corresponde");</script>';
        echo '<script src="js/validaciones.js?v="' . rand() . '"></script>';
		echo '<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js?v='.(rand()).'"></script>
		<script src="assets/js/bootstrap.bundle.min.js?v='.(rand()).'"></script>
		<script src="assets/vendors/apexcharts/apexcharts.js?v='.(rand()).'"></script>
		<script src="assets/js/pages/dashboard.js?v='.(rand()).'"></script>
		<script src="assets/js/main.js?v='.(rand()).'"></script>';
		echo '<script src="js/scripts.js?v='.(rand()).'"></script>';
    }else{
		echo '<script src="js/scripts.js?v='.(rand()).'"></script>';
	}
	if($actual === 'clientes' || $actual === 'bloques' || $actual === 'lotes' || $actual = 'ventas'){
		echo '<script src="js/validaciones.js?v='.(rand()).'"></script>';
	}
?> 
<!-- Fin Chorreritas -->