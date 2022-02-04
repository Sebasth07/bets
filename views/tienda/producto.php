<?php
headerHome($data); navHome($data);

$peso = SPESO;
$idprod = seD:: encryption($data['producto']['id']);
$img = $data['img_prod']['foto'];
?>
<div class="btn-float-r">
	<i class="fab fa-facebook-f facebook"></i>
	<i class="fab fa-instagram instagram"></i>
	<i class="fab fa-whatsapp whatsappp"></i>
</div>


<main class="main-product">
	<!-- Publicidad -->
	<div class="container-lg">
		<div class="publicidad">
			
		</div>
	</div>
	<!-- Producto info -->
	<div class="container-fluid mt-5">
		<div class="row">
			<!-- Producto area --->
			<div class="col-sm-12 col-md-9 col-lg-9">
				<div style="text-transform: uppercase;"><img class="width-logo-t" src="<?= media();?>/img/logos/logo-triangulos.svg"> 
				<?= $data['producto']['nombre']; ?>
				</div>
				<!----- cuerpo ------>
				<div class="row">
					<!----- Foto Producto ------>
					<div class="col-sm-12 col-md-7 col-lg-7">
						<div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
						    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
						    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img src="<?= media();?>/img/uploads/<?php echo $img ?> " class="d-block carr-prod w-100" alt="...">
						    </div>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="visually-hidden">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="visually-hidden">Next</span>
						  </a>
						</div>
					</div>
					<!----- Descripcion Producto ------>
					<div class="col-sm-12 col-md-5 col-lg-5">
						<!---- Datos ------->
						<div class="row">
							<!---- Datos 1 ------->
							<div class="col-sm-6 col-md-6 col-lg-6">
								<p class="t-11">Marca <span class="fw-900 upper"><?= $data['producto']['marca']; ?></span></p>
								<p class="t-11">Referencia <span class="fw-900"><?= $data['producto']['referencia']; ?></span></p>
								<p class="t-11">Disponibilidad <span class="fw-900">3-5 Diás</span></p>
							</div>
							<!---- Logo ------->
							<div class="col-sm-6 col-md-6 col-lg-6 align-center">
								<img class="logo-prod" src="<?= media();?>/img/logos/marcas/dewalt.jpg">
							</div>
						</div>
						<div><hr class="dropdown-divider"></div>
						<div class="row">
							<!---- Datos 1 ------->
							<div class="col-sm-6 col-md-6 col-lg-6">
								<p class="t-11">Vendedor: <?= $data['producto']['username']; ?><span class="fw-900"></span></p>
								<p class="t-11">Calificación: <span class="fw-900">4.8</span></p>
								<p class="t-11">Stock: <span class="fw-900"><?= $data['producto']['unidades']; ?> unidades</span></p>
							</div>
							<!---- Logo ------->
							<div class="col-sm-6 col-md-6 col-lg-6 align-center">
								<h1><?php echo $peso.formatMoney($data['producto']['precio']); ?></h1>
							</div>
						</div>
						<div><hr class="dropdown-divider"></div>
						<div class="row">
							<!---- Datos 1 ------->
							<div class="col-sm-12 col-md-12 col-lg-12">
								<form id="addcart" name="addcart">
									<div class="row mb-3">
									    <label for="inputEmail3"  class="col-sm-3 col-form-label">Cantidad</label>
									    <div class="col-sm-3">
									      <input type="number" required="" min="1" value="1" class="form-control" id="intCant" name="intCant">
									      <input type="hidden" name="intPid" id="intPid" value="<?= $idprod;?>">
									      <input type="hidden" name="intUnid" id="intUnid" value="<?= $data['producto']['unidades'];?>">
									      <input type="hidden" name="strPname" id="strPname" value="<?= $data['producto']['nombre'];?>">
									       <input type="hidden" name="strPvalor" id="strPvalor" value="<?= $data['producto']['precio'];?>">
									    </div>
									    <div class="col-sm-6">
									      <button type="submit" name="anadir" id="anadir" class="form-control ">Añadir al carrito</button>
									    </div>
									  </div>
								</form>
							</div>
						</div>
						<div><hr class="dropdown-divider"></div>
						<div class="row">
							<!---- Datos 1 ------->
							<div class="col-sm-12 col-md-12 col-lg-12">
								<p class="t-11">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i> 
									<i class="fas fa-star-half-alt"></i>
									<i class="far fa-star"></i>
									<i class="far fa-star"></i>
									 3.7 calificación de producto <br>
									<span class="fw-900">3 Opiniones</span></p>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12">
								<form>
									<div class="form-floating">
									  <textarea class="form-control" placeholder="Realiza una pregunta" id="floatingTextarea"></textarea>
									  <label for="floatingTextarea">Comentar</label>
									</div><br>
									<div class="col-sm-12">
									    <input type="submit" placeholder="Añadir al carrito" value="Añadir Comentario" class="form-control" id="inputEmail3">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Side bar area 1 --->
			<div class="col-sm-12 col-md-3 col-lg-3">
				<div class="container">
					<div class="mockup-foto"><img style="width: 250px;height: 250px;" src="<?php echo media().'/img/gits/giftavc.gif'?>"></div>
					<div class="mockup-foto mt-1"><img style="width: 250px;height: 250px;" src="<?php echo media().'/img/gits/pauteaqui.gif'?>"></div>
				</div>
			</div>
			<!-- Datos --->
			<div class="col-sm-12 col-md-9 col-lg-9 mt-4">
				<div class="container-sm">
					<nav>
					  <div class="nav nav-tabs" id="nav-tab" role="tablist">
					    <a class="nav-link active t-11" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Descripción</a>
					    <a class="nav-link t-11" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Documentación</a>
					    <a class="nav-link t-11" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Opiniones</a>
					  </div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
					  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					  	<p class="mt-4 mb-5 t-11">
					  		<p class="t-11"><span class="fw-900">Descripción:</span> <?= $data['producto']['descripcion'];?></p> 
					  		<p class="t-11"><span class="fw-900">Tipo de transacción:</span> <?= $data['producto']['nombre_transaccion'];?></p>
					  		<p class="t-11"><span class="fw-900">Categoría:</span> <?= $data['producto']['nombre_tipo'];?></p>
					  		<p class="t-11"><span class="fw-900">Uso:</span> <?= $data['producto']['nombre_categoria'];?></p>
					  	</p>
					  </div>
					  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					  	<p class="mt-4 mb-5 t-11">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
					  </div>
					  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					  	<div class="card mt-4 mb-4">
						  <div class="card-header t-11">
						    Carlos Restrepo
						  </div>
						  <div class="card-body">
						    <blockquote class="blockquote mb-0 t-11">
						      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
						    </blockquote>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>
			<!-- Side bar area 2 --->
			<div class="col-sm-12 col-md-3 col-lg-3">
				<div class="container">
					<div class="mockup-foto"><img style="width: 250px;height: 250px;" src="<?php echo media().'/img/gits/pauteaqui.gif'?>"></div>
				</div>
			</div>
		</div>
	</div>
<!-------------- Productos Recientes----------------->
	<section class="container-fluid">
		<div><img class="width-logo-t" src="<?= media();?>/img/logos/logo-triangulos.svg"> 
		PRODUCTOS RELACIONADOS
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