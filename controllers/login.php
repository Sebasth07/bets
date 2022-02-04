<?php


 	Class login extends controllers{

 		public function __construct()
 		{	
 			
 			parent:: __construct();
 			
 			session_start();

 			if (isset($_SESSION['login'])) {
 				 header("Location:".base_url());
 			}
 		}
 		

 		public function loginUser(){
 			//dep($_POST);
	 		if($_POST) {
	 			if (empty($_POST['txtEmail']) || empty($_POST['txtPassword']) ) {
	 				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
	 			}else{
	 				 $strUsuario = strtolower(strClean($_POST['txtEmail']));
	 				 $strPassword = hash("SHA256",strClean($_POST['txtPassword']));
	 				 $requestUser = $this->model->logUser($strUsuario, $strPassword);
	 				// Validacion datos correctos
	 				 if (empty($requestUser)) {
	 				 	$arrResponse = array('status' => false, 'msg' => 'El usuario o contraseña ingresado es incorrecto');
	 				 }else{
	 				 	$arrData = $requestUser;
	 				 	// Validacion status activo
	 				 	if ($arrData['status'] == 1) {
	 				 		$_SESSION['user_id'] = $arrData['user_id'];
	 				 		$_SESSION['login'] = true;
	 				 		$_SESSION['arrCarrito'] = $_SESSION['arrCarrito'];
	 				 		
	 				 		$arrData = $this->model->sessionLogin($_SESSION['user_id']);
	 				 		$_SESSION['userData'] = $arrData;
	 				 		
	 				 		$arrResponse = array('status' => true, 'msg' => 'Bienvenido, ha ingresado correctamente.');
	 				 	}else{
	 				 		$arrResponse = array('status' => false, 'msg' => 'La cuenta a la que intentas acceder aún no ha sido activada, porfavor sigue las instrucciones que hemos enviado al correo electrónico.');
	 				 	}
	 				 }
	 			}
	 			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
	 		}
	 		die();
 		}

 		// Forgot
 		public function forgot($params)
 		{	
 			$data['id_page'] = 3;
 			$data['tag_page'] = "Winpro X| Recupera tu contraseña";
 			$data['title_page'] = "Recupar tu contraseña";
 			$data['name_page'] = "forgot";
 			$data['page_functions_js'] = "functions_forgot.js";
 			$this->views->getView($this,"forgot", $data);
 		}

 		public function forgotPass()
 		{
 			if ($_POST) {

 				$correoUser = strtolower(strClean($_POST['email']));
 				if (empty($correoUser)) {
 					$arrResponse = array('status' => false, 'msg' => 'Error al ingresar el correo');
 				}else{
 					$requestMail = $this->model->consultMail($correoUser);
 					if ($requestMail) {
 						$token = tokenGenerator();
 						$requestToken = $this->model->setToken($correoUser, $token);
 						$arrResponse = array('status' => true, 'msg' => 'Se ha enviado un correo con las instrucciones para cambiar su contraseña');
 						$_SESSION['notify'] = 10;

 					}else{
 						$arrResponse = array('status' => false, 'msg' => 'No existe un usuario con el correo ingresado.');
 					}
 				}
 				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 				die();	
 			}	
 		}

 		// Logout
 		public function logout($params)
 		{	
			session_start();
			session_unset();
			session_destroy();
			header("Location:".base_url());
		}

		public function reset($params)
 		{	
 			if (empty($params)) {
 				header("location:".base_url());
 			}else{

 				$token = strClean($params);
 				
	 			$data['id_page'] = 4;
	 			$data['tag_page'] = "AVC Latam | Cambiar tu contraseña";
	 			$data['title_page'] = "Cambiar tu contraseña";
	 			$data['name_page'] = "Recupera tu contaseña";
	 			$data['token'] = $token;
	 			$data['page_functions_js'] = "functions_reset.js";
	 			$this->views->getView($this,"reset", $data);
	 		}
 		}

 		public function newPass()
 		{
 			if ($_POST) {

 				$strToken = strClean($_POST['txtId']);
 				$strPass = strClean($_POST['txtPassword']);
 				$strCpass = strClean($_POST['txtCpassword']);

 				$request = $this->model->changePass($strToken, $strPass, $strCpass);

 				if ($request == 'pwshort') {
 					$arrResponse = array("status" => false, "msg" => 'La contraseña debe tener mínimo 6 caracteres');
 				}elseif ($request == 'expired') {
 					$arrResponse = array("status" => false, "msg" => 'El token a expirado o no existe.');
 				}elseif ($request == 'pwwrong') {
 					$arrResponse = array("status" => false, "msg" => 'Las contraseñas no coinciden.');
 				}elseif ($request == 'exitoso') {
 					$arrResponse = array("status" => true, "msg" => 'Contraseña cambiada exitosamente.');
 					$_SESSION['notify'] = 11;
 				}else{
 					$arrResponse = array("status" => false, "msg" => 'No se ha podido cambiar la contraseña.');
 				}
 				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 				die();
 			}
 		}
 	}// End Class login


?>