

const regFrom = document.querySelector("#regFrom");
	regFrom.addEventListener('submit', function(e){
		e.preventDefault();

		let btn = document.getElementById('btnReg').innerHTML = "Creando Cuenta...";
		let strNombre = document.querySelector('#txtNombre').value;
		let strSNombre = document.querySelector('#txtSnombre').value;
		let strApellidos = document.querySelector('#txtApellidos').value;
		let intIdentifica = document.querySelector('#intIdentidicacion').value;
		let strCorreo = document.querySelector('#txtEmail').value;
		let strContrasena = document.querySelector('#pswdr').value;
		let strSContrasena = document.querySelector('#cPswdr').value;

		
		if (strNombre == '' || strApellidos == '' || intIdentifica == '' || strCorreo == '' || strContrasena == '' || strSContrasena == '') {

			Swal.fire({
			  icon: 'error',
			  title: 'Atención',
			  text: 'Todos los campos son requeridos con asterisco son requeridos',
			  
			});
			let btn = document.getElementById('btnReg').innerHTML = "CREAR MI CUENTA";
			return false;
		}
		else{
			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
			var ajaxUrl = base_url+'home/createUser';
			var formData = new FormData(regFrom);
		 	request.open("POST",ajaxUrl,true);
		 	request.send(formData);
		 	request.onreadystatechange = function(){
		 		if (request.status == 200 && request.readyState == 4){
		 			var objData = JSON.parse(request.responseText);
		 			if (objData.status) {
		 				regFrom.reset();
		 				let btn = document.getElementById('btnReg').innerHTML = "CREAR MI CUENTA";
		 				Swal.fire({
						  icon: 'success',
						  title: 'Usuario Creado.',
						  text: objData.msg
						}).then(function() {
			                window.location = base_url;
			            });
		 			}else{
		 				Swal.fire({
						  icon: 'error',
						  title: 'Atención',
						  text: objData.msg
						  
						});
		 			}
		 		}
		 	}
		}
	});

const logFrom = document.querySelector("#logFrom");
logFrom.addEventListener('submit', function(e){
	e.preventDefault();

	let strCorreol = document.querySelector('#txtdEmail').value;
	let strContrase = document.querySelector('#txtPswdr').value;

	if (strCorreol == "" || strContrase == "" ) {
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Ingresa el usuario y la contraseña'
				  
				});
				return false;
		}else{

			var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
			var ajaxUrl = base_url+'home/loginUser';
			var formData = new FormData(logFrom);
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

});



function clientes(e) {

	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
	var ajaxUrl = base_url+'home/addApuesta';
	/* Los datos deben crearse como datos de formulario, no JSON */
	var data = new FormData();
	/* Podemos codificar los datos en JSON dentro del campo del formulario */
	data.append("array", JSON.stringify(e));
	/* Configuramos la petición POST, recuerda que es asíncrona */
	request.open("POST", ajaxUrl, true);
	request.send(data);
	request.onreadystatechange = function(){
 		if (request.status == 200 && request.readyState == 4){
 			console.log(request.responseText);
 			var objData = JSON.parse(request.responseText);
 			if (objData.status) {
 				document.querySelector("#productosCarrito").innerHTML = objData.htmlCarrito;
 				document.getElementById(e.id+'l').disabled = true;
					document.getElementById(e.id+'e').disabled = true;
					document.getElementById(e.id+'v').disabled = true;
					
					if (e.apostadoA == 'local') {
						document.getElementById(e.id+'l').style.background = "#ffc107";
						document.getElementById(e.id+'l').style.color = "#252f5a";
					}else if (e.apostadoA == 'empate') {
						document.getElementById(e.id+'e').style.background = "#ffc107";
						document.getElementById(e.id+'e').style.color = "#252f5a";
					}else if (e.apostadoA == 'visitante') {
						document.getElementById(e.id+'v').style.background = "#ffc107";
						document.getElementById(e.id+'v').style.color = "#252f5a";
					}
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'success',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
 			}else{
 				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: objData.msg
				  
				});
 			}
 		}
	}
}

function dellCarrito(e){
	var random = Math.random(1, 1);
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
	var ajaxUrl = base_url+'home/dellApuesta?rompecache='+random;
	/* Los datos deben crearse como datos de formulario, no JSON */
	var data = new FormData();
	/* Podemos codificar los datos en JSON dentro del campo del formulario */
	data.append("array", JSON.stringify(e));
	/* Configuramos la petición POST, recuerda que es asíncrona */
	request.open("POST", ajaxUrl, true);
	request.send(data);
	request.onreadystatechange = function(){
		if (request.readyState != 4) return;
			if (request.status == 200){
				var objData = JSON.parse(request.responseText);
				if (objData.status){
					document.querySelector("#productosCarrito").innerHTML = objData.htmlCarrito;

					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'success',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });

					document.getElementById(e+'l').disabled = false;
					document.getElementById(e+'e').disabled = false;
					document.getElementById(e+'v').disabled = false;
					
					if (e) {
						document.getElementById(e+'l').style.background = "#ffffff";
						document.getElementById(e+'l').style.color = "#000000";

						document.getElementById(e+'e').style.background = "#ffffff";
						document.getElementById(e+'e').style.color = "#000000";

						document.getElementById(e+'v').style.background = "#ffffff";
						document.getElementById(e+'v').style.color = "#000000";

					}

				}else{
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'error',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
				}
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Algo salió mal, inténtalo de nuevo status == 200 falló.'
				  
				});
			}
			return false;
		}
}

