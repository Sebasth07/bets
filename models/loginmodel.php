<?php


phpmailler($data="");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class loginModel extends mysql
	{
		//login User
		private $intIdUser;
		private $strUsuario;
		private $strPass;
		private $strToken;

		//reset Pass

		private $strCorreo;
		
		 public function __construct()
		{
			parent::__construct();
		}

		public function logUser(string $user, string $pass)
		{
			$this->strUsuario = $user;
			$this->strPass = $pass;
			$sql = "SELECT * FROM users WHERE 
					email = '$this->strUsuario' and 
					password = '$this->strPass' and 
					status != 0 ";
			$request = $this->select($sql);
			return $request;
		}

		public function sessionLogin(int $id_user){	
			$this->intIdUser = $id_user;
			//Buscar Rol y Datos
			$sql = "SELECT  u.user_id,
							u.unique_id,
							u.username,
							u.email,
							u.pack_id,
							u.fecha_registro,
							u.status

					FROM users u 
					INNER JOIN user_rol r
					ON u.roles_id = r.id_roles
					WHERE u.user_id = $this->intIdUser";
			$request = $this->select($sql);
			return $request;
		}

		public function consultMail(string $email)
		{
			$this->strCorreo = $email;
			$sql = "SELECT *
					FROM tab_users u 
					WHERE correo = '$this->strCorreo'";
			$request = $this->select($sql);
			return $request;
		}

		public function setToken(string $email, string $token)
		{	
			$this->strCorreo = $email;
			$this->strToken = $token;
			
			$sql = "UPDATE tab_users set token = ? WHERE correo = '{$this->strCorreo}'";
			$arrData = array($this->strToken);
			$request = $this->update($sql, $arrData);
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
				        $mail->setFrom('auth@avclatam.com', 'Winpro X');
				        $mail->addAddress($this->strCorreo);
				        // Content
				        $mail->isHTML(true);                                  // Set email format to HTML
				        $encryotToken = $this->strToken;
				        $mail->Subject = 'Solicitud cambio de contrasena';
				        $nameUser = $this->strCorreo;
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
<p style="text-align: center; color:black;">Hemos recibido una solicitud para cambiar su contraseña</p>
    <h2 style="text-align: center; color:black;">'.$nameUser.'</h2>
    <p style="text-align: justify;
    margin-top: 50px;
    color: black;
    width: 80%;
    margin: auto;">En el siguiente boton podrás acceder para cambiar tu contraseña, de lo contrario si usted no realizo ninguna solicitud, alguien está intentando obtener su contraseña por lo que recomendamos mejorar la seguridad de la misma desde dashboard..</p>
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
    text-align: center;" href="http://localhost:8080/winprox/login/reset/'.$encryotToken.'">Cambiar Contraseña</a>

   
    <p style="text-align: center;color:black;margin-top: 30px;">Atentamente,<br>Equipo Winpro X</p>
<p style="font-size:  12px;color:black;margin-top: 40px; text-align: center;">Si el enlace no funciona utiliza el siguiente 
<a href="http://localhost:8080/winprox/login/reset/'.$encryotToken.'">Link: http://localhost:8080/winprox/login/reset/'.$encryotToken.'</a>

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
				    } catch (Exception $e) {
				        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				    }

			return $request;
			
		}

		public function changePass(string $token, string $password, string $cpassword)
		{	
			$return = '';
			$this->strToken = $token;
			$this->strPass = $password;
			$this->strCpass = $cpassword;
			$this->strNpassword = hash("SHA256", $this->strPass);
			$this->newToken = " ";

			$sql = "SELECT * FROM tab_users WHERE token = '{$this->strToken}' ";
			$request = $this->select_All($sql);

			if (empty($request)) {
				$return = 'expired';
			}
			elseif ($this->strPass != $this->strCpass) {
				$return = 'pwwrong';
			}
			elseif (strlen($this->strPass) < 6) {
				$return = 'pwshort';
			}
			else{

				$sql = "UPDATE tab_users set contrasena = ? WHERE token = '{$this->strToken}'";
				$arrData = array($this->strNpassword);
				$request = $this->update($sql, $arrData);
				
				if ($request) {

					$sql = "UPDATE tab_users set token = ? WHERE token = '{$this->strToken}'";
					$arrData = array($this->newToken);
					$request = $this->update($sql, $arrData);
					
					$return = 'exitoso';
				}
			}
			return $return;
		}

		
	}


?>