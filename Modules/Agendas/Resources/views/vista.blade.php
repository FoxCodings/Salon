@extends('layouts.agendado')

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
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" /> -->

<!-- <link href="http://cdn.datatables.net/1.10.5/css/jquery.dataTables.css" rel="stylesheet"/>
<script src="http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script> -->
<style media="screen">
/* .testimonial-group {
  display: flex;
  width: 100%;
  overflow-x: auto;
  padding-right:12.5px;
  padding-left:12.5px;
} */


/* Decorations */
/* .este > table {
    width: 100%;
}

.este > thead, tbody, tr, td, th { display: block; } */

.este > tr:after {
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}
/*
.este > thead th {
    height: 50px;

}

.este > tbody {
    height: 220px;
    overflow-y: auto;
}




.este > tbody td, thead th {
    width: 30%;
    float: left;
} */

/* ul{
  margin: 0;
  padding: 0;
  list-style-type: none;
  text-align: center;
}

ul li {
  display: inline-block;
  width: 100px;
  border: 1px #CCC solid;
  padding: 10px;
  margin: 3px;
  background-color:#ec5a93;
  color:#fff;
  font-size: 10px;
  cursor: pointer;
} */

/* ul li p {
  margin-top: 2px;
  margin-bottom: 2px;
} */


.btn:not(:disabled):not(.disabled) {
  cursor: pointer;
  margin-top: 2px;
  margin-bottom: 2px;
  margin-left: 2px;
  margin-right: 2px;
}

.dataTables_length {
  width: 50%;
}

.dataTables_filter {
  width: 50%;
}

.fc-unthemed .fc-event-dot.fc-event-solid-warning.fc-not-start.fc-end .fc-title, .fc-unthemed .fc-event-dot.fc-event-solid-warning.fc-not-start.fc-not-end .fc-title, .fc-unthemed .fc-event-dot.fc-event-solid-warning.fc-start .fc-title, .fc-unthemed .fc-event.fc-event-solid-warning.fc-not-start.fc-end .fc-title, .fc-unthemed .fc-event.fc-event-solid-warning.fc-not-start.fc-not-end .fc-title, .fc-unthemed .fc-event.fc-event-solid-warning.fc-start .fc-title {
  /* color: #ffffff; */
  font-size: 7px;
}
.fc-unthemed .fc-toolbar .fc-button.fc-button-active, .fc-unthemed .fc-toolbar .fc-button:active, .fc-unthemed .fc-toolbar .fc-button:focus {
  background: #fff;
  color: #ccc;
  border: 1px solid #ccc;
  -webkit-box-shadow: none;
  box-shadow: none;
  text-shadow: none;
}

.btn.btn-light-primary:hover:not(.btn-text):not(:disabled):not(.disabled) {
  color: #FFFFFF;
  background-color: #C9A94E;
  border-color: transparent;
}

.btn.btn-light-primary {
  color: #fff;
  background-color: #C9A94E;
  border-color: transparent;
}
.container {
width: 100%;
padding-right: 12.5px;
padding-left: 12.5px;
margin-right: auto;
margin-left: auto;
margin-top: 100px;
}
</style>
<div class=" container " id="agendados">
  <div class="card card-custom example example-compact">

  <div class="card-body">

      <div class="row">
        <div class="col-md-12 ">
          <h3>Citas del dia {{ $fechas }}</h3> <a href="/agendas/inicio" class="btn btn-success btn-sm">Regresar</a>
          <div style="height:10px;"></div>
          <input type="hidden" id="dia_evento" value="{{$id}}">
        </div>
      </div>


      <div class="dataTables_scroll">
        <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
          <table class="table table-bordered" id="agendas">
              <thead>
                  <tr style="font-size:9px;background-color:pink;">
                      <th >Horario</th>
                      <th >Uñas</th>
                      <th >Uñas 2</th>
                      <th >Uñas 3</th>
                      <th >Uñas 4</th>
                      <th >Uñas 5</th>
                      <th >Uñas 6</th>
                      <th >Cabello 1</th>
                      <th >Cabello 2</th>
                  </tr>
              </thead>
              <tbody >
                @foreach($citas as $key => $value)
                <tr class="horario_{{$key}}" >

                  <td style="background-color:pink;width:80px;">{{$value->horario}}</td>
                  <td class="cabibna_{{ $key + 1}}_1 estemero" onclick='nuevo_evento({{$key + 1 }},1,"{{$value->horario}}")'></td>
                  <td class="cabibna_{{ $key + 1}}_2 estemero" onclick='nuevo_evento({{$key + 1 }},2,"{{$value->horario}}")'></td>
                  <td class="cabibna_{{ $key + 1}}_3 estemero" onclick='nuevo_evento({{$key + 1 }},3,"{{$value->horario}}")'></td>
                  <td class="cabibna_{{ $key + 1}}_4 estemero" onclick='nuevo_evento({{$key + 1 }},4,"{{$value->horario}}")'></td>
                  <td class="cabibna_{{ $key + 1}}_5 estemero" onclick='nuevo_evento({{$key + 1 }},5,"{{$value->horario}}")'></td>
                  <td class="cabibna_{{ $key + 1}}_6 estemero" onclick='nuevo_evento({{$key + 1 }},6,"{{$value->horario}}")'></td>
                  <td class="cabibna_{{ $key + 1}}_7 estemero" onclick='nuevo_evento({{$key + 1 }},7,"{{$value->horario}}")'></td>
                  <td class="cabibna_{{ $key + 1}}_8 estemero" onclick='nuevo_evento({{$key + 1 }},8,"{{$value->horario}}")'></td>
                </tr>
                @endforeach

              </tbody>
          </table>
        </div>
      </div>



  </div>




  </div>
</div>
@include('agendas::modales.ventasAgenda')

