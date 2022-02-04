<?php

 	Class office extends controllers{

 		
 		public function __construct()
 		{
 			parent:: __construct();
 			
 			session_start();

 			if (!isset($_SESSION['login'])) {
 				 header("Location:".base_url().'login');

 			}
 			
 			
 		}

 		public function oficina($params)
 		{	
 			$data['id_page'] = 10;
 			$data['tag_page'] = "AVC Latam | Oficina Virtual";
 			$data['title_page'] = "Oficina Virtual";
 			$data['name_page'] = "Office";
 			$data['page_functions_js'] = "functions_office.js"; 

 			$this->views->getView($this,"oficina", $data);
 		}

 		public function productos($params)
 		{	
 			$data['id_page'] = 11;
 			$data['tag_page'] = "AVC Latam | Oficina Virtual Administra Productos";
 			$data['title_page'] = "Oficina Virtual Administra Productos";
 			$data['name_page'] = "adminProductos";
 			$data['session'] = $_SESSION['user_id'];
 			$data['departamentos'] = $this->model->getDepartamentos();
 			$data['page_functions_js'] = "functions_adminProd.js"; 

 			$this->views->getView($this,"productos", $data);
 		}

 		public function setProduct()
 		{
 			$nProducto = strClean($_POST['strPname']);
 			$nReferencia = strClean($_POST['strReferencia']);
 			$nMarca = strClean($_POST['strMarca']);
 			$nDescript = strClean($_POST['strDescript']);
 			$nPrecio = strClean($_POST['strPrecio']);
 			$nUnidades = strClean($_POST['intUnidades']);
 			$nTransact = strClean($_POST['strTransact']);
 			$nTipo = strClean($_POST['tproducto']);
 			$nCatego = strClean($_POST['strCatego']);
 			$this->intUser = $_SESSION['user_id'];

 			$request_producto = $this->model->addProducto($nProducto, $nReferencia, $nMarca, $nDescript, $nPrecio, $nUnidades, $nTransact, $nTipo, $nCatego, $this->intUser);
 			if ($request_producto > 0) {
 				$arrResponse = array("status" => true, "msg" => 'Producto registrado exitosamente.');
 			}else{
 				$arrResponse = array("status" => false, "msg" => 'No se pudo insertar');
 			}
 			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
 		}

 		public function getSelectCategorias()
		{
			$pTipo = strClean($_POST['tipo']);
			$arrData = $this->model->selectCaterias($pTipo);
			if ($arrData) {

				$cadena = "<label>Categoría</label>
						   <select required='required' class='form-control radus-select' id='strCatego' name='strCatego' aria-label='categoria'>
						   <option id='intCatego' value='0' disabled='' selected=''>Seleccionar...</option>";

				for ($i=0; $i < count($arrData) ; $i++) { 
					$idCategoria = $arrData[$i]['id_categoria'];
					$nombreCategoria = $arrData[$i]['nombre_categoria'];

					$cadena = $cadena.'<option value='.$idCategoria.'>'.$nombreCategoria.'</option>';
				}

				echo $cadena."</select>";
			}
			
		}

		public function getSelectSubCategorias()
		{
			$subCatego = strClean($_POST['sub']);
			$arrDato = $this->model->selectSubCaterias($subCatego);
			if ($arrDato) {

				$select = "<label>Sub Categoría</label>
						   <select required='required' class='form-control radus-select' id='strSubCatego' name='strSubCatego' aria-label='categoria'>
						    <option value='0' disabled='' selected=''>Seleccionar...</option>";

				for ($i=0; $i < count($arrDato) ; $i++) { 
					$idCategoria = $arrDato[$i]['id_categoria'];
					$nombreCategoria = $arrDato[$i]['nombre_categoria'];

					$select = $select.'<option value='.$idCategoria.'>'.$nombreCategoria.'</option>';
				}

				echo $select."</select>";
			}
			
		}

		public function getSelectTipoProducto()
		{
			$tioProducto = strClean($_POST['tproducto']);
			$arrDato = $this->model->selectTipoProducto($tioProducto);
			if ($arrDato) {

				$select = "<label>Tipo de Producto</label>
						   <select required='required' class='form-control radus-select' id='strTipoProducto' name='strTipoProducto' aria-label='categoria'>
						    <option value='0' disabled='' selected=''>Seleccionar...</option>";

				for ($i=0; $i < count($arrDato) ; $i++) { 
					$idCategoria = $arrDato[$i]['id_categoria'];
					$nombreCategoria = $arrDato[$i]['nombre_categoria'];

					$select = $select.'<option value='.$idCategoria.'>'.$nombreCategoria.'</option>';
				}

				echo $select."</select>";
			}
			
		}

		public function getSelectMarcas()
		{
			$marca = strClean($_POST['marcas']);
			$arraData = $this->model->selectpMarca($marca);
			if ($arraData) {

				$select = "<label>Marcas</label>
						   <select required='required'  class='form-control radus-select' id='strMarca' name='strMarca' aria-label='marcas disponibles'>
						    <option value='0' disabled='' selected=''>Seleccionar...</option>";

				for ($i=0; $i < count($arraData) ; $i++) { 
					$idMarca = $arraData[$i]['marcas_id'];
					$nombreMarca = $arraData[$i]['nombre'];

					$select = $select.'<option value='.$idMarca.'>'.$nombreMarca.'</option>';
				}

				echo $select."</select>";
			}
			
		}

		public function getSelectCiudades()
		{
			$ciudad = strClean($_POST['ciudades']);
			$arraData = $this->model->selectCiudades($ciudad);
			if ($arraData) {

				$select = "<label>Ciudad</label>
						   <select required='required' class='form-control radus-select' id='strCiudad' name='strCiudad' aria-label='ciudades de Colombia'>
						    <option value='0' id='intCiudad' disabled='' selected=''>Seleccionar...</option>";

				for ($i=0; $i < count($arraData) ; $i++) { 
					$idCiudad = $arraData[$i]['id'];
					$nombreCiudad = $arraData[$i]['nombre'];

					$select = $select.'<option value='.$idCiudad.'>'.$nombreCiudad.'</option>';
				}

				echo $select."</select>";
			}
			
		}

		// public function getProducto($id)
		// {
		// 	$idproducto = intval($id);
		// 	if ($idproducto > 0) {
		// 		$arrData = $this->model->buscProducto($idproducto);
		// 		if (empty($arrData)) {
		// 			$arrResponse = array('status' => false, 'msg' => 'Producto no encontrado');
		// 		}else{
		// 			$arrImg = $this->model->buscImagenes($idproducto);
		// 			if (count($arrImg)) {
		// 				# code...
		// 			}
		// 		}
		// 		dep($arrData);
		// 		die();
		// 	}
		// }

		public function setImage()
		{
			if (empty($_POST['idproducto'])) {
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			}else{

				$idProducto = intval($_POST['idproducto']);
				$foto = $_FILES['foto'];
				$imgNombre = 'prod_'.md5(date('d-m-Y H:m:s')).'.jpg';
				$request_image = $this->model->addImg($idProducto, $imgNombre);
				if ($request_image) {
					$uploadImage = uploadImage($foto, $imgNombre);
					$arrResponse = array('status' => true, 'imgname' => $imgNombre, 'msg' => 'Archivo Cargado');

				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error de carga');
				}
				
			} 
			sleep(1);
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			die();
		}

		public function regProd()
		{
			if ($_POST) {
				$user = $_SESSION['user_id'];
				$transaccion = strClean($_POST['strTransact']);
				$tProducto = strClean($_POST['tproducto']);
				$categoria = strClean($_POST['strCatego']);
				$subcategoria = strClean($_POST['strSubCatego']);
				$producto = strClean($_POST['strTipoProducto']);
				$marca = strClean($_POST['strMarca']);
				$departamento = strClean($_POST['strDepartamento']);
				$ciudad = strClean($_POST['strCiudad']);
				$envio = strClean($_POST['strEnvio']);
				$idProducto = $_POST['idProducto'];
				$precio = strClean($_POST['strPrecio']);
				$descuento = strClean($_POST['strPrecioDesc']);
				$cantidad = intval($_POST['intCantidad']);
				$referencia = strClean($_POST['strReferencia']);
				$descripcion = strClean($_POST['strDescript']);
 // dep($user.'<br>'.$transaccion.'<br>'. $tProducto.'<br>'.$categoria.'<br>'.$subcategoria.'<br>'.$producto.'<br>'.$marca.'<br>'.$departamento.'<br>'.$ciudad.'<br>'.$envio.'<br>'.$idproducto.'<br>'.$nombreProducto.'<br>'.$precio.'<br>'.$descuento.'<br>'.$cantidad.'<br>'.$referencia.'<br>'.$descripcion);
				if ($idProducto == "") {
					$option = 1;
					$request_prod = $this->model->insertProducto($user,$transaccion,$tProducto,$categoria,$subcategoria,$producto,$marca,$departamento,$ciudad,$envio,$precio,$descuento,$cantidad,$referencia,$descripcion);
				}else{
					$option = 2;
					$request_prod = $this->model->updateProducto($idProducto,$user,$transaccion,$tProducto,$categoria,$subcategoria,$producto,$marca,$departamento,$ciudad,$envio,$precio,$descuento,$cantidad,$referencia,$descripcion);
				}
				if ($request_prod > 0) {
					
					if ($option == 1) {
					$arrResponse = array('status' => true, 'idproducto' => $request_prod, 'msg' => 'Haz guardado tu producto, ahora podrás agregar imagenes al producto.', 'option' => 1);
					}else{
						$arrResponse = array('status' => true, 'idproducto' => $idProducto, 'msg' => 'Producto actualizado correctamente', 'option' => 2);
					}

				}else{
					$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
				die();
			
			}
		}

		public function getProductos()
		{   

			$this->intUser = $_SESSION['user_id'];		
			
			$arrData = $this->model->selectProductos($this->intUser);
			for ($i=0; $i < count($arrData); $i++) {
				$btnEdit = '<button style="border: none;" title="Editar" onclick="fntEditInfo('.$arrData[$i]['id'].')" class="badge badge-success">+</button>';
				$btnDelete = '<button style="border: none;" title="Borrar" onclick="fntDelInfo('.$arrData[$i]['id'].')" class="badge badge-danger">-</button>';

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				$arrData[$i]['precio'] = SPESO.' '.formatMoney($arrData[$i]['precio']);
				
				$arrData[$i]['options'] = '<div class="text-center">'.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		}
			
		public function getProducto($idproducto)
		{
			$idProduct = intval($idproducto);
			if ($idProduct > 0) {
				$arrData = $this->model->buscProducto($idProduct);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
				}else{
					$arrImg = $this->model->selectImg($idProduct);
					if (count($arrImg > 0)) {
						for ($i=0; $i < count($arrImg); $i++) { 
							$arrImg[$i]['url_image'] = media().'/img/uploads/'.$arrImg[$i]['foto'];
						}
					}
					$arrData['images'] = $arrImg;
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
				die();
			}
		}
 		
 		public function delProducto()
 		{
 			if($_POST){
				$intIdproducto = intval($_POST['idProducto']);
				$requestDelete = $this->model->deleteProducto($intIdproducto);
				if($requestDelete)
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el producto');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
				
			}
			die();
 		}
 	}/// End Class Home


?>