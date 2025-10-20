@extends('layouts.index')
@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 @isset($certificados) Editar @else Nuevo @endisset   Certificado
</h3>
<div class="card-toolbar">
<div class="example-tools justify-content-center">

</div>
</div>
</div>
<form class=" needs-validation" novalidate>
<div class="card-body">
        <label><strong>De:</strong></label>
        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
              <input type="text" class="form-control" id="nombre_cliente" value="@isset($certificados) {{ $certificados->nombre_cliente }} @endisset" placeholder="Nombre" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Paterno: </label>
              <input type="text" class="form-control" id="apellido_paterno_cliente" value="@isset($certificados) {{ $certificados->apellido_paterno_cliente }} @endisset" placeholder="Apellido Paterno" required >
              <div class="invalid-feedback">
                Por Favor Ingrese Costo
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Materno: </label>
              <input type="text" class="form-control" id="apellido_materno_cliente" value="@isset($certificados) {{ $certificados->apellido_materno_cliente }} @endisset" placeholder="Apellido Materno" required >
              <div class="invalid-feedback">
                Por Favor Ingrese Costo
              </div>
          </div>
        </div>
        <div role="separator" class="dropdown-divider"></div>
        <label><strong>Para:</strong></label>
        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
              <input type="text" class="form-control" id="nombre" value="@isset($certificados) {{ $certificados->nombre }} @endisset" placeholder="Nombre" required >
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Paterno: </label>
              <input type="text" class="form-control" id="apellido_paterno" value="@isset($certificados) {{ $certificados->apellido_paterno }} @endisset" placeholder="Apellido Paterno" required >
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Apellido Materno: </label>
              <input type="text" class="form-control" id="apellido_materno" value="@isset($certificados) {{ $certificados->apellido_materno }} @endisset" placeholder="Apellido Materno" required >
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Télefono: </label>
              <input type="text" class="form-control" id="telefono" value="@isset($certificados) {{ $certificados->telefono }} @endisset" placeholder="Télefono" required >
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div>
        </div>
        <div role="separator" class="dropdown-divider"></div>
        <div class="row">
          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Servicio: </label>
              <select class="form-control" id="servicios" name="servicios">
                @isset($certificados)
                <option value="{{ $certificados->id_servicios }}">{{ $certificados->obtservicioCe->nombre }}</option>
                @else
                <option value="0">Selecciona</option>
                @endisset
                @foreach($servicios as $servicio)
                <option  value="{{ $servicio->id }}">{{ $servicio->nombre }} - <?php
                if($servicio->tipo_servicio == 1){
                  echo '1 Sesión';
                }else{
                  echo 'Paquete';
                }
                ?></option>
                @endforeach
              </select>
          </div>

          <div class="col-md-6">
            <label for="inputPassword4"  style="font-size:12px;"class="form-label">Vigencia: </label>
            @isset($certificados)
            <?php

            list($dia,$mes,$anio) = explode('-',$certificados->vigencia);
            $fecha = $anio.'/'.$mes.'/'.$dia;


             ?>
             @endisset
            <input  type="text" name="vigencia"  class="form-control fecha" id="kt_datepicker" autocomplete="off" value="@isset($certificados) {{ $fecha }} @endisset"  placeholder="Fecha" required>
            <div class="invalid-feedback">
              Por Favor Ingrese Vigencia
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo: </label>
              <select class="form-control" name="tipo" id="tipo">
                @isset($certificados)
                <option value="{{ $certificados->tipo }}">
                  <?php
                  if ($certificados->tipo == 1) {
                    echo 'Mujer';
                  }else{
                    echo 'Hombre';
                  }
                  ?>
               </option>
                @else
                <option value="0">Selecciona</option>
                @endisset

                <option value="1">Mujer</option>
                <option value="2">Hombre</option>
              </select>
          </div>

          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Medidas: </label>
              <div class="form-group">
                  <div class="radio-inline">

                      <label class="radio">
                          <input type="radio" name="radios4" value="1">
                          <span></span>
                          9 x 12
                      </label>

                      <label class="radio">
                          <input type="radio" name="radios4" value="2">
                          <span></span>
                          17 x 17
                      </label>
                  </div>
              </div>
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div>
        </div>






</div>
<div class="card-footer">

  <a href="/ventas2/certificados" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>
<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">

@isset($certificados)
$(":radio[name=radios4][value="+{{$certificados->medidas}}+"]").prop('checked',true);
@endisset


$(function () {
  var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var time = today.getHours() + ":" + today.getMinutes();
    var dateTime = date+' '+time;

    $("#kt_datepicker").datepicker({
        language: 'es',
        format: 'dd/mm/yyyy',
    });

});

function guardar(){
  var formData = new FormData();
  //console.log('entro')
    @isset($certificados)
    var id = {{$certificados->id}};
    formData.append('id',{{ $certificados->id }});
    @else
    var id = 0;
    formData.append('id',id);
    @endisset


    var nombre_cliente = $('#nombre_cliente').val();
    var apellido_paterno_cliente = $('#apellido_paterno_cliente').val();
    var apellido_materno_cliente = $('#apellido_materno_cliente').val();
    var nombre = $('#nombre').val();
    var apellido_paterno = $('#apellido_paterno').val();
    var apellido_materno = $('#apellido_materno').val();
    var telefono = $('#telefono').val();
    var servicios = $('#servicios').val();
    var vigencia = $('input[name=vigencia]').val();
    var tipo = $('#tipo').val();

    var este3 = '';
    $(":radio[name=radios4]").each(function(){
    if (this.checked) {
      este3 = $(this).val();
      //console.log(este);
    }
    });


    formData.append('nombre_cliente', nombre_cliente);
    formData.append('apellido_paterno_cliente', apellido_paterno_cliente);
    formData.append('apellido_materno_cliente', apellido_materno_cliente);
    formData.append('nombre', nombre);
    formData.append('apellido_paterno', apellido_paterno);
    formData.append('apellido_materno', apellido_materno);
    formData.append('telefono', telefono);
    formData.append('servicios', servicios);
    formData.append('vigencia', vigencia);
    formData.append('tipo', tipo);
    formData.append('este3', este3);




    if (nombre_cliente == '' ||
        apellido_paterno_cliente == '' ||

        nombre == '' ||
        apellido_paterno == '' ||

        telefono == '' ||
        servicios == '' ||
        vigencia == '' ||
        tipo == '') {
      Swal.fire("Ups lo Sentimos!", 'Campos Vacios', "warning");
    }else{
      $.ajax({

             type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

             url:"{{ ( isset($certificados) ) ? '/ventas2/certificados/update': '/ventas2/certificados/create' }}", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                        location.href ="/ventas2/certificados";
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
                        location.href ="/ventas2/certificados";
                        $('.botoncito').show();
                      }
                  })
                }else{

                }



              }
        });
    }


    // // Fetch all the forms we want to apply custom Bootstrap validation styles to
    // var form = document.querySelectorAll('.needs-validation')
    // //console.log(form)
    // // Loop over them and prevent submission
    // Array.prototype.slice.call(form)
    //   .forEach(function (form) {
    //     form.addEventListener('click', function (event) {
    //       if (!form.checkValidity()) {
    //         event.preventDefault()
    //         event.stopPropagation()
    //       }else{
    //         ///////////////////////////////////////////////////////7
    //
    //
    //         /////////////////////////////////////////////////////////
    //       }
    //
    //       form.classList.add('was-validated')
    //     }, false)
    //   });


}

</script>
@endsection