<!-- <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<div class="d-flex flex-column-fluid">

							<div class="container">

								<div class="d-flex flex-row">

									<div class="flex-row-fluid ml-lg-12  ">

										<div class="card card-custom card-stretch gutter-b">
											<div class="card-body">


											</div>

										</div>

									</div>


								</div>

							</div>

						</div>

					</div> -->

          <div class="modal fade" id="cita_diaria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cita <strong id="opr"></strong>  </h5>
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
                        <strong><strong style="color:red;">*</strong> Campos Obligatorio.</strong>
                        <div class="row">
                          <div class="col-md-4">
                              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo: <small style="color:red;font-size:10px;">*</small> </label>
                              <select class="form-control" name="tipo" id="tipo" disabled onchange="TipoCambio()">
                                <!-- <option value="0">Seleccionar</option> -->
                                <option value="1">Uñas</option>
                                <option value="2">Cabello</option>
                              </select>
                          </div>
                          <div class="col-md-4" id="cabellito">
                              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo de Cabello: </label>
                              <select class="form-control" name="tipo_cabello">
                                <!-- <option value="0">Seleccionar</option> -->
                                <option value="1">Corto</option>
                                <option value="2">Mediano</option>
                                <option value="3">Largo</option>
                              </select>
                          </div>
                        </div>

                        <div class="row">

                          <div class="col-md-4 ">
                              <div class="form-group">
                                <label for="exampleInputPassword1">Clientes <small style="color:red;font-size:10px;">*</small> <a onclick="clientesnuevos()" class="btn btn-icon btn-primary btn-circle btn-xs mr-5">
                                      <i class="fas fa-plus"></i>
                                    </a></label>
                                  <select class="form-control" id="clientes"  name="clientes">
                                    <option value="0">Selecciona</option>
                                    @foreach($clientes as $cliente)
                                    <option  value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }} - {{ $cliente->telefono }}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4 ">
                            <div class="form-group">
                            <label for="exampleInputPassword1">Empleado <small style="color:red;font-size:10px;">*</small></label>
                            <div class="input-group">
                                  <select class="form-control" id="empleados" onchange="empleadoServicio()" name="empleados">
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
                                  <select class="form-control " id="servicios_" name="servicios_" multiple="multiple" onchange="servicio_checar()">
                                    <!-- <option value="0">Selecciona</option>
                                    @foreach($servicios as $servicio)
                                    <option  value="{{ $servicio->id }}">{{ $servicio->nombre }} - <?php
                                    if($servicio->tipo_servicio == 1){
                                      echo '1 Sesión';
                                    }else{
                                      echo 'Paquete';
                                    }
                                    ?></option>
                                    @endforeach -->
                                  </select>
                                </div>
                              </div>
                          </div>


                      </div>

                      <div class="row" id="telefono_cliente">
                        <div class="col-md-4 ">
                          <label>Telefono <small style="color:red;font-size:10px;">*</small></label>
                          <input type="text" class="form-control" name="telefono" id="telefono" disabled>
                        </div>

                        <div class="col-md-4 " id="existe_session">
                          <label>Sesión <small style="color:red;font-size:10px;">*</small></label>
                          <input type="text" class="form-control" name="sesion_cita" id="sesionsita" disabled>
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
                      <input type="hidden" name="comision_empleado" >
                      <input type="hidden" name="empleado_servico" >

                      <div id="empleadilla_comision">
                        <!-- <div class="row">
                          <div class="col-md-12 ">
                            <label>Empleado Comisión <small style="color:red;font-size:10px;">*</small></label>
                            <div class="form-group">
                                <div class="radio-inline">
                                  @foreach($empleado_inicial as $inicial)
                                    <label class="radio">
                                        <input type="radio" name="radios3" value="{{$inicial->id}}">
                                        <span style="background-color: #C9A94E;"></span>
                                        {{$inicial->inicial}}
                                    </label>
                                  @endforeach
                                </div>
                            </div>
                          </div>
                        </div> -->

                        <!-- <div class="row">
                          <div class="col-md-12 ">
                            <label>Comisiones <small style="color:red;font-size:10px;">*</small></label>
                            <div class="form-group">
                                <div class="radio-inline">

                                    <label class="radio">
                                        <input type="radio" name="radios4" value="5">
                                        <span style="background-color: #C9A94E;"></span>
                                        $5
                                    </label>

                                    <label class="radio">
                                        <input type="radio" name="radios4" value="10">
                                        <span style="background-color: #C9A94E;"></span>
                                        $10
                                    </label>

                                    <label class="radio">
                                        <input type="radio" name="radios4" value="30">
                                        <span style="background-color: #C9A94E;"></span>
                                        $30
                                    </label>

                                </div>
                            </div>
                          </div>
                        </div> -->
                      </div>

                      <div class="row">
                        <div class="col-md-12 ">
                          <label>Duración <small style="color:red;font-size:10px;">*</small></label>
                          <div class="form-group">
                              <div class="radio-inline">
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="1">
                                      <span style="background-color: #b2d6fc;"></span>
                                      30 Min
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="2">
                                      <span style="background-color: #b2d6fc;"></span>
                                      1 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="3">
                                      <span style="background-color: #b2d6fc;"></span>
                                      1 30 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="4">
                                      <span style="background-color: #b2d6fc;"></span>
                                      2 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="5">
                                      <span style="background-color: #b2d6fc;"></span>
                                      2 30 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="6">
                                      <span style="background-color: #b2d6fc;"></span>
                                      3 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="7">
                                      <span style="background-color: #b2d6fc;"></span>
                                      3 30 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="8">
                                      <span style="background-color: #b2d6fc;"></span>
                                      4 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="9">
                                      <span style="background-color: #b2d6fc;"></span>
                                      4 30 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="10">
                                      <span style="background-color: #b2d6fc;"></span>
                                      5 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="11">
                                      <span style="background-color: #b2d6fc;"></span>
                                      5 30 Hora
                                  </label>
                                  <label class="radio">
                                      <input type="radio" name="radios5" value="12">
                                      <span style="background-color: #b2d6fc;"></span>
                                      6 Hora
                                  </label>
                              </div>
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

                        <a id="boton_borrar"></a>
                        <a id="boton_modal_pagar"></a>
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold botoncito" onclick="guardarCita()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="cliente_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <input type="text" class="form-control" id="nombre_cliente"  placeholder="Nombre" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Nombre
                          </div>
                      </div>

                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Paterno: </label>
                          <input type="text" class="form-control" id="apellido_paterno_cliente"  placeholder="Apellido Paterno" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Apellido Paterno
                          </div>
                      </div>

                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Materno: </label>
                          <input type="text" class="form-control" id="apellido_materno_cliente"  placeholder="Apellido Materno" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Apellido Materno
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Telefono: </label>
                          <input type="text" class="form-control" id="telefono_clientes"  placeholder="Telefono" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Telefono
                          </div>
                      </div>

                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Correo Electronico: </label>
                          <input type="text" class="form-control" id="correo_electronico"  placeholder="Correo Electronico" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Correo Electronico
                          </div>
                      </div>

                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha cumpleaños: </label>
                          <input  type="text" name="fecha_cumpleanos"  class="form-control fecha" id="kt_datepicker2" autocomplete="off"   placeholder="Fecha cumpleaños" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Fecha
                          </div>
                      </div>


                    </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary font-weight-bold" onclick="guardarcliente()">Guardar</button>
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


      <div class="modal fade" id="pagar_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pagar Servicios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <input type="hidden" id="clientes">
                    <input type="hidden" id="empleados">
                    <input type="hidden" id="clientes_nombre">
                    <input type="hidden" id="empleados_nombre">
                    <div id="id_servicio"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <button type="button" class="btn btn-primary font-weight-bold btn-square" onclick="Este()" name="button"><i class="fas fa-barcode"></i>Scannear</button>
                      <!-- <input type="text"  class="form-control" style="width:.3px;height:.3px;" id="codigo"> -->
                      <hr>
                      <input type="text"  class="form-control"  id="codigo" placeholder="Ingresa codigo  y dar enter para agregar el producto">
                    </div>
                    <div class="col-md-8">
                      <div class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 250px; width: 100%;">
                      <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="productos_ventas2" role="grid" style="margin-left: 0px; width: 100%;">
                          <thead >
                              <tr >
                                  <th >Servicio</th>
                                  <th >Costo</th>
                                  <th >Acciones</th>
                              </tr>
                          </thead>
                          <tbody >
                          </tbody>
                          <!-- <tfoot >
                            <tr >
                            <th>Total:
                          </th>

                          </tr>
                          </tfoot> -->
                      </table>

                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <h4><span id="total"></span></h4>
                         <input type="hidden" id="total_precio">
                        </div>
                      </div>
                    </div>
                  </div>


                </div>
                <div class="modal-footer">
                  <a class="btn btn-danger font-weight-bold btn-square" onclick="cancelarventa()"><i class="fas fa-trash-alt"></i> Cancelar</a>

                  <div class="btn-group">
                    <div class="dropdown">
                        <button class="btn btn-success font-weight-bold btn-square dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-money-check-alt"></i> Pagar
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" onclick="efectivo(1,1)">Efectivo</a>
                            <a class="dropdown-item" onclick="efectivo(2,1)">Tranferencia</a>
                            <a class="dropdown-item" onclick="efectivo(3,1)">Tarjeta</a>
                            <a class="dropdown-item" onclick="efectivo(4,1)">Point</a>
                        </div>
                    </div>
                  </div>

                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
      </div>


      <!-- EFECTIVO -->
      <div class="modal fade" id="efectivo_pago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong id="titulo_pagos"></strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <div class="modal-body">
                  <input type="hidden" id="servicio_id">
                  <div class="row" id="pdf" style="display:none;">
                    <div class="col-md-12">
                      <div class="ticket">
                         <img style="max-width: inherit;width: inherit;"
                             src="/cremita/img/logo_pink_negro.png"
                             alt="Logotipo" height='100',width='300'>
                         <p class="centrado" style="font-size:14px;">
                            RFC: SATH851130KP5
                           <br>Calle F.Berriozabal N° 1738 Local 2
                           <br>entre F. de la Garza esq. Col Morelos
                           <br>Cd.Victoria,Tamps. C.P. 87050
                           <br>Tel.: 834 305 13 00
                           <br>Cel.: 834 350 27 58
                           <br> <p style="font-size:12px;text-align:center;"> <?php date_default_timezone_set('America/Mexico_city');

                           if (date('m') == 1) {
                             $mes_fecha = 'ENERO';

                           }elseif(date('m') == 2){
                             $mes_fecha = 'FEBRERO';

                           }elseif(date('m') == 3){
                             $mes_fecha = 'MARZO';

                           }elseif(date('m') == 4){
                             $mes_fecha = 'ABRIL';

                           }elseif(date('m') == 5){
                             $mes_fecha = 'MAYO';

                           }elseif(date('m') == 6){
                             $mes_fecha = 'JUNIO';

                           }elseif(date('m') == 7){
                             $mes_fecha = 'JULIO';

                           }elseif(date('m') == 8){
                             $mes_fecha = 'AGOSTO';

                           }elseif(date('m') == 9){
                             $mes_fecha = 'SEPTIEMBRE';

                           }elseif(date('m') == 10){
                             $mes_fecha = 'OCTUBRE';

                           }elseif(date('m') == 11){
                             $mes_fecha = 'NOVIEMBRE';

                           }elseif(date('m') == 12){
                             $mes_fecha = 'DICIEMBRE';
                           }

                           $fechita = date('d').' '.$mes_fecha.' '.date('Y H:i:s');
                           echo $fechita;
                            ?>
                           <br>Atendio: {{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}
                           <br>Folio <small syle="font-size:10px;" id="folio_venta"></small>
                         </p>

                         </p>
                         -----------------------------
                         <table id="venta_efectivo" style="text-align:left;">
                             <thead>
                                 <tr>
                                     <th>PRODUCTO</th>
                                     <th>PRECIO</th>
                                 </tr>
                             </thead>
                             <tbody>

                             </tbody>
                             <tfoot>
                              <tr>
                                 <td>Total</td>
                                 <td><small id="total_precio_ticket"></small></td>
                              </tr>
                              <tr>
                                 <td colspan="2">----------------------------------<br><small id="numero_letra"></small></td>
                              </tr>
                              <tr>
                                 <td>Efectivo</td>
                                 <td><small id="pago_total_efectivo_venta2"></small></td>
                              </tr>
                              <tr>
                                 <td>Cambio</td>
                                 <td><small id="cambio_efectivo_venta2"></small></td>
                              </tr>
                             </tfoot>
                         </table>

                         <p class="centrado" id="tipo_pagito"></p>
                         <p class="centrado">¡GRACIAS POR SU COMPRA!<br>PINK & GOLD</p>
                         <!-- <p class="centrado">¡GRACIAS POR SU COMPRA!<br>Gold System Vit</p>
                         <p class="centrado">¡GRACIAS POR SU COMPRA!<br>Gold System Vit</p> -->
                     </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword4"  style="font-size:12px;"class="form-label">Total: </label>
                        <h3> <p id="total_efectivo_venta"></p></h3>
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cupon de Descuento: </label>
                      <input  type="text"  class="form-control fecha" id="cupon" onchange="cupon_total()" autocomplete="off"  placeholder="Cupon de Descuento" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword4"  style="font-size:12px;"class="form-label">Pago en Efectivo: </label>
                        <h3> <p id="pago_total_efectivo_venta"></p></h3>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4"  style="font-size:12px;"class="form-label" id="pago_label_tipo"> </label>
                        <input  type="text"  class="form-control fecha" id="monto" onchange="monto_total()" autocomplete="off"  placeholder="Efectivo" required>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cambio: </label>
                      <h3> <p id="cambio_efectivo_venta"></p></h3>
                      <input type="hidden" id="cambio_efectivo_ventas" >
                      <input type="hidden" id="tipo_pago_" >
                      <input type="hidden" id="tipo_cosa_" >

                    </div>
                    <div class="col-md-6">

                    </div>
                  </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary font-weight-bold print" onclick="guardarpagoefectivo()">Pagar</button>
                </div>

            </div>
        </div>
     </div>

     <!-- PAGO PREVENTA -->


     <div class="modal fade" id="efectivo_pagos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel"><strong id="titulo_pagoss"></strong> </h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <i aria-hidden="true" class="ki ki-close"></i>
                   </button>
               </div>

               <div class="modal-body">

                 <div class="row" id="pdfs" style="display:none;">
                   <div class="col-md-12">
                     <div class="ticket">
                        <img style="max-width: inherit;width: inherit;"
                            src="/cremita/img/SPA NEGRO.png"
                            alt="Logotipo" height='100',width='300'>
                        <p class="centrado" style="font-size:14px;">
                           RFC: SATH851130KP5
                          <br>Calle F.Berriozabal N° 1738 Local 2
                          <br>entre F. de la Garza esq. Col Morelos
                          <br>Cd.Victoria,Tamps. C.P. 87050
                          <br>Tel.: 834 305 13 00
                          <br>Cel.: 834 350 27 58
                          <br> <p style="font-size:12px;text-align:center;"> <?php date_default_timezone_set('America/Mexico_city');

                          if (date('m') == 1) {
                            $mes_fecha = 'ENERO';

                          }elseif(date('m') == 2){
                            $mes_fecha = 'FEBRERO';

                          }elseif(date('m') == 3){
                            $mes_fecha = 'MARZO';

                          }elseif(date('m') == 4){
                            $mes_fecha = 'ABRIL';

                          }elseif(date('m') == 5){
                            $mes_fecha = 'MAYO';

                          }elseif(date('m') == 6){
                            $mes_fecha = 'JUNIO';

                          }elseif(date('m') == 7){
                            $mes_fecha = 'JULIO';

                          }elseif(date('m') == 8){
                            $mes_fecha = 'AGOSTO';

                          }elseif(date('m') == 9){
                            $mes_fecha = 'SEPTIEMBRE';

                          }elseif(date('m') == 10){
                            $mes_fecha = 'OCTUBRE';

                          }elseif(date('m') == 11){
                            $mes_fecha = 'NOVIEMBRE';

                          }elseif(date('m') == 12){
                            $mes_fecha = 'DICIEMBRE';
                          }

                          $fechita = date('d').' '.$mes_fecha.' '.date('Y H:i:s');
                          echo $fechita;
                           ?>
                          <br>Atendio: {{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}
                          <br>Folio <small syle="font-size:10px;" id="folio_venta2"></small>
                        </p>

                        </p>
                        -----------------------------
                        <table id="venta_efectivos" style="text-align:left;">
                            <thead>
                                <tr>
                                    <th>PRODUCTO</th>
                                    <th>PRECIO</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                             <tr>
                                <td>Total</td>
                                <td><small id="total_precio_tickets"></small></td>
                             </tr>
                             <tr>
                                <td colspan="2">----------------------------------<br><small id="numero_letra"></small></td>
                             </tr>
                             <tr>
                                <td>Efectivo</td>
                                <td><small id="pago_total_efectivo_venta2s"></small></td>
                             </tr>
                             <tr>
                                <td>Cambio</td>
                                <td><small id="cambio_efectivo_ventass2s"></small></td>
                             </tr>
                            </tfoot>
                        </table>

                        <p class="centrado" id="tipo_pagitos"></p>
                        <p class="centrado">¡GRACIAS POR SU COMPRA!<br>SPA VIT & LIVE</p>

                    </div>
                   </div>
                 </div>

                 <div class="row">
                   <div class="col-md-6">
                       <label for="inputPassword4"  style="font-size:12px;"class="form-label">Total: </label>
                       <h3> <p id="total_efectivo_ventas"></p></h3>
                   </div>
                   <!-- <div class="col-md-6">
                     <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cupon de Descuento: </label>
                     <input  type="text"  class="form-control fecha" id="cupon" onchange="cupon_total()" autocomplete="off"  placeholder="Cupon de Descuento" required>
                   </div> -->
                   <input type="hidden" id="total_precio2" >
                 </div>

                 <div class="row">
                   <div class="col-md-6">
                       <label for="inputPassword4"  style="font-size:12px;"class="form-label">Pago en Efectivo: </label>
                       <h3> <p id="pago_total_efectivo_ventass"></p></h3>
                   </div>
                   <div class="col-md-6">
                       <label for="inputPassword4"  style="font-size:12px;"class="form-label" id="pago_label_tipos"> </label>
                       <input  type="text"  class="form-control fecha" id="montos" onchange="monto_totals()" autocomplete="off"  placeholder="Efectivo" required>
                   </div>

                 </div>

                 <div class="row">
                   <div class="col-md-6">
                     <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cambio: </label>
                     <h3> <p id="cambio_efectivo_venta2s"></p></h3>
                     <input type="hidden" id="cambio_efectivo_venta3s" >
                     <input type="hidden" id="tipo_pago_s" >

                   </div>
                   <div class="col-md-6">

                   </div>
                 </div>



               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                   <button type="button" class="btn btn-primary font-weight-bold print" onclick="guardarpagoefectivo2()">Pagar</button>
               </div>

           </div>
       </div>
     </div>
     <input type="hidden" id="id_preventa">

<!--  -->






<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> -->
<script src="/js/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js"></script>
<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">
var new_table_array = [];
var array_sumacostos = [];
var array_sumavalores = [];
var array_sumavalores_total = [];
var array_sumacostos_unitario_total = [];
var arrayrecorrer_total = [];
var arraytotal_sumas_costos = [];
var estesk = 0;
var arrayGanador_Costos = [];



$('#btn-scannear').hide()
$('#btn-scannear2').hide()
$('#productills').hide()

function btnb(){
  var empleado = $('#empleados2').val()

    if (empleado == 0) {
      $('#btn-scannear').hide()
      $('#btn-scannear2').hide()
    }else{
      $('#btn-scannear').show()
      $('#btn-scannear2').show()
    }

}

function Este(){
  $("#codigo").focus();
}

function Estea(){
  $("#codigos").focus();
}


document.addEventListener("DOMContentLoaded", () => {
    //const $codigo = 0;

      var codigo = document.querySelector("#codigo");
    codigo.addEventListener("keydown", evento => {

        if (evento.keyCode === 13) {
            // El lector ya terminó de leer
            var codigoDeBarras = codigo.value;
            // Aquí ya podemos hacer algo con el código. Yo solo lo imprimiré
            //console.log("Tenemos un código de barras:");

            // Limpiar el campo
            codigo.value = "";

            $.ajax({

                   type:"POST", //si existe esta variable anillos se va mandar put sino se manda post
                   url:"/ventas/traerProductos", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
                   },
                    data: {codigo:codigoDeBarras},
                    success:function(data){
                      //console.log(data)

                      if (data == '') {
                        Swal.fire({
                          title: "Lo Sentimos",
                          text: "Producto Agotado",
                          icon: "warning",
                        })
                      }else{
                        var clientes = $('select[name="clientes2"] option:selected').text();
                        var empleados = $('select[name="empleados2"] option:selected').text();

                        var cabinas = 0;
                        var horario = 0;

                        var clientes_id = $('#clientes2').val();
                        var empleados_id = $('#empleados2').val();

                        var cabinas_id = 0;
                        var horario_id = 0;

                      var  _fecha = new Date();

                      var   dd =  _fecha.getDate();
                      var   mm =  _fecha.getMonth();
                      var   yyyy =  _fecha.getFullYear();
                      var fecha = yyyy+'-'+mm+'-'+dd;

                    //  console.log(dd,mm,yyyy);
                      objFigura = {
                         nombre : data.nombre,
                         costo : data.costo,
                         comision : data.comision,
                         clientes : clientes,
                         empleados : empleados,
                         clientes_id : clientes_id,
                         empleados_id : empleados_id,
                         cabinas : cabinas,
                         cabinas_id : cabinas_id,
                         horarios : horario,
                         horario_id : horario_id,
                         fecha : fecha,
                         id_modulo : data.modulo,
                         id_proser:data.id,
                         numero:1,
                      };

                      indexH = arrayFiguras.push(objFigura);
                      objFigura.id = indexH;

                      var tr = '<tr id="filas_lugar'+objFigura.id+'" >'+
                      //'<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+
                      '<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+ objFigura.nombre +'</td>'+
                      '<td>$'+ objFigura.costo +'</td>'+
                      // '<td>'+ objFigura.clientes +'</td>'+
                      // '<td>'+ objFigura.empleados +'</td>'+
                      '<td><div class="btn btn-danger btn-circle btn-sm borrar_figura" onclick="eliminarlugar('+objFigura.id+')" ><i  class="fas fa-trash"></i></div></td>'
                      '</tr>';
                      $("#productos_ventas2").append(tr);


                      var numeros = arrayFiguras,suma = 0;
                      numeros.forEach (function(numero){
                          // console.log(parseFloat(numero.costo))
                          suma += parseFloat(numero.costo);
                      });
                      $('#total').html('<p>Total $ '+suma.toFixed(2)+'</p>');
                      $('#total_precio').val(suma.toFixed(2));
                      }




                    }
              });


        }
    });

});



$('#monto').keypress(function (tecla) {
    if ((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode != 46) && (tecla.charCode != 8)) {
        return false;
    }else {
             var len   = $('#costo').val().length;
             var index = $('#costo').val().indexOf('.');
             if (index > 0 && tecla.charCode == 46) {
                 return false;
             }
             if (index > 0) {
                 var CharAfterdot = (len + 1) - index;
                 if (CharAfterdot > 3) {
                     return false;
                 }
             }
    }
    return true;

});

$('#montos').keypress(function (tecla) {
    if ((tecla.charCode < 48 || tecla.charCode > 57) && (tecla.charCode != 46) && (tecla.charCode != 8)) {
        return false;
    }else {
             var len   = $('#costo').val().length;
             var index = $('#costo').val().indexOf('.');
             if (index > 0 && tecla.charCode == 46) {
                 return false;
             }
             if (index > 0) {
                 var CharAfterdot = (len + 1) - index;
                 if (CharAfterdot > 3) {
                     return false;
                 }
             }
    }
    return true;

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
    var cliente = [];
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
    //console.log(data[i].cliente);

    array_eventos.push({
         title: data[i].titulo,
          start: data[i].fecha,
          color: '#ec5a93',
          end: data[i].fecha,
          id: data[i].id,
          allDay: true,
          className: 'fc-event-success fc-event-solid-warning',
          description: data[i].descripcion,
          este:data[i].cliente,
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
            //console.log(event)
            element.find('.fc-title').append("<br/>" + event.description);
        } ,
       eventClick: function(info) {
          /*console.log(info['id'],info['description']);*/
          //console.log(info)
          // Swal.fire({
          //       title: "¿Estas seguro?",
          //       text: "No podrás revertir esto!",
          //       icon: "warning",
          //       showCancelButton: true,
          //       confirmButtonText: "Si, Enviar Email!"
          //   }).then(function(result) {
          //       if (result.value) {
          //
          //         $.ajax({
          //
          //            type:"POST",
          //
          //            url:"/clientes/borrar",
          //            headers: {
          //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          //            },
          //            data:{
          //           id:id,
          //            },
          //
          //             success:function(data){
          //               Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });
          //
          //             }
          //
          //
          //         });
          //
          //         // $.ajax({
          //         //
          //         //    type:"POST",
          //         //
          //         //    url:"/agendas/VerEvento2",
          //         //    headers: {
          //         //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          //         //    },
          //         //    data:{
          //         //     id:info['id'],
          //         //    },
          //         //
          //         //     success:function(data){
          //         //
          //         //       for (var i = 0; i < data.length; i++) {
          //         //         // var nombre = data[i].nombre;
          //         //         // var apellido_p = data[i].apellido_paterno;
          //         //         // var apellido_m = data[i].apellido_materno;
          //         //
          //         //         var descripcion = data[i].descripcion;
          //         //         // var equipo_serie = data[i].serie;
          //         //
          //         //         var fecha  = data[i].fecha;
          //         //         var titulo  = data[i].titulo;
          //         //         //
          //         //         //var asignado = nombre+' '+apellido_p+' '+apellido_m;
          //         //
          //         //
          //         //           $('#equipo').val(titulo);
          //         //           //$('#serie').val(equipo_serie);
          //         //           $('#fecha').val(fecha);
          //         //           //$('#asignado_a').val(asignado);
          //         //           $('#fip').val(descripcion);
          //         //           $('#exampleModalScrollable').modal('show');
          //         //
          //         //       }
          //         //
          //         //     }
          //         //
          //         //
          //         // });
          //
          //       }
          //   })


        },

    });


  }
});

});


