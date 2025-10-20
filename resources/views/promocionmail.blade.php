<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Demystifying Email Design</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<style type="text/css">
		a[x-apple-data-detectors] {color: inherit !important;}
	</style>

</head>
<body style="margin: 0; padding: 0;">
	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td style="padding: 20px 0 30px 0;">

<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; border: 1px solid #cccccc;">
	<tr>
		<td align="center" bgcolor="#ec5a93" style="padding: 40px 0 30px 0;">
			<img src="https://goldsystemvit.hbproyectos.com/cremita/img/LOGO_GOLD_SYSTEM_VIT.png" alt="Creating Email Magic." width="300"  style="display: block;" />
		</td>
	</tr>
	<tr>
		<?php $e_message; ?>
		<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<!-- <tr>
					<td style="color: #153643; font-family: Arial, sans-serif;">
						<h1 style="font-size: 24px; margin: 0;">Email Enviado de: jair!</h1>
					</td>
				</tr> -->
				<tr>
					<td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 20px 0 30px 0;">
            <?php list($promocion,$descuento,$descripcion,$serial_promocion,$fecha_inicial_vigencia,$fecha_final_vigencia) = explode(',', $e_message); ?>


            <span style="font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Helvetica, Arial, sans-serif;text-align: center;color: #000; line-height: 150%;">
              <h1>
              <?php echo $promocion; ?>
              </h1>
            </span>

            <span style="font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Helvetica, Arial, sans-serif;text-align: center;color: #000; line-height: 26px;">
              <h2><?php echo $descripcion; ?></h2>
            </span>


            <span style="font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Helvetica, Arial, sans-serif;text-align: center;color: #000; line-height: 150%;">
              <h1>Descuento del <?php echo $descuento; ?> %</h1>
            </span>


            <span style="font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Helvetica, Arial, sans-serif;text-align: center;color: #000; line-height: 150%;">
              <h1>Número de Promoción
            <div style="height: 10px;"></div>
            <?php echo $serial_promocion; ?></h1></span>

            <span style="font-size: 14px; font-family: 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Helvetica, Arial, sans-serif;text-align: center; color: #000; line-height: 26px;">
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
              <br>
              <p style="font-size: 10px; line-height: 21px; text-align: center; margin: 0;">Favor de no responder a este correo, se ha enviado de forma automática.</p>
					</td>
				</tr>
<!-- 				<tr>
					<td>
						<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
							<tr>
								<td width="260" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
										<tr>
											<td>
												<img src="images/left.gif" alt="" width="100%" height="140" style="display: block;" />
											</td>
										</tr>
										<tr>
											<td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
												<p style="margin: 0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.</p>
											</td>
										</tr>
									</table>
								</td>
								<td style="font-size: 0; line-height: 0;" width="20"> </td>
								<td width="260" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
										<tr>
											<td>
												<img src="images/right.gif" alt="" width="100%" height="140" style="display: block;" />
											</td>
										</tr>
										<tr>
											<td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 24px; padding: 25px 0 0 0;">
												<p style="margin: 0;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget accumsan dictum, nisi libero ultricies ipsum, in posuere mauris neque at erat.</p>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr> -->
			</table>
		</td>
	</tr>
	<tr>
		<td bgcolor="#ec5a93" style="padding: 30px 30px;">
    		<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
				<tr>
					<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
						<p style="margin: 0;">® Gold System Vit <?php echo date('Y'); ?><br/>
					 <!-- <a href="#" style="color: #ffffff;">Unsubscribe</a> to this newsletter instantly</p> -->
					</td>
<!-- 					<td align="right">
						<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
							<tr>
								<td>

								</td>
								<td style="font-size: 0; line-height: 0;" width="20"> </td>
								<td>
									<a href="http://www.twitter.com/">
										<img src="images/fb.gif" alt="Facebook." width="38" height="38" style="display: block;" border="0" />
									</a>
								</td>
							</tr>
						</table>
					</td> -->
				</tr>
			</table>
		</td>
	</tr>
</table>
