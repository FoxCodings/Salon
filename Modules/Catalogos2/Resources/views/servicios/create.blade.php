@extends('layouts.index')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 @isset($servicios) Editar @else Nuevo @endisset   Servicio
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
              <input type="text" class="form-control" id="nombre" value="@isset($servicios) {{ $servicios->nombre }} @endisset" placeholder="Nombre" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>



          <!-- <div class="col-md-3 ">
              <div class="form-group">
                <label for="exampleInputPassword1">Serivicio para</label>
                  <select class="form-control" name="servicio_para" onchange="servicioparas()">
                    @isset($servicios)
                      <option value="{{$servicios->servicio_para}}">
                        <?php
                          if ($servicios->servicio_para == 1) {
                            echo 'Spa';
                          }elseif($servicios->servicio_para == 2){
                            echo 'Salón';
                          }

                         ?>
                      </option>
                    @else
                      <option value="0">Seleccionar opción</option>
                    @endisset
                    <option value="1">Spa</option>
                    <option value="2">Salón</option>
                  </select>
              </div>
          </div> -->

          <div class="col-md-4" id="salon_comision3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Costo: </label>
              <input type="text" class="form-control" id="costo" onchange="porcentaje()" value="@isset($servicios) {{ $servicios->costo }} @endisset" required placeholder="Costo" required onkeypress="return NumCheck(event, this)">
              <div class="invalid-feedback">
                Por Favor Ingrese Costo
              </div>
          </div>



          <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputPassword1">Tipo</label>
                  <select class="form-control" name="tipo" onchange="sesionests()" required>
                    @isset($servicios)
                      <option value="{{$servicios->tipo_servicio}}">{{$servicios->obtTipoServicio->nombre}}</option>
                    @else
                      <option value="0">Seleccionar opción</option>
                    @endisset
                    @foreach($tipo_servicio as $servicio)
                    <option  value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                  </select>
              </div>
          </div>


        </div>
        <div class="row">

          <div class="col-md-3 " id="salon_comision2">
              <div class="form-group">
                <label for="exampleInputPassword1">Porcentaje</label>
                  <select class="form-control" name="porcentajes" onchange="porcentajes2()" required>
                    @isset($servicios)
                      <option value="{{$servicios->porcentaje}}">
                        <?php
                          if ($servicios->porcentaje == 10) {
                            echo '10% - Uñas';
                          }elseif($servicios->porcentaje == 20){
                            echo '20% - Uñas';
                          }elseif($servicios->porcentaje == 40){
                            echo '40% - Servicio Cabello';
                          }
                         ?>
                      </option>
                    @else
                      <option value="0">Seleccionar opción</option>
                    @endisset
                    <option value="10">10% - Uñas</option>
                    <option value="20">20% - Uñas</option>
                    <option value="40">40% - Servicio Cabello</option>
                  </select>
              </div>
          </div>

          <div class="col-md-3" id="esconder_comision">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Comisión: </label>
              <input type="text" class="form-control" id="comision" disabled value="@isset($servicios) {{ $servicios->comision }} @endisset" placeholder="Comisión" required onkeypress="return NumCheck(event, this)">
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div>

          <!-- <div class="col-md-3" id="salon_comision">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Comisión: </label>
              <input type="text" class="form-control" id="comision" disabled value="@isset($servicios) {{ $servicios->comision }} @endisset" placeholder="Comisión" required onkeypress="return NumCheck(event, this)">
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div> -->


          <div class="col-md-3 " id="sesionsitas">
              <div class="form-group">
                <label for="exampleInputPassword1">Sesiones</label>
                  <select class="form-control" name="sesiones_cat">
                    @isset($servicios)
                      <option value="{{$servicios->sesiones}}">{{$servicios->sesiones}}</option>
                    @else
                      <option value="0">Seleccionar opción</option>
                    @endisset
                    @foreach($sesiones as $ses)
                    <option  value="{{ $ses->id }}">{{ $ses->numero }}</option>
                    @endforeach
                    <!-- <option  value="1">1</option>
                    <option  value="2">2</option>
                    <option  value="3">3</option>
                    <option  value="4">4</option>
                    <option  value="5">5</option>
                    <option  value="6">6</option>
                    <option  value="7">7</option>
                    <option  value="8">8</option>
                    <option  value="9">9</option>
                    <option  value="10">10</option> -->

                  </select>
              </div>
          </div>
        </div>
        <div class="row" >


        </div>




