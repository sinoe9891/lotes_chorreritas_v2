<?php
date_default_timezone_set('America/Tegucigalpa');
//Obtener página actual remplazando .php por vacio.
function obtenerPaginaActual(){
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    return $pagina;
}

/* Obtener todos los perfiles de graduandos */
function obtenerNumeroClientes() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio ORDER BY id DESC");
    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}



function obtenerLotesDisponibles() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes WHERE estado = 'd'");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerLotesVendidos() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes WHERE estado = 'v'");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerLotesReservados() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes WHERE estado = 'r'");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerInfoFichaPerfil($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, conyugue b, financiera c, beneficiario d WHERE a.id = {$id} and b.id_registro = {$id} and c.id_registro = {$id} and d.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function sumaCuotas($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT SUM(numero_cuotas_pagadas) AS cuotas FROM cobros a, ficha_compra b WHERE b.id_contrato_compra = '{$id}'");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerInfoVenta($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_compra a, ficha_directorio c WHERE a.id_ficha_compra = {$id} and a.id_registro = c.id");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerInfoCAI($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM info_cai WHERE id_cai = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerInfoLoteComprado($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_compra_lotes a, lotes b WHERE a.id_compra = {$id} and a.id_lote = b.id_lote");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}


function obtenerListaLote() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}


function obtenerFichas() {
    include 'conexion.php';
    try {
		return $conn->query("SELECT * FROM ficha_directorio WHERE estado_registro = 0 ORDER BY id DESC");
    } catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerFacturas() {
    include 'conexion.php';
    try {
		return $conn->query("SELECT * FROM facturas WHERE estado_factura = 'disponible'");
    } catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerFichasCompra() {
    include 'conexion.php';
    try {
		return $conn->query("SELECT a.id_ficha_compra, b.id, b.nombre_completo, a.id_contrato_compra FROM ficha_compra a, ficha_directorio b WHERE b.id = a.id_registro and a.estado = 'en' ORDER BY b.nombre_completo DESC");
    } catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerEmpresa() {
    include 'conexion.php';
    try {
		return $conn->query("SELECT * FROM info_empresa ORDER BY nombre DESC");
    } catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
        return false;
    }
}
//Traer toda la información de bloque, lote y proyecto
function obtenerTodoProyecto() {
    include 'conexion.php';
    try {
		return $conn->query("SELECT * FROM bloques a, proyectos b, lotes c WHERE a.id_proyecto = b.id_proyecto and a.id_bloque = c.id_bloque ORDER BY a.bloque ASC");
    } catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
        return false;
    }
}

//Funcion traer todos los datos de la tabla
function obtenerInfoBloque($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM bloques WHERE id_bloque = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerTodo($tabla = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM {$tabla}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerProyecto($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM proyectos WHERE id_proyecto = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerUsuarios($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM main_users WHERE id = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerRoles() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM main_cargo");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerProy($id_proyecto)	{
	include '../conexion.php';
	try {
		return $conn->query("SELECT precio_vara2 FROM proyectos_ajustes WHERE id_proyecto = '$id_proyecto'");

	} catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
		return false;
	}
}

function obtenerTotalVarasContrato($idcontrato)	{
	include '../conexion.php';
	try {
		return $conn->query("SELECT SUM(areav2) as suma FROM lotes a, ficha_compra c WHERE c.id_contrato_compra = a.id_contrato and a.id_contrato = '$idcontrato' ORDER BY a.id_contrato DESC");

	} catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
		return false;
	}
}

function obtenerPrecioLote($id_lote)	{
	include '../conexion.php';
	try {
		return $conn->query("SELECT areav2 FROM lotes WHERE id_lote = '$id_lote'");

	} catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
		return false;
	}
}

function obtenerTodoBloque() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT DISTINCT concat_ws('', b.bloque, a.numero) AS bloqueresult, a.id_lote, a.numero, a.areav2, a.estado, b.bloque, b.id_bloque, c.precio_vara2, b.id_proyecto FROM lotes a, bloques b, proyectos_ajustes c WHERE a.id_bloque = b.id_bloque and a.estado = 'd'");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}








/* Obtener todos las solicitudes de actualización */
function obtenerInfoLote($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes WHERE id_lote = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener todos las solicitudes de actualización */
function obtenerInfoLoteCliente($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM lotes WHERE id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerInfoLotesCliente($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT a.numero, a.bloque FROM lotes a, ficha_compra b WHERE a.id_registro = b.id_registro and b.id_ficha_compra = {$id} AND b.id_contrato_compra = a.id_contrato");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}





function back(){
    // header('Location:'.$_SERVER['HTTP_REFERER']);
	$back = basename($_SERVER['HTTP_REFERER']);
    $pagina = str_replace(".php", "", $back);
    return $pagina;
}
function anoActual(){
    $year = date("Y");
    echo $year;
}
//quitar acentos
function quitar_acentos($cadena){
	$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
	$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
	$cadena = utf8_decode($cadena);
	$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
	return utf8_encode($cadena);
}

/* Obtener todos las solicitudes */
function obtenerSolicitudes() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT id_temp, fecha_solicitud, hora_solicitud, estado, clase, nombres, apellidos FROM temporal_update_210618 ORDER BY fecha_solicitud DESC");
    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

/* Obtener todos las solicitudes */
function obtenerNumeroSolicitudes() {
	include 'conexion.php';
    try {
		return $conn->query("SELECT * FROM ficha_directorio WHERE estado_registro = 0 ORDER BY id DESC");
    } catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener todos las solicitudes Graduandos*/
function obtenerSolicitudesGraduandos() {
	include 'conexion.php';
	try {
		return $conn->query("SELECT id_temp, fecha_solicitud, hora_solicitud, estado, clase, nombres, apellidos FROM temporal_graduandos ORDER BY fecha_solicitud DESC");
	} catch(Exception $e) {
		echo "Error! : " . $e->getMessage();
		return false;
	}
}
/* Obtener todos los perfiles de graduandos */
function obtenerNumeroGraduandos() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM temporal_graduandos WHERE estado = 0 ORDER BY id_temp DESC");
    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}


function obtenerGraduandosFaltantes() {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM graduates.graduandos t1 WHERE NOT EXISTS (SELECT NULL FROM graduates.temporal_graduandos t2 WHERE t2.nombres = t1.nombres) order by t1.mes_graduacion");
    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}



/* Obtener todos las solicitudes de actualización */
function obtenerInfoSolicitud($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio WHERE id = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

function obtenerRerferencias($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, referencias b WHERE a.id = {$id} and b.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerFinanciera($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, financiera b WHERE a.id = {$id} and b.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
function obtenerBeneficiario($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio a, beneficiario b WHERE a.id = {$id} and b.id_registro = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener todos las solicitudes de actualización */
function obtenerInfoSolicitudGraduando($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM temporal_graduandos WHERE id_temp = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener toda la información actual de GRADUANDOSy compararla*/
function obtenerInfoGraduandosActual($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM graduandos WHERE ID = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}
/* Obtener toda la información actual y compararla*/
function obtenerInfoGraduadoActual($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM ficha_directorio WHERE id = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}

/* Obtener información de graduandos */
function obtenerInfoGraduandos($id = null) {
    include 'conexion.php';
    try {
        return $conn->query("SELECT * FROM graduandos WHERE ID = {$id}");

    } catch(Exception $e) {
        echo "Error! : " . $e->getMessage();
        return false;
    }
}