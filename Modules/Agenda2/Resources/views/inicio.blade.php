@extends('layouts.agendados')

@section('content')
  <link rel="stylesheet" href="/css/fullcalendar.min.css" />
  <style media="screen">
  .container {
  width: 1000%;
  /* padding-right: 12.5px; */
  /* padding-left: 60px; */
  /* margin-right: 60px; */
  /* margin-left: 60px; */
  margin-top: 50px;
  margin-bottom:10px;
  }
  </style>
<div class=" container ">
  <div class="card card-custom example example-compact">

  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <div id='full_calendar_events'></div>
      </div>
    </div>


  </div>

  </div>
</div>

<div class="modal fade" id="clientes_pendientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Clientes en lista de espera</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4 ">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Clientes <a onclick="clientesnuevos2()" class="btn btn-icon btn-primary btn-circle btn-xs mr-5">
                          <i class="fas fa-plus"></i>
                        </a></label>
                      <select class="form-control" id="clientes2"  name="clientes">
                        <option value="0">Selecciona</option>
                        @foreach($clientes as $cliente)
                        <option  value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</option>
                        @endforeach
                      </select>
                  </div>
              </div>

              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha: </label>
                  <input  type="text" name="fecha_espera"  class="form-control fecha" id="kt_datepicker4" autocomplete="off"   placeholder="Fecha cumpleaños" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Fecha
                  </div>
              </div>

              <div class="col-md-4 ">
                <div class="form-group">
                <label for="exampleInputPassword1">Servicios <small style="color:red;font-size:10px;">*</small></label>
                <div class="input-group">
                      <select class="form-control" id="servicios_2" name="servicios_2" >
                        <option value="0">Selecciona</option>
                        @foreach($servicios as $servicio)
                        <option  value="{{ $servicio->id }}">{{ $servicio->nombre }} - <?php
                        if($servicio->tipo_servicio == 1){
                          echo '1 Sesión';
                        }else{
                          echo 'Paquete';
                        }
                        ?></option>
                        @endforeach
                      </select>
                    </div>
                  </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary font-weight-bold" onclick="guardarclienteEspera()">Guardar</button>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="cliente_nuevo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Clientes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
                  <input type="text" class="form-control" id="nombre_cliente2"  placeholder="Nombre" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Nombre
                  </div>
              </div>

              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Paterno: </label>
                  <input type="text" class="form-control" id="apellido_paterno_cliente2"  placeholder="Apellido Paterno" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Apellido Paterno
                  </div>
              </div>

              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Materno: </label>
                  <input type="text" class="form-control" id="apellido_materno_cliente2"  placeholder="Apellido Materno" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Apellido Materno
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Telefono: </label>
                  <input type="text" class="form-control" id="telefono_clientes2"  placeholder="Telefono" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Telefono
                  </div>
              </div>

              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Correo Electronico: </label>
                  <input type="text" class="form-control" id="correo_electronico2"  placeholder="Correo Electronico" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Correo Electronico
                  </div>
              </div>

              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha cumpleaños: </label>
                  <input  type="text" name="fecha_cumpleanos2"  class="form-control fecha" id="kt_datepicker3" autocomplete="off"   placeholder="Fecha cumpleaños" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Fecha
                  </div>
              </div>


            </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary font-weight-bold" onclick="guardarcliente2()">Guardar</button>
          </div>
      </div>
  </div>
</div>


<div class="modal fade" id="cliente_listapendiente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Lista Clientes Espera</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
              </button>
          </div>
          <div class="modal-body">

            <table class="table table-bordered table-checkable" id="kt_datatable">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Fecha</th>
                  <th>Servicio</th>
                  <th>Acciones</th>
                </tr>
                </thead>
               <tbody>
                 @foreach($lista_espera as $lista)
                  <tr>
                    <td>{{ $lista->obtClientets->nombre }} {{ $lista->obtClientets->apellido_paterno }} {{ $lista->obtClientets->apellido_materno }}</td>
                    <td>
                      <?php
                      list($anio,$mes,$dia) = explode('-',$lista->fecha);

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
                        echo     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;
                       ?>
                    </td>
                    <td>{{ $lista->obtserviciots->nombre }}</td>
                    <td><button type="button" class='btn btn-primary' onclick="agendado({{ $lista->id }})">Agendado</button></td>
                  </tr>
                 @endforeach
               </tbody>
            </table>


          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
  </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> -->
<script src="/js/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js"></script>
<script type="text/javascript">

$(function () {
  var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;

    $("#kt_datepicker").datepicker({
        language: 'es',
        format: 'dd/mm/yyyy',
    });

    $("#kt_datepicker2").datepicker({
        language: 'es',
        format: 'dd/mm/yyyy',
    });

    $("#kt_datepicker3").datepicker({
        language: 'es',
        format: 'dd/mm/yyyy',
    });

    $("#kt_datepicker4").datepicker({
        language: 'es',
        format: 'dd/mm/yyyy',
    });
});
function clientes_pendientest(){

  $('#clientes_pendientes').modal('show');
}

