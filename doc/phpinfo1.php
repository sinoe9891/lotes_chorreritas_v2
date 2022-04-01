<?php
date_default_timezone_set('America/Tegucigalpa');

require_once 'model.php';
$stylesheet = file_get_contents('./css/style.css');

if (isset($_GET['ID'])) {
	$user_id = $_GET['ID'];
}
 $solicitudes = getAll($user_id);
if ($solicitudes->num_rows > 0) {
	while ($row = $solicitudes->fetch_assoc()) {
		$id = $row['ID'];
		$nombres = $row['nombres'];
		$font = './fonts/calibri.ttf';
//		echo $id, $nombres;
		
$img = imagecreatefrompng('img/fondo.png');		
		// $img = imagecreatefrompng('img/fondo.png');
		// $black = imagecolorallocate($img, 0, 0, 0);
		// imagettftext($img, 27, 0, 20, 690, $black, $font, $id);

//		 header('Content-type: image/jpeg');
//		 imagejpeg($img); 
		// imagepng($img);
		// $img->debug = true;
		// imagepng($img);
		// imagejpeg($img);
		
		// // Liberar memoria
//		 imagedestroy($img);
	}
}
