<?php


 	Class auth extends controllers{

 		public function __construct()
 		{
 			parent:: __construct();

 			session_start();

 			// if (isset($_SESSION['login'])) {
 			// 	 header("Location:".base_url());
 			// }
 		}
	
		public function register($params)
 		{	
 			$data['id_page'] = 2;
 			$data['tag_page'] = "PROHOTEL Colombia | Pagina de Registro.";
 			$data['title_page'] = "Crea tu usuario";
 			$data['name_page'] = "Registro";
 			$data['page_functions_js'] = "functions_register.js";
 			// $data['user_data'] = $_SESSION['userData'];
 			// $data['notify'] = $_SESSION['notify'];
 			// $data['carrito'] = $_SESSION['carrito'];
 			$this->views->getView($this,"register", $data);

 		}

 		public function login($params)
 		{	
 			$data['id_page'] = 3;
 			$data['tag_page'] = "PROHOTEL Colombia | Página de inicio de Sesión.";
 			$data['title_page'] = "Inicia Sesión";
 			$data['name_page'] = "Ingresar";
 			$data['page_functions_js'] = "functions_login.js";
 			// $data['user_data'] = $_SESSION['userData'];
 			$data['notify'] = $_SESSION['notify'];
 			// $data['carrito'] = $_SESSION['carrito'];
 			$this->views->getView($this,"login", $data);

 		}

 		public function forgot($params)
 		{	
 			$data['id_page'] = 4;
 			$data['tag_page'] = "PROHOTEL Colombia | Página de inicio de recuperación de contraseña";
 			$data['title_page'] = "Recupera tu Contraseña";
 			$data['name_page'] = "Recuperar";
 			$data['page_functions_js'] = "functions_auth.js";
 			// $data['user_data'] = $_SESSION['userData'];
 			// $data['notify'] = $_SESSION['notify'];
 			// $data['carrito'] = $_SESSION['carrito'];
 			$this->views->getView($this,"forgot", $data);

 		}

 		public function reset($params)
 		{	
 			$data['id_page'] = 5;
 			$data['tag_page'] = "PROHOTEL Colombia | Página de inicio de cambio de contraseña";
 			$data['title_page'] = "Cambia tu Contraseña";
 			$data['name_page'] = "Cambiar";
 			$data['page_functions_js'] = "functions_auth.js";
 			// $data['user_data'] = $_SESSION['userData'];
 			// $data['notify'] = $_SESSION['notify'];
 			// $data['carrito'] = $_SESSION['carrito'];
 			$this->views->getView($this,"reset", $data);

 		}

 		public function confirm($params)
 		{	
 			if (empty($params)) {
 				header("location:".base_url());
 			}else{

 				$idEncrypt = strClean($params);
 				$idMail = seD:: decryption($idEncrypt);

 			$data['id_page'] = 6;
 			$data['tag_page'] = "PROHOTEL Colombia | Página de inicio de cambio de contraseña";
 			$data['title_page'] = "Confirma tu cuenta";
 			$data['name_page'] = "Confirmar registro";
 			$data['confirm'] = $this->model->setConfirmUser($idMail);
	 			if ($data['confirm']) {
						$_SESSION['notify'] = 23;
						header("location:".base_url().'/auth/login');
					}else{
						$_SESSION['notify'] = 0;
				}
 			$data['page_functions_js'] = "functions_confirm.js";
 			$this->views->getView($this,"confirm", $data);

 			}
 		}

 		public function registerUser(){
 			//Recibo los datos del usuario por post
 			if ($_POST) {
 				$document = strClean($_POST['document']);
 				$email = strClean($_POST['email']);
 				$password = strClean($_POST['password']);
 				$cpassword = strClean($_POST['cpassword']); 

 			// Envio al modelo para validaciones e inserción	
 				$consult = $this->model->searchUser($document, $email, $password, $cpassword);
 				if ($consult == 'wrongpw') {
 			 		$arrResponse = array("status" => false, "msg" => 'Las contraseñas no coinciden, Porfavor intenta de nuevo.');
 				}
 				elseif ($consult == 'pwshort') {
 			 		$arrResponse = array("status" => false, "msg" => 'La contraseñas debe tener mínimo 6 caracteres, porfavor intente de nuevo.');
 				}
 				elseif ($consult == 'insert') {
 			 		$arrResponse = array("status" => true, "msg" => 'Cuenta creada!! hemos enviado un correo de confirmación para activar su cuenta.');
 				}
 				elseif ($consult == 'insertwrong') {
 			 		$arrResponse = array("status" => false, "msg" => 'El documento o correo registrado ya existe.');
 				}
 				else{
 					$arrResponse = array('status' => false, 'msg' => 'No se puedo insertar');
 				}
 				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 				die();
 			}
 		}

 	}// End Class register


?>