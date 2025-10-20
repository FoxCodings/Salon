@extends('layouts.inicio')

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
              <p>{{ $clientes->nombre }} {{ $clientes->apellido_paterno }} {{ $clientes->apellido_materno }}</p>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Telefono: </label>
              <p>{{ $clientes->telefono }}</p>

          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo: </label>
              <p><?php
                if ($expedientes->tipo == 1) {
                  echo 'Uñas';
                }elseif($expedientes->tipo == 2){
                  echo 'Cabello';
                }
               ?></p>

          </div>


        </div>


        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Servicio: </label>
              <p>{{$servicios->nombre}}</p>
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
              <p>{{$servicios->costo}}</p>

          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo de Cabello: </label>
              <p><?php
                if ($expedientes->tipo_cabello == 0) {
                  echo '';
                }elseif($expedientes->tipo_cabello == 1){
                  echo 'Corto';
                }elseif($expedientes->tipo_cabello == 2){
                  echo 'Mediano';
                }elseif($expedientes->tipo_cabello == 3){
                  echo 'Largo';
                }
               ?></p>

          </div>
        </div>



        <div role="separator" class="dropdown-divider"></div>
          <!-- <p style="text-transform: uppercase;">el cliente confirma quer termina la sesion sin lesiones de ningun tipo y sabe que debera seguir las instrucciones post-tratamiento al pie de la letra.</p> -->
          <!-- <p style="text-transform: uppercase;"><strong>{{$expedientes->formula}}</strong></p> -->
          <p style="text-transform: uppercase;"><strong>{{$expedientes->id_sesion}}</strong> Sesión fecha <strong>{{$expedientes->fecha}} {{$expedientes->hora}}</strong></p>
          <p style="text-transform: uppercase;">Realizo <strong>{{$expedientes->obtEmpleadoExp->nombre}} {{$expedientes->obtEmpleadoExp->apellido_paterno}} </strong></p>
          <div role="separator" class="dropdown-divider"></div>

          <div class="row">
            <div class="col-md-4">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Formula: </label>
                <input type="text" class="form-control" id="formula" value="{{$servicios->sesiones}}" placeholder="Formula"  required>
                <div class="invalid-feedback">
                  Por Favor Ingrese Formula
                </div>
            </div>

            <div class="col-md-4">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Mililitros: </label>
                <input type="text" class="form-control" id="mililitros" value="{{$servicios->sesiones}}" placeholder="Mililitros"  required>
                <div class="invalid-feedback">
                  Por Favor Ingrese Mililitros
                </div>
            </div>

            <div class="col-md-4">
                <label for="inputPassword4"  style="font-size:12px;visibility:hidden"class="form-label">Sesiones: </label>
                <br>
                <button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
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
                            <th >Mililitros</th>
                            <th >Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="formuluira">
                      @isset($formulas)
                        @foreach($formulas as $form)
                          <tr id="fila_{{$form->id}}">
                            <td>{{$form->formula}}</td>
                            <td>{{$form->mililitros}}</td>
                            <td><button type="button" class="btn btn-danger"  onclick="eliminar({{$form->id}})"><i class="icon-xl far fa-trash-alt"></i></button> </td>
                          </tr>
                        @endforeach
                      @endisset
                    </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>


</div>
<div class="card-footer">

  <a href="/expedientes" class="btn btn-default">Regresar</a>

</div>
</form>
</div>

<script type="text/javascript">
  function guardar(){


    var id_expediente =   {{$id}};
    var id_servicio = {{$id_servicio}};
    var id_cliente = {{$id_cliente}};
    var formula = $('#formula').val();
    var mililitros = $('#mililitros').val();

    console.log(formula == '',mililitros == '')

    if (formula == '' || mililitros == '') {
      var form = document.querySelectorAll('.needs-validation')
      //console.log(form)
      // Loop over them and prevent submission
      Array.prototype.slice.call(form)
        .forEach(function (form) {
          form.addEventListener('click', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        });
    }else{
      $.ajax({

         type:"POST",

         url:"/expedientes/crearTablaformula",
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{
          id_expediente:id_expediente,
          id_servicio:id_servicio,
          id_cliente:id_cliente,
          formula:formula,
          mililitros:mililitros,
         },
          success:function(data){
            console.log(data)
            // Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });
            var tr = '<tr id="fila_'+data.id+'" >'+
                     '<td>'+ data.formula +'</td>'+
                     '<td>'+ data.mililitros +'</td>'+
                     '<td  ><button type="button" class="btn btn-danger"  onclick="eliminar('+data.id+')"><i class="icon-xl far fa-trash-alt"></i></button></td>'+
                     '</tr>';

            $("#formuluira").append(tr);
          }


      });
    }

  }

  function eliminar(id){
    $.ajax({

       type:"POST",

       url:"/expedientes/eliminarFormula",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{
        id:id,
       }
    });
        $('#fila_'+id).remove();
  }
</script>

@endsection