$('#servicios_ventitas').hide();
$('#productos_vetitas').hide();



// $('#cliente_nuevo').show();
$('.select2').select2();
$('#clientes').select2({
    width: '100%',
});

$('#empleados').select2({
    width: '100%',
});

$('#cabinas').select2({
    width: '100%',
});


$('#horario').select2({
    width: '100%',
});

$('#clientes2').select2({
    width: '100%',
});

$('#empleados2').select2({
    width: '100%',
});

$('#clientes_cita').select2({
    width: '100%',
});
$('#empleados_cita').select2({
    width: '100%',
});
$('#servicios_').select2({
    width: '100%',
});


$('.descuento').hide();
$('#citas_agendadas').modal('hide');


function cumpleanosMes(){
$('#cumpleanos_mes').modal('show');
}

function descuentos_ya(){
  $('.descuento').show();
}

  $('#Impresion_pago').modal('hide');


function traerAgenda(){
  var fecha_agenda = $('input[name=fecha_agenda]').val();
  $('#citas_agendadas').modal('show');

  var porciones = fecha_agenda.split('/');
  var dia_inicio = porciones[2]+'-'+porciones[1]+'-'+porciones[0];

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

  var dia_fechilla = porciones[0]+' '+mes+' '+porciones[2];
  //console.log(dia_inicio,dia_fechilla,fecha_agenda)
  $('#dia').html('<h2>Citas del '+dia_fechilla+'</h2>');
  $('#dia_evento').val(dia_inicio);

  initCotizacion(dia_inicio);
}

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




              //$("select[name=clientes_cita] option[value='"+cliente+"']").attr("selected", true);
              //$("select[name=empleados_cita] option[value='"+empleado+"']").attr("selected", true);
              //$("select[name=servicios_] option[value='"+servicio+"']").attr("selected", true);

              $('select[name=clientes_cita]').val(cliente).trigger('change.select2');
              $('select[name=empleados_cita]').val(empleado).trigger('change.select2');
              $('select[name=servicios_]').val(servicio).trigger('change.select2');

              $('textarea[name=descripcion_cita]').val(descripcion);

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
                  //  console.log('entro',index)
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
          //console.log(fecha)

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

function cupon_total(){
  var cupon = $('#cupon').val();


  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/ventas/TraerCupon", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data:{
            cupon:cupon
          },

          success:function(data){

            if (data == '') {
              Swal.fire({
                title: "Lo Sentimos",
                text: "Cupon no valido",
                icon: "warning",
              })
            }else{
              //console.log(data.descuentos_promocion)
              var totales = $('#total_precio').val();
              var descuentos = data.descuentos_promocion/100;
              //console.log(descuentos)

              var total_descuento = totales * descuentos;
              //console.log(total_descuento)

              //console.log(total - total_descuento)
              var total = totales - total_descuento;


              $('#total_efectivo_venta').html('<p> $ '+total.toFixed(2)+'</p>');
              $('#total').html('<p> $ '+total.toFixed(2)+'</p>');
              $('#total_precio').val(total.toFixed(2));
            }
          }
    });

}

function monto_total(){
  var monto = $('#monto').val();
  var totales = $('#total_precio').val();
    var total =  monto - totales;
    $('#pago_total_efectivo_venta').html('<strong>$ '+monto+'</strong>')

  $('#cambio_efectivo_venta').html('<strong>$ '+total.toFixed(2)+'</strong>')

    $('#cambio_efectivo_ventas').val(total.toFixed(2));


    $('#pago_total_efectivo_venta2').html('<strong>$ '+monto+'.00</strong>')

  $('#cambio_efectivo_venta2').html('<strong>$ '+total.toFixed(2)+'</strong>')
  $('#total_precio_ticket').html('<strong>$ '+totales+'</strong>')

}

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

$('#tratamiento_vista').hide();
$('#cabello_vista').hide();
$('#peinados_vista').hide();
$('#shellac_vista').hide();
$('#fasts_vista').hide();
$('#pestanas_vista').hide();
$('#serviciosa_vista').hide();
$('#servicioses_vista').hide();
$('#cosas_servicios').hide();

function efectivos(id){

  Swal.fire({
    title: "¿Estas segura de este metodo de pago?",
    text: "",
    icon: "warning",
    confirmButtonText: 'Si, Pagar!',
    showConfirmButton: true,
    showCancelButton: true
  }).then(function(result) {

      if (result.value == true) {
          $('#efectivo_pago').modal('show');




          for (var i = 0; i < arrayFiguras.length; i++) {


            var tr = '<tr id="id-figura-'+arrayFiguras[i].id+'">'+
            //'<td><input type="hidden" id="figura_nueva" value="'+arrayFiguras[i].id+'"/>'+
            '<td><input type="hidden" id="figura_nueva" value="'+arrayFiguras[i].id+'"/>'+ arrayFiguras[i].nombre +'</td>'+
            '<td>$ '+ arrayFiguras[i].costo +'</td>'+
            '</tr>';

              $("#venta_efectivo").append(tr);

              var totales = $('#total_precio').val();

              $('#total_efectivo_venta').html('<strong>$ '+totales+'</strong>')
              var tipo = '';
              if (id == 1) {
                tipo = 'Efectivo';
              }else if(id == 2){
                tipo = 'Transferencia';
              }else if(id == 3){
                tipo = 'Tarjeta';
              }else if(id == 4){
                tipo = 'Mix';
              }

              var labels_tipo = '';
              if (id == 1) {
                labels_tipo = 'Efectivo';
              }else if(id == 2){
                labels_tipo = 'Monto Transferencia';
              }else if(id == 3){
                labels_tipo = 'Monto Tarjeta';
              }else if(id == 4){
                labels_tipo = 'Monto Mix';
              }

              $('#tipo_pagito').html('<strong>Pago '+tipo+'</strong>');
              $('#titulo_pagos').html('Pago '+tipo+'');
              $('#pago_label_tipo').html(''+labels_tipo+':');
              $('#tipo_pago_').val(id);

        }
      }
    })
}


