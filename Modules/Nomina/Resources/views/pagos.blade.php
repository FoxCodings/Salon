@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Pago Semanal
</h3>

</div>
<div class="card-body">
  <div class="row">

  </div>
  <div class="table-responsive">
<table class="table table-bordered table-checkable" id="kt_datatable">
  <thead>
    <tr>
      <th># Semana</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
      <th>Servicio</th>
      <th>Fecha del Servicio</th>
      <th>Comisión</th>
    </tr>
    </thead>
   <tbody>
      @foreach($historial as $his)
        <tr>
          <td>{{$his->semana}}</td>
          <td>
            <?php

            list($anio,$mes,$dia) = explode('-',$his->fecha_inicio);

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


             ?>
          </td>
          <td>
            <?php

            list($anio,$mes,$dia) = explode('-',$his->fecha_fin);

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


             ?>
          </td>
          <td>{{$his->servicio}}</td>
          <td>
            <?php

            list($fecha,$hora) = explode(' ',$his->fecha_comision);

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
          </td>
          <td>${{$his->comision}}</td>

        </tr>
      @endforeach
   </tbody>
   <tfoot>
     <tr>
       <td colspan="5">Total ${{$his->total_semana}}</td>
       <td>Total ${{$his->total_comision}}</td>
     </tr>
   </tfoot>
</table>
</div>
</div>
<div class="card-footer">

  <a href="/nomina/{{$id}}/historial" class="btn btn-default">Regresar</a>


</div>
</div>
@endsection
