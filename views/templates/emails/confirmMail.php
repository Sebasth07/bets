
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
</style>
<!--- Nav Bar ---->
<section style="display: flex; justify-content: center; margin:auto; width: 80%;">
	<div style="width: 100%;
		   height: 100px; 
		   background: white;
		   display: flex;
		   justify-content: space-around;
		   align-items: center;
		   font-family: 'Montserrat', sans-serif;
		   -webkit-box-shadow: 3px 3px 7px 1px rgba(224,224,224,1);
		   -moz-box-shadow: 3px 3px 7px 1px rgba(224,224,224,1);
		   box-shadow: 3px 3px 7px 1px rgba(224,224,224,1);">

	<div><img style="width: 70%;" src="http://localhost/avclatam/assets/img/logos/logo.svg"></div>
	<div>
		<a style="  font-size: 12px;
    			    text-decoration: none;
				    color: #3b8c97;
				    background: #ffffff;
				    padding: 5px 20px;
				    border-radius: 5px;
				    border: 1px solid;
				    font-family: 'Montserrat', sans-serif;" href="">
					Sitio web
		</a>
	</div>
</section>
<!--- Cuerpo ---->
<section style="display: block; margin:auto; width: 80%;font-family: 'Montserrat', sans-serif;margin-top: 30px;">
	<p style="text-align: center;">Bienvenido al mundo AVC Latam</p>
	<h2 style="text-align: center;"><?= $this->strName ?></h2>
	<p style="text-align: justify;margin-top: 50px;">Aquí podrás Alquilar, Vender o Comprar lo que necesites. Para finalizar tu registro haz click en el siguiente link y estará todo listo para comenzar a disfrutar.</p>
	<div style="margin-top: 50px;">
		<a style="  text-decoration: none;
	    			font-size: 13px;
				    color: #ec4847;
				    background: white;
				    border: 1px solid;
				    padding: 10px;
				    border-radius: 10px;
				    display: block;
				    margin: auto;
				    width: 35%;
				    text-align: center;" href="http://localhost/avclatam/register/confirm/<?= $encryotEmail;?>">Click aquí para activar</a>
	</div>
	<p style="text-align: center;margin-top: 30px;">Atentamente,<br>Equipo AVC Latam</p>
	<p style="font-size: 12px;margin-top: 40px;">Si el enlace no funciona utiliza el siguiente 
		<a href="http://localhost/avclatam/register/confirm/<?= $encryotEmail;?>">Link: http://localhost/avclatam/register/confirm/<?= $encryotEmail;?></a> 
	</p>
</section>
<!--- Footer ---->
<section style="display: flex; 
				justify-content:center; 
				align-items: center;
				margin:auto; 
				font-size: 15px;
				width: 80%; height: 100px; 
				background: white;font-family: 'Montserrat', sans-serif;
			   	-webkit-box-shadow: 3px 3px 7px 1px rgba(224,224,224,1);
			   	-moz-box-shadow: 3px 3px 7px 1px rgba(224,224,224,1);
			    box-shadow: 3px 3px 7px 1px rgba(224,224,224,1);">
	<p>Copyright 2021. © Todos los derechos reservados.</p>
</section>