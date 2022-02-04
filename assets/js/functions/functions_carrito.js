

	function crear(){
		var dellCar = document.querySelector("#dellCar");
		var intCantidad = document.querySelector('#valueCarrito').value;
		var intProductoId = document.querySelector('#intPid').value;

		if (isNaN(intCantidad) || intCantidad < 1) {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'La cantidad debe ser mayor a 0'
			});
			return;
		}
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	    let ajaxUrl = base_url+'/tienda/addCarrito'; 
	    let formData = new FormData();
	    formData.append('id',intProductoId);
	    formData.append('cant',intCantidad);
	    request.open("POST",ajaxUrl,true);
	    request.send(formData);
	    request.onreadystatechange = function(){
	    	if(request.readyState != 4) return;
	    	if(request.status == 200){
	    		let objData = JSON.parse(request.responseText);

	    		if (objData.status) {
	    			document.querySelector("#productosCarrito").innerHTML = objData.htmlCarrito;
		    		Swal.fire({
					  icon: 'success',
					  title: 'Actualizado',
					  text: 'Se ha agregado al carrito',
					  footer: intCantidad+ '<p>Unidades agregadas</p>'
					});
	    		}else{
	    			Swal.fire({
					  icon: 'error',
					  title: "",
					  text: objData.msg
					});
	    		}
	    		
	    	}
	    	return false;
	    }
	}

	function eliminar(){
		var dellCar = document.querySelector("#dellCar");
		var intCantidad = document.querySelector('#valueCarrito').value;
		var intProductoId = document.querySelector('#intPid').value;
		if (isNaN(intCantidad) || intCantidad < 1) {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'La cantidad debe ser mayor a 0'
			});
			return;
		}
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	    let ajaxUrl = base_url+'/tienda/dellCarrito'; 
	    let formData = new FormData();
	    formData.append('id',intProductoId);
	    formData.append('cant',intCantidad);
	    request.open("POST",ajaxUrl,true);
	    request.send(formData);
	     request.onreadystatechange = function(){
	    	if(request.readyState != 4) return;
	    	if(request.status == 200){
	    		let objData = JSON.parse(request.responseText);

	    		if (objData.status) {
	    			document.querySelector("#productosCarrito").innerHTML = objData.htmlCarrito;
		    		Swal.fire({
					  icon: 'success',
					  title: 'Actualizado',
					  text: 'Se ha agregado al carrito',
					  footer: intCantidad+ '<p>Unidades agregadas</p>'
					});
	    		}else{
	    			Swal.fire({
					  icon: 'error',
					  title: "",
					  text: objData.msg
					});
	    		}
	    		
	    	}
	    	return false;
	    }


	}
