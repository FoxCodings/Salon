@extends('layouts.agendados')

@section('content')
  <link rel="stylesheet" href="/css/fullcalendar.min.css" />


<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Page Layout-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
                  <div class="flex-row-fluid ml-lg-8  w-200px w-xl-1px" id="kt_profile_aside">
                    <!--begin::Forms Widget 15-->
                    <div class="card card-custom gutter-b">
                      <!--begin::Body-->
                      <div class="card-body">


                        <div id='full_calendar_events'></div>


                      </div>
                      <!--end::Body-->
                    </div>
                    <!--end::Forms Widget 15-->
                    <!--begin::List Widget 21-->

                    <!--end::List Widget 21-->
                  </div>
									<!--end::Aside-->
									<!--begin::Layout-->
									<div class="flex-row-fluid ml-lg-4  w-200px w-xl-250px " id="mydiv">
										<!--begin::Card-->
										<div class="card card-custom card-stretch gutter-b">
											<div class="card-body">

                        <div id="eventos">
                          <div class="row">
                            <div class="col-md-12 ">
                              <p id="dia"></p>
                              <input type="hidden" id="dia_evento">
                            </div>
                          </div>


                          <div class="dataTables_scroll">
                            <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                              <table class="table table-bordered" id="agendas">
                                  <thead>
                                      <tr style="font-size:9px">
                                          <th >Horario</th>
                                          <th >Cab 1</th>
                                          <th >Cab 2</th>
                                          <!-- <th >Cab 3</th>
                                          <th >Cab 4</th>
                                          <th >Cab 5</th>
                                          <th >Cab 6</th>
                                          <th >Dep 1</th>
                                          <th >Dep 2</th> -->
                                      </tr>
                                  </thead>
                                  <tbody >
                                    @foreach($citas as $key => $value)
                                    <tr class="horario_{{$key}}" >

                                      <td >{{$value->horario}}</td>
                                      <td class="cabibna_{{ $key + 1}}_1 estemero" onclick='nuevo_evento({{$key + 1 }},1,"{{$value->horario}}")'></td>
                                      <td class="cabibna_{{ $key + 1}}_2 estemero" onclick='nuevo_evento({{$key + 1 }},2,"{{$value->horario}}")'></td>
                                      <!-- <td class="cabibna_{{ $key + 1}}_3 estemero" onclick='nuevo_evento({{$key + 1 }},3,"{{$value->horario}}")'></td>
                                      <td class="cabibna_{{ $key + 1}}_4 estemero" onclick='nuevo_evento({{$key + 1 }},4,"{{$value->horario}}")'></td>
                                      <td class="cabibna_{{ $key + 1}}_5 estemero" onclick='nuevo_evento({{$key + 1 }},5,"{{$value->horario}}")'></td>
                                      <td class="cabibna_{{ $key + 1}}_6 estemero" onclick='nuevo_evento({{$key + 1 }},6,"{{$value->horario}}")'></td>
                                      <td class="cabibna_{{ $key + 1}}_7 estemero" onclick='nuevo_evento({{$key + 1 }},7,"{{$value->horario}}")'></td>
                                      <td class="cabibna_{{ $key + 1}}_8 estemero" onclick='nuevo_evento({{$key + 1 }},8,"{{$value->horario}}")'></td> -->
                                    </tr>
                                    @endforeach

                                  </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

											</div>

										</div>
										<!--end::Card-->
									</div>
									<!--end::Layout-->

								</div>
								<!--end::Page Layout-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>

          <div class="modal fade" id="cita_diaria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Cita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                          <div class="col-md-4 ">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Fecha</label>
                            <input type="text" class="form-control" disabled name="fecha_cabina" id="fecha_cabina" >
                            <input type="hidden" class="form-control" disabled name="id_cita" id="id_cita" >
                            <input type="hidden" class="form-control" disabled name="id" id="id" >

                          </div>
                          </div>
                          <div class="col-md-4 ">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Hora</label>
                            <input type="text" class="form-control" disabled name="hora_cabina" id="hora_cabina" >
                          </div>
                          </div>

                          <div class="col-md-4 ">
                            <div class="form-group">
                              <label for="exampleInputPassword1">N° Cabina</label>
                              <input type="text" id="numero_cabina" name="numero_cabina" disabled class="form-control">
                            </div>
                          </div>

                        </div>

                        <div class="row">

                          <div class="col-md-4 ">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Clientes</label>
                                  <select class="form-control" name="clientes">
                                    <option value="0">Selecciona</option>
                                    @foreach($clientes as $cliente)
                                    <option  value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4 ">
                            <div class="form-group">
                            <label for="exampleInputPassword1">Empleado <small style="color:red;font-size:10px;">*</small></label>
                            <div class="input-group">
                                  <select class="form-control" name="empleados">
                                    <option value="0">Selecciona</option>
                                    @foreach($empleados as $empleado)
                                    <option  value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido_paterno }} {{ $empleado->apellido_materno }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                          </div>

                          <div class="col-md-4 ">
                            <div class="form-group">
                            <label for="exampleInputPassword1">Servicios <small style="color:red;font-size:10px;">*</small></label>
                            <div class="input-group">
                                  <select class="form-control" name="servicios_">
                                    <option value="0">Selecciona</option>
                                    @foreach($servicios as $servicio)
                                    <option  value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                          </div>


                      </div>

                      <div class="row">
                        <div class="col-md-12 ">
                          <div class="form-group">
                          <label for="exampleInputPassword1">Descripción<small style="color:red;font-size:10px;">*</small></label>
                              <textarea name="descripcion" class="form-control" rows="8" cols="80"></textarea>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12 ">
                          <label>Estatus <small style="color:red;font-size:10px;">*</small></label>
                          <div class="form-group">
                              <div class="radio-inline">
                                  <label class="radio">
                                      <input type="radio" name="radios2" value="1">
                                      <span style="background-color: #eb82f3;"></span>
                                      Confirmado
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios2" value="2">
                                      <span style="background-color: #f8e723;"></span>
                                      Cliente
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios2" value="3">
                                      <span style="background-color: #2cac1c;"> </span>
                                      Liquidar-Cliente Nuevo
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios2" value="4">
                                      <span style="background-color: #ea1c3f;"></span>
                                      Cliente No Confirmado
                                  </label>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold botoncito" onclick="guardarCita()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> -->
<script src="/js/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js"></script>
<script type="text/javascript">
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

    // let date = new Date()
    //
    // let day = date.getDate()
    // let month = date.getMonth() + 1
    // let yearini = date.getFullYear();
    //
    // let year = date.getFullYear() + 1
    //
    // var event_start = yearini+'-'+'01-01';
    // var event_end = year+'-'+'12-31';


    var calendar = $('#full_calendar_events').fullCalendar({

      selectable: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
      },
      locale: 'es',
      dayClick: function(date, allDay, jsEvent, view) {
        var dia_calendario = allDay.target.dataset.date;
        //console.log(dia_calendario);
        // document.getElementById("agendas").reset();

        var porciones = dia_calendario.split('-');
        //console.log(porciones[0])

        if (porciones[1] == 1) {
          var mes = 'Enero';
        }else if(porciones[1] == 2){
          var mes = 'Febrero';
        }else if(porciones[1] == 3){
          var mes = 'Marzo';
        }else if(porciones[1] == 4){
          var mes = 'Abril';
        }else if(porciones[1] == 5){
          var mes = 'Mayo';
        }else if(porciones[1] == 6){
          var mes = 'Junio';
        }else if(porciones[1] == 7){
          var mes = 'Julio';
        }else if(porciones[1] == 8){
          var mes = 'Agosto';
        }else if(porciones[1] == 9){
          var mes = 'Septiembre';
        }else if(porciones[1] == 10){
          var mes = 'Octubre';
        }else if(porciones[1] == 11){
          var mes = 'Noviembre';
        }else if(porciones[1] == 12){
          var mes = 'Diciembre';
        }

        var dia_inicio = porciones[2]+' '+mes+' '+porciones[0];

        if (dia_calendario == undefined) {
          $('#eventos').hide();

        }else{
          $('#eventos').show();
          $('#dia').html('<h2>Citas del '+dia_inicio+'</h2>');
          $('#dia_evento').val(dia_calendario);
            //citas(dia_calendario);
            initCotizacion(dia_calendario);

        }






      }


   });



});


