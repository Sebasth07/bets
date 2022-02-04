<?php 

class tiendaModel extends mysql
	{
		
		private $intProductId;

		 public function __construct()
		{
			parent::__construct();
		}

		// Detalle de producto
		public function getProductD(int $id_producto)
		{
			$this->intProductId = $id_producto;

			$sql= "SELECT p.id,
						   p.referencia,
						   p.marca,
						   p.descripcion,
						   p.precio,
						   p.unidades,
						   p.id_propietario,
						   p.status,
						   p.transaccion,
						   p.tipo,
						   p.categoria,
						   u.username,
						   u.status,
						   tr.nombre_transaccion,
						   t.nombre_tipo,
						   c.nombre_categoria
					FROM productos p
					INNER JOIN p_tipo t
					ON p.tipo = t.id_tipo 
					INNER JOIN users u
					ON p.id_propietario = u.user_id
					INNER JOIN p_transaccion tr
					ON p.transaccion = tr.id_transaccion
					INNER JOIN p_categorias c
					ON p.categoria = c.id_categoria
					WHERE p.id = '{$this->intProductId}'";
					$request = $this->select($sql);
					return $request;
		}


		public function getImagenes(int $id)
		{
			$this->intProductId = $id;

			$sql = "SELECT * FROM p_imagenes WHERE id_producto = '{$this->intProductId}'";
			$request = $this->select($sql);
			return $request;
		}

	}

?>