</div>
<div class="card-footer">

  <a href="/catalogos2/servicios" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>
<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">

@isset($servicios)

// servicioparas();

@else
// $('#esconder_comision').hide();
// $('#salon_comision2').hide();
// $('#salon_comision3').hide();
@endisset




function servicioparas(){

  var servicio_para = $('select[name=servicio_para]').val();
  //console.log('entro',servicio_para)
  if (servicio_para == 0) {
    $('#esconder_comision').hide();

    $('#salon_comision2').hide();
    $('#salon_comision3').hide();

    @isset($servicios)
    @else
    $('#comision').val('');
    $('#costo').val('');
    @endisset

  }else if(servicio_para == 1){
    $('#esconder_comision').show();
    $('#salon_comision2').hide();
    $('#salon_comision3').show();

    @isset($servicios)
    @else
    $('#comision').val('');
    $('#costo').val('');
    @endisset
  }else if(servicio_para == 2){
    //console.log('si entro',servicio_para)

    $('#esconder_comision').show();
    $('#salon_comision3').show();
    $('#salon_comision2').show();
    @isset($servicios)
    @else
    $('#comision').val('');
    $('#costo').val('');
    @endisset
  }

}



@isset($servicios)

  @if($servicios->tipo_servicio == 2)
  $('#sesionsitas').show();
  @else
  $('#sesionsitas').hide();
  @endif

@else
$('#sesionsitas').hide();
@endisset

function sesionests(){
  var tipo = $('select[name=tipo]').val();

  if (tipo == 2) {
    $('#sesionsitas').show();
     $('select[name=sesiones_cat]').val(0);
  }else if(tipo == 1){
    $('#sesionsitas').hide();
     $('select[name=sesiones_cat]').val(0);
  }else if(tipo == 0){
    $('#sesionsitas').hide();
    $('select[name=sesiones_cat]').val(0);
  }

}
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

function porcentaje(){
  var costo = $('#costo').val();
  var procentajillo = 10 * costo;
  var total = procentajillo / 100;
  //console.log(total)
  $('#comision').val(total);
}

function porcentajes2(){
  //console.log('entro')
  var costo = $('#costo').val();
  var porcentaje = $('select[name=porcentajes]').val();
  //console.log(costo,porcentaje)
  var procentajillo = porcentaje * costo;
  var total = procentajillo / 100;
  //console.log(total)
  $('#comision').val(total);
}

function guardar(){
  var formData = new FormData();
  //console.log('entro')
    @isset($servicios)
    var id = {{$servicios->id}};
    formData.append('id',{{ $servicios->id }});
    @else
    var id = 0;
    formData.append('id',id);
    @endisset

    var nombre = $('#nombre').val();
    var costo = $('#costo').val();
    var comision = $('#comision').val();
    var tipo = $('select[name=tipo]').val();
    var sesiones = $('select[name=sesiones_cat]').val();

    var porcentajes = $('select[name=porcentajes]').val();
    var servicio_para = 1;



    formData.append('nombre', nombre);
    formData.append('costo', costo);
    formData.append('comision', comision);
    formData.append('tipo', tipo);
    formData.append('sesiones', sesiones);

    formData.append('porcentajes', porcentajes);
    formData.append('servicio_para', servicio_para);

//     console.log(nombre,
// costo,
// comision,
// tipo,
// sesiones,
// porcentajes)

    if (nombre == '' ||
costo == '' ||
comision == '' ||
tipo == 0 ||
porcentajes == 0) {
  //Fetch all the forms we want to apply custom Bootstrap validation styles to
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
  //console.log('entro')
  ///////////////////////////////////////////////////////7
  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"{{ ( isset($servicios) ) ? '/catalogos2/servicios/update': '/catalogos2/servicios/create' }}", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                    location.href ="/catalogos2/servicios";
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
                    location.href ="/catalogos2/servicios";
                    $('.botoncito').show();
                  }
              })
            }


          }
    });

  /////////////////////////////////////////////////////////
}


    //console.log(formData)


}

</script>
@endsection
