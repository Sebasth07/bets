const formPass = document.querySelector("#resetForm");
	formPass.addEventListener('submit', function(e){
		e.preventDefault();

		let strToken = document.querySelector('#txtId').value;
		let strPassword = document.querySelector('#txtPassword').value;
		let strCpassword = document.querySelector('#txtCpassword').value;

		if (strPassword != strCpassword) {

			Swal.fire({
			  icon: 'warning',
			  title: 'Atención',
			  text: 'Las contraseñas nos coinciden',
			});
			return false;
		}else if(strPassword == '' || strCpassword == ''){
			Swal.fire({
			  icon: 'warning',
			  title: 'Atención',
			  text: 'Debes ingresar la contraseña y confirmarla',
			});
			return false;
		}else{
			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
			var ajaxUrl = base_url+'login/newPass';
			var formData = new FormData(formPass);
		 	request.open("POST",ajaxUrl,true);
		 	request.send(formData);
		 	request.onreadystatechange = function(){
		 		if (request.status == 200 && request.readyState == 4){
		 			var objData = JSON.parse(request.responseText);
		 			if (objData.status) {
		 				
		 				Swal.fire({
						  icon: 'success',
						  title: 'Cambio Exitoso',
						  text: objData.msg
						}).then(function() {
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
		return false;
	});