function guardarpagoefectivo(){
  //console.log('entro');

  var monto = $('#monto').val();
  var cupon = $('#cupon').val();
  var total_precio = $('#total_precio').val();
  var cambio = $('#cambio_efectivo_ventas').val();
  var tipo = $('#tipo_pago_').val();
  var tipe = $('#tipo_cosa_').val();



  if( monto == '' ){


    Swal.fire({
      title: "Lo Sentimos",
      text: "Llene el campo",
      icon: "warning",
    })


  }else{
    //console.log(monto,cupon,total_precio,cambio,arrayFiguras);
    $.ajax({

       type:"POST",
       url:"/ventas/NumerosLetras",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{
        cantidad:total_precio,
       },

        success:function(data){
          //console.log(data)
          $('#numero_letra').html(''+data+' M.N');
        }


    });

    $.ajax({

       type:"POST",
       url:"/ventas/create",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{

        monto:monto,
        cupon:cupon,
        total_precio:total_precio,
        cambio:cambio,
        arrayFiguras:arrayFiguras,
        tipo:tipo,
        tipe:tipe
       },

        success:function(data){
          //$('#Impresion_pago').modal('show');
          $('#folio_venta').html(data.folio_venta);
          var ventana = window.open('', 'print', '');
          ventana.document.write('<html><head><title>Recibo</title><style>td.producto,th.producto {width: 100%;max-width: 100%;}td.cantidad,th.cantidad {width: 100%;max-width: 100%;word-break: break-all;}td.precio,th.precio {width: 100%;max-width: 100%;word-break: break-all;}.centrado {text-align: center;align-content: center;}.ticket {width: 100%;max-width: 100%;font-size: 20px;font-family: "Times New Roman";}</style>');
          ventana.document.write('</head><body >');
          ventana.document.write( document.getElementById('pdf').innerHTML );
          ventana.document.write('</body></html>');
          ventana.document.close();
          ventana.focus();
          ventana.print();
          ventana.close();
          //return true;

          var este = window.matchMedia('print').addListener((evento)=>{console.log(evento);});


          if(este == undefined){
            Swal.fire({
              title: "Felicidades!",
              text: data.success,
              icon: "success",
              buttonsStyling: false,
              timer: 1500,
              showConfirmButton: false,
            }).then(function(result) {
              if (result.value == true) {

              }else{
                location.href ="/ventas";
                // $('.botoncito').show();
              }

            })
          }


        }


    });

  }
}

function guardarpromocioncumpleanos(){
  var clientes_promocion = $("select[name=clientes_promocion]").val();

  var descuentos_promocion = $("select[name=descuentos_promocion]").val();

  var fecha_vigencia = $('input[name=reservation]').val();

  $('.botoncito').hide();


  if( descuentos_promocion == '' || clientes_promocion == '' || fecha_vigencia == ''){


    Swal.fire({
      title: "Lo Sentimos",
      text: "Campos vacios",
      icon: "warning",
    })


  }else{

    $.ajax({

       type:"POST",
       url:"/promociones2/creates",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{
        //nombre_promocion:nombre_promocion,
        clientes_promocion:clientes_promocion,
        descuentos_promocion:descuentos_promocion,
        //descripcion:descripcion,
        // template:template,
        fecha_vigencia:fecha_vigencia,

       },

        success:function(data){

        Swal.fire({
          title: "Felicidades!",
          text: data.success,
          icon: "success",
          buttonsStyling: false,
          timer: 1500,
          showConfirmButton: false,
        }).then(function(result) {
          $("select[name=clientes_promocion]").val('').trigger('change');
          $("select[name=descuentos_promocion]").val("");
          $("select[name=descuentos_promocion]").trigger("change");
          $('input[name=reservation]').val('');
          $('.botoncito').show();
          $('#promocion_cumpleanos').modal('hide');

        })
        }


    });

  }
}

