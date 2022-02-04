<?php 
headerHome($data);
notifyData($data);
navHome($data);

?>

  <!--Full Search-->
    <div class="search-full">
        <button type="submit" class="search-close"><i class="flaticon-cancel"></i></button>
        <div class="search-full--inner">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-10 col-sm-10">
                        <form class="main-search-form">
                            <input type="search" name="main_search" id="main_search" placeholder="Search anything">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/Full Search-->

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <aside class="content-sidebar">
                        <h3>LIGAS PRINCIPALES</h3>
                        <ul>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/leagues/1.png" alt=""> Premier League</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/leagues/2.png" alt=""> LaLiga</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/leagues/3.png" alt=""> Bundesliga</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/leagues/4.png" alt=""> Champions League</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/leagues/5.png" alt=""> Seria A</a></li>
                            
                        </ul>
                    </aside>
                    <aside class="content-sidebar">
                        <h3>PAÍSES</h3>
                        <ul>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/country/1.png" alt=""> INGLATERRA</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/country/2.png" alt=""> ESPAÑA</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/country/3.png" alt=""> ALEMANIA</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/country/4.png" alt=""> ITALIA</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/country/5.png" alt=""> FRANCIA</a></li>
                            <li><a href=""><img src="<?= media(); ?>/img/ligas/country/6.png" alt=""> HOLANDA</a></li>
                           
                        </ul>
                    </aside>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6">
                    <div class="main-content-slider owl-carousel">
                        <div class="single-slider" style="background: url('<?php echo media();?>/img/banner/hero-1.jpg') no-repeat center / cover;">
                            <div class="row">
                                <div class="col-xl-6">
                                    <h3>GANA UN BONO DE 10 USD</h3>
                                    <p>En tu primera recarga mensual obtén un bono de 10 USD</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="single-slider" style="background: url('<?php echo media();?>/img/banner/hero-1.jpg') no-repeat center / cover;">
                            <div class="row">
                                <div class="col-xl-6">
                                    <h3>Lever of Games</h3>
                                    <p>Amet consectetur adipisicing elit. Debitis, et totam nisi est praesentium maxime mollitia earum aut temporibus aliquid esse eveniet impedit? Doloribus</p>
                                    <div class="hero-score">Venture <span>2.5</span></div>
                                    <div class="hero-score">Lebor <span>8.3</span></div>
                                    <div class="hero-score">122+ Bets</div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="game-box">
                        <div class="row mb-5">
                            <div style="color:white;text-align: center;" class="col-xl-2">
                                <a href="#" style="color:white;">
                                    <div class="btn_deportes">
                                    <i style="font-size: 35px;color: #fdd50b;" class="fas fa-futbol"></i><br>Futbol
                                     </div>   
                                </a>
                            </div>
                            <div style="color:white;text-align: center;" class="col-xl-2">
                                <a href="#" style="color:white;">
                                    <div class="btn_deportes">
                                    <i style="font-size: 35px;color: #fdd50b;" class="fas fa-baseball-ball"></i><br>Baseball
                                </div>   
                                </a>
                            </div>
                           <div style="color:white;text-align: center;" class="col-xl-2">
                                <a href="#" style="color:white;">
                                    <div class="btn_deportes">
                                    <i style="font-size: 35px;color: #fdd50b;" class="fas fa-basketball-ball"></i>
                                   <br>Basketball
                                </div>   
                                </a>
                            </div>
                            <div style="color:white;text-align: center;" class="col-xl-2">
                                <a href="#" style="color:white;">
                                    <div class="btn_deportes">
                                    <i style="font-size: 35px;color: #fdd50b;" class="fas fa-hockey-puck"></i>
                                    <br>Hockey
                                </div>   
                                </a>
                            </div>
                            <div style="color:white;text-align: center;" class="col-xl-2">
                                <a href="#" style="color:white;">
                                    <div class="btn_deportes">
                                    <i style="font-size: 35px;color: #fdd50b;" class="fas fa-football-ball"></i><br>Rugby
                                </div>   
                                </a>
                            </div>
                            <div style="color:white;text-align: center;" class="col-xl-2">
                                <a href="#" style="color:white;">
                                    <div class="btn_deportes">
                                    <i style="font-size: 35px;color: #fdd50b;" class="fas fa-tachometer-alt"></i><br>
                                    Formula 1
                                </div>   
                                </a>
                            </div>
                        </div>
                        <?php consultHoy($data);  ?>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6">
                    <div class="web-sidebar-widget">
                        <div id="productosCarrito">
                            <?php 
                                miniCart($data);
                            ?>
                       </div>
                    </div>

                   <!--  <div class="web-sidebar-widget">
                        <div class="widget-head">
                            <h3>Betsb info</h3>
                        </div>
                        <div class="widget-body">
                            <p><strong>Register:</strong> SMS 'JOIN' to 26587</p>
                            <p><strong>Customer care:</strong> 987654123</p>
                            <p><strong>Customer care 2:</strong> 987654123</p>
                            <p><strong>Email:</strong> info@betsb.com</p>
                        </div>
                    </div> -->
                   
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
<div class="modal fade" id="estadis" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div id="muestraHistorial" class="modal-body">
       
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="masoption" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div id="optionsid" class="modal-body">
       OPCIONES DE PARTIDO ACÁ
      </div>
    </div>
  </div>
</div>

    <div class="modal fade" id="regModal" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">
             <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="account-form">
                        <div class="title">
                            <h3>CREAR UNA CUENTA</h3>
                        </div>
                        <form id="regFrom" name="regFrom" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre*">
                                </div>
                                <div class="col-xl-6">
                                    <input type="text" id="txtSnombre" name="txtSnombre" placeholder="Segundo Nombre">
                                </div>
                                <div class="col-xl-12">
                                    <input type="text" id="txtApellidos" name="txtApellidos" placeholder="Apellidos*">
                                </div>
                                <div class="col-xl-12">
                                    <input type="number" id="intIdentidicacion" name="identidicacion" placeholder="# Identificación*">
                                </div>
                                <div class="col-xl-12">
                                    <input type="email" id="txtEmail" name="txtEmail" placeholder="Email*">
                                </div>
                                <div class="col-xl-12">
                                    <input type="password" id="pswdr"  name="pswdr" placeholder="Contraseña*">
                                </div>
                                 <div class="col-xl-12">
                                    <input type="password" id="cPswdr" name="cPswdr" placeholder="Confirmar Contraseña*">
                                </div>
                                <div class="col-xl-12">
                                    <p style="color: black !important;">Al crear esta cuentarás aceptando nuestros  <a style="color: black;" href="">términos y condiciones</a></p>
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit" id="btnReg" class="bttn-small btn-fill w-100">Crear mi cuenta</button>
                                </div>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="logModal" tabindex="-1"  aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
             <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="account-form">
                        <div class="title">
                            <h3>INICIAR SESION</h3>
                        </div>
                        <form id="logFrom" name="logFrom" method="POST">
                            <div class="row"> 
                                <div class="col-xl-12">
                                    <input type="email" id="txtdEmail" name="txtdEmail" placeholder="Email*">
                                </div>
                                <div class="col-xl-12">
                                    <input type="password" id="txtPswdr"  name="txtPswdr" placeholder="Contraseña*">
                                </div>
                                <div class="col-xl-12">
                                    <button type="submit" id="btnlog" class="bttn-small btn-fill w-100">Ingresar</button>
                                </div>
                                <div class="col-xl-12">
                                    <p style="color: black !important;">¿No recuerdas tu contraseña? <a style="color: black;" href="<?= base_url()?>login/forgot">Recordar</a> </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

<?php 
footerHome($data);
?>