// Validar email

function validarEmail(valor) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
   alert("La dirección de email " + valor + " es correcta.");
  } else {
   alert("La dirección de email es incorrecta.");
  }
}

// Registrar Usuario
var formRegister = document.querySelector("#registerForm");
	formRegister.onsubmit = function(a){
		a.preventDefault();

		//crear el loader

		let loader = document.createElement('img');
			loader.src = '../../Prohotel/assets/img/auth/logo/loading.gif';
			loader.style.width = '30px';
		let btn = document.getElementById('btnRegister').innerHTML = "Validando Datos";
		let btnLoader = document.getElementById('btnRegister').appendChild(loader); 
		let doc = document.querySelector('#document').value;
		let mail = document.querySelector('#email').value;
		let strPassword = document.querySelector('#password').value;
		let strCpassword = document.querySelector('#cpassword').value;

		if (doc == '' || mail == '' || strPassword == '' || strCpassword == '') {

			Swal.fire({
			  toast:true,
			  position: 'top-end',
			  icon: 'warning',
			  title: 'Atención',
			  text: 'Todos los campos son requeridos',
			  
			});
			let btn = document.getElementById('btnRegister').innerHTML = "Registrarse";
			let btnLoader = document.getElementById('btnRegister').appendChild();
			return false;
		}
		else{
			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
			var ajaxUrl = base_url+'/auth/registerUser';
			var formData = new FormData(formRegister);
			request.open("POST",ajaxUrl,true);
		 	request.send(formData);
		 	request.onreadystatechange = function(){
		 		if (request.status == 200 && request.readyState == 4){
		 			var objData = JSON.parse(request.responseText);
		 			if (objData.status) {
		 				formRegister.reset();
		 				let btn = document.getElementById('btnRegister').innerHTML = "Registrarse";
		 				Swal.fire({
		 					toast:true,
			  			position: 'top-end',
						  icon: 'success',
						  title: 'Registro efectivo',
						  text: objData.msg
			  			
						});
		 			}else{
		 				let btn = document.getElementById('btnRegister').innerHTML = "Registrarse";
		 				Swal.fire({
		 					toast:true,
			  			position: 'top-end',
						  icon: 'warning',
						  title: 'Atención',
						  text: objData.msg
						  
						});
		 			}
		 		}
		 	}
		}
	}
