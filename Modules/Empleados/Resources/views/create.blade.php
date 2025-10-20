@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 @isset($empleados) Editar @else Nuevo @endisset   Empleado
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
              <input type="text" class="form-control" id="nombre" value="@isset($empleados) {{ $empleados->nombre }} @endisset" placeholder="Nombre" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Paterno: </label>
              <input type="text" class="form-control" id="apellido_paterno" value="@isset($empleados) {{ $empleados->apellido_paterno }} @endisset" placeholder="Apellido Paterno" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Apellido Paterno
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Materno: </label>
              <input type="text" class="form-control" id="apellido_materno" value="@isset($empleados) {{ $empleados->apellido_materno }} @endisset" placeholder="Apellido Materno" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Apellido Materno
              </div>
          </div>
        </div>

        <div class="row">

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Dirección: </label>
              <input type="text" class="form-control" id="direccion" value="@isset($empleados) {{ $empleados->direccion }} @endisset" placeholder="Dirección" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Dirección
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Telefono: </label>
              <input type="text" class="form-control" id="telefono" value="@isset($empleados) {{ $empleados->telefono }} @endisset" placeholder="Telefono" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Telefono
              </div>
          </div>



          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Sueldo: </label>
              <input  type="text" id="sueldo"  class="form-control " autocomplete="off" value="@isset($empleados) {{ $empleados->sueldo }} @endisset"  placeholder="Sueldo" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Sueldo
              </div>
          </div>


        </div>


</div>
<div class="card-footer">

  <a href="/empleados" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>
<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">

function guardar(){
  var formData = new FormData();
  //console.log('entro')
    @isset($empleados)
    var id = {{$empleados->id}};
    formData.append('id',{{ $empleados->id }});
    @else
    var id = 0;
    formData.append('id',id);
    @endisset


    var nombre = $('#nombre').val();
    var apellido_paterno = $('#apellido_paterno').val();
    var apellido_materno = $('#apellido_materno').val();
    var direccion = $('#direccion').val();
    var telefono = $('#telefono').val();
    var sueldo = $('#sueldo').val();

    formData.append('nombre', nombre);
    formData.append('apellido_paterno', apellido_paterno);
    formData.append('apellido_materno', apellido_materno);
    formData.append('direccion', direccion);
    formData.append('telefono', telefono);
    formData.append('sueldo', sueldo);



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

                   url:"{{ ( isset($empleados) ) ? '/empleados/update': '/empleados/create' }}", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                              location.href ="/empleados";
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
                              location.href ="/empleados";
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
