@extends('layouts.index')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 @isset($proveedores) Editar @else Nuevo @endisset   Proveedor
</h3>
<div class="card-toolbar">
<div class="example-tools justify-content-center">

</div>
</div>
</div>
<form class=" needs-validation" novalidate>
<div class="card-body">
        <div class="row">
          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
              <input type="text" class="form-control" id="nombre" value="@isset($proveedores) {{ $proveedores->nombre }} @endisset" placeholder="Nombre" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Dirección: </label>
              <input type="text" class="form-control" id="direccion" value="@isset($proveedores) {{ $proveedores->direccion }} @endisset" placeholder="Dirección" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Dirección
              </div>
          </div>


        </div>

        <div class="row">
          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Telefono: </label>
              <input type="text" class="form-control" id="telefono" value="@isset($proveedores) {{ $proveedores->telefono }} @endisset" placeholder="Telefono" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Telefono
              </div>
          </div>

          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Correo Electronico: </label>
              <input type="text" class="form-control" id="correo_electronico" value="@isset($proveedores) {{ $proveedores->correo_electronico }} @endisset" placeholder="Correo Electronico" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Correo Electronico
              </div>
          </div>




        </div>


</div>
<div class="card-footer">

  <a href="/proveedores2" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>

<script type="text/javascript">

function guardar(){
  var formData = new FormData();
  //console.log('entro')
    @isset($proveedores)
    var id = {{$proveedores->id}};
    formData.append('id',{{ $proveedores->id }});
    @else
    var id = 0;
    formData.append('id',id);
    @endisset

    var nombre = $('#nombre').val();
    var direccion = $('#direccion').val();
    var telefono = $('#telefono').val();
    var correo_electronico = $('#correo_electronico').val();

    formData.append('nombre', nombre);
    formData.append('direccion', direccion);
    formData.append('telefono', telefono);
    formData.append('correo_electronico', correo_electronico);




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

                   url:"{{ ( isset($proveedores) ) ? '/proveedores2/update': '/proveedores2/create' }}", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                              location.href ="/proveedores2";
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
                              location.href ="/proveedores2";
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
