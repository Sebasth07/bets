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
					<a style="color: white;font-size: 15px;" href="<?= base_url()?>"><i style="font-size: 15px;" class="far fa-arrow-alt-circle-left"></i> Volver</a>
					<img style="width: 400px;" src="<?= media() ?>/img/logo.png">
                    <h3 class="mt-5 text-white">Recupera tu contraseña</h3>
					<form id="forgotForm" name="forgotForm" class="recordar">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Correo Electrónico</label>
						    <input class="form-control" id="txtEmail" type="email" name="email" placeholder="Email: usuario@mail.com ">
						    <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más..</small>
						  </div>
						  <button type="submit" id="olvide" name="olvide" class="btn btn-continuar">Recuperar</button>
						</form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Login 7 end -->


<?php footerAuth($data) ;?>