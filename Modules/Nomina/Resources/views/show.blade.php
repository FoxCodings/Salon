@extends('layouts.inicio')

@section('content')
<div class="card card-custom example example-compact">
<div class="card-header">
<h3 class="card-title">

 Pago Empleado
</h3>
<div class="card-toolbar">
<div class="example-tools justify-content-center">

</div>
</div>
</div>
<form class=" needs-validation" novalidate>
<div class="card-body">
        <div class="row">
          @isset($empleados)
          <div class="col-md-4">
          <img src="/storage/{{ $empleados->imagen }}" alt="Card image cap" width="100" height="100" class="embed-responsive-item">
          </div>
          @endisset

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Nombre: </label>
              <p>@isset($empleados) {{ $empleados->nombre }} {{ $empleados->apellido_paterno }} {{ $empleados->apellido_materno }}@endisset</p>
              <div class="invalid-feedback">
                Por Favor Ingrese Nombre
              </div>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Sueldo Mensual: </label>
              <p>@isset($empleados) ${{ $empleados->sueldo }} @endisset</p>
          </div>
        </div>
        <div class="row">


          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Dirección: </label>
              <p>@isset($empleados) {{ $empleados->direccion }} @endisset</p>
          </div>

          <div class="col-md-4">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Telefono: </label>
              <p>@isset($empleados) {{ $empleados->telefono }} @endisset</p>
          </div>

        </div>

        <div role="separator" class="dropdown-divider"></div>

        <div class="row">

          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Semana: </label>
              <select class="form-control" name="semamas">
                <option value="0">Seleccionar</option>
                <option value="1">Semana 1</option>
                <option value="2">Semana 2</option>
                <option value="3">Semana 3</option>
                <option value="4">Semana 4</option>
              </select>
          </div>

          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha Inicio: </label>
              <input  type="text" name="fecha_inicio"  class="form-control fecha" id="kt_datepicker" autocomplete="off"   placeholder="Fecha Inicio" required>

          </div>

          <div class="col-md-3">
              <label for="inputPassword4"  style="font-size:12px;"class="form-label">Fecha Fin: </label>
              <input  type="text" name="fecha_fin"  class="form-control fecha" id="kt_datepicker2" autocomplete="off"  placeholder="Fecha Fin" required>
          </div>

          <div class="col-md-3">
              <label for="inputPassword4"  class="form-label" style="visibility: hidden;">Fecha Fin: </label>
              <br>
              <button type="button" name="button" class="btn btn-primary " onclick="buscar()">Buscar</button>
          </div>
        </div>
        <div id="buscador">
          <div role="separator" class="dropdown-divider"></div>
          <div class="col-md-12">
            <div class="dataTables_scroll">
              <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                <table class="table" id="pagos_comision">
                  <thead>
                    <tr>
                      <th>Servicio</th>
                      <th>Comisión</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Sueldo Semanal: </label>
                <strong id="semana"></strong>

            </div>
            <div class="col-md-4">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Total Comisión: </label>
                <strong id="comisiones"></strong>

            </div>
            <div class="col-md-4">
                <label for="inputPassword4"  style="font-size:12px;"class="form-label">Total Sueldo: </label>
                <strong id="totalito"></strong>

            </div>


          </div>


          <div class="row" id="pdf" style="display:none;">
            <div class="col-md-12">
              <div class="ticket">
                 <img style="max-width: inherit;width: inherit;"
                     src="/cremita/img/PINK AND GOLD LETRAS.png"
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
                   <br>Semana:<small id="semana_numero"></small>
                   <br>Fecha:<small id="fechas"></small>
                 </p>
                 </p>
                 -----------------------------------
                 <table id="venta_efectivo" style="text-align:left;">
                     <thead>
                         <tr>
                             <th>SERVICIO</th>
                             <th>COMISION</th>
                             <th>FECHA</th>
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
                         <td colspan="2">---------------------------------------<br><small id="numero_letra"></small></td>
                      </tr>
                      <tr>
                         <td>Sueldo Semanal</td>
                         <td><small id="sueldo_semanal"></small></td>
                      </tr>
                      <tr>
                         <td>Total Comisión</td>
                         <td><small id="total_comision"></small></td>
                      </tr>
                      <tr>
                         <td>Total Sueldo</td>
                         <td><small id="total_sueldo"></small></td>
                      </tr>
                     </tfoot>
                 </table>

                 <p class="centrado">-----------------------------------</p>
                 <p class="centrado">Empleada<br> {{ $empleados->nombre }} {{ $empleados->apellido_paterno }} {{ $empleados->apellido_materno }}</p>
                 <!-- <p class="centrado">¡GRACIAS POR SU COMPRA!<br>Gold System Vit</p>
                 <p class="centrado">¡GRACIAS POR SU COMPRA!<br>Gold System Vit</p> -->
             </div>
            </div>
          </div>
        </div>



