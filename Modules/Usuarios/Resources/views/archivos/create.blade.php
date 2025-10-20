@extends('layouts.index')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 @isset($archivos) Editar @else Nuevo @endisset   Carta
</h3>
<div class="card-toolbar">
<div class="example-tools justify-content-center">

</div>
</div>
</div>
<form class=" needs-validation" novalidate>
<div class="card-body">
        <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
                <label for="exampleInputPassword1">Empleado</label>
                <div class="input-group">
                  <select class="form-control" id="empleados" name="empleados">
                    @isset($archivos)
                    <option value="{{$archivos->id_empleado}}">{{$archivos->obtEmpleados->nombre}} {{$archivos->obtEmpleados->apellido_paterno}} {{$archivos->obtEmpleados->apellido_materno}}</option>
                    @else
                    <option value="0">Selecciona</option>
                    @endisset

                    @foreach($empleados as $empleado)
                    <option  value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido_paterno }} {{ $empleado->apellido_materno }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Años: </label>
              <input type="text" class="form-control" id="anios" value="@isset($archivos) {{ $archivos->anios }} @endisset" placeholder="Años" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Años
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Mes o Meses: </label>
              <input type="text" class="form-control" id="meses" value="@isset($archivos) {{ $archivos->meses }} @endisset" placeholder="Mes o Meses" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Mes o Meses
              </div>
          </div>


        </div>

        <div class="row">
          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo Empleado: </label>
              <select class="form-control" id="tipo_empleado" name="tipo_empleado">
                @isset($archivos)
                <option value="{{$archivos->tipo_empleado}}">Terapeuta</option>
                @else
                <option value="0">Selecciona</option>
                @endisset
                <option  value="Terapeuta">Terapeuta</option>

              </select>
              <div class="invalid-feedback">
                Por Favor Ingrese Tipo Empleado
              </div>
          </div>

          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Función: </label>
              <input type="text" class="form-control" id="funcion" value="@isset($archivos) {{ $archivos->funcion }} @endisset" placeholder="Función" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Función
              </div>
          </div>




        </div>


</div>
<div class="card-footer">

  <a href="/usuarios/archivos" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>

<script type="text/javascript">

$('#empleados').select2({
    width: '100%',
});

function guardar(){
  var formData = new FormData();
  //console.log('entro')
    @isset($archivos)
    var id = {{$archivos->id}};
    formData.append('id',{{ $archivos->id }});
    @else
    var id = 0;
    formData.append('id',id);
    @endisset

    var empleados = $('#empleados').val();
    var anios = $('#anios').val();
    var meses = $('#meses').val();
    var tipo_empleado = $('#tipo_empleado').val();
    var funcion = $('#funcion').val();

    formData.append('empleados', empleados);
    formData.append('anios', anios);
    formData.append('meses', meses);
    formData.append('tipo_empleado', tipo_empleado);
    formData.append('funcion', funcion);

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var form = document.querySelectorAll('.needs-validation')
    //console.log(form)
    // Loop over them and prevent submission
    Array.prototype.slice.call(form)
      .forEach(function (form) {
        form.addEventListener('click', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }else{
            ///////////////////////////////////////////////////////7
            $.ajax({

                   type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

                   url:"{{ ( isset($archivos) ) ? '/usuarios/archivos/update': '/usuarios/archivos/create' }}", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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

                            if (result.value == true) {

                            }else{
                              location.href ="/usuarios/archivos";
                              $('.botoncito').show();
                            }
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

                            if (result.value == true) {

                            }else{
                              location.href ="/usuarios/archivos";
                              $('.botoncito').show();
                            }
                        })
                      }else{

                      }



                    }
              });

            /////////////////////////////////////////////////////////
          }

          form.classList.add('was-validated')
        }, false)
      });


}

</script>
@endsection
