<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Reporte de Venta</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="/gestionadministrativa/drive.min.css" type="text/css" rel="stylesheet" media="print"/>
  <link href="/gestionadministrativa/print.css" type="text/css" rel="stylesheet" media="print"/>

  <style media="screen">
  @page {
    margin: 100px 50px 50px 50px;
  }
  body{
    background-color: #f8f9fa;
    font-family: 'Open Sans', sans-serif;
  }
  .visor{
    background-color: rgb(255, 255, 255);
    /* height: 720px;
    width: 960px; */

      /* width: 720px;
      height: 960px; */
      /* margin: 0 auto; */
      box-shadow: rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
      /* padding: 96px; */
  }
  .visor p{
    font-size: 14px;
    text-align: justify;
  }
  .title1 {
      margin:0;
      padding:0;
      font-size:25px;
      text-align:center;
      font-weight: bold;
  }
  .title2 {
      font-size:16px;
      text-align:center;
  }
  .title3 {
      font-size:28px;
      text-align:center;
      font-weight: bold;
  }

  </style>
</head>
<body>

  <div class="visor" id="pdf">

    <header>
      <div id="encabezado">
        <div class="img-logo">
            <img src="https://goldsystemvit.hbproyectos.com/cremita/img/LOGO PINK AND GOLD.png" style="width:150px;height:100px;" >
        </div>

        <div class="dependencia">
          <div class="title1">Reporte de Venta</div>
          <div class="title2"></div>
          <br>
          <div class="title3" ></div>
            <div class="clear"></div>
        </div>

        <div class="clear"></div>
      </div>
      <table style="width:100%">
          <tr>
              <td style="width:75%;font-size:14px">
                  <div class="datos-grals">
                      <span style="font-weight: bold">Semana del  {{$semana}}</span>
                  </div>
                  <div class="datos-grals">
                      <span style="font-weight: bold">
                        <?php


                          $dia_name = date('l');
                          $dia = date('d');
                          $anio = date('Y');
                          $mes = date('m');

                          if ($mes == 1) {
                            $meses = 'ENERO';
                          }else if($mes == 2){
                            $meses = 'FEBRERO';
                          }else if($mes == 3){
                            $meses = 'MARZO';
                          }else if($mes == 4){
                            $meses = 'ABRIL';
                          }else if($mes == 5){
                            $meses = 'MAYO';
                          }else if($mes == 6){
                            $meses = 'JUNIO';
                          }else if($mes == 7){
                            $meses = 'JULIO';
                          }else if($mes == 8){
                            $meses = 'AGOSTO';
                          }else if($mes == 9){
                            $meses = 'SEPTIEMBRE';
                          }else if($mes == 10){
                            $meses = 'OCTUBRE';
                          }else if($mes == 11){
                            $meses = 'NOVIEMBRE';
                          }else if($mes == 12){
                            $meses = 'DICIEMBRE';
                          }



                          if ( $dia_name == 'Monday') {
                            $dias = 'LUNES';
                          }else if( $dia_name == 'Tuesday'){
                            $dias = 'MARTES';
                          }else if( $dia_name == 'Wednesday'){
                            $dias = 'MIERCOLES';
                          }else if( $dia_name == 'Thursday'){
                            $dias = 'JUEVES';
                          }else if( $dia_name == 'Friday'){
                            $dias = 'VIERNES';
                          }else if( $dia_name == 'Saturday'){
                            $dias = 'SABADO';
                          }else if( $dia_name == 'Sunday'){
                            $dias = 'DOMINGO';
                          }

                          echo $dias.' '.$dia.' '.$meses.' '.$anio;


                         ?>



                      </span>

                  </div>
                  <!-- <div class="datos-grals">
                      <span style="font-weight: bold">Correo:</span>
                  </div> -->
              </td>

          </tr>
      </table>

      <!-- <table style="font-size:14px; width:100%; text-align: center">
          <tr>
              <td colspan="3" class="text-encabezado-datos" style="width:20%!important">
                  <div class="title-pie">
                      Encargado
                  </div>
                  <div></div>
              </td>

              <td class="text-encabezado-datos" style="width:15%">

                  <div class="title-pie">FECHA EMISIÓN</div>
                  <div class="title-pie">

                  </div>

              </td>
          </tr>
      </table> -->
    </header>
    <main>

      <div id="datos">
          <!--tabla de articulos-->
          <table style="width:100%;text-align: center;border-bottom:1px solid #000; margin-bottom:5px; margin-top:10px;font-size:12px;">
              <thead style="background-color:#a1a1a1;border:1px solid #000">
                  <tr>
                      <th style="width:5%">Nota</th>
                      <th style="width:20%">Cliente</th>
                      <th style="width:60%">Servicio</th>
                      <th style="width:5%">Efectivo</th>
                      <th style="width:5%">Terminal</th>
                      <th style="width:5%">Transferencia</th>
                      <th style="width:5%">Point</th>
                      <th style="width:5%">Atendio</th>
                      <th style="width:5%">Porcentaje</th>
                  </tr>
              </thead>
              <tbody style="break-inside: auto;">
                @foreach($servicios as $ser)
                <tr>
                  <td>{{ $ser->id_venta }}</td>
                  <td>{{ $ser->nombre }} {{ $ser->apellido_paterno }} {{ $ser->apellido_materno }}</td>
                  <td>{{ $ser->servicio }}</td>
                  @if($ser->tipo == 1)
                    <td>${{ number_format($ser->total_venta) }}</td>
                  @else
                    <td></td>
                  @endif

                  @if($ser->tipo == 3)
                  <td>${{ number_format($ser->total_venta) }}</td>
                  @else
                    <td></td>
                  @endif

                  @if($ser->tipo == 2)
                    <td>${{ number_format($ser->total_venta) }}</td>
                  @else
                    <td></td>
                  @endif

                  @if($ser->tipo == 4)
                    <td>${{ number_format($ser->total_venta) }}</td>
                  @else
                    <td></td>
                  @endif
                  <td>{{ $ser->empleado }}</td>
                  <td>{{ $ser->porcentaje }}%</td>
                </tr>
                @endforeach


              </tbody>
              <tfoot>
                <td colspan="3">TOTALES</td>

                <td>${{ number_format($PS1) }}</td>
                <td>${{ number_format($PS3) }}</td>

                <td>${{ number_format($PS2) }}</td>
                <td>${{ number_format($PS4) }}</td>
                <td></td>

              </tfoot>
          </table>






      </div>
    </main>
  </div>
  </body>
</html>