function invertir(e){
	var random = Math.random(1, 1);
	let evento = e.evento;
	let cuota = e.cuota;

	var value = document.getElementById(evento+'invertir').value;
	var ganancia = cuota*value;

	var enviar = [evento, cuota, value, ganancia];

	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
	var ajaxUrl = base_url+'home/inversionApuesta?rompecache='+random;
	/* Los datos deben crearse como datos de formulario, no JSON */
	var data = new FormData();
	/* Podemos codificar los datos en JSON dentro del campo del formulario */
	data.append("array", JSON.stringify(enviar));
	/* Configuramos la petición POST, recuerda que es asíncrona */
	request.open("POST", ajaxUrl, true);
	request.send(data);
	request.onreadystatechange = function(){
		if (request.readyState != 4) return;
			if (request.status == 200){
				var objData = JSON.parse(request.responseText);
				if (objData.status){
					document.querySelector("#productosCarrito").innerHTML = objData.htmlCarrito;

					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'success',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });

					

				}else{
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'error',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
				}
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Algo salió mal, inténtalo de nuevo status == 200 falló.'
				  
				});
			}
			return false;
		}
}

function vaciarCarrito(){
	let confirmar = true;
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
	var ajaxUrl = base_url+'home/vaciarCarrito';
	/* Los datos deben crearse como datos de formulario, no JSON */
	var data = new FormData();
	/* Podemos codificar los datos en JSON dentro del campo del formulario */
	data.append("array", JSON.stringify(confirmar));
	/* Configuramos la petición POST, recuerda que es asíncrona */
	request.open("POST", ajaxUrl, true);
	request.send(data);
	request.onreadystatechange = function(){
		if (request.readyState != 4) return;
			if (request.status == 200){
				var objData = JSON.parse(request.responseText);
				if (objData.status){
					document.querySelector("#productosCarrito").innerHTML = objData.htmlCarrito;

					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'success',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });

					

				}else{
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'error',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
				}
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Algo salió mal, inténtalo de nuevo status == 200 falló.'
				  
				});
			}
			return false;
		}

}


function apostar(e){
	var random = Math.random(1, 1);
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
	var ajaxUrl = base_url+'home/insertApuesta?rompecache'+random;
	/* Los datos deben crearse como datos de formulario, no JSON */
	var data = new FormData();
	/* Podemos codificar los datos en JSON dentro del campo del formulario */
	data.append("array", JSON.stringify(e));
	/* Configuramos la petición POST, recuerda que es asíncrona */
	request.open("POST", ajaxUrl, true);
	request.send(data);
	request.onreadystatechange = function(){
		if (request.readyState != 4) return;
			if (request.status == 200){
				var objData = JSON.parse(request.responseText);
				if (objData.status){
		            if (objData.option == 1) {
			            	Swal.fire({
			              position: 'top-end',
			              toast:'true',
			              icon: 'success',
			              text: objData.msg,
			              backdrop:false,
			              allowOutsideClick: false,
			              showConfirmButton: false,
			              timer: 3000,
			              timerProgressBar:true
			            }).then((result) => {
						  /* Read more about handling dismissals below */
						  if (result.dismiss === Swal.DismissReason.timer) {
						    window.location = base_url;
						  }
						});
		            }
		            else if (objData.option == 2) {
		            	var ticket = objData.ticket;
		            	Swal.fire({
						    title: "Documento de Usuario!",
						    text: "Ingresa porfavor el documento del usuario, recuerda confirmarle el documento al cliente antes de finalizar.",
						    input: 'text',
						    confirmButtonText: 'Finalizar Apuesta',
						    backdrop: false      
						}).then((result) => {
						    if (result.value) {
						        function is_numeric(value) {
									return !isNaN(parseFloat(value)) && isFinite(value);
								};
								if (is_numeric(result.value)) {

									var enviar = [ticket, result.value];

									var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
									var ajaxUrl = base_url+'home/updateBet?rompecache='+random;
									/* Los datos deben crearse como datos de formulario, no JSON */
									var data = new FormData();
									/* Podemos codificar los datos en JSON dentro del campo del formulario */
									data.append("array", JSON.stringify(enviar));
									/* Configuramos la petición POST, recuerda que es asíncrona */
									request.open("POST", ajaxUrl, true);
									request.send(data);
									request.onreadystatechange = function(){
									if (request.readyState != 4) return;
										if (request.status == 200){
											var objData = JSON.parse(request.responseText);
											if (objData.status){
												Swal.fire({
									              position: 'top-end',
									              toast:'true',
									              icon: 'success',
									              text: objData.msg,
									              showConfirmButton: false,
									              timer: 3000,
									              timerProgressBar:true
									            }).then((result) => {
													  /* Read more about handling dismissals below */
													  if (result.dismiss === Swal.DismissReason.timer) {
													    window.location = base_url;
													  }
													});
											}else{
												Swal.fire({
									              position: 'top-end',
									              toast:'true',
									              icon: 'error',
									              text: objData.msg,
									              showConfirmButton: false,
									              timer: 3000,
									              timerProgressBar:true
									            });
											}
										}else{
											Swal.fire({
											  icon: 'error',
											  title: 'Atención',
											  text: 'Algo salió mal, inténtalo de nuevo status == 200 falló.'
											  
											});
										}
										return false;
									}

								}else{
									console.log('no es numerico');
								}
						    }else{
						    	console.log('result.vale viene vacío');
						    }

						});
		            }
				}else{
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'error',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
				}
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Algo salió mal, inténtalo de nuevo status == 200 falló.'
				  
				});
			}
			return false;
		}

}

