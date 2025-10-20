@extends('layouts.venta')
@section('content')

<!-- "Ventas": {
    "enlace": "/ventas",
    "icono": "fas fa-table",
    "permises": [

    ]
},
  "Certificados": {
      "enlace": "/ventas/certificados",
      "icono": "fas fa-table",
      "permises": [

      ]
  },
  "Ventas y Abonos": {
              "enlace": "/ventas/preventas",
              "icono": "fas fa-table",
              "permises": [

              ]
  } -->

<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" /> -->
  <link rel="stylesheet" href="/css/fullcalendar.min.css" />
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
<!-- <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

      <div class="d-flex align-items-center flex-wrap mr-2">


              <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                  Acciones
              </h5>

              <div class="d-flex align-items-center">

                <a  onclick="ventaServicio()"  class="btn btn-secondary  btn-sm font-weight-bold font-size-base mr-1">
                    Venta Servicio
                </a>
                <a  onclick="ventaProducto()" class="btn btn-secondary  btn-sm font-weight-bold font-size-base mr-1">
                    Venta Productos
                </a>

              </div>


          </div>

    </div>
</div>
<div style="height:50px;"></div> -->
<div class=" container ">
  <div class="row">

  <div class="col-md-8">
  		<!--begin::List Widget 3-->
  <div class="card card-custom card-stretch gutter-b" id="servicios_ventitas">
      <!--begin::Header-->

      <!--end::Header-->

      <!--begin::Body-->
      <div class="card-body pt-2">
        <div class="row">

          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cliente: </label>

              <select class="form-control" id="clientes" name="clientes">
                <option value="0">Seleccionar</option>
                @foreach($clientes as $valueclientes)
                <option value="{{ $valueclientes->id }}">{{ $valueclientes->nombre }} {{ $valueclientes->apellido_paterno }} {{ $valueclientes->apellido_materno }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Por Favor Ingrese Titulo
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Empleados: </label>
              <select class="form-control" id="empleados" name="empleados">
                <option value="0">Seleccionar</option>
                @foreach($empleados as $valueempleados)
                <option value="{{ $valueempleados->id }}">{{ $valueempleados->nombre }} {{ $valueempleados->apellido_paterno }} {{ $valueempleados->apellido_materno }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Por Favor Ingrese Titulo
              </div>
          </div>
          <div class="col-md-3">
            <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cabina: </label>
            <select class="form-control" id="cabinas" name="cabinas">
              <option value="0">Seleccionar</option>
              <option value="1">Cab 1</option>
              <option value="2">Cab 2</option>
              <option value="3">Cab 3</option>
              <option value="4">Cab 4</option>
              <option value="5">Cab 5</option>
              <option value="6">Cab 6</option>
              <option value="7">Dep 1</option>
              <option value="8">Dep 2</option>
            </select>
          </div>

          <div class="col-md-3">
            <label for="inputPassword4"  style="font-size:12px;"class="form-label">Hora: </label>
            <select class="form-control" id="horario" name="horario">
              <option value="0">Seleccionar</option>
              <option value="08:00">08:00</option>
              <option value="08:30">08:30</option>
              <option value="09:00">09:00</option>
              <option value="09:30">09:30</option>
              <option value="10:00">10:00</option>
              <option value="10:30">10:30</option>
              <option value="11:00">11:00</option>
              <option value="11:30">11:30</option>
              <option value="12:00">12:00</option>
              <option value="12:30">12:30</option>
              <option value="13:00">13:00</option>
              <option value="13:30">13:30</option>
              <option value="14:00">14:00</option>
              <option value="14:30">14:30</option>
              <option value="15:00">15:00</option>
              <option value="15:30">15:30</option>
              <option value="16:00">16:00</option>
              <option value="16:30">16:30</option>
              <option value="17:00">17:00</option>
              <option value="17:30">17:30</option>
              <option value="18:00">18:00</option>
              <option value="18:30">18:30</option>
              <option value="19:00">19:00</option>
              <!-- <option value="19:30">19:30</option> -->
            </select>
          </div>

        </div>


        <div role="separator" class="dropdown-divider"></div>
          <div class="table-responsive">
            <table class="table table-bordered table-checkable display"  style="display: none;"  id="example_list_art"></table>
              <ul id="new-list" style="display: none;list-style-type: none;" />
          </div>
      </div>

  	</div>
    <div class="card card-custom card-stretch gutter-b" id="productos_vetitas">
        <!--begin::Header-->

        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body pt-2">
          <div class="row">

            <div class="col-md-4">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cliente: </label>
                <select class="form-control" id="clientes2" name="clientes2">
                  <option value="0">Seleccionar</option>
                  @foreach($clientes as $valueclientes)
                  <option value="{{ $valueclientes->id }}">{{ $valueclientes->nombre }} {{ $valueclientes->apellido_paterno }} {{ $valueclientes->apellido_materno }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Por Favor Ingrese Titulo
                </div>
            </div>
            <div class="col-md-4">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Empleados: </label>
                <select class="form-control" id="empleados2" onchange="btnb()"  name="empleados2">
                  <option value="0">Seleccionar</option>
                  @foreach($empleados as $valueempleados)
                  <option value="{{ $valueempleados->id }}">{{ $valueempleados->nombre }} {{ $valueempleados->apellido_paterno }} {{ $valueempleados->apellido_materno }}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">
                  Por Favor Ingrese Titulo
                </div>
            </div>
            <div class="col-md-4" id="btn-scannear">
                <label for="inputPassword4"  style="font-size:12px;visibility:hidden"class="form-label">Empleados: </label>
                <br>
                <button type="button" class="btn btn-primary font-weight-bold btn-square" onclick="Este()" name="button"><i class="fas fa-barcode"></i>Scannear</button>
            </div>


          </div>


          <div role="separator" class="dropdown-divider"></div>
            <div class="table-responsive">
                <table class="table table-bordered table-checkable display"  style="display: none;"  id="example_list_art2"></table>
                  <ul id="new-list2" style="display: none;list-style-type: none;" />
            </div>
        </div>

      </div>
  </div>

  <div class="col-md-4 ">

  		<!--begin::List Widget 3-->
  <div class="card card-custom card-stretch gutter-b">

      <div class="card-body pt-2">



                  <div class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 250px; width: 100%;">
                  <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="productos_ventas" role="grid" style="margin-left: 0px; width: 100%;">
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


            <!-- <div class="dataTables_scroll">
              <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                <table class="table " id="productos_ventas" style="  width: 100%;">
                    <thead >
                        <tr style="display: block;">
                            <th style="width: 30%;float: left;">Servicio</th>
                            <th style="width: 30%;float: left;">Costo</th>
                            <th style="width: 30%;float: left;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody >
                    </tbody>
                    <tfoot style="display: block;">
                      <tr >
                      <th>Total: <h1><span id="total"></span></h1>
                      <input type="hidden" id="total_precio">
                    </th>

                    </tr>
                    </tfoot>
                </table>
              </div>
            </div> -->


      </div>
      <div class="card-footer">

        <a class="btn btn-danger font-weight-bold btn-square" onclick="cancelarventa()"><i class="fas fa-trash-alt"></i> Cancelar</a>

        <div class="btn-group">
          <div class="dropdown">
              <button class="btn btn-success font-weight-bold btn-square dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-money-check-alt"></i> Pagar
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" onclick="efectivo(1)">Efectivo</a>
                  <a class="dropdown-item" onclick="efectivo(2)">Tranferencia</a>
                  <a class="dropdown-item" onclick="efectivo(3)">Tarjeta</a>
                  <a class="dropdown-item" onclick="efectivo(4)">Point</a>
              </div>
          </div>
        </div>
          <input type="text"  class="form-control" style="width:.3px;height:.3px;" id="codigo">


      </div>

  	</div>

  </div>


  </div>
</div>

<!-- <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<div class="d-flex flex-column-fluid">

							<div class="container">

								<div class="d-flex flex-row">

									<div class="flex-row-fluid ml-lg-8 w-300px w-xl-400px">

										<div class="card card-custom card-stretch gutter-b">
											<div class="card-body">



											</div>

										</div>

									</div>

                  <div class="flex-row-fluid ml-lg-4  w-100px w-xl-200px" id="kt_profile_aside">

                    <div class="card card-custom gutter-b">

                      <div class="card-body">

                        <form>
                          <div role="separator" class="dropdown-divider"></div>


                        </form>

                      </div>

                      <div class="card-footer">

                        <a class="btn btn-danger font-weight-bold btn-square" onclick="cancelarventa()"><i class="fas fa-trash-alt"></i> Cancelar</a>

                        <div class="btn-group">
                          <div class="dropdown">
                              <button class="btn btn-success font-weight-bold btn-square dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-money-check-alt"></i> Pagar
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" onclick="efectivo(1)">Efectivo</a>
                                  <a class="dropdown-item" onclick="efectivo(2)">Tranferencia</a>
                                  <a class="dropdown-item" onclick="efectivo(3)">Tarjeta</a>
                                  <a class="dropdown-item" onclick="efectivo(4)">Mix</a>
                              </div>
                          </div>
                        </div>



                      </div>
                    </div>

                  </div>
								</div>

							</div>

						</div>

					</div> -->



          <div class="modal fade" id="agendar_cita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nueva Cita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class=" needs-validation" novalidate>
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-md-12">
                            <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha: </label>
                            <input  type="text" name="fecha_agenda"  class="form-control fecha" id="kt_datepicker" autocomplete="off"  placeholder="Fecha" required>
                            <div class="invalid-feedback">
                              Por Favor Ingrese Fecha
                            </div>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold" onclick="traerAgenda()">Agendar</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="preventas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Preventas</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i aria-hidden="true" class="ki ki-close"></i>
                      </button>
                  </div>

                  <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table" >
                        <thead>
                          <tr >
                            <th >Empleado</th>
                            <th >Servicio</th>
                            <th >Cliente</th>
                            <th >Cabina</th>
                            <th >Importe</th>
                            <th >Fecha</th>
                            <th >Acciones</th>
                          </tr>
                          </thead>
                         <tbody id="kt_datatable"></tbody>
                      </table>
                   </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                  </div>

              </div>
          </div>
      </div>

        <div class="modal fade" id="cliente_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <i aria-hidden="true" class="ki ki-close"></i>
                      </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
                          <input type="text" class="form-control" id="nombre"  placeholder="Nombre" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Nombre
                          </div>
                      </div>

                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Paterno: </label>
                          <input type="text" class="form-control" id="apellido_paterno"  placeholder="Apellido Paterno" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Apellido Paterno
                          </div>
                      </div>

                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Materno: </label>
                          <input type="text" class="form-control" id="apellido_materno"  placeholder="Apellido Materno" required>
                          <div class="invalid-feedback">
                            Por Favor Ingrese Apellido Materno
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <label for="inputPassword4"  style="font-size:12px;"class="form-label">Telefono: </label>
                          <input type="text" class="form-control" id="telefono"  placeholder="Telefono" required>
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


      <div class="modal fade" id="promocion_mensual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Promoción</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                      <div class="col-md-6 ">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Nombre de Promoción <small style="color:red;font-size:10px;">*</small></label>
                        <input type="text" class="form-control" name="nombre_promocion" placeholder="Nombre de Promoción" >
                      </div>
                      </div>
                      <div class="col-md-6 ">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Clientes</label>
                              <select class="form-control select2 select2-hidden-accessible " name="clientes_promocion" multiple="" data-placeholder="Selecciona Clientes" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                @foreach($clientes as $cliente)
                                <option class="select2-selection--multiple" value="{{ $cliente->correo_electronico }}">{{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 ">
                        <div class="form-group">
                        <label for="exampleInputPassword1">Descuentos <small style="color:red;font-size:10px;">*</small></label>
                        <div class="input-group">
                              <select class="form-control" name="descuentos_promocion">
                                <option value="">Selecciona</option>
                                @foreach($descuentos as $des)
                                <option value="{{ $des->id }}">{{ $des->descuento }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4 ">
                        <label>Fecha de Vigencia de Promoción <small style="color:red;font-size:10px;">*</small></label>
                        <div class="form-group">
                            <input type="text" class="form-control pull-right" name="reservation" id="kt_datepicker4" >
                        </div>
                      </div>


                      <div class="col-md-4 ">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Descripción <small style="color:red;font-size:10px;">* No poner comas en el texto de descripción</small></label>
                          <textarea class="form-control" rows="6" name="descripcion" placeholder="Descripción ..."></textarea>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary font-weight-bold botoncito" onclick="guardarpromocion()">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="promocion_cumpleanos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Nueva Promoción de Cumpleaños</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i aria-hidden="true" class="ki ki-close"></i>
                  </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4 ">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Clientes</label>
                        <select class="form-control select2 select2-hidden-accessible " name="clientes_promocion" multiple="" data-placeholder="Selecciona Clientes" style="width: 100%;" tabindex="-1" aria-hidden="true">
                          @foreach($clientes_cumpleanos as $cliente)
                          <option class="select2-selection--multiple" value="{{ $cliente->correo_electronico }}">{{ $cliente->nombre }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                    <div class="form-group">
                    <label for="exampleInputPassword1">Descuentos <small style="color:red;font-size:10px;">*</small></label>
                    <div class="input-group">
                      <select class="form-control" name="descuentos_promocion">
                        <option value="">Selecciona</option>
                        @foreach($descuentos as $des)
                        <option value="{{ $des->id }}">{{ $des->descuento }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

               <div class="col-md-4 ">
                  <label>Fecha de Vigencia de Promoción <small style="color:red;font-size:10px;">*</small></label>
                  <div class="form-group">
                      <input type="text" class="form-control pull-right" name="reservation" id="kt_datepicker3" >
                  </div>
                </div>
              </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary font-weight-bold botoncito" onclick="guardarpromocioncumpleanos()">Enviar</button>
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

                  <div class="row" id="pdf" style="display:none;">
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
                         <p class="centrado">¡GRACIAS POR SU COMPRA!<br>SPA VIT & LIVE</p>
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

     <div class="modal fade" id="citas_agendadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Cita</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <i aria-hidden="true" class="ki ki-close"></i>
                     </button>
                 </div>
                 <form class=" needs-validation" novalidate>
                 <div class="modal-body">

                   <div >
                     <div class="row">
                       <div class="col-md-12 ">
                         <div id="dia"></div>
                         <input type="hidden" id="dia_evento" >
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

                                 <td >{{$value->horario}}</td>
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
                 <div class="modal-footer">
                     <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                     <button type="button" class="btn btn-primary font-weight-bold" onclick="traerAgenda()">Guardar</button>
                 </div>
               </form>
             </div>
         </div>
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
                                       <select class="form-control" id="clientes_cita" name="clientes_cita">
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
                                       <select class="form-control" id="empleados_cita" name="empleados_cita">
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
                                       <select class="form-control" id="servicios_" name="servicios_">
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
                                   <textarea name="descripcion_cita" class="form-control" rows="8" cols="80"></textarea>
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

             <div class="modal fade" id="cumpleanos_mes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Cumpleaños del Mes</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <i aria-hidden="true" class="ki ki-close"></i>
                           </button>
                       </div>
                       <div class="modal-body">
                         <div id='full_calendar_events'></div>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                           <button type="button" class="btn btn-primary font-weight-bold botoncito" onclick="guardarpromocioncumpleanos()">Enviar</button>
                       </div>
                   </div>
               </div>
           </div>


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

function btnb(){
  var empleado = $('#empleados2').val()

    if (empleado == 0) {
      $('#btn-scannear').hide()
    }else{
      $('#btn-scannear').show()
    }

}

function Este(){
  $("#codigo").focus();
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

function efectivo(id){

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
    $('#productos_vetitas').hide();
    $('#clientes').val('0').trigger('change.select2');
    $('#empleados').val('0').trigger('change.select2');
    $('#cabinas').val('0').trigger('change.select2');
    $('#horario').val('0').trigger('change.select2');
  }

  //////////// TABLA SERVICIO ///////////////////////////////////
  $(function() {
    tabla = $('#example_list_art').dataTable({
      ajax: {
        url: "/ventas/articulos",
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
        $('#new-list').insertBefore('#example_list_art');
        $('#new-list').show();
      },
      "rowCallback": function( row, data ) {
        //console.log(data)



          var numero = 1;

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
            li.appendTo('#new-list');



      },
      "preDrawCallback": function( settings ) {
        // clear list before draw
        $('#new-list').empty();
      },
      language: { url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
    });
  });

////////////////////////// tabla productos ////////////////////////////////////
$(function() {
  tabla = $('#example_list_art2').dataTable({
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

    $('#clientes2').val('0').trigger('change.select2');
    $('#empleados2').val('0').trigger('change.select2');


  }



</script>


@endsection
