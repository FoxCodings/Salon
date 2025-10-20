<!-- ///// -->
<div class=" container " id="productills">
  <div class="card card-custom example example-compact">
    <div class="card-body">
      <div class="row">

      <div class="col-md-8">
          <!--begin::List Widget 3-->

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
                      <option value="{{ $valueclientes->id }}">{{ $valueclientes->nombre }} {{ $valueclientes->apellido_paterno }} {{ $valueclientes->apellido_materno }} - {{ $valueclientes->telefono }}</option>
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
                    <button type="button" class="btn btn-primary font-weight-bold btn-square" onclick="Estea()" name="button"><i class="fas fa-barcode"></i>Scannear</button>
                </div>


              </div>

              <div class="row">
                <div class="col-md-12" id="btn-scannear2">
                    <label for="inputPassword4"  style="font-size:12px;visibility:hidden"class="form-label">Empleados: </label>
                    <input type="text"  class="form-control"  id="codigos" placeholder="Ingresa codigo  y dar enter para agregar el producto">
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
                      <a class="dropdown-item" onclick="efectivo(1,2)">Efectivo</a>
                      <a class="dropdown-item" onclick="efectivo(2,2)">Tranferencia</a>
                      <a class="dropdown-item" onclick="efectivo(3,2)">Tarjeta</a>
                      <a class="dropdown-item" onclick="efectivo(4,2)">Point</a>
                  </div>
              </div>
            </div>



          </div>

        </div>

      </div>


      </div>
    </div>
  </div>
</div>
