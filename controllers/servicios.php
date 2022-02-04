<?php  

Class servicios extends controllers{

	public function __construct()
 		{
 			parent:: __construct();
 			session_start();
 		}

 		public function servicios($params)
 		{	
 			$data['id_page'] = 2;
 			$data['tag_page'] = "Wnow Digital | Creamos tu tienda en linea, Pagina web y Landing page.";
 			$data['title_page'] = "Nuestros Servicios";
 			$data['name_page'] = "Planes y Servicios";
 			$data['page_functions_js'] = "functions_home.js";
 			$this->views->getView($this,"servicios", $data);
 		}
}

?>