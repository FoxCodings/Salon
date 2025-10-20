@extends('layouts.index')

@section('content')
<div class="col-md-12">
	<div class="card card-primary">
	    <div class="card-header with-border">
	    	@isset($promocion)
	    	<h3 class="card-title">Actualizar Promoción</h3>
			@else
			<h3 class="card-title">Nueva Promoción de Cumpleaños</h3>
			@endisset
	    </div>
	    <!-- /.box-header -->
	    <!-- form start -->
	    <form role="form">
	      <div class="card-body">


	      	<div class="row">
						<div class="col-md-4 ">
							<div class="form-group">
								<label for="exampleInputPassword1">Clientes</label>
									<select class="form-control select2 select2-hidden-accessible " name="clientes_promocion" multiple="" data-placeholder="Selecciona Clientes" style="width: 100%;" tabindex="-1" aria-hidden="true">
										@foreach($clientes as $cliente)
										<option class="select2-selection--multiple" value="{{ $cliente->correo_electronico }}">{{ $cliente->nombre }}</option>
										@endforeach
									</select>
							</div>
						</div>
	      		<div class="col-md-4 ">
	      			<div class="form-group">
	      			<label for="exampleInputPassword1">Descuentos <small style="color:red;font-size:10px;">*</small></label>
    					<div class="input-group">
								<select class="form-control" name="descuentos_promocion">
									<option value="">Selecciona</option>
									@foreach($descuentos as $des)
									<option value="{{ $des->id }}">{{ $des->descuento }}</option>
									@endforeach
								</select>
              </div>
            </div>
	    		</div>

		     <div class="col-md-4 ">
		    		<label>Fecha de Vigencia de Promoción <small style="color:red;font-size:10px;">*</small></label>
		    		<div class="form-group">
                <input type="text" class="form-control pull-right" name="reservation" id="kt_datepicker" >
            </div>
		    	</div>
		    </div>

	      </div>
	      <!-- /.box-body -->
	      <div class="card-footer">
	      	<a href="/promociones2" class="btn btn-secondary">Regresar</a>

	        <button type="submit" class="btn btn-primary btn-submit botoncito"><i class="far fa-paper-plane"></i> Enviar</button>

	      </div>
	    </form>
	  </div>
</div>
<script src="/admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.6"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script>
$('.select2').select2();
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

$('.botoncito').show();


	$(document).ready( function () {
	    $(".btn-submit").click(function(e){
        e.preventDefault();

        //var nombre_promocion = $("input[name=nombre_promocion]").val();

        var clientes_promocion = $("select[name=clientes_promocion]").val();

        var descuentos_promocion = $("select[name=descuentos_promocion]").val();

        //var descripcion = $("textarea[name=descripcion]").val();

        // var radio = $('input:radio:checked').prop('checked', true);

        var fecha_vigencia = $('input[name=reservation]').val();

				$('.botoncito').hide();

		// var template = radio[0].value;

        if( descuentos_promocion == '' || clientes_promocion == '' || fecha_vigencia == ''){


					Swal.fire({
						title: "Lo Sentimos",
						text: "Campos vacios",
						icon: "warning",
					})


        }else{

        	$.ajax({

	           type:"{{ ( isset($promocion) ? 'PUT' : 'POST' ) }}",

	           url:"{{ ( isset($promocion) ) ? '/promociones2/' . $promocion->id : '/promociones2/creates' }}",
	           headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				     },
	           data:{
	           	//nombre_promocion:nombre_promocion,
      				clientes_promocion:clientes_promocion,
      				descuentos_promocion:descuentos_promocion,
      				//descripcion:descripcion,
      				// template:template,
      				fecha_vigencia:fecha_vigencia,

	           },

	            success:function(data){
	      			// Swal.fire({title: "Felicidades!", text: data.success, type: "success"}, function(){ location.href ="{{ url('promociones') }}"; } );

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
										location.href ="/promociones2";
										$('.botoncito').show();
									}
							})
	            }


	        });

        }

  });
});
</script>
@endsection
