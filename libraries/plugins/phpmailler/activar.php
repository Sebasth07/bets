<?php 
session_start();

if(isset($_SESSION['usr_id']) && $_SESSION['login_type'] =='users' )  {
  header("Location: ../backoffice/cursos.php");
}
include_once 'dbconnect.php';
?>

<?php 
        if(isset($_POST['pin_request'])){	
        $mail=mysqli_real_escape_string($con,$_GET['mail']);
        $sql = "SELECT * FROM users WHERE email = $mail";
        $res = mysqli_query($con, $sql);
  

  
  
  
  if($sql){
    //Inset the value to pin request
    $query = mysqli_query($con,"UPDATE users SET estado=1 WHERE email='$mail'");
    if($query){
      echo '<script>alert("Tu contraseña se cambio exitosamente");window.location.assign("login.php");</script>';
    }
    else{
      //echo mysqli_error($con);
      echo '<script>alert("algún error esta ocurriendo");window.location.assign("register.php");</script>';
    }
  }
  else{
    echo '<script>alert("Porfavor ingresa un valor válido");</script>';
  }

}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <!-- Style.css -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/animate.css">



    <title>Criptocoinex</title>
  </head>
  <body>
  <!-- particles.js container -->

  <section class="login">
    <header>
      <div>
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light2">
          <!-- <a class="navbar-brand" href="#"><img class="logo" src="img/logo.png"></a> -->
          <button class="navbar-toggler float-sm-right" type="button" data-toggle="collapse" data-target="#menuprincilpal" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="menuprincilpal">
            <ul class="navbar-nav ml-auto p-2">
             <!--  <li class="nav-item active nav-pills nav-fill">
                <a class="nav-link" href="#">Inicio</a>
              </li>
               <li class="nav-item nav-pills nav-fill">
                <a class="nav-link btn-nav2 " href="#">Ingresar</a>
              </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Plan de compensación</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Paquetes</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link btn-nav3" href="register.php">Activar tu cuenta</a>
              </li>
            </ul>
            
          </div>
        </nav>
        <!-- /nav -->
         <!-- encabezado -->
         <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
           <div >
              <div class="container login-canvas">
                <div class="row">
                 <div class="col-sm-12 col-md-12 col-lg-6 login-position">
                   <div class="card-login animated bounceInUp">
                    <div class="card-body2">
                      <a href="../index.php"><img class="logo" src="../img/logo.png"></a> <br>
                      <h4 class="text-login">Cambiar Contraseña</h4>
                      <form role="form" method="POST">
                        <div class="row">
                        <div class="form-group col-lg-12">
                          <label style="color: white;" for="exampleFormControlInput1"><i class="fas fa-user"></i> Nueva contraseña</label>
                          <input type="password" name="newpass" class="form-control">
                        </div>
                         
                        </div>
                         <div><button type="submit"  name="pin_request" class="btn btn-class">Cambiar contraseña</button></div><br>
                      </form>
                      
                    </div>
                     
                   </div>
                 </div>
                </div>
              </div>
           </div>
          </div>
         </div>   
         <!-- /encabezado -->
        
      </div>
    </header>
  </section>
  



    <!-- Optional JavaScript -->
    <!-- scripts -->
    <script src="../js/particles.js"></script>
    <script src="../js/app.js"></script>

<!-- stats.js -->
    <script src="../js/lib/stats.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>