function guardarpromocion(){
  var nombre_promocion = $("input[name=nombre_promocion]").val();

  var clientes_promocion = $("select[name=clientes_promocion]").val();

  var descuentos_promocion = $("select[name=descuentos_promocion]").val();

  var descripcion = $("textarea[name=descripcion]").val();

  // var radio = $('input:radio:checked').prop('checked', true);

  var fecha_vigencia = $('input[name=reservation]').val();

  $('.botoncito').hide();

// var template = radio[0].value;

  if(nombre_promocion == '' || descuentos_promocion == '' || clientes_promocion == '' || descripcion == '' || fecha_vigencia == ''){


    Swal.fire({
      title: "Lo Sentimos",
      text: "Campos vacios",
      icon: "warning",
    })


  }else{

    $.ajax({

       type:"POST",

       url:"/promociones2/create",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{
        nombre_promocion:nombre_promocion,
        clientes_promocion:clientes_promocion,
        descuentos_promocion:descuentos_promocion,
        descripcion:descripcion,
        fecha_vigencia:fecha_vigencia,

       },

        success:function(data){
        // Swal.fire({title: "Felicidades!", text: data.success, type: "success"}, function(){ location.href ="{{ url('promociones') }}"; } );

        Swal.fire({
          title: "Felicidades!",
          text: data.success,
          icon: "success",
          buttonsStyling: false,
          timer: 1500,
          showConfirmButton: false,
        }).then(function(result) {

          $("input[name=nombre_promocion]").val('');
          $("select[name=clientes_promocion]").val('').trigger('change');
          $("select[name=descuentos_promocion]").val("");
          $("select[name=descuentos_promocion]").trigger("change");
          $("textarea[name=descripcion]").val('');
          $('input[name=reservation]').val('');
          $('#promocion_mensual').modal('hide');
          $('.botoncito').show();
        })
        }


    });

  }
}


  function tratamientos(){

    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();

    if (clientes == '' || empleados == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      $('#tratamiento_vista').show();
      $('#cabello_vista').hide();
      $('#peinados_vista').hide();
      $('#shellac_vista').hide();
      $('#fasts_vista').hide();
      $('#pestanas_vista').hide();
      $('#serviciosa_vista').hide();
      $('#servicioses_vista').hide();
      $('#cosas_servicios').show();
    }





  }

  function cabello_vista(){

    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();

    if (clientes == '' || empleados == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      $('#tratamiento_vista').hide();
      $('#cabello_vista').show();
      $('#peinados_vista').hide();
      $('#shellac_vista').hide();
      $('#fasts_vista').hide();
      $('#pestanas_vista').hide();
      $('#serviciosa_vista').hide();
      $('#servicioses_vista').hide();
      $('#cosas_servicios').show();
    }


  }

  function peinados_vista(){
    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();

    if (clientes == '' || empleados == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      $('#tratamiento_vista').hide();
      $('#cabello_vista').hide();
      $('#peinados_vista').show();
      $('#shellac_vista').hide();
      $('#fasts_vista').hide();
      $('#pestanas_vista').hide();
      $('#serviciosa_vista').hide();
      $('#servicioses_vista').hide();
      $('#cosas_servicios').show();
    }


  }

  function shellac_vista(){
    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();

    if (clientes == '' || empleados == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      $('#tratamiento_vista').hide();
      $('#cabello_vista').hide();
      $('#peinados_vista').hide();
      $('#shellac_vista').show();
      $('#fasts_vista').hide();
      $('#pestanas_vista').hide();
      $('#serviciosa_vista').hide();
      $('#servicioses_vista').hide();
      $('#cosas_servicios').show();
    }


  }

  function fasts_vista(){
    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();

    if (clientes == '' || empleados == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      $('#tratamiento_vista').hide();
      $('#cabello_vista').hide();
      $('#peinados_vista').hide();
      $('#shellac_vista').hide();
      $('#fasts_vista').show();
      $('#pestanas_vista').hide();
      $('#serviciosa_vista').hide();
      $('#servicioses_vista').hide();
      $('#cosas_servicios').show();
    }


  }

  function pestanas_vista(){
    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();

    if (clientes == '' || empleados == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      $('#tratamiento_vista').hide();
      $('#cabello_vista').hide();
      $('#peinados_vista').hide();
      $('#shellac_vista').hide();
      $('#fasts_vista').hide();
      $('#pestanas_vista').show();
      $('#serviciosa_vista').hide();
      $('#servicioses_vista').hide();
      $('#cosas_servicios').show();
    }


  }

  function serviciosa_vista(){
    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();

    if (clientes == '' || empleados == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      $('#tratamiento_vista').hide();
      $('#cabello_vista').hide();
      $('#peinados_vista').hide();
      $('#shellac_vista').hide();
      $('#fasts_vista').hide();
      $('#pestanas_vista').hide();
      $('#serviciosa_vista').show();
      $('#servicioses_vista').hide();
      $('#cosas_servicios').show();
    }


  }

  function servicioses_vista(){
    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();

    if (clientes == '' || empleados == '') {
      Swal.fire({
        title: "Lo Sentimos",
        text: "Campos vacios",
        icon: "warning",
      })
    }else{
      $('#tratamiento_vista').hide();
      $('#cabello_vista').hide();
      $('#peinados_vista').hide();
      $('#shellac_vista').hide();
      $('#fasts_vista').hide();
      $('#pestanas_vista').hide();
      $('#serviciosa_vista').hide();
      $('#servicioses_vista').show();
      $('#cosas_servicios').show();
    }


  }


  var objFigura = {};
  var arrayFiguras = [];


  function eliminarlugar(id){
    //console.log(id)
    //console.log(arrayFiguras)
    arrayFiguras.forEach(function(x, index, object) {
    if(x.id === id){
      object.splice(index, 1);
    }
  });

  $('#filas_lugar'+id).remove();
  //console.log(arrayFiguras)

  var numeros = arrayFiguras,suma = 0;
  numeros.forEach (function(numero){
      // console.log(parseFloat(numero.costo))
      suma += parseFloat(numero.costo);
  });
  $('#total').html('<p> $ '+suma.toFixed(2)+'</p>');
  $('#total_precio').val(suma.toFixed(2));

  }

  function aplicardescuento(descuento){
    var total = $('#total_precio').val();
  var descuentos = descuento/100;
  //console.log(descuentos)

  var total_descuento = total * descuentos;
  //console.log(total_descuento)

  //console.log(total - total_descuento)
  var total = total - total_descuento;

  $('#total').html('<p> $ '+total.toFixed(2)+'</p>');
  $('#total_precio').val(total.toFixed(2));

  }

  function guardarcliente(){
    var formData = new FormData();
    //console.log('entro')

      var id = 0;
      formData.append('id',id);


      var nombre = $('#nombre').val();
      var apellido_paterno = $('#apellido_paterno').val();
      var apellido_materno = $('#apellido_materno').val();
      var telefono = $('#telefono').val();
      var correo_electronico = $('#correo_electronico').val();
      var fecha_cumpleanos = $('input[name=fecha_cumpleanos]').val();

      formData.append('nombre', nombre);
      formData.append('apellido_paterno', apellido_paterno);
      formData.append('apellido_materno', apellido_materno);
      formData.append('telefono', telefono);
      formData.append('correo_electronico', correo_electronico);
      formData.append('fecha_cumpleanos', fecha_cumpleanos);

      if (nombre == '' || apellido_paterno == '' || telefono == '' ) {
        Swal.fire({
          title: "Lo Sentimos",
          text: "Campos vacios",
          icon: "warning",
        })
      }else{
        ///////////////////////////////////////////////////////7
        $.ajax({

               type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

               url:"/ventas/agregarcliente", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                      $('#nombre').val('');
                      $('#apellido_paterno').val('');
                      $('#apellido_materno').val('');
                      $('#telefono').val('');
                      $('#correo_electronico').val('');
                      $('input[name=fecha_cumpleanos]').val('');
                      $('#cliente_nuevo').modal('hide');

                    })



                  $('#clientes2').append('<option value=" ' + data.id + ' ">' + data.nombre +' '+data.apellido_paterno+' '+data.apellido_materno+ '</option>');



                }
          });

        /////////////////////////////////////////////////////////
      }


  }

  function cancelarventa(){
    location.reload();
  }

  function guardaragenda(){
    var formData = new FormData();
    //console.log('entro')

      var id = 0;
      formData.append('id',id);

      var titulo = $('#titulo').val();
      var descripcion = $('#descripcion').val();
      var fecha = $('input[name=fecha_defuncion]').val();

      formData.append('titulo', titulo);
      formData.append('descripcion', descripcion);
      formData.append('fecha', fecha);


      if (titulo == '' ||  descripcion == '' || fecha == '') {
        Swal.fire({
          title: "Lo Sentimos",
          text: "Campos vacios",
          icon: "warning",
        })
      }else{
        ///////////////////////////////////////////////////////7
        $.ajax({

               type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

               url:"/agendas2/create", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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

                      $('#agendar_cita').modal('hide');
                      $('#titulo').val('');
                      $('#descripcion').val('');
                      $('input[name=fecha_defuncion]').val('');

                    })

                  }


                }
          });

        /////////////////////////////////////////////////////////
      }


  }
  var tabla;



  function agregarservicios(id,modulo,numero){
    //console.log(id,modulo,numero)
    var clientes = $('#clientes').val();
    var empleados = $('#empleados').val();
    var cabinas = $('#cabinas').val();
    var horario = $('#horario').val();

    var clientes2 = $('#clientes2').val();
    var empleados2 = $('#empleados2').val();


    if (numero == 1) {
      if (clientes == 0 || empleados == 0 || cabinas == 0 || horario == 0) {
        Swal.fire("¡Lo sentimos!", 'Favor de llenar los campos obligatorio', "warning");
      }else{
        $.ajax({

           type:"POST",

           url:"/ventas/traerProducto",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{
             id:id,
             modulo:modulo,
           },

            success:function(data){
              //console.log(data)

              if (numero == 1) {
                var clientes = $('select[name="clientes"] option:selected').text();
                var empleados = $('select[name="empleados"] option:selected').text();

                var cabinas = $('select[name="cabinas"] option:selected').text();
                var horario = $('select[name="horario"] option:selected').text();

                var clientes_id = $('#clientes').val();
                var empleados_id = $('#empleados').val();

                var cabinas_id = $('#cabinas').val();
                var horario_id = $('#horario').val();
              }else{
                var clientes = $('select[name="clientes2"] option:selected').text();
                var empleados = $('select[name="empleados2"] option:selected').text();

                var cabinas = 0;
                var horario = 0;

                var clientes_id = $('#clientes2').val();
                var empleados_id = $('#empleados2').val();

                var cabinas_id = 0;
                var horario_id = 0;
              }




              var  _fecha = new Date();

              var   dd =  _fecha.getDate();
              var   mm =  _fecha.getMonth();
              var   yyyy =  _fecha.getFullYear();
              var fecha = yyyy+'-'+mm+'-'+dd;

            //  console.log(dd,mm,yyyy);
              objFigura = {
                 nombre : data.nombre,
                 costo : data.costo,
                 comision : data.comision,
                 clientes : clientes,
                 empleados : empleados,
                 clientes_id : clientes_id,
                 empleados_id : empleados_id,
                 cabinas : cabinas,
                 cabinas_id : cabinas_id,
                 horarios : horario,
                 horario_id : horario_id,
                 fecha : fecha,
                 id_modulo : modulo,
                 id_proser:data.id,
                 numero:numero,
              };

              indexH = arrayFiguras.push(objFigura);
              objFigura.id = indexH;

              var tr = '<tr id="filas_lugar'+objFigura.id+'" >'+
              //'<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+
              '<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+ objFigura.nombre +'</td>'+
              '<td>$'+ objFigura.costo +'</td>'+
              // '<td>'+ objFigura.clientes +'</td>'+
              // '<td>'+ objFigura.empleados +'</td>'+
              '<td><div class="btn btn-danger btn-circle btn-sm borrar_figura" onclick="eliminarlugar('+objFigura.id+')" ><i  class="fas fa-trash"></i></div></td>'
              '</tr>';
              $("#productos_ventas").append(tr);


              var numeros = arrayFiguras,suma = 0;
              numeros.forEach (function(numero){
                  // console.log(parseFloat(numero.costo))
                  suma += parseFloat(numero.costo);
              });
              $('#total').html('<p>Total $ '+suma.toFixed(2)+'</p>');
              $('#total_precio').val(suma.toFixed(2));

            }


        });
      }
    }else if(numero == 2){
      if (clientes2 == 0 || empleados2 == 0) {
        Swal.fire("¡Lo sentimos!", 'Favor de llenar los campos obligatorio', "warning");
      }else{
        $.ajax({

           type:"POST",

           url:"/ventas/traerProducto",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{
             id:id,
             modulo:modulo,
           },

            success:function(data){
              //console.log(data)

              if (numero == 1) {
                var clientes = $('select[name="clientes"] option:selected').text();
                var empleados = $('select[name="empleados"] option:selected').text();

                var cabinas = $('select[name="cabinas"] option:selected').text();
                var horario = $('select[name="horario"] option:selected').text();

                var clientes_id = $('#clientes').val();
                var empleados_id = $('#empleados').val();

                var cabinas_id = $('#cabinas').val();
                var horario_id = $('#horario').val();
              }else{
                var clientes = $('select[name="clientes2"] option:selected').text();
                var empleados = $('select[name="empleados2"] option:selected').text();

                var cabinas = 0;
                var horario = 0;

                var clientes_id = $('#clientes2').val();
                var empleados_id = $('#empleados2').val();

                var cabinas_id = 0;
                var horario_id = 0;
              }




              var  _fecha = new Date();

              var   dd =  _fecha.getDate();
              var   mm =  _fecha.getMonth();
              var   yyyy =  _fecha.getFullYear();
              var fecha = yyyy+'-'+mm+'-'+dd;

            //  console.log(dd,mm,yyyy);
              objFigura = {
                 nombre : data.nombre,
                 costo : data.costo,
                 comision : data.comision,
                 clientes : clientes,
                 empleados : empleados,
                 clientes_id : clientes_id,
                 empleados_id : empleados_id,
                 cabinas : cabinas,
                 cabinas_id : cabinas_id,
                 horarios : horario,
                 horario_id : horario_id,
                 fecha : fecha,
                 id_modulo : modulo,
                 id_proser:data.id,
                 numero:numero,
              };

              indexH = arrayFiguras.push(objFigura);
              objFigura.id = indexH;

              var tr = '<tr id="filas_lugar'+objFigura.id+'" >'+
              //'<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+
              '<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+ objFigura.nombre +'</td>'+
              '<td>$'+ objFigura.costo +'</td>'+
              // '<td>'+ objFigura.clientes +'</td>'+
              // '<td>'+ objFigura.empleados +'</td>'+
              '<td><div class="btn btn-danger btn-circle btn-sm borrar_figura" onclick="eliminarlugar('+objFigura.id+')" ><i  class="fas fa-trash"></i></div></td>'
              '</tr>';
              $("#productos_ventas").append(tr);


              var numeros = arrayFiguras,suma = 0;
              numeros.forEach (function(numero){
                  // console.log(parseFloat(numero.costo))
                  suma += parseFloat(numero.costo);
              });
              $('#total').html('<p>Total $ '+suma.toFixed(2)+'</p>');
              $('#total_precio').val(suma.toFixed(2));

            }


        });
      }
    }



  }

  //////////////PREVENTAS///////////////////////////
  function tablapreventas(){
    $('#preventas').modal('show');
    var id = 1;
    $("#kt_datatable").empty();
    $.ajax({

           type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

           url:"/ventas/traerPreventas", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
           },
            data: {
              id:id
            },


            success:function(data){
                //console.log(data);

                for (var i = 0; i < data.length; i++) {
                  var nombre_empleado = data[i].nombre_empleado+' '+data[i].apellido_p_empleado+' '+data[i].apellido_m_empleado;
                  var nombre_cliente = data[i].nombre_cliente+' '+data[i].apellido_p_cliente+' '+data[i].apellido_m_cliente;

                  var porciones = data[i].fecha.split('-');
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


                  var tr = '<tr>'+
                  '<td>'+ nombre_empleado +'</td>'+
                  '<td>'+ data[i].nombre_servicio +'</td>'+
                  '<td>'+ nombre_cliente +'</td>'+
                  '<td>'+ data[i].cabina +'</td>'+
                  '<td>$'+ data[i].importe +'</td>'+
                  '<td>'+ dia_inicio +'</td>'+
                  '<td><div class="btn btn-success btn-circle btn-sm" onclick="pagarPreventa('+data[i].id+')" ><i  class="fas fa-donate "></i></div></td>'
                  '</tr>';
                  $("#kt_datatable").append(tr);
                }





            }
      });
  }

  function pagarPreventa(id){
    $('#id_preventa').val(id);
  Swal.fire({
        title: "¿Estas seguro?",
        text: "No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, Pagar!"
    }).then(function(result) {
        if (result.value) {
            $('#efectivo_pagos').modal('show');
          $.ajax({

             type:"POST",

             url:"/ventas/traerPreventa",
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             data:{
            id:id,
             },

              success:function(data){

                  for (var i = 0; i < data.length; i++) {
                    // console.log(data);

                    var tr = '<tr id="id-figura-'+data[i].id+'">'+
                    //'<td><input type="hidden" id="figura_nueva" value="'+data[i].id+'"/>'+
                    '<td><input type="hidden" id="figura_nueva" value="'+data[i].id+'"/>'+ data[i].obtservicio.nombre +'</td>'+
                    '<td>$ '+ data[i].importe +'</td>'+
                    '</tr>';

                      $("#venta_efectivos").append(tr);

                      var totales = data[i].importe;

                      $('#total_efectivo_ventas').html('<strong>$ '+totales+'</strong>')
                      var tipo = 'Efectivo';
                      // if (id == 1) {
                      //   tipo = 'Efectivo';
                      // }else if(id == 2){
                      //   tipo = 'Transferencia';
                      // }else if(id == 3){
                      //   tipo = 'Tarjeta';
                      // }else if(id == 4){
                      //   tipo = 'Mix';
                      // }

                      var labels_tipo = 'Efectivo';
                      // if (id == 1) {
                      //   labels_tipo = 'Efectivo';
                      // }else if(id == 2){
                      //   labels_tipo = 'Monto Transferencia';
                      // }else if(id == 3){
                      //   labels_tipo = 'Monto Tarjeta';
                      // }else if(id == 4){
                      //   labels_tipo = 'Monto Mix';
                      // }
                      $('#total_precio2').val(data[i].importe);
                      $('#tipo_pagitos').html('<strong>Pago '+tipo+'</strong>');
                      $('#titulo_pagoss').html('Pago '+tipo+'');
                      $('#pago_label_tipos').html(''+labels_tipo+':');
                      $('#tipo_pago_s').val(1);

                }

              }


          });


        }
    })
  }

  function monto_totals(){
    var monto = $('#montos').val();
    var totales = $('#total_precio2').val();
    var total =  monto - totales;
    $('#pago_total_efectivo_venta2').html('<strong>$ '+monto+'</strong>')
    $('#cambio_efectivo_venta2').html('<strong>$ '+total.toFixed(2)+'</strong>')
    $('#cambio_efectivo_ventas').val(total.toFixed(2));
    $('#pago_total_efectivo_venta2s').html('<strong>$ '+monto+'.00</strong>')
    $('#pago_total_efectivo_ventass').html('<strong>$ '+monto+'.00</strong>')
    $('#cambio_efectivo_ventass2s').html('<strong>$ '+total.toFixed(2)+'</strong>')
    $('#cambio_efectivo_venta2s').html('<strong>$ '+total.toFixed(2)+'</strong>')
    $('#cambio_efectivo_venta3s').val(total.toFixed(2))
    $('#total_precio_tickets').html('<strong>$ '+totales+'</strong>')
  }


  function guardarpagoefectivo2(){
    //console.log('entro');

    var monto = $('#montos').val();
    //var cupon = $('#cupon').val();
    var total_precio = $('#total_precio2').val();
    var cambio = $('#cambio_efectivo_venta3s').val();
    var tipo = $('#tipo_pago_s').val();

    var id = $('#id_preventa').val();

    if( monto == '' ){


      Swal.fire({
        title: "Lo Sentimos",
        text: "Llene el campo",
        icon: "warning",
      })


    }else{
      //console.log(monto,cupon,total_precio,cambio,arrayFiguras);
      $.ajax({

         type:"POST",
         url:"/ventas/NumerosLetras",
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{
          cantidad:total_precio,
         },

          success:function(data){
            //console.log(data)
            $('#numero_letra').html(''+data+' M.N');
          }


      });

      $.ajax({

         type:"POST",
         url:"/ventas/preventaPago",
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{

          monto:monto,
          //cupon:cupon,
          total_precio:total_precio,
          cambio:cambio,
          id:id,
          tipo:tipo,

         },

          success:function(data){
            //$('#Impresion_pago').modal('show');
            $('#folio_venta2').html(data.folio_venta);
            var ventana = window.open('', 'print', '');
            ventana.document.write('<html><head><title>Recibo</title><style>td.producto,th.producto {width: 100%;max-width: 100%;}td.cantidad,th.cantidad {width: 100%;max-width: 100%;word-break: break-all;}td.precio,th.precio {width: 100%;max-width: 100%;word-break: break-all;}.centrado {text-align: center;align-content: center;}.ticket {width: 100%;max-width: 100%;font-size: 20px;font-family: "Times New Roman";}</style>');
            ventana.document.write('</head><body >');
            ventana.document.write( document.getElementById('pdfs').innerHTML );
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.focus();
            ventana.print();
            ventana.close();
            //return true;

            var este = window.matchMedia('print').addListener((evento)=>{console.log(evento);});


            if(este == undefined){
              Swal.fire({
                title: "Felicidades!",
                text: data.success,
                icon: "success",
                buttonsStyling: false,
                timer: 1500,
                showConfirmButton: false,
              }).then(function(result) {
                $('#agendar_cita').modal('hide');
                $('#efectivo_pagos').modal('hide');
                $('#preventas').modal('hide');
                $('input[name=fecha_agenda]').val('');


              })
            }


          }


      });

    }
  }

  function guardarCita(){
    //console.log('entro');
    var id_cita = $('input[name=id_cita]').val();
    var id = $('input[name=id]').val();
    var fecha_cabina = $('input[name=fecha_cabina]').val();
    var hora_cabina = $('input[name=hora_cabina]').val();
    var numero_cabina = $('input[name=numero_cabina]').val();

    var clientes = $('select[name=clientes_cita]').val();
    var empleados = $('select[name=empleados_cita]').val();
    var servicios = $('select[name=servicios_]').val();
    var descripcion = $('textarea[name=descripcion_cita]').val();




    var este = '';
    $(":radio[name=radios2]").each(function(){
    if (this.checked) {
      este = $(this).val();
      //console.log(este);
    }
  });

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
                location.reload();
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
                  location.reload();


                })
              }else{

              }



            }
      });
  }
  //  console.log(fecha_cabina,hora_cabina,numero_cabina,clientes,empleados,este)


  }

  function ventaServicio(){
    $('#servicios_ventitas').show();
    $('#productos_vetitas').show();


    $('#clientes').val('0').trigger('change.select2');
    $('#empleados').val('0').trigger('change.select2');
    $('#cabinas').val('0').trigger('change.select2');
    $('#horario').val('0').trigger('change.select2');
  }


