@extends('layouts.venta')
@section('content')
<style media="screen">
.testimonial-group {
  display: flex;
  width: 750px;
  overflow-x: auto;
  padding-right:12.5px;
  padding-left:12.5px;
}


/* Decorations */
table {
    width: 100%;
}

thead, tbody, tr, td, th { display: block; }

tr:after {
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

thead th {
    height: 50px;

    /*text-align: left;*/
}

tbody {
    height: 220px;
    overflow-y: auto;
}

thead {
    /* fallback */
}


tbody td, thead th {
    width: 19.2%;
    float: left;
}

</style>
<div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

      <div class="d-flex align-items-center flex-wrap mr-2">

              <!--begin::Page Title-->
              <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                  Acciones
              </h5>
              <!--end::Page Title-->
              <div class="d-flex align-items-center">
            <!--begin::Actions-->
                <a  data-toggle="modal" data-target="#cliente_nuevo" class="btn btn-clean  btn-sm font-weight-bold font-size-base mr-1">
                    Nuevo Cliente
                </a>
                <a data-toggle="modal" data-target="#agendar_cita" class="btn btn-clean btn-sm font-weight-bold font-size-base  mr-1">
                    Agendar Cita
                </a>
                <!-- <a onclick="descuentos_ya()" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">
                    Descuentos
                </a> -->



                <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">
                    Corte
                </a>
              </div>


          </div>

    </div>
</div>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Page Layout-->
								<div class="d-flex flex-row">
									<!--begin::Aside-->
									<div class="flex-column offcanvas-mobile w-200px w-xl-225px" id="kt_profile_aside">
										<!--begin::Forms Widget 15-->
										<div class="card card-custom gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<!--begin::Form-->
												<form>
													<!--begin::Categories-->
													<div class="form-group mb-11">
														<label class="font-size-h3 font-weight-bolder text-dark mb-7">Categorias</label>
														<!--begin::Checkbox list-->
														<div class="checkbox-list">
                              <div class="d-flex align-items-center mb-5">
                                <div class="font-size-lg text-dark-75 font-weight-bold"><a class="btn btn-success  btn-block" onclick="tratamientos()">Tratamientos</a></div>
                              </div>
                              <div class="d-flex align-items-center mb-5">
                                <div class="font-size-lg text-dark-75 font-weight-bold"><a class="btn btn-success  btn-block" onclick="pestanas_vista()">Pestañas y Cejas</a></div>
                              </div>
                              <div class="d-flex align-items-center mb-5">
                                <div class="font-size-lg text-dark-75 font-weight-bold"><a class="btn btn-success  btn-block" onclick="cabello_vista()">Cabello</a></div>
                              </div>
                              <div class="d-flex align-items-center mb-5">
                                <div class="font-size-lg text-dark-75 font-weight-bold"><a class="btn btn-success  btn-block" onclick="peinados_vista()">Peinado Express</a></div>
                              </div>
                              <div class="d-flex align-items-center mb-5">
                                <div class="font-size-lg text-dark-75 font-weight-bold"><a class="btn btn-success btn-block" onclick="shellac_vista()">Shellac</a></div>
                              </div>
                              <div class="d-flex align-items-center mb-5">
                                <div class="font-size-lg text-dark-75 font-weight-bold"><a class="btn btn-success btn-block" onclick="fasts_vista()">Fast Nails</a></div>
                              </div>
                              <div class="d-flex align-items-center mb-5">
                                <div class="font-size-lg text-dark-75 font-weight-bold"><a class="btn btn-success btn-block" onclick="serviciosa_vista()">Servicios Adicionales</a></div>
                              </div>
                              <div class="d-flex align-items-center mb-5">
                                <div class="font-size-lg text-dark-75 font-weight-bold"><a class="btn btn-success btn-block" onclick="servicioses_vista()">Servicios Especiales Express</a></div>
                              </div>
														</div>
														<!--end::Checkbox list-->
													</div>
													<!--end::Categories-->


												</form>
												<!--end::Form-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Forms Widget 15-->
										<!--begin::List Widget 21-->

										<!--end::List Widget 21-->
									</div>
									<!--end::Aside-->
									<!--begin::Layout-->
									<div class="flex-row-fluid ml-lg-8">
										<!--begin::Card-->
										<div class="card card-custom card-stretch gutter-b">
											<div class="card-body">
												<!--begin::Section-->





                            <div class="row">
                              <div class="col-md-6">
                                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cliente: </label>
                                  <select class="form-control" id="clientes" name="clientes">
                                    <option value="">Seleccionar</option>
                                    @foreach($clientes as $valueclientes)
                                    <option value="{{ $valueclientes->id }}">{{ $valueclientes->nombre }} {{ $valueclientes->apellido_paterno }} {{ $valueclientes->apellido_materno }}</option>
                                    @endforeach
                                  </select>
                                  <div class="invalid-feedback">
                                    Por Favor Ingrese Titulo
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Empleados: </label>
                                  <select class="form-control" id="empleados" name="empleados">
                                    <option value="">Seleccionar</option>
                                    @foreach($empleados as $valueempleados)
                                    <option value="{{ $valueempleados->id }}">{{ $valueempleados->nombre }} {{ $valueempleados->apellido_paterno }} {{ $valueempleados->apellido_materno }}</option>
                                    @endforeach
                                  </select>
                                  <div class="invalid-feedback">
                                    Por Favor Ingrese Titulo
                                  </div>
                              </div>

                            </div>
                            <div role="separator" class="dropdown-divider"></div>

                            <div id="cosas_servicios">
                              <div class="row">

                                <div class="form-group row" style="margin-top: 5px;">
                                  <!-- TRATAMINETOS-->
                                  <div  id="tratamiento_vista">
                                      <label class="font-size-h3 font-weight-bolder text-dark mb-7" style="padding-right:12.5px;padding-left:12.5px;">Servicios</label>
                                    <div class="d-flex align-items-center mb-3 testimonial-group" >
                                    <div class="row">
                                    @foreach($tratamientos as $values)
                                    <div class="col-md-3">
                                      <div class="font-size-md text-dark-75 font-weight-bold"><a class="btn btn-success font-weight-bold btn-square" onclick="agregarservicio({{$values->id}},'1')" style="font-size:11px;">{{$values->nombre}}</a></div>
                                          <br>
                                    </div>

                                    @endforeach
                                    </div>
                                    </div>

                                  </div>

                                  <!-- Pestañas y cejas-->
                                  <div  id="pestanas_vista">
                                    <label class="font-size-h3 font-weight-bolder text-dark mb-7" style="padding-right:12.5px;padding-left:12.5px;">Servicios</label>
                                    <div class="d-flex align-items-center mb-3 testimonial-group" >
                                      <div class="row">
                                    @foreach($pestanas as $values)
                                    <div class="col-md-3">
                                      <div class="font-size-md text-dark-75 font-weight-bold"><a class="btn btn-success font-weight-bold btn-square" onclick="agregarservicio({{$values->id}},'2')" style="font-size:11px;">{{$values->nombre}}</a></div>
                                        <br>
                                    </div>

                                    @endforeach
                                    </div>
                                    </div>

                                  </div>

                                  <!-- Cabello-->
                                  <div  id="cabello_vista">
                                    <label class="font-size-h3 font-weight-bolder text-dark mb-7" style="padding-right:12.5px;padding-left:12.5px;">Servicios</label>
                                    <div class="d-flex align-items-center mb-3 testimonial-group" >
                                      <div class="row">
                                    @foreach($cabellos as $values)
                                    <div class="col-md-3">
                                      <div class="font-size-md text-dark-75 font-weight-bold"><a class="btn btn-success font-weight-bold btn-square" onclick="agregarservicio({{$values->id}},'3')" style="font-size:11px;">{{$values->nombre}}</a></div>
                                      <br>
                                    </div>
                                    @endforeach
                                    </div>
                                    </div>

                                  </div>

                                  <!-- Peinados-->
                                  <div  id="peinados_vista">
                                    <label class="font-size-h3 font-weight-bolder text-dark mb-7" style="padding-right:12.5px;padding-left:12.5px;">Servicios</label>
                                    <div class="d-flex align-items-center mb-3 testimonial-group" >
                                      <div class="row">
                                    @foreach($peinados as $values)
                                    <div class="col-md-3">
                                      <div class="font-size-md text-dark-75 font-weight-bold"><a class="btn btn-success font-weight-bold btn-square" onclick="agregarservicio({{$values->id}},'4')" style="font-size:11px;">{{$values->nombre}}</a></div>
                                      <br>
                                    </div>
                                    @endforeach
                                    </div>
                                    </div>

                                  </div>

                                  <!-- shellac-->
                                  <div  id="shellac_vista">
                                    <label class="font-size-h3 font-weight-bolder text-dark mb-7" style="padding-right:12.5px;padding-left:12.5px;">Servicios</label>
                                    <div class="d-flex align-items-center mb-3 testimonial-group" >
                                      <div class="row">
                                    @foreach($shellacs as $values)
                                    <div class="col-md-3">
                                      <div class="font-size-md text-dark-75 font-weight-bold"><a class="btn btn-success font-weight-bold btn-square" onclick="agregarservicio({{$values->id}},'5')" style="font-size:11px;">{{$values->nombre}}</a></div>
                                      <br>
                                    </div>
                                    @endforeach
                                    </div>
                                    </div>

                                  </div>

                                  <!-- fast-->
                                  <div  id="fasts_vista">
                                    <label class="font-size-h3 font-weight-bolder text-dark mb-7" style="padding-right:12.5px;padding-left:12.5px;">Servicios</label>
                                    <div class="d-flex align-items-center mb-3 testimonial-group" >
                                      <div class="row">
                                    @foreach($fasts as $values)
                                    <div class="col-md-3">
                                      <div class="font-size-md text-dark-75 font-weight-bold"><a class="btn btn-success font-weight-bold btn-square" onclick="agregarservicio({{$values->id}},'6')" style="font-size:11px;">{{$values->nombre}}</a></div>
                                      <br>
                                    </div>
                                    @endforeach
                                    </div>
                                    </div>

                                  </div>

                                  <!-- servicios adicionales-->
                                  <div  id="serviciosa_vista">
                                    <label class="font-size-h3 font-weight-bolder text-dark mb-7" style="padding-right:12.5px;padding-left:12.5px;">Servicios</label>
                                    <div class="d-flex align-items-center mb-3 testimonial-group" >

                                      <div class="row">
                                    @foreach($serviciosa as $values)
                                      <div class="col-md-3">
                                        <div class="font-size-md text-dark-75 font-weight-bold"><a class="btn btn-success font-weight-bold btn-square" onclick="agregarservicio({{$values->id}},'7')" style="font-size:11px;">{{$values->nombre}}</a></div>
                                        <br>
                                      </div>
                                    @endforeach

                                      </div>
                                    </div>

                                  </div>

                                  <!-- servicios especiales-->
                                  <div  id="servicioses_vista">
                                      <label class="font-size-h3 font-weight-bolder text-dark mb-7" style="padding-right:12.5px;padding-left:12.5px;">Servicios</label>
                                    <div class="d-flex align-items-center mb-3" >
                                    @foreach($servicioses as $values)
                                    <div class="col-md-3">
                                      <div class="font-size-md text-dark-75 font-weight-bold"><a class="btn btn-success font-weight-bold btn-square" onclick="agregarservicio({{$values->id}},'8')" style="font-size:11px;">{{$values->nombre}}</a></div>
                                    </div>
                                    @endforeach
                                    </div>

                                  </div>
                                </div>

                              </div>


                              <div role="separator" class="dropdown-divider"></div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="dataTables_scroll">
                                    <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                                      <table class="table" id="productos_venta">
                                          <thead>
                                              <tr>
                                                  <th >Nombre</th>
                                                  <th >Costo</th>
                                                  <th >Cliente</th>
                                                  <th >Empleado</th>
                                                  <th >Acciones</th>
                                              </tr>
                                          </thead>
                                          <tbody >
                                          </tbody>
                                          <tfoot>
                                            <tr>
                                            <th>Total: <h1><span id="total"></span></h1>
                                            <input type="hidden" id="total_precio">
                                          </th>

                                          </tr>
                                          </tfoot>
                                      </table>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>





											</div>
                      <div class="card-footer">

                        <a class="btn btn-danger font-weight-bold btn-square" onclick="cancelarventa()"><i class="fas fa-trash-alt"></i> Cancelar</a>

                        <div class="btn-group">
                          <div class="dropdown">
                              <button class="btn btn-success font-weight-bold btn-square dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-money-check-alt"></i> Pagar
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" onclick="efectivo()">Efectivo</a>
                                  <a class="dropdown-item" onclick="tarjeta()">Tarjeta</a>
                              </div>
                          </div>
                        </div>

                        <div class="btn-group">
                          <div class="dropdown">
                              <button class="btn btn-secondary font-weight-bold btn-square dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-sort-amount-down"></i>  Descuentos
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" onclick="aplicardescuento('10')">10%</a>
                                  <a class="dropdown-item" onclick="aplicardescuento('15')">15%</a>
                                  <a class="dropdown-item" onclick="aplicardescuento('20')">20%</a>
                                  <a class="dropdown-item" onclick="aplicardescuento('25')">25%</a>
                              </div>
                          </div>
                        </div>


                      </div>
										</div>
										<!--end::Card-->
									</div>
									<!--end::Layout-->
                  <div class="flex-column offcanvas-mobile ml-lg-8 w-200px w-xl-225px descuento" id="kt_profile_aside">
                    <!--begin::Forms Widget 15-->
                    <div class="card card-custom gutter-b">
                      <!--begin::Body-->
                      <div class="card-body">
                        <!--begin::Form-->
                        <form>
                          <!--begin::Categories-->

                          <!--end::Categories-->
                          <!--begin::Prices-->
                          <div class="form-group mb-7">
                            <label class="font-size-h3 font-weight-bolder text-dark mb-7">Descuentos</label>
                            <!--begin::Radio list-->
                            <div class="radio-list">
                              <label class="radio radio-lg mb-7">
                                <input type="radio" name="price" value=".10">
                                <span></span>
                                <div class="font-size-lg text-dark-75 font-weight-bold">10%</div>
                                <!-- <div class="ml-auto text-muted font-weight-bold">2047</div> -->
                              </label>
                              <label class="radio radio-lg mb-7">
                                <input type="radio" name="price" value=".15">
                                <span></span>
                                <div class="font-size-lg text-dark-75 font-weight-bold">15%</div>
                                <!-- <div class="ml-auto text-muted font-weight-bold">1403</div> -->
                              </label>
                              <label class="radio radio-lg mb-7">
                                <input type="radio" name="price" value=".20">
                                <span></span>
                                <div class="font-size-lg text-dark-75 font-weight-bold">20%</div>
                                <!-- <div class="ml-auto text-muted font-weight-bold">570</div> -->
                              </label>
                              <label class="radio radio-lg">
                                <input type="radio" name="price" value=".25">
                                <span></span>
                                <div class="font-size-lg text-dark-75 font-weight-bold">25%</div>
                                <!-- <div class="ml-auto text-muted font-weight-bold">38</div> -->
                              </label>
                            </div>
                            <!--end::Radio list-->
                          </div>
                          <!--end::Prices-->
                          <!--begin::Price Slider-->

                          <!--end::Price Slider-->
                          <!--begin::Color-->

                        </form>
                        <!--end::Form-->
                      </div>
                      <!--end::Body-->
                    </div>
                    <!--end::Forms Widget 15-->
                    <!--begin::List Widget 21-->

                    <!--end::List Widget 21-->
                  </div>
								</div>
								<!--end::Page Layout-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>

          <div class="modal fade" id="agendar_cita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                        <div class="col-md-6">
                            <label for="inputPassword4"  style="font-size:12px;"class="form-label">Titulo: </label>
                            <input type="text" class="form-control" id="titulo"  placeholder="Titulo" required>
                            <div class="invalid-feedback">
                              Por Favor Ingrese Titulo
                            </div>
                        </div>



                        <div class="col-md-6">
                            <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha: </label>
                            <input  type="text" name="fecha_defuncion"  class="form-control fecha" id="kt_datepicker" autocomplete="off"  placeholder="Fecha" required>
                            <div class="invalid-feedback">
                              Por Favor Ingrese Fecha
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                            <label for="inputPassword4"  style="font-size:12px;"class="form-label">Descripción: </label>
                            <textarea id="descripcion" rows="8" cols="80" class="form-control" id="descripcion"></textarea>
                            <div class="invalid-feedback">
                              Por Favor Ingrese Descripción
                            </div>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary font-weight-bold" onclick="guardaragenda()">Guardar</button>
                    </div>
                  </form>
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

      <!-- EFECTIVO -->
      <div class="modal fade" id="efectivo_pago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pago Efectivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>

                <div class="modal-body">

                  <!--<div class="row">
                    <div class="col-md-12">
                      <div class="dataTables_scroll">
                        <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                          <table class="table" id="venta_efectivo">
                          <thead>
                              <tr>
                                  <th >Producto</th>
                                  <th >Precio</th>
                              </tr>
                          </thead>
                          <tbody>

                          </tbody>
                        </table>
                        </div>
                      </div>
                    </div>
                  </div>-->

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
                        <label for="inputPassword4"  style="font-size:12px;"class="form-label">Efectivo: </label>
                        <input  type="text"  class="form-control fecha" id="monto" onchange="monto_total()" autocomplete="off"  placeholder="Efectivo" required>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cambio: </label>
                      <h3> <p id="cambio_efectivo_venta"></p></h3>
                    </div>
                    <div class="col-md-6">

                    </div>
                  </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary font-weight-bold" onclick="guardarpagoefectivo()">Pagar</button>
                </div>

            </div>
        </div>
    </div>


<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">
// $('#cliente_nuevo').show();

$('#clientes').select2({
    width: '100%',
});


$('.descuento').hide();

function descuentos_ya(){
  $('.descuento').show();
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
              console.log(data.descuentos_promocion)
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

function efectivo(){

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
            '<td>'+ arrayFiguras[i].costo +'</td>'+
            '</tr>';

              $("#venta_efectivo").append(tr);

              var totales = $('#total_precio').val();

              $('#total_efectivo_venta').html('<strong>$ '+totales+'</strong>')
        }
      }
    })
}

