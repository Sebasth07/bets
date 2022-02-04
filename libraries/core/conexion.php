<?php

	Class conexion{

		private $conect;

		public function __construct(){
				$conexinStr = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
			try{
				$this->conect = new PDO($conexinStr,DB_USER, DB_PASSWORD);
				$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//echo "conexion exitosa";
			}catch (PDOException $e){
				$this->conect = "Error de conexion";
				echo "ERROR". $e->getMessage();
			}
		}

		public function conect(){
			return $this->conect;
		}
	} 

	
  ?>