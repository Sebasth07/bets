<?php
headerAuth($data);
?>

<!-- Login 7 start -->
<div class="login-1">
	<div class="container-fluid">
		<div class="row">
			<!------ form ------->
			<div class="col-md-12 col-lg-4 col-sm-12">
				<div class="login-inner-form int-pad mt-5">
					 <a style="color: #717176;font-size: 10px;" href="<?= base_url()?>"><img style="width: 200px;" src="<?= media() ?>/img/logos/logo.svg"></a>
                        <h3 class="mt-3">Ingresar a tu cuenta</h3>
					<form name="fromLog" id="fromLog" action="">
                            <div class="form-group mt-5">
                                <i class="far fa-envelope"></i>
                                <input id="txtEmail" type="email" name="txtEmail" class="form-style input-text" placeholder="Email: usuario@mail.com ">
                            </div>
                            <div class="form-group mt-5">
                                <i class="fas fa-key"></i>
                                <input id="txtPassword" type="password" name="txtPassword" class="form-style input-text" placeholder="Contraseña">
                            </div>
                            <div id="alertLogin" class="text-center"></div>
                            <div class="form-group row mt-5">
                                <div class="col-5">
                                    <button type="submit" name="login" class="btn btn-1 btn shadow">Ingresar</button>
                                </div>
                                <div class="col-7">
                                    <a href="<?= base_url()?>login/forgot" class="btn-2">Recordar password</a>
                                </div>
                            </div>
                            <p class="mt-3 text-btn">No te has registrado? <a href="<?= base_url()?>register" class="btn-2"> Registrarme</a></p>
                            <div class="mt-5 d-flex justify-content-around">
                                 <div class="cont-rdes">
                                  <span style="font-size: 11px;margin-top: -9px;" class="cont_c">Continúa con:</span>
                                  <i style=" color:  #3b5998;    font-size: 31px;margin-right: 10px;margin-left: 5px;    margin-top: -10px;" class="fab fa-facebook-square fb-i"></i>
                                  <img style="width: 25px;margin-top: -12px;" src="http://18.221.179.131/qa/assets/img/iconos/google-icon.svg">
                                </div>
                            </div>
                        </form>
				</div>
			</div>
			<!------ img ------->
			<?php sliderAuth($data) ;?>
		</div>
	</div>
</div>
<!-- Login 7 end -->

<?php footerAuth($data) ;?>