<body onload="minimizar();cargarReloj()">
	<div id="app">
		<div id="sidebar" class="active">
			<div class="sidebar-wrapper active">
				<div class="sidebar-header">
					<div class="d-flex justify-content-between">
						<div class="logo">
							<a href="index.php"><img src="assets/images/logo/logo.svg" alt="Logo" srcset=""></a>
						</div>
						<div class="toggler">
							<a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
						</div>
					</div>
				</div>
				<?php
				$aqui = '';
				if (obtenerPaginaActual() == 'clientes' || obtenerPaginaActual() == 'edit-cliente' || obtenerPaginaActual() == 'new-client') {
					$clientes = 'active';
				} else {
					$clientes = '';
				}

				if (obtenerPaginaActual() != 'mapa') {
					$mapa = '';
				} else {
					$mapa = 'active';
				}

				if (obtenerPaginaActual() != 'index') {
					$aqui = '';
				} else {
					$aqui = 'active';
				}
				if (obtenerPaginaActual() === 'bloques' || obtenerPaginaActual() === 'edit-bloque' || obtenerPaginaActual() === 'new-bloque') {
					$bloque = 'active';
				} else {
					$bloque = '';
				}
				if (obtenerPaginaActual() === 'lotes' || obtenerPaginaActual() === 'edit-lote' || obtenerPaginaActual() === 'new-lote') {
					$lotes = 'active';
				} else {
					$lotes = '';
				}
				if (obtenerPaginaActual() == 'ventas' || obtenerPaginaActual() == 'edit-venta' || obtenerPaginaActual() == 'new-venta') {
					$ventas = 'active';
				} else {
					$ventas = '';
				}
				if (obtenerPaginaActual() == 'ventas' || obtenerPaginaActual() == 'edit-venta' || obtenerPaginaActual() == 'new-venta') {
					$soporte = 'active';
				} else {
					$soporte = '';
				}
				if (obtenerPaginaActual() == 'creditos' || obtenerPaginaActual() == 'cobro_cuota' || obtenerPaginaActual() == 'cronograma') {
					$creditos = 'active';
				} else {
					$creditos = '';
				}
				if (obtenerPaginaActual() == 'cobros' || obtenerPaginaActual() == 'new-cobro') {
					$cobros = 'active';
				} else {
					$cobros = '';
				}
				if (obtenerPaginaActual() == 'usuarios' || obtenerPaginaActual() == 'new-usuario' || obtenerPaginaActual() == 'edit-usuario') {
					$usuarios = 'active';
				} else {
					$usuarios = '';
				}
				if (obtenerPaginaActual() == 'facturacion' || obtenerPaginaActual() == 'new-facturacion' || obtenerPaginaActual() == 'edit-cai') {
					$facturacion = 'active';
				} else {
					$facturacion = '';
				}
				if (obtenerPaginaActual() == 'facturas' || obtenerPaginaActual() == 'new-facturas' || obtenerPaginaActual() == 'edit-facturas') {
					$facturas = 'active';
				} else {
					$facturas = '';
				}
				if (obtenerPaginaActual() == 'reportes') {
					$reportes = 'active';
				} else {
					$reportes = '';
				}

				// condición de usuarios
				$hidden = '';
				$role = $_SESSION["role_user"];
				if ($role == 1) {
					$bandera = true;
				} else if ($role == 2) {
					$bandera = false;
				} else if ($role == 3) {
					$bandera = false;
				} else if ($role == 4) {
					$bandera = false;
				}

				?>
				<div class="sidebar-menu">
					<ul class="menu">
						<li class="sidebar-title">Menú</li>

						<li class="sidebar-item  <?php echo $aqui; ?>">
							<a href="index.php" class='sidebar-link'>
								<i class="bi bi-grid-fill"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<?php
						if ($role == 1 || $role == 3 || $role == 2) {
						?>
							<li class="sidebar-item has-sub <?php echo $mapa; ?>">
								<a href="#" class='sidebar-link'>
									<i class="bi bi-geo-alt"></i>
									<span>Mapa</span>
								</a>
								<ul class="submenu <?php echo $mapa; ?>">
									<li class="submenu-item <?php echo $mapa ?>">
										<a href="mapa.php?lote=1">Lotes</a>
									</li>
								</ul>
							</li>
						<?php
						};


						if ($role == 1 || $role == 2 || $role == 4) {
						?>
							<li class="sidebar-item  has-sub <?php echo $clientes . $ventas . $cobros . $creditos ?>">
								<a href="#" class='sidebar-link'>
									<i class="bi bi-person-lines-fill"></i>
									<span>Control Clientes</span>
								</a>
								<ul class="submenu <?php echo $clientes . $ventas . $creditos . $cobros ?>">
									<li class="submenu-item <?php echo $clientes ?>">
										<a href="clientes.php">Clientes</a>
									</li>
									<li class="submenu-item <?php echo $ventas ?> ">
										<a href="ventas.php">Contratos</a>
									</li>
									<li class="submenu-item <?php echo $creditos ?>">
										<a href="creditos.php">Créditos</a>
									</li>
									<li class="submenu-item <?php echo $cobros ?>">
										<a href="cobros.php">Cobros</a>
									</li>
									<li class="submenu-item ">
										<a href="#">Cotizaciones</a>
									</li>
									<li class="submenu-item ">
										<a href="#">Reservas</a>
									</li>
								</ul>
							</li>
						<?php
						};
						if ($role == 1 || $role == 2) {
						?>
							<li class="sidebar-item  has-sub <?php echo $bloque . $lotes ?>">
								<a href="#" class='sidebar-link'>
									<i class="bi bi-bricks"></i>
									<span>Logística</span>
								</a>
								<ul class="submenu <?php echo $bloque . $lotes ?>">
									<li class="submenu-item <?php echo $bloque ?>">
										<a href="bloques.php">Bloques</a>
									</li>
									<li class="submenu-item <?php echo $lotes ?>">
										<a href="lotes.php">Lotes</a>
									</li>
								</ul>
							</li>
						<?php
						};
						if ($role == 1 || $role == 2 || $role == 4) {
						?>
							<li class="sidebar-item  has-sub <?php echo $facturas ?>">
								<a href="#" class='sidebar-link'>
									<i class="bi bi-receipt"></i>
									<span>Facturación</span>
								</a>
								<ul class="submenu <?php echo $facturas ?>">
									<li class="submenu-item <?php echo $facturas ?>">
										<a href="facturas.php">Facturas Emitidas</a>
									</li>
								</ul>
							</li>
							<li class="sidebar-item  has-sub <?php echo $reportes ?>">
								<a href="#" class='sidebar-link'>
								<i class="bi bi-pie-chart-fill"></i>
									<span style="color:red">Reportería</span>
									<i class="bi bi-cone-striped"></i>
								</a>
								<ul class="submenu <?php echo $reportes ?>">
									<li class="submenu-item <?php echo $reportes ?>">
										<a href="#">Ventas</a>
									</li>
									<li class="submenu-item <?php echo $reportes ?>">
										<a href="#">Financiero</a>
									</li>
									<li class="submenu-item <?php echo $reportes ?>">
										<a href="#">Cuentas por Cobrar</a>
									</li>
									<li class="submenu-item <?php echo $reportes ?>">
										<a href="analytics-clientes.php">Clientes</a>
									</li>
									<li class="submenu-item <?php echo $reportes ?>">
										<a href="#">Facturas</a>
									</li>
								</ul>
							</li>

						<?php
						};
						?>

						<?php
						if ($bandera) {
						?>
							<li class="sidebar-item  has-sub <?php echo $facturacion . $usuarios  ?>">
								<a href="#" class='sidebar-link'>
									<i class="bi bi-life-preserver"></i>
									<span>Configuración</span>
								</a>
								<ul class="submenu <?php echo $facturacion . $usuarios ?>">
									<li class="submenu-item <?php echo $facturacion ?>">
										<a href="facturacion.php">Facturación</a>
									</li>
									<li class="submenu-item <?php echo $usuarios ?>">
										<a href="usuarios.php">Usuarios</a>
									</li>
									<li class="submenu-item">
										<a href="backup_database.php?pass=Stark9891">Backup DB</a>
									</li>
								</ul>
							</li>
						<?php
						}
						?>
						<li class="sidebar-item  ">
							<a href="login.php?cerrar_sesion=true" class='sidebar-link'>
								<img src="assets/images/icons/logout.svg" alt="">
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</div>
				<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
			</div>
		</div>