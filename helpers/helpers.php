<?php


	// Retorna la url del proyecto
	function base_url()
	{
		return BASE_URL;
	}

	//Retorna la url assets
	function media()
	{
		return BASE_URL."assets";
	}

/*-------  Templates/Home   -------*/

	// llamado al header Home del sitio web
	function headerHome($data="")
	{
		$view_header = "views/templates/home/header.php";
		require_once ($view_header);
	}

	// llamado al footer Home del sitio web
	function footerHome($data="")
	{
		$view_footer = "views/templates/home/footer.php";
		require_once ($view_footer);
	}

	// llamado al Nav Home del sitio web
	function navHome($data="")
	{
		$view_nav = "views/templates/home/nav.php";
		require_once ($view_nav);
	}

/*-------  Templates/Home/oficina   -------*/

	// llamado al header Home del sitio web
	function headerOficina($data="")
	{
		$view_header = "views/templates/oficina/header.php";
		require_once ($view_header);
	}

	// llamado al footer Home del sitio web
	function footerOficina($data="")
	{
		$view_footer = "views/templates/oficina/footer.php";
		require_once ($view_footer);
	}

	// llamado al Nav Home del sitio web
	function navOficina($data="")
	{
		$view_nav = "views/templates/oficina/nav.php";
		require_once ($view_nav);
	}

	function navTop($data="")
	{
		$view_navTop = "views/templates/oficina/nav-top.php";
		require_once ($view_navTop);
	}


/*------- Templates/Notificaciones -------*/
	// llamado al archivo de notificaciones 
	function notifyData($data="")
	{
		$view_header = "views/templates/notify/notify.php";
		require_once ($view_header);
	}
	
/*-------  Templates/auth  -------*/
	// llamado al Header Authentication
	function headerAuth($data="")
	{
		$view_footer = "views/templates/auth/header.php";
		require_once ($view_footer);
	}

	// llamado al Header Authentication
	function footerAuth($data="")
	{
		$view_footer = "views/templates/auth/footer.php";
		require_once ($view_footer);
	}

/*-------  Template/sliders -------*/

	// llamado slider login y register
	function sliderAuth($data="")
	{
		$view_slider = "views/templates/sliders/auth/auth_slider.php";
		require_once ($view_slider);
	}

	function sliderHome($data="")
	{
		$view_slider = "views/templates/sliders/home/home_slider.php";
		require_once ($view_slider);
	}


	// Productos recientes
	function productosRecientes($data="")
	{
		$view_pRecientes = "views/tienda/bloques/recientes.php";
		include ($view_pRecientes);
	}

	// Productos recientes
	function getFile(string $url,$data)
	{
		ob_start();
		require_once("views/{$url}.php");
		$file = ob_get_clean();
		return $file;
	}

	//mostrar mini cart
	function miniCart($data)
	{
		$view_miniCart = "views/templates/home/minicart.php";
		include ($view_miniCart);
	}

	
	// Formato para los Arrays
	function dep($data)
	{
		$format = print_r('<pre>');
		$format .= print_r($data);
		$format .= print_r('</pre>');
		return $format;
	}

	// llamado al phpMailler Exception
	function phpmailler($data="")
	{
		$view_exceptions = "libraries/plugins/phpmailler/Exception.php";
		require ($view_exceptions);

		$view_phpmailer = "libraries/plugins/phpmailler/PHPMailer.php";
		require ($view_phpmailer);

		$view_smtp = "libraries/plugins/phpmailler/SMTP.php";
		require ($view_smtp);
	}

	//Llamado a los modales
	function getMail(string $nameMail)
	{
		$view_mail = "views/templates/emails/{$nameMail}.php";
		require $view_mail;
	}

	// Elimina espacios caracteres e intentos de insertción sql.
	function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }
	// Generador de contraseñas
	function passGenerator($length = 15)
	{
		$pass = "";
		$longitudPass = $length;
		$cadena ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789*@$";
		$longitudCadena=strlen($cadena);

		for($i=1; $i<=$longitudPass; $i++)
		{
			$pos = rand(0,$longitudCadena-1);
			$pass .= substr($cadena, $pos,1);
		}
		return $pass;
	}


	// Cargar imgs al servidor

	function uploadImage(array $data, string $name){
        $url_temp = $data['tmp_name'];
        $destino    = $_SERVER['DOCUMENT_ROOT'].'/qa/assets/img/uploads/'.$name;        
        $move = move_uploaded_file($url_temp, $destino);
        return $move;
    }

	//Genera un Token para confirmaciones
	function tokenGenerator()
	{
		$r1 = bin2hex(random_bytes(10));
		$r2 = bin2hex(random_bytes(10));
		$r3 = bin2hex(random_bytes(10));
		$r4 = bin2hex(random_bytes(10));
		$r5 = bin2hex(random_bytes(10));
		$token  = $r1.'-'.$r2.'-'.$r3.'-'.$r4.'-'.$r5;
		return $token;
	}

	// Formato para Valores Monetarios
	function formatMoney($cantidad)
	{
		$cantidad = number_format($cantidad,0,SPD,SPM);
		return $cantidad;
	}

	

	// Encriptar Datos
	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','$AVClatam2021');
	define('SECRET_IV','32669221');
	class seD {
		public static function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
		public static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}
	}

	//Api Rest

	function consultHoy($data="")
	{
		$view_partidosHoy = "libraries/apirest/futbol/partidos-hoy.php";
		require ($view_partidosHoy);

		
	}
?>