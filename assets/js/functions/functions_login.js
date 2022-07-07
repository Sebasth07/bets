
// Iniciar Sessión ----------------------------------
var formLog = document.querySelector("#logingForm");
	formLog.onsubmit = function(e){
		e.preventDefault();

		var doc = document.querySelector('#document').value;
		var password = document.querySelector('#password').value;

		if (doc === "" || password === "" ) {
				Swal.fire({
				  toast:true,
				  position: 'top-end',
				  icon: 'error',
				  title: 'Atención',
				  text: 'Campos Vacíos'
				  
				});
				return false;
		}
	}

