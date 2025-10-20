@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 @isset($eventos) Editar @else Nuevo @endisset   Evento
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
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Titulo: </label>
              <input type="text" class="form-control" id="titulo" value="@isset($eventos) {{ $eventos->titulo }} @endisset" placeholder="Titulo" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Titulo
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Descripción: </label>
              <textarea id="descripcion" rows="8" cols="80" class="form-control" id="descripcion">@isset($eventos) {{ $eventos->descripcion }} @else  @endisset</textarea>
              <div class="invalid-feedback">
                Por Favor Ingrese Descripción
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha: </label>
              @isset($eventos)
              <?php

              list($dia,$mes,$anio) = explode('-',$eventos->fecha);
              $fecha = $anio.'/'.$mes.'/'.$dia;


               ?>
               @endisset
              <input  type="text" name="fecha_defuncion"  class="form-control fecha" id="kt_datepicker" autocomplete="off" value="@isset($eventos) {{ $fecha }} @endisset"  placeholder="Fecha" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Fecha
              </div>
          </div>


        </div>


</div>
<div class="card-footer">

  <a href="/agendas" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>
<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">

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
        startDate: dateTime,
        format: 'dd/mm/yyyy',
    });
});


function guardar(){
  var formData = new FormData();
  //console.log('entro')
    @isset($eventos)
    var id = {{$eventos->id}};
    formData.append('id',{{ $eventos->id }});
    @else
    var id = 0;
    formData.append('id',id);
    @endisset
    var titulo = $('#titulo').val();
    var descripcion = $('#descripcion').val();
    var fecha = $('input[name=fecha_defuncion]').val();

    formData.append('titulo', titulo);
    formData.append('descripcion', descripcion);
    formData.append('fecha', fecha);



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

                   url:"{{ ( isset($eventos) ) ? '/agendas/update': '/agendas/create' }}", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                              location.href ="/agendas";
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
                              location.href ="/agendas";
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