////////////////////////// tabla productos ////////////////////////////////////
$(function() {
  var tabla = $('#example_list_art2').dataTable({
    ajax: {
      url: "/ventas/tablaProductosVenta",
    },
    processing: true,
    serverSide: true,
    stateSave: true,
    // "bDestroy": true,
    order: [[0, 'desc']],
    columns: [
      { data: 'id', name: 'id' },
      { data: 'nombre', name: 'nombre' },
    ],
    "initComplete": function(settings, json) {
      // show new container for data
      $('#new-list2').insertBefore('#example_list_art2');
      $('#new-list2').show();
    },
    "rowCallback": function( row, data ) {
      //console.log(data)
      var numero = 2;
        var li = $(document.createElement('li'));
          li.addClass("btn btn-primary font-weight-bold btn-square cuadrado");
            //console.log(data.modulo)
        if (data.categoria == 1) {
          if (data.stock == 0) {
            //console.log(data.modulo)
            li.addClass("btn btn-danger font-weight-bold btn-square cuadrado");
            li.append('<p  style="text-transform: uppercase;font-size:10px;"><i class="icon-md text-primary flaticon2-shopping-cart"></i>' + data.nombre+ '<br>$' + data.costo+ ' <small style="font-size: 9px;">stock <strong>'+data.stock+'</small></strong> </p>');

          }else{
            //console.log(data.modulo)
            li.append('<p onclick="agregarservicios('+data.id+','+data.modulo+','+numero+')" style="text-transform: uppercase;font-size:10px;"><i class="icon-md text-primary flaticon2-shopping-cart"></i>' + data.nombre+ '<br>$' + data.costo+ ' <small style="font-size: 9px;">stock <strong>'+data.stock+'</small></strong> </p>');
          }

        }else if(data.categoria == 2){
          //console.log(data.modulo)

          li.append('<p onclick="agregarservicios('+data.id+','+data.modulo+','+numero+')" style="text-transform: uppercase;font-size:10px;"><i class="icon-md text-primary flaticon2-shopping-cart"></i>' + data.nombre+ '<br>$' + data.costo+ '</p>');

        }
        li.appendTo('#new-list2');
    },
    "preDrawCallback": function( settings ) {
      // clear list before draw
      $('#new-list2').empty();
    },
    language: { url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
  });
});


  function ventaProducto(){

    $('#servicios_ventitas').hide();
    $('#productos_vetitas').show();
    $('#productills').show();
    $('#agendados').hide();

    $('#clientes2').val('0').trigger('change.select2');
    $('#empleados2').val('0').trigger('change.select2');


  }

  function citas(){
    $('#productills').hide();
    $('#clientes2').val('0').trigger('change.select2');
    $('#empleados2').val('0').trigger('change.select2');
    $('#agendados').show();


  }



/////////////////////////////////////////////////////////////////////////
$('#cabellito').hide();
var objFigura = {};
var arrayFiguras = [];
var array = [];

///////////////////////////////////////////////////////////////////////////
function modlapagar(id,este){
  $('#pagar_modal').modal('show');
  //console.log(id,este)
  $('#id_servicio').html('<input type="hidden" value="'+id+'" name="id_serv"/>');
  $.ajax({

         type:"POST",
         url:"/agendas/traerCita",
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
          data: {id:id},
          success:function(data){
            //console.log(data)
            var cabinas = 0;
            var horario = 0;

            $('#clientes').val(data.cliente);
            $('#empleados').val(data.empleado);
            $('#clientes_nombre').val(data.obt_cliente.nombre+' '+data.obt_cliente.apellido_paterno+' '+data.obt_cliente.apellido_materno);
            $('#empleados_nombre').val(data.obt_empleado.nombre+' '+data.obt_empleado.apellido_paterno+' '+data.obt_empleado.apellido_materno);

            var clientes_id = data.cliente;
            var empleados_id = data.empleado;
            var clientes = data.obt_cliente.nombre+' '+data.obt_cliente.apellido_paterno+' '+data.obt_cliente.apellido_materno;
            var empleados = data.obt_empleado.nombre+' '+data.obt_empleado.apellido_paterno+' '+data.obt_empleado.apellido_materno;
            var cabinas_id = 0;
            var horario_id = 0;

            var  _fecha = new Date();

            var   dd =  _fecha.getDate();
            var   mm =  _fecha.getMonth();
            var   yyyy =  _fecha.getFullYear();
            var fecha = yyyy+'-'+mm+'-'+dd;

            //console.log(data.servicio);
            var epale = data.servicio;
            $.ajax({

                   type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

                   url:"/agendas/TraerProductillos", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
                   },
                    data: {
                      servicios:epale,
                    },
                    success:function(date){
                      //console.log(date)
                      for (var i = 0; i < date.length; i++) {

                        objFigura = {
                           nombre : date[i].nombre,
                           costo : date[i].costo,
                           comision : date[i].comision,
                           clientes : clientes,
                           empleados : empleados,
                           clientes_id : clientes_id,
                           empleados_id : empleados_id,
                           cabinas : cabinas,
                           cabinas_id : cabinas_id,
                           horarios : horario,
                           horario_id : horario_id,
                           fecha : fecha,
                           id_modulo : data.modulo,
                           id_proser:data.id,
                           numero:1,
                        };

                            indexH = arrayFiguras.push(objFigura);

                            objFigura.id = indexH;

                            var tr = '<tr id="filas_lugar'+objFigura.id+'" >'+
                            //'<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+
                            '<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+ objFigura.nombre +'</td>'+
                            '<td>$'+ objFigura.costo +'</td>'+
                            // '<td>'+ objFigura.clientes +'</td>'+
                            // '<td>'+ objFigura.empleados +'</td>'+
                            '<td><div class="btn btn-danger btn-circle btn-sm borrar_figura" onclick="eliminarlugar('+objFigura.id+')" ><i  class="fas fa-trash"></i></div></td>'
                            '</tr>';
                            //$("#productos_ventas").append(tr);
                            $("#productos_ventas2").append(tr);

                            var numeros = arrayFiguras,suma = 0;
                            numeros.forEach (function(numero){
                                // console.log(parseFloat(numero.costo))
                                suma += parseFloat(numero.costo);
                            });
                            $('#total').html('<p>Total $ '+suma.toFixed(2)+'</p>');
                            $('#total_precio').val(suma.toFixed(2));
                      }


                    }
              });

            //  console.log(objFigura)






          }
    });
}

function empleadoServicio(){
  var empleado = $('#empleados').val();
  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agendas/TraerDatosEmpleado", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data:{
            empleado:empleado
          },

          success:function(data){

            //console.log(data)
            $('input[name=comision_empleado]').val(data.porcentaje)
            $('input[name=empleado_servico]').val(data.id)
          }
    });
}


function limpiar() {
    $("#mydiv").each(function() { this.value = '' });
}


document.addEventListener("DOMContentLoaded", () => {
    //const $codigo = 0;

      var codigo = document.querySelector("#codigos");
    codigo.addEventListener("keydown", evento => {

        if (evento.keyCode === 13) {
            // El lector ya terminó de leer
            var codigoDeBarras = codigo.value;
            // Aquí ya podemos hacer algo con el código. Yo solo lo imprimiré
            //console.log("Tenemos un código de barras:");

            // Limpiar el campo
            codigo.value = "";

            $.ajax({

                   type:"POST", //si existe esta variable anillos se va mandar put sino se manda post
                   url:"/ventas/traerProductos", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
                   },
                    data: {codigo:codigoDeBarras},
                    success:function(data){
                      //console.log(data)

                      if (data == '') {
                        Swal.fire({
                          title: "Lo Sentimos",
                          text: "Producto Agotado",
                          icon: "warning",
                        })
                      }else{
                        var clientes = $('#clientes_nombre').val();
                        var empleados = $('#empleados_nombre').val();

                        var cabinas = 0;
                        var horario = 0;

                        var clientes_id = $('#clientes').val();
                        var empleados_id = $('#empleados').val();

                        var cabinas_id = 0;
                        var horario_id = 0;

                      var  _fecha = new Date();

                      var   dd =  _fecha.getDate();
                      var   mm =  _fecha.getMonth();
                      var   yyyy =  _fecha.getFullYear();
                      var fecha = yyyy+'-'+mm+'-'+dd;

                    //  console.log(dd,mm,yyyy);
                      objFigura = {
                         nombre : data.nombre,
                         costo : data.costo,
                         comision : data.comision,
                         clientes : clientes,
                         empleados : empleados,
                         clientes_id : clientes_id,
                         empleados_id : empleados_id,
                         cabinas : cabinas,
                         cabinas_id : cabinas_id,
                         horarios : horario,
                         horario_id : horario_id,
                         fecha : fecha,
                         id_modulo : data.modulo,
                         id_proser:data.id,
                         numero:1,
                      };

                      indexH = arrayFiguras.push(objFigura);
                      objFigura.id = indexH;

                      var tr = '<tr id="filas_lugar'+objFigura.id+'" >'+
                      //'<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+
                      '<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+ objFigura.nombre +'</td>'+
                      '<td>$'+ objFigura.costo +'</td>'+
                      // '<td>'+ objFigura.clientes +'</td>'+
                      // '<td>'+ objFigura.empleados +'</td>'+
                      '<td><div class="btn btn-danger btn-circle btn-sm borrar_figura" onclick="eliminarlugar('+objFigura.id+')" ><i  class="fas fa-trash"></i></div></td>'
                      '</tr>';
                      $("#productos_ventas").append(tr);


                      var numeros = arrayFiguras,suma = 0;
                      numeros.forEach (function(numero){
                          // console.log(parseFloat(numero.costo))
                          suma += parseFloat(numero.costo);
                      });
                      $('#total').html('<p>Total $ '+suma.toFixed(2)+'</p>');
                      $('#total_precio').val(suma.toFixed(2));
                      }




                    }
              });


        }
    });

});

function efectivo(id,este){
  var id_servicio = $('input[name=id_serv]').val();
  //console.log(id,este)
  Swal.fire({
    title: "¿Estas segura de este metodo de pago?",
    text: "",
    icon: "warning",
    confirmButtonText: 'Si, Pagar!',
    showConfirmButton: true,
    showCancelButton: true
  }).then(function(result) {

      if (result.value == true) {
          $('#efectivo_pago').modal('show');
          $('#servicio_id').val(id_servicio);



          for (var i = 0; i < arrayFiguras.length; i++) {


            var tr = '<tr id="id-figura-'+arrayFiguras[i].id+'">'+
            //'<td><input type="hidden" id="figura_nueva" value="'+arrayFiguras[i].id+'"/>'+
            '<td><input type="hidden" id="figura_nueva" value="'+arrayFiguras[i].id+'"/>'+ arrayFiguras[i].nombre +'</td>'+
            '<td>$ '+ arrayFiguras[i].costo +'</td>'+
            '</tr>';

              $("#venta_efectivo").append(tr);

              var totales = $('#total_precio').val();

              $('#total_efectivo_venta').html('<strong>$ '+totales+'</strong>')
              var tipo = '';
              if (id == 1) {
                tipo = 'Efectivo';
              }else if(id == 2){
                tipo = 'Transferencia';
              }else if(id == 3){
                tipo = 'Tarjeta';
              }else if(id == 4){
                tipo = 'Mix';
              }

              var labels_tipo = '';
              if (id == 1) {
                labels_tipo = 'Efectivo';
              }else if(id == 2){
                labels_tipo = 'Monto Transferencia';
              }else if(id == 3){
                labels_tipo = 'Monto Tarjeta';
              }else if(id == 4){
                labels_tipo = 'Monto Mix';
              }

              $('#tipo_pagito').html('<strong>Pago '+tipo+'</strong>');
              $('#titulo_pagos').html('Pago '+tipo+'');
              $('#pago_label_tipo').html(''+labels_tipo+':');
              $('#tipo_pago_').val(id);
              $('#tipo_cosa_').val(este);

        }
      }
    })
}

