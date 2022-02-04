<?php 

require_once("libraries/core/mysql.php");

trait tproducto{

	private $con;
	private $intProductId;

	//Productos Recientes
	public function getProductRecient()
		{
			$this->con = new mysql();
			$sql = "SELECT p.id,
						   p.referencia,
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
						   c.nombre_categoria,
						   sc.nombre_categoria,
						   pr.nombre_categoria,
						   f.foto
					FROM productos p
					INNER JOIN p_tipo t
					ON p.tipo = t.id_tipo 
					INNER JOIN users u
					ON p.id_propietario = u.user_id
					INNER JOIN p_transaccion tr
					ON p.transaccion = tr.id_transaccion
					INNER JOIN p_categorias c
					ON p.categoria = c.id_categoria
					INNER JOIN p_categorias sc
					ON p.subcategoria = sc.id_categoria
					INNER JOIN p_categorias pr
					ON p.producto = pr.id_categoria
					INNER JOIN p_imagenes f
					ON p.id = f.id_producto
					WHERE p.status != 0 ORDER BY p.id DESC LIMIT 0,6";
					$request = $this->con->select_All($sql);	
					return $request;
		}

	
}// Cierra el trait

?>