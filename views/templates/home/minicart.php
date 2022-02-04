<?php
if (isset($_SESSION['carrito'])) {
    $eventos = count($_SESSION['carrito']);
}else{
    $eventos = 0;
}

$nombre = $_SESSION["userData"]["nombre"];
$saldo = $_SESSION["userData"]["saldo"];
if (isset($_SESSION['login'])) {
   $user= $nombre;
   $money = '<p class="currency">Saldo: $<span>'.$saldo.',00</span></p>';
}else{
    $user ='';
    $money = '';
}



$carrito = $_SESSION['carrito'];
$insertApuesta = json_encode($carrito);

?>


 <div class="widget-head">
  <h3 style="text-align:center;">MI APUESTA: <span style="font-size:12px">Eventos: <?= $eventos;?></span></h3>
  <p class="name"><?php echo $user ?></p>
  <p class="currency"><span><?php echo $money ?></span></p>
</div>

<?php

foreach ($_SESSION['carrito'] as $producto) {

  $evento = $producto['evento'];
  $cuota = $producto['cuota'];
  $equipoL = $producto['equipoL'];
  $equipoV = $producto['equipoV'];
  $apuestaTipo = $producto['tipo'];
  $apostadoA = $producto['apostadoA'];
  $inversion = $producto['inversion'];
  $total = $producto['total'];

  

 $ticket = array('evento'=>$evento, 'cuota'=>$cuota ); 
 $apuestaJson = json_encode($ticket);
?>

<div class="widget-body contain-apuesta">
   <div class="pad">
       <p class="titulo-pad fw900"><?= $equipoL; ?> <span>VS</span> <?= $equipoV; ?></p>
       <div class="titulo-pad mt-b"><?= $apuestaTipo; ?></div>
       <div class="apuesta-cuota">
           <div class="ftp"><?= $cuota; ?></div>
           <div class="ftp"><?= $apostadoA; ?></div>
           <div onclick="dellCarrito(<?= $evento ?>);" class="ftp"><i class="fas fa-trash-alt"></i></div>
       </div>
       <!-- <form class="input-apuesta">
            <small>Valor a postar:</small>
            <input class="val-apuesta" id="<?= $evento.'invertir' ;?>" type="text" onchange="invertir(<?= htmlspecialchars($apuestaJson) ?>)" name="campoValor" value="<?= $inversion ?>">
       </form> -->
   </div>
</div>

  <?php 
    } 

     $multiplicacion=0;
    foreach ($_SESSION['carrito'] as $row){
        if($row==$_SESSION['carrito'][0]){ 
            $multiplicacion = $row['cuota'];
        }else{
            $multiplicacion *=$row['cuota'];
        }
    }

    if (isset($_SESSION['inversion'])) {
       $suma_utilidad = $_SESSION['inversion'] *$multiplicacion;
       $value = $_SESSION['inversion'];
    }else{
        $suma_utilidad = 0;
        $value = 0;
    }
  ?>


<div class="widget-body contain-apuesta">
   <div class="pad">
       <div class="apuesta-cuota">
           <div style="margin-left: 8px;" class="ftp">Inversión</div>
           <div class="ftp"><input class="iput" id="apuestaValue" type="number" onchange="inversion()" name="valorApostado" value="<?= $value; ?>"></div>
       </div>
      <div class="apuesta-cuota">
           <div class="ftp">Acumulado:</div>
           <div class="ftp"><?= $multiplicacion; ?></div>
       </div>
       <div class="apuesta-cuota">
           <div class="ftp">Ganancia:</div>
           <div class="ftp"><?= $suma_utilidad; ?></div>
       </div>
       <div class="input-apuesta">
            <input class="lanz-apuesta" onclick="apostar(<?= htmlspecialchars($insertApuesta) ?>);" type="button" name="campoValor" value="Lanzar Apueta">
          
       </div>
   </div>
</div>