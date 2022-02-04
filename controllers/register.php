<?php


 	Class register extends controllers{

 		public function __construct()
 		{
 			parent:: __construct();

 			session_start();

 			if (isset($_SESSION['login'])) {
 				 header("Location:".base_url());
 			}
 		}


 		public function confirm($params)
 		{	
 			if (empty($params)) {
 				header("location:".base_url());
 			}else{

 				$idEncrypt = strClean($params);
 				$idMail = seD:: decryption($idEncrypt);

 			$data['id_page'] = 6;
 			$data['tag_page'] = "AVC Latam | Confirma tu cuenta";
 			$data['title_page'] = "Confirma tu cuenta";
 			$data['name_page'] = "Confirmar registro";
 			$data['confirm'] = $this->model->setConfirmUser($idMail);
	 			if ($data['confirm']) {
						$_SESSION['notify'] = 23;
					}else{
						$_SESSION['notify'] = 0;
				}
 			$data['page_functions_js'] = "functions_confirm.js";
 			$this->views->getView($this,"confirm", $data);

 			}
 		}


 	}// End Class register


?>