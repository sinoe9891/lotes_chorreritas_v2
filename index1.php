<?php
// session_start();
include 'includes/sesiones.php';
?>
<div class="contenedor">
	<div class="contenedor-index">
		<div class="contenedor-home">
			<div class="content-home">
				<div class="content-home1">
					<div class="row">
						<a href="mapa.php?lote=1">
							<div class="caja-nuevo">
								<div class="img">
									<img src="images/icons/buscar.svg" alt="">
									<h3> Mapa <br>Lote</h3>
								</div>
							</div>
						</a>
						<a href="ver-fichas.php?mesSolicitud=13">
							<div class="caja-importar">
								<div class="img">
									<img src="images/icons/solicitudes.svg" alt="">
									<?php
									$solicitudes = obtenerFichas('id');
									if ($solicitudes->num_rows > 0) {
										echo '<h3><span id="noti-solicitud">' . $solicitudes->num_rows . '</span> Registros<br>de Clientes</h3>';
									} else {
										// no hay tareas
										echo '<h3>Registros<br>de Clientes</h3>';
									}
									?>
								</div>
							</div>
						</a>
						
						<!-- <?php
							$mes = date("m");
							echo '<a href="solicitudes.php?mesSolicitud=13">';
						?>
							<div class="caja-solicitudes">
								<div class="img">
									<img src="images/icons/solicitudes.svg" alt="">
									<?php
									$solicitudes = obtenerNumeroSolicitudes('id_temp');
									if ($solicitudes->num_rows > 0) {
										echo '<h3><span id="noti-solicitud">' . $solicitudes->num_rows . '</span> Edición de<br>Usuario</h3>';
									} else {
										// no hay tareas
										echo '<h3>Edición de<br> Usuario</h3>';
									}
									?>
								</div>
							</div>
						</a> -->
						<a href="ver-lotes.php">
							<div class="caja-solicitudes" style="background-color:#9b59b6;">
								<div class="img">
									<img src="images/icons/editar.svg" alt="">
									<h3>Ver <br> Lista de Lotes</h3>
								</div>
							</div>
						</a>
						<a href="editar-perfil.php">
							<div class="caja-solicitudes">
								<div class="img">
									<img src="images/icons/editar.svg" alt="">
									<h3>Editar <br>Registro Cliente</h3>
								</div>
							</div>
						</a>
						 <a href="editar-lote.php">
							<div class="caja-editar">
								<div class="img">
									<img src="images/icons/editar.svg" alt="">
									<h3>Editar <br>Estado de Lote</h3>
								</div>
							</div>
						</a> 
						<a href="contrato.php">
							<div class="caja-usuario">
								<div class="img">
									<img src="images/icons/buscar.svg" alt="">
									<h3>Generar <br>Contrato</h3>
								</div>
							</div>
						</a>
						<!-- <a href="exportar.php">
							<div class="caja-usuario">
								<div class="img">
									<img src="images/icons/exportar.svg" alt="">
									<h3>Exportar <br>Clase</h3>
								</div>
							</div>
						</a>
						<a href="exportar.php">
							<div class="caja-buscar">
								<div class="img">
									<img src="images/icons/importar.svg" alt="">
									<h3>Importar <br>Nueva Clase</h3>
								</div>
							</div>
						</a>
						<a href="crear-registro.php">
							<div class="caja-solicitudes">
								<div class="img">
									<img src="images/icons/new-data.svg" alt="">
									<h3>Crear<br>Registro</h3>
								</div>
							</div>
						</a> -->
						<a href="precontrato.php">
							<div class="caja-buscar">
								<div class="img">
									<img src="images/icons/buscar.svg" alt="">
									<h3>Formulario<br>Cliente</h3>
								</div>
							</div>
						</a>
						<a href="register.php">
							<div class="caja-nuevo">
								<div class="img">
									<img src="images/icons/new-user.svg" alt="">
									<h3>Crear <br>Usuario</h3>
								</div>
							</div>
						</a>
						<!-- <a href="metricas.php">
							<div class="caja-editar">
								<div class="img">
									<img src="images/icons/metricas.svg" alt="">
									<h3>Métricas de<br>Actualización</h3>
								</div>
							</div>
						</a>
						<a href="ver-notas-duelo.php?anoFallecido=<?php echo date('Y'); ?>">
							<div class="caja-importar">
								<div class="img">
									<img src="images/icons/buscar.svg" alt="">
									<h3>Ver <br>Notas de Duelo</h3>
								</div>
							</div>
						</a> -->
					</div>
					<div class="row">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include 'includes/templates/footer.php';
?>