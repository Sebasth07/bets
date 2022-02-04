$(document).on('focusin', function(e) {
    if ($(e.target).closest(".tox-dialog").length) {
        e.stopImmediatePropagation();
    }
});


 
$(document).ready(function () {
    document.querySelector("#cerrarM").style.display="none";
    //Cargar automaticamete Combobox
	$('#tproducto').change(function() {
		recargarLista();
	});

    $('#categorias').change(function() {
        recargarSubcategorias();
    });

     $('#subcategoria').change(function() {
        recargarTipoProducto();
    });

     $('#tipoproducto').change(function() {
        recargarMarcas();
    });
	
    $('#strDepartamento').change(function() {
        recargarCiudades();
    });
    //Boton addProducto
	if(document.querySelector(".btnAddImage")){
       let btnAddImage =  document.querySelector(".btnAddImage");
       btnAddImage.onclick = function(e){
        let key = Date.now();
        let newElement = document.createElement("div");
        newElement.id= "div"+key;
        newElement.innerHTML = `
            <div class="prevImg"></div>
            <input type="file" name="foto" id="img${key}" class="inputUploadfile">
            <label for="img${key}" class="btnUploadfile"><i class="fas fa-upload "></i></label>
            <button class="btnDeleteImg notblock" type="button" onclick="fntDelItem('#div${key}')"><i class="fas fa-trash-alt"></i></button>`;
        document.querySelector("#containerImg").appendChild(newElement);
        document.querySelector("#div"+key+" .btnUploadfile").click();
        fntInputFile();
       }
    }

	//Data Tables

	tableProductos = $('#tablaProductos').dataTable( {
    "aProcessing":true,
    "aServerSide":true,
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    },
    "ajax":{
        "url": " "+base_url+"/office/getProductos",
        "dataSrc":""
    },
    "columns":[
       
        {"data":"p_categorias"},
        {"data":"referencia"},
        {"data":"precio"},
        {"data":"unidades"},
        {"data":"status"},
        {"data":"options"}

        
    ],
    "columnDefs": [
                    { 'className': "textcenter", "targets": [ 3 ] },
                    { 'className': "textright", "targets": [ 4 ] },
                    { 'className': "textcenter", "targets": [ 5 ] }
                  ],       
    'dom': 'lBfrtip',
    'buttons': [
        {
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr":"Copiar",
            "className": "copy-btn",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr":"Esportar a Excel",
            "className": "excel-btn",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr":"Esportar a PDF",
            "className": "pdf-btn",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        },{
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr":"Esportar a CSV",
            "className": "svg-btn",
            "exportOptions": { 
                "columns": [ 0, 1, 2, 3, 4, 5] 
            }
        }
    ],
    "resonsieve":"true",
    "bDestroy": true,
    "iDisplayLength": 10,
    "order":[[0,"desc"]]  
 	});
});


// funciones Combobox Select Publicar producto
function recargarLista() {
	$.ajax({
			type: "POST",
			url: base_url+"office/getSelectCategorias",
			data:"tipo=" + $('#tproducto').val(),
			success:function(r) {
				$('#categorias').html(r);
			}
		});
  
}

function recargarSubcategorias() {
   $.ajax({
            type: "POST",
            url: base_url+"office/getSelectSubCategorias",
            data:"sub=" + $('#strCatego').val(),
            success:function(r) {
                $('#subcategoria').html(r);
            }
        });
}

function recargarTipoProducto() {
   $.ajax({
            type: "POST",
            url: base_url+"office/getSelectTipoProducto",
            data:"tproducto=" + $('#strSubCatego').val(),
            success:function(r) {
                $('#tipoproducto').html(r);
            }
        });
}


function recargarMarcas() {
   $.ajax({
            type: "POST",
            url: base_url+"office/getSelectMarcas",
            data:"marcas=" + $('#strTipoProducto').val(),
            success:function(r) {
                $('#vermarcas').html(r);
            }
        });
}

function recargarCiudades() {
   $.ajax({
            type: "POST",
            url: base_url+"office/getSelectCiudades",
            data:"ciudades=" + $('#strDepartamento').val(),
            success:function(r) {
                $('#ciudad').html(r);
            }
        });
}

function fntEditInfo(idProducto){

    document.querySelector("#titleModal").innerHTML="Actualizar Producto";

    let request = (window.XMLHttpRequest) ? 
                    new XMLHttpRequest() : 
                    new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/office/getProducto/'+idProducto;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                let htmlImage ="";
                let objProducto = objData.data;
                console.log(objProducto);

                document.querySelector("#strTransact").value = objProducto.transaccion;
                document.querySelector("#tproducto").value = objProducto.tipo;
                document.querySelector("#idProducto").value = objProducto.id;
                document.querySelector("#strPrecio").value = objProducto.precio;
                document.querySelector("#strPrecioDesc").value = objProducto.descuento;
                document.querySelector("#strDescript").value = objProducto.descripcion;
                document.querySelector("#intCantidad").value = objProducto.unidades;
                document.querySelector("#strReferencia").value = objProducto.referencia;


                if (objProducto.images.length > 0) {
                    let objProductos = objProducto.images;
                    for (let p = 0; p < objProductos.length; p++) {
                        let key = Date.now()+p;
                        htmlImage +=`<div id="div${key}">
                        <div class="prevImg">
                        <img src="${objProductos[p].url_image}"></img>
                        </div>
                       <button class="btnDeleteImg notblock" type="button" onclick="fntDelItem('#div${key}')"><i class="fas fa-trash-alt"></i></button>`;
                       document.querySelector("#containerImg").innerHTML = htmlImage;
                        document.querySelector("#containerGalery").style.display="block";
                    }
                }
               

                $('#modalF').modal('show');

            }else{
                swal("Error", objData.msg , "error");
            }
        }
    } 


    //aqui iba el modal
}


