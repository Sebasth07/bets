<?php

$curl = curl_init();
$fecha = date('Y-m-d');
curl_setopt_array($curl, [
  CURLOPT_URL => 'https://api-football-v1.p.rapidapi.com/v3/odds?date='.$fecha.'&bookmaker=8&page=1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "x-rapidapi-host: api-football-v1.p.rapidapi.com",
    "x-rapidapi-key: 55431c5d19msh4f8c6c4506cb1d5p1de896jsn6084ae1b075c"
  ],
]);


$response = curl_exec($curl);

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

  $decode = json_decode($response, true);
  $respuesta = $decode['response'];

 //dep($respuesta);

}

?>

 <div class="card">
    <div class="card-header" style="background:#fdd50b;">
        <h3>PARTIDOS DE FUTBOL</h3>
        
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Hoy</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mañana</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Todos los Partidas</a>
            </li>
            <li class="search-game">
                <input type="text" placeholder="Buscar">
                <i class="fa fa-print"></i>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col-4">Evento</th>
                            <th scope="col">Estadísticas</th>
                            <th scope="col">1</th>
                            <th scope="col">Ganador <br>X</th>
                            <th scope="col">2</th>
                            <th scope="col">Más Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            for ($i=0; $i < count($respuesta) ; $i++) { 
                            $info_ligas = $respuesta[$i]['league'];
                            $info_equipos = $respuesta[$i]['fixture'];

                            $fecha_cotejo = str_replace('-', '/', date('Y-m-d H:i:s', strtotime($info_equipos['date'])));
                            $hora_cotejo = str_replace('-', '/', date('H:i:s', strtotime($info_equipos['date'])));

                            $curll = curl_init();

                            curl_setopt_array($curll, [
                            CURLOPT_URL => "https://api-football-v1.p.rapidapi.com/v3/fixtures?id=".$info_equipos['id'],
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => [
                            "x-rapidapi-host: api-football-v1.p.rapidapi.com",
                            "x-rapidapi-key: 55431c5d19msh4f8c6c4506cb1d5p1de896jsn6084ae1b075c"
                            ],
                            ]);

                            $responsee = curl_exec($curll);
                            $errr = curl_error($curll);

                            curl_close($curll);

                            if ($errr) {
                            echo "cURL Error #:" . $errr;
                            } else {

                            $decod = json_decode($responsee, true);
                            $info_equipo_L = $decod['response']['0']['teams']['home']['name'];
                            $logo_equipo_L = $decod['response']['0']['teams']['home']['logo'];
                            $id_equipo_L = $decod['response']['0']['teams']['home']['id'];
                            $info_equipo_V = $decod['response']['0']['teams']['away']['name'];
                            $logo_equipo_V = $decod['response']['0']['teams']['away']['logo'];
                            $id_equipo_V = $decod['response']['0']['teams']['away']['id'];
                            //dep($info_equipos);


                            }

                            $info_apuestas_L = $respuesta[$i]['bookmakers']['0']['bets']['0']['values']['0']['odd'];
                            $info_apuestas_E = $respuesta[$i]['bookmakers']['0']['bets']['0']['values']['1']['odd'];
                            $info_apuestas_V = $respuesta[$i]['bookmakers']['0']['bets']['0']['values']['2']['odd'];
                            $info_goles = $respuesta[$i]['bookmakers']['0']['bets']['3']['values']['0']['value'];
                            $info_over = $respuesta[$i]['bookmakers']['0']['bets']['3']['values']['0']['odd'];
                            $info_under = $respuesta[$i]['bookmakers']['0']['bets']['3']['values']['1']['odd'];
                            ?>
                          <tr>
                            <td> <?= $fecha_cotejo ?></td>
                            <td><img style="width:20px;" src="<?= $logo_equipo_L; ?>"><span style="font-weight:900; font-size:10px;"><?= $info_equipo_L; ?></span>  | <img style="width:20px;" src="<?= $logo_equipo_V; ?>"><span style="font-weight:900; font-size:10px;"><?= $info_equipo_V; ?> </span> <br><img style="width:10px;" src="<?= $info_ligas['logo']; ?>"> <span style="font-size:10px;font-weight: 500;"><?= $info_ligas['name']; ?></span> - <img style="width:10px;" src="<?= $info_ligas['flag']; ?>"> <span style="font-size:10px;font-weight: 500;"> <?= $info_ligas['country']; ?></span>
                            </td>
                            <td>
                                <?php
                                    $equipos_info = ['id_local' => $id_equipo_L, 'id_visita' => $id_equipo_V, 'id_partido' => $info_equipos['id']]; 
                                    //dep($equipos_info) ;
                                    $enviar_equipos = json_encode($equipos_info);
                                    $idPartido = $info_equipos['id'] ;

                                    $inversion = 0;
                                    $total = 0;
                                ?>

                                <button type="button" onclick="historial(<?= htmlspecialchars($enviar_equipos) ?>);" class="btnestadis"><i class="fas fa-chart-bar"></i></button>

                                <!-- <button type="button" onclick="clientes(<? echo $idPartido; ?>);" class="btnn"><i class="fas fa-chart-bar"></i></button> -->
                            </td>
                            <td class="contenedor-cuota">
                                <?php 
                                $ticket = array('id'=>$idPartido, 
                                                 'cuota'=>$info_apuestas_L, 
                                                 'equipoL'=>$info_equipo_L, 
                                                 'equipoV'=>$info_equipo_V,
                                                 'apuestaT'=>'Match Winner',
                                                 'apostadoA'=>'local',
                                                 'total'=>$total,
                                                 'fecha'=>$fecha_cotejo

                                                ); 

                                $apuestaJson = json_encode($ticket);
                                ?>
                                <button type="button" id="<?php echo $idPartido.'l'; ?>" onclick="clientes(<?= htmlspecialchars($apuestaJson) ?>)" class="btnn btn-cuota"><?=  $info_apuestas_L ;?></button> 
                            </td>
                            <td class="contenedor-cuota">
                                <?php 
                                $ticket = array('id'=>$idPartido, 
                                                 'cuota'=>$info_apuestas_E, 
                                                 'equipoL'=>$info_equipo_L, 
                                                 'equipoV'=>$info_equipo_V,
                                                 'apuestaT'=>'Match Winner',
                                                 'apostadoA'=>'empate',
                                                 'total'=>$total,
                                                 'fecha'=>$fecha_cotejo
                                                ); 

                                $apuestaJson = json_encode($ticket);
                                ?>
                                 <button type="button" id="<?php echo $idPartido.'e'; ?>" onclick="clientes(<?= htmlspecialchars($apuestaJson) ?>)" class="btnn btn-cuota"><?=  $info_apuestas_E ;?></button>
                            </td>
                            <td class="contenedor-cuota">
                                <?php 
                                $ticket = array('id'=>$idPartido, 
                                                 'cuota'=>$info_apuestas_V, 
                                                 'equipoL'=>$info_equipo_L, 
                                                 'equipoV'=>$info_equipo_V,
                                                 'apuestaT'=>'Match Winner',
                                                 'apostadoA'=>'visitante',
                                                 'total'=>$total,
                                                 'fecha'=>$fecha_cotejo
                                                ); 

                                $apuestaJson = json_encode($ticket);
                                ?>

                                <button type="button" id="<?php echo $idPartido.'v'; ?>" onclick="clientes(<?= htmlspecialchars($apuestaJson) ?>)" class="btnn btn-cuota"><?=  $info_apuestas_V ;?></button>
                            </td>
                             <td>

                                <?php
                                    $equipos_array = ['id_local' => $id_equipo_L, 'id_visita' => $id_equipo_V, 'id_partido' => $info_equipos['id']]; 
                                    //dep($equipos_info) ;
                                    $arrData = json_encode($equipos_array);
                                    $idPartido = $info_equipos['id'] ;
                                    $encryotData = seD:: encryption($arrData);

                                ?>

                                <button class="btnn" onclick="masoptions(<?= htmlspecialchars($arrData) ?>);"><i class="fas fa-calendar-plus"></i></button>
                            </td>
                           <!--  <td>
                                <a href="" class="btnn"><?= $info_goles ;?></a>
                            </td>
                            <td>
                                <a href="" class="btnn"><?=  $info_over;?></a>
                            </td>
                            <td>
                                <a href="" class="btnn"><?=  $info_under;?></a>                                                    
                            </td> -->
                            
                          </tr>
                           <?php  } ?>
                          
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-striped">
                         <thead>
                          <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Evento</th>
                            <th scope="col">Estadísticas</th>
                            <th scope="col">1</th>
                            <th scope="col">Ganador <br>X</th>
                            <th scope="col">2</th>
                            <th scope="col">Goles</th>
                            <th scope="col">Mas de</th>
                            <th scope="col">Menos de</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-striped">
                        <thead>
                         <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Evento</th>
                            <th scope="col">Estadísticas</th>
                            <th scope="col">1</th>
                            <th scope="col">Ganador <br>X</th>
                            <th scope="col">2</th>
                            <th scope="col">Goles</th>
                            <th scope="col">Mas de</th>
                            <th scope="col">Menos de</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    </div>
</div>'