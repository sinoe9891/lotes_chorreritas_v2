<?php
$accion = $_POST['accion'];
$estado = $_POST['estado'];
$id = $_POST['id'];
$nombretable = $_POST['nombretable'];
//codigo eliminar solicitud
if($accion === 'eliminar-bloque') {
    // importar la conexion
    include '../conexion.php';
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("DELETE FROM bloques WHERE id_bloque = ? ");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}

if($accion === 'eliminar-lote') {
    // importar la conexion
    include '../conexion.php';
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("DELETE FROM lotes WHERE id_lote = ? ");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}

if($accion === 'eliminar-venta') {
    // importar la conexion
    include '../conexion.php';
    try {
        // Realizar la consulta a la base de datos
        $stmt = $conn->prepare("DELETE FROM ficha_compra WHERE id = ?");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt = $conn->prepare("DELETE FROM ficha_compra_lotes WHERE id_compra = ?");
        $stmt->bind_param('s', $id);
        $stmt->execute();
        if($stmt->affected_rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch(Exception $e) {
        // En caso de un error, tomar la exepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    }
    
    echo json_encode($respuesta);
}
