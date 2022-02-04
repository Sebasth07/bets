<?php  

class officeModel extends mysql
	{	
		// register product
		private $intTransacion;
		private $intTproducto;
		private $intCategoria;
		private $intSubCategoria;
		private $intProducto;
		private $intMarca;
		private $intDepartamento;
		private $intCiudad;
		private $intEnvio;
		private $strToken;
		private $strFecha;
		private $intUsuario;
		private $intCantidad;
		private $strNombre;
		private $intPrecio;
		private $intPrecioDesc;
		private $strDescripcion;
		private $strReferencia;
		private $intIdProd;

		public function __construct()
		{
			parent::__construct();
		}

		public function insertProducto(int $usuario,int $transact,int $tipo,int $categoria,int $subcatego,int $producto,int $marca,int $departameto,int $ciudad,int $envio,int $precio,int $descuent,int $cantidad,string $ref,string $descript)
		{
			$this->intUsuario = $usuario;
			$this->intTransacion = $transact;
			$this->intTproducto = $tipo;
			$this->intCategoria = $categoria;
			$this->intSubCategoria = $subcatego;
			$this->intProducto = $producto;
			$this->intMarca = $marca;
			$this->intDepartamento = $departameto;
			$this->intCiudad = $ciudad;
			$this->intEnvio = $envio;
			$this->intPrecio = $precio;
			$this->intPrecioDesc = $descuent;
			$this->intCantidad = $cantidad;
			$this->strReferencia = $ref;
			$this->strDescripcion = $descript;
			$this->strToken = uniqid('pdo'.'-');
			$this->strFecha = date("y-m-d");
			$this->intStatus = 1; 



			$query_insert = "INSERT INTO productos (id_unique,referencia,marca,descripcion,precio,descuento,unidades,	id_propietario,status,transaccion,tipo,categoria,subcategoria,producto,departamento,ciudad,envio,fecha) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$arrData =  array($this->strToken,$this->strReferencia,$this->intMarca,$this->strDescripcion,$this->intPrecio,$this->intPrecioDesc,$this->intCantidad,$this->intUsuario,$this->intStatus,$this->intTransacion,$this->intTproducto,$this->intCategoria,$this->intSubCategoria,$this->intProducto,$this->intDepartamento,$this->intCiudad,$this->intEnvio,$this->strFecha);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
		}

		public function updateProducto(int $id,int $usuario,int $transact,int $tipo,int $categoria,int $subcatego,int $producto,int $marca,int $departameto,int $ciudad,int $envio,int $precio,int $descuent,int $cantidad,string $ref,string $descript)
		{
			$this->intIdProd = $id;
			$this->intUsuario = $usuario;
			$this->intTransacion = $transact;
			$this->intTproducto = $tipo;
			$this->intCategoria = $categoria;
			$this->intSubCategoria = $subcatego;
			$this->intProducto = $producto;
			$this->intMarca = $marca;
			$this->intDepartamento = $departameto;
			$this->intCiudad = $ciudad;
			$this->intEnvio = $envio;
			$this->intPrecio = $precio;
			$this->intPrecioDesc = $descuent;
			$this->intCantidad = $cantidad;
			$this->strReferencia = $ref;
			$this->strDescripcion = $descript;
			$this->strToken = uniqid('pdo'.'-');
			$this->strFecha = date("y-m-d");
			$this->intStatus = 1; 



			$sql = "UPDATE productos
					SET transaccion=?, tipo=?, categoria=?, subcategoria=?, producto=?, marca=?, departamento=?,
					ciudad=?, envio=?, precio=?, descuento=?, descripcion=?, unidades=?, referencia=?
					WHERE id = $this->intIdProd";
			$arrData = array($this->intTransacion, $this->intTproducto, $this->intCategoria, $this->intSubCategoria,
				$this->intProducto, $this->intMarca, $this->intDepartamento, $this->intCiudad, $this->intEnvio, $this->intPrecio, $this->intPrecioDesc, $this->strDescripcion, $this->intCantidad, $this->strReferencia);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		

		// Funciones para consultar Combobox Select Producto
		public function selectCaterias(int $id)
		{
			$this->intCategoId = $id;
			$sql = "SELECT * FROM p_categorias 
					WHERE tipo = '$this->intCategoId' and 
					status != 0 and id_padre = 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectSubCaterias(int $id)
		{
			$this->intSubCategoId = $id;
			$sql = "SELECT * FROM p_categorias 
					WHERE id_padre = '$this->intSubCategoId' and 
					status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectTipoProducto(int $id)
		{
			$this->intTipoProducto = $id;
			$sql = "SELECT * FROM p_categorias 
					WHERE id_padre = '$this->intTipoProducto' and 
					status != 0";
			$request = $this->select_all($sql);
			return $request;
		}


		public function selectpMarca(int $id)
		{
			$this->intMarca = $id;
			$sql = "SELECT * FROM p_marcas 
					WHERE categoria_id = '$this->intMarca' and 
					status != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function getDepartamentos()
		{
			$sql = "SELECT * FROM departamentos";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectCiudades(int $id)
		{
			$this->intCiudad = $id;
			$sql = "SELECT * FROM municipios
					WHERE departamento_id = '$this->intCiudad'";
			$request = $this->select_all($sql);
			return $request;
		}


		public function addImg(int $id, string $nombre)
		{
			$this->intProducto = $id;
			$this->strImg = $nombre;

			$query_insert = "INSERT INTO p_imagenes (id_producto, foto) VALUES(?,?)";
			$arrData =  array($this->intProducto, $this->strImg);
			$request_insert = $this->insert($query_insert,$arrData);
			return $request_insert;
		}

	

		public function selectProductos(int $id_user)
		{
			$this->intUsuario = $id_user;

			$sql = "SELECT 
			p.id,
			p.id_unique,
			p.referencia,
			p.descripcion,
			p.precio,
			p.unidades,
			p.status,
			t.nombre_transaccion as p_transaccion,
			tr.nombre_tipo as p_tipo,
			c.nombre_categoria as p_categorias
			 FROM productos p
			 INNER JOIN p_transaccion t
			 ON p.transaccion = t.id_transaccion
			 INNER JOIN p_tipo tr
			 ON p.tipo = tr.id_tipo
			 INNER JOIN p_categorias c
			 ON p.producto = c.id_categoria
			 WHERE p.status != 0 and p.id_propietario = '{$this->intUsuario}'";
			$request = $this->select_All($sql);
			return $request;

			// $sql= "SELECT p.id,
			// 			   p.nombre,
			// 			   p.referencia,
			// 			   p.marca,
			// 			   p.descripcion,
			// 			   p.precio,
			// 			   p.unidades,
			// 			   p.id_propietario,
			// 			   p.status,
			// 			   p.transaccion,
			// 			   p.tipo,
			// 			   p.categoria,
			// 			   u.username,
			// 			   u.status,
			// 			   tr.nombre_transaccion,
			// 			   t.nombre_tipo,
			// 			   c.nombre_categoria
			// 		FROM productos p
			// 		INNER JOIN p_tipo t
			// 		ON p.tipo = t.id_tipo 
			// 		INNER JOIN users u
			// 		ON p.id_propietario = u.user_id
			// 		INNER JOIN p_transaccion tr
			// 		ON p.transaccion = tr.id_transaccion
			// 		INNER JOIN p_categorias c
			// 		ON p.categoria = c.id_categoria
			// 		WHERE p.status != 0" ;
			// 		$request = $this->selectAll($sql);
			// 		return $request;
		}

		public function buscProducto(int $idp)
		{
			$this->idProduucto = $idp;

			$sql = "SELECT
			p.id, 
			p.id_unique,
			p.referencia,
			p.marca,
			p.descripcion,
			p.precio,
			p.descuento,
			p.unidades,
			p.status,
			p.transaccion,
			p.tipo,
			p.categoria,
			p.subcategoria,
			p.producto,
			p.departamento,
			p.ciudad,
			p.envio,
			t.nombre_transaccion as p_transaccion,
			tr.nombre_tipo as p_tipo,
			c.nombre_categoria as p_categorias,
			m.nombre as p_marcas
			 FROM productos p
			 INNER JOIN p_transaccion t
			 ON p.transaccion = t.id_transaccion
			 INNER JOIN p_tipo tr
			 ON p.tipo = tr.id_tipo
			 INNER JOIN p_categorias c
			 ON p.producto = c.id_categoria
			 INNER JOIN p_marcas m
			 ON p.marca = m.marcas_id
			 WHERE p.status != 0 and p.id = '$this->idProduucto'";
			$request = $this->select($sql);
			return $request;
		}

		public function selectImg(int $idp)
		{
			$this->idProd = $idp;
			$sql = "SELECT id_producto,foto FROM p_imagenes WHERE id_producto = '$this->idProd'";
			$request = $this->select_All($sql);
			return $request;
		}

		public function deleteProducto($idProducto)
		{
			$this->status = 0;
			$this->idProd = $idProducto;
			$sql = "UPDATE productos SET status = ? WHERE id = '$this->idProd'";
			$arrData = array($this->status);
			$request = $this->update($sql, $arrData);
			return $request;
		}

	}// cierra la clase officeModel	

?>