</div>
<div class="card-footer">

  <a href="/nomina" class="btn btn-default">Regresar</a>

  <a class="btn btn-primary " onclick="guardar()">Guardar</a>
</div>
</form>
</div>

<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

<script type="text/javascript">
var arrayCosas = [];
var arrayComisiones = [];
$('#buscador').hide();
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
});


function buscar(){
  var fecha_inicio  = $("input[name=fecha_inicio]").val();
  var fecha_fin  = $("input[name=fecha_fin]").val();
  var semana  = $("select[name=semamas]").val();



  if (fecha_inicio == '' || fecha_fin == '') {
    Swal.fire({
      title: "Lo Sentimos",
      text: "Llene los campos correspondientes",
      icon: "warning",
    })
  }else{

    $.ajax({

       type:"POST",
       url:"/nomina/TrerComisionesExtras",
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       data:{
         fecha_inicio:fecha_inicio,
         fecha_fin:fecha_fin,
         semana:semana,
         id:{{$empleados->id}},
       },

        success:function(datas){
         //console.log(datas)

          var suma_cena3 = 0;
          var total3 = 0;
          var semanas3 = 0;

          for (var j = 0; j < datas.length; j++) {
            console.log(j)
            //console.log(datas[j].servicio,datas[j].comision_servicio,datas[j].created_at)

            objFiguraz = {
               servicio : datas[j].servicio,
               comision_extra : datas[j].comision_servicio,
               fecha : datas[j].created_at,
            };
            arrayComisiones.push(objFiguraz);
            //console.log(arrayComisiones)
            var tr = '<tr>'+
            '<td>'+ datas[j].servicio +'</td>'+
            '<td>$'+ datas[j].comision_servicio +'</td>'+
            '<td>'+ datas[j].created_at +'</td>'+
            '</tr>';
            $("#pagos_comision").append(tr);

            var trs = '<tr style="font-size:10px;" >'+
            //'<td><input type="hidden" id="figura_nueva" value="'+datas[j].id+'"/>'+
            '<td>'+ datas[j].servicio +'</td>'+
            '<td>$ '+ datas[j].comision_servicio +'</td>'+
            '<td>'+ datas[j].created_at +'</td>'+
            '</tr>';
            $("#venta_efectivo").append(trs);


          }

        }


    });

    $.ajax({

           type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

           url:"/nomina/BuscarPagos", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
           },
            data:{
                fecha_inicio:fecha_inicio,
                fecha_fin:fecha_fin,
                semana:semana,
                id:{{$empleados->id}}
            },
            success:function(data){
              //console.log(data)
              $('#buscador').show();

              var suma_cena2 = 0;
              var suma_cenas2 = 0;
              var total = 0;
              var semanas = 0;
              var comisiones_extra = 0;

              for (var h = 0; h < arrayComisiones.length; h++) {

                comisiones_extra += parseFloat(arrayComisiones[h].comision_extra);
                //console.log(comisiones_extra)
              }

              for (var i = 0; i < data.length; i++) {
                suma_cenas2 += parseFloat(data[i].comision);
                suma_cena2 = suma_cenas2 + comisiones_extra;

                console.log(suma_cena2,suma_cena2)

                total = suma_cena2 + parseFloat(data[i].semana);
                semanas = data[i].semana;

                $('#semana_numero').html(''+semana+'');
                $('#fechas').html(''+fecha_inicio+'-'+fecha_fin+'');

                $('#total_precio_ticket').html('$'+suma_cena2+'.00');
                $('#sueldo_semanal').html('$'+semanas+'');
                $('#total_comision').html('$'+suma_cena2+'.00');
                $('#total_sueldo').html('$'+total+'.00');

                objFigura = {
                   servicio : data[i].servicio,
                   comision : data[i].comision,
                   fecha : data[i].created_at,
                   total_semana : total,
                   total_comision : suma_cena2,
                   fecha_inicio : fecha_inicio,
                   fecha_fin : fecha_fin,
                   gana_semana : semanas,
                   semana : semana,
                   id : {{$empleados->id}},
                };

                arrayCosas.push(objFigura);



                var tr = '<tr id="filas_lugar'+data[i].id+'">'+
                '<td>'+ data[i].servicio +'</td>'+
                '<td>$'+ data[i].comision +'</td>'+
                '<td>'+ data[i].created_at +'</td>'+
                '</tr>';
                $("#pagos_comision").append(tr);






                var trs = '<tr style="font-size:10px;" id="id-figura-'+data[i].id+'">'+
                //'<td><input type="hidden" id="figura_nueva" value="'+data[i].id+'"/>'+
                '<td><input type="hidden" id="figura_nueva" value="'+data[i].id+'"/>'+ data[i].servicio +'</td>'+
                '<td>$ '+ data[i].comision +'</td>'+
                '<td>'+ data[i].created_at +'</td>'+
                '</tr>';
                $("#venta_efectivo").append(trs);





              }

              $.ajax({

                 type:"POST",
                 url:"/ventas2/NumerosLetras",
                 headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 data:{
                  cantidad:total,
                 },

                  success:function(data){
                    //console.log(data)
                    $('#numero_letra').html(''+data+' M.N');
                  }


              });

              $('#totalito').html('$'+total+'.00');
              $('#semana').html('$'+semanas+'');
              $('#comisiones').html('$'+suma_cena2+'.00');
              //console.log(total);
            }
      });
  }

}

