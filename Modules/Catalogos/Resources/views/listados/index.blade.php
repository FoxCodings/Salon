@extends('layouts.inicio')

@section('content')
<div class="col-md-12">
        <!--begin::List Widget 6-->
  <div class="card card-custom bg-light-success card-stretch gutter-b">
      <!--begin::Header-->
      <div class="card-header border-0">
          <h3 class="card-title font-weight-bolder text-success">Productos Faltantes</h3>
          <div class="card-toolbar">
            <a onclick="nuevoProducto()" class="btn btn-success btn-sm font-weight-normal font-size-sm ">
                Nuevo Producto
            </a>&nbsp;
            <a onclick="eliminarProducto()" class="btn btn-danger btn-sm font-weight-normal font-size-sm oragne">
                eliminar
            </a>&nbsp;
            <a href="/catalogos2/listados/descargarProductos" target="_blank" class="btn btn-primary btn-sm font-weight-normal font-size-sm oragne">
                Descargar
            </a>
          </div>
      </div>
      <!--end::Header-->

      <!--begin::Body-->
      <div class="card-body pt-0">
          <!--begin::Item-->
          <div id="listadito"></div>
          <!-- <div class="d-flex align-items-center mb-6">

              <label class="checkbox checkbox-lg checkbox-light-white flex-shrink-0 m-0 mr-4">
                  <input type="checkbox" value="1">
                  <span></span>
              </label>

              <div class="d-flex flex-column flex-grow-1 py-2">
                  <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                      Create FireStone Logo
                  </a>
                  <span class="text-muted font-weight-bold">
                      Due in 2 Days
                  </span>
              </div>

          </div> -->
          <!--end::Item-->

      </div>
      <!--end::Body-->
  </div>
  <!--end::List Widget 6-->
</div>

<div class="modal fade" id="productonuevoi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Producto Faltante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
              <input type="text" class="form-control" id="nombre"  placeholder="Nombre" required>
          </div>
          <div class="col-md-6">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cantidad: </label>
              <input type="text" class="form-control" id="cantidad"  placeholder="Nombre" onkeypress='return validaNumericos(event)' required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="guardarProducto()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#productonuevoi').modal('hide');


  function nuevoProducto(){
    $('#productonuevoi').modal('show');
  }

  $.ajax({

     type:"POST",

     url:"/catalogos2/listados/TraerProductos",
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     data:{
       id:1,
     },

      success:function(datas){
        //console.log(data)
        if (datas == '') {
          $('.oragne').hide();
        }else{
          $('.oragne').show();
          for (var i = 0; i < datas.length; i++) {

            // $('#listadito').append('<div class="d-flex align-items-center mb-6" id="checkbox_'+datas[i].id+'">'+
            $('#listadito').append('<div class="d-flex align-items-center mb-6" id="checkbox_'+datas[i].id+'">'+
                '<label class="checkbox checkbox-lg checkbox-light-white flex-shrink-0 m-0 mr-4">'+
                '<input type="checkbox"  onclick="removerchek('+datas[i].id+')" name="este_'+datas[i].id+'" value="'+datas[i].id+'">'+
                  // '<input type="checkbox" id="checkbox_" value="'+datas[i].id+'">'+
                    '<span></span>'+
                '</label>'+
                '<div class="d-flex flex-column flex-grow-1 py-2">'+
                    '<a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Nombre Producto '+
                        datas[i].nombre+
                    '</a>'+
                    '<span class="text-muted font-weight-bold">Cantidad Producto '+
                        +datas[i].cantidad+
                    '</span>'+
                '</div>'+
            '</div>');
          }
        }





        //Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });

      }


  });
var arrays = [];
var objFigura = {};
  function removerchek(id){
    var este;
    $(":checkbox[name=este_"+id+"]").each(function(){
      if (this.checked) {
          /////////////////////////////////////////////////////
        este = $(this).val();
        objFigura = {
        id : este,
        };
        arrays.push(objFigura);
      }else{
        arrays.forEach(function(x, index, object) {
         //console.log(x.id,index,id);
        //console.log(x.id == id);
        if(x.id == id){
        object.splice(index, 1);
        }
        });
      }
  });


    // var este = $('#checkbox_'+id).remove();
   //console.log(arrays)
  }

  function eliminarProducto(){

    //console.log(arrays,'entro')

    for (var i = 0; i < arrays.length; i++) {
      //console.log(arrays[i].id)
      $('#checkbox_'+arrays[i].id).remove();
    }

    $.ajax({

       type:"POST",

       url:"/catalogos2/listados/EliminarProductos",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{
         arrays:arrays,
       },

        success:function(data){
          //console.log(data)
          //Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });

        }


    });

  }

  function validaNumericos(event) {
      if(event.charCode >= 48 && event.charCode <= 57){
        return true;
       }
       return false;
  }


  function guardarProducto(){
  var nombre = $('#nombre').val();
  var cantidad = $('#cantidad').val();

    if (nombre == '' || cantidad == '') {
        Swal.fire("Lo sentimos!",'Campo(s) Vacio(s)', "warning");
    }else{
      $('#productonuevoi').modal('hide');
      $.ajax({

         type:"POST",

         url:"/catalogos2/listados/GuardarProductos",
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{
           nombre:nombre,
           cantidad:cantidad,
         },

          success:function(data){
            //console.log(data)
            $('#nombre').val('');
            $('#cantidad').val('');
            $('.oragne').show();
            $('#listadito').append('<div class="d-flex align-items-center mb-6" id="checkbox_'+data.id+'">'+
                '<label class="checkbox checkbox-lg checkbox-light-white flex-shrink-0 m-0 mr-4">'+
                  '<input type="checkbox"  onclick="removerchek('+data.id+')" name="este_'+data.id+'" value="'+data.id+'">'+
                    '<span></span>'+
                '</label>'+
                '<div class="d-flex flex-column flex-grow-1 py-2">'+
                    '<a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">Nombre Producto '+
                        data.nombre+
                    '</a>'+
                    '<span class="text-muted font-weight-bold">Cantidad Producto '+
                        +data.cantidad+
                    '</span>'+
                '</div>'+
            '</div>');



            //Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });

          }


      });
    }
  }
</script>
@endsection