function nuevo_evento(id,cabina,horario){
  //console.log(id,cabina);

  var fecha = $('#dia_evento').val();
  $('#cita_diaria').modal('show');
  $('#numero_cabina').val(cabina);
  $('#fecha_cabina').val(fecha);
  $('#hora_cabina').val(horario);
  $('#id_cita').val(id);
  $('input[name=id]').val(0);

  var cosita = $('#id_cosita_'+id+'_'+cabina).val();

  //console.log(cosita,id,cabina);

  if(cosita == undefined){
    $("select[name=clientes] ").val("");
    $("select[name=empleados]").val("");
    $("select[name=servicio]").val("");
    $('textarea[name=descripcion]').val('');
    $(":radio[name=radios2][value=1]").prop('checked',false);
    $(":radio[name=radios2][value=2]").prop('checked',false);
    $(":radio[name=radios2][value=3]").prop('checked',false);
    $(":radio[name=radios2][value=4]").prop('checked',false);
  }else{
    $.ajax({

           type:"POST",

           url:"/agendas/TraerDatosCita",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
            data: {
              id:cosita,
            },
            success:function(data){
              //console.log(data)
              var estatus = data.status;
              var servicio = data.servicio;
              var descripcion = data.descripcion;
              var empleado = data.empleado;

              var id = data.id;
              var cabina = data.cabina;
              var id_calendario = data.id_calendario;
              var cliente = data.cliente;
              var fecha = data.fecha;
              var horario = data.horario;
              var servicio = data.servicio;
              //console.log(servicio,data)

              $('#numero_cabina').val(cabina);
              $('#fecha_cabina').val(fecha);
              $('#hora_cabina').val(horario);
              $('#id_cita').val(id_calendario);
              $('input[name=id]').val(id);

              $("select[name=clientes] option[value='"+cliente+"']").attr("selected", true);
              $("select[name=empleados] option[value='"+empleado+"']").attr("selected", true);
              $("select[name=servicios_] option[value='"+servicio+"']").attr("selected", true);

              $('textarea[name=descripcion]').val(descripcion);

              if (estatus == 1) {
                $(":radio[name=radios2][value=1]").prop('checked',true);
                $(":radio[name=radios2][value=2]").prop('checked',false);
                $(":radio[name=radios2][value=3]").prop('checked',false);
                $(":radio[name=radios2][value=4]").prop('checked',false);
              }else if(estatus == 2){
                $(":radio[name=radios2][value=1]").prop('checked',false);
                $(":radio[name=radios2][value=2]").prop('checked',true);
                $(":radio[name=radios2][value=3]").prop('checked',false);
                $(":radio[name=radios2][value=4]").prop('checked',false);
              }else if(estatus == 3){
                $(":radio[name=radios2][value=1]").prop('checked',false);
                $(":radio[name=radios2][value=2]").prop('checked',false);
                $(":radio[name=radios2][value=3]").prop('checked',true);
                $(":radio[name=radios2][value=4]").prop('checked',false);
              }else if(estatus == 4){
                $(":radio[name=radios2][value=1]").prop('checked',false);
                $(":radio[name=radios2][value=2]").prop('checked',false);
                $(":radio[name=radios2][value=3]").prop('checked',false);
                $(":radio[name=radios2][value=4]").prop('checked',true);
              }
            }
          });
  }

}

