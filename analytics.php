<?php

error_reporting(E_ALL ^ E_WARNING);

function getip() 
{ 
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) 
		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
		$ip = getenv("REMOTE_ADDR"); 
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
		$ip = $_SERVER['REMOTE_ADDR']; 
	else 
		$ip = "unknown"; 
	return($ip); 
} 

$ip = getip();
if ($ip != "::/") {
	

$backfiles = debug_backtrace();
$file_called_from = $backfiles[0]['file'];

if (isset($_SESSION['name'])) {
	$usuario = $_SESSION['name'];
} else {
	$usuario = "Desconocido";
}

date_default_timezone_set('America/Bogota');
$nda = basename($file_called_from);
$data = "$ip|||$nda|||$usuario|||" . date('d-m-Y') . "|||" . date('H:i:s') . "\n";
$file = './/back_' . date('d-m-Y') . '.txt';
file_put_contents($file, $data, FILE_APPEND);
}
?>