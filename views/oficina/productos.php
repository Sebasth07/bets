<?php 
headerOffice($data);
navOfficeTop($data);
navOffice($data);
$departametos = $data['departamentos'];


?>

<div class="contents">
	<div class="container-fluid">
	    <div class="row">
	    	<div class="col-lg-12">

	            <div class="breadcrumb-main">
	                <div class="breadcrumb-action justify-content-center flex-wrap">
	                    
	                    
	                    <div class="action-btn">
	                        <a style="color: white;" class="btn btn-sm btn-primary btn-add" data-toggle="modal" data-target="#modalF">
	                        <i class="fas-fa file-download"></i> Nuevo Producto</a>
	                    </div>
	                </div>
	            </div>

	        </div>
	    	<div class="col-lg-12 mb-30">
                <div class="card">
                    <div class="card-header color-dark fw-500">
                        Mis Productos
                    </div>
                    <div class="card-body">

                        <div class="userDatatable projectDatatable project-table bg-white w-100 border-0">
                            <div class="table-responsive">
                                <table id="tablaProductos" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Referencia</th>
                                        <th>Precio</th>
                                        <th>Unidades</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Referencia</th>
                                        <th>Precio</th>
                                        <th>Unidades</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div><!-- End: .userDatatable -->

                    </div>
                </div>
            </div>
	    </div>
	</div>
</div>
<div class="modal-basic modal fade" id="modalF" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-bg-white ">
            
            <div class="modal-body">
                <form id="productoForm" name="productoForm">
                   <h2 id="titleModal" style="text-align: center;">Nuevo Producto</h2>
                        <p style="text-align: center;">Seleccionar Categorías</p>
                        <div class="form-group">
                            <label>Tipo de Transacción</label>
                            <select required="required" id="strTransact" name="strTransact" class="form-control" >
                              <option value="0" selected disabled="">Seleccionar...</option>
                              <option value="1">Venta</option>
                              <option value="2">Alquiler</option>
                              <option value="3">Servicio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Producto</label>
                            <select required="required"  id="tproducto" name="tproducto" class="form-control">
                              <option value="0" disabled="" selected="">Seleccionar...</option>
                              <option value="1">Herramienta</option>
                              <option value="2">Maquinaria</option>
                              <option value="3">Vehículos</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <div id="categorias">
                                      
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="subcategoria">
                                        
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="tipoproducto">
                                        
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div id="vermarcas">
                                        
                            </div>
                        </div>
                        <p style="text-align: center;">Datos Envío</p>
                        <div class="form-group">
                            <label>Departamento</label>
                            <select id="strDepartamento" name="strDepartamento" class="form-control" >
                              <option selected disabled="">Seleccionar...</option>
                              <?php 
                                for ($i=0; $i < count($departametos); $i++) { 
                                  $idDepartamento = $departametos[$i]['id']; 
                                  $nombreDepartamento = $departametos[$i]['nombre']; 
                              ?>
                              <option value="<?php echo $idDepartamento  ?>"><?php echo $nombreDepartamento ?></option>
                              <?php  } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div id="ciudad">
                                        
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Distribución</label>
                            <select id="strEnvio" name="strEnvio" class="form-control" >
                              <option selected disabled="">Seleccionar...</option>
                              <option value="1">Todo el País</option>
                              <option value="2">Todo el Departamento</option>
                              <option value="3">Dentro del Municipio</option>
                            </select>
                        </div>
                        <p style="text-align: center;">Datos Básicos</p>
                         
                        <div class="form-group">
                          <input hidden="" value="" id="idProducto" name="idProducto" class="form-control" type="text" >
                        </div>
                        <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">
                                <label>Precio de Venta</label>
                                <input id="strPrecio" name="strPrecio" class="form-control" type="text" >
                              </div>
                              <div class="col-md-6">
                                <label>Precio en Descuento</label>
                                <input id="strPrecioDesc" name="strPrecioDesc" class="form-control" type="text" >
                              </div>
                            </div>
                        </div>
                         <div class="form-group mb-25">
                          <label class="form-label">Descripción</label>
                          <textarea class="form-control" id="strDescript" name="strDescript" rows="4"></textarea>
                        </div>
                         <div class="form-group">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Cantidad</label>
                                <input id="intCantidad" name="intCantidad" class="form-control" type="number" >
                              </div>
                              <div class="col-md-4">
                                <label>Referencia</label>
                                <input id="strReferencia" name="strReferencia" class="form-control" type="text" >
                              </div>
                               <div class="col-md-4">
                               
                              </div>
                            </div>
                        </div>
                         <div class="form-group mb-25 col-md-12">
                            <div id="containerGalery" class="dp-none">
                                <span>Añadir Imagen <span style="font-size: 11px;">(500px x 500px)</span></span>
                                <button class="btnAddImage  btn-info btn-sm" type="button"><i class="fas fa-plus"></i></button>
                            </div>
                            <hr>
                            <div id="containerImg">
                               
                            </div>
                        </div> 
                         <div class="form-group">
                            <div class="row">
                              <div class="col-md-4">
                              </div>
                              <div class="col-md-4">
                              </div>
                               <div class="col-md-4">
                               <button type="submit" id="enviar" class="btn btn-primary btn-lg btn-block">Continuar</button>
                                <button type="button" id="cerrarM" class="btn btn-primary btn-lg " data-bs-dismiss="modal">Finalizar</button>
                              </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php  
footerOffice($data);
?>