function limpiar() {
    $("#mydiv").each(function() { this.value = '' });
}

function citas (dia_calendario){
//   setTimeout(() => {
//   document.location.reload();
// }, 3000);

  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agendas/traerHoras", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data:{
            id:1
          },
          success:function(data){
            //console.log(data)

            for (var i = 0; i < data.length; i++) {


              var suma = i + 1;

              var tr = '<tr class="horario_'+i+'" >'+
              '<td>'+ data[i].horario +'</td>'+
              '<td class="cabibna_'+suma+'_1 estemero" onclick="nuevo_evento('+suma+',1,'+ data[i].horario +')"></td>'+
              '<td class="cabibna_'+suma+'_2 estemero" onclick="nuevo_evento('+suma+',2,'+ data[i].horario +')"></td>'+
              // '<td class="cabibna_'+suma+'_3 estemero" onclick="nuevo_evento('+suma+',3,'+ data[i].horario +')"></td>'+
              // '<td class="cabibna_'+suma+'_4 estemero" onclick="nuevo_evento('+suma+',4,'+ data[i].horario +')"></td>'+
              // '<td class="cabibna_'+suma+'_5 estemero" onclick="nuevo_evento('+suma+',5,'+ data[i].horario +')"></td>'+
              // '<td class="cabibna_'+suma+'_6 estemero" onclick="nuevo_evento('+suma+',6,'+ data[i].horario +')"></td>'+
              // '<td class="cabibna_'+suma+'_7 estemero" onclick="nuevo_evento('+suma+',7,'+ data[i].horario +')"></td>'+
              // '<td class="cabibna_'+suma+'_8 estemero" onclick="nuevo_evento('+suma+',8,'+ data[i].horario +')"></td>'+
              '</tr>';

                $("#agendas").append(tr);

                initCotizacion(dia_calendario);
            }
          }
    });
}


