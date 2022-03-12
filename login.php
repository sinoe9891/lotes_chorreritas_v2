<?php
session_start();
include 'includes/funciones.php';
if (isset($_GET['cerrar_sesion'])) {
	$_SESSION = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Sefinco</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
	<div id="auth">

		<div class="row h-100">
			<div class="col-lg-5 col-12 nuevo-auth">
				<div id="auth-left">
					<div class="auth-logo">
						<a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"></a>
					</div>
					<h1 class="auth-subtitle">Bienvenido</h1>
					<form id="formulario" method="post">
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="hidden" name="nombre" id="nombre" placeholder="Nombre Completo">
							<input type="email" class="form-control form-control-xl" name="correo" id="correo" placeholder="Correo">
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="password" class="form-control form-control-xl" name="password" id="password" placeholder="Contraseña">
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>
						<div class="form-check form-check-lg d-flex align-items-end">
							<input class="form-check-input me-2" type="checkbox" value="" name="checkbox" id="checkbox">
							<label class="form-check-label text-gray-600" for="flexCheckDefault">
								Keep me logged in
							</label>
						</div>
						<input type="hidden" id="tipo" value="login">
						<input type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" value="Ingresar">
					</form>
					<!-- <div class="text-center mt-5 text-lg fs-4">
						<p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
								up</a>.</p>
						<p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
					</div> -->
				</div>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-right">
				</div>
			</div>
		</div>
	</div>
	<?php  
        include 'includes/templates/footer.php'; 
    ?>
</body>

</html>