

var formLog = document.querySelector("#fromLog");
	formLog.onsubmit = function(e){
		e.preventDefault();
		var strCorreo = document.querySelector('#txtEmail').value;
		var strPassword = document.querySelector('#txtPassword').value;

		if (strCorreo == "" || strPassword == "" ) {
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Ingresa el usuario y la contraseña'
				  
				});
				return false;
		}else{

			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
			var ajaxUrl = base_url+'login/loginUser';
			var formData = new FormData(formLog);
			request.open("POST",ajaxUrl,true);
	 		request.send(formData);

	 		request.onreadystatechange = function(){

		 			if (request.readyState != 4) return;
		 			if (request.status == 200) {
		 				var objData = JSON.parse(request.responseText);
		 				if (objData.status) {
		 					let timerInterval
							Swal.fire({
							  icon: 'success',	
							  title: 'Ingreso Exitoso',
							  html: 'Cargando datos....',
							  timer: 3000,
							  timerProgressBar: true,
							  didOpen: () => {
							    Swal.showLoading()
							    timerInterval = setInterval(() => {
							      const content = Swal.getContent()
							      if (content) {
							        const b = content.querySelector('b')
							        if (b) {
							          b.textContent = Swal.getTimerLeft()
							        }
							      }
							    }, 100)
							  },
							  willClose: () => {
							    clearInterval(timerInterval)
							  }
							}).then((result) => {
							  /* Read more about handling dismissals below */
							  if (result.dismiss === Swal.DismissReason.timer) {
							    window.location = base_url;
							  }
							})
		 					
		 				}else{
		 					Swal.fire({
							  icon: 'warning',
							  title: 'Atención',
							  text: objData.msg
							  
							});
							document.querySelector('#txtPassword').value = "";
		 				}
		 			}else{
		 				Swal.fire({
							  icon: 'error',
							  title: 'Atención',
							  text: 'Algo salió mal, inténtalo de nuevo.'
							  
							});
		 			}

					return false;
				}
		}
	}
