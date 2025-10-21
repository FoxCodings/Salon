@extends('layouts.inicio')

@section('content')
@if(Auth::user()->tipo_usuario == 1 || Auth::user()->tipo_usuario == 3 || Auth::user()->tipo_usuario == 4)
<style media="screen">
@import 'https://code.highcharts.com/css/highcharts.css';

.highcharts-color-0 {
  fill: #ec5a93;
  stroke: #ec5a93;
}

.highcharts-legend-item .highcharts-column-series .highcharts-color-0 .highcharts-series-0{
  color: #ec5a93;
}

.bg-light-warning {
  background-color: #ec5a93 !important;
}
</style>

<div class="row">
    <div class="col-xl-3">
        <!--begin::Stats Widget 25-->
<div class="card card-custom bg-light-success card-stretch gutter-b">
    <!--begin::Body-->
    <div class="card-body">
      <span class="svg-icon svg-icon-2x svg-icon-success">
        <i class="flaticon-network text-success icon-lg"></i>
      </span>
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$total_empleados}}</span>
        <span class="font-weight-bold text-muted  font-size-sm">Empleados</span>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 25-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 26-->
<div class="card card-custom bg-light-success card-stretch gutter-b">
    <!--begin::ody-->
    <div class="card-body">
      <span class="svg-icon svg-icon-2x svg-icon-success">
        <i class="flaticon-users  text-success icon-lg"></i>
      </span>
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$total_clientes}}</span>
        <span class="font-weight-bold text-muted font-size-sm">Clientes</span>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 26-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 27-->
<div class="card card-custom bg-light-success card-stretch gutter-b">
    <!--begin::Body-->
    <div class="card-body">
      <span class="svg-icon svg-icon-2x svg-icon-success">
        <i class="flaticon-open-box text-success icon-lg"></i>
      </span>
        <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$total_productos}}</span>
        <span class="font-weight-bold text-muted  font-size-sm">Productos</span>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 27-->
    </div>
    <div class="col-xl-3">
        <!--begin::Stats Widget 28-->
<div class="card card-custom bg-light-success card-stretch gutter-b">
    <!--begin::Body-->
    <div class="card-body">
      <span class="svg-icon svg-icon-2x svg-icon-success">
        <i class="flaticon-folder-1  text-success icon-lg"></i>
      </span>
        <span class="card-title font-weight-bolder text-white-75 font-size-h2 mb-0 mt-6 d-block">{{$total_servicios}}</span>
        <span class="font-weight-bold text-muted  font-size-sm">Servicios</span>
    </div>
    <!--end::Body-->
</div>
<!--end::Stat: Widget 28-->
    </div>
</div>

<div class="card card-custom example example-compact">
<div class="card-body">



  <div class="row">
      <!-- <div class="col-4 d-flex flex-column">
          <div class="bg-light-warning p-8 rounded-xl flex-grow-1">
              @foreach($ventas as $vent)

              <div class="d-flex align-items-center mb-5">
                  <div class="symbol symbol-circle symbol-white symbol-30 flex-shrink-0 mr-3">
                      <div class="symbol-label">
                          <span class="svg-icon svg-icon-md svg-icon-danger"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000"/>
                            </g>
                            </svg></span>                            </div>
                  </div>
                  <div>
                      <div class="font-size-sm font-weight-bold" style="color:white;">${{ $vent->total }}</div>
                      <div class="font-size-sm" style="color:white;">{{ $vent->servicio }}</div>
                  </div>
              </div>

              @endforeach

          </div>


      </div> -->
      <div class="col-12">
            <div id="graficaLineal" style="width: 100%; height: 500px; margin: 0 auto"></div>
      </div>
  </div>

</div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <!-- <script src="/admin/assets/js/pages/widgets.js?v=7.0.6"></script> -->
<script type="text/javascript">

////////////////////////////////////////////////
chart = new Highcharts.Chart({
chart: {
  renderTo: 'graficaLineal',  // Le doy el nombre a la gráfica
  defaultSeriesType: 'column' // Pongo que tipo de gráfica es
},
title: {
  text: 'Servicios'   // Titulo (Opcional)
},
subtitle: {
  text: ''        // Subtitulo (Opcional)
},
// Pongo los datos en el eje de las 'X'
xAxis: {
  categories: ['<?php echo join("','",$data1); ?>'],
  // Pongo el título para el eje de las 'X'
  title: {
    text: 'Servicios'
  }
},
yAxis: {
  // Pongo el título para el eje de las 'Y'
  title: {
    text: 'Totales'
  }
},
// Doy formato al la "cajita" que sale al pasar el ratón por encima de la gráfica
tooltip: {
  enabled: true,
  formatter: function() {
    return '<b>'+ this.series.name +'</b><br/>'+
      this.x +': '+ this.y +' '+this.series.name;
  }
},
// Doy opciones a la gráfica
plotOptions: {
  line: {
    dataLabels: {
      enabled: true
    },
    enableMouseTracking: true
  }
},
// Doy los datos de la gráfica para dibujarlas
series: [{
              name: 'Total',
              data:   [
                              @php
                                for ($i = 0; $i < count($data2); $i ++) {
                                    echo $data2 [$i] .',';
                                }
                            @endphp
                            ]
          }],
});
</script>
@else
@endif


