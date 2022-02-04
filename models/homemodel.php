<?php

	/*
	 * 
	 */

	phpmailler($data="");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	class homeModel extends mysql
	{
		
		 public function __construct()
		{
			parent::__construct();
		}

		public function searchUser(string $nombre, string $snombre, string $apellidos, string $dni, string $email, string $contrasena, string $ccontrasena)
		{
			$return = "";
			$this->strNombre = $nombre;
			$this->strSnombre = $snombre;
			$this->strApellidos = $apellidos;
			$this->strDni = $dni;
			$this->strCorreo = $email;
			$this->strPassword = $contrasena;
			$this->strCpassword = $ccontrasena;
			$this->strNpassword = hash("SHA256", $this->strPassword);
			$this->strFecha = date("y-m-d");
			$this->strRol = 3;
			$this->strPtoken = "";
			$this->intEstatus = 0;
			$this->taquilla = "";
			
			$sql = "SELECT * FROM tab_users WHERE correo = '{$this->strCorreo}' OR identificacion = '{$this->strDni}' ";
			$request = $this->select_All($sql);

			if ($this->strPassword != $this->strCpassword) {
				$return = 'wrongpw';
			}elseif (strlen($this->strPassword) < 6) {
				$return = 'pwshort';
			}elseif (!preg_match("/^[a-zA-Z]+$/",$this->strNombre)) {
				$return = 'wronname';
			}elseif (!preg_match("/^[a-zA-Z]+$/",$this->strApellidos)) {
				$return = 'wronlname';
			}elseif (!is_numeric($this->strDni)) {
				$return = 'wrondni';
			}elseif (empty($request)) {
				
				// Crear el usuario
				$query_insert = "INSERT INTO tab_users (nombre,snombre,apellidos,identificacion,correo,contrasena,fecha,user_rol,token,	taquilla_id,status) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
				$arrData =  array($this->strNombre, $this->strSnombre, $this->strApellidos, $this->strDni, $this->strCorreo, $this->strNpassword, $this->strFecha, $this->strRol, $this->strPtoken, $this->taquilla, $this->intEstatus);
				$request_insert = $this->insert($query_insert,$arrData);

				// Consultar el id del Usuario
				$selec_id = "SELECT * FROM tab_users WHERE 
					correo = '$this->strCorreo'";
				$request_id = $this->select($selec_id);
				$id_usuario = $request_id['usuario_id'];

				// Crear Wallet Única del User
				$wallet = tokenGenerator();
				$walletHash = hash("SHA256", $wallet);
				$saldo = 0;
				$estatus = 1;

				if ($request_id) {
					$query_wallet = "INSERT INTO billetera (usuario_id, direccion, saldo, status) VALUES (?,?,?,?)";
					$arrDatos = array($id_usuario, $walletHash, $saldo, $estatus);
					$request_insert = $this->insert($query_wallet,$arrDatos );
				}

				//Enviar Correo Electrónico
				 $mail = new PHPMailer(true);

				    try {
				         //Server settings
				        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
				        $mail->isSMTP();                                            // Set mailer to use SMTP
				        $mail->SMTPAuth = false;
				        $mail->SMTPAutoTLS = false;
				        $mail->Host       = 'mail.avclatam.com';  // Specify main and backup SMTP servers
				        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
				        $mail->Username   = 'auth@avclatam.com';                     // SMTP username
				        $mail->Password   = '123456789';                               // SMTP password

				        $mail->Port       = 587;                                    // TCP port to connect to

				        //Recipients
				        $mail->setFrom('auth@avclatam.com', 'WINPRO X');
				        $mail->addAddress($this->strCorreo, $this->strNombre);
				        // Content
				        $mail->isHTML(true);                                  // Set email format to HTML
				        $encryotEmail = seD:: encryption($this->strCorreo);
				        $mail->Subject = 'Activar tu cuenta';
				        $nameUser = $this->strNombre;
				        $mail->Body    = 
				        '
						
<div style="background: #00134a; height: 100px; width: 60%;margin: 0 auto;">
                    <div style="margin-right: 35px; margin-left: 35px;">
                        <div style="padding: 1rem;">
                            <h3 style="margin-bottom: 0;">
                                <img style="    width: 200px;" src="http://archivos.wnow.com.co/logo.png" class="logo" alt="" />
                            </h3>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 20px;"></div>

                <div style="padding-right: 10px; padding-left: 10px; margin-right: auto; margin-left: auto; width: 60%;">
                <p style="text-align: center; color:black;">Bienvenido al mundo WINPRO X | Apuestas en linea</p>
                    <h2 style="text-align: center; color:black;">'.$nameUser.'</h2>
                    <p style="text-align: center; margin-top: 50px; color:black;">Para finalizar tu registro haz click en el siguiente link y estará todo listo para comenzar a disfrutar.</p>
                    <div style="margin-top: 50px;">
		
		<a style="  text-decoration: none;
	    			font-size: 13px;
				    color: #01134a;
				    background: white;
				    border: 1px solid;
				    padding: 10px;
				    border-radius: 10px;
				    display: block;
				    margin: auto;
				    width: 35%;
				    text-align: center;" href="http://localhost:8080/winprox/register/confirm/'.$encryotEmail.'">Click aquí para activar</a>

                   
                    <p style="text-align: center;color:black;margin-top: 30px;">Atentamente,<br>Equipo Winpro X</p>
	<p style="font-size:  12px;color:black;margin-top: 40px; text-align: center;">Si el enlace no funciona utiliza el siguiente 
		<a href="http://localhost:8080/winprox/register/confirm/'.$encryotEmail.'">Link: http://localhost:8080/winprox/register/confirm/'.$encryotEmail.'</a>

                </div>
                <div style=" margin-top: 70px;"></div>
                <div style="width: 100%;
                margin: 0 auto;
                background-color: #01134a;
                padding-top: 40px;
                padding-bottom: 40px;
                font-size: 12px;
                font-family: sans-serif;
                color: white;
                text-align: center;"> Copyright 2021 © Winpro X. Todos los derechos reservados.</div>';
				        $mail->send();
				        $return = $request_insert;
				    } catch (Exception $e) {
				        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				    }
				
				$return = "insertar";
			}else{
				$return = "existe";
			}
			return $return;
		}

		public function logUser(string $user, string $pass)
		{
			$this->strUsuario = $user;
			$this->strPass = $pass;
			$sql = "SELECT * FROM tab_users WHERE 
					correo = '$this->strUsuario' and 
					contrasena = '$this->strPass' and 
					status != 0 ";
			$request = $this->select($sql);
			return $request;
		}

		public function sessionLogin(int $id_user){	
			$this->intIdUser = $id_user;
			//Buscar Rol y Datos
			$sql = "SELECT  u.usuario_id,
							u.nombre,
							u.apellidos,
							u.identificacion,
							u.correo,
							u.fecha,
							u.taquilla_id,
							u.status,
							u.user_rol,
							w.direccion,
							w.saldo

					FROM tab_users u 
					INNER JOIN billetera w 
					ON u.usuario_id = w.usuario_id
					INNER JOIN roles r
					ON u.user_rol = r.roles_id
					WHERE u.usuario_id = $this->intIdUser";
			$request = $this->select($sql);
			return $request;
		}

		public function setConfirmUser($id_user)
		{
			$this->strMail = $id_user;
			$this->intStatus = 1;

			$sql = "UPDATE tab_users set status = ? WHERE correo = '{$this->strMail}'";
			$arrData = array($this->intStatus);
			$request = $this->update($sql, $arrData);
			return $request;
		}

		public function crearApuesta($array)
		{
			$this->arrayApuesta = $array;
			$this->strToken = uniqid('WPX'.'-');
			$this->intUserID = $_SESSION['userData']['usuario_id'];
			$this->intRol = $_SESSION['userData']['user_rol'];
			$this->strFecha = date('Y-m-d H:i:s');
			$this->strSaldo = $_SESSION['userData']['saldo'];
			$this->strTaquilla = $_SESSION['userData']['taquilla_id'];
			$this->strStatus = "abierto";
			$this->intCedula = $_SESSION['userData']['identificacion'];
			$this->inversion = $_SESSION['inversion'];
			//dep($this->strFecha);
			if ($this->intRol == 3) {
				$taquilla = "";
				for ($i=0; $i < count($this->arrayApuesta) ; $i++) { 
					$evento = $this->arrayApuesta[$i]['evento'];
					$cuota = $this->arrayApuesta[$i]['cuota'];
					$tipo = $this->arrayApuesta[$i]['tipo'];
					$apostadoA = $this->arrayApuesta[$i]['apostadoA'];
					$ganancia = $this->arrayApuesta[$i]['total'];
					$fecha_evento = $this->arrayApuesta[$i]['fecha_evento'];

					$query_insert = "INSERT INTO apuestas (ticket_id,usuario_id,taquilla_id,evento,cuota,	tipo_apuesta,apostado_a,inversion,ganancia,fecha_evento,fecha_ticket,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
					$arrData =  array($this->strToken, $this->intCedula, $taquilla, $evento, $cuota, $tipo, $apostadoA, $inversion, $ganancia, $fecha_evento, $this->strFecha, $this->strStatus);
					$request_insert = $this->insert($query_insert,$arrData);
				}

				$riezgo = array_column($this->arrayApuesta, 'inversion');
 				$suma = array_sum($riezgo);
 				$descontar = $this->strSaldo - $suma;


 				$sql = "UPDATE billetera set saldo = ? WHERE usuario_id = '{$this->intUserID}'";
				$arrData = array($descontar);
				$request = $this->update($sql, $arrData);
				
				unset($_SESSION['carrito']);
				
				$return = ["respuesta"=> 'usuarioap', "ticket"=>$this->strToken];
				
			}elseif ($this->intRol == 2) {
				$taquilla = $this->strTaquilla;
				$user = 0;
				for ($i=0; $i < count($this->arrayApuesta) ; $i++) { 
					$evento = $this->arrayApuesta[$i]['evento'];
					$cuota = $this->arrayApuesta[$i]['cuota'];
					$tipo = $this->arrayApuesta[$i]['tipo'];
					$apostadoA = $this->arrayApuesta[$i]['apostadoA'];
					$inversion = $this->arrayApuesta[$i]['inversion'];
					$ganancia = $this->arrayApuesta[$i]['total'];
					$fecha_evento = $this->arrayApuesta[$i]['fecha_evento'];

					$query_insert = "INSERT INTO apuestas (ticket_id,usuario_id,taquilla_id,evento,cuota,	tipo_apuesta,apostado_a,inversion,ganancia,fecha_evento,fecha_ticket,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
					$arrData =  array($this->strToken, $user, $taquilla, $evento, $cuota, $tipo, $apostadoA, $inversion, $ganancia, $fecha_evento, $this->strFecha, $this->strStatus);
					$request_insert = $this->insert($query_insert,$arrData);
				}

				$riezgo = array_column($this->arrayApuesta, 'inversion');
 				$suma = array_sum($riezgo);
 				$descontar = $this->strSaldo - $suma;


 				$sql = "UPDATE billetera set saldo = ? WHERE usuario_id = '{$this->intUserID}'";
				$arrData = array($descontar);
				$request = $this->update($sql, $arrData);
				unset($_SESSION['carrito']);

				$return = ["respuesta"=> 'taquillaap', "ticket"=>$this->strToken];
			}
			return $return;
		}

		public function consultBet(string $tick, int $documento)
		{

			$sql = "UPDATE apuestas set usuario_id = ? WHERE ticket_id = '$tick'";
			$arrData = array($documento);
			$request = $this->update($sql, $arrData);
			return $request;
		}

		public function historial(array $event)
		{
			$this->intEvento = $event;
			$idLocal = $this->intEvento['id_local'];
			$idVisita = $this->intEvento['id_visita'];
			$idPartido = $this->intEvento['id_partido'];
			//Consulta Historial para este evento con la api
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v2/fixtures/h2h/".$idLocal."/".$idVisita,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"x-rapidapi-host: api-football-v1.p.rapidapi.com",
					"x-rapidapi-key: 55431c5d19msh4f8c6c4506cb1d5p1de896jsn6084ae1b075c"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$info[] = ['partido_actual' => $idPartido, 'local' => $idLocal, 'visita' => $idVisita];
				$decode = json_decode($response, true);
				$info[] = $decode['api']['fixtures'];
			}
			return $info;
		}

		public function opcionesMas(array $evento)
		{
			$this->intEvento = $event;
			$idLocal = $this->intEvento['id_local'];
			$idVisita = $this->intEvento['id_visita'];
			$idPartido = $this->intEvento['id_partido'];

			//Consultar en la Api
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v3/odds?fixture=677621&bookmaker=8",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"x-rapidapi-host: api-football-v1.p.rapidapi.com",
					"x-rapidapi-key: 55431c5d19msh4f8c6c4506cb1d5p1de896jsn6084ae1b075c"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				$decode = json_decode($response, true);
				
			}
			return $decode;
		}

		public function setUser(string $nombre, int $edad)
		{
			$query_insert = "INSERT INTO user(nombre,edad)VALUES(?,?)";
			$arrData = array($nombre,$edad);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
		}
		
		public function getUser($id)
		{
			$sql = "SELECT * FROM user WHERE id = '$id'";
			$request = $this->select($sql);
			return $request;
		}

		public function getUsers()
		{
			$sql = "SELECT * FROM user";
			$request = $this->select_All($sql);
			return $request;
		}

		public function updateUser(int $id, string $nombre, int $edad )
		{
			$sql = "UPDATE user set nombre = ?, edad = ? WHERE id = '$id'";
			$arrData = array($nombre, $edad);
			$request = $this->update($sql, $arrData);
			return $request;
		}

		public function User(int $id, string $nombre, int $edad )
		{
			$sql = "UPDATE user set nombre = ?, edad = ? WHERE id = '$id'";
			$arrData = array($nombre, $edad);
			$request = $this->update($sql, $arrData);
			return $request;
		}
		public function deleteUser($id)
		{
			$sql = "DELETE FROM user WHERE id = '$id'";
			$request = $this->delete($sql);
			return $request;
		}
	}


?>