function clientesnuevos2(){
    $('#cliente_nuevo2').modal('show');
}

function Listaclientes_pendientest(){
  $('#cliente_listapendiente').modal('show');
}

function agendado(id){
  //console.log(id)
  $.ajax({

     type:"POST",

     url:"/agenda2/ClienteAgendado",
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     data:{
    id:id,
     },

      success:function(data){
        location.reload();

      }


  });
}

$('#eventos').hide();

var new_table_array = [];
var array_sumacostos = [];
var array_sumavalores = [];
var array_sumavalores_total = [];
var array_sumacostos_unitario_total = [];
var arrayrecorrer_total = [];
var arraytotal_sumas_costos = [];
var estesk = 0;
var arrayGanador_Costos = [];
  var epale = [];
$(document).ready(function () {


    var calendar = $('#full_calendar_events').fullCalendar({

      selectable: true,
      height: 250,
      contentHeight: 500,
      hiddenDays: [0],
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
      },
      locale: 'es',
      dayClick: function(date, allDay, jsEvent, view) {
        var dia_calendario = allDay.target.dataset.date;
        //console.log(dia_calendario);
        if (dia_calendario == undefined) {


        }else{
          location.href="/agenda2/vista/"+dia_calendario+" ";
        }
      }


   });



});

function guardarcliente2(){
  var formData = new FormData();
  //console.log('entro')

    var id = 0;
    formData.append('id',id);


    var nombre = $('#nombre_cliente2').val();
    var apellido_paterno = $('#apellido_paterno_cliente2').val();
    var apellido_materno = $('#apellido_materno_cliente2').val();
    var telefono = $('#telefono_clientes2').val();
    var correo_electronico = $('#correo_electronico2').val();
    var fecha_cumpleanos = $('input[name=fecha_cumpleanos2]').val();

    formData.append('nombre', nombre);
    formData.append('apellido_paterno', apellido_paterno);
    formData.append('apellido_materno', apellido_materno);
    formData.append('telefono', telefono);
    formData.append('correo_electronico', correo_electronico);
    formData.append('fecha_cumpleanos', fecha_cumpleanos);

//     console.log(nombre,
// apellido_paterno,
// apellido_materno,
// telefono,
// correo_electronico,
// fecha_cumpleanos)

    if (nombre == '' || apellido_paterno == '' || telefono == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      ///////////////////////////////////////////////////////7
      $.ajax({

             type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

             url:"/ventas2/agregarcliente", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
             },
              data: formData,
             processData: false,
             contentType: false,

              success:function(data){

                  Swal.fire({
                    title: "",
                    text: "Se Agrego Satisfactoriamente",
                    icon: "success",
                    buttonsStyling: false,
                    timer: 1500,
                      showConfirmButton: false,
                  }).then(function(result) {
                    $('#nombre_cliente2').val('');
                    $('#apellido_paterno_cliente2').val('');
                    $('#apellido_materno_cliente2').val('');
                    $('#telefono_cliente2').val('');
                    $('#correo_electronico2').val('');
                    $('input[name=fecha_cumpleanos2]').val('');
                    $('#cliente_nuevo2').modal('hide');

                  })



                $('#clientes2').append('<option value=" ' + data.id + ' ">' + data.nombre +' '+data.apellido_paterno+' '+data.apellido_materno+ '</option>');



              }
        });

      /////////////////////////////////////////////////////////
    }


}

function guardarclienteEspera(){
  var formData = new FormData();
  //console.log('entro')

    var id = 0;
    formData.append('id',id);


    var clientes2 = $('#clientes2').val();
    var servicios_2 = $('#servicios_2').val();
    var fecha_espera = $('input[name=fecha_espera]').val();

    formData.append('clientes', clientes2);
    formData.append('servicios', servicios_2);
    formData.append('fecha', fecha_espera);

    if (clientes2 == 0 || fecha_espera == '' ||  servicios_2 == 0) {
      Swal.fire("Ups lo Sentimos!", 'Campos Vacios', "warning");
    }else{
      $.ajax({

             type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

             url:"/agenda2/AgregarClienteEspera", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
             },
              data: formData,
             processData: false,
             contentType: false,
              success:function(data){
                $('#clientes_pendientes').modal('hide');
                var clientes2 = $('#clientes2').val('0');
                var servicios_2 = $('#servicios_2').val('0');
                var fecha_espera = $('input[name=fecha_espera]').val('');
                location.reload();


              }
        });
    }

}

</script>
@endsection
