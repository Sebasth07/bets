<?php 
headerAuth($data);
notifyData($data);
?>

<body class="h-100">
    <div id="root" class="h-100">
      <!-- Background Start -->
      <div class="fixed-background"></div>
      <!-- Background End -->

      <div class="container-fluid p-0 h-100 position-relative">
        <div class="row g-0 h-100">
          <!-- Left Side Start -->
          <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
            <div class="min-h-100 d-flex align-items-center">
              <div class="w-100 w-lg-75 w-xxl-50">
                <div>
                  <div class="mb-5">
                    <img class="mb-5" width="150" src="<?= media();?>/img/auth/logo/logo.svg">
                    <h1 class="display-3 text-white">Software de gestión y administración hotelera</h1>
                  </div>
                  <p class="h6 text-white lh-1-5 mb-5">
                   Administra reservas, ocupaciones, estado de habitaciones, restaurante, mesas, inventarios, factura electrónica y muchas increíbles funciones mas.
                  </p>
                  <div class="mb-5">
                    <a class="btn btn-lg btn-outline-white" href="index.html">Registrame ya</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Left Side End -->

          <!-- Right Side Start -->
          <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
            <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
              <div class="sw-lg-50 px-5">
                <div class="mb-5">
                  <h2 class="cta-1 mb-0 text-primary">Bienvenido,</h2>
                  <h2 class="cta-1 text-primary">Inicia Sesión!</h2>
                </div>
                <div class="mb-5">
                  <p class="h6">Utiliza tus credenciales para ingresar.</p>
                  <p class="h6">
                    Si aún no posees una cuenta, creala ahora
                    <a href="Pages.Authentication.Register.html">Registrarse</a>
                    .
                  </p>
                </div>
                <div>
                  <form id="logingForm" name="loginForm" class="tooltip-end-bottom" action="">
                    <div class="mb-3 filled form-group tooltip-end-top">
                      <i data-acorn-icon="user"></i>
                      <input class="form-control" id="document" placeholder="Documento" name="document" type="text" />
                    </div>
                    <div class="mb-3 filled form-group tooltip-end-top">
                      <i data-acorn-icon="lock-off"></i>
                      <input class="form-control pe-7" id="password" name="password" type="password" placeholder="Contraseña" />
                      <a class="text-small position-absolute t-3 e-3" href="Pages.Authentication.ForgotPassword.html">Recordar</a>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Ingresar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Right Side End -->
        </div>
      </div>
    </div>
<?php 
 footerAuth($data);
?>