<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Gold System Vit</title>
  <link rel="https://api.w.org/" href="/cremita/img/ICONO LOGO.png" /><link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
  <link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
  <link rel="apple-touch-icon" href="/cremita/img/ICONO LOGO.png" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--<link href="/cremita/css/estilo.css" rel="stylesheet">

   <link rel="stylesheet" href="/css/drive.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> -->

  <style>
  @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');
  @page {
          font-family: 'Pacifico', cursive;
            margin: 100px 50px 50px 50px;
       }

  .visor{
    background-color: rgb(255, 255, 255);
      width: 720px;
      height: 900px;
      margin: 0 auto;
      padding: 96px;
  }
  .visor table{
    font-size: 14px;
    text-align: justify;
  }
  *{
    font-family: 'Pacifico', cursive;
    line-height: 14px;
    text-transform: uppercase;
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
    font-size: 12pt;
  }
  table{
    font-size: 10pt;
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

  #label1 {position: absolute;top: 20.5%;z-index: 2;left: 13%;font-size:16px;color:black;font-family: 'Pacifico', cursive;width:100%;text-transform: uppercase;font-family: 'Pacifico', cursive;}

  #label2 {position: absolute;top: 26%;z-index: 2;left: 11%;font-size:16px;color:black;font-family: 'Pacifico', cursive;width:100%;text-transform: uppercase;font-family: 'Pacifico', cursive;}

  #label3 {position: absolute;top: 31%;z-index: 2;left: 19%;font-size:16px;color:black;font-family: 'Pacifico', cursive;width:100%;text-transform: uppercase;font-family: 'Pacifico', cursive;}

  #label4 {position: absolute;top: 36.5%;z-index: 2;left: 18%;font-size:16px;color:black;font-family: 'Pacifico', cursive;width:100%;text-transform: uppercase;font-family: 'Pacifico', cursive;}



  </style>


</head>
<body >
  <!-- <ul class="toolbarx">
    <li class="back">
      <a href="/ventas2/certificados">R</a>
    </li>
    <li class="pdfIcon">
      <div></div>
    </li>
    <li class="title">
      <span>Certificado de Regalo</span>
    </li>
    <li class="imprimir">
      <a class="print" href="javascript: void(0);" id="btn_edicion"></a>
    </li>
  </ul> -->
  <div id="pdf">


  <!-- <div class="content"> -->

    <!-- <table style="width: 100%;">
      <tbody>
        <tr style="border: 4px solid orange;">
          <td style="width:100%;">
            <div>
              <img src="/cremita/img/front_mujer_certificado.png" >
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <div style="height:400px;"></div> -->

    <table style="width: 100%;">
      <tbody>
        <tr style="border: 4px solid orange;">
          <td style="width:100%;font-family: 'Pacifico', cursive;">
            <div>
              <strong id="label1" >{{ $certificados->nombre }} {{ $certificados->apellido_paterno }} {{ $certificados->apellido_materno }}</strong>
              <strong id="label2" >{{ $certificados->nombre_cliente }} {{ $certificados->apellido_paterno_cliente }} {{ $certificados->apellido_materno_cliente }}</strong>
              <strong id="label3" >{{ $certificados->obtservicioCe->nombre }}</strong>
              <strong id="label4" >
                <?php
                list($anio,$mes,$dia) = explode('-',$certificados->vigencia);
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
                  echo   $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;
                 ?>
              </strong>
              @if($certificados->tipo == 1)
              <!-- <img src="/cremita/img/back_mujer_certificado.png" > -->
              <img src="https://goldsystemvit.hbproyectos.com/cremita/img/back_mujer_certificado.png" alt="">

              @else
              <!-- <img src="/cremita/img/back_hombre_certificado.png" > -->
              <img src="https://goldsystemvit.hbproyectos.com/cremita/img/back_hombre_certificado.png" alt="">
              @endif
            </div>
          </td>
        </tr>
      </tbody>
    </table>



  </div>
  <script>
  $(function() {
    $('body').delegate('.print', 'click', function(event) {
      // let el = $(event.currentTarget);
      // el.remove();
      // window.print();
      // // setTimeout(function () {
      // $('body').prepend(el);

      // var contenido = document.getElementById('pdf').innerHTML;
      // var contenidoOriginal = document.body.innerHTML;
      // console.log(contenido, contenidoOriginal);
      // document.body.innerHTML = contenido;
      // window.print();
      // document.body.innerHTML = contenidoOriginal;
      // var ficha = document.getElementById('pdf');
      // var ventimp = window.open(' ', 'popimpr');
      // ventimp.document.write( ficha.innerHTML );
      // ventimp.document.close();
      // ventimp.print( );
      // ventimp.close();
      var ventana = window.open('', 'PRINT', 'height=600,width=900');
      ventana.document.write('<html><head><title>certificado.pdf</title><style>  #label1 {position: absolute;top: 19.5%;z-index: 2;left: 16%;font-size:16px;color:black;width:100%;text-transform: uppercase;}#label2{position: absolute;top: 25%;z-index: 2;left: 16%;font-size:16px;color:black;width:100%;text-transform: uppercase;}#label3{position: absolute;top: 30.5%;z-index: 2;left: 23%;font-size:16px;color:black;width:100%;text-transform: uppercase;}#label4{position: absolute;top: 35.5%;z-index: 2;left: 21%;font-size:16px;color:black;width:100%;text-transform: uppercase;}</style>');
      ventana.document.write('</head><body >');
      ventana.document.write( document.getElementById('pdf').innerHTML );
      ventana.document.write('</body></html>');
      ventana.document.close();
      ventana.focus();
      ventana.print();
      ventana.close();
      return true;
      // }, 100);
    });
  });
</script>
</body>
</html>
