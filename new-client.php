<?php
// session_start();
include 'includes/sesiones.php';
include 'includes/funciones.php';
include 'includes/conexion.php';
include 'includes/templates/header.php';
?>

<body>
	<div id="app">
		<?php
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
							<h3>Clientes</h3>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Facturación</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<section class="section">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Crear Cliente/Prospecto</h5>
						</div>
						<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cliente</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Información Laboral</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="conyugue-tab" data-bs-toggle="tab" href="#conyugue" role="tab" aria-controls="conyugue" aria-selected="false">Conyugue</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="beneficiario-tab" data-bs-toggle="tab" href="#beneficiario" role="tab" aria-controls="beneficiario" aria-selected="false">Beneficiario</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="financiera-tab" data-bs-toggle="tab" href="#financiera" role="tab" aria-controls="financiera" aria-selected="false">Financiera</a>
								</li>
							</ul>
							<form class="form">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">First Name</label>
																<input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Last Name</label>
																<input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">City</label>
																<input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Country</label>
																<input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Company</label>
																<input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Email</label>
																<input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">First Name</label>
																<input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Last Name</label>
																<input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">City</label>
																<input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Country</label>
																<input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Company</label>
																<input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Email</label>
																<input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="conyugue" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">First Name</label>
																<input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Last Name</label>
																<input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">City</label>
																<input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Country</label>
																<input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Company</label>
																<input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Email</label>
																<input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="beneficiario" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">First Name</label>
																<input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Last Name</label>
																<input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">City</label>
																<input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Country</label>
																<input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Company</label>
																<input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Email</label>
																<input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="financiera" role="tabpanel" aria-labelledby="contact-tab">
										<div class="card">
											<div class="card-content">
												<div class="card-body">
													<div class="row">
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="first-name-column">First Name</label>
																<input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="last-name-column">Last Name</label>
																<input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="city-column">City</label>
																<input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="country-floating">Country</label>
																<input type="text" id="country-floating" class="form-control" name="country-floating" placeholder="Country">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="company-column">Company</label>
																<input type="text" id="company-column" class="form-control" name="company-column" placeholder="Company">
															</div>
														</div>
														<div class="col-md-6 col-12">
															<div class="form-group">
																<label for="email-id-column">Email</label>
																<input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12 d-flex justify-content-end">
										<button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
										<a href="clientes.php">
											<div class="btn btn-light-secondary me-1 mb-1">Regresar</div>
										</a>
									</div>
								</div>
							</form>
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