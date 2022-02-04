<?= 
headerNosotro($data);
navNosotros($data);
?>
<img class="spark2" src="<?= media(); ?>/img/nosotros/spark-purple.svg">
<div style="position: absolute; width:100%; height: 40vh; top: 0;" id="particles-js"></div>
		<div class="nombre">
			<h1 class="universo-title">Planes y </h1>
			<h1 style="color: #3efeff;font-weight: 900;font-size: 50px;">SERVICIOS</h1>
		</div>
</section>

<section class="quienes-somos">
	<h2 style="font-weight: 600;">Revolucionamos tu Mundo</h2>
	<div class="linea"></div>
		<p style="text-align: justify; margin-top:40px; ">Sabemos lo importante que es esto para ti, por eso diseñaremos un sitio web responsive 100%. Gráficamente nuestros sitios web son los más estéticos e impactantes, nuestra intención es que sus clientes sientan que ingresaron al mejor sitio web del mundo.</p>
</section>
<section class="sliders">
	<div id="carouselE" class="carousel slide carousel-fade" data-interval="false" data-ride="carousel" data-pause="hover" >
	  <ol class="carousel-indicators">
	    <li data-target="#carouselE" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselE" data-slide-to="1"></li>
	    <li data-target="#carouselE" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner" style="border-radius: 25px;" data-interval="false">
	    <div class="carousel-item active bg-turn">
	    	<div style="  background:#4f47cc; width: 100%; height: 100%;" class="clp">
	    		<div class="servicio1">
	    			<h3 style="color: white;margin-left: 90px;">Pagina WEB</h3>
	    			<p class="texto-servicio1">Desarrollamos sitios web enfocados en la experiencia de usuario, la transformación digital y las nuevas tendencias de diseño, aplicadas a la identidad de tu marca.</p>
	    			<h3 style="color:#3efeff ;margin-left: 90px;">$1,500.000</h3>
	    			<a class="btn-loquiero" href="">Lo Quiero</a>
	    		</div>
	    	</div>
	    </div>
	    <div class="carousel-item bg-turn2">
	      <div style="  background:#4f47cc; width: 100%; height: 100%;" class="clp">
	    		<div class="servicio1">
	    			<h3 style="color: white;margin-left: 90px;">Tienda Online</h3>
	    			<p class="texto-servicio1">Creamos tiendas virtuales que generan conexiones de confianza entre clientes y empresa, mediantes experiencias de compra ágiles y sencillas; tiendas en línea que compiten en el mercado.</p>
	    			<h3 style="color:#3efeff ;margin-left: 90px;">$2,400.000</h3>
	    			<a class="btn-loquiero" href="">Lo Quiero</a>
	    		</div>
	    	</div>
	    </div>
	    <div class="carousel-item bg-turn3">
	        <div style="  background:#4f47cc; width: 100%; height: 100%;" class="clp">
	    		<div class="servicio1">
	    			<h3 style="color: white;margin-left: 90px;">Landing Page</h3>
	    			<p class="texto-servicio1">Increiblés diseños de sitios de aterrizaje, lleva tus campañas al siguiente nivel, conecta con tus leeds y atraelos a tu CRM o tus listas de mailchimp.</p>
	    			<h3 style="color:#3efeff ;margin-left: 90px;">$900.000</h3>
	    			<a class="btn-loquiero" href="">Lo Quiero</a>
	    		</div>
	    	</div>
	    </div>
	  </div>
	  <a class="carousel-control-prev" style="border-radius: 25px;" href="#carouselE" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" style="border-radius: 25px;" href="#carouselE" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
</section>
<?= footerNosotros($data); ?>