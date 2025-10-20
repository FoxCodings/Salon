@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 @isset($servicios_ex) Editar @else Nuevo @endisset  Servicio Especial
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
              <input type="text" class="form-control" id="nombre" value="@isset($servicios_ex) {{ $servicios_ex->nombre }} @endisset" placeholder="Nombre" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Costo: </label>
              <input type="text" class="form-control" id="costo" value="@isset($servicios_ex) {{ $servicios_ex->costo }} @endisset" placeholder="Costo" required onkeypress="return NumCheck(event, this)">
              <div class="invalid-feedback">
                Por Favor Ingrese Costo
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Comisión: </label>
              <input type="text" class="form-control" id="comision" value="@isset($servicios_ex) {{ $servicios_ex->comision }} @endisset" placeholder="Comisión" required onkeypress="return NumCheck(event, this)">
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div>


        </div>




</div>
<div class="card-footer">

  <a href="/catalogos/servicios_ex" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>
<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">

$('#costo').keypress(function (tecla) {
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

function guardar(){
  var formData = new FormData();
  //console.log('entro')
    @isset($servicios_ex)
    var id = {{$servicios_ex->id}};
    formData.append('id',{{ $servicios_ex->id }});
    @else
    var id = 0;
    formData.append('id',id);
    @endisset

    var nombre = $('#nombre').val();
    var costo = $('#costo').val();
var comision = $('#comision').val();

    formData.append('nombre', nombre);
    formData.append('costo', costo);
  formData.append('comision', comision);

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

                   url:"{{ ( isset($servicios_ex) ) ? '/catalogos/servicios_ex/update': '/catalogos/servicios_ex/create' }}", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                              location.href ="/catalogos/servicios_ex";
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
                              location.href ="/catalogos/servicios_ex";
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
