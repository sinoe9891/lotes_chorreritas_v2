<?php
//die(json_encode($_POST));
$accion = $_POST['accion'];

//Código para crear administradores
if ($accion === 'newUsuario') {
	$password = $_POST['password'];
	$name = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['correo'];
	$role = $_POST['role'];
	$estado = $_POST['estado'];
	//Hashear Password
	$opciones = array(
		'cost' => 12
	);

	//Necesitamos 3 paramentros, Contraseña, algoritmo de encriptación, opciones(arreglo)
	$hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
	//Importar la conexión
	include '../conexion.php';
	include '../funciones.php';
	$primerNombre = explode(" ", $name);
	$primerApellido = explode(" ", $apellido);
	// var_dump($primerNombre);
	$nombre = substr($primerNombre[0], 0, 1);
	$nickname = $nombre . $primerApellido[0];
	$nombre = quitar_acentos($nickname);
	$nickname = strtolower($nombre);
	// echo '@' . $nickname;
	$bandera = false;
	$obtenerUsuarios = obtenerTodo('main_users');
	while ($row = $obtenerUsuarios->fetch_assoc()) {
		$username = $row['nickname'];
		$email_user = $row['email_user'];
		if (strcmp($nickname, $username) === 0) {
			$rand = range(1, 13);
			shuffle($rand);
			foreach ($rand as $val) {
				$alea = $val;
			}
			$nombre = substr($primerNombre[0], 0, 1);
			$nickname = $nombre . $primerApellido[0].$alea;
			$nombre = quitar_acentos($nickname);
			$nickname = strtolower($nombre);
		}

		if ($email === $email_user) {
			$bandera = true;
		}
	}

	//Si el usuario existe verificar el password

	// echo 'No Existe';
	try {
		if ($bandera) {
			$respuesta = array(
				'respuesta' => 'error',
				'tipo' => 'existecorreo'
			);
		} else {
			//Realizar la consulta a la base de datos
			$stmt = $conn->prepare("INSERT INTO main_users (usuario_name, apellidos, nickname, email_user, password, role_user, estado_user) VALUES (?, ?, ?, ?, ?, ?, ?) ");
			$stmt->bind_param('sssssss', $name, $apellido, $nickname, $email, $hash_password, $role, $estado);
			$stmt->execute();
			if ($stmt->affected_rows > 0) {
				$respuesta = array(
					'respuesta' => 'correcto',
					'id_insertado' => $stmt->insert_id,
					'tipo' => $accion,
					'password' => $hash_password,
					'name' => $name,
					'nickname' => $nickname,
					'email' => $email,
					'role' => $role,
					'estado' => $estado
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error',
					'tipo' => $accion,
					'password' => $hash_password,
					'name' => $name,
					'nickname' => $nickname,
					'email' => $email,
					'role' => $role,
					'estado' => $estado
				);
			}
			$stmt->close();
			$conn->close();
		}
	} catch (Exception $e) {
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage()
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}

//Código para login de administradores
if ($accion === 'login') {
	$password = $_POST['password'];
	$name = $_POST['nombre'];
	$email = $_POST['correo'];
	include '../conexion.php';
	$password = $_POST['password'];
	try {
		//Seleccionaremos al administrador de la base de datos
		$stmt = $conn->prepare('SELECT email_user, id, usuario_name, apellidos, nickname, role_user, estado_user, password FROM main_users WHERE email_user = ?');
		$stmt->bind_param('s', $email);
		$stmt->execute();
		//Loguear el usuario
		$stmt->bind_result($email_user, $id_user, $usuario_name, $apellidos, $username, $role_user, $estado, $password_user);
		$stmt->fetch();
		if ($email_user) {
			//Si el usuario existe verificar el password
			if (password_verify($password, $password_user) && $estado == 'a') {
				//Iniciar la Sesión
				session_start();
				$_SESSION['correo'] = $email;
				$_SESSION['id'] = $id_user;
				$_SESSION['nombre_usuario'] = $usuario_name;
				$_SESSION['apellidos'] = $apellidos;
				$_SESSION['username'] = $username;
				$_SESSION['role_user'] = $role_user;
				$_SESSION['login'] = true;
				//Login Correcto
				$respuesta = array(
					'respuesta' => 'correcto',
					'nombre' => $email_user,
					'apellidos' => $apellidos,
					'username' => $username,
					'tipo' => $accion,
					'role' => $role_user,
					'id' => $id_user,
					'pass' => $password_user,
					'pass1' => $password,
					//Ver en consola si el usuario existe o no
					'columnas' => $stmt->affected_rows
				);
			} elseif (password_verify($password, $password_user) && $estado == 'd') {
				$respuesta = array(
					'respuesta' => 'des'
				);
			} else {
				//Login Incorrecto, enviar error
				$respuesta = array(
					'respuesta' => 'Password Incorrecto',
					'nombre' => $email_user,
					'username' => $username,
					'tipo' => $accion,
					'id' => $id_user,
					'pass' => $password_user,
					'pass1' => $password,
					//Ver en consola si el usuario existe o no
					'columnas' => $stmt->affected_rows,
				);
			};
		} else {
			$respuesta = array(
				'error' => 'Usuario no existe!'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		//En caso de un error, tomar la exepción
		$respuesta = array(
			//Arreglo asociativo
			'pass' => $e->getMessage()
			// 'pass' => $hash_password
		);
	}
	echo json_encode($respuesta);
}
