<?php

	require_once("models/tproducto.php");

 	Class tienda extends controllers{

 		public function __construct()
 		{
 			parent:: __construct();
 			session_start();
 		}

 		public function tienda($params)
 		{	

 			if (!empty($params)) {
 				$busqueda = $params;
 				var_dump($busqueda);
 			}
 			$data['id_page'] = 7;
 			$data['tag_page'] = "AVC Latam | Tienda: Todos los productos";
 			$data['title_page'] = "Tienda: Todos los productos";
 			$data['name_page'] = "Tienda";
 			$data['page_functions_js'] = "functions_tienda.js";
 			$this->views->getView($this,"tienda", $data);
 		}

 		public function producto($params)
 		{	
 			if (empty($params)) {
 				header("location:".base_url());
 			}else{

 				$producto = strClean($params);
 				$idp = seD:: decryption($producto);

 				
 				$data['id_page'] = 8;
	 			$data['tag_page'] = "AVC Latam | Detalle de Producto";
	 			$data['title_page'] = "Tienda: Detalle de producto";
	 			$data['name_page'] = "Producto";
	 			$data['producto'] = $this->model->getProductD($idp);
	 			$data['img_prod'] = $this->model->getImagenes($idp);
	 			if (empty($data['producto'])) {
	 				header("location:".base_url());
	 			}
	 			$data['relacionados'] = "";
	 			$data['page_functions_js'] = "functions_producto.js";
	 			$this->views->getView($this,"producto", $data);
 			}
 		}

 		public function addCarrito()
 		{
 			if ($_POST) {
 				$arrCarrito = array();
 				$cantCarrito = 0;
 				$idProducto = sed:: decryption($_POST['id']);
 				$cantidad = strClean($_POST['cant']);
 				if (is_numeric($idProducto) and is_numeric($cantidad)) {
 					$arrProductoD = $this->model->getProductD($idProducto);
 					$_SESSION['stock'] = $arrProductoD['unidades'];
 					if (!empty($arrProductoD)) {

 						foreach ($_SESSION['arrCarrito'] as $producto) {
 							$idProd = $producto['idProducto'];
 							$cantStok = $producto['cantidad'];
 						}

 						if ($idProd == $idProducto ) {
 							$_SESSION['stock'] = $arrProductoD['unidades'] - $cantStok;
 						}else{
 							$_SESSION['stock'] = $arrProductoD['unidades'];
 						}

 						if ($_SESSION['stock'] > 0) {
 							if ($_SESSION['stock'] < $cantidad) {
 								$arrResponse = array("status" => false , "msg" => 'Stock insuficiente' );
 							}else{
 								$_SESSION['stock'] -= $cantidad;
 								$arrProductoC = array('idProducto' => $idProducto,
 													  'producto' => $arrProductoD['nombre']	,
 													  'cantidad' => $cantidad,
 													  'precio' => $arrProductoD['precio']);
 								if (isset($_SESSION['arrCarrito'])) {
 									$on = true;
 									$arrCarrito = $_SESSION['arrCarrito'];

 									for ($pr=0; $pr < count($arrCarrito); $pr++) { 
 										if ($arrCarrito[$pr]['idProducto'] == $idProducto) {
 											//validar si puede agregar o no NO OLVIDAR
 											$arrCarrito[$pr]['cantidad'] += $cantidad;
 											$on = false;
 										}
 									}
 									if ($on) {
 										array_push($arrCarrito, $arrProductoC);
									}
									$_SESSION['arrCarrito'] = $arrCarrito;

 								}else{
 									array_push($arrCarrito, $arrProductoC);
 									$_SESSION['arrCarrito'] = $arrCarrito;
 								}

 								foreach ($_SESSION['arrCarrito'] as $pro) {
 									$cantCarrito += $pro['cantidad'];
 									
 								}

 								$htmlCarrito = getFile('templates/home/minicart', $_SESSION['arrCarrito']);
 								$arrResponse = array("status" => true,
 													 "msg" => 'Producto agregado al carrito',
 													 "cantCarrito" => $cantCarrito,
 													 "htmlCarrito" => $htmlCarrito
 													);
 							}
 						}else{
 							$arrResponse = array("status" => false , "msg" => 'Producto sin stock.' );
 						}
 					}else{
 						$arrResponse = array("status" => false , "msg" => 'Producto inexistente.' );
 					}
 					
 				}else{
 					$arrResponse = array("status" => false , "msg" => 'Dato incorrecto.' );
 				}
 				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
 			}
 			die();
 		}

 		

 		public function carrito($params)
 		{
 				$data['id_page'] = 9;
	 			$data['tag_page'] = "AVC Latam | Carrito de Compras";
	 			$data['title_page'] = "Carrito de Compras";
	 			$data['name_page'] = "carrito";
	 			$data['relacionados'] = "";
	 			$data['page_functions_js'] = "functions_carrito.js";
	 			$this->views->getView($this,"carrito", $data);
 		}

 		public function dellCarrito()
 		{
 			# code...
 		}
 		

 		public function busqueda($params)
 		{	
 			$data['id_page'] = 12;
 			$data['tag_page'] = "AVC Latam | Tienda: Encuentra el producto que buscas";
 			$data['title_page'] = "Busqueda: Todos los productos";
 			$data['name_page'] = "Buscar Productos";
 			$data['page_functions_js'] = "functions_busqueda.js";
 			$this->views->getView($this,"busqueda", $data);
 		}
 		
 	}/// End Class Home


?>