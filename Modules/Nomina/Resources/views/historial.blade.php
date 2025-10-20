@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Historial de pagos de {{$empleados->nombre}} {{$empleados->apellido_paterno}} {{$empleados->apellido_materno}}
</h3>

</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered table-checkable" id="kt_datatable">
  <thead>
    <tr>

      <th># Semana</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
      <th>Acciones</th>
    </tr>
    </thead>
   <tbody></tbody>
</table>
</div>
</div>
<div class="card-footer">

  <a href="/nomina/" class="btn btn-default">Regresar</a>


</div>
</div>
<script type="text/javascript">
    var tabla;
    $(function() {
    tabla = $('#kt_datatable').DataTable({
      processing: true,
      serverSide: true,
      order: [[0, 'desc']],
      "bDestroy": true,
      ajax:{
            'type': 'POST',
            'headers': {'X-CSRF-TOKEN':$("meta[name='csrf-token']").attr('content')},
            'url' : '/nomina/tablahistorial',
            'data':{
                      id:{{ $empleados->id }},
            }
        },
      columns: [
        { data: 'semana', name : 'semana'},
        { data: 'fecha_inicio', name : 'fecha_inicio'},
        { data: 'fecha_fin', name : 'fecha_fin'},
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

               url:"/nomina/historial/borrar",
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
