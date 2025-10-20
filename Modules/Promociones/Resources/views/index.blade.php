@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Promociones
</h3>
    <div class="card-toolbar">
        <div class="dropdown dropleft">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Nuevo
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/promociones/create">Promoción</a>
              <a class="dropdown-item" href="/promociones/createcumpleanos">Promoción Cumpleaños</a>
          </div>
      </div>
    </div>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered table-checkable" id="kt_datatable">
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Descuento %</th>
      <th>Fecha de Vigencia</th>
      <th>N° Promoción</th>
      <th>Tipo</th>
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
      ajax: {
        url: "/promociones/tablapromociones",
      },
      columns: [
        { data: 'nombre_promocion', name : 'nombre_promocion'},
        { data: 'descuentos_promocion', name : 'descuentos_promocion'},
        { data: 'fecha_final_vigencia', name : 'fecha_final_vigencia'},
        { data: 'serie_promocion', name : 'serie_promocion'},
        { data: 'template', name : 'template'},
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

               url:"/promociones/borrar",
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
