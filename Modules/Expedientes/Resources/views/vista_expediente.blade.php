@extends('layouts.index')

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
      <!-- <th>Sesión</th> -->
      <th>Fecha</th>
      <th>Acciones</th>
    </tr>
    </thead>
   <tbody></tbody>
</table>
</div>
</div>
</div>
<script type="text/javascript">
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
            'url' : '/expedientes/tablaServicios',
            'data':{  id:{{$id}},id_servicio:{{$id_servicio}} }
        },
      columns: [
        { data: 'id_servicio', name : 'id_servicio'},
        // { data: 'id_sesion', name : 'id_sesion'},
        { data: 'fecha', name : 'fecha'},
        { data: 'acciones', name: 'acciones', searchable: false, orderable:false, width: '60px', class: 'acciones' }
      ],
      createdRow: function ( row, data, index ) {
        $(row).find('.ui.dropdown.acciones').dropdown();
      },
      language: { url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
    });
    });


</script>
@endsection
