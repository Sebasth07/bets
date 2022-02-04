<?php

headerAuth($data);	
?>
<!-- Login 7 start -->
<div class="confirm">
	<div class="container-fluid">
		<div class="row">
			<!------ form ------->
			<div class="col-md-12 col-lg-12 col-sm-12">
				<div class="c-items mt-5">
					<img style="width: 400px;" src="<?= media() ?>/img/logo.png">
                    <h3 class="mt-5 text-white">CUENTA ACTIVADA</h3>
					<div class="col-lg-6 col-md-8 col-sm-12 d-auto">
                            <div class="text-center text-white">¡Bienvenido!! ya tu cuenta ha sido activada correctamente. <br><span class="c-yellow">Para continuar e iniciar en tu cuenta da click en el boton de abajo.</span></div>
                            <div class="form-group row mt-4">
                                <div class="col-12">
                                   <a href="<?= base_url()?>" class="btn btn-continuar shadow">Continuar</a>
                                </div>
                                
                            </div>
                    </div>
				</div>
			</div>
			<!------ img ------->
			
		</div>
	</div>
</div>
<?php footerAuth($data) ;?>