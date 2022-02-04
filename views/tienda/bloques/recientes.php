<?php 
	
	$arrProductos = $data['productos_recientes'];
	$arrimagenes  = $data['productos_fotos'];
	dep($arrimagenes);
	for ($p=0; $p < count($arrProductos) ; $p++) { 

	$encryptId = seD:: encryption($arrProductos[$p]['id']);
	
	

?>

<div class="col-md-2 col-sm-6 col-lg-2"> 
	<div class="nncard mb-3 shadow">
	 <a href="<?= base_url().'tienda/producto/'.$encryptId;?>"><img height="200" width="200" src="<?= media() ?>/img/uploads/<?= $arrProductos[$p]['foto']?> " class="card-img-top padd-img-prod" alt="..."></a>
	  <div class="card-body body-c-prod">
	    <a style="text-decoration: none;" href="<?php // base_url().'tienda/producto/'.$arrProductos[$p]['nombre'];?>"><h5 class="card-title titulo-prod"><?= $arrProductos[$p]['nombre_categoria']; ?></h5> </a>
	    <div style="margin-top: -8px" class="envios">Marca: KOBELCO</div>
	    <div style="margin-top: -10px; margin-bottom: 10px;" class="envios">Modelo: KLJ987</div>
	    <div class="row">
	    	<div class="col-sm-8 col-md-8 col-lg-8">
	    		<p class="card-text precio-prod"><?= SPESO." ". formatMoney($arrProductos[$p]['precio']); ?></p>
	    <div style="margin-top: -18px;" class="envios">2015 | 5000 hrs</div>
	    		<div class="prod-vendedor"><?= $arrProductos[$p]['username']; ?></div>
	    		<div style="margin-top: 0px; margin-bottom: 10px;" class="envios">Ciudad: MEDELLÍN</div>

	    	</div>
	    	<div class="col-sm-4 col-md-4 col-lg-4">
	    		<img class="cesta" src="<?= media();?>/img/iconos/bag.svg">
	    	</div>
	    </div>
	  </div>
	</div>
</div>
<?php } ?>