
<?php
$nombre = $_SESSION["userData"]["nombre"];
if ($data['notify'] == 23) {
    echo '<div style="width: 100%;" class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Bienvenido!</strong> Ahora que ya activaste tu cuenta puedes iniciar sesion.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$_SESSION['notify'] = 0;
}
elseif ($data['notify'] == 11) {
    echo '<div style="width: 100%;" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Su contraseña</strong> ha sido actualizada, ya puede iniciar sesion.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$_SESSION['notify'] = 0;
}
elseif ($data['notify'] == 10) {
    echo '<div style="width: 100%;" class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Revisa tu correo</strong> Enviamos las instrucciones para que recuperes tu contraseña.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$_SESSION['notify'] = 0;
}
elseif ($data['notify'] == 1) {
    echo '<div style="width: 100%;" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Cuenta Creada</strong> Confirma tu correo para poder iniciar sesión.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$_SESSION['notify'] = 0;
}
elseif ($data['notify'] == 2) {
    echo '<div style="width: 100%;" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SESIÓN INICIADA</strong> Bienvenido! '.$nombre.' Realiza tus apuestas sin límites!!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
$_SESSION['notify'] = 0;
}
?>