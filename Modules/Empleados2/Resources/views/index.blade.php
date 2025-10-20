@extends('layouts.index')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Empleados
</h3>
<div class="card-toolbar">

  <a href="/empleados2/createImagen" class="btn btn-primary font-weight-bolder font-size-sm mr-3">
    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect x="0" y="0" width="24" height="24"></rect>
          <circle fill="#000000" cx="9" cy="15" r="6"></circle>
          <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
      </g>
  </svg><!--end::Svg Icon--></span> Crear Imagen
  </a>

<a href="/empleados2/create" class="btn btn-primary font-weight-bolder font-size-sm ">
  <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <circle fill="#000000" cx="9" cy="15" r="6"></circle>
        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"></path>
    </g>
</svg><!--end::Svg Icon--></span> Nuevo
</a>

    </div>
</div>
<div class="card-body">
    <div class="table-responsive">
<table class="table table-bordered table-checkable" id="kt_datatable">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Dias / Vacaciones</th>
      <th>Telefono</th>
      <th>Sueldo</th>
      <th>Acciones</th>
    </tr>
    </thead>
   <tbody></tbody>
</table>
</div>
</div>
</div>


<div class="modal fade" id="vacacionesDias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Dias de vacaciones</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <input type="hidden" id="id_empleado" >
              <div class="col-md-6">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha Inicio: </label>
                  <input  type="text" name="fecha_inicio"  class="form-control fecha" id="kt_datepicker" autocomplete="off"  placeholder="Fecha Inicio" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Fecha
                  </div>
              </div>

              <div class="col-md-6">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha Fin: </label>
                  <input  type="text" name="fecha_fin"  class="form-control fecha" id="kt_datepicker2" autocomplete="off"  placeholder="Fecha Fin" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Fecha
                  </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" onclick="diasVacaciones()">Guardar</button>
          </div>
      </div>
  </div>
</div>


<div class="modal fade" id="ListavacacionesDias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Lista de Dias Asignados</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
              </button> -->
          </div>
          <div class="modal-body">
            <div class="row">


              <div class="col-md-12">
                <table class="table table-bordered table-checkable" >
                  <thead>
                    <tr>
                      <th>Fecha Inicio</th>
                      <th>Fehca Final</th>
                      <th>Total Dias</th>
                    </tr>
                    </thead>
                   <tbody id="tablaDias"></tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-primary font-weight-bold" onclick="borrarDta()" data-dismiss="modal">Cerrar</button>

          </div>
      </div>
  </div>
