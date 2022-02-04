<?php 
headerOficina();
navOficina();
navTop();
$saldo = $_SESSION["userData"]["saldo"];
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon" style="background:#180563 !important;">
                    <i class="material-icons">account_balance_wallet</i>          
                  </div>
                  <p class="card-category">Billetera</p>
                  <h3 class="card-title"><?= $saldo  ?>,00
                    <small style="font-size:13px;">USD</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">paid</i>
                    <a href="javascript:;">Ir a Billetera..</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon" style="background:#180563 !important;">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Apuestas Activas</p>
                  <h3 class="card-title">0</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Útimas 24hrs
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon" style="background:#180563 !important;">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Apuestas Finalizadas</p>
                  <h3 class="card-title">75</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> Ver historial
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon" style="background:yellow; !important; color:#180563;">
                    <i class="material-icons">paid</i>
                  </div>
                  <p class="card-category">Ganancias</p>
                  <h3 class="card-title">0,00</h3>
                  <small style="color:#180563;">USD</small>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Billetera
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
        </div>
      </div>

<?php 

footerOficina();
?>