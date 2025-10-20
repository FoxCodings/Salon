@extends('layouts.inicio')
@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Todas las Ventas
</h3>
</div>
<div class="card-body">
<table class="table table-bordered table-checkable" id="kt_datatable">
  <thead>
    <tr>
      <th>Nombre Cajera</th>
      <th>Total</th>
      <th>Monto</th>
      <th>Tipo</th>
      <th>Fecha de Pago</th>
      <th>Pago</th>
      <th>Acciones</th>
    </tr>
    </thead>
   <tbody></tbody>
</table>
</div>
</div>
<script type="text/javascript">
    var tabla;
    $(function() {
    tabla = $('#kt_datatable').DataTable({
      processing: true,
      serverSide: true,
      order: [[0, 'desc']],
      ajax: {
        url: "/ventas/tablaventas",
      },
      columns: [
        { data: 'id_usuario', name : 'id_usuario'},
        { data: 'total_venta', name : 'total_venta'},
        { data: 'monto', name : 'monto'},
        { data: 'tipo', name : 'tipo'},
        { data: 'created_at', name : 'created_at'},
        { data: 'pagado', name : 'pagado'},  
        { data: 'acciones', name: 'acciones', searchable: false, orderable:false, width: '60px', class: 'acciones' }
      ],
      createdRow: function ( row, data, index ) {
        $(row).find('.ui.dropdown.acciones').dropdown();
      },
      language: { url: "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
    });
    });




    // function eliminar(id){
    //
    // Swal.fire({
    //       title: "¿Estas seguro?",
    //       text: "No podrás revertir esto!",
    //       icon: "warning",
    //       showCancelButton: true,
    //       confirmButtonText: "Si, bórralo!"
    //   }).then(function(result) {
    //       if (result.value) {
    //
    //         $.ajax({
    //
    //            type:"Delete",
    //
    //            url:"/catalogos/servicios_ex/borrar",
    //            headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //            },
    //            data:{
    //           id:id,
    //            },
    //
    //             success:function(data){
    //               Swal.fire("Excelente!", data.success, "success").then(function(){ tabla.ajax.reload(); });
    //
    //             }
    //
    //
    //         });
    //
    //
    //       }
    //   })
    // }


</script>

@endsection
