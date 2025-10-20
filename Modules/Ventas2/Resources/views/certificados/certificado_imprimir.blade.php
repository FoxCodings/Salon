<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Gold System Vit</title>
  <link rel="https://api.w.org/" href="/cremita/img/ICONO LOGO.png" /><link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
  <link rel="icon" href="/cremita/img/ICONO LOGO.png" sizes="32x32" />
  <link rel="apple-touch-icon" href="/cremita/img/ICONO LOGO.png" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/drive.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <style>
  .visor{
    background-color: rgb(255, 255, 255);
      width: 720px;
      height: 960px;
      margin: 0 auto;
      padding: 96px;
  }
  .visor table{
    font-size: 14px;
    text-align: justify;
  }
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

  </style>
</head>
<body>
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

    <table style="width: 100%;">
      <tbody>
        <tr style="border: 4px solid orange;">
          <td style="width:100%;">
            <div>
              @if($certificados->tipo == 1)
              <!-- <img src="/cremita/img/back_mujer_certificado.png" > -->
              <img src="https://goldsystemvit.hbproyectos.com/cremita/img/front_mujer_certificado.png" alt="">

              @else
              <!-- <img src="/cremita/img/front_hombre_certificado.png" > -->
              <img src="https://goldsystemvit.hbproyectos.com/cremita/img/front_hombre_certificado.png" alt="">
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

      var ventana = window.open('', 'PRINT', 'height=600,width=900');
      ventana.document.write('<html><head><title>certificado.pdf</title>');
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
