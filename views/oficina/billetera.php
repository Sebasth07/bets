<?php 
headerOficina();
navOficina();
navTop();
$saldo = $_SESSION["userData"]['saldo'];
$wallet = $_SESSION["userData"]['direccion'];
$user = seD:: encryption($_SESSION["userData"]['usuario_id']);

?>

  <div class="content">
        <div class="container-fluid">
          <div class="row">
             <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="<?= media();?>/oficina/img/wallet.png" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Saldo Disponible:</h6>
                  <h2 class="card-title"><?= $saldo ?>,00</h2>
                  <p class="card-description">
                    Dirección
                  </p>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          
                           <textarea style="border:none; width: 100%;margin-top: -28px;" class="js-copytextarea" readonly="readonly" rows="3"><?= $wallet ?></textarea>

                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-round js-textareacopybtn" style="background:#180563 !important;">Copiar</button>
                    <button type="button" data-toggle="modal" data-target="#transfer" class="btn btn-primary btn-round" style="background:yellow !important; color: black;">Enviar</button>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary" style="background:#180563 !important;">
                  <h4 class="card-title">Billetera de Usuario</h4>
                  <p class="card-category">Registros de Movimientos</p>
                </div>
                <div class="card-body">
                 <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Factura</th>
                      <th scope="col">Concepto</th>
                      <th scope="col">Valor</th>
                      <th scope="col">Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Recarga</td>
                      <td>$100,00</td>
                      <td>23-06-2021</td>
                    </tr>
                    
                  </tbody>
                </table>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
  
  <!-- Modal -->
<div class="modal fade" id="transfer" tabindex="-1" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
     
      <div class="modal-body">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Enviar Saldo a un amigo</h4>
        <div class="container-fluid">
           <form id="send" method="POST">
             <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <input type="text" value="" id="monto" name="monto" placeholder="Saldo a Enviar" class="form-control" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input disabled="" type="text"  value="Costo envío: 1USD"  class="form-control" >
                  <input hidden="" type="text" id="fee" name="fee" value="1"  class="form-control" >
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" id="wallet" name="wallet" placeholder="Billetera que recibe" class="form-control">
                  <input type="text" hidden="" id="saldo" name="saldo" value="<?= $saldo ?>" class="form-control">
                   <input type="text" hidden="" id="from" name="from" value="<?= $wallet ?>" class="form-control">
                    <input type="text" hidden="" id="user" name="user" value="<?= $user ?>" class="form-control">
                </div>
              </div>

            </div>
            <button type="submit" id="btnReg" class="btn btn-primary btn-round" style="background:#180563 !important; display: block;margin: auto;">Enviar Saldo</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>

<?php 
footerOficina();
?>