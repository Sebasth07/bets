 <?php 
$nombre = $_SESSION["userData"]["nombre"];
$saldo = $_SESSION["userData"]["saldo"];

 if (isset($_SESSION['login'])) {
    $sesion = '<div class="userd">
                           <a href="http://localhost:8080/winprox/oficina/usuario"><i class="fas fa-user-circle iconbtn"></i></a>
                           <a href="http://localhost:8080/winprox/oficina"><i class="fas fa-sliders-h iconbtn"></i></a>
                           <a class="salir" href="http://localhost:8080/winprox/login/logout">Salir</a>
                       </div>';
 }else{
    $sesion = ' <a href="" data-toggle="modal" data-target="#regModal" class="bttn-small btn-fill"><i class="fa fa-key"></i>Registrase</a>
                        <a href="" data-toggle="modal" data-target="#logModal" class="bttn-small btn-fill ml-2"><i class="fa fa-lock"></i>Ingresar</a>';
 }

 ?>
 <header class="header-area gradient-bg">
        <nav class="navbar navbar-expand-lg main-menu">
            <div class="container-fluid">

                <a class="navbar-brand" href="index.html"><img src="<?= media(); ?>/img/logo.png" class="d-inline-block align-top" alt=""></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu-toggle"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item"><a class="nav-link" href="index.html">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">Apuestas</a></li>
                        <li class="nav-item"><a class="nav-link" href="inplay.html">EN VIVO</a></li>
                        <li class="nav-item"><a class="nav-link" href="winlist.html">Resultados</a></li>
                       
                        <li class="nav-item"><a class="nav-link" href="contact.html">Conócenos</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contacto</a></li>
                    </ul>
                    <div class="header-btn justify-content-end">
                      <?php echo $sesion; ?> 
                       
                    </div>
                </div>
            </div>
        </nav>
    </header><!--/Header Area-->
