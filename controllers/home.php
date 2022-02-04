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
 			$data['tag_page'] = "WINPROX.BET | Tu casa de apuestas en linea.";
 			$data['title_page'] = "Página principal";
 			$data['name_page'] = "Inicio";
 			$data['page_functions_js'] = "functions_home.js";
 			$data['user_data'] = $_SESSION['userData'];
 			$data['notify'] = $_SESSION['notify'];
 			$data['carrito'] = $_SESSION['carrito'];
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
 		public function addApuesta()
 		{
 			if ($_POST['array']) {
 				$apuesta = json_decode($_POST['array'], true);
 				$carrito = $_SESSION['carrito'];
 				$arrCarrito = [
					'evento'=> $apuesta['id'],
					'cuota'=> $apuesta['cuota'],
					'equipoL'=> $apuesta['equipoL'],
					'equipoV'=>	$apuesta['equipoV'],
					'tipo'=> $apuesta['apuestaT'],
					'apostadoA'=> $apuesta['apostadoA'],
					'superCuota'=> $apuesta['cuota'],
					'total' => $apuesta['total'],
					'fecha_evento' => $apuesta['fecha']
				];

				if ($carrito != '') {
					$idEvento = $arrCarrito['evento'];
	 				$r = [];
						foreach ( $carrito as $k => $v ) {        
					        if ( $v['evento'] == $idEvento ) {
					                $r = true;
					        }
						};

					if ($r == 1) {
						$arrResponse = array("status" => false , "msg" => 'No Puedes seleccionar 2 veces el mismo evento en un apuesta.' );
					}else{
						$carrito[] = $arrCarrito;
						$_SESSION['carrito'] = $carrito;
						$htmlCarrito = getFile('templates/home/minicart', $_SESSION['carrito']);
						$arrResponse = array("status" => true,
									 "msg" => 'Evento añadido al carrito de compras.',
									 "htmlCarrito" => $htmlCarrito
									);
					}
				}else{
					$carrito[] = $arrCarrito;
					$_SESSION['carrito'] = $carrito;
					$htmlCarrito = getFile('templates/home/minicart', $_SESSION['carrito']);
					$arrResponse = array("status" => true,
									 "msg" => 'Se añadio el evento al carrito de compras.',
									 "htmlCarrito" => $htmlCarrito
									);
					
				}
 			}else{
 				$arrResponse = array("status" => false , "msg" => 'error en $post' );
 			}

 			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 			die();
 		}

 		function dellApuesta()
 		{
 			if ($_POST['array']) {
 				$evento = json_decode($_POST['array'], true);
 				$carrito = $_SESSION['carrito'];

 				for ($i=0; $i < count($carrito); $i++) { 
 					if ($carrito[$i]['evento'] == $evento) {
 						unset($carrito[$i]);
 					}
 				}
 				sort($carrito);
 				$_SESSION['carrito'] = $carrito;

 				$htmlCarrito = getFile('templates/home/minicart', $_SESSION['carrito']);
				$arrResponse = array("status" => true,
									 "msg" => 'Evento eliminado correctamente',
									 "htmlCarrito" => $htmlCarrito
									);
 				
 			}else{
 				$arrResponse = array("status" => false , "msg" => 'Error en la petición $_POST.' );
 			}
 			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 			die();
 		}

 		function inversionApuesta()
 		{
 			if ( $_POST['array']) {
 				$inversionDatos = json_decode($_POST['array'], true);
 				$carrito = $_SESSION['carrito'];
 				
 				$evento =  $inversionDatos[0];
 				$cuota =  $inversionDatos[1];
 				$inversion =  $inversionDatos[2];
 				$total =  $inversionDatos[3];

 				for ($i=0; $i < count($carrito); $i++) { 
 					if ($carrito[$i]['evento'] == $evento) {
 						$carrito[$i]['inversion'] = $inversion;
						$carrito[$i]['total'] = $total;
 					}
 				}
 				$_SESSION['carrito'] = $carrito;
 				$htmlCarrito = getFile('templates/home/minicart', $_SESSION['carrito']);
				$arrResponse = array("status" => true,
									 "msg" => 'Inversion realizada.',
									 "htmlCarrito" => $htmlCarrito
									);
 			}else{
 				$arrResponse = array("status" => false , "msg" => 'Error en la petición $_POST.' );
 			}
 			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 			die();
 		}

 		function inversion()
 		{
 			if ($_POST['array']){
 				$apostado = json_decode($_POST['array'], true);
 				if (!is_numeric($apostado)) {
 					$arrResponse = array("status" => false , "msg" => 'Solo puedes ingresar un monto numerico para invertir en tu apuesta' );
 				}else{
 					if ($apostado < 3) {
 						$arrResponse = array("status" => false , "msg" => 'Lo minimo que puedes apostar son 3 dolares' );
 					}else{
 						$_SESSION['inversion']= $apostado;
 						$htmlCarrito = getFile('templates/home/minicart', $_SESSION['carrito']);
						$arrResponse = array("status" => true,
									 "msg" => 'Inversión Actualizada',
									 "htmlCarrito" => $htmlCarrito
									);
 					}
 				}
 			}else{
 				$arrResponse = array("status" => false , "msg" => 'Error en la petición $_POST.' );
 			}
 			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 			die();
 		}

 		function vaciarCarrito()
 		{
 			if ($_POST['array']) {
 				$confirmacion = json_decode($_POST['array'], true);
 				if ($confirmacion) {
 					if (isset($_SESSION['carrito'])) {
 						unset($_SESSION['carrito']);
 						$htmlCarrito = getFile('templates/home/minicart', $_SESSION['carrito']);
						$arrResponse = array("status" => true,
									 "msg" => 'Se ha vaciado el carrito de compras.',
									 "htmlCarrito" => $htmlCarrito
									);
 					}else{
 						$arrResponse = array("status" => false , "msg" => 'Carrito de compras ya esta vacío' );
 					}
 				}else{
 					$arrResponse = array("status" => false , "msg" => 'Error en confirmación para eliminar el carrito' );
 				}
 			}else{
 				$arrResponse = array("status" => false , "msg" => 'Error en la petición $_POST.' );
 			}
 			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 			die();
 		}

 		function insertApuesta()
 		{
 			if ($_POST['array']) {
 				$apuesta = json_decode($_POST['array'], true);
 				if (count($apuesta) < 1) {
 					$arrResponse = array("status" => false , "msg" => 'no hay datos en el carrito.' );
 				}else{
 					if (isset($_SESSION['user_id'])) {
 							
 							$saldo = $_SESSION["userData"]["saldo"];
 							$inversion = $_SESSION['inversion'];
 							if ($saldo < $inversion) {
 								$arrResponse = array("status" => false , "msg" => 'No hay saldo suficiente para pagar esta apuestas.' );
 							}else{
 
 								$arrData = $this->model->crearApuesta($apuesta);
 								$arrUserData = $this->model->sessionLogin($_SESSION['user_id']);
	 				 			$_SESSION['userData'] = $arrUserData;
 								if ($arrData['respuesta'] == 'usuarioap') {
				 			 		$arrResponse = array("status" => true, "option" => 1, "msg" => 'Apueta realizada efectivamente.');
				 				}elseif ($arrData['respuesta'] == 'taquillaap') {
				 					$arrResponse = array("status" => true, "option" => 2, "ticket" => $arrData['ticket'], "msg" => 'Taquilla la apuesta se realizo correctamen, retire y entregue el ticket al usuario.');
				 				}else{
				 					$arrResponse = array("status" => true, "msg" => 'Algo desde el modelo salio mal.');
				 				}
 							}
 							
 						}else{
 							$arrResponse = array("status" => false , "msg" => 'Inicia sesion para finalizar tu apuesta.' );
 						}
 				}
 			}
 			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 			die();
 		}

 		function updateBet()
 		{
 			if ($_POST['array']){
 				$apuesta = json_decode($_POST['array'], true);
 				$ticket = $apuesta['0'];
 				$identificacion = $apuesta['1'];

 				if ($ticket == "") {
 					$arrResponse = array("status" => false , "msg" => 'Ticket de apuesta incorrecto o no existe.' );
 				}elseif (!is_numeric($identificacion)) {
 					$arrResponse = array("status" => false , "msg" => 'El numero de identificacion del usuario debe ser un dato numerico, no puede contener letras o caracteres especiales.' );
 				}else{
 					$arrData = $this->model->consultBet($ticket, $identificacion);
 					if ($arrData > 0) {
 						// Código para impresión de tickets aquí

 						$arrResponse = array("status" => true , "msg" => 'Apuesta realizada correctamente, sale ticket impreso.' );
 					}else{
 						$arrResponse = array("status" => false , "msg" => 'Algo salió mal al ingresar el documento del usuario.' );
 					}
 				}
 				
 				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 				die();
 			}
 		}

 		function historial()
 		{
 			if ($_POST['array']){
 				$evento = json_decode($_POST['array'], true);
 				$arrData = $this->model->historial($evento);
 				if ($arrData > 0) {

					$_SESSION['historial'] = $arrData;
 					$modalContent = getFile('templates/home/modalhistorial',$arrData);
					$arrResponse = array("status" => true,
									 "msg" => 'Cargando historial del evento.',
									 "modalcontent" => $modalContent
									);

 				}else{
 					$arrResponse = array("status" => false , "msg" => 'La busqueda se retorno vacia' );
 				}
 				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 				die();
 			}
 		}
 		
 		public function apuestaOpciones()
 		{
 			if ($_POST['array']){
 				$evento = json_decode($_POST['array'], true);
 				$arrData = $this->model->opcionesMas($evento);
 				$opciones = $arrData['response']['0']['bookmakers']['0']['bets'];
 				if ($opciones > 0) {
 					
 					$_SESSION['temporal']=$opciones;
 					$modalContent = getFile('templates/home/modalopciones',$_SESSION['temporal']);
					$arrResponse = array("status" => true,
									 "msg" => 'Cargando mas opciones.',
									 "modalcontent" => $modalContent
									);

 				}else{
 					$arrResponse = array("status" => false , "msg" => 'La busqueda se retorno vacia' );
 				}
 				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 				die();
 			}

 		}
 	}/// End Class Home


?>