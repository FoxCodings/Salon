@extends('layouts.inicio')
@section('content')
<div class="col-md-12">
	<div class="card card-primary">
	    <div class="card-header with-border">

			<h3 class="card-title">Ver Venta #{{ $ventas->id }} </h3>

	    </div>

	    <form role="form">
	      <div class="card-body">
		      	<div class="row">
		      		<div class="col-md-4 ">
  			      	<div class="form-group">
  			          <label for="exampleInputPassword1">Cajera</label>
  			          <p>{{ $ventas->obtusuario->nombre }} {{ $ventas->obtusuario->apellido_paterno }} {{ $ventas->obtusuario->apellido_materno }}</p>
  			        </div>
  				    </div>



              <div class="col-md-4 ">
  			      	<div class="form-group">
  			          <label for="exampleInputPassword1">Tipo</label>
  			          <p>
                    <?php
                      if ($ventas->tipo == 1) {
                        echo 'EFECTIVO';
                      }else{
                        echo 'TARJETA';
                      }
                     ?>
                  </p>
  			        </div>
  				    </div>

              <div class="col-md-4 ">
  			      	<div class="form-group">
  			          <label for="exampleInputPassword1">Fecha de Pago</label>
  			          <p>
                    <?php
                    list($fecha,$hora) = explode(' ',$ventas->created_at);

                    list($anio,$mes,$dia) = explode('-',$fecha);

                    if ($mes == 1) {
                      $mes_fecha = 'ENERO';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 2){
                      $mes_fecha = 'FEBRERO';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 3){
                      $mes_fecha = 'MARZO';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 4){
                      $mes_fecha = 'ABRIL';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 5){
                      $mes_fecha = 'MAYO';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 6){
                      $mes_fecha = 'JUNIO';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 7){
                      $mes_fecha = 'JULIO';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 8){
                      $mes_fecha = 'AGOSTO';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 9){
                      $mes_fecha = 'SEPTIEMBRE';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 10){
                      $mes_fecha = 'OCTUBRE';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 11){
                      $mes_fecha = 'NOVIEMBRE';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

                    }elseif($mes == 12){
                      $mes_fecha = 'DICIEMBRE';
                      $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;
                    }



                      echo  $fecha_formato;
                     ?>
                  </p>
									<input type="text" name="dia_venta" class="form-control" value="{{$ebs->created_at}}">
  			        </div>
  				    </div>




		      	</div>

            <div class="row">

              <div class="col-md-3 ">
                <div class="form-group">
                  <label for="exampleInputPassword1">Total</label>
                  <p>${{ $ventas->total_venta }}</p>
                </div>
              </div>

		      		<div class="col-md-3 ">
  			      	<div class="form-group">
  			          <label for="exampleInputPassword1">Monto</label>
  			          <p>${{ $ventas->monto }}</p>
  			        </div>
  				    </div>



              <div class="col-md-3 ">
  			      	<div class="form-group">
  			          <label for="exampleInputPassword1">Cambio</label>
  			          <p>${{ $ventas->cambio }}</p>
  			        </div>
  				    </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputPassword1">Descuento</label>

                  <p>
										<?php

												if($ventas->descuento == 0){
													$valor = 0;
												}else{
													$valor = $ventas->obtdescuento->descuentos_promocion;
												}

												echo $valor;
										 ?>
										%</p>
                </div>
              </div>


		      	</div>
            @foreach($servicios as $servi)
            @endforeach
            <div class="row">
              <div class="col-md-6 ">
                <div class="form-group">
                  <label for="exampleInputPassword1">Cliente</label>
                  <p>{{ $servi->cliente }}</p>
                </div>
              </div>

							<div class="col-md-6 ">
                <div class="form-group">
                  <label for="exampleInputPassword1"></label>
									<h1>
                  <p>

										<?php


											if(isset($cita)){
												if ($cita->pagado == 1) {
													$pagados = 'PAGADO';
												}else{
													$pagados = 'SIN PAGAR';
												}
												echo $pagados;
											}else{
												if ($ventas->pagado != '') {
													$pagados = 'PAGADO';
													echo $pagados;
												}else{
													$pagados = 'SIN DATOS';
													echo $pagados;
												}

											}









										 ?>
										 </h1>
									</p>
                </div>
              </div>

            </div>



            <div class="row">
              <div class="col-md-12">
                <div class="dataTables_scroll">
                  <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                    <table class="table" id="productos_venta">
                        <thead>
                            <tr>
                                <th >Servicio</th>
                                <th >Costo</th>
                                <th >Empleado</th>
                            </tr>
                        </thead>
                        <tbody >
                          @foreach($servicios as $serv)
                          <tr>
                            <td>{{ $serv->servicio }}</td>
                            <td>${{ $serv->costo_servicio }}</td>
                            <td>{{ $serv->empleado }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


	      </div>
	      <!-- /.box-body -->
	      <div class="card-footer">
	      	<a href="/ventas/ver_ventas" class="btn btn-secondary">Regresar</a>

					<button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
	      </div>
	    </form>
	  </div>
</div>

<script type="text/javascript">
	function guardar(){

		var fecha = $('input[name=dia_venta]').val();
		var id = {{ $ventas->id }};
		//console.log(fecha,'entroi')

		Swal.fire({
					title: "¿Estas seguro?",
					text: "No podrás revertir esto!",
					icon: "warning",
					showCancelButton: true,
					confirmButtonText: "Si, Cambiar Fecha!"
			}).then(function(result) {
					if (result.value) {

						$.ajax({

							 type:"POST",

							 url:"/ventas/cambiar",
							 headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							 },
							 data:{
							id:id,
							fecha:fecha
							 },

								success:function(data){
									Swal.fire("Excelente!", data.success, "success").then(function(){   location.href ="/ventas/ver_ventas"; });

								}


						});


					}
			})
	}
</script>
@endsection
