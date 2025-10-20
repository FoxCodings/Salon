@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">
  Certificados
</h3>
<div class="card-toolbar">

<a href="/ventas/certificados/create" class="btn btn-primary font-weight-bolder">
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
      <th>DE</th>
      <th>Para</th>
      <th>Servicio</th>
      <th>Vigencia</th>
      <th>Tipo</th>
      <th>Estatus</th>
      <th>Acciones</th>
    </tr>
    </thead>
   <tbody></tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="efectivo_pago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><strong id="titulo_pagos"></strong> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i aria-hidden="true" class="ki ki-close"></i>
              </button>
          </div>

          <div class="modal-body">

            <div class="row" id="pdf" style="display:none;">
              <div class="col-md-12">
                <div class="ticket">
                   <img style="max-width: inherit;width: inherit;"
                       src="/cremita/img/SPA NEGRO.png"
                       alt="Logotipo" height='100',width='300'>
                   <p class="centrado" style="font-size:14px;">
                      RFC: SATH851130KP5
                     <br>Calle F.Berriozabal N° 1738 Local 2
                     <br>entre F. de la Garza esq. Col Morelos
                     <br>Cd.Victoria,Tamps. C.P. 87050
                     <br>Tel.: 834 305 13 00
                     <br>Cel.: 834 350 27 58
                     <br> <p style="font-size:12px;text-align:center;"> <?php date_default_timezone_set('America/Mexico_city');

                     if (date('m') == 1) {
                       $mes_fecha = 'ENERO';

                     }elseif(date('m') == 2){
                       $mes_fecha = 'FEBRERO';

                     }elseif(date('m') == 3){
                       $mes_fecha = 'MARZO';

                     }elseif(date('m') == 4){
                       $mes_fecha = 'ABRIL';

                     }elseif(date('m') == 5){
                       $mes_fecha = 'MAYO';

                     }elseif(date('m') == 6){
                       $mes_fecha = 'JUNIO';

                     }elseif(date('m') == 7){
                       $mes_fecha = 'JULIO';

                     }elseif(date('m') == 8){
                       $mes_fecha = 'AGOSTO';

                     }elseif(date('m') == 9){
                       $mes_fecha = 'SEPTIEMBRE';

                     }elseif(date('m') == 10){
                       $mes_fecha = 'OCTUBRE';

                     }elseif(date('m') == 11){
                       $mes_fecha = 'NOVIEMBRE';

                     }elseif(date('m') == 12){
                       $mes_fecha = 'DICIEMBRE';
                     }

                     $fechita = date('d').' '.$mes_fecha.' '.date('Y H:i:s');
                     echo $fechita;
                      ?>
                     <br>Atendio: {{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}
                     <br>Folio <small syle="font-size:10px;" id="folio_venta"></small>
                   </p>

                   </p>
                   -----------------------------
                   <table id="venta_efectivo" style="text-align:left;">
                       <thead>
                           <tr>
                               <th>SERVICIO</th>
                               <th>PRECIO</th>
                           </tr>
                       </thead>
                       <tbody>

                       </tbody>
                       <tfoot>
                        <tr>
                           <td>Total</td>
                           <td><small id="total_precio_ticket"></small></td>
                        </tr>
                        <tr>
                           <td colspan="2">----------------------------------<br><small id="numero_letra"></small></td>
                        </tr>
                        <tr>
                           <td>Efectivo</td>
                           <td><small id="pago_total_efectivo_venta2"></small></td>
                        </tr>
                        <tr>
                           <td>Cambio</td>
                           <td><small id="cambio_efectivo_venta2"></small></td>
                        </tr>
                       </tfoot>
                   </table>

                   <p class="centrado" id="tipo_pagito"></p>
                  <p class="centrado">¡GRACIAS POR SU COMPRA!<br>SPA VIT & LIVE</p>
                   <!--<p class="centrado">¡GRACIAS POR SU COMPRA!<br>SPA VIT & LIVE</p>
                  <p class="centrado">¡GRACIAS POR SU COMPRA!<br>SPA VIT & LIVE</p> -->
               </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Total: </label>
                  <h3> <p id="total_efectivo_venta"></p></h3>
              </div>
              <div class="col-md-6">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cupon de Descuento: </label>
                <input  type="text"  class="form-control fecha" id="cupon" onchange="cupon_total()" autocomplete="off"  placeholder="Cupon de Descuento" required>
              </div>
              <input type="hidden" id="total_precio" >
            </div>

            <div class="row">
              <div class="col-md-6">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label">Pago en Efectivo: </label>
                  <h3> <p id="pago_total_efectivo_venta"></p></h3>
              </div>
              <div class="col-md-6">
                  <label for="inputPassword4"  style="font-size:12px;"class="form-label" id="pago_label_tipo"> </label>
                  <input  type="text"  class="form-control fecha" id="monto" onchange="monto_total()" autocomplete="off"   required>
              </div>

            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Cambio: </label>
                <h3> <p id="cambio_efectivo_venta"></p></h3>
                <input type="hidden" id="cambio_efectivo_ventas" >
                <input type="hidden" id="tipo_pago_" >

              </div>
              <div class="col-md-6">

              </div>
            </div>



          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary font-weight-bold print" onclick="guardarpagoefectivo()">Pagar</button>
          </div>

      </div>
  </div>
</div>


<input type="hidden" id="id_preventa">
<script type="text/javascript">
    var tabla;
    $(function() {
    tabla = $('#kt_datatable').DataTable({
      processing: true,
      serverSide: true,
      order: [[0, 'desc']],
      ajax: {
        url: "/ventas/certificados/tablacertificados",
      },
      columns: [
        { data: 'nombre_cliente', name : 'nombre_cliente'},
        { data: 'nombre', name : 'nombre'},
        { data: 'id_servicios', name : 'id_servicios'},
        { data: 'vigencia', name : 'vigencia'},
        { data: 'tipo', name : 'tipo'},
        { data: 'status', name : 'status'},
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

               url:"/ventas/certificados/borrar",
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

    function pagar(id,tipo_venta){
      $('#id_preventa').val(id);
    Swal.fire({
          title: "¿Estas seguro?",
          text: "No podrás revertir esto!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Si, Pagar!"
      }).then(function(result) {
          if (result.value) {
              $('#efectivo_pago').modal('show');
            $.ajax({

               type:"POST",

               url:"/ventas/traerPreventa2",
               headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               data:{
              id:id,
               },

                success:function(data){
                  //console.log(data);
                    for (var i = 0; i < data.length; i++) {


                      var tr = '<tr id="id-figura-'+data[i].id+'">'+
                      //'<td><input type="hidden" id="figura_nueva" value="'+data[i].id+'"/>'+
                      '<td><input type="hidden" id="figura_nueva" value="'+data[i].id+'"/>Certificado de Regalo <br>'+ data[i].nombre +'</td>'+
                      '<td>$ '+ data[i].importe +'</td>'+
                      '</tr>';

                        $("#venta_efectivo").append(tr);

                        var totales = data[i].importe;

                        $('#total_efectivo_venta').html('<strong>$ '+totales+'</strong>')
                        if (tipo_venta == 1) {
                          var tipo = 'Efectivo';
                          var labels_tipo = 'Efectivo';
                        }else if(tipo_venta == 2){
                          var tipo = 'Transferencia';
                          var labels_tipo = 'Transferencia';
                        }else if(tipo_venta == 3){
                          var tipo = 'Tarjeta';
                          var labels_tipo = 'Tarjeta';
                        }else if(tipo_venta == 4){
                          var tipo = 'Point';
                          var labels_tipo = 'Point';
                        }

                        $('#total_precio').val(data[i].importe);
                        $('#tipo_pagito').html('<strong>Pago '+tipo+'</strong>');
                        $('#titulo_pagos').html('Pago '+tipo+'');
                        $('#pago_label_tipo').html(''+labels_tipo+':');
                        $('#tipo_pago_').val(tipo_venta);

                  }

                }


            });


          }
      })
    }

    function monto_total(){
      var monto = $('#monto').val();
      var totales = $('#total_precio').val();
        var total =  monto - totales;
        $('#pago_total_efectivo_venta').html('<strong>$ '+monto+'</strong>')

      $('#cambio_efectivo_venta').html('<strong>$ '+total.toFixed(2)+'</strong>')

        $('#cambio_efectivo_ventas').val(total.toFixed(2));


        $('#pago_total_efectivo_venta2').html('<strong>$ '+monto+'.00</strong>')

      $('#cambio_efectivo_venta2').html('<strong>$ '+total.toFixed(2)+'</strong>')
      $('#total_precio_ticket').html('<strong>$ '+totales+'</strong>')

    }

    function cupon_total(){
      var cupon = $('#cupon').val();


      $.ajax({

             type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

             url:"/ventas/TraerCupon", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
             headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
             },
              data:{
                cupon:cupon
              },

              success:function(data){

                if (data == '') {
                  Swal.fire({
                    title: "Lo Sentimos",
                    text: "Cupon no valido",
                    icon: "warning",
                  })
                }else{
                  //console.log(data.descuentos_promocion)
                  var totales = $('#total_precio').val();
                  var descuentos = data.descuentos_promocion/100;
                  //console.log(descuentos)

                  var total_descuento = totales * descuentos;
                  //console.log(total_descuento)

                  //console.log(total - total_descuento)
                  var total = totales - total_descuento;


                  $('#total_efectivo_venta').html('<p> $ '+total.toFixed(2)+'</p>');
                  //$('#total').html('<p> $ '+total.toFixed(2)+'</p>');
                  $('#total_precio').val(total.toFixed(2));
                }
              }
        });

    }


    function guardarpagoefectivo(){
      //console.log('entro');

      var monto = $('#monto').val();
      //var cupon = $('#cupon').val();
      var total_precio = $('#total_precio').val();
      var cambio = $('#cambio_efectivo_ventas').val();
      var tipo = $('#tipo_pago_').val();

      var id = $('#id_preventa').val();

      if( monto == '' ){


        Swal.fire({
          title: "Lo Sentimos",
          text: "Llene el campo",
          icon: "warning",
        })


      }else{
        //console.log(monto,cupon,total_precio,cambio,arrayFiguras);
        $.ajax({

           type:"POST",
           url:"/ventas/NumerosLetras",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{
            cantidad:total_precio,
           },

            success:function(data){
              //console.log(data)
              $('#numero_letra').html(''+data+' M.N');
            }


        });

        $.ajax({

           type:"POST",
           url:"/ventas/preventaPago2",
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           data:{

            monto:monto,
            //cupon:cupon,
            total_precio:total_precio,
            cambio:cambio,
            id:id,
            tipo:tipo,

           },

            success:function(data){
              //$('#Impresion_pago').modal('show');
              //console.log(data.folio_venta)
              $('#folio_venta').html(data.folio_venta);

              var ventana = window.open('', 'print', '');
              ventana.document.write('<html><head><title>Recibo</title><style>td.producto,th.producto {width: 100%;max-width: 100%;}td.cantidad,th.cantidad {width: 100%;max-width: 100%;word-break: break-all;}td.precio,th.precio {width: 100%;max-width: 100%;word-break: break-all;}.centrado {text-align: center;align-content: center;}.ticket {width: 100%;max-width: 100%;font-size: 20px;font-family: "Times New Roman";}</style>');
              ventana.document.write('</head><body >');
              ventana.document.write( document.getElementById('pdf').innerHTML );
              ventana.document.write('</body></html>');
              ventana.document.close();
              ventana.focus();
              ventana.print();
              ventana.close();
              //return true;

              var este = window.matchMedia('print').addListener((evento)=>{console.log(evento);});


              if(este == undefined){
                Swal.fire({
                  title: "Felicidades!",
                  text: data.success,
                  icon: "success",
                  buttonsStyling: false,
                  timer: 1500,
                  showConfirmButton: false,
                }).then(function(result) {
                  if (result.value == true) {

                  }else{
                    location.href ="/ventas/certificados";
                    // tabla.ajax.reload();
                    // $('#efectivo_pago').modal('hide');
                  }

                })
              }


            }


        });

      }
    }



</script>
@endsection
