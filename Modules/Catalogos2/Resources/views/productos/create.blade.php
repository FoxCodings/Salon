@extends('layouts.index')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 @isset($productos) Editar @else Nuevo @endisset   Producto
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
              <input type="text" class="form-control" id="nombre" value="@isset($productos) {{ $productos->nombre }} @endisset" placeholder="Nombre" required>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Proveedor: </label>
              <select class="form-control" name="proveedor" id="proveedor">
                @isset($productos)
                <option value="{{ $productos->id_proveedor }}">{{ $productos->obtProveedor->nombre }}</option>
                @else
                <option value="">Selecciona</option>
                @endisset

                @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">
                Por Favor Ingrese Proveedor
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Stock: </label>
              <input type="text" class="form-control" id="stock" value="@isset($productos) {{ $productos->stock }} @endisset" placeholder="Stock" onkeypress='return validaNumericos(event)' required>
              <div class="invalid-feedback">
                Por Favor Ingrese Stock
              </div>
          </div>


        </div>

        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Precio Proveedor: </label>
              <input type="text" class="form-control" id="costo_provedor"  value="@isset($productos) {{ $productos->costo_provedor }} @endisset" placeholder="Costo" required onkeypress="return NumCheck(event, this)">
              <div class="invalid-feedback">
                Por Favor Ingrese Costo
              </div>
          </div>
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Precio: </label>
              <input type="text" class="form-control" id="costo" onchange="porcentaje()"  value="@isset($productos) {{ $productos->costo }} @endisset" placeholder="Costo" required onkeypress="return NumCheck(event, this)">
              <div class="invalid-feedback">
                Por Favor Ingrese Costo
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Comisión: </label>
              <input type="text" class="form-control" id="comision" disabled value="@isset($productos) {{ $productos->comision }} @endisset" placeholder="Comisión" required >
              <div class="invalid-feedback">
                Por Favor Ingrese Comisión
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Codigo de Barras: </label>
              <input type="text" class="form-control" id="codigo"  value="@isset($productos) {{ $productos->codigo }} @endisset" placeholder="Comisión" required >
              <div class="invalid-feedback">
                Por Favor Ingrese Codigo de Barras
              </div>
          </div>
        </div>
        <hr>




</div>
<div class="card-footer">

  <a href="/catalogos2/productos" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>
<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script type="text/javascript">

function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;
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

$('#costo_provedor').keypress(function (tecla) {
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

function guardar(){
  var formData = new FormData();
  //console.log('entro')
    @isset($productos)
    var id = {{$productos->id}};
    formData.append('id',{{ $productos->id }});
    @else
    var id = 0;
    formData.append('id',id);
    @endisset

    var nombre = $('#nombre').val();
    var costo = $('#costo').val();
    var comision = $('#comision').val();
    var proveedor = $('#proveedor').val();
    var stock = $('#stock').val();
    var costo_provedor = $('#costo_provedor').val();
    var codigo = $('#codigo').val();


    formData.append('nombre', nombre);
    formData.append('costo', costo);
    formData.append('comision', comision);
    formData.append('id_proveedor', proveedor);
    formData.append('stock', stock);
    formData.append('costo_provedor', costo_provedor);
  formData.append('codigo', codigo);

  if (nombre == '' ||
costo == '' ||
comision == '' ||
proveedor == '' ||
stock == '' ||
costo_provedor == '' ||
codigo == '') {
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

          }

          form.classList.add('was-validated')
        }, false)
      });

  }else {
    ///////////////////////////////////////////////////////7
    $.ajax({

           type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

           url:"{{ ( isset($productos) ) ? '/catalogos2/productos/update': '/catalogos2/productos/create' }}", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
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
                      location.href ="/catalogos2/productos";
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
                      location.href ="/catalogos2/productos";
                      $('.botoncito').show();
                    }
                })
              }else{

              }



            }
      });

    /////////////////////////////////////////////////////////
  }



}

</script>
@endsection
