    <script src="js/sweetalert2.all.min.js"></script>
    <a href="#0" class="cd-top js-cd-top">Top</a>
    <script src="js/back-to-top.js"></script>
<?php  
    $actual = obtenerPaginaActual();
    if ($actual === 'register' || $actual === 'login') {
        echo '<script src="js/formulario.js"></script>';
    }elseif ($actual === 'index' || $actual === 'mapa' || $actual === 'actualizar-graduado' || $actual === 'editar-bloque' || $actual === 'contrato' || $actual === 'birthday' || $actual === 'ver-notas-de-duelo' || $actual === 'exportar' || $actual === 'buscar-graduado' || $actual === 'graduandos' || $actual === 'graduandos-solicitudes' || $actual === 'ver-fichas') {
        echo '<script> console.log("No accede porque la ruta actual no corresponde");</script>';
        echo '<script src="js/validaciones.js"></script>';
		echo '<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/vendors/apexcharts/apexcharts.js"></script>
		<script src="assets/js/pages/dashboard.js"></script>
		<script src="assets/js/main.js"></script>';
    }else{
        echo '<script src="js/scripts.js"></script>';
    }
	if($actual === 'clientes'){
		echo '<script src="js/validaciones.js"></script>';
	}
?> 
<!-- Fin Chorreritas -->