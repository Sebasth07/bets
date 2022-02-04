<?php  

// Requerir los archivos de phpMailler
phpmailler($data="");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

Class registerModel extends mysql
	{	
		// register 
		private $strNombre;
		private $strApellido;
		private $strCorreo;
		private $strPassword;
		private $strCpassword;

		//confrim
		private $strMail;
		private $intStatus;
		
		public function __construct()
		{
			parent::__construct();
		}

		public function searchUser(string $nombre, string $apellido, string $email, string $contraseña, string $ccontraseña)
		{
			$return = "";
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strCorreo = $email;
			$this->strPassword = $contraseña;
			$this->strCpassword = $ccontraseña;
			$this->strToken = uniqid('usr'.'-');
			$this->strNpassword = hash("SHA256", $this->strPassword);
			$this->strName = $this->strNombre." ".$this->strApellido;
			$this->strFecha = date("y-m-d");
			$this->strRol = 3;
			$this->intPack = 1;
			$this->strPtoken = "";
			$this->intEstatus = 0;
			
			$sql = "SELECT * FROM users WHERE email = '{$this->strCorreo}' ";
			$request = $this->select_All($sql);

			if ($this->strPassword != $this->strCpassword) {
				$return = 'wrongpw';
			}elseif (strlen($this->strPassword) < 6) {
				$return = 'pwshort';
			}elseif (!preg_match("/^[a-zA-Z]+$/",$this->strNombre)) {
				$return = 'wronname';
			}elseif (!preg_match("/^[a-zA-Z]+$/",$this->strApellido)) {
				$return = 'wronlname';
			}elseif (empty($request)) {
				
				$query_insert = "INSERT INTO users (unique_id,username,roles_id,password,email,pack_id,fecha_registro,token,status) VALUES(?,?,?,?,?,?,?,?,?)";
				$arrData =  array($this->strToken, $this->strName, $this->strRol, $this->strNpassword, $this->strCorreo, $this->intPack, $this->strFecha, $this->strPtoken, $this->intEstatus);
				$request_insert = $this->insert($query_insert,$arrData);

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
				        $mail->setFrom('auth@avclatam.com', 'AVC LATAM');
				        $mail->addAddress($this->strCorreo, $this->strName);
				        // Content
				        $mail->isHTML(true);                                  // Set email format to HTML
				        $encryotEmail = seD:: encryption($this->strCorreo);
				        $mail->Subject = 'Activar tu cuenta';
				        $nameUser = $this->strName;
				        $mail->Body    = 
				        '
						
<div style="background: #3b8c97; height: 100px; width: 80%;margin: 0 auto;">
                    <div style="margin-right: 35px; margin-left: 35px;">
                        <div style="padding: 1rem;">
                            <h3 style="margin-bottom: 0;">
                                <img style="    width: 200px;" src="http://archivos.wnow.com.co/loogocorreos.png" class="logo" alt="" />
                            </h3>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 20px;"></div>

                <div style="padding-right: 10px; padding-left: 10px; margin-right: auto; margin-left: auto; width: 60%;">
                <p style="text-align: center; color:black;">Bienvenido al mundo AVC Latam</p>
                    <h2 style="text-align: center; color:black;">'.$nameUser.'</h2>
                    <p style="text-align: justify; margin-top: 50px; color:black;">Aquí podrás Alquilar, Vender o Comprar lo que necesites. Para finalizar tu registro haz click en el siguiente link y estará todo listo para comenzar a disfrutar.</p>
                    <div style="margin-top: 50px;">
		
		<a style="  text-decoration: none;
	    			font-size: 13px;
				    color: #3b8c97;
				    background: white;
				    border: 1px solid;
				    padding: 10px;
				    border-radius: 10px;
				    display: block;
				    margin: auto;
				    width: 35%;
				    text-align: center;" href="http://localhost:8080/winprox/register/confirm/'.$encryotEmail.'">Click aquí para activar</a>

                   
                    <p style="text-align: center;color:black;margin-top: 30px;">Atentamente,<br>Equipo Winpro X</p>
	<p style="font-size:  12px;color:black;margin-top: 40px;">Si el enlace no funciona utiliza el siguiente 
		<a href="http://localhost:8080/winprox/register/confirm/'.$encryotEmail.'">Link: http://localhost:8080/winprox/register/confirm/'.$encryotEmail.'</a>

                </div>
                <div style=" margin-top: 70px;"></div>
                <div style="width: 100%;
                margin: 0 auto;
                background-color: #3b8c97;
                padding-top: 50px;
                padding-bottom: 50px;
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

		public function setConfirmUser($id_user)
		{
			$this->strMail = $id_user;
			$this->intStatus = 1;

			$sql = "UPDATE tab_users set status = ? WHERE correo = '{$this->strMail}'";
			$arrData = array($this->intStatus);
			$request = $this->update($sql, $arrData);
			return $request; 
		}

	}// Finaliza registerModel



?>