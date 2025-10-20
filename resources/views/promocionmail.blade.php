<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Demystifying Email Design</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
	<style type="text/css">

		h1{color:black;}
	</style>

</head>
<body style="margin: 0; padding: 0;">
	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding: 20px 0 30px 0;">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
	<tr>
		<td  style="padding:40px 0 30px 0;background-image:url('https://goldsystemvit.hbproyectos.com/cremita/img/header.png'); background-size:650px 90px; background-repeat:no-repeat" align="center"></td>
			<!-- <img src="https://goldsystemvit.hbproyectos.com/cremita/img/LOGO_GOLD_SYSTEM_VIT.png" alt="Creating Email Magic." width="300"  style="display: block;" /> -->
		</td>
	</tr>
	<tr>
		<?php $e_message; ?>
		<td style="padding: 30px 0px 0px 0px;color: #000;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">

				<tr>
					<td style="background-image:url('https://goldsystemvit.hbproyectos.com/cremita/img/body2.png'); background-size:600px 550px; background-repeat:no-repeat; font-family: Arial, sans-serif; font-size: 16px; ">
            <?php list($promocion,$descuento,$descripcion,$serial_promocion,$fecha_inicial_vigencia,$fecha_final_vigencia,$facebook,$instagram,$direccion,$telefono) = explode(',', $e_message); ?>

						<div style="height:130px;"></div>
            <span style="font-size: 33px;font-family: 'Brush Script MT', cursive;text-align: center; line-height: 150%;">
              <h1>
              <?php echo $promocion; ?>
              </h1>
            </span>
						<div style="margin-left: 25px;width:550px;">
							<span style="font-size: 12px;font-family: 'Courier New', monospace;text-align: center; line-height: 26px;">
								<h2><?php echo $descripcion; ?></h2>
							</span>
						</div>



            <span style="font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Helvetica, Arial, sans-serif;text-align: center; line-height: 150%;">
              <h1>Descuento del <?php echo $descuento; ?> %</h1>
            </span>


            <span style="font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Helvetica, Arial, sans-serif;text-align: center; line-height: 150%;">
              <h1>Número de Promoción
            <div style="height: 10px;"></div>
            <?php echo $serial_promocion; ?></h1></span>

            <span style="font-size: 12px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Helvetica, Arial, sans-serif;text-align: center;  line-height: 26px;">
              <h2>Vigencia hasta el <?php

               $fecha_final_vigencia;

              list($anio,$mes,$dia) = explode('-',$fecha_final_vigencia);

              if ($mes == 1) {
                $mes_fecha = 'ENERO';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 2){
                $mes_fecha = 'FEBRERO';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 3){
                $mes_fecha = 'MARZO';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 4){
                $mes_fecha = 'ABRIL';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 5){
                $mes_fecha = 'MAYO';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 6){
                $mes_fecha = 'JUNIO';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 7){
                $mes_fecha = 'JULIO';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 8){
                $mes_fecha = 'AGOSTO';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 9){
                $mes_fecha = 'SEPTIEMBRE';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 10){
                $mes_fecha = 'OCTUBRE';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 11){
                $mes_fecha = 'NOVIEMBRE';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

              }elseif($mes == 12){
                $mes_fecha = 'DICIEMBRE';
                $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;
              }

              echo $fecha_formato;

               ?>.
             </h2>
					 </span>
					</td>
				</tr>

			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#ec5a93" style="padding: 30px 30px;">
				<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
					<td style="color: #000; font-family: Arial, sans-serif; font-size: 14px;">
						<p><img src="https://logodownload.org/wp-content/uploads/2014/09/facebook-logo-3-1.png" width="20" height="20"><?php echo $facebook; ?></p>
						<p><img src="https://cdn.pixabay.com/photo/2021/06/15/12/17/instagram-6338401_960_720.png" width="20" height="20"><?php echo $instagram; ?></p>
						<p>Dirección:<?php echo $direccion; ?></p>
						<p>telefono:<?php echo $telefono; ?></p>
						<p style="margin: 0;">® Gold System Vit <?php echo date('Y'); ?><br/>
					</td>

				</tr>
			</table>
		</td>
	</tr>
</table>
