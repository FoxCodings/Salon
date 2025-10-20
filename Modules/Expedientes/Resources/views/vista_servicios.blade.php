@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Carpeta de Servicios
</h3>

</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered table-checkable" id="kt_datatable">
  <thead>
    <tr>
      <th>Servicio</th>
      <th>Realizado</th>
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>
    </thead>
   <tbody></tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="expediente_nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Nuevo Clientes</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <input type="hidden" class="form-control" id="id_cliente"  value="{{$id}}">
              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Servicio: </label>
                  <select class="form-control" name="servicio" onchange="traerCosto()">
                    <option value="0">Seleccionar</option>
                    @foreach($servicios as $servicio)
                    <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                    @endforeach
                  </select>
              </div>

              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Costo: </label>
                  <input type="text" class="form-control" id="importe"  placeholder="Costo" disabled required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Apellido Materno
                  </div>
              </div>

              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo: </label>
                  <select class="form-control" name="tipo" onchange="TipoCambio()">
                    <option value="0">Seleccionar</option>
                    <option value="1">Uñas</option>
                    <option value="2">Cabello</option>
                  </select>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Formula: </label>
                  <textarea id="formula" class="form-control" rows="8" cols="80"></textarea>
              </div>

              <div class="col-md-4">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha: </label>
                  <input  type="text" name="fecha_cumpleanos"  class="form-control fecha" id="kt_datepicker2" autocomplete="off"   placeholder="Fecha" required>
                  <div class="invalid-feedback">
                    Por Favor Ingrese Fecha
                  </div>
              </div>

              <div class="col-md-4" id="cabellito">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Tipo de Cabello: </label>
                  <select class="form-control" name="tipo_cabello">
                    <option value="0">Seleccionar</option>
                    <option value="1">Corto</option>
                    <option value="2">Mediano</option>
                    <option value="3">Largo</option>
                  </select>
              </div>




            </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary font-weight-bold" onclick="guardarcliente()">Guardar</button>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript">
    $('#cabellito').hide();
    function TipoCambio(){
      var tipo =  $('select[name=tipo]').val();
      $('select[name=tipo_cabello]').val(0);
      if (tipo == 0) {
        $('#cabellito').hide();
      }else if(tipo == 1){
        $('#cabellito').hide();
      }else if(tipo == 2){
        $('#cabellito').show();
      }

    }

    function traerCosto(){
      var servicio =  $('select[name=servicio]').val();
      $.ajax({

             type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

             url:"/expedientes/TraerServicio", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
             },
              data: {
                servicio:servicio,
              },
              success:function(data){
                //console.log(data.costo)
                $('#importe').val(data.costo);
              }
        });
    }
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
            format: 'dd/mm/yyyy',
        });

        $("#kt_datepicker3").datepicker({
            language: 'es',
            format: 'dd/mm/yyyy',
        });

        $("#kt_datepicker4").datepicker({
            language: 'es',
            format: 'dd/mm/yyyy',
        });
    });

    function expedineteNuevo(){
       $('#expediente_nuevo').modal('show');
    }
    var tabla;
    $(function() {
    tabla = $('#kt_datatable').DataTable({
      processing: true,
      serverSide: true,
      order: [[0, 'desc']],
      // ajax: {
      //   url: "/expedientes/tablaCarpeta",
      //   type:'POST',
      //   data:{
      //     id:{{$id}}
      //    }
      // },
      ajax:{
            'type': 'POST',
            'headers': {'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
            'url' : '/expedientes/tablaCarpeta',
            'data':{  id:{{$id}} }
        },
      columns: [
        { data: 'nombre', name : 'nombre'},
        { data: 'nombre_empleado', name : 'nombre_empleado'},
        { data: 'fecha', name : 'fecha'},
        { data: 'acciones', name: 'acciones', searchable: false, orderable:false, width: '60px', class: 'acciones' }
      ],
      createdRow: function ( row, data, index ) {
        $(row).find('.ui.dropdown.acciones').dropdown();
      },
      language: { url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
    });
    });

    function guardarcliente(){
      var id_cliente =  $('#id_cliente').val()
      var servicio =  $('select[name=servicio]').val()
      var importe =  $('#importe').val()
      var tipo =  $('select[name=tipo]').val()
      var formula =  $('#formula').val()
      var fecha =  $('imput[name=fecha_cumpleanos]').val()
      var tipo_cabello =  $('select[name=tipo_cabello]').val()





      if (servicio == 0 || importe == '' || tipo == 0 || fecha == '') {
        Swal.fire("Ups lo Sentimos!", 'Campos Vacios', "warning");
      }else{
        $.ajax({

               type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

               url:"/expedientes/GuardarExpediente", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
               },
                data: {
                  id_cliente:id_cliente,
                  servicio:servicio,
                  importe:importe,
                  tipo:tipo,
                  formula:formula,
                  fecha:fecha,
                  tipo_cabello:tipo_cabello,
                },
                success:function(data){
                  console.log(data)

                }
          });
      }


    }

</script>
@endsection
