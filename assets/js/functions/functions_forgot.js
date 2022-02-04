 var formForgot = document.querySelector("#forgotForm");
	formForgot.onsubmit = function(e){
		e.preventDefault();
		var strCorreo = document.querySelector("#txtEmail").value;

		if (strCorreo == "") {
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Ingresa un correo'
				  
				});
				return false;
		}else{
			var btn = document.getElementById('olvide').innerHTML = "Solicitando...";
			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
			var ajaxUrl = base_url+'login/forgotPass';
			var formData = new FormData(formForgot);
			request.open("POST",ajaxUrl,true);
	 		request.send(formData);
	 		request.onreadystatechange = function(){
		 		if (request.status == 200 && request.readyState == 4){
		 			var objData = JSON.parse(request.responseText);
		 			if (objData.status) {
		 				formForgot.reset();
		 				Swal.fire({
						  icon: 'success',
						  title: 'Solicitud Enviada',
						  text: objData.msg
						}).then(function() {
							var btn = document.getElementById('olvide').innerHTML = "Recuperar";
			                window.location = base_url;
			            });
		 			}else{
		 				Swal.fire({
						  icon: 'warning',
						  title: 'Atención',
						  text: objData.msg
						  
						});
		 			}
		 		}
		 	}
			
		}		
	}
