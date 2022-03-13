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
		}else{
			$clientes = '';
		}
		
		if (obtenerPaginaActual() != 'mapa') {
			$mapa = '';
		}else{
			$mapa = 'active';
		}
		
		if (obtenerPaginaActual() != 'index') {
			$aqui = '';
		}else{
			$aqui = 'active';
		}
		if (obtenerPaginaActual() === 'bloques' || obtenerPaginaActual() === 'edit-bloque' || obtenerPaginaActual() === 'new-bloque') {
			$bloque = 'active';
		}else{
			$bloque = '';
		}
		if (obtenerPaginaActual() === 'lotes' || obtenerPaginaActual() === 'edit-lote' || obtenerPaginaActual() === 'new-lote') {
			$lotes = 'active';
		}else{
			$lotes = '';
		}
		if (obtenerPaginaActual() == 'ventas' || obtenerPaginaActual() == 'edit-venta' || obtenerPaginaActual() == 'new-venta') {
			$ventas = 'active';
		}else{
			$ventas = '';
		}
		?>
		<div class="sidebar-menu">
			<ul class="menu">
				<li class="sidebar-title">Menu</li>

				<li class="sidebar-item  <?php echo $aqui; ?>">
					<a href="index.php" class='sidebar-link'>
						<i class="bi bi-grid-fill"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="sidebar-item has-sub <?php echo $mapa; ?>">
					<a href="#" class='sidebar-link'>
						<i class="bi bi-map-fill"></i>
						<span>Mapa</span>
					</a>
					<ul class="submenu <?php echo $mapa; ?>">
						<li class="submenu-item <?php echo $mapa ?>">
							<a href="mapa.php?lote=1">Lotes</a>
						</li>
					</ul>
				</li>
				<li class="sidebar-item  has-sub <?php echo $clientes.$ventas?>">
					<a href="#" class='sidebar-link'>
					<i class="fa fa-table"></i>
						<span>Facturación</span>
					</a>
					<ul class="submenu <?php echo $clientes.$ventas ?>">
						<li class="submenu-item <?php echo $clientes ?>">
							<a href="clientes.php">Clientes</a>
						</li>
						<li class="submenu-item <?php echo $ventas ?> ">
							<a href="ventas.php">Ventas</a>
						</li>
						<li class="submenu-item ">
							<a href="#">Créditos</a>
						</li>
						<li class="submenu-item ">
							<a href="#">Cobros</a>
						</li>
						<li class="submenu-item ">
							<a href="#">Cotizaciones</a>
						</li>
						<li class="submenu-item ">
							<a href="#">Reservas</a>
						</li>
					</ul>
				</li>
				<li class="sidebar-item  has-sub <?php echo $bloque.$lotes ?>">
					<a href="#" class='sidebar-link'>
						<i class="bi bi-stack"></i>
						<span>Logística</span>
					</a>
					<ul class="submenu <?php echo $bloque.$lotes ?>">
						<li class="submenu-item <?php echo $bloque ?>">
							<a href="bloques.php">Bloques</a>
						</li>
						<li class="submenu-item <?php echo $lotes ?>">
							<a href="lotes.php">Lotes</a>
						</li>
					</ul>
				</li>
				<li class="sidebar-item  ">
					<a href="login.php?cerrar_sesion=true" class='sidebar-link'>
						<img src="assets/images/icons/logout.svg" alt="">
						<span>Logout</span>
					</a>
				</li>

				<li class="sidebar-title">Soporte</li>

				<li class="sidebar-item  ">
					<a href="#" class='sidebar-link'>
						<i class="bi bi-life-preserver"></i>
						<span>Documentation</span>
					</a>
				</li>
			</ul>
		</div>
		<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
	</div>
</div>