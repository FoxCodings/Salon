@extends('layouts.agendado')

@section('content')
<link rel="stylesheet" href="/css/fullcalendar.min.css" />

<style>
/* Asegura que el contenedor principal use el 100% del ancho y esté bien espaciado */
.container-calendar {
  width: 100%;
  max-width: 100%;
  padding: 80px 80px; /* separa de las barras laterales */
  margin: 0 auto; /* centra el contenido */
  box-sizing: border-box;
}

/* El card se adapta sin pegarse */
.card-calendar {
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  padding: 20px;
}

/* El contenedor del calendario debe ocupar todo el espacio posible */
#full_calendar_events {
  width: 100%;
  min-height: calc(100vh - 200px); /* ajusta según tu header/sidebar */
}

/* Ajustes responsivos */
@media (max-width: 768px) {
  .container-calendar {
    padding: 10px;
  }
}
</style>

<div class="container-calendar">
  <div class="card card-calendar">
    <div class="card-body">
      <div id="full_calendar_events"></div>
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

     url:"/agendas/ClienteAgendado",
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


   //  var calendar = $('#full_calendar_events').fullCalendar({
   //
   //    selectable: true,
   //    height: 250,
   //    contentHeight: 500,
   //    hiddenDays: [0],
   //    headerToolbar: {
   //      left: 'prev,next today',
   //      center: 'title',
   //    },
   //    locale: 'es',
   //    dayClick: function(date, allDay, jsEvent, view) {
   //      var dia_calendario = allDay.target.dataset.date;
   //      //console.log(dia_calendario);
   //      if (dia_calendario == undefined) {
   //
   //
   //      }else{
   //        location.href="/agendas/vista/"+dia_calendario+" ";
   //      }
   //    }
   //
   //
   // });
//    var calendar = $('#full_calendar_events').fullCalendar({
//   selectable: true,
//   height: 250,
//   contentHeight: 500,
//   hiddenDays: [0], // ocultar domingos
//   header: {
//     left: 'prev,next today',
//     center: 'title',
//   },
//   locale: 'es',
//
//   // 🔹 Redirige al hacer clic en el día
//   dayClick: function(date, jsEvent, view) {
//     var dia_calendario = date.format('YYYY-MM-DD');
//     location.href = "/agendas/vista/" + dia_calendario;
//   },
//
//   // 🔹 Renderiza contenido adicional en cada celda de día
//   dayRender: function(date, cell) {
//
//
//
//     // Puedes decidir si el día está inactivo aquí:
//     // Ejemplo: todos los días pasados o domingos (si no están ocultos)
//     if (date.isBefore(moment(), 'day')) {
//       $(cell).append('<div class="text-muted text-center" style="font-size:10px; margin-top:5px;"><strong style="color:white;font-size:13px;">Día Terminado</strong></div>');
//     }
//   }
// });


var calendar = $('#full_calendar_events').fullCalendar({
  selectable: true,
  height: 250,
  contentHeight: 500,
  hiddenDays: [0], // Oculta domingos
  header: {
    left: 'prev,next today',
    center: 'title',
  },
  locale: 'es',

  // 🔹 Acción al hacer clic en el día
  dayClick: function(date, jsEvent, view) {
    var dia_calendario = date.format('YYYY-MM-DD');
    location.href = "/agendas/vista/" + dia_calendario;
  },

  // 🔹 Personalizar cada celda del calendario
  dayRender: function(date, cell) {
    var hoy = moment().format('YYYY-MM-DD');
    var diaActual = date.format('YYYY-MM-DD');

    if (diaActual === hoy) {
      // Día actual
      $(cell).css({
        // 'background-color': '#e3f2fd',
        // 'border': '2px solid #1976d2',
        // 'border-radius': '6px'
      });
      $(cell).append(
        '<div class="text-center" style="font-size:10px; margin-top:4px;"><strong style="color:white;font-size:13px;">Día actual</strong></div>'
      );
    } else if (date.isBefore(moment(), 'day')) {
      // Día aclarado (pasado)
      $(cell).append(
        '<div class="text-muted text-center" style="font-size:10px; margin-top:4px;"><strong style="color:white;font-size:13px;">Día Terminado</strong></div>'
      );
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

             url:"/agendas/AgregarClienteEspera", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
