@extends('layouts.inicio')

@section('content')
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" /> -->
  <link rel="stylesheet" href="/css/fullcalendar.min.css" />
<!-- <div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">
				AGENDA PINK AND GOLD
			</h3>
		</div>

	</div>
	<div class="card-body">
		<div id="full_calendar_events"></div>
	</div>
</div> -->




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
                                <label>Titulo :</label>
                                <input  type="text" name="text" class="form-control" id="equipo" disabled>

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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> -->
<script src="/js/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js"></script>
<script>
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

           url:"/agendas/calendario",
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

                   url:"/agendas/VerEvento",
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
                          $('#exampleModalScrollable').modal('show');

                      }

                    }


                });

              },

          });


        }
      });

      });





  </script>
@endsection