function cupon_total(){
  var cupon = $('#cupon').val();


  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/ventas/TraerCupon", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data:{
            cupon:cupon
          },

          success:function(data){

            if (data == '') {
              Swal.fire({
                title: "Lo Sentimos",
                text: "Cupon no valido",
                icon: "warning",
              })
            }else{
              //console.log(data.descuentos_promocion)
              var totales = $('#total_precio').val();
              var descuentos = data.descuentos_promocion/100;
              //console.log(descuentos)

              var total_descuento = totales * descuentos;
              //console.log(total_descuento)

              //console.log(total - total_descuento)
              var total = totales - total_descuento;


              $('#total_efectivo_venta').html('<p> $ '+total.toFixed(2)+'</p>');
              $('#total').html('<p> $ '+total.toFixed(2)+'</p>');
              $('#total_precio').val(total.toFixed(2));
            }
          }
    });

}

function monto_total(){
  var monto = $('#monto').val();
  var totales = $('#total_precio').val();
    var total =  monto - totales;
    $('#pago_total_efectivo_venta').html('<strong>$ '+monto+'</strong>')

  $('#cambio_efectivo_venta').html('<strong>$ '+total.toFixed(2)+'</strong>')

    $('#cambio_efectivo_ventas').val(total.toFixed(2));


    $('#pago_total_efectivo_venta2').html('<strong>$ '+monto+'.00</strong>')

  $('#cambio_efectivo_venta2').html('<strong>$ '+total.toFixed(2)+'</strong>')
  $('#total_precio_ticket').html('<strong>$ '+totales+'</strong>')

}

function guardarpagoefectivo(){
  //console.log('entro');

  var monto = $('#monto').val();
  var cupon = $('#cupon').val();
  var total_precio = $('#total_precio').val();
  var cambio = $('#cambio_efectivo_ventas').val();
  var tipo = $('#tipo_pago_').val();



  if( monto == '' ){


    Swal.fire({
      title: "Lo Sentimos",
      text: "Llene el campo",
      icon: "warning",
    })


  }else{
    //console.log(monto,cupon,total_precio,cambio,arrayFiguras);
    $.ajax({

       type:"POST",
       url:"/ventas/NumerosLetras",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{
        cantidad:total_precio,
       },

        success:function(data){
          //console.log(data)
          $('#numero_letra').html(''+data+' M.N');
        }


    });

    guardaresto()
  }
}

function guardaresto(){
  var monto = $('#monto').val();
  var cupon = $('#cupon').val();
  var total_precio = $('#total_precio').val();
  var cambio = $('#cambio_efectivo_ventas').val();
  var tipo = $('#tipo_pago_').val();
  var servicio_id = $('#servicio_id').val();
    var tipe = $('#tipo_cosa_').val();
//console.log(servicio_id);
  //console.log(arrayFiguras);
  $.ajax({

     type:"POST",
     url:"/ventas/create",
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     data:{
      monto: $('#monto').val(),
      cupon:$('#cupon').val(),
      total_precio:$('#total_precio').val(),
      cambio:$('#cambio_efectivo_ventas').val(),
      tipo:$('#tipo_pago_').val(),
      servicio_id:$('#servicio_id').val(),
      arrayFiguras:arrayFiguras,
      tipe:tipe
     },

      success:function(data){

        //$('#Impresion_pago').modal('show');
        $('#folio_venta').html(data.folio_venta);
        var ventana = window.open('', 'print', '');
        ventana.document.write('<html><head><title>Recibo</title><style>td.producto,th.producto {width: 100%;max-width: 100%;}td.cantidad,th.cantidad {width: 100%;max-width: 100%;word-break: break-all;}td.precio,th.precio {width: 100%;max-width: 100%;word-break: break-all;}.centrado {text-align: center;align-content: center;}.ticket {width: 100%;max-width: 100%;font-size: 20px;font-family: "Times New Roman";}</style>');
        ventana.document.write('</head><body >');
        ventana.document.write( document.getElementById('pdf').innerHTML );
        ventana.document.write('</body></html>');
        ventana.document.close();
        ventana.focus();
        ventana.print();
        ventana.close();
        //return true;

        var este = window.matchMedia('print').addListener((evento)=>{console.log(evento);});


        if(este == undefined){
          Swal.fire({
            title: "Felicidades!",
            text: data.success,
            icon: "success",
            buttonsStyling: false,
            timer: 1500,
            showConfirmButton: false,
          }).then(function(result) {
            if (result.value == true) {

            }else{
              location.href ="/agendas/vista/{{$fecha_atras}}";
              // $('.botoncito').show();
            }

          })
        }


      }


  });

}

/////////////////////////////////////////////////////////////////////////////
function TipoCambio(){
  var tipo =  $('select[name=tipo]').val();

  if (tipo == 0) {
    $('#cabellito').hide();
    //$('select[name=tipo_cabello]').val(0);
  }else if(tipo == 1){
    $('#cabellito').hide();
    //$('select[name=tipo_cabello]').val(0);
  }else if(tipo == 2){
    $('#cabellito').show();
    //$('select[name=tipo_cabello]').val(0);
  }

}
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
function clientesnuevos(){
    $('#cliente_nuevo').modal('show');
}

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

function guardarcliente(){
  var formData = new FormData();
  //console.log('entro')

    var id = 0;
    formData.append('id',id);


    var nombre = $('#nombre_cliente').val();
    var apellido_paterno = $('#apellido_paterno_cliente').val();
    var apellido_materno = $('#apellido_materno_cliente').val();
    var telefono = $('#telefono_clientes').val();
    var correo_electronico = $('#correo_electronico').val();
    var fecha_cumpleanos = $('input[name=fecha_cumpleanos]').val();

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

             url:"/ventas/agregarcliente", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                    $('#nombre_cliente').val('');
                    $('#apellido_paterno_cliente').val('');
                    $('#apellido_materno_cliente').val('');
                    $('#telefono_cliente').val('');
                    $('#correo_electronico').val('');
                    $('input[name=fecha_cumpleanos]').val('');
                    $('#cliente_nuevo').modal('hide');

                  })



                $('#clientes').append('<option value=" ' + data.id + ' ">' + data.nombre +' '+data.apellido_paterno+' '+data.apellido_materno+ '</option>');



              }
        });

      /////////////////////////////////////////////////////////
    }


}


$('#existe_session').hide();
function servicio_checar(){
  var id_servicio = $('select[name=servicios_]').val();
    var id_cliente = $('select[name=clientes]').val();
    $('#existe_session').hide();
//console.log(id_servicio,id_cliente)
  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agendas/ExisteCliente", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data: {
            id:id_servicio,
            id_cliente:id_cliente
          },
          success:function(data){
            //console.log(data)
            if (data == '') {
              $('#existe_session').show();
              $('#sesionsita').val(1);
            }else if(data == 0){
              $('#existe_session').hide();
              // $('#boton_modal_pagar').hide();
              // $('#opr').html('<h1>PAGADO</h1>');
            }else{
              //console.log(data)
              var suma = 0;
              suma = 1 + parseInt(data.id_sesion);
              $('#existe_session').show();
              $('#sesionsita').val(suma);
            }
          }
    });
}


$('#eventos').hide();
$('#telefono_cliente').hide();
$('#boton_borrar').hide();
$('#boton_modal_pagar').hide();

$('#empleadilla_comision').hide();



$('#clientes').select2({
    width: '100%',
});

$('#empleados').select2({
    width: '100%',
});

$('#servicios_').select2({
    width: '100%',
});

$('#tipo').select2({
    width: '100%',
});

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

  var anio = {{$anio}};
  var mes = {{$mes}};
  var dia = {{$dia}};


var fecha = anio+'-'+mes+'-'+dia;
//  console.log(anio,mes,dia)
// $(document).ready(function () {
//
//     // let date = new Date()
//     //
//     // let day = date.getDate()
//     // let month = date.getMonth() + 1
//     // let yearini = date.getFullYear();
//     //
//     // let year = date.getFullYear() + 1
//     //
//     // var event_start = yearini+'-'+'01-01';
//     // var event_end = year+'-'+'12-31';
//
//
//     var calendar = $('#full_calendar_events').fullCalendar({
//
//       selectable: true,
//       headerToolbar: {
//         left: 'prev,next today',
//         center: 'title',
//       },
//       locale: 'es',
//       dayClick: function(date, allDay, jsEvent, view) {
//         var dia_calendario = allDay.target.dataset.date;
//         //console.log(dia_calendario);
//         // document.getElementById("agendas").reset();
//
//         var porciones = dia_calendario.split('-');
//         //console.log(porciones[0])
//
//         if (porciones[1] == 1) {
//           var mes = 'Enero';
//         }else if(porciones[1] == 2){
//           var mes = 'Febrero';
//         }else if(porciones[1] == 3){
//           var mes = 'Marzo';
//         }else if(porciones[1] == 4){
//           var mes = 'Abril';
//         }else if(porciones[1] == 5){
//           var mes = 'Mayo';
//         }else if(porciones[1] == 6){
//           var mes = 'Junio';
//         }else if(porciones[1] == 7){
//           var mes = 'Julio';
//         }else if(porciones[1] == 8){
//           var mes = 'Agosto';
//         }else if(porciones[1] == 9){
//           var mes = 'Septiembre';
//         }else if(porciones[1] == 10){
//           var mes = 'Octubre';
//         }else if(porciones[1] == 11){
//           var mes = 'Noviembre';
//         }else if(porciones[1] == 12){
//           var mes = 'Diciembre';
//         }
//
//         var dia_inicio = porciones[2]+' '+mes+' '+porciones[0];
//
//         if (dia_calendario == undefined) {
//           $('#eventos').hide();
//
//         }else{
//           $('#eventos').show();
//           $('#dia').html('<h2>Citas del '+dia_inicio+'</h2>');
//           $('#dia_evento').val(dia_calendario);
//             //citas(dia_calendario);
//
//
//         }
//
//
//
//
//
//
//       }
//
//
//    });
//
//
//
// });

$('select[name=clientes]').on('change', function() {
  var id_cliente = $('select[name=clientes]').val();
  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agendas/TraerClienteNum", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data: {
            id:id_cliente
          },
          success:function(data){
            //console.log(data.telefono)
            $('#telefono_cliente').show();
            $('#telefono').val(data.telefono);


          }
    });
});


initCotizacion(fecha);


