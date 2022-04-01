<?php
// Set the content-type
//header('Content-type: image/jpeg');
date_default_timezone_set('America/Tegucigalpa');

require_once 'model.php';
// include '../includes/conexion.php'; 
$stylesheet = file_get_contents('css/style.css');

if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
}
$query = 'SELECT * FROM graduat3s WHERE ID = {$id} AND deceased = 1';
$stmt = $db->prepare($query);
    $stmt->execute();
    $array_select = $stmt->fetchAll();
    foreach($array_select as $row) {
        $text = $row['text'];
        $dim = $row['fontdimension'];
        $text_x = $row['cordx'];
        $text_y = $row['cordy'];
        $font = $fontroot.$row['fontname'].'.ttf';
        imagettftext($im, $dim, 0, $text_x, $text_y, $black, $font, $text);

    }
// Create the image
//$im = imagecreatetruecolor(400, 400);
$im = imagecreatefrompng('img/fondo.png');
// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);
$font = './fonts/calibri.ttf';
$font_size = 26;

$txt = 'Julio Enrique Inglesias Alvarez';
$qddg = '(Q.D.D.G.)';
$txt2 = 'Hecho acaecido el 19 de julio, 2021';
$nacionalidaFech = 'hondureño graduado de la clase tal';
$mens = 'Expresamos nuestras más sinceras condolencias a sus';
$mens1 = 'familiares y amigos. Elevamos nuestras plegarias al';
$mens2 = 'Todopoderoso para que reciba el alma de su amado hijo.';
$mensfinal = 'Expresamos nuestras más sinceras condolencias a sus familiares y amigos. Elevamos nuestras plegarias al Todopoderoso para que reciba el alma de su amado hijo.';
// $fechaHoy = 'Campus Zamorano, ' . $fechaF;
$fechaHoy = 'Campus Zamorano, Hoy';
$nombre = imagettfbbox($font_size, 0, $font, $txt);
$qqd = imagettfbbox($font_size, 0, $font, $qddg);
$txt_class = imagettfbbox($font_size, 0, $font, $txt2);
$txt_fecha = imagettfbbox(22, 0, $font, $nacionalidaFech);
$mensaje = imagettfbbox(22, 0, $font, $mens);
$mensaje1 = imagettfbbox(22, 0, $font, $mens1);
$mensaje2 = imagettfbbox(22, 0, $font, $mens2);
$hoy = imagettfbbox(22, 0, $font, $fechaHoy);
// The text to draw
//$text = 'Testing...';
// Replace path by your own font path


// Nombre
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
// text color
$txt_width7 = abs($hoy[4] - $hoy[0]);
$txt_height7 = abs($hoy[3] - $hoy[1]);
// $clr = imagecolorallocate($im, 255, 222, 2);
// Get image Width and Height
$image_width = imagesx($im);
$image_height = imagesy($im);
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

// Add some shadow to the text
//imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Add the text
//imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

imagettftext($im, 27, 0, $x, 690, $black, $font, $txt);
imagettftext($im, 27, 0, $x, 691, $black, $font, $txt);

imagettftext($im, 27, 0, $x1, 725, $black, $font, $qddg);
imagettftext($im, 27, 0, $x1, 726, $black, $font, $qddg);

imagettftext($im, $font_size, 0, $x2, 870, $black, $font, $txt2);

imagettftext($im, 22, 0, $x3, 960, $black, $font, $nacionalidaFech);

imagettftext($im, 22, 0, $x4, 1060, $black, $font, $mens);
imagettftext($im, 22, 0, $x5, 1100, $black, $font, $mens1);
imagettftext($im, 22, 0, $x6, 1140, $black, $font, $mens2);
imagettftext($im, 21, 0, $x7, 1300, $black, $font, $fechaHoy);
// Using imagepng() results in clearer text compared with imagejpeg()
// imagepng($im);
header('Content-type: image/jpeg');
imagejpeg($im);
imagejpeg($im, 'galería/1989.jpg');
imagedestroy($im);