</div>



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

    var tabla;
    $(function() {
    tabla = $('#kt_datatable').DataTable({
      processing: true,
      serverSide: true,
      order: [[0, 'desc']],
      ajax: {
        url: "/empleados2/tablaempleados2",
      },
      columns: [
        { data: 'nombre', name : 'nombre'},
        { data: 'apellido_paterno', name : 'apellido_paterno'},
        { data: 'apellido_materno', name : 'apellido_materno'},
        { data: 'dias_vacaciones', name : 'dias_vacaciones'},
        { data: 'telefono', name : 'telefono'},
        { data: 'sueldo', name : 'sueldo'},
        { data: 'acciones', name: 'acciones', searchable: false, orderable:false, width: '60px', class: 'acciones' }
      ],
      createdRow: function ( row, data, index ) {
        $(row).find('.ui.dropdown.acciones').dropdown();
      },
      language: { url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
    });
    });




    function eliminar(id){

    Swal.fire({
          title: "¿Estas seguro?",
          text: "No podrás revertir esto!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, bórralo!"
      }).then(function(result) {
          if (result.value) {

            $.ajax({

               type:"Delete",

               url:"/empleados2/borrar",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data:{
              id:id,
               },

                success:function(data){
                  Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });

                }


            });


          }
      })
    }

    function vacaciones(id){
      Swal.fire({
            title: "¿Estas seguro?",
            text: "No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Asignar Dias!"
        }).then(function(result) {
            if (result.value) {

              $('#vacacionesDias').modal('show');
              $('#id_empleado').val(id);

            }
        })
    }

    function diasVacaciones(){
      var id_empleado =   $('#id_empleado').val();
      var fecha_ini = $('input[name=fecha_inicio]').val();
      var fecha_end = $('input[name=fecha_fin]').val();

      if (fecha_ini == '' || fecha_end == '') {
        Swal.fire("Lo sentimos!",'Seleccione las fechas correspondientes', "warning");
      }else{
        $.ajax({

           type:"POST",

           url:"/empleados2/GuardarDias",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{
             id_empleado:id_empleado,
             fecha_ini:fecha_ini,
             fecha_end:fecha_end,
           },

            success:function(data){

              if (data.success == 'Dias descontados exitosamente') {
                Swal.fire("Excelente!", data.success, "success").then(function(){

                  //tabla.ajax.reload();
                  $('input[name=fecha_inicio]').val('');
                  $('input[name=fecha_fin]').val('');
                  $('#vacacionesDias').modal('hide');
                  location.reload();
                });

              }else if(data.warning == 'Fuera del rango de dias'){
                Swal.fire("Excelente!", data.warning, "warning").then(function(){
                  $('input[name=fecha_inicio]').val('');
                  $('input[name=fecha_fin]').val('');
                    $('#vacacionesDias').modal('hide');
                 });
              }


            }


        });
      }

    }

    function Listavacaciones(id){
      $('#ListavacacionesDias').modal('show');
      $.ajax({

         type:"POST",

         url:"/empleados2/ListAVacaciiones",
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data:{
        id:id,
         },

          success:function(data){
            //Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });
            //console.log(data);

            for (var i = 0; i < data.length; i++) {

              var porciones = data[i].fecha_inicio.split('-');
                     //console.log(porciones[0])

                     if (porciones[1] == 1) {
                       var mes = 'Enero';
                     }else if(porciones[1] == 2){
                       var mes = 'Febrero';
                     }else if(porciones[1] == 3){
                       var mes = 'Marzo';
                     }else if(porciones[1] == 4){
                       var mes = 'Abril';
                     }else if(porciones[1] == 5){
                       var mes = 'Mayo';
                     }else if(porciones[1] == 6){
                       var mes = 'Junio';
                     }else if(porciones[1] == 7){
                       var mes = 'Julio';
                     }else if(porciones[1] == 8){
                       var mes = 'Agosto';
                     }else if(porciones[1] == 9){
                       var mes = 'Septiembre';
                     }else if(porciones[1] == 10){
                       var mes = 'Octubre';
                     }else if(porciones[1] == 11){
                       var mes = 'Noviembre';
                     }else if(porciones[1] == 12){
                       var mes = 'Diciembre';
                     }

              var dia_inicio = porciones[2]+' '+mes+' '+porciones[0];

              var porciones2 = data[i].fecha_final.split('-');
                     //console.log(porciones[0])

                     if (porciones2[1] == 1) {
                       var mes2 = 'Enero';
                     }else if(porciones2[1] == 2){
                       var mes2 = 'Febrero';
                     }else if(porciones2[1] == 3){
                       var mes2 = 'Marzo';
                     }else if(porciones2[1] == 4){
                       var mes2 = 'Abril';
                     }else if(porciones2[1] == 5){
                       var mes2 = 'Mayo';
                     }else if(porciones2[1] == 6){
                       var mes2 = 'Junio';
                     }else if(porciones2[1] == 7){
                       var mes2 = 'Julio';
                     }else if(porciones2[1] == 8){
                       var mes2 = 'Agosto';
                     }else if(porciones2[1] == 9){
                       var mes2 = 'Septiembre';
                     }else if(porciones2[1] == 10){
                       var mes2 = 'Octubre';
                     }else if(porciones2[1] == 11){
                       var mes2 = 'Noviembre';
                     }else if(porciones2[1] == 12){
                       var mes2 = 'Diciembre';
                     }

              var dia_fin = porciones2[2]+' '+mes2+' '+porciones2[0];

                //console.log(dia_inicio)
                var tr = '<tr id="id-figura-'+data[i].id+'">'+
                '<td>'+ dia_inicio +'</td>'+
                '<td>'+ dia_fin +'</td>'+
                '<td>'+ data[i].dias +'</td>'+
                '</tr>';
                 $("#tablaDias").append(tr);
            }



          }


      });
    }

    function borrarDta(){
    
      $("#tablaDias").empty();
    }


    function mostrador(id){
      Swal.fire({
            title: "¿Estas seguro?",
            text: "No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Asignar!"
        }).then(function(result) {
            if (result.value) {

              $.ajax({

                 type:"POST",

                 url:"/empleados2/Crearusuariocajero",
                 headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 data:{
                id:id,
                 },

                  success:function(data){
                    Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });

                  }


              });


            }
        })
    }

</script>
@endsection