function nuevo_evento(id,cabina,horario){
  //console.log(id,cabina);

  var fecha = $('#dia_evento').val();
  $('#cita_diaria').modal('show');
  $('#numero_cabina').val(cabina);
  $('#fecha_cabina').val(fecha);
  $('#hora_cabina').val(horario);
  $('#id_cita').val(id);
  $('input[name=id]').val(0);
  $('select[name=tipo]').val(cabina)
  //console.log(cabina)
if (cabina == 1 || cabina == 2 || cabina == 3 || cabina == 4 || cabina == 5 || cabina == 6) {

   $('select[name=tipo]').val('1').trigger('change.select2');
}else if(cabina == 7 || cabina == 8){
  //  $('#tipo option[value="'+cabina+'"]').attr("selected",true);
    $('select[name=tipo]').val('2').trigger('change.select2');
    TipoCambio()
}


if (cabina == 1 || cabina == 2 || cabina == 3 || cabina == 4 || cabina == 5 || cabina == 6) {
  var servicio = 1;
}else if(cabina == 7 || cabina == 8){
  var servicio = 2;
}

//var servicio = cabina;
$.ajax({

       type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

       url:"/agendas/TraerServicio", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
       },
        data: {servicio:servicio},
        success:function(data){

          //console.log(data)
          $('#servicios_').empty();
          for (var i = 0; i < data.length; i++) {
            $('#servicios_').append('<option value="'+data[i].id+'">'+data[i].nombre+'</option>')

          }
        }
  });

  var cosita = $('#id_cosita_'+id+'_'+cabina).val();

  //console.log(cosita,id,cabina);

  if(cosita == undefined){
    // $("select[name=clientes] ").val("");
    // $("select[name=empleados]").val("");
    // $("select[name=servicio]").val("");

    $('select[name=clientes]').val('0').trigger('change.select2');
    $('select[name=empleados]').val('0').trigger('change.select2');
    $('select[name=servicios_]').val('0').trigger('change.select2');
    $('select[name=tipo]').val('0')
    $('select[name=tipo_cabello]').val('0')

    $('textarea[name=descripcion]').val('');
    $(":radio[name=radios2][value=1]").prop('checked',false);
    $(":radio[name=radios2][value=2]").prop('checked',false);
    $(":radio[name=radios2][value=3]").prop('checked',false);
    $(":radio[name=radios2][value=4]").prop('checked',false);

    $(":radio[name=radios3]").prop('checked',false);
    $(":radio[name=radios4]").prop('checked',false);
    $(":radio[name=radios5]").prop('checked',false);
    $('#telefono_cliente').hide();
    $('#telefono').val('');
    $('#boton_borrar').hide();
    $('#boton_modal_pagar').hide();

    $('#empleadilla_comision').hide();
  }else{


    $('textarea[name=descripcion]').val('');
    $(":radio[name=radios2][value=1]").prop('checked',false);
    $(":radio[name=radios2][value=2]").prop('checked',false);
    $(":radio[name=radios2][value=3]").prop('checked',false);
    $(":radio[name=radios2][value=4]").prop('checked',false);
    $('select[name=tipo]').val('0')
    $('select[name=tipo_cabello]').val('0')
    $(":radio[name=radios3]").prop('checked',false);
    $(":radio[name=radios4]").prop('checked',false);
    $(":radio[name=radios5]").prop('checked',false);
    $('#telefono_cliente').hide();
    $('#telefono').val('');
    $('#boton_borrar').hide();
    $('#boton_modal_pagar').hide();

    $('#empleadilla_comision').hide();

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
              var empleado_servicio = data.empleado_servicio;
              var comision_servicio = data.comision_servicio;
              var duracion = data.duracion;
              var tipo = data.tipo;
              var tipo_cabello = data.tipo_cabello;
              var pagado = data.pagado;

              ///console.log(tipo_cabello)

              $('select[name=tipo]').val(tipo)
              $('select[name=tipo_cabello]').val(tipo_cabello)

              TipoCambio();

              $(":radio[name=radios3][value="+empleado_servicio+"]").prop('checked',true);

              $(":radio[name=radios4][value="+comision_servicio+"]").prop('checked',true);

              $(":radio[name=radios5][value="+duracion+"]").prop('checked',true);


              $('#telefono_cliente').show();
              $('#telefono').val(data.telefono_cliente);
              //console.log(servicio,data)

              $('#numero_cabina').val(cabina);
              $('#fecha_cabina').val(fecha);
              $('#hora_cabina').val(horario);
              $('#id_cita').val(id_calendario);
              $('input[name=id]').val(id);



              //$("select[name=clientes] option[value='"+cliente+"']").attr("selected", true);
              //$("select[name=empleados] option[value='"+empleado+"']").attr("selected", true);
              //$("select[name=servicios_] option[value='"+servicio+"']").attr("selected", true);

              $('select[name=clientes]').val(cliente).trigger('change.select2');
              $('select[name=empleados]').val(empleado).trigger('change.select2');
              // console.log(servicio.length);
              //
              //
              // if (servicio.length > 2) {
              //
              // }else{
              //   var  arr = servicio;
              //   console.log(arr,'namas uno')
              //   array.push(arr)
              // }

              var  arr = servicio.split(',');
              //console.log(arr,'chingos')
              array.push(arr)



            //console.log(array[0])


            //console.log(array[0])
            //var res= array.join(',')
            // console.log(res);

            ////////////////////////////////////////////////////////////////
            $('select[name=servicios_]').val(array[0]).trigger('change.select2');
              //$('#servicios_').val(array[0]).trigger('change.select2');
              //var $licencia_seleccionadas = $("<option selected></option>").val(array[0]);
              //$('#servicios_').append($licencia_seleccionadas).trigger('change');
              //$('#servicios_').val(array[0]).trigger("change");

              $('textarea[name=descripcion]').val(descripcion);
              $('#boton_borrar').show();
              $('#empleadilla_comision').show();
              $('#boton_borrar').html('<button type="button" class="btn btn-light-danger font-weight-bold" onclick="borrarCita('+data.id+','+data.duracion+')">Eliminar</button>')
              if (estatus == 1) {
                $(":radio[name=radios2][value=1]").prop('checked',true);
                $(":radio[name=radios2][value=2]").prop('checked',false);
                $(":radio[name=radios2][value=3]").prop('checked',false);
                $(":radio[name=radios2][value=4]").prop('checked',false);
                $('#boton_modal_pagar').hide();

              }else if(estatus == 2){
                $(":radio[name=radios2][value=1]").prop('checked',false);
                $(":radio[name=radios2][value=2]").prop('checked',true);
                $(":radio[name=radios2][value=3]").prop('checked',false);
                $(":radio[name=radios2][value=4]").prop('checked',false);
                $('#boton_modal_pagar').hide();

              }else if(estatus == 3){
                $(":radio[name=radios2][value=1]").prop('checked',false);
                $(":radio[name=radios2][value=2]").prop('checked',false);
                $(":radio[name=radios2][value=3]").prop('checked',true);
                $(":radio[name=radios2][value=4]").prop('checked',false);
                $('#boton_modal_pagar').show();
                if (pagado == 1) {

                }else{
                  $('#boton_modal_pagar').html('<button type="button" class="btn btn-light-success font-weight-bold" onclick="modlapagar('+data.id+','+data.duracion+')">Pagar Servicio</button>')

                }
              }else if(estatus == 4){
                $(":radio[name=radios2][value=1]").prop('checked',false);
                $(":radio[name=radios2][value=2]").prop('checked',false);
                $(":radio[name=radios2][value=3]").prop('checked',false);
                $(":radio[name=radios2][value=4]").prop('checked',true);
                $('#boton_modal_pagar').hide();

              }
            }
          });
  }

}


// function citas (dia_calendario){
// //   setTimeout(() => {
// //   document.location.reload();
// // }, 3000);
//
//   $.ajax({
//
//          type:"POST", //si existe esta variable anillos se va mandar put sino se manda post
//
//          url:"/agendas/traerHoras", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
//          headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
//          },
//           data:{
//             id:1
//           },
//           success:function(data){
//             //console.log(data)
//
//             for (var i = 0; i < data.length; i++) {
//
//
//               var suma = i + 1;
//
//               var tr = '<tr class="horario_'+i+'" >'+
//               '<td>'+ data[i].horario +'</td>'+
//               '<td class="cabibna_'+suma+'_1 estemero" onclick="nuevo_evento('+suma+',1,'+ data[i].horario +')"></td>'+
//               '<td class="cabibna_'+suma+'_2 estemero" onclick="nuevo_evento('+suma+',2,'+ data[i].horario +')"></td>'+
//               '<td class="cabibna_'+suma+'_3 estemero" onclick="nuevo_evento('+suma+',3,'+ data[i].horario +')"></td>'+
//               '<td class="cabibna_'+suma+'_4 estemero" onclick="nuevo_evento('+suma+',4,'+ data[i].horario +')"></td>'+
//               '<td class="cabibna_'+suma+'_5 estemero" onclick="nuevo_evento('+suma+',5,'+ data[i].horario +')"></td>'+
//               '<td class="cabibna_'+suma+'_6 estemero" onclick="nuevo_evento('+suma+',6,'+ data[i].horario +')"></td>'+
//               '<td class="cabibna_'+suma+'_7 estemero" onclick="nuevo_evento('+suma+',7,'+ data[i].horario +')"></td>'+
//               '<td class="cabibna_'+suma+'_8 estemero" onclick="nuevo_evento('+suma+',8,'+ data[i].horario +')"></td>'+
//               '</tr>';
//
//                 $("#agendas").append(tr);
//
//                 initCotizacion(dia_calendario);
//             }
//           }
//     });
// }


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
                  //  console.log('entro',index)
                  //  object.splice(index, 1);

                    //object.length = index;


                    //$('.cabibna_'+x[0]+'_'+x[1]).reset();
                    //location.reload();
                    // $("#mydiv").load(location.href + " #mydiv");


                  }
                });

// .attr('rowspan', '2')

                if (arrayfinal[h].data[0][14] == 5) {
                  //var comision = '$5';
                  var comision = '';
                }else if(arrayfinal[h].data[0][14] == 10){
                  //var comision = '$10';
                  var comision = '';
                }else if(arrayfinal[h].data[0][14] == 30){
                  //var comision = '$30';
                  var comision = '';
                }
                //console.log(arrayfinal[h].data[0][8] == null)
                if (arrayfinal[h].data[0][8] == null) {
                  var apellidom = '';
                }else{
                  var apellidom = arrayfinal[h].data[0][8];
                }

                if (arrayfinal[h].data[0][16] == 1) {
                  var pagado = 'PAGADO';
                }else{
                  var pagado = 'SIN PAGAR';
                }



              //console.log(arrayfinal[h])
              if (arrayfinal[h].data[0][2] == 1) {

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'</p>').css('background', 'pink').css('color', 'white');

                // if (arrayfinal[h].data[0][15] == 1) {
                //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'</p>').css('background', 'pink').css('color', 'white');
                // }else if(arrayfinal[h].data[0][15] == 2){
                //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'</p>').css('background', 'pink').css('color', 'white').attr('rowspan', '2');
                // }



              }else if(arrayfinal[h].data[0][2] == 2){

                //$('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'black').css('background', 'yellow')

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong></p>').css('color', 'black').css('background', 'yellow')


                  // if (arrayfinal[h].data[0][15] == 1) {
                  //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'black').css('background', 'yellow');
                  //
                  // }else if(arrayfinal[h].data[0][15] == 2){
                  //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'black').css('background', 'yellow');
                  //
                  // }



              }else if(arrayfinal[h].data[0][2] == 3){

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+pagado+'</strong></p>').css('color', 'white').css('background', 'green');


                // if (arrayfinal[h].data[0][15] == 1) {
                //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'white').css('background', 'green');
                //
                // }else if(arrayfinal[h].data[0][15] == 2){
                //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'white').css('background', 'green').attr('rowspan', '2');
                //
                // }



              }else if(arrayfinal[h].data[0][2] == 4){

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'</p>').css('background', 'red').css('color', 'white');


                // if (arrayfinal[h].data[0][15] == 1) {
                //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'</p>').css('background', 'red').css('color', 'white');
                //
                // }else if(arrayfinal[h].data[0][15] == 2){
                //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'</p>').css('background', 'red').css('color', 'white').attr('rowspan', '2');
                //
                // }



              }

            //  estesk++;

            }

        }


        async function mandarCostos(id){
          //console.log(id)

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
                //console.log(data[j]);
               _temp.data.push([data[j].id_calendario,data[j].cabina,data[j].status,data[j].id,data[j].fecha,data[j].cliente,data[j].nombre_cliente,data[j].apellido_paterno_cliente,data[j].apellido_materno_cliente,data[j].nombre_empleado,data[j].apellido_paterno_empleado,data[j].apellido_paterno_empleado,data[j].servicio_nombre,data[j].inicial,data[j].comision_servicio,data[j].duracion,data[j].pagado]);
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
  var servicios = $('select[name=servicios_]').select2().val();
  var descripcion = $('textarea[name=descripcion]').val();
  var telefono = $('input[name=telefono]').val();
  var comision_empleado = $('input[name=comision_empleado]').val();
  var empleado_servicio = $('input[name=empleado_servico]').val();



  var sesion_cita = $('input[name=sesion_cita]').val();
  if (numero_cabina == 1) {
      var tipo = 1;
  }else if(numero_cabina == 2){
    var tipo = 2;
  }

  var tipo_cabello =   $('select[name=tipo_cabello]').val();

  //console.log(id);

  var este = '';
  $(":radio[name=radios2]").each(function(){
  if (this.checked) {
    este = $(this).val();
    //console.log(este);
  }
});

var este2 = '';
$(":radio[name=radios3]").each(function(){
if (this.checked) {
  este2 = $(this).val();
  //console.log(este);
}
});

var este3 = '';
$(":radio[name=radios4]").each(function(){
if (this.checked) {
  este3 = $(this).val();
  //console.log(este);
}
});

var este4 = '';
$(":radio[name=radios5]").each(function(){
if (this.checked) {
  este4 = $(this).val();
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
formData.append('telefono', telefono);
formData.append('este', este);
formData.append('este2', este2);
formData.append('este3', este3);
formData.append('este4', este4);
formData.append('descripcion', descripcion);
formData.append('sesion_cita', sesion_cita);

formData.append('tipo', tipo);
formData.append('tipo_cabello', tipo_cabello);
formData.append('comision_empleado', comision_empleado);
formData.append('empleado_servicio', empleado_servicio);


// console.log(clientes,empleados, servicios , tipo )


if (clientes == 0 || empleados == 0  ||  servicios == 0 ) {
  Swal.fire("Ups lo Sentimos!", 'Campos Vacios', "warning");
}else{
  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agendas/ExisteCita", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data: {
            id_calendario:id_cita,
            fecha_cabina:fecha_cabina,
            hora_cabina:hora_cabina,
            numero_cabina:numero_cabina,
            tipo:este4,
            estatus:este,
          },
          success:function(data){
          //console.log(data)

          if (data == 0) {
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
                            location.href ="/agendas/vista/{{$fecha_atras}}";
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
                            location.href ="/agendas/vista/{{$fecha_atras}}";

                        })
                      }else{

                      }



                    }
              });
          }else{
            Swal.fire("Ups lo Sentimos!", 'Ya existe una cita previa revise el calendario', "warning");
          }

          }
    });

}
//  console.log(fecha_cabina,hora_cabina,numero_cabina,clientes,empleados,este)


}

function borrarCita(id,duracion){
  //console.log(id)

  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agendas/EliminarCita", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data: {
            id:id,
            duracion:duracion
          },
          success:function(data){
            //console.log(data)
            if (data.success == 'Ha sido eliminada con éxito') {
              Swal.fire({
                title: "",
                text: data.success,
                icon: "success",
                buttonsStyling: false,
                timer: 1500,
                  showConfirmButton: false,
              }).then(function(result) {
                  location.href ="/agendas/vista/{{$fecha_atras}}";
              })

            }


          }
    });

}




</script>
@endsection
