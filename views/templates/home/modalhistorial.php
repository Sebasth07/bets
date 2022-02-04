<?php 

$h2h = $_SESSION['historial'];

$partidoHoy = $h2h['0']['partido_actual'];
$local = $h2h['0']['local'];
$visita = $h2h['0']['visita'];
$historial = $h2h['1'];
$empate = 0;
$ganalocal = 0;
$eempate = 0;
$gganalocal = 0;
for ($i=0; $i < count($historial); $i++) { 
	if ($historial[$i]['homeTeam']['team_id'] == $local) {
		$scoreL = $historial[$i]['goalsHomeTeam'];
		$scoreV = $historial[$i]['goalsAwayTeam'];
		
	}
	if ($scoreL == $scoreV) {
			$empate += 1;
		}elseif ($scoreL > $scoreV) {
			$ganalocal += 1;
		}elseif ($scoreL < $scoreV) {
			$perdidoLocal +=1;
		}
	
}
// Partidos ganado local, empatados y ganado visitante	
$ganadosLocalA = $ganalocal;
$empatesA = $empate;
$perdidosLocalA = $perdidoLocal;

//Liga y Pais
$liga = $historial['0']['league']['name'];
$logo = $historial['0']['league']['logo'];
$pais = $historial['0']['league']['country'];
$bandera = $historial['0']['league']['flag'];

for ($i=0; $i < count($historial); $i++) { 
	if ($historial[$i]['homeTeam']['team_id'] == $local) {
		$eqlocal = $historial[$i]['homeTeam']['team_name'];
		$eslocal = $historial[$i]['homeTeam']['logo'];

		$eqvisita = $historial[$i]['awayTeam']['team_name'];
		$esvisita = $historial[$i]['awayTeam']['logo'];
		
	}
}

// Equipo Local
$equipoL = $eqlocal;
$escudoL = $eslocal;

//Equipo Visitante
$equipoV = $eqvisita;
$escudoV = $esvisita;

$datosFecha = $historial['0']['event_date'];
$inicioFecha = str_replace('-', '/', date('Y-m-d H:i:s', strtotime($datosFecha)));

?>
<div class="rugal">
	<div class="fiber pruf"><img style="width:20px;" src="<?= $logo ?>"> <?= $liga ?></div>
	<div class="fiber pruf"><img style="width:20px;" src="<?= $bandera ?>"> <?= $pais ?></div>
</div>
<div class="rugalito">
	<div class="text-otp">COMPARACIÓN CARA A CARA</div>
</div>
<div class="bitubi">
	<div class="textbitubi"> Datos desde: <?= $inicioFecha ; ?> </div>
</div>
<div class="teams">
	<div class="unsplash">
		<img src="<?= $escudoL ?>">
		<p style="text-align:center;font-weight: 900;"><?= $equipoL ?></p>
	</div>
	<div class="unsplash">
		<img src="<?= $escudoV ?>">
		<p style="text-align:center;font-weight: 900;"><?= $equipoV ?></p>
	</div>
</div>
<div class="agamenon">
	<div>
		<h3 style="text-align:center;"><?= $ganadosLocalA; ?></h3>
		<div>Victorias</div>
	</div>
	<div>
		<h3 style="text-align:center;"><?= $empatesA; ?></h3>
		<div>Empates</div>
	</div>
	<div>
		<h3 style="text-align:center;"><?= $perdidosLocalA; ?></h3>
		<div>Victorias</div>
	</div>
</div>
<div class="bitubi">
	<div class="textbitubi mt-3"> Enfrentamientos Directos </div>
</div>

<div class="table-responsive">
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col" style="font-size:10px;">Fecha y Liga</th>
	      <th scope="col-1" style="font-size:10px;text-align: right;">Local</th>
	      <th scope="col-1" style="font-size:10px;text-align: center;">Resultado</th>
	      <th scope="col-1" style="font-size:10px;text-align: left;">Visita</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	
		$historialOrden = array_reverse($historial);
		for ($i=0; $i < count($historialOrden) ; $i++) { 
			$fecha_evento = $historialOrden[$i]['event_date'];
			$formatFecha = str_replace('-', '/', date('Y-m-d H:i:s', strtotime($fecha_evento)));
			$liga = $historialOrden[$i]['league']['name'];
			$estadio = $historialOrden[$i]['venue'];
			$equipoLocal = $historialOrden[$i]['homeTeam']['team_name'];
			$logoequipoLocal = $historialOrden[$i]['homeTeam']['logo'];
			$equipoVisita = $historialOrden[$i]['awayTeam']['team_name'];
			$logoequipoVisita = $historialOrden[$i]['awayTeam']['logo'];
			$golesLocal = $historialOrden[$i]['goalsHomeTeam'];
			$golesVisita = $historialOrden[$i]['goalsAwayTeam'];
		

		?>
	    <tr>
	      <th style="font-size:10px;"><?= $formatFecha; ?><br></th>
	      <td style="text-align: right;"><?= $equipoLocal ;?> <img style="width:20px" src="<?= $logoequipoLocal;?>"></td>
	      <td scope="row" style="text-align: center;color: #9c27b0;font-weight: 900;"><?= $golesLocal;?> : <?= $golesVisita ?></td>
	      <td style="text-align: left;"><img style="width:20px" src="<?= $logoequipoVisita;?>"><?= $equipoVisita ;?></td>
	    </tr>
	<? } ?>
	  </tbody>
	</table>
</div>
