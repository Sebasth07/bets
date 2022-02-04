<?php 

$nombre = $_SESSION["userData"]["nombre"];
$saldo = $_SESSION["userData"]["saldo"];

?>
<div class="logo"><a href="" class="simple-text logo-normal">
         Oficina Virtual
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url(); ?>oficina" style="background:#180563;">
              <i class="material-icons">dashboard</i>
              <p>Tablero</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url(); ?>oficina/usuario">
              <i class="material-icons">person</i>
              <p>Usuario</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="">
              <i class="material-icons">content_paste</i>
              <p>Mis Apuestas</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="<?= base_url();?>oficina/billetera">
              <i class="material-icons">library_books</i>
              <p>Billetera</p>
            </a>
          </li>
          
          
          <li class="nav-item active-pro ">
            <a class="nav-link" href="<?= base_url();?>">
              <i class="material-icons">unarchive</i>
              <p>Volver a Apuestas</p>
            </a>
          </li>
        </ul>
      </div>
    </div>