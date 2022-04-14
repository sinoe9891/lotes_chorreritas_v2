<?php
date_default_timezone_set('America/Tegucigalpa');

require_once __DIR__ . '/vendor/autoload.php';
require_once 'model.php';
require_once 'convertidor/convertidor.php';
require_once 'convertidor/convertidor_fecha.php';
$modelonumero = new modelonumero();
$modelofecha = new modelofecha();
$stylesheet = file_get_contents('css/style-contrato.css');

if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
	$solicitudes = getAll($user_id);
	if ($solicitudes->num_rows > 0) {
		while ($row = $solicitudes->fetch_assoc()) {
			setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
			$id = $row['ID'];
			$sexo = $row['genero'];
			if ($sexo == 'M') {
				$a = 'o';
			} else {
				$a = 'a';
			}
			$nombre = $row['nombre_completo'];
			// $identidad = $row['identidad'];
			// $gender = $row['genero'];
			// if ($gender == 'M') {
			// 	$gender = "al señor";
			// 	$tipo = "o";
			// }elseif($gender == 'F'){
			// 	$gender = "a la señora";
			// 	$tipo = "a";
			// }

			// $estado_civil = $row['estado_civil'];
			// $nacionalidad = $row['nacionalidad'];
			// if ($estado_civil == '1') {
			// 	echo $estado_civil = 'solter'.$tipo;
			// } elseif ($estado_civil == '2') {
			// 	echo $estado_civil = 'casad'.$tipo;
			// } elseif ($estado_civil == '3') {
			// 	echo $estado_civil = 'divorciad'.$tipo;
			// } elseif ($estado_civil == '4') {
			// 	echo $estado_civil = 'viud'.$tipo;
			// } elseif ($estado_civil == '5') {
			// 	echo $estado_civil = 'unión Libre';
			// }
			// $direccion = $row['direccion'];
			// $ciudad = $row['ciudad'];
			// $departamento = $row['departamento'];
			// $telefono = $row['telefono'];
			// $celular = $row['celular'];
			// $dependientes = $row['dependientes'];
			// $correo = $row['correo'];
			// $profesion = $row['profesion'];
			// $lugar_empleo = $row['lugar_empleo'];
			// $direccion_empleo = $row['direccion_empleo'];
			// $cargo = $row['cargo'];
			// $tiempo_laborando = $row['tiempo_laborando'];
			// $telefono_empleo = $row['telefono_empleo'];
			// $numero = $row['numero'];
			// $bloque = $row['bloque'];
			// $areav2 = $row['areav2'];
			// $metros = number_format($areav2 * 0.697225, 2);
			// $metros2 = round($metros, 2, PHP_ROUND_HALF_UP);
			// $colindancias = $row['colindancias'];
			// $valor = number_format($areav2 * 750, 2);
			// $prima = number_format(0.00, 2);
			// $saldoactual = number_format(($areav2 * 750) - $prima, 2);
			// $plaza_anio = ($row['plazo_anio'] * 12);
			// $cuotas = number_format(($areav2 * 750) / $plaza_anio, 2);
			// $fecha_pago = $row['dia_pago'];
			// $nombre_beneficiario = $row['nombre_beneficiario'];
			// $identidad_beneficiario = $row['identidad_beneficiario'];
			// $fecha_primer_cuota = $row['fecha_primer_cuota'];
			// $fechaEntera = strtotime($fecha_primer_cuota);
			// $dia_primer_pago = date("d", $fechaEntera);
			// $fechaND = date("d-m-Y", strtotime($fecha_primer_cuota));
			// $mes_primer_pago = strftime("%B", strtotime($fechaND));

			// $anioND = date("d-m-Y", strtotime($fecha_primer_cuota));
			// $anio_primer_pago = strftime("%Y", strtotime($anioND));
			// //Convertir a Letras
			// $valor_lta = sprintf('%.2f', ($areav2 * 750));
			// $prima_lta = sprintf('%.2f', ($prima));
			// $saldoactual_lta = sprintf('%.2f', (($areav2 * 750) - $prima));
			// // $cuota_lta = sprintf('%.2f', ((750)));
			// $cuota_lta = sprintf('%.2f',(($areav2 * 750) / $plaza_anio));
			// $moneda = 'LEMPIRAS';
			
			// $valor_letras = $modelonumero->numtoletras(abs($valor_lta), $moneda, '');
			// $prima_letras =  $modelonumero->numtoletras(abs($prima_lta), $moneda, '');
			// $saldoactual_letras =  $modelonumero->numtoletras(abs($saldoactual_lta), $moneda, '');
			// $cuota_letras =  $modelonumero->numtoletras(abs($cuota_lta), $moneda, '');
			// $dia_pago =  $modelofecha->fecha(abs($dia_primer_pago));
			// $dia_pago_letras =  $modelofecha->fecha(abs($fecha_pago));


			// //Genero Beneficiario
			// $genero_beneficiario = $row['genero_beneficiario'];

			// if ($genero_beneficiario == 'M') {
			// 	$genero_beneficiario = "al señor";
			// }elseif($genero_beneficiario == 'F'){
			// 	$genero_beneficiario = "la señora";
			// }

			//Pasar a Minusculas
			//quitar acentos
			function quitar_acentos($cadena)
			{
				$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
				$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
				$cadena = utf8_decode($cadena);
				$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
				return utf8_encode($cadena);
			}
			$nombre = quitar_acentos($nombre);
			$nombreCompleto = strtoupper($nombre);
			// $nombre_beneficiario = strtoupper($nombre_beneficiario);

			$html .= '
			<div class="main" >
				<div class="main-container">
					<div class="container">
						<p class="parrafo"><strong><u>CONTRATO PRIVADO DE PROMESA DE VENTA DE UN LOTE DE TERRENO.</u></strong></p>
						Nosotros: <strong>FERNANDO ANTONIO BAIRES PALOMO, </strong>mayor de edad, casado, Ingeniero Agr&oacute;nomo, hondure&ntilde;o y de este domicilio; con Tarjeta de Identidad n&uacute;mero 0318-1962-00633, quien act&uacute;a en su condici&oacute;n de Gerente General y Representante Legal de la Sociedad Mercantil denominada <strong>SERVICIOS FINANCIEROS Y COMERCIALES, SOCIEDAD DE RESPONSABILIDAD LIMITADA DE CAPITAL VARIABLE </strong>o su abreviatura<strong> SEFINCO, S. DE R.L. DE C.V.,&nbsp; </strong>tal como consta en la cl&aacute;usula vig&eacute;simo de la escritura de Constituci&oacute;n; Sociedad del domicilio de esta ciudad de Siguatepeque, Departamento de Comayagua, la&nbsp; cual&nbsp; fue&nbsp; constituida&nbsp; mediante instrumento p&uacute;blico n&uacute;mero quinientos veintid&oacute;s (522) de fecha nueve (09) de junio del a&ntilde;o dos mil dieciocho (2018) autorizada en esta ciudad, por la Notario Eley Franett Cerna Cardona, debidamente inscrita bajo el <strong>NUMERO NOVENTA Y CUATRO (94) del TOMO CATORCE (14) </strong>del Registro de Comerciantes Sociales del Registro de la Propiedad Inmueble y Mercantil de esta ciudad de Siguatepeque, Comayagua; originalmente constituida como B&amp;M SERVICIOS FINANCIEROS, SOCIEDAD DE RESPONSABILIDAD LIMITADA DE CAPITAL VARIABLE&rdquo; o su abreviatura B&amp;M, SERVICIOS FINANCIEROS, S. DE. R.L. DE C.V., la cual cambio su denominaci&oacute;n social mediante protocolizaci&oacute;n de acta de cambio de denominaci&oacute;n social en instrumento p&uacute;blico n&uacute;mero setenta y tres (73), autorizado en esta ciudad de Siguatepeque, de fecha tres (3) de marzo del a&ntilde;o dos mil veinte (2020), ante los oficios del Notario Jorge Armando L&oacute;pez Delcid, la cual quedo debidamente inscrita bajo el NUMERO ONCE (11) DEL TOMO DIECISIETE (17) del Registro de la Comerciantes Sociales que al efecto lleva el Registro de la Propiedad, Inmueble y Mercantil de esta ciudad de Siguatepeque, Departamento de Comayagua; y con suficiente facultades para la celebraci&oacute;n de este acto, quien para los efectos del presente contrato se identificara como <strong>EL PROMITENTE VENDEDOR</strong> y &nbsp;<strong>' . $nombreCompleto . '</strong>, mayor de edad, nacionalidad  $nacionalidad ,  $estado_civil  con domicilio en  $direccion , de la ciudad de  $ciudad , con Documento Nacional de Identificación número  $identidad , quien act&uacute;a en su car&aacute;cter personal y para los efectos de presente contrato se identificara como <strong>EL PROMITENTE COMPRADOR</strong>; quienes hall&aacute;ndonos en el pleno goce y ejercicio de nuestros derechos civiles, libres y espont&aacute;neamente declaramos la celebraci&oacute;n de un <strong>CONTRATO PRIVADO DE PROMESA DE VENTA DE UN LOTE DE TERRENO</strong> que se regir&aacute; por las cl&aacute;usulas y condiciones siguientes: <strong><u>PRIMERO</u></strong>: Declara el se&ntilde;or <strong>FERNANDO ANTONIO BAIRES PALOMO </strong>en su condici&oacute;n indicada, que su representada la Empresa <strong>SERVICIOS FINANCIEROS Y COMERCIALES, SOCIEDAD DE RESPONSABILIDAD LIMITADA DE CAPITAL VARIABLE </strong>o su abreviatura<strong> SEFINCO, S. DE R.L. DE C.V., </strong>es due&ntilde;a y est&aacute; en posesi&oacute;n de Un &nbsp;lote de terreno en Dominio Pleno, ubicado en la COLONIA ANTONIO MATA de esta ciudad de Siguatepeque, Departamento de Comayagua, identificado con clave catastral n&uacute;mero 0318-0009-00049, que tiene un <strong>AREA TOTAL DE 29,469.35 METROS CUADRADOS DE EXTENSION SUPERFICIAL equivalente a 42,268.14 VARAS CUADRADAS, </strong>cuyo t&iacute;tulo de dominio se encuentra debidamente inscrito a su favor bajo folio real con <strong>MATRICULA NUMERO 1529511 ASIENTO NUMERO 1</strong> del Registro de la propiedad, Inmueble y Mercantil de esta ciudad de Siguatepeque, Departamento de Comayagua.- <strong><u>SEGUNDO</u>:</strong> Contin&uacute;a declarando el se&ntilde;or <strong>FERNANDO ANTONIO BAIRES PALOMO, </strong>en su condici&oacute;n indicada, que del inmueble descrito en la cl&aacute;usula que antecede, han convenido dar en PROMESA DE VENTA  $gender  <strong> $nombreCompleto ,</strong> &uacute;nicamente UNA FRACCI&Oacute;N DE TERRENO SIN SERVICIOS P&Uacute;BLICOS, marcado con el <strong>N&Uacute;MERO  $numero  DEL BLOQUE LITERAL  $bloque </strong>, con una extensi&oacute;n superficial de <strong> $metros2  METROS CUADRADOS</strong>, EQUIVALENTES A <strong>  $areav2  VARAS CUADRADAS</strong>, el que mide y limita:  $colindancias .- &nbsp;Que dicha fracci&oacute;n de terreno han convenido darla en Promesa de Venta bajo las siguientes condiciones: <strong>A)</strong> El precio total de la venta convenido por ambas partes es la cantidad de <strong> $valor_letras  EXACTOS (L. $valor ),</strong> en moneda de curso legal&nbsp; de la Rep&uacute;blica de Honduras &nbsp;y&nbsp; en virtud de tratarse de una venta a plazos el Promitente Comprador pagar&aacute; la cantidad relacionada de la siguiente forma: Cancelara en calidad de prima la cantidad de <strong>  $prima_letras  LEMPIRAS EXACTOS (L.  $prima ), </strong>cantidad que es cancelada en este acto de suscripci&oacute;n y firma del presente contrato de promesa de venta<strong>.-</strong> <strong>B)</strong> El Saldo restante por la cantidad de <strong>  $saldoactual_letras  EXACTOS (L. $saldoactual )</strong> ser&aacute; cancelado mediante  $plaza_anio  cuotas&nbsp; mensuales de<strong>   $cuota_letras  EXACTOS (L.  $cuotas )</strong> cada una, conviniendo ambas partes que los pagos se har&aacute;n el d&iacute;a&nbsp; $dia_pago_letras  de cada mes, y comenzara a realizar el primer pago el d&iacute;a $dia_pago ($dia_primer_pago) de $mes_primer_pago del corriente a&ntilde;o (2022) y as&iacute; sucesivamente hasta la completa cancelaci&oacute;n de la obligaci&oacute;n contra&iacute;da en este contrato, pudiendo el promitente comprador hacer pagos mayores o anticipados a los aqu&iacute; establecidos; <strong>C) </strong>Los pagos deber&aacute;n ser realizados por el Promitente Comprador sin necesidad de cobro o requerimiento alguno mediante deposito a la cuenta Bancaria de ahorro No. 21-355-012481-5, a nombre de SERVICIOS FINANCIEROS Y COMERCIALES, S. DE R.L. DE C.V. o su abreviatura SEFINCO del Banco BANPAIS, debiendo enviar copia del dep&oacute;sito al promitente vendedor y dejara en su poder el original que le servir&aacute; de comprobante de pago y asimismo podr&aacute; presentar los comprobantes de dep&oacute;sito al promitente vendedor para que se le extienda su recibo correspondiente, conviniendo que en caso de atraso o incumplimiento en los pagos pactados, cualquier gesti&oacute;n de cobro judicial o extrajudicial que se realice ser&aacute;n cargados a cuenta del promitente comprador.- <strong>D)</strong> Los pagos ser&aacute;n realizados en Lempiras, por ser esta la especie monetaria pactada, realizando los pagos todos los  $fecha_pago  de cada mes, hasta la completa cancelaci&oacute;n de la deuda, en el entendido que al efectuarse el pago posterior a la fecha establecida se aplicar&aacute; un recargo del dos por ciento (2%) sobre el saldo en mora por cada mes pendiente de pago.- <strong>E)</strong> Queda convenido y aceptado por el Promitente Comprador que a partir de la fecha de suscripci&oacute;n de este contrato es su obligaci&oacute;n el mantenimiento permanente del lote que se est&aacute; dando en promesa de venta, entendi&eacute;ndose el mismo por ejemplo la limpieza, chapia entre otros y de no hacerse as&iacute; podr&aacute; el promitente vendedor hacerlo agreg&aacute;ndose a los costos de la venta sin m&aacute;s tr&aacute;mite. <strong>F)</strong> La falta de pago de DOS cuotas consecutivas durante la vigencia del presente contrato, dar&aacute; lugar a la terminaci&oacute;n del presente contrato, sin da&ntilde;os o perjuicios alegables por parte del promitente comprador y los valores pagados no estar&aacute;n sujetos a devoluci&oacute;n alguna y los mismos ser&aacute;n reputados en concepto de arrendamiento del inmueble dado en promesa de venta.- <strong>G)</strong> Es convenido por ambas partes que si por alg&uacute;n motivo el promitente comprador decide no continuar con el pago del lote, las cantidades de dinero abonados no estar&aacute;n sujetos a devoluci&oacute;n alguna por parte del Promitente Vendedor y los mismos ser&aacute;n reputados en concepto de pago de arriendo del inmueble dado en promesa de venta con el entendido que esta cl&aacute;usula no ser&aacute; aplicable si la decisi&oacute;n de no continuar con los pagos es resultado de una incapacidad para trabajar de promitente comprador, producto de un accidente o hecho que traiga secuelas tan graves que le impida seguir trabajando o muerte del promitente comprador o cualquier otras circunstancias semejante a las anteriores con hechos comprobados, con su documentaci&oacute;n respectiva, procediendo en este acto a un acuerdo de negociaci&oacute;n en com&uacute;n de ambas partes sujet&aacute;ndose a las normas que los promitentes vendedores establezcan; <strong>H)</strong> Se establece que la venta del inmueble no incluye servicios p&uacute;blicos, solamente la apertura de calles a nivel de terracer&iacute;a.- <strong>I)</strong> El promitente comprador podr&aacute; durante la vigencia de este contrato y estando al d&iacute;a con los pagos, traspasar los derechos del mismo a la persona que el designe previa autorizaci&oacute;n por escrito del Promitente Vendedor.- <strong>J)</strong> El Promitente Comprador hace constar que en caso de fallecimiento o impedimento f&iacute;sico o mental cl&iacute;nicamente comprobado, deja como beneficiario y responsable del cumplimiento de los pagos acordados $genero_beneficiario $nombre_beneficiario  con Documento Nacional de Identificaci&oacute;n n&uacute;mero  $identidad_beneficiario , quien deber&aacute; presentar para tal efecto el presente contrato y el &uacute;ltimo recibo de pago. <strong>K)</strong> Si el Promitente Comprador no conserva o extrav&iacute;a los dep&oacute;sitos o comprobantes de pago, sea cual fuere la causa, se tomar&aacute;n como v&aacute;lidos los registros que para tal efecto lleva el Promitente Vendedor; <strong>L)</strong> Es entendido y aceptado que la violaci&oacute;n de cualquiera de las cl&aacute;usulas estipuladas dar&aacute; derecho al Promitente Vendedor a dar por terminado el presente contrato sin tr&aacute;mite judicial alguno, bastando tan solo la notificaci&oacute;n hecha por el promitente vendedor, ante un Notario o dos testigos competentes y estableci&eacute;ndose como direcci&oacute;n del Promitente Comprador para efectos de Notificaciones o requerimientos que deber&aacute; usar el Promitente Vendedor la siguiente:  $direccion  de la ciudad de  $ciudad  Departamento de  $departamento , con tel&eacute;fono  $celular , <strong>M)</strong> El Promitente Comprador autoriza al Promitente Vendedor para que pueda vender, ceder, gravar o negociar en cualquier forma el cr&eacute;dito contenido en este contrato.- <strong>N)</strong> Que una vez cumplida la obligaci&oacute;n por parte del promitente comprador, el promitente vendedor se compromete a hacerle formal traspaso en escritura p&uacute;blica para los efectos de la tradici&oacute;n de dominio, en el entendido que todos los gastos que se ocasionen por dicha escritura como ser impuestos de tradici&oacute;n, tasas, honorarios profesionales, medida y mantenimiento &nbsp;catastral y cualquier otro gasto que implique el otorgamiento de la escritura ser&aacute;n por cuenta exclusiva del Promitente Comprador, en el entendido que en el caso de hacer el mantenimiento catastral el promitente vendedor, el mismo ser&aacute; cargado a los gastos del promitente comprador.- <strong><u>TERCERO: </u></strong>Declaro yo <strong> $nombreCompleto </strong>en mi condici&oacute;n de Promitente Comprador que es cierto todo lo manifestado por el se&ntilde;or <strong>FERNANDO ANTONIO BAIRES PALOMO, </strong>en la condici&oacute;n con que act&uacute;a, que acepto la promesa de venta que me hace, manifestando que conozco el alcance y consecuencia de cada una de las cl&aacute;usulas establecidas y comprometi&eacute;ndome a cumplir fielmente con el mismo.</p>
						<p>Estando ambos comparecientes de acuerdo con el contenido del presente documento ratificamos el mismo, firmando y estampando la huella digital del dedo &iacute;ndice de la mano derecha, en la ciudad de Siguatepeque, Departamento de Comayagua, a los _______ (____) d&iacute;as del mes de _______ del a&ntilde;o dos mil veintid&oacute;s (2022).</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						____________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;______________________________________
						<strong>FERNANDO ANTONIO BAIRES P.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  $nombreCompleto </strong><br>
						<strong>PROMITENTE VENDEDOR</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROMITENTE COMPRADOR.</strong>
					</div>
				</div>
			</div>';
			try {
				$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
				$mpdf->adjustFontDescLineheight = 1.8;
				$mpdf->SetMargins(30, 250, 30);
				$mpdf->SetAutoPageBreak(true, 25);
				// $mpdf->debug = true;
				// ob_end_clean();
				$mpdf->WriteHTML($stylesheet, 1);
				$mpdf->WriteHTML($html);
				$mpdf->Output("Contrato ".$bloque .'-'. $numero .' '. ucwords(strtolower($nombre)) . ".pdf", "I");
					// $mpdf->Output("galeria/Contrato " . ucwords(strtolower($nombre)) . ".pdf", "F");
				// $mpdf->Output("Contrato ".$bloque .'-'. $numero .' '. ucwords(strtolower($nombre)) . ".pdf", "D");
			} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
				//       name used for catch
				// Process the exception, log, print etc.
				echo $e->getMessage();
			}
			//convertir pdf a jpg
			// $im = imagecreatefromjpeg('galería/Nota de Duelo '.ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).'.jpg');
			// $mpdf->Output("galería/Nota de Duelo ".ucwords(strtolower($row['nombres'].' '.$row['apellidos'])).".jpg", "F");

		}
	}
}
