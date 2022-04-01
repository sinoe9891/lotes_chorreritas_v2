<?php
date_default_timezone_set('America/Tegucigalpa');
require_once 'model.php';
// $stylesheet = file_get_contents('css/style.css');
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
	$consulta = getAll($user_id);
	if ($consulta->num_rows > 0) {
		while ($row = $consulta->fetch_assoc()) {
			$id = $row['ID'];
			$fechaFallecido = $row['date_deceased'];
			$fechaNota = $row['fechaNotaDuelo'];
			setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
			$newDate = date("d-m-Y", strtotime($fechaFallecido));
			$fechaF = strftime("%d de %B de %Y", strtotime($newDate));
			$fechaND = date("d-m-Y", strtotime($fechaNota));
			$fechaNDF = strftime("%d de %B de %Y", strtotime($fechaND));
			$hoy = strftime("%d de %B de %Y");
			// (B) WRITE TEXT
			$nacionalidad = $row['nacionalidad'];
			$sexo = $row['genero'];
			if ($sexo == 'M') {
				$a = 'o';
			} else {
				$a = 'a';
			}

			if ($nacionalidad == 'ALEMANIA' && $sexo == 'M') {
				$nacion = 'Alemán';
			} elseif ($nacionalidad == 'ALEMANIA' && $sexo == 'F') {
				$nacion = 'Alemana';
			}
			if ($nacionalidad == 'ARGENTINA' && $sexo == 'M') {
				$nacion = 'Argentino';
			} elseif ($nacionalidad == 'ARGENTINA' && $sexo == 'F') {
				$nacion = 'Argentina';
			}
			if ($nacionalidad == 'AUSTRIA' && $sexo == 'M') {
				$nacion = 'Austriaco';
			} elseif ($nacionalidad == 'AUSTRIA' && $sexo == 'F') {
				$nacion = 'Austriaca';
			}
			if ($nacionalidad == 'BELGICA' && $sexo == 'M') {
				$nacion = 'Belga';
			}
			if ($nacionalidad == 'BELICE' && $sexo == 'M') {
				$nacion = 'Beliceño';
			} elseif ($nacionalidad == 'BELICE' && $sexo == 'F') {
				$nacion = 'Beliceña';
			}
			if ($nacionalidad == 'BOLIVIA' && $sexo == 'M') {
				$nacion = 'Boliviano';
			} elseif ($nacionalidad == 'BOLIVIA' && $sexo == 'F') {
				$nacion = 'Boliviana';
			}
			if ($nacionalidad == 'BRASIL' && $sexo == 'M') {
				$nacion = 'Brasileño';
			} elseif ($nacionalidad == 'BRASIL' && $sexo == 'F') {
				$nacion = 'Brasileña';
			}
			if ($nacionalidad == 'CANADÁ' && $sexo == 'M') {
				$nacion = 'Canadiense';
			} elseif ($nacionalidad == 'CANADÁ' && $sexo == 'F') {
				$nacion = 'Canadiense';
			}
			if ($nacionalidad == 'CHILE' && $sexo == 'M') {
				$nacion = 'Chileno';
			} elseif ($nacionalidad == 'CHILE' && $sexo == 'F') {
				$nacion = 'Chilena';
			}
			if ($nacionalidad == 'COLOMBIA' && $sexo == 'M') {
				$nacion = 'Colombiano';
			} elseif ($nacionalidad == 'COLOMBIA' && $sexo == 'F') {
				$nacion = 'Colombiana';
			}
			if ($nacionalidad == 'COSTA RICA') {
				$nacion = 'costarricense';
			}
			if ($nacionalidad == 'CUBA' && $sexo == 'M') {
				$nacion = 'Cubano';
			} elseif ($nacionalidad == 'CUBA' && $sexo == 'F') {
				$nacion = 'Cubana';
			}
			if ($nacionalidad == 'ECUADOR' && $sexo == 'M') {
				$nacion = 'Ecuatoriano';
			} elseif ($nacionalidad == 'ECUADOR' && $sexo == 'F') {
				$nacion = 'Ecuatoriana';
			}
			if ($nacionalidad == 'EL SALVADOR' && $sexo == 'M') {
				$nacion = 'Salvadoreño';
			} elseif ($nacionalidad == 'EL SALVADOR' && $sexo == 'F') {
				$nacion = 'Salvadoreña';
			}
			if ($nacionalidad == 'ESPAÑA' && $sexo == 'M') {
				$nacion = 'Español';
			} elseif ($nacionalidad == 'ESPAÑA' && $sexo == 'F') {
				$nacion = 'Española';
			}
			if ($nacionalidad == 'ESTADOS UNIDOS') {
				$nacion = 'Estadounidense';
			}
			if ($nacionalidad == 'GUATEMALA' && $sexo == 'M') {
				$nacion = 'Guatemalteco';
			} elseif ($nacionalidad == 'GUATEMALA' && $sexo == 'F') {
				$nacion = 'Guatemalteca';
			}
			if ($nacionalidad == 'PERU' && $sexo == 'M') {
				$nacion = 'Perueano';
			} elseif ($nacionalidad == 'PERU' && $sexo == 'F') {
				$nacion = 'Perueana';
			}
			if ($nacionalidad == 'HONDURAS' && $sexo == 'M') {
				$nacion = 'Hondureño';
			} elseif ($nacionalidad == 'HONDURAS' && $sexo == 'F') {
				$nacion = 'Hondureña';
			}
			if ($nacionalidad == 'MEXICO' && $sexo == 'M') {
				$nacion = 'Mexicano';
			} elseif ($nacionalidad == 'MEXICO' && $sexo == 'F') {
				$nacion = 'Mexicana';
			}
			if ($nacionalidad == 'NICARAGUA') {
				$nacion = 'Nicaragüense';
			}
			if ($nacionalidad == 'PANAMA' && $sexo == 'M') {
				$nacion = 'Panameño';
			} elseif ($nacionalidad == 'PANAMA' && $sexo == 'F') {
				$nacion = 'Panameña';
			}
			if ($nacionalidad == 'PERU' && $sexo == 'M') {
				$nacion = 'Peruano';
			} elseif ($nacionalidad == 'PERU' && $sexo == 'F') {
				$nacion = 'Peruana';
			}
			if ($nacionalidad == 'REPUBLICA DOMINICANA' && $sexo == 'M') {
				$nacion = 'Dominicano';
			} elseif ($nacionalidad == 'GUATEMALA' && $sexo == 'F') {
				$nacion = 'Dominicana';
			}
			if ($nacionalidad == 'VENEZUELA' && $sexo == 'M') {
				$nacion = 'Venezolano';
			} elseif ($nacionalidad == 'VENEZUELA' && $sexo == 'F') {
				$nacion = 'Venezolana';
			}
			if ($nacionalidad == 'HAITI' && $sexo == 'M') {
				$nacion = 'Haitiano';
			} elseif ($nacionalidad == 'HAITI' && $sexo == 'F') {
				$nacion = 'Haitiano';
			}
			if ($nacionalidad == 'ISRAEL' && $sexo == 'M') {
				$nacion = 'Israelí';
			}
			if ($nacionalidad == 'ITALIA' && $sexo == 'M') {
				$nacion = 'Italiano';
			} elseif ($nacionalidad == 'ITALIA' && $sexo == 'F') {
				$nacion = 'Italiana';
			}
			if ($nacionalidad == 'JAMAICA' && $sexo == 'M') {
				$nacion = 'Jamaicano';
			} elseif ($nacionalidad == 'JAMAICA' && $sexo == 'F') {
				$nacion = 'Jamaicana';
			}
			if ($nacionalidad == 'PARAGUAY' && $sexo == 'M') {
				$nacion = 'Paraguayo';
			} elseif ($nacionalidad == 'PARAGUAY' && $sexo == 'F') {
				$nacion = 'Paraguaya';
			}
			if ($nacionalidad == 'URUGUAY' && $sexo == 'M') {
				$nacion = 'Uruguayo';
			} elseif ($nacionalidad == 'URUGUAY' && $sexo == 'F') {
				$nacion = 'Uruguaya';
			}
			// (A) OPEN IMAGE
			$img = imagecreatefromjpeg('img/fondo.jpg');
			//Tamaño de fuente 
			$font_size = 26;
			// Directorio de fuente
			$font = __DIR__ . "/fonts/calibri.ttf";
			// $fontBold = "C:\Windows\Fonts\calibrib.ttf";
			$white = imagecolorallocate($img, 0, 0, 0);
			$white = imagecolorallocate($img, 0, 0, 0);
			$txt = 'ING. ' . $row['nombres'] . ' ' . $row['apellidos'];
			$qddg = '(Q.D.D.G.)';
			$txt2 = 'Hecho acaecido el ' . $fechaF;
			$nacionalidaFech = $nacion . ', graduad' . $a . ' de la clase ' . $row['clase'];
			$mens = 'Expresamos nuestras más sinceras condolencias a sus';
			$mens1 = 'familiares y amigos. Elevamos nuestras plegarias al';
			$mens2 = 'Todopoderoso para que reciba el alma de su amad' . $a . ' hij' . $a . '.';
			$mensfinal = 'Expresamos nuestras más sinceras condolencias a sus familiares y amigos. Elevamos nuestras plegarias al Todopoderoso para que reciba el alma de su amado hijo.';
			$fechaHoy = 'Campus Zamorano, ' . $fechaNDF;
			$nombre = imagettfbbox($font_size, 0, $font, $txt);
			$qqd = imagettfbbox($font_size, 0, $font, $qddg);
			$txt_class = imagettfbbox($font_size, 0, $font, $txt2);
			$txt_fecha = imagettfbbox(22, 0, $font, $nacionalidaFech);
			$mensaje = imagettfbbox(22, 0, $font, $mens);
			$mensaje1 = imagettfbbox(22, 0, $font, $mens1);
			$mensaje2 = imagettfbbox(22, 0, $font, $mens2);
			$hoy = imagettfbbox(22, 0, $font, $fechaHoy);
			// Inicio de la creación de imagen
			$txt_width = abs($nombre[4] - $nombre[0]);
			$txt_height = abs($nombre[3] - $nombre[1]);
			$txt_width1 = abs($qqd[4] - $qqd[0]);
			$txt_height1 = abs($qqd[3] - $qqd[1]);
			$txt_width2 = abs($txt_class[4] - $txt_class[0]);
			$txt_height2 = abs($txt_class[3] - $txt_class[1]);
			$txt_width3 = abs($txt_fecha[4] - $txt_fecha[0]);
			$txt_height3 = abs($txt_fecha[3] - $txt_fecha[1]);
			$txt_width4 = abs($mensaje[4] - $mensaje[0]);
			$txt_height4 = abs($mensaje[3] - $mensaje[1]);
			$txt_width5 = abs($mensaje1[4] - $mensaje1[0]);
			$txt_height5 = abs($mensaje1[3] - $mensaje1[1]);
			$txt_width6 = abs($mensaje2[4] - $mensaje2[0]);
			$txt_height6 = abs($mensaje2[3] - $mensaje2[1]);
			$txt_width7 = abs($hoy[4] - $hoy[0]);
			$txt_height7 = abs($hoy[3] - $hoy[1]);
			// $clr = imagecolorallocate($im, 255, 222, 2);
			// Get image Width and Height
			$image_width = imagesx($img);
			$image_height = imagesy($img);
			// set starting x and y coordinates for the text, so that it is horizontally and vertically centered
			//Nombre
			$x = abs($image_width - $txt_width) / 2;
			$y = abs($image_height - $txt_height) / 2;
			//QDDG
			$x1 = abs($image_width - $txt_width1) / 2;
			$y1 = abs($image_height - $txt_height1) / 2;
			//Fecha Caecido
			$x2 = abs($image_width - $txt_width2) / 2;
			$y2 = abs($image_height - $txt_height2) / 2;
			//Nacionalidad
			$x3 = abs($image_width - $txt_width3) / 2;
			$y3 = abs($image_height - $txt_height3) / 2;
			$x4 = abs($image_width - $txt_width4) / 2;
			$y4 = abs($image_width - $txt_height4) / 2;
			$x5 = abs($image_width - $txt_width5) / 2;
			$y5 = abs($image_width - $txt_height5) / 2;
			$x6 = abs($image_width - $txt_width6) / 2;
			$y6 = abs($image_width - $txt_height6) / 2;
			$x7 = abs($image_width - $txt_width7) / 2;
			$y7 = abs($image_width - $txt_height7) / 2;

			imagettftext($img, $font_size, 0, $x, 690, $white, $font, $txt);
			imagettftext($img, 26, 0, $x, 690, $white, $font, $txt);
			imagettftext($img, $font_size, 0, $x1, 725, $white, $font, $qddg);
			imagettftext($img, 26, 0, $x1, 725, $white, $font, $qddg);
			imagettftext($img, $font_size, 0, $x2, 870, $white, $font, $txt2);
			imagettftext($img, 22, 0, $x3, 960, $white, $font, $nacionalidaFech);
			imagettftext($img, 22, 0, $x4, 1060, $white, $font, $mens);
			imagettftext($img, 22, 0, $x5, 1100, $white, $font, $mens1);
			imagettftext($img, 22, 0, $x6, 1140, $white, $font, $mens2);
			imagettftext($img, 21, 0, $x7, 1300, $white, $font, $fechaHoy);
			// (C) OUTPUT IMAGE
			header('Content-type: image/jpeg');
			header("Content-Disposition: attachment; filename=" . 'Nota de Duelo ' . $row['nombres'] . ' ' . $row['apellidos'] . ".jpg");
			imagejpeg($img, 'galeria/' . $row['ID'] . '.jpg', 100);
			imagejpeg($img);
			// $img->debug = true;
			// imagepng($img);
			// imagejpeg($img);
			clearstatcache();
			// Liberar memoria
			imagedestroy($img);
		}
	}
}
