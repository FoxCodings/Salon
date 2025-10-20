@extends('layouts.index')

@section('content')
<style media="screen">

</style>
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 Expediente Cliente
</h3>
<div class="card-toolbar">
<div class="example-tools justify-content-center">

</div>
</div>
</div>
<form class=" needs-validation" novalidate>
<div class="card-body">
        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
              <input type="text" class="form-control" id="nombre" value="@isset($clientes) {{ $clientes->nombre }} @endisset" placeholder="Nombre" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Paterno: </label>
              <input type="text" class="form-control" id="apellido_paterno" value="@isset($clientes) {{ $clientes->apellido_paterno }} @endisset" placeholder="Apellido Paterno" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Apellido Paterno
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Materno: </label>
              <input type="text" class="form-control" id="apellido_materno" value="@isset($clientes) {{ $clientes->apellido_materno }} @endisset" placeholder="Apellido Materno" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Apellido Materno
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Telefono: </label>
              <input type="text" class="form-control" id="telefono" value="@isset($clientes) {{ $clientes->telefono }} @endisset" placeholder="Telefono" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Telefono
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Correo Electronico: </label>
              <input type="text" class="form-control" id="correo_electronico" value="@isset($clientes) {{ $clientes->correo_electronico }} @endisset" placeholder="Correo Electronico" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Correo Electronico
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo: </label>
              <input type="text" class="form-control" id="nombre"  value="<?php
                if ($expedientes->tipo == 1) {
                  echo 'Uñas';
                }elseif($expedientes->tipo == 2){
                  echo 'Cabello';
                }
               ?>" placeholder="Nombre" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <!-- <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha cumpleaños: </label>
              @isset($clientes)

                @if($clientes->cumpleanos == '')

                @else
                <?php

                list($dia,$mes,$anio) = explode('-',$clientes->cumpleanos);
                $fecha = $anio.'/'.$mes.'/'.$dia;


                 ?>
                 <input  type="text" name="fecha_cumpleanos"  class="form-control fecha" id="kt_datepicker" autocomplete="off" value="@isset($clientes) {{ $fecha }} @endisset" disabled  placeholder="Fecha cumpleaños" required>

                @endif

               @endisset
              <div class="invalid-feedback">
                Por Favor Ingrese Fecha
              </div>
          </div> -->


        </div>

        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Servicio: </label>
              <input type="text" class="form-control" id="nombre" value="{{$servicios->nombre}}" placeholder="Nombre" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <!-- <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Sesiones: </label>
              <input type="text" class="form-control" id="apellido_paterno" value="{{$servicios->sesiones}}" placeholder="Apellido Paterno" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Apellido Paterno
              </div>
          </div> -->

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Costo: </label>
              <input type="text" class="form-control" id="apellido_materno" value="{{$servicios->costo}}" placeholder="Apellido Materno" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Apellido Materno
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo de Cabello: </label>
              <input type="text" class="form-control" id="nombre"  value="<?php
                if ($expedientes->tipo_cabello == 0) {
                  echo '';
                }elseif($expedientes->tipo_cabello == 1){
                  echo 'Corto';
                }elseif($expedientes->tipo_cabello == 2){
                  echo 'Mediano';
                }elseif($expedientes->tipo_cabello == 3){
                  echo 'Largo';
                }
               ?>" placeholder="Tipo de cabello" disabled required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>
        </div>



        <div role="separator" class="dropdown-divider"></div>
          <!-- <p style="text-transform: uppercase;">el cliente confirma quer termina la sesion sin lesiones de ningun tipo y sabe que debera seguir las instrucciones post-tratamiento al pie de la letra.</p> -->
          <p style="text-transform: uppercase;"><strong>{{$expedientes->formula}}</strong></p>
          <p style="text-transform: uppercase;"><strong>{{$expedientes->id_sesion}}</strong> Sesión fecha <strong>{{$expedientes->fecha}} {{$expedientes->hora}}</strong></p>
          <p style="text-transform: uppercase;">Realizo <strong>{{$expedientes->obtEmpleadoExp->nombre}} {{$expedientes->obtEmpleadoExp->apellido_paterno}} </strong></p>
          <div role="separator" class="dropdown-divider"></div>

        <!-- <div class="row">
          <div class="col-md-12">
            <div class="dataTables_scroll">
              <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                <table class="table" id="productos_venta">
                    <thead>
                        <tr>
                            <th >Servicio</th>
                            <th >Costo</th>
                            <th >Fecha</th>
                        </tr>
                    </thead>
                    <tbody >

                    </tbody>
                </table>
              </div>
            </div>

          </div>
        </div> -->


</div>
<div class="card-footer">

  <a href="/expedientes" class="btn btn-default">Regresar</a>

</div>
</form>
</div>

@endsection
