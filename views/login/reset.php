<?php
headerAuth($data);
$forgotToken = $data['token'];
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
                    <h3 class="mt-5 text-white">Cambiar Contraseña</h3>
					<form id="resetForm" name="resetForm" class="recordar mt-5">
						<div class="form-group">
                            <input id="txtId" type="hidden" name="txtId" class="form-style input-text" value="<?= $forgotToken ?>">
                        </div>
						  <div class="form-group">
						    <label>Nueva Contraseña</label>
						    <input class="form-control" id="txtPassword" type="password" name="txtPassword" placeholder="">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Repite la Contraseña</label>
						    <input class="form-control" id="txtCpassword" type="password" name="txtCpassword" placeholder="">
						    <small id="emailHelp" class="form-text text-muted">Recuerda, entre mas segura sea tu contraseña mas<br> protegida estará tu cuenta .</small>
						  </div>
						  <button type="submit" name="reset" class="btn btn-continuar">Recuperar</button>
						</form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Login 7 end -->


<?php footerAuth($data) ;?>