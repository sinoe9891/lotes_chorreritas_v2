<?php
	// $conn = new mysqli("localhost","root","","lotes_chorreritas");
	$conn = new mysqli("localhost","root","","desarrollo_lotes");
	// $conn = new mysqli("151.106.100.46","creat312_sinoe","Stark989121","creat312_lotes");
	 
	if($conn->connect_error){
		echo 'Conexión Fallida: ', $conn->connect_error;
	}
	$conn->set_charset("utf8");	
?>