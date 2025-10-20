
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/img/esc-tam.png">
    <title>Credencial Empleado</title>
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
      .fotter {
        position: fixed;
        top: -90px;
        left: 480px;
        right: 0px;
        height: 90px;
        background-position: left;
        background-size: 2em;
        background-repeat: no-repeat;
      }
      .nombre {
        text-align: right;
        /* font-weight: bold; */
        font-size: 9pt;
      }
      .nombre2 {
        text-align: left;
        /* font-weight: bold; */
        font-size: 12pt;
      }
      table{
        font-size: 12pt;
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
        font-size: 6pt;
      }
      span.negras{
        font-size: 6pt;
      }
      td .label-default{
          float: right;
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
      /* footer:after { content: counter(page, decimal); } */
      .columna{
        width: 350px;
      }
      .fila{
        margin: auto;
  width: 50%;
  padding: 10px;
  padding-top: 300px;
      }
    </style>
    <style media="screen">
    .credencial{
    color: #00b4e1;
    font-family: 'Roboto Condensed', sans-serif;
    background-color: #fff;
    /* transform': scale(3,3), */
    width: 8.5cm;
    height: 5.4cm;
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    z-index: 0;
    }

    .credenciales{
      width: 5.4cm;
      height: 8.5cm;
      position: relative;
    }

    .encabezado {
      position: relative;
      width: 100%;
      letter-spacing: -0.4mm;

    }

    .azul {
      background: #0064A7;
      width: 80%;
      height: 65px;
      display: block;
      position: absolute;
      z-index: 0;
    }
    .dorado {
      background: #0064A7;
      width: 35%;
      right: 0px;
      height: 65px;
      display: block;
      position: absolute;
      z-index: 0;
    }


    .heading .logos, .heading .subtitle, .foto, img, .datos{
    position: absolute;
    z-index: 2;
    }

    .heading  {
    letter-spacing: -0.4mm;
    top: 0.1cm;
    left: 0.6cm;
    font-size: 1cm;
    z-index: 2;
    }

    .logos{
      letter-spacing: -0.4mm;
      top: -0.99cm;
      left: 0.6cm;
      font-size: 1cm;
    }

    .datos, .heading .subtitle{
    list-style: none;
    }

    .datos{
    color: black;
    bottom: 0.1cm;
    font-size: 11px;
    /* font-weight: 600; */
    left: -0.78cm;
    letter-spacing: 0.1mm
    }

    .heading .subtitle{
    font-size: 2.6mm;
    /* left: 2cm; */
    line-height: 3mm;
    font-weight: 600;
    /* color: #009cc3; */

    }

    .imagenes{
     top: 15%;
     transform: translate(-25.5%, -32.2%) scale(0.6);
     z-index: 2;
    }

    .imagenesw{

     left: 0.2cm;
     top: 17%;
     transform: translate(-25.5%, -32.2%) scale(0.6);
     z-index: 2;
    }



    .foto{
    height: 2.7cm;
    width: 2.66cm;
    right: 0.2mm;
    top: 0.2mm;

    }
    </style>
  </head>
  <body>
    <header>
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
              <!-- <img src="https://mesadeayuda.tamaulipas.gob.mx/images/encababezado.png" style=" height: 25px;  padding-bottom: 25px;;width:548px"> -->
            </td>
          </tr>
        </tbody>
      </table>
    </header>
    <footer>
      <table class="fotter">
        <tbody>
          <tr>
            <td >
              <div ></div>
            </td>
            <td >

            </td>
          </tr>
        </tbody>
      </table>
      <br>

    </footer>
    <div class="content">
      <table style="width: 100%;">
        <tbody>
          <tr style="border: 4px solid orange;">
            <td style="width: 1000%;">
              <div class="nombre">
                <!-- Folio: <strong></strong>
                <br>
                <br> -->
                <strong></strong>

                <br>
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
            </td>

          </tr>
        </tbody>
      </table>
      <div class="nombre2" >
        <strong>Aquien pueda interesar:</strong>
        <br><br><br>
        <p style="text-align:justify;">
        Reciba un cordial y respetuoso saludo. A través de estas lineas deseo hacer su conocimiento que Sr(a)<strong style="text-transform: uppercase;">{{$recomendaciones->obtEmpleados->nombre}} {{$recomendaciones->obtEmpleados->apellido_paterno}} {{$recomendaciones->obtEmpleados->apellido_materno}}</strong>,
        quien laboro en mi organización durante <strong>{{$recomendaciones->anios}} año y  {{$recomendaciones->meses}} meses</strong>, es un ciudadano con una conducta intachable. Ha demostrado ser un excelente empleado y un gran trabajador,
        comprometido, responsable y fiel cumplidor de sus tareas. Siempre ha manifestado preocupación por mejorar, capacitarse y actualizar sus conocimientos.
        <br>
        <br>
        Dureante estos años se ha desempeñado como:<strong>TERAPEUTA</strong> en funciones de <strong>{{$recomendaciones->funcion}}</strong>.Es por ello que, le sugiero considere esta recomendación, con la confianza de que estará siempre a la altura de sus compromisos y responsabilidades.
        <br>
        <br>
        Sin más nada que reafirme y, esperando que esta misiva sea tomada en cuenta, dejo mi número de contacto para cualquier información de interés.
        <br>
        Atentamente,
        <br>
        <br>
         Hilda Andrea Saldivar Trujillo
        </p>
      </div>






    </div>

  </body>
</html>
