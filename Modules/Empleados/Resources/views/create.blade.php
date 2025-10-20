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
              <input  type="text" id="sueldo"  class="form-control " disabled autocomplete="off" value="@isset($empleados) {{ $empleados->sueldo }} @endisset"  placeholder="Sueldo" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Sueldo
              </div>
          </div>


        </div>
        <div class="row">
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Inicial Empleado: </label>
              <input  type="text" id="inicial"  class="form-control " autocomplete="off" value="@isset($empleados){{ $empleados->inicial }}@endisset"  placeholder="Inicial" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Inicial
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Dias Disponibles de Vacaciones: </label>
              <input  type="text" id="dias_vacaciones"  class="form-control " autocomplete="off" value="@isset($empleados){{ $empleados->dias_vacaciones }}@endisset"  placeholder="Inicial" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Inicial
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Semana 1: </label>
              <input  type="text" id="semana_1"  class="form-control " onchange="sueldofinal()" autocomplete="off" value="@isset($empleados){{ $empleados->semana_1 }}@endisset"  onkeypress="return NumCheck(event, this)" placeholder="Semana 1" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Sueldo de la Semana
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Semana 2: </label>
              <input  type="text" id="semana_2"  class="form-control " onchange="sueldofinal()" autocomplete="off" value="@isset($empleados){{ $empleados->semana_2 }}@endisset" onkeypress="return NumCheck(event, this)"  placeholder="Semana 2" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Sueldo de la Semana
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Sueldo: </label>
              <input  type="text" id="semana_3"  class="form-control " onchange="sueldofinal()" autocomplete="off" value="@isset($empleados){{ $empleados->semana_3 }}@endisset" onkeypress="return NumCheck(event, this)" placeholder="Semana 3" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Sueldo de la Semana
              </div>
          </div>
          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Sueldo: </label>
              <input  type="text" id="semana_4"  class="form-control " onchange="sueldofinal()" autocomplete="off" value="@isset($empleados){{ $empleados->semana_4 }}@endisset"  onkeypress="return NumCheck(event, this)" placeholder="Semana 4" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Sueldo de la Semana
              </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                  <label for="inputPassword4" style="font-size:12px;" class="form-label">Fotografia del Empleado: </label>
                  <input type="file" name="imagen" id="imagen" accept=".png, .jpg, .jpeg" @isset($alumnos) @else required @endisset>
                  <!-- <input type="file"  name="imagencita"  id="file" @isset($alumnos) @else required @endisset accept=".png, .jpg, .jpeg" >
                  <img id="imagen"  height="300" width="400"  style="display:none;" /> -->
                  <div class="invalid-feedback">
                    Por Favor Seleccione una imagen
                  </div>
              </div>
              <div class="col-md-4">
                    <label for="inputPassword4" style="font-size:12px;" class="form-label">Documento INE: </label>
                    <br>
                    <input type="file" name="imagenIne" id="imagenIne" accept=".png, .jpg, .jpeg" @isset($alumnos) @else required @endisset>
                    <!-- <input type="file"  name="imagencita"  id="file" @isset($alumnos) @else required @endisset accept=".png, .jpg, .jpeg" >
                    <img id="imagen"  height="300" width="400"  style="display:none;" /> -->
                    <div class="invalid-feedback">
                      Por Favor Seleccione una imagen
                    </div>
                </div>
              @isset($empleados)
              <div class="form-group col-sm-4">
                <img src="/storage/{{ $empleados->documento }}" alt="Card image cap" width="100" height="100" class="embed-responsive-item">
              </div>
              <div class="form-group col-sm-4">
              <img src="/storage/{{ $empleados->imagen }}" alt="Card image cap" width="100" height="100" class="embed-responsive-item">
              </div>
              @endisset
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

$('#semana_1').keypress(function (tecla) {
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

$('#semana_2').keypress(function (tecla) {
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

$('#semana_3').keypress(function (tecla) {
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

$('#semana_4').keypress(function (tecla) {
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

function sueldofinal(){

  var semana_1 = $('#semana_1').val();
  var semana_2 = $('#semana_2').val();
  var semana_3 = $('#semana_3').val();
  var semana_4 = $('#semana_4').val();

  var total_mes = parseInt(semana_1) + parseInt(semana_2) + parseInt(semana_3) + parseInt(semana_4);

   $('#sueldo').val(total_mes);
}

document.getElementById('imagen').onchange = function este(evt) {
  //////////////////////////////////////////////////////////////////
  var tgt = evt.target || window.event.srcElement, files = tgt.files;
     if (FileReader && files && files.length) {
       var fr = new FileReader(); fr.onload = function ()
       {
         document.getElementById('imagen').src = fr.result;
         var imagenes = document.getElementById('imagen').src = fr.result;
         console.log(imagenes);

       }
       fr.readAsDataURL(files[0]);
     }else { //fallback -- perhaps submit the input to an iframe and temporarily store // them on the server until the user's session ends.
     }
   }
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
    var inicial = $('#inicial').val();
    var dias_vacaciones = $('#dias_vacaciones').val();

    var imagenes = document.getElementById('imagen').src;

    var semana_1 = $('#semana_1').val();
    var semana_2 = $('#semana_2').val();
    var semana_3 = $('#semana_3').val();
    var semana_4 = $('#semana_4').val();

    var file_daimgta = $('#imagen').val();

    if (file_daimgta == '') {
    var file_data = 0;
    }else{
    var file_data = $('#imagen').prop('files')[0];
    }

    var file_daimgtaine = $('#imagenIne').val();

    if (file_daimgtaine == '') {
    var file_dataine = 0;
    }else{
    var file_dataine = $('#imagenIne').prop('files')[0];
    }

    formData.append('nombre', nombre);
    formData.append('apellido_paterno', apellido_paterno);
    formData.append('apellido_materno', apellido_materno);
    formData.append('direccion', direccion);
    formData.append('telefono', telefono);
    formData.append('sueldo', sueldo);
    formData.append('inicial', inicial);
    formData.append('imagen', file_data);
    formData.append('imagenine', file_dataine);
    formData.append('imagenes', imagenes);
    formData.append('dias_vacaciones', dias_vacaciones);



    formData.append('semana_1', semana_1);
    formData.append('semana_2', semana_2);
    formData.append('semana_3', semana_3);
    formData.append('semana_4', semana_4);


    if (nombre == '' ||
apellido_paterno == '' ||
apellido_materno == '' ||
direccion == '' ||
inicial == '' ||
telefono == '' ||
semana_1 == '' ||
semana_2 == '' ||
semana_3 == '' ||
semana_4 == '') {
      Swal.fire("Lo Sentimos!",'Campos Vacio(s)', "warning");
    }else{
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
    }


    // Fetch all the forms we want to apply custom Bootstrap validation styles to
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