function guardar(){
  var fecha_inicio  = $("input[name=fecha_inicio]").val();
  var fecha_fin  = $("input[name=fecha_fin]").val();
  var semana  = $("select[name=semamas]").val();

  $.ajax({

         type:"POST", //si existe esta variable anillos se va mandar put sino se manda post

         url:"/nomina/crearHistorial", //si existe colores manda la ruta de anillos el id del usario sino va mandar anillos crear
         headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//esto siempre debe ir en los ajax
         },
          data: {
            id : {{$empleados->id}},
            fecha_inicio:fecha_inicio,
            fecha_fin:fecha_fin,
            semana:semana,
            arrayCosas:arrayCosas,
            arrayComisiones:arrayComisiones,
          },
          success:function(data){
            var ventana = window.open('', 'print', '');
            ventana.document.write('<html><head><title>Recibo</title><style>td.producto,th.producto {width: 100%;max-width: 100%;}td.cantidad,th.cantidad {width: 100%;max-width: 100%;word-break: break-all;}td.precio,th.precio {width: 100%;max-width: 100%;word-break: break-all;}.centrado {text-align: center;align-content: center;}.ticket {width: 100%;max-width: 100%;height:100%;max-height:100%;font-size: 20px;font-family: "Times New Roman";}</style>');
            ventana.document.write('</head><body >');
            ventana.document.write( document.getElementById('pdf').innerHTML );
            ventana.document.write('</body></html>');
            ventana.document.close();
            ventana.focus();
            ventana.print();
            ventana.close();
            return true;

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
                  location.href ="/nomina";
                  // $('.botoncito').show();
                }

              })
            }

          }
    });
}


</script>
@endsection
