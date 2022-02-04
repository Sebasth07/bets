//Registrarse  
const formReg = document.querySelector("#formReg");
	formReg.addEventListener('submit', function(e){
		e.preventDefault();

		let btn = document.getElementById('register').innerHTML = "Validando Datos...";
		let strNombre = document.querySelector('#txtName').value;
		let strApellido = document.querySelector('#txtLastname').value;
		let strCorreo = document.querySelector('#txtEmail').value;
		let strPassword = document.querySelector('#txtPassword').value;
		let strCpassword = document.querySelector('#txtCpassword').value;

		if (strNombre == '' || strApellido == '' || strCorreo == '' || strPassword == '' || strCpassword == '') {

			Swal.fire({
			  icon: 'warning',
			  title: 'Atención',
			  text: 'Todos los campos son requeridos',
			  
			});
			let btn = document.getElementById('register').innerHTML = "Registrarse";
			return false;
		}else{
			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
			var ajaxUrl = base_url+'register/regUser';
			var formData = new FormData(formReg);
		 	request.open("POST",ajaxUrl,true);
		 	request.send(formData);
		 	request.onreadystatechange = function(){
		 		if (request.status == 200 && request.readyState == 4){
		 			var objData = JSON.parse(request.responseText);
		 			if (objData.status) {
		 				formReg.reset();
		 				let btn = document.getElementById('register').innerHTML = "Registrarse";
		 				Swal.fire({
						  icon: 'success',
						  title: 'Registro efectivo',
						  text: objData.msg
			  			
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

function openmodal() {
	  $('#terminos').modal('show');
}