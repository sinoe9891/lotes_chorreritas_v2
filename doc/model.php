<?php
/* Obtener todos las solicitudes de actualización */
function getAll($id = null) {
    include '../includes/conexion.php'; 
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, beneficiario b, lotes c WHERE a.id = {$id} and b.id_registro = {$id} and c.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function getCobro($id = null) {
    include '../includes/conexion.php'; 
    try {
        return $conn->query("SELECT * FROM cobros a, ficha_compra b, ficha_directorio c WHERE id_cobro = {$id} and a.id_contrato = b.id_ficha_compra and b.id_registro = c.id;");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function lotes($id = null) {
    include '../includes/conexion.php'; 
    try {
        return $conn->query("SELECT * FROM lotes WHERE id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}