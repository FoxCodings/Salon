
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/img/esc-tam.png">
    <title>Credencial Empleado</title>

  </head>
  <body>



      <div style="height:100%; width: 100%;background-image:url('https://goldsystemvit.hbproyectos.com/cremita/img/credencial_nuevo.png') ;background-repeat:no-repeat;background-size:100% 100%;">

          <div style="position: absolute;top: 20%;z-index: 2;left: 4%;font-size:7px;color:black;" ></div>
          <div style="position: absolute;top: 34%;z-index: 2;left: 29%;font-size:7px;color:black;" >
            <?php  $evidencia_imagen_edit = base64_encode($alumnos->imagen_credencial); ?>
            <img width="310" height="270" src='data:image/jpg;base64,{{ $evidencia_imagen_edit }}' />
          </div>

          <div style="position: absolute;top: 72%;z-index: 2;left: 32%;font-size:25px;color:#aaa7a6;width:100%;text-transform: uppercase;" ><strong>{{$alumnos->nombre}} {{$alumnos->apellido_paterno}} {{$alumnos->apellido_materno}}</strong></div>
          <div style="position: absolute;top: 85%;z-index: 2;left: 42%;font-size:25px;color:#aaa7a6;" ><strong>TERAPEUTA</strong></div>
      </div>



  </body>
</html>