function historial(e){
	var random = Math.random(1, 1);
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
	var ajaxUrl = base_url+'home/historial?rompecache='+random;
	/* Los datos deben crearse como datos de formulario, no JSON */
	var data = new FormData();
	/* Podemos codificar los datos en JSON dentro del campo del formulario */
	data.append("array", JSON.stringify(e));
	/* Configuramos la petición POST, recuerda que es asíncrona */
	request.open("POST", ajaxUrl, true);
	request.send(data);
	request.onreadystatechange = function(){
		if (request.readyState != 4) return;
			if (request.status == 200){
				var objData = JSON.parse(request.responseText);
				if (objData.status){
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'success',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
					document.querySelector("#muestraHistorial").innerHTML = objData.modalcontent;
		            $('#estadis').modal('toggle');
				}else{
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'error',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
				}
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Algo salió mal, inténtalo de nuevo status == 200 falló.'
				  
				});
			}
			return false;
		}
}

function masoptions(e) {
	var random = Math.random(1, 1);
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
	var ajaxUrl = base_url+'home/apuestaOpciones?rompecache='+random;
	/* Los datos deben crearse como datos de formulario, no JSON */
	var data = new FormData();
	/* Podemos codificar los datos en JSON dentro del campo del formulario */
	data.append("array", JSON.stringify(e));
	/* Configuramos la petición POST, recuerda que es asíncrona */
	request.open("POST", ajaxUrl, true);
	request.send(data);
	request.onreadystatechange = function(){
		if (request.readyState != 4) return;
			if (request.status == 200){
				var objData = JSON.parse(request.responseText);
				if (objData.status){
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'success',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
					document.querySelector("#optionsid").innerHTML = objData.modalcontent;
		            $('#masoption').modal('toggle');
				}else{
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'error',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
				}
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Algo salió mal, inténtalo de nuevo status == 200 falló.'
				  
				});
			}
			return false;
		}
}

function inversion(){
	let inversion = document.querySelector('#apuestaValue').value;
	var random = Math.random(1, 1);
	var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXobjet('Microsoft.XMLHTTP');
	var ajaxUrl = base_url+'home/inversion?rompecache='+random;
	/* Los datos deben crearse como datos de formulario, no JSON */
	var data = new FormData();
	/* Podemos codificar los datos en JSON dentro del campo del formulario */
	data.append("array", JSON.stringify(inversion));
	/* Configuramos la petición POST, recuerda que es asíncrona */
	request.open("POST", ajaxUrl, true);
	request.send(data);
	request.onreadystatechange = function(){
		if (request.readyState != 4) return;
			if (request.status == 200){
				var objData = JSON.parse(request.responseText);
				if (objData.status){
					document.querySelector("#productosCarrito").innerHTML = objData.htmlCarrito;
					document.querySelector('#apuestaValue').value = inversion;
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'success',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });

					

				}else{
					Swal.fire({
		              position: 'top-end',
		              toast:'true',
		              icon: 'error',
		              text: objData.msg,
		              showConfirmButton: false,
		              timer: 3000,
		              timerProgressBar:true
		            });
				}
			}else{
				Swal.fire({
				  icon: 'error',
				  title: 'Atención',
				  text: 'Algo salió mal, inténtalo de nuevo status == 200 falló.'
				  
				});
			}
			return false;
		}

}
