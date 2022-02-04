<?php
headerHome($data); 
navHome($data); 

?>
<div class="btn-float-r">
	<i class="fab fa-facebook-f facebook"></i>
	<i class="fab fa-instagram instagram"></i>
	<i class="fab fa-whatsapp whatsappp"></i>
</div>

<main class="main-product">
	<!-------------- Carrito compras ----------------->
	<?php 
	$peso = SPESO;
	$total = 0;
	$cantCarrito = 0;
	if (isset($_SESSION['arrCarrito']) and count($_SESSION['arrCarrito']) > 0) {
		
	?>
	<section class="container-fluid">
		<div><img class="width-logo-t" src="<?= media();?>/img/logos/logo-triangulos.svg"> 
		CARRITO DE COMPRAS <span class="t-11">
		</div>
		<div class="row">
			<!---- Area Carrito ------>
			<div class="col-ms-12 col-md-9 col-lg-9">
				<div class="container table-responsive mt-3">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Imagen</th>
					      <th scope="col">Nombre Producto</th>
					      <th scope="col">Cantidad</th>
					      <th scope="col">Precio Unidad</th>
					      <th scope="col">Total</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php 

					  	for ($i=0; $i < count($_SESSION['arrCarrito']) ; $i++) { 
					  		$idp = $_SESSION['arrCarrito'][$i]['idProducto'];
					  		$cant = $_SESSION['arrCarrito'][$i]['cantidad'];
					  		$totalProducto = $_SESSION['arrCarrito'][$i]['precio'] * $_SESSION['arrCarrito'][$i]['cantidad'];
					  		$subtotal += $totalProducto;
					  		$encrypId = sed:: encryption($idp);
					  		$precio =  $_SESSION['arrCarrito'][$i]['precio'];
					  	/*}

					  	foreach ($_SESSION['arrCarrito'] as $producto) {
					  		$totalProducto = $producto['precio'] * $producto['cantidad'];
					  		$subtotal += $totalProducto;
					  		$encrypId = sed:: encryption($producto['idProducto']);*/

					  	?>
					    <tr>
					      <th><img width="50" src="<?= media();?>/img/taladro.jpg"></th>
					      <td><?= $idp ?></td>
					      <td>
					      	<form id="dellCar" name="dellCar">
								<div class="row">
								    <div class="col-sm-3 d-flex justify-content-around align-items-center">
								    	<input type="hidden" name="intPid" id="intPid" value="<?= $encrypId ;?>">
								      	<input type="number" value="<?= $cant ?>" class="form-control" id="valueCarrito">
								    </div>
								    <div class="col-sm-3 c-canti d-flex justify-content-around">
								      <button onclick="eliminar()" type="button" style="border: none; background: none;"><i class="fas fa-minus-circle" style="margin-right: 5px;"></i></button>
								      <button onclick="crear()" type="button" style="border: none; background: none;"><i class="fas fa-plus-circle"></i></button>
								    </div>
								</div>
							</form>
					      </td>
					      <td>$ <?= formatMoney($precio) ; ?></td>
					      <td>$ <?= formatMoney($totalProducto) ; ?></td>
					    </tr>
					    <?php } ?>
					  </tbody>
					</table>
					<?php }else{ ?>
					    <div>No hay productos en el carrito</div>
					    <?php } ?>	
				</div>
				<div class="mt-4"><img class="width-logo-t" src="<?= media();?>/img/logos/logo-triangulos.svg"> 
				QUÉ TE GUSTARÍA HACER A CONTINUACIÓN
				</div>
				<!---- Cupon ----->
				<!-- <div class="accordion" id="accordionExample">
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingOne">
				      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				        INGRESA UN CUPÓN
				      </button>
				    </h2>
				    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        <form>
							<div class="row">
							    <label for="inputEmail3" class="col-sm-2 col-form-label">CUPÓN</label>
							    <div class="col-sm-6">
							      <input type="text" placeholder="Ingresa aquí tu cupón" class="form-control" id="inputEmail3">
							    </div>
							    <div class="col-sm-4">
							      <input type="submit" placeholder="Añadir Cupón" value="Añadir Cupón" class="form-control" id="inputEmail3">
							    </div>
							  </div>
						</form>
				      </div>
				    </div>
				  </div>
				</div> -->
				<!---- Estimacion Envío ----->
				<!-- <div class="accordion" id="accordionExample" style="margin-top: -20px;">
				  <div class="accordion-item">
				    <h2 class="accordion-header" id="headingOne">
				      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
				        ESTIMACIÓN ENVÍO Y TASAS
				      </button>
				    </h2>
				    <div id="collapsetwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
				      <div class="accordion-body">
				        <form>
							<div class="row">
							    <label for="inputEmail3" class="col-sm-2 col-form-label">Envío</label>
							    
							  </div>
						</form>
				      </div>
				    </div>
				  </div>
				</div> -->
				<!-------- Total Carrito ---------->
				<div class="card mt-5 mb-5">
				  <div class="card-body">
				  	<div class="d-flex flex-column align-items-end">
				  		<p>Subtotal: <span class="fw-900"> $ <?= formatMoney($subtotal);  ?></span></p>
				  		<?php $iva = $subtotal * .19 ; $total = $subtotal + $iva; ?>
				  		<p>Iva: <span class="fw-900"> $ <?= formatMoney($iva); ?></span></p>
				  		<p>Total: <span class="fw-900"> $ <?= formatMoney($total); ?></span></p>
				  	</div>
				  	<div class="d-flex flex-row justify-content-between">
			  			<a href="<?= base_url()?>" class="btn-chekcuot">Seguir Comprando</a>
			  			<a href="" class="btn-chekcuot">Ir a la Caja</a>
				  	</div>
				  </div>
				</div>
			</div>
			<!---- Side Bar ------>
			<div class="col-ms-0 col-md-3 col-lg-3">
				<div class="col-sm-12 col-md-3 col-lg-3">
				<div class="container">
					<div class="mockup-foto">300x300</div>
					<div class="mockup-foto mt-1">300x300</div>
				</div>
			</div>
			</div>
		</div>
	</section>


	<!-------------- Productos Recientes----------------->
	<section class="container-fluid mt-4">
		<div><img class="width-logo-t" src="<?= media();?>/img/logos/logo-triangulos.svg"> 
		LOS CLIENTES QUE COMPRARON PRODUCTOS QUE APARECEN EN TU CARRITO TAMBIEN COMPRARON
		</div>
		<div class="row mt-4">
			<!------ producto 1 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: Gratuito</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="text-calificar"><i class="fas fa-star"></i> 4.8</div>
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 2 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">
				    	<span class="badge bg-danger">Oferta</span> Taladro DeWALT R345
				    </h5>
				    <div class="flex-bn">
				    	<p class="card-text precio-prod-especial">$300.000</p>
				    	<span class="precio-prod">$250.000</span>
				    </div>
				    <div class="envios">Envío: $9.000</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 3 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: $6.000</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="text-calificar"><i class="fas fa-star"></i> 5.0</div>
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 4 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: Gratuito</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="text-calificar"><i class="fas fa-star"></i> 3.8</div>
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 5 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: Gratuito</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 6 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: Gratuito</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="text-calificar"><i class="fas fa-star"></i> 4.8</div>
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ /producto 6 --------->
		</div>
	</section><!-------------- Productos Recientes----------------->
	<section class="container-fluid mt-4">
		<div><img class="width-logo-t" src="<?= media();?>/img/logos/logo-triangulos.svg"> 
		PRODUCTOS VISTOS RECIENTEMENTE
		</div>
		<div class="row mt-4">
			<!------ producto 1 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: Gratuito</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="text-calificar"><i class="fas fa-star"></i> 4.8</div>
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 2 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">
				    	<span class="badge bg-danger">Oferta</span> Taladro DeWALT R345
				    </h5>
				    <div class="flex-bn">
				    	<p class="card-text precio-prod-especial">$300.000</p>
				    	<span class="precio-prod">$250.000</span>
				    </div>
				    <div class="envios">Envío: $9.000</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 3 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: $6.000</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="text-calificar"><i class="fas fa-star"></i> 5.0</div>
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 4 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: Gratuito</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="text-calificar"><i class="fas fa-star"></i> 3.8</div>
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 5 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: Gratuito</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ producto 6 --------->
			<div class="col-md-2 col-sm-6 col-lg-2">
				<div class="nncard mb-3 shadow">
				  <img height="200" width="200" src="<?= media() ?>/img/taladro.jpg" class="card-img-top padd-img-prod" alt="...">
				  <div class="card-body body-c-prod">
				    <h5 class="card-title titulo-prod">Taladro DeWALT R345</h5>
				    <p class="card-text precio-prod">$300.000</p>
				    <div class="envios">Envío: Gratuito</div>
				    <div class="row">
				    	<div class="col-sm-8 col-md-8 col-lg-8">
				    		<div class="text-calificar"><i class="fas fa-star"></i> 4.8</div>
				    		<div class="prod-vendedor">Calos25</div>
				    	</div>
				    	<div class="col-sm-4 col-md-4 col-lg-4">
				    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
				    	</div>
				    </div>
				  </div>
				</div>
			</div>
			<!------ /producto 6 --------->
		</div>
	</section>
	<footer class="mt-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-3 col-lg-3">
					<div class="cont">
						<div class="mt-5">REFERIDOS</div>
						<p class="text-footer mt-3">Recomiéndanos, ingresa emails de tus contactos para optener beneficios.</p>
						<form class="row g-3">
						 <div class="input-group mb-3">
						  <input type="text" class="form-control" placeholder="Correo@mail.com" aria-describedby="button-addon2">
						  <button class="btn btn-outline-secondary" type="button" id="button-addon2">Enviar</button>
						</div>
						</form>
					</div>
				</div>
				<div class="col-sm-12 col-md-3 col-lg-3">
					<ul class="nav flex-column mt-4">
						<li class="nav-item">
					    <a class="nav-link btn-footer"  href="<?= base_url();?>pqrs">PQR´S</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link btn-footer"  href="<?= base_url();?>register">REGÍSTRATE</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link btn-footer" href="<?= base_url();?>nosotros">SOBRE NOSOTROS</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link btn-footer" href="<?= base_url();?>contacto">CONTACTO</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link btn-footer" href="<?= base_url();?>job">TRABAJA CON NOSOTROS</a>
					  </li>
					   <li class="nav-item">
					    <a class="nav-link btn-footer" href="<?= base_url();?>terminos-condiciones">TÉRMINOS Y CONDICIONES</a>
					  </li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-3 col-lg-3">
					<img class="logo-footer" src="<?= media()?>/img/logos/logo-f.svg">
				</div>
				<div class="col-sm-12 col-md-3 col-lg-3 footer-compra">
					<img class="w-60" src="<?= media()?>/img/iconos/btn-vender.svg">
				</div>
			</div>
		</div>
	</footer>
</main>
<?php footerHome($data) ;?>