async function initCotizacion(fecha){






        var array_IdCotizaciones = [];
        var array_costos = [];

        var array_idcostos = [];

        //var cotizadores =   {!!  json_encode($id_cotizadores) !!};
      //   var cotizadores =  epale;
      //   console.log(cotizadores);
      //   for (var i = 0; i < cotizadores.length; i++) {
      //     console.log(cotizadores[i]);
      //     array_IdCotizaciones.push(cotizadores[i].fecha);
      //   }
      // ///////////////////////////////////////////////////////////////
      //   for (var i = 0; i < array_IdCotizaciones.length; i++) {
      //     var  _temp = await mandarCostos(array_IdCotizaciones[i]);
      //     array_costos.push(_temp);
      //     //console.log(array_costos);
      //   }

      //var  _temp = await mandarCostos(fecha);
      _temp = await mandarCostos(fecha);
      array_costos.push(_temp);



        for (let i = 0; i < array_costos.length; i++) {
          for (let j = 0; j < array_costos[i].data.length; j++) {
            //console.log(array_costos[i].data[j][4]);

            new_table_array.push({persona: j, data:[array_costos[i].data[j]]})
            //console.log(new_table_array);
          }
        }



        new_table_array = new_table_array.sort((a,b) => (a.persona > b.persona) ? 1 : ((b.persona > a.persona) ? -1 : 0))


        const mergeIds = (new_table_array) => {
          const subarrsById = {};

          for (const { persona, data  } of new_table_array) {

            if (!subarrsById[persona]) {

              subarrsById[persona] = { persona, data: [...data]  };
            } else {

              subarrsById[persona].data.push(...data);
            }
            ///console.log(subarrsById);
          }
          return Object.values(subarrsById);

        }

        var arrayfinal = mergeIds(new_table_array);




        for (var h = 0; h < arrayfinal.length; h++) {
          // console.log(arrayfinal[h].data[0][4],fecha);




          //$('td > .estemero').html('');
            //////////// PROVEEDORES ///////////////////////////
            var costos = arrayfinal[h];

            for (var i = 0; i < arrayfinal[h].data.length; i++) {

              var larocka =  arrayfinal[h].data[0][0];

              arrayfinal[h].data.forEach(function(x, index, object) {
                //console.log(x[4] == fecha );
                //console.log(x,index,object)
                  if(x[4] !== fecha){
                    console.log('entro',index)
                  //  object.splice(index, 1);

                    //object.length = index;


                    //$('.cabibna_'+x[0]+'_'+x[1]).reset();
                    //location.reload();
                    // $("#mydiv").load(location.href + " #mydiv");


                  }
                });

              //console.log(arrayfinal[h].data)
              if (arrayfinal[h].data[0][2] == 1) {

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 8px;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+arrayfinal[h].data[0][8]+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'</p>').css('background', 'pink').css('color', 'white');

              }else if(arrayfinal[h].data[0][2] == 2){

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 8px;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+arrayfinal[h].data[0][8]+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'</p>').css('color', 'black').css('background', 'yellow');


              }else if(arrayfinal[h].data[0][2] == 3){

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 8px;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+arrayfinal[h].data[0][8]+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'</p>').css('color', 'white').css('background', 'green');


              }else if(arrayfinal[h].data[0][2] == 4){

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 8px;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+arrayfinal[h].data[0][8]+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'</p>').css('background', 'red').css('color', 'white');


              }

            //  estesk++;

            }

        }


        async function mandarCostos(id){
          //console.log(id,fecha)

          var _objeto = $.ajax({
             type:"POST",
             //async:false,
             url:"/agendas/TraerDatosAgenda",
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             data:{
               //id_cotizadores:id,
               fecha:fecha
             }
          }).then(data=>{
              arrayfinal= [];
              array_costos = [];
              $('.cabibna_').empty();
              var _temp = {'id':'','data':[]};

              _temp.id = id;

              for (var j = 0; j < data.length; j++) {
               _temp.data.push([data[j].id_calendario,data[j].cabina,data[j].status,data[j].id,data[j].fecha,data[j].cliente,data[j].nombre_cliente,data[j].apellido_paterno_cliente,data[j].apellido_materno_cliente,data[j].nombre_empleado,data[j].apellido_paterno_empleado,data[j].apellido_paterno_empleado]);
              }
              return _temp;
          });
            return _objeto;
        }




}

