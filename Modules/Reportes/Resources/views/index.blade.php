@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Reportes
</h3>
</div>
<div class="card-body">

  <h3>NOMINA por Fechas</h3>
  <div class="row">


    <div class="col-md-4 ">
        <div class="form-group">
          <label for="exampleInputPassword1">Fecha Inicio</label>
            <input class="form-control" type="text" name="fecha1" id="kt_datepicker" >
        </div>
    </div>

    <div class="col-md-4 ">
            <div class="form-group">
              <label for="exampleInputPassword1">Fecha Final</label>
                <input class="form-control" type="text"  name="fecha2" id="kt_datepicker2" >
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="form-group">
              <label for="exampleInputPassword1" style="visibility:hidden;">Clientes</label>
              <br>

              <button type="button" onclick="exportarNomina()" class="btn btn-primary">Exportar</button>

            </div>
        </div>


  </div>

  <hr>
  <h3>NOMINA por Empleado </h3>

  <div class="row">

    <div class="col-md-4 ">
        <div class="form-group">
          <label for="exampleInputPassword1">Empleados</label>
            <select class="form-control" name="empleado">
              <option value="0">Selecciona</option>
              @foreach($empleados as $emp)
              <option value="{{ $emp->id }}">{{ $emp->nombre }} {{ $emp->apellido_paterno }} {{ $emp->apellido_materno }}</option>
              @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="form-group">
          <label for="exampleInputPassword1">Fecha Inicio</label>
            <input class="form-control" type="text" name="fecha3" id="kt_datepicker3" >
        </div>
    </div>

    <div class="col-md-4 ">
            <div class="form-group">
              <label for="exampleInputPassword1">Fecha Final</label>
                <input class="form-control" type="text"  name="fecha4" id="kt_datepicker4" >
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="form-group">
              <label for="exampleInputPassword1" style="visibility:hidden;">Clientes</label>
              <br>

              <button type="button" onclick="exportarNominaEmpleado()" class="btn btn-primary">Exportar</button>

            </div>
        </div>


  </div>


</div>
</div>

<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">

$(function () {
  var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;

    $("#kt_datepicker").datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
    });

    $("#kt_datepicker2").datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
    });


    $("#kt_datepicker3").datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
    });

    $("#kt_datepicker4").datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
    });

    $("#kt_datepicker5").datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
    });

    $("#kt_datepicker6").datepicker({
        language: 'es',
        format: 'dd-mm-yyyy',
    });
});

function exportarNomina(){
  var fecha1 = $('input[name=fecha1]').val();
  var fecha2 = $('input[name=fecha2]').val();

  if ( fecha1 == '' && fecha2 == '') {
      Swal.fire("¡Lo sentimos!", 'Favor de llenar los campos de fecha', "warning");
  }else{
      location.href="/reportes/reporteNomina/"+fecha1+"/"+fecha2+" ";
  }
}

function exportarNominaEmpleado(){
  var empleado = $('select[name=empleado]').val();
  var fecha1 = $('input[name=fecha3]').val();
  var fecha2 = $('input[name=fecha4]').val();

  if (empleado == 0 && fecha1 == '' && fecha2 == '') {
      Swal.fire("¡Lo sentimos!", 'Favor de llenar los campos de fecha', "warning");
  }else{
      location.href="/reportes/reporteCliente/"+empleado+"/"+fecha1+"/"+fecha2+" ";
  }

}

function exportarEmpleado(){
  var empleados = $('select[name=empleados]').val();
  var fecha3 = $('input[name=fecha3]').val();
  var fecha4 = $('input[name=fecha4]').val();

  if (empleados == 0 && fecha3 == '' && fecha4 == '') {
      Swal.fire("¡Lo sentimos!", 'Favor de llenar los campos de fecha', "warning");
  }else{
      location.href="/reportes2/reporteEmpleado/"+empleados+"/"+fecha3+"/"+fecha4+" ";
  }
}

function exportarTotales(){
  var fecha5 = $('input[name=fecha5]').val();
  var fecha6 = $('input[name=fecha6]').val();

  if ( fecha5 == '' && fecha6 == '') {
      Swal.fire("¡Lo sentimos!", 'Favor de llenar los campos de fecha', "warning");
  }else{
      location.href="/reportes2/reporteTotales/"+fecha5+"/"+fecha6+" ";
  }
}


</script>
@endsection
