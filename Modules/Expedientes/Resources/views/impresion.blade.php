
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/img/esc-tam.png">
    <title></title>
    <style media="screen">
      *{
        font-family: 'Lato' !important;
        line-height: 14px;
        text-transform: uppercase;
      }
      @page {
        margin: 100px 50px 50px 50px;
      }
      header {
        position: fixed;
        top: -90px;
        left: 0px;
        right: 0px;
        height: 90px;
        background-position: left;
        background-size: 2em;
        background-repeat: no-repeat;
      }
      .nombre {
        text-align: right;
        font-weight: bold;
        font-size: 11pt;
      }
      .nombres {
        text-align: center;
        font-weight: bold;
        font-size: 9pt;
      }
      table{
        font-size: 6pt;
      }
      td.negras, span.negras{
        font-weight: 900;

      }
      table.borderTop td, table.borderTop th {
        border-top: 0.5px solid lightgray;
        border-collapse: collapse;
        word-wrap: break-word;
      }
      table.borderTop td.estaNo, table.borderTop th.estaNo {
        border: none;
      }
      th{
        font-weight: 900;
        text-align: left;
      }
      table.header{
        font-size: 12pt;

      }
      span.negras{
        font-size: 6pt;
      }
      footer {
        position: fixed;
        bottom: 0px;
        left: 0px;
        right: 0px;
        height: 20px;
        text-align: right;
        font-size: 8pt;
        font-weight: 900;
      }
      footer:after { content: counter(page, decimal); }
    </style>
  </head>
  <body>
<!--     <div class="height:50px;"></div> -->
    <header>
      <br>
      <br><br>
      <table class="header">
        <tbody>
          <tr>
            <td>
              <img src="https://goldsystemvit.hbproyectos.com/cremita/img/LOGO%20SPA.png" style=" height: 60px;width:130px;">
            </td>
            <td>
              <span style="width: 25px; color: rgba(0,0,0,0);">.</span>
            </td>
            <td>

              <!-- <span>Gobierno del Estado de Tamaulipas</span><br>
              <span>Contraloría Gubernamental</span><br>
              <span>Declaración de Situación Patrimonial y de Intereses</span> -->
            </td>
          </tr>
        </tbody>
      </table>
    </header>
    <footer>
      Página
    </footer>
    <br><br>
    <div class="content">
      <table style="width: 100%;">
        <tbody>
          <tr style="border: 4px solid orange;">
            <td style="width: 100%;">
              <div style="text-align: right;font-size: 8pt;hyphens: auto;word-wrap: break-word;word-break: break-word;">
                Ciudad Victoria, Tamaulipas, <?php echo date('d');?> DE <?php

                if (date('m') == 1) {
                  echo 'ENERO';
                }elseif(date('m') == 2){
                  echo 'FEBRERO';

                }elseif(date('m') == 3){
                  echo 'MARZO';

                }elseif(date('m') == 4){
                  echo 'ABRIL';

                }elseif(date('m') == 5){
                  echo 'MAYO';

                }elseif(date('m') == 6){
                  echo 'JUNIO';

                }elseif(date('m') == 7){
                  echo 'JULIO';

                }elseif(date('m') == 8){
                  echo 'AGOSTO';

                }elseif(date('m') == 9){
                  echo 'SEPTIEMBRE';

                }elseif(date('m') == 10){
                  echo 'OCTUBRE';

                }elseif(date('m') == 11){
                  echo 'NOVIEMBRE';

                }elseif(date('m') == 12){
                  echo 'DICIEMBRE';
                }


                ?> DE <?php echo date('Y');?>.
              </div>
              <div style="height:50px;"></div>
              <div style="font-size: 11pt;hyphens: auto;word-wrap: break-word;word-break: break-word;">
                <p style="text-transform: uppercase;">Nombre Cliente: <strong>{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</strong></p>
                <br>
                @foreach($expedientes as $expediente)
                <p style="text-transform: uppercase;">el cliente confirma quer termina la sesion sin lesiones de ningun tipo y sabe que debera seguir las instrucciones post-tratamiento al pie de la letra.</p>
                <p style="text-transform: uppercase;"><strong>{{$expediente->id_sesion}}</strong>° Sesión fecha <strong><?php

                list($anio,$mes,$dia) = explode('-',$expediente->fecha);

                if ($mes == 1) {
                  $mes_fecha = 'ENERO';


                }elseif($mes == 2){
                  $mes_fecha = 'FEBRERO';


                }elseif($mes == 3){
                  $mes_fecha = 'MARZO';


                }elseif($mes == 4){
                  $mes_fecha = 'ABRIL';


                }elseif($mes == 5){
                  $mes_fecha = 'MAYO';


                }elseif($mes == 6){
                  $mes_fecha = 'JUNIO';


                }elseif($mes == 7){
                  $mes_fecha = 'JULIO';


                }elseif($mes == 8){
                  $mes_fecha = 'AGOSTO';


                }elseif($mes == 9){
                  $mes_fecha = 'SEPTIEMBRE';


                }elseif($mes == 10){
                  $mes_fecha = 'OCTUBRE';


                }elseif($mes == 11){
                  $mes_fecha = 'NOVIEMBRE';


                }elseif($mes == 12){
                  $mes_fecha = 'DICIEMBRE';

                }

                  echo $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;
                 ?> a las {{$expediente->hora}}</strong></p>
                <p style="text-transform: uppercase;">técnico <strong>{{$expediente->obtEmpleadoExp->nombre}} {{$expediente->obtEmpleadoExp->apellido_paterno}} {{$expediente->obtEmpleadoExp->apellido_materno}}</strong></p>
                @endforeach
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <!--///////////////////// FIN -->
    </div>
  </body>
</html>