function guardarCita(){

  var id_cita = $('input[name=id_cita]').val();
  var id = $('input[name=id]').val();
  var fecha_cabina = $('input[name=fecha_cabina]').val();
  var hora_cabina = $('input[name=hora_cabina]').val();
  var numero_cabina = $('input[name=numero_cabina]').val();

  var clientes = $('select[name=clientes]').val();
  var empleados = $('select[name=empleados]').val();
  var servicios = $('select[name=servicios_]').val();
  var descripcion = $('textarea[name=descripcion]').val();


  //console.log(id);

  var este = '';
  $(":radio[name=radios2]").each(function(){
  if (this.checked) {
    este = $(this).val();
    //console.log(este);
  }
});

// if (id_cita == '') {
//   var id = 0;
// }else{
//   var id = id_cita;
// }



var formData = new FormData();
formData.append('id', id);
formData.append('id_calendario', id_cita);
formData.append('fecha_cabina', fecha_cabina);
formData.append('hora_cabina', hora_cabina);
formData.append('numero_cabina', numero_cabina);
formData.append('clientes', clientes);
formData.append('empleados', empleados);
formData.append('servicios', servicios);
formData.append('este', este);
formData.append('descripcion', descripcion);

if (clientes == '' || empleados == '' || este == '') {

}else{
  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agendas/update", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data: formData,
         processData: false,
         contentType: false,

          success:function(data){
            if (data.success == 'Se Agrego Satisfactoriamente') {
              Swal.fire({
                title: "",
                text: data.success,
                icon: "success",
                buttonsStyling: false,
                timer: 1500,
                  showConfirmButton: false,
              }).then(function(result) {
                  location.href ="/agendas";
              })

            }else if(data.success == 'Ha sido editado con éxito'){
              Swal.fire({
                title: "",
                text: data.success,
                icon: "success",
                buttonsStyling: false,
                timer: 1500,
                  showConfirmButton: false,
              }).then(function(result) {
                  location.href ="/agendas";

              })
            }else{

            }



          }
    });
}
//  console.log(fecha_cabina,hora_cabina,numero_cabina,clientes,empleados,este)


}




</script>
@endsection