function fntDelInfo(idProducto) {
    Swal.fire({
      title: 'Eliminar Producto',
      text: "¿Realmente quiere eliminar el producto?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {

        let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/office/delProducto';
            let strData = "idProducto="+idProducto;
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                       Swal.fire(
                                  'Proceso Exitoso',
                                  objData.msg,
                                  'success'
                                );
                        tableProductos.api().ajax.reload();
                    }else{
                        Swal.fire(
                                  'Atención',
                                   objData.msg,
                                  'error'
                                );
                    }
                }
            }
        }
    })
}
// Funciones de formata caja de texto
/*tinymce.init({
    selector: '#',
    width: "100%",
    height: 200,    
    statubar: true,
    plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

});
*/



const nuevoProducto = document.querySelector("#productoForm");
    nuevoProducto.addEventListener('submit', function(e){
        e.preventDefault();
        

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
            var ajaxUrl = base_url+'office/regProd';
            var formData = new FormData(nuevoProducto);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if (request.status == 200 && request.readyState == 4){
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        if (objData.option == 1) {
                             Swal.fire({
                              icon: 'success',
                              title: 'Producto guardado',
                              text: objData.msg,
                              customClass:'swal2-container',

                            });
                            document.querySelector("#idProducto").value = objData.idproducto;
                            document.querySelector("#containerGalery").style.display="block";
                            document.querySelector("#enviar").style.display="none";
                            document.querySelector("#cerrarM").style.display="block";
                            tableProductos.api().ajax.reload();
                        }else{
                            Swal.fire({
                              icon: 'success',
                              title: 'Producto guardado',
                              text: objData.msg,
                              customClass:'swal2-container',

                            });
                            document.querySelector("#idProducto").value = objData.idproducto;
                            document.querySelector("#containerGalery").style.display="block";
                            document.querySelector("#enviar").style.display="none";
                            document.querySelector("#cerrarM").style.display="block";
                            tableProductos.api().ajax.reload();
                            window.location.reload();
                        }

                    }else{
                        Swal.fire({
                          icon: 'warning',
                          title: 'Atención',
                          text: objData.msg
                          
                        });
                    }
                    return false;
                }
            }
            
    });

    $("#cerrarM").click(function(){
        $("#modalF").modal("hide");
        window.location.reload();
    });

function fntInputFile(){
    let inputUploadfile = document.querySelectorAll(".inputUploadfile");
    inputUploadfile.forEach(function(inputUploadfile) {
        inputUploadfile.addEventListener('change', function(){
            let idProducto = document.querySelector("#idProducto").value;
            let parentId = this.parentNode.getAttribute("id");
            let idFile = this.getAttribute("id");            
            let uploadFoto = document.querySelector("#"+idFile).value;
            let fileimg = document.querySelector("#"+idFile).files;
            let prevImg = document.querySelector("#"+parentId+" .prevImg");
            let nav = window.URL || window.webkitURL;
            if(uploadFoto !=''){
                let type = fileimg[0].type;
                let name = fileimg[0].name;
                if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png'){
                    prevImg.innerHTML = "Archivo no válido";
                    uploadFoto.value = "";
                    return false;
                }else{
                    let objeto_url = nav.createObjectURL(this.files[0]);
                    prevImg.innerHTML = `<img class="loading" src="http://18.221.179.131/qa/assets/img/iconos/loading.svg">`;

                    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    let ajaxUrl = base_url+'/office/setImage'; 
                    let formData = new FormData();
                    formData.append('idproducto',idProducto);
                    formData.append("foto", this.files[0]);
                    request.open("POST",ajaxUrl,true);
                    request.send(formData);
                    request.onreadystatechange = function(){
                        if(request.readyState != 4) return;
                        if(request.status == 200){
                            let objData = JSON.parse(request.responseText);
                           if(objData.status){
                                prevImg.innerHTML = `<img src="${objeto_url}">`;
                                document.querySelector("#"+parentId+" .btnDeleteImg").setAttribute("imgname",objData.imgname);
                                document.querySelector("#"+parentId+" .btnUploadfile").classList.add("notblock");
                                document.querySelector("#"+parentId+" .btnDeleteImg").classList.remove("notblock");
                            }else{
                                swal("Error", objData.msg , "error");
                            }
                        }
                    }

                }
            }

        });
    });
}