function tarjeta(){

}

function guardarpagoefectivo(){

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

  function agregarservicio(id,modulo){

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

          var clientes = $('select[name="clientes"] option:selected').text();
          var empleados = $('select[name="empleados"] option:selected').text();

          var clientes_id = $('#clientes').val();
          var empleados_id = $('#empleados').val();

          objFigura = {
             nombre : data.nombre,
             costo : data.costo,
             comision : data.comision,
             clientes : clientes,
             empleados : empleados,
             clientes_id : clientes_id,
             empleados_id : empleados_id,
          };

          indexH = arrayFiguras.push(objFigura);
          objFigura.id = indexH;

          var tr = '<tr id="filas_lugar'+objFigura.id+'">'+
          //'<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+
          '<td><input type="hidden" id="figura_nueva" value="'+objFigura.id+'"/>'+ objFigura.nombre +'</td>'+
          '<td>'+ objFigura.costo +'</td>'+
          '<td>'+ objFigura.clientes +'</td>'+
          '<td>'+ objFigura.empleados +'</td>'+
          '<td style=" text-align: center; "><div class="btn btn-danger borrar_figura" onclick="eliminarlugar('+objFigura.id+')" ><i  class="fas fa-trash"></i></div></td>'
          '</tr>';
          $("#productos_venta").append(tr);


          var numeros = arrayFiguras,suma = 0;
          numeros.forEach (function(numero){
              // console.log(parseFloat(numero.costo))
              suma += parseFloat(numero.costo);
          });
          $('#total').html('<p> $ '+suma.toFixed(2)+'</p>');
          $('#total_precio').val(suma.toFixed(2));

        }


    });


  }

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

      if (nombre == '' || apellido_paterno == '' || apellido_materno == '' || telefono == '' || correo_electronico == '' || fecha_cumpleanos == '') {
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



                  $('#clientes').append('<option value=" ' + data.id + ' ">' + data.nombre +' '+data.apellido_paterno+' '+data.apellido_materno+ '</option>');



                }
          });

        /////////////////////////////////////////////////////////
      }


  }

  function cancelarventa(){
    //console.log('entro');
      //$('#productos_venta').load("#productos_venta");
    // $('#productos_venta').load(location.href + " #productos_venta");
    setInterval(function(){
      //$('#tablaKitchens').DataTable();
      //$('#productos_venta').load(location.href + " #productos_venta");
      $('#productos_venta').load("#productos_venta");
   }, 10000);
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

               url:"/agendas/create", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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



      // // Fetch all the forms we want to apply custom Bootstrap validation styles to
      // var form = document.querySelectorAll('.needs-validation')
      // //console.log(form)
      // // Loop over them and prevent submission
      // Array.prototype.slice.call(form)
      //   .forEach(function (form) {
      //     form.addEventListener('click', function (event) {
      //
      //
      //       form.classList.add('was-validated')
      //     }, false)
      //   });

  }


</script>
@endsection
