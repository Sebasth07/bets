<?php

	Class oficina extends controllers{

		public function __construct()
 		{
 			parent:: __construct();
 			
 			session_start();

 			if (!isset($_SESSION['login'])) {
 				 header("Location:".base_url());

 			}
 			
 		}// End Function

 		public function oficina($params)
 		{	
 			$data['id_page'] = 3;
 			$data['tag_page'] = "Wnow Pro X | Oficina Virtual";
 			$data['title_page'] = "Oficina Virtual";
 			$data['name_page'] = "Office";
 			$data['page_functions_js'] = "functions_office.js"; 

 			$this->views->getView($this,"oficina", $data);
 		}
 			
 		public function usuario($params)
 		{	
 			$data['id_page'] = 4;
 			$data['tag_page'] = "Wnow Pro X | Oficina Virtual";
 			$data['title_page'] = "Oficina Virtual";
 			$data['name_page'] = "Office";
 			$data['page_functions_js'] = "functions_office.js"; 

 			$this->views->getView($this,"usuario", $data);
 		}

 		public function billetera($params)
 		{	
 			$data['id_page'] = 5;
 			$data['tag_page'] = "Wnow Pro X | Oficina Virtual";
 			$data['title_page'] = "Oficina Virtual";
 			$data['name_page'] = "Office";
 			$data['page_functions_js'] = "functions_office.js"; 

 			$this->views->getView($this,"billetera", $data);
 		}

 			public function transefer()
 			{
 				if ($_POST) {
 					$monto = strClean($_POST['monto']);
 					$fee = strClean($_POST['fee']);
 					$wallet = strClean($_POST['wallet']);
 					$saldo = strClean($_POST['saldo']);
 					$from = strClean($_POST['from']);
 					$user = strClean($_POST['user']);

 					$consultar = $this->model->findWallet($wallet, $user, $fee, $monto, $saldo, $from);

 					if ($consultar == 'saldoi') {
	 			 		$arrResponse = array("status" => false, "msg" => 'Saldo insuficiente, no posees el monto para realizar esta transaccion.');
	 					}
 					elseif ($consultar == 'montowrong') {
 						$arrResponse = array("status" => false, "msg" => 'El saldo a enviar debe ser un dato numerico.');
 					}
 					elseif ($consultar == 'nowallet') {
 						$arrResponse = array("status" => false, "msg" => 'La direccion a la que intenta enviar no existo o es incorrecta.');
 					}
 					elseif ($consultar == 'funciono') {
 						$arrResponse = array("status" => true, "msg" => 'Saldo actualizado por ahora.');
 					}
 					echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 					die();
 				}
 			}


	} // End Class 

?>