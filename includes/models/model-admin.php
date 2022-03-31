<?php  
    //die(json_encode($_POST));
    $accion = $_POST['accion'];
    $password = $_POST['password'];
    $name = $_POST['nombre'];
    $email = $_POST['correo'];

    //Código para crear administradores
    // if ($accion === 'crear') {
    //     //Hashear Password
    //     $opciones = array(
    //         'cost' => 12
    //     );

    //     //Necesitamos 3 paramentros, Contraseña, algoritmo de encriptación, opciones(arreglo)
    //     $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
    //     //Importar la conexión
    //     include '../conexion.php';

    //     try {
    //         //Realizar la consulta a la base de datos
    //         $stmt = $conn->prepare("INSERT INTO main_users (usuario_name, email_user, password) VALUES (?, ?, ?) ");
    //         $stmt->bind_param('sss', $name, $email, $hash_password);
    //         $stmt->execute();
    //         if ($stmt->affected_rows > 0) {
    //             $respuesta = array(
    //                 'respuesta' => 'correcto',
    //                 'id_insertado' => $stmt->insert_id,
    //                 'tipo' => $accion
    //             );
    //         }else{
    //             $respuesta = array(
    //                 'respuesta' => 'error'
    //             );
    //         }
    //         $stmt->close();
    //         $conn->close();
    //     } catch (Exception $e) {
    //         //En caso de un error, tomar la exepción
    //         $respuesta = array(
    //             //Arreglo asociativo
    //             'pass' => $e->getMessage()
    //             // 'pass' => $hash_password
    //         );
    //     }
    //     echo json_encode($respuesta);
    // }
	// $password = '$2y$12$PFj2X7RTc8CX9lcaDPmrGOHRtSsGKVAnd8Oubqf9h99x8R4qsQWIq';
    //Código para login de administradores
    if ($accion === 'login') {
        
        include '../conexion.php';
		$password = $_POST['password'];
        try {
            //Seleccionaremos al administrador de la base de datos
            $stmt = $conn->prepare('SELECT email_user, id, usuario_name, password FROM main_users WHERE email_user = ?');
            $stmt->bind_param('s', $email);
            $stmt->execute();
            //Loguear el usuario
            $stmt->bind_result($email_user, $id_user, $usuario_name, $password_user);
            $stmt->fetch();
            if ($email_user) {
                //Si el usuario existe verificar el password
                if (password_verify($password, $password_user)) {
                    //Iniciar la Sesión
                    session_start();
                    $_SESSION['correo'] = $email;
                    $_SESSION['id'] = $id_user;
                    $_SESSION['nombre_usuario'] = $usuario_name;
                    $_SESSION['login'] = true;
                    //Login Correcto
                    $respuesta = array(
                        'respuesta' => 'correcto',
                        'nombre' => $email_user,
                        'tipo' => $accion,
                        'id' => $id_user,
                        'pass' => $password_user,
                        'pass1' => $password,
                        //Ver en consola si el usuario existe o no
                        'columnas' => $stmt->affected_rows
                    );
                }else{
                    //Login Incorrecto, enviar error
                    $respuesta = array(
                        'resultado' => 'Password Incorrecto',
						'nombre' => $email_user,
                        'tipo' => $accion,
                        'id' => $id_user,
                        'pass' => $password_user,
                        'pass1' => $password,
                        //Ver en consola si el usuario existe o no
                        'columnas' => $stmt->affected_rows,
                    );
                };
                
            } else{
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
