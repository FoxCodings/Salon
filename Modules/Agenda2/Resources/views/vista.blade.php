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
        <div class="col-md-12 ">
          <h3>Citas del dia {{ $fechas }}</h3> <a href="/agenda2/inicio" class="btn btn-success btn-sm">Regresar</a>
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
                      <th >Cab 1</th>
                      <th >Cab 2</th>
                      <th >Cab 3</th>
                      <th >Cab 4</th>
                      <th >Cab 5</th>
                      <th >Cab 6</th>
                      <th >Dep 1</th>
                      <th >Dep 2</th>
                  </tr>
              </thead>
              <tbody >
                @foreach($citas as $key => $value)
                <tr class="horario_{{$key}}" >

                  <td style="background-color:pink;">{{$value->horario}}</td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Cita</h5>
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
                              <select class="form-control" name="tipo" onchange="TipoCambio()">
                                <option value="0">Seleccionar</option>
                                <option value="1">Uñas</option>
                                <option value="2">Cabello</option>
                              </select>
                          </div>
                          <div class="col-md-4" id="cabellito">
                              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo de Cabello: </label>
                              <select class="form-control" name="tipo_cabello">
                                <option value="0">Seleccionar</option>
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
                                    <option  value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-4 ">
                            <div class="form-group">
                            <label for="exampleInputPassword1">Empleado <small style="color:red;font-size:10px;">*</small></label>
                            <div class="input-group">
                                  <select class="form-control" id="empleados" name="empleados">
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
                                  <select class="form-control" id="servicios_" name="servicios_" onchange="servicio_checar()">
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


                      <div id="empleadilla_comision">
                        <div class="row">
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
                        </div>

                        <div class="row">
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
                        </div>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> -->
<script src="/js/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js"></script>

<script type="text/javascript">
$('#cabellito').hide();
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

  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agenda2/ExisteCliente", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data: {
            id:id_servicio,
            id_cliente:id_cliente
          },
          success:function(data){
            //console.log(data == '')
            if (data == '') {
              $('#existe_session').show();
              $('#sesionsita').val(1);
            }else if(data == 0){
              $('#existe_session').hide();
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

         url:"/agenda2/TraerClienteNum", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
    $('#empleadilla_comision').hide();

    $.ajax({

           type:"POST",

           url:"/agenda2/TraerDatosCita",
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

              console.log(tipo_cabello)

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
              $('select[name=servicios_]').val(servicio).trigger('change.select2');

              $('textarea[name=descripcion]').val(descripcion);
              $('#boton_borrar').show();
              $('#empleadilla_comision').show();
              $('#boton_borrar').html('<button type="button" class="btn btn-light-danger font-weight-bold" onclick="borrarCita('+data.id+','+data.duracion+')">Eliminar</button>')
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

// function citas (dia_calendario){
// //   setTimeout(() => {
// //   document.location.reload();
// // }, 3000);
//
//   $.ajax({
//
//          type:"POST", //si existe esta variable anillos se va mandar put sino se manda post
//
//          url:"/agenda2/traerHoras", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                  var comision = '$5';
                }else if(arrayfinal[h].data[0][14] == 10){
                  var comision = '$10';
                }else if(arrayfinal[h].data[0][14] == 30){
                  var comision = '$30';
                }
                //console.log(arrayfinal[h].data[0][8] == null)
                if (arrayfinal[h].data[0][8] == null) {
                  var apellidom = '';
                }else{
                  var apellidom = arrayfinal[h].data[0][8];
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

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'black').css('background', 'yellow')


                  // if (arrayfinal[h].data[0][15] == 1) {
                  //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'black').css('background', 'yellow');
                  //
                  // }else if(arrayfinal[h].data[0][15] == 2){
                  //   $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'black').css('background', 'yellow');
                  //
                  // }



              }else if(arrayfinal[h].data[0][2] == 3){

                $('.cabibna_'+larocka+'_'+arrayfinal[h].data[0][1]).html('<input type="hidden" id="id_cosita_'+larocka+'_'+arrayfinal[h].data[0][1]+'" value="'+arrayfinal[h].data[0][3]+'"><p style="font-size: 10px;cursor: pointer;hyphens: auto;word-wrap: break-word;word-break: break-word;"><strong>Cliente</strong>: '+arrayfinal[h].data[0][6]+' '+arrayfinal[h].data[0][7]+' '+apellidom+'<br><strong>Empleado</strong>: '+arrayfinal[h].data[0][9]+' '+arrayfinal[h].data[0][10]+' '+arrayfinal[h].data[0][11]+'<br><strong>Servicio</strong>: '+arrayfinal[h].data[0][12]+'<br><strong style="font-size: 15px;">'+arrayfinal[h].data[0][13]+'</strong><br><strong style="font-size: 15px;">'+comision+'</strong></p>').css('color', 'white').css('background', 'green');


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
             url:"/agenda2/TraerDatosAgenda",
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
               _temp.data.push([data[j].id_calendario,data[j].cabina,data[j].status,data[j].id,data[j].fecha,data[j].cliente,data[j].nombre_cliente,data[j].apellido_paterno_cliente,data[j].apellido_materno_cliente,data[j].nombre_empleado,data[j].apellido_paterno_empleado,data[j].apellido_paterno_empleado,data[j].servicio_nombre,data[j].inicial,data[j].comision_servicio,data[j].duracion]);
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
  var telefono = $('input[name=telefono]').val();

  var sesion_cita = $('input[name=sesion_cita]').val();

  var tipo = $('select[name=tipo]').val();
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


if (clientes == 0 || empleados == 0 || este == '' ||  servicios == 0 || tipo == 0) {
  Swal.fire("Ups lo Sentimos!", 'Campos Vacios', "warning");
}else{
  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/agenda2/update", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                  location.href ="/agenda2/vista/{{$fecha_atras}}";
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
                  location.href ="/agenda2/vista/{{$fecha_atras}}";

              })
            }else{

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

         url:"/agenda2/EliminarCita", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                  location.href ="/agenda2/vista/{{$fecha_atras}}";
              })

            }


          }
    });

}




</script>
@endsection
