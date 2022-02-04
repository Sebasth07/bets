<?php  
	//Url del proyecto

	$status = 'dev';

	if ($status == 'prod') {

		$url = "http://18.116.238.34/winprox/";
		$host = "localhost";
		$bDName = "appApuestas";
		$bDPass = "Wnow0709$$$";

	}elseif ($status == 'dev') {
		$url = "http://localhost/winprox/";
		$host = "localhost";
		$bDName = "winprox";
		$bDPass = "";

	}else{
		echo "No hay datos para conexion";
	}

	const BASE_URL = "http://localhost/apuestas/winprox/";

	//Zona horaria del Proyecto
	date_default_timezone_set('America/Bogota');

	// Datos de Conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "apuestas";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

	//Delimitadores Decimal y Millar para cantidades 
	const SPD = ".";
	const SPM = ",";

	//Simbolos de Moneda
	const SPESO = "$";
	const SEURO = "€";
	const SLIBRA = "£";

	//Monedas
	const MCOP = "COP";
	const MCLP = "CLP";


?>