<!-- CALENDARIO NO VAA-->
<!-- <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>


  <link rel="stylesheet" href="/css/fullcalendar.min.css" />





  <div class="col-lg-12 ">

      <div class="card card-custom card-stretch gutter-b">

          <div class="card-header align-items-center border-0 mt-4">
              <h3 class="card-title align-items-start flex-column">
                  <span class="font-weight-bolder text-dark">Calendario de Actividades</span>
              </h3>
          </div>

          <div class="card-body">

              <div id='full_calendar_events'></div>

          </div>

      </div>

  </div>



  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle del Dia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body" style="height: 300px;">
                    <form class="form">
                      <div class="card-body" >
                              <div class="form-group row">
                                <div class="col-lg-6">
                                  <label>Nombre :</label>
                                  <input  type="text" name="text" class="form-control" id="equipo" disabled>

                                </div>
                                <div class="col-lg-6">
                                  <label>Telefono :</label>
                                  <input  type="text" name="text" class="form-control" id="telefono" disabled>
                                </div>
                                <div class="col-lg-6">
                                  <label>Servicio :</label>
                                  <input  type="text" name="text" class="form-control" id="servicio" disabled>
                                </div>
                                <div class="col-lg-6">
                                  <label>Fecha:</label>
                                  <input type="text" name="text" class="form-control" id="fecha"  disabled>
                                </div>
                                <div class="col-lg-6">
                                  <label>Descripción:</label>
                                  <textarea name="text" class="form-control" id="fip" rows="2" cols="30" disabled></textarea>
                                </div>
                              </div>
                      </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="/js/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js"></script>
<script>



$('.fc-ltr.fc-basic-view.fc-day-top.fc-day-number').click(function() {
  console.log('entro');
  alert('hohoho');
});

      $(document).ready(function () {



          let date = new Date()

          let day = date.getDate()
          let month = date.getMonth() + 1
          let yearini = date.getFullYear();

          let year = date.getFullYear() + 1

          var event_start = yearini+'-'+'01-01';
          var event_end = year+'-'+'12-31';

         /* var event_start = '01-01'+'-'+yearini;
          var event_end = '12-31'+'-'+year;*/

          var array_eventos = [];

          $.ajax({

           type:"POST",

           url:"/agenda2/calendario",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{
            event_start: event_start,
            event_end: event_end,
           },

          success:function(data){

          for (let i = 0; i < data.length; i++) {
          //console.log(data[i]);

          array_eventos.push({
               title: data[i].titulo,
                start: data[i].fecha,
                color: '#ec5a93',
                end: data[i].fecha,
                id: data[i].id,
                allDay: true,
                className: 'fc-event-success fc-event-solid-warning',
                description: data[i].descripcion,
          });

          }


          //console.log(array_eventos);

           var calendar = $('#full_calendar_events').fullCalendar({

            /*customButtons: {
                myCustomButton: {
                  text: 'custom!',
                  click: function() {
                    alert('clicked the custom button!');
                  }
                }
              },  */

            header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,agendaWeek,agendaDay,listMonth',


              },
              prev: 'fa-chevron-left',
              next: 'fa-chevron-right',
              prevYear: 'fa-angle-double-left',
              nextYear: 'fa-angle-double-right',
              aspectRatio: 3,
              editable: true,
              editable: true,
              events: array_eventos,
              displayEventTime: true,
              selectable: true,
              selectHelper: true,
              locale: 'es',

              eventRender: function(event, element) {
                  element.find('.fc-title').append("<br/>" + event.description);
              } ,
             eventClick: function(info) {
                /*console.log(info['id'],info['description']);*/


                $.ajax({

                   type:"POST",

                   url:"/agenda2/VerEvento2",
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   data:{
                    id:info['id'],
                   },

                    success:function(data){

                      for (var i = 0; i < data.length; i++) {
                        // var nombre = data[i].nombre;
                        // var apellido_p = data[i].apellido_paterno;
                        // var apellido_m = data[i].apellido_materno;

                        var descripcion = data[i].descripcion;
                        var telefono = data[i].telefono;
                        var servicio = data[i].servicio;
                        // var equipo_serie = data[i].serie;

                        var fecha  = data[i].fecha;
                        var titulo  = data[i].titulo;
                        //
                        //var asignado = nombre+' '+apellido_p+' '+apellido_m;


                          $('#equipo').val(titulo);
                          //$('#serie').val(equipo_serie);
                          $('#fecha').val(fecha);
                          //$('#asignado_a').val(asignado);
                          $('#fip').val(descripcion);
                          $('#telefono').val(telefono);
                          $('#servicio').val(servicio);




                          $('#exampleModalScrollable').modal('show');

                      }

                    }


                });


              },

          });


        }
      });

      });





  </script> -->
@endsection
