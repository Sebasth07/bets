<?php 
headerOficina();
navOficina();
navTop();
$user = $_SESSION["userData"];
$nombre = $_SESSION["userData"]['nombre'];
$apellido = $_SESSION["userData"]['apellidos'];
$correo = $_SESSION["userData"]['correo'];
$dni = $_SESSION["userData"]['identificacion'];
$status = $_SESSION["userData"]['status'];
if ($status == 1) {
	$estado = 'Cuenta Activada';
}else{
	$estado = 'Cuenta Inactiva';
}
?>

  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary" style="background:#180563 !important;">
                  <h4 class="card-title">Perfil de Usuario</h4>
                  <p class="card-category">Toda tu información personal</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre</label>
                          <input type="text" value="<?= $nombre ?>" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Segundo Nombre</label>
                          <input type="text" value="" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellidos</label>
                          <input type="email" value="<?= $apellido ?>" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" value="<?= $correo ?>" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Numero Identificación</label>
                          <input type="text" value="<?= $dni ?>" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Celular</label>
                          <input type="text" class="form-control" disabled="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <input type="text" class="form-control" disabled="">
                        </div>
                      </div>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary pull-right" style="background:#180563 !important;">Actualizar Datos</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="<?= media();?>/oficina/img/user.png" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Usuario</h6>
                  <h4 class="card-title"><?= $estado ?></h4>
                  <p class="card-description">
                    Cambiar Contraseña.
                  </p>
                  <form>
                  	 <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" value="" placeholder="Nueva Contraseña" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="text" value="" placeholder="Repertir Contraseña" class="form-control" disabled>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round" style="background:#180563 !important;">Actualizar Contraseña</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<?php 
footerOficina();
?>