<?php


 	Class home extends controllers{

 		public function __construct()
 		{
 			parent:: __construct();
 			session_start();
 		}

 		public function home($params)
 		{	
 			$data['id_page'] = 1;
 			$data['tag_page'] = "PROHOTE Colombia | Sitio Oficial.";
 			$data['title_page'] = "Página principal";
 			$data['name_page'] = "Inicio";
 			$data['page_functions_js'] = "functions_home.js";
 			// $data['user_data'] = $_SESSION['userData'];
 			// $data['notify'] = $_SESSION['notify'];
 			// $data['carrito'] = $_SESSION['carrito'];
 			$this->views->getView($this,"home", $data);

 		}

 		

 		public function createUser()
 		{
 			if ($_POST) {
 				$nombre = strClean($_POST['txtNombre']);
 				$sNombre = strClean($_POST['txtSnombre']);
 				$apellidos = strClean($_POST['txtApellidos']);
 				$dni = strClean($_POST['identidicacion']);
 				$email = strClean($_POST['txtEmail']);
 				$contrasena = strClean($_POST['pswdr']);
 				$ccontrasena = strClean($_POST['cPswdr']);

 				$consultar = $this->model->searchUser($nombre, $sNombre, $apellidos, $dni, $email, $contrasena, $ccontrasena);
 				
 				if ($consultar == 'wrongpw') {
 			 		$arrResponse = array("status" => false, "msg" => 'Las contraseñas no coinciden, Porfavor intenta de nuevo.');
 				}
 				elseif ($consultar == 'pwshort') {
 			 		$arrResponse = array("status" => false, "msg" => 'La contraseña debe tener mínimo 6 caracteres');
 				}
 				elseif ($consultar == 'wronlname') {
	 				$arrResponse = array("status" => false, "msg" => 'Los apellidos no puede contener espacios, números o caracteres especiales');
	 			}
	 			
	 			elseif ($consultar == 'wronname') {
	 				$arrResponse = array("status" => false, "msg" => 'El nombre no puede contener espacios, números o caracteres especiales');
	 			}
	 			elseif ($consultar == 'wrondni') {
	 				$arrResponse = array("status" => false, "msg" => 'El numero de identificacion no puede contener letras o caracteres especiales');
	 			}
	 			elseif ($consultar == 'insertar') {
 					$arrResponse = array('status' => true, 'msg' => 'Ingresa a tu correo para confirmar la cuenta y que puedas ingresar.');
 					$_SESSION['notify'] = 1;
 				}
 				elseif($consultar == 'existe') {
 					$arrResponse = array('status' => false, 'msg' => 'ya existe ese correo registrado o numero de identificacion');
 				}
 				else{
 					$arrResponse = array('status' => false, 'msg' => 'No se puedo insertar');
 				}
 				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 				die();
 			}
 			
 		}

 		public function loginUser(){
 			//dep($_POST);
	 		if($_POST) {
	 			if (empty($_POST['txtdEmail']) || empty($_POST['txtPswdr']) ) {
	 				$arrResponse = array('status' => false, 'msg' => 'Error de datos, Campos Vacios');
	 			}else{
	 				 $strUsuario = strtolower(strClean($_POST['txtdEmail']));
	 				 $strPassword = hash("SHA256",strClean($_POST['txtPswdr']));
	 				 $requestUser = $this->model->logUser($strUsuario, $strPassword);
	 				// Validacion datos correctos
	 				 if (empty($requestUser)) {
	 				 	$arrResponse = array('status' => false, 'msg' => 'El usuario o contraseña ingresado es incorrecto');
	 				 }else{
	 				 	$arrData = $requestUser;
	 				 	// Validacion status activo
	 				 	if ($arrData['status'] == 1) {
	 				 		$_SESSION['user_id'] = $arrData['usuario_id'];
	 				 		$_SESSION['login'] = true;
	 				 		
	 				 		$arrData = $this->model->sessionLogin($_SESSION['user_id']);
	 				 		$_SESSION['userData'] = $arrData;
	 				 		
	 				 		$arrResponse = array('status' => true, 'msg' => 'Bienvenido, ha ingresado correctamente.');
	 				 		$_SESSION['notify'] = 2;
	 				 	}else{
	 				 		$arrResponse = array('status' => false, 'msg' => 'La cuenta a la que intentas acceder aún no ha sido activada, porfavor sigue las instrucciones que hemos enviado al correo electrónico.');
	 				 	}
	 				 }
	 			}
	 			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
	 		}
	 		die();
 		}
 		
 	}/// End Class Home


?>