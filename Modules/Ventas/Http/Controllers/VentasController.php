<?php

namespace Modules\Ventas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\Permisos;
use \Modules\Catalogos\Entities\Alaciados;
use \Modules\Catalogos\Entities\Cabello;
use \Modules\Catalogos\Entities\Fasts;
use \Modules\Catalogos\Entities\Peinados;
use \Modules\Catalogos\Entities\Pestanas;
use \Modules\Catalogos\Entities\ServiciosA;
use \Modules\Catalogos\Entities\ServiciosEX;
use \Modules\Catalogos\Entities\Shellac;
use \Modules\Clientes\Entities\Clientes;
use \Modules\Empleados\Entities\Empleados;
use \Modules\Promociones\Entities\Promociones;
use \Modules\Promociones\Entities\Descuentos;
use \Modules\Promociones\Entities\Cliente_Cumpleano;
use \Modules\Agendas\Entities\Eventos;
use \Modules\Ventas\Entities\Ventas;
use \Modules\Ventas\Entities\ServicioVentas;
use \Modules\Catalogos\Entities\Productos;
use \Modules\Catalogos\Entities\Servicios;
use \Modules\Ventas\Entities\Prepago;
use Luecano\NumeroALetras\NumeroALetras;
use \Modules\Agendas\Entities\Citas;
use \Modules\Agendas\Entities\Citas_diarias;
use \Modules\Ventas\Entities\Liquidar;
use \Modules\Ventas\Entities\Certificado;



class VentasController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        $this->user = Auth::user();
        return $next($request);
    });
  }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
      $anio = date('Y');
      $mes = date('m');
      $date = $anio.'-'.$mes.'-'.'01';
      $fecho = date("Y-m-t", strtotime($date));

        Cliente_Cumpleano::where([['activo',1],['modulo',1]])->delete();

        $eventos = Eventos::where([['titulo','cumpleaños']])->whereBetween('fecha', [$date, $fecho])->get();
        $cliente_id = [];
        $cliente_nombre = [];
        foreach ($eventos as $key => $value) {
        //  dd($value);

        $cliente =  Clientes::where([['activo',1],['modulo',1],['id',$value['cliente']]])->get();



        foreach ($cliente as $key => $valuecl) {



          $nombres = $valuecl->nombre.' '.$valuecl->apellido_paterno.' '.$valuecl->apellido_materno;



          $cliente_cumpleano = new Cliente_Cumpleano();
          $cliente_cumpleano->correo_electronico = $valuecl->correo_electronico;
          $cliente_cumpleano->nombre = $nombres;
          $cliente_cumpleano->modulo = 1;
          $cliente_cumpleano->save();

        }





        }
        //$data['clientes'] = [['correo_electronico' => $cliente_id, 'nombre' => $cliente_nombre]];

        $bienes_query = ("
        (SELECT * FROM cat_alaciado WHERE activo = 1 )
          UNION
          (SELECT * FROM cat_cabello WHERE activo = 1)
          UNION
          (SELECT * FROM cat_fasts WHERE activo = 1)
          UNION
          (SELECT * FROM cat_pestanas WHERE activo = 1)
          UNION
          (SELECT * FROM cat_servicios_a WHERE activo = 1)
          UNION
          (SELECT * FROM cat_servicios_ex WHERE activo = 1)
          UNION
          (SELECT * FROM cat_shellac WHERE activo = 1)

         ");
         $bienes= DB::select($bienes_query);

         $a = Alaciados::where('activo',1);
         $b = Cabello::where('activo',1);
         $c = Fasts::where('activo',1);
         $d = Peinados::where('activo',1);
         $e = Pestanas::where('activo',1);
         $f = ServiciosA::where('activo',1);
         $g = ServiciosEX::where('activo',1);
         $todo = Shellac::where('activo',1)->union($a)->union($b)->union($c)->union($d)->union($e)->union($f)->union($g)->paginate(20);
         $result = $todo;


         $a = Alaciados::where('activo',1);
         $b = Cabello::where('activo',1);
         $c = Fasts::where('activo',1);
         $d = Peinados::where('activo',1);
         $e = Pestanas::where('activo',1);
         $f = ServiciosA::where('activo',1);
         $g = ServiciosEX::where('activo',1);
         $todo = Shellac::where('activo',1)->union($a)->union($b)->union($c)->union($d)->union($e)->union($f)->union($g)->paginate(20);
         $result = $todo;


         //dd($result);
      $data['clientes_cumpleanos'] = Cliente_Cumpleano::where([['activo',1],['modulo',1]])->get();
      $data['roles'] = Roles::all();
      $data['permisos'] = Permisos::where('activo',1)->get();
      $data['tratamientos'] = Alaciados::where('activo',1)->get();
      $data['descuentos'] = Descuentos::where('activo',1)->get();
      $data['cabellos'] = Cabello::where('activo',1)->get();
      $data['fasts'] = Fasts::where('activo',1)->get();
      $data['peinados'] = Peinados::where('activo',1)->get();
      $data['pestanas'] = Pestanas::where('activo',1)->get();
      $data['serviciosa'] = ServiciosA::where('activo',1)->get();
      $data['servicioses'] = ServiciosEX::where('activo',1)->get();
      $data['shellacs'] = Shellac::where('activo',1)->get();
      //$data['clientes'] = Clientes::where([['activo',1],['modulo',1]])->get();
      $data['clientes'] = Clientes::where([['activo',1],['modulo',1],['id',1563]])->get();

      $data['empleados'] = Empleados::where([['activo',1],['modulo',1]])->get();
      $data['servicios'] = $result;


      $data['citas'] = Citas::where([['activo',1]])->get();
      $data['servicios'] = Servicios::where([['activo',1]])->get();


      $data['id_cotizadores'] = Citas_diarias::where([
        ['activo',1],
      ])->select('fecha')->groupBy('fecha')->get();

        return view('ventas::index')->with($data);
    }

    public function ConvertirLetras(Request $request){
       $formatter = new NumeroALetras();
       $formatter->conector = 'Y';
       return $formatter->toMoney($request->cantidad, 2, 'pesos', 'centavos');
     }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function agregarcliente(Request $request)
    {
      if(isset($request->fecha_cumpleanos)){
        list($dia,$mes,$anio)=explode('/',$request->fecha_cumpleanos);
        $fecha = $anio.'-'.$mes.'-'.$dia;

        $cliente = new Clientes();
        $cliente->nombre = $request->nombre;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->telefono = $request->telefono;
        $cliente->correo_electronico = $request->correo_electronico;
        $cliente->cumpleanos = $fecha;
        $cliente->modulo = 1;
        $cliente->cve_usuario = Auth::user()->id;
        $cliente->save();
      }else{
        $cliente = new Clientes();
        $cliente->nombre = $request->nombre;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->telefono = $request->telefono;
        $cliente->correo_electronico = $request->correo_electronico;
        //$cliente->cumpleanos = $fecha;
        $cliente->modulo = 1;
        $cliente->cve_usuario = Auth::user()->id;
        $cliente->save();
      }


      return $cliente;
    }

    public function traerProducto(Request $request){
      //dd($request->all());
      // if ($request->modulo == 1) {
      //   $modulo = Alaciados::find($request->id);
      // }else if($request->modulo == 5){
      //   $modulo = Pestanas::find($request->id);
      //
      // }else if($request->modulo == 2){
      //     $modulo = Cabello::find($request->id);
      // }else if($request->modulo == 4){
      //   $modulo = Peinados::find($request->id);
      // }else if($request->modulo == 8){
      //   $modulo = Shellac::find($request->id);
      //
      // }else if($request->modulo == 3){
      //   $modulo = Fasts::find($request->id);
      //
      // }else if($request->modulo == 6){
      //   $modulo = ServiciosA::find($request->id);
      //
      // }else if($request->modulo == 7){
      //   $modulo = ServiciosEX::find($request->id);
      //
      // }

      // if ($request->modulo == 1) {
      //   $modulo = Servicios::find($request->id);
      // }else if($request->modulo == 2){
        $modulo = Productos::find($request->id);
      // }


      return $modulo;

    }

    public function TraerCupon(Request $request){
      try {
        $cupon = Promociones::where([
          ['activo',1],
          ['serie_promocion',$request->cupon]
        ])->first();

        return $cupon;
      } catch (\Exception $e) {

      }

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
      try {
        //dd($request->all());
        date_default_timezone_set('America/Mexico_city');
        if($request->cupon == ''){
          $cupon = 0;
        }else{
          $cupon = $request->cupon;
        }

        $ventas = new Ventas();
        $ventas->id_usuario =  Auth::user()->id;
        $ventas->total_venta = $request->total_precio;
        $ventas->descuento = $cupon;
        $ventas->tipo = $request->tipo;
        $ventas->cambio = $request->cambio;
        $ventas->monto = $request->monto;
        $ventas->id_cita = $request->servicio_id;
        $ventas->modulo = 1;
        $ventas->pagado = 1;
        $ventas->cve_usuario = Auth::user()->id;
        $ventas->save();

        $ventas2 = Ventas::find($ventas->id);
        $ventas2->folio_venta =  $ventas->id;
        $ventas2->save();


        if ($request->tipe == 1) {
          $citas = Citas_diarias::find($request->servicio_id);

          $citas_existentes = Citas_diarias::where([
            ['empleado',$citas->empleado],
            ['cliente',$citas->cliente],
            ['fecha',$citas->fecha],
            ['status',$citas->status],
            ['descripcion',$citas->descripcion],
          ])->update([
            'pagado' => 1
          ]);

        }

        //dd($ventas2);


        foreach ($request->arrayFiguras as $key => $value) {
          //dd($value['id_modulo'] == 1);



          if ($value['id_modulo'] == 1) {
            //dd($value['nombre'],$value['id_proser']);
            $servicios =  new ServicioVentas();
            $servicios->id_venta = $ventas->id;
            $servicios->id_cliente = $value['clientes_id'];
            $servicios->cliente = $value['clientes'];
            $servicios->id_empleado = $value['empleados_id'];
            $servicios->empleado = $value['empleados'];
            $servicios->servicio = $value['nombre'];
            $servicios->costo_servicio = $value['costo'];
            $servicios->comision = $value['comision'];
            $servicios->cve_usuario = Auth::user()->id;
            $servicios->save();

            $existe_producto = Productos::where([['id',$value['id_proser'],['activo',1]]])->first();
            //dd($existe_producto);
            if (isset($existe_producto)) {
              $productos = Productos::find($value['id_proser']);
              $cantidad = $productos->stock - 1;

              $productos = Productos::find($value['id_proser']);
              $productos->stock = $cantidad;
              $productos->save();
            }



          }else{
            $servicios =  new ServicioVentas();
            $servicios->id_venta = $ventas->id;
            $servicios->id_cliente = $value['clientes_id'];
            $servicios->cliente = $value['clientes'];
            $servicios->id_empleado = $value['empleados_id'];
            $servicios->empleado = $value['empleados'];
            $servicios->servicio = $value['nombre'];
            $servicios->costo_servicio = $value['costo'];
            $servicios->comision = $value['comision'];
            $servicios->fecha = $value['fecha'];
            $servicios->cabinas = $value['cabinas_id'];
            $servicios->horarios = $value['horarios'];
            $servicios->cve_usuario = Auth::user()->id;
            $servicios->save();

            $existe_producto = Productos::where([['id',$value['id_proser'],['activo',1]]])->first();
            //dd($existe_producto);
            if (isset($existe_producto)) {
              $productos = Productos::find($value['id_proser']);
              $cantidad = $productos->stock - 1;

              $productos = Productos::find($value['id_proser']);
              $productos->stock = $cantidad;
              $productos->save();
            }
          }



        }

      //return response()->json(['success'=>'Se ha Pagado con Exito']);
      return response()->json(['success'=>'Se ha Pagado con Exito','folio_venta' => $ventas2->folio_venta]);



      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function ver_ventas()
    {
        return view('ventas::ver_ventas');
    }

    public function show_venta($id)
    {
        $data['ventas'] = Ventas::find($id);


        $data['servicios'] = ServicioVentas::where([['activo',1],['id_venta',$id]])->get();
        $svent = ServicioVentas::where([['activo',1],['id_venta',$id]])->first();
        //dd($svent);
        $data['cita'] = Citas_diarias::find($data['ventas']->id_cita);
        $data['ebs'] = $svent;
        //dd($data['cita']);
        return view('ventas::show_venta')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ventas::edit');
    }

    public function preventas()
    {
        return view('ventas::preventas');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function tablaventas()
    {
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Ventas::select(
        't_ventas.id',
        't_ventas.id_usuario',
        't_ventas.total_venta',
        't_ventas.monto',
        't_ventas.tipo',
        't_ventas.pagado as Pago',
        't_calendario_citas.pagado',
        't_ventas.created_at',
        't_cat_ventas.empleado',
        )->join('t_cat_ventas','t_cat_ventas.id_venta','t_ventas.id')->leftjoin('t_calendario_citas','t_calendario_citas.id','t_ventas.id_cita')->where([['t_ventas.activo', 1],['t_ventas.modulo',1]])->groupBy('t_ventas.id')->orderby('t_ventas.created_at','ASC')->get(); //user es una entidad que se trae desde la app
        //dd($registros);
      $datatable = DataTables::of($registros)
      ->editColumn('id_usuario', function ($registros) {

      return $registros->obtusuario->nombre.' '.$registros->obtusuario->apellido_paterno.' '.$registros->obtusuario->apellido_materno;

      })
      ->editColumn('pagado', function ($registros) {

        if (isset($registros->pagado)) {
          if ($registros->pagado == 1) {
            $este = 'PAGADO';
          }else{
            $este = 'SIN PAGAR';
          }
        }else{
          if ($registros->Pago != '') {
            $este = 'PAGADO';
          }else{
            $este = 'SIN DATOS';
          }
          //$este = 'SIN DATOS';
        }



      return $este;

      })
      ->editColumn('created_at', function ($registros) {

        list($fecha,$hora) = explode(' ',$registros->created_at);

        list($anio,$mes,$dia) = explode('-',$fecha);

        if ($mes == 1) {
          $mes_fecha = 'ENERO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 2){
          $mes_fecha = 'FEBRERO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 3){
          $mes_fecha = 'MARZO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 4){
          $mes_fecha = 'ABRIL';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 5){
          $mes_fecha = 'MAYO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 6){
          $mes_fecha = 'JUNIO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 7){
          $mes_fecha = 'JULIO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 8){
          $mes_fecha = 'AGOSTO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 9){
          $mes_fecha = 'SEPTIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 10){
          $mes_fecha = 'OCTUBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 11){
          $mes_fecha = 'NOVIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;

        }elseif($mes == 12){
          $mes_fecha = 'DICIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$hora;
        }



      return $fecha_formato;

      })
      ->editColumn('tipo', function ($registros) {

        if ($registros->tipo == 1) {
          $vista = 'EFECTIVO';
        }else if($registros->tipo == 2){
          $vista = 'TRANSACCION';
        }else if($registros->tipo == 3){
          $vista = 'TARJETA';
        }else if($registros->tipo == 4){
          $vista = 'POP';
        }
      return $vista;

      })
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) { //el array acciones se constuye en el helpers dropdown - helpers esta con bootsrap

        // if(Auth::user()->can(['editar usuario','eliminar usuario'])){
        //     $acciones = [
        //       "Editar" => [
        //         "icon" => "edit blue",
        //         "href" => "/usuarios/$value->id/edit" //esta ruta esta en el archivo web
        //       ],
        //       "Eliminar" => [
        //         "icon" => "edit blue",
        //         "onclick" => "eliminar($value->id)"
        //       ],
        //       "Login as" => [ "onclick" => "as('$value->id')" ],
        //     ];
        //   }else if(Auth::user()->can('eliminar usuario')){
        //     $acciones = [
        //       "Eliminar" => [
        //         "icon" => "edit blue",
        //         "onclick" => "eliminar($value->id)"
        //       ],
        //     ];
        //   }else if(Auth::user()->can('editar usuario')){
        //     $acciones = [
        //       "Editar" => [
        //         "icon" => "edit blue",
        //         "href" => "/usuarios/$value->id/edit" //esta ruta esta en el archivo web
        //       ],
        //     ];
        //   }else{
            $acciones = [
              "Ver Venta" => [
                "icon" => "edit blue",
                "href" => "/ventas/$value->id/show_venta" //esta ruta esta en el archivo web
              ],
              // "Eliminar" => [
              //   "icon" => "edit blue",
              //   "onclick" => "eliminar($value->id)"
              // ],
            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function tablaarticulos(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");

       //$a = Productos::where('activo',1)->select('id','nombre','costo','comision','modulo','categoria','stock');
       //$todo = Servicios::where('activo',1)->select('id','nombre','costo','comision','modulo','categoria','stock')->union($a)->get();


       $todo = Servicios::where('activo',1)->select('id','nombre','costo','comision','modulo','categoria','stock')->get();

       //dd($todo);
      $registros = $todo;
      $datatable = DataTables::of($registros)
      ->make(true);
      //Cueri
      $data = $datatable->getData();

      $datatable->setData($data);
      return $datatable;
    }

    public function tablaProductosVenta(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");

       //$a = Productos::where('activo',1)->select('id','nombre','costo','comision','modulo','categoria','stock');
       //$todo = Servicios::where('activo',1)->select('id','nombre','costo','comision','modulo','categoria','stock')->union($a)->get();


       $todo = Productos::where('activo',1)->select('id','nombre','costo','comision','modulo','categoria','stock')->get();

       //dd($todo);
      $registros = $todo;
      $datatable = DataTables::of($registros)
      ->make(true);
      //Cueri
      $data = $datatable->getData();

      $datatable->setData($data);
      return $datatable;
    }

    public function tablapreventas()
    {
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Prepago::where([['activo', 1],['status',1]])->orderby('id','DESC')->get();
      $datatable = DataTables::of($registros)
      //obtempleadoSrvicio
      ->editColumn('id_empleado', function ($registros) {

      return $registros->obtempleado->nombre.' '.$registros->obtempleado->apellido_paterno.' '.$registros->obtempleado->apellido_materno;

      })
      ->editColumn('id_cliente', function ($registros) {

      return $registros->obtcliente->nombre.' '.$registros->obtcliente->apellido_paterno.' '.$registros->obtcliente->apellido_materno;

      })
      ->editColumn('id_servicio', function ($registros) {

      return $registros->obtservicio->nombre;

      })
      ->editColumn('fecha', function ($registros) {



        list($anio,$mes,$dia) = explode('-',$registros->fecha);

        if ($mes == 1) {
          $mes_fecha = 'ENERO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 2){
          $mes_fecha = 'FEBRERO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 3){
          $mes_fecha = 'MARZO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 4){
          $mes_fecha = 'ABRIL';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 5){
          $mes_fecha = 'MAYO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 6){
          $mes_fecha = 'JUNIO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 7){
          $mes_fecha = 'JULIO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 8){
          $mes_fecha = 'AGOSTO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 9){
          $mes_fecha = 'SEPTIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 10){
          $mes_fecha = 'OCTUBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 11){
          $mes_fecha = 'NOVIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;

        }elseif($mes == 12){
          $mes_fecha = 'DICIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
        }



      return $fecha_formato;

      })
      // ->editColumn('tipo', function ($registros) {
      //
      //   if ($registros->tipo == 1) {
      //     $vista = 'EFECTIVO';
      //   }else if($registros->tipo == 2){
      //     $vista = 'TRANSACCION';
      //   }else if($registros->tipo == 3){
      //     $vista = 'TARJETA';
      //   }else if($registros->tipo == 4){
      //     $vista = 'POP';
      //   }
      // return $vista;
      //
      // })
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) { //el array acciones se constuye en el helpers dropdown - helpers esta con bootsrap

            $acciones = [
              "Pagar Efectivo" => [
                "icon" => "edit blue",
                "onclick" => "pagar($value->id,1)"
              ],
              "Pagar Transferencia" => [
                "icon" => "edit blue",
                "onclick" => "pagar($value->id,2)"
              ],
              "Pagar Tarjeta" => [
                "icon" => "edit blue",
                "onclick" => "pagar($value->id,3)"
              ],
              "Pagar Point" => [
                "icon" => "edit blue",
                "onclick" => "pagar($value->id,4)"
              ],
            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function tablaliquidaciones(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      //$registros = Liquidar::where([['activo', 1]])->orderby('id','ASC')->get();
      $bienes_query = ("
      SELECT
        clientes.nombre,
        clientes.apellido_paterno,
        clientes.apellido_materno,
        cat_servicios.nombre as servicio,
        cat_servicios.costo AS Total_pagar,
        cat_servicios.sesiones AS total_sesiones,
        t_liquidar.importe_total,
        count(t_liquidar.id_sesion) AS total_sesiones_realizadas,
        SUM(importe) AS total_importe,
        t_liquidar.id_cliente,
        t_liquidar.id_servicio,
        t_liquidar.id
         FROM t_liquidar
         INNER JOIN clientes ON clientes.id = t_liquidar.id_cliente
         INNER JOIN cat_servicios ON cat_servicios.id = t_liquidar.id_servicio
         WHERE t_liquidar.activo = 1 GROUP BY nombre DESC
       ");
       $registros= DB::select($bienes_query);


      $datatable = DataTables::of($registros)
      //obtempleadoSrvicio
      ->editColumn('nombre', function ($registros) {

      return $registros->nombre.' '.$registros->apellido_paterno.' '.$registros->apellido_materno;

      })
      // ->editColumn('nombre', function ($registros) {
      //
      // return $registros->nombre.' '.$registros->apellido_paterno.' '.$registros->apellido_materno;
      //
      // })
      // ->editColumn('id_cliente', function ($registros) {
      //
      // return $registros->obtcliente->nombre.' '.$registros->obtcliente->apellido_paterno.' '.$registros->obtcliente->apellido_materno;
      //
      // })
      // ->editColumn('id_cita', function ($registros) {
      //
      // return $registros->obtservicio->nombre;
      //
      // })
      // // ->editColumn('importe', function ($registros) {
      // //  $suma = 0;
      // //  $suma += $registros->importe;
      // //  return $suma;
      // // })
      // ->editColumn('fecha', function ($registros) {
      //
      //
      //
      //   list($anio,$mes,$dia) = explode('-',$registros->fecha);
      //
      //   if ($mes == 1) {
      //     $mes_fecha = 'ENERO';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 2){
      //     $mes_fecha = 'FEBRERO';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 3){
      //     $mes_fecha = 'MARZO';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 4){
      //     $mes_fecha = 'ABRIL';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 5){
      //     $mes_fecha = 'MAYO';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 6){
      //     $mes_fecha = 'JUNIO';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 7){
      //     $mes_fecha = 'JULIO';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 8){
      //     $mes_fecha = 'AGOSTO';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 9){
      //     $mes_fecha = 'SEPTIEMBRE';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 10){
      //     $mes_fecha = 'OCTUBRE';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 11){
      //     $mes_fecha = 'NOVIEMBRE';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //
      //   }elseif($mes == 12){
      //     $mes_fecha = 'DICIEMBRE';
      //     $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio.' '.$registros->hora;
      //   }
      //
      //
      //
      // return $fecha_formato;
      //
      // })
      // ->editColumn('tipo', function ($registros) {
      //
      //   if ($registros->tipo == 1) {
      //     $vista = 'EFECTIVO';
      //   }else if($registros->tipo == 2){
      //     $vista = 'TRANSACCION';
      //   }else if($registros->tipo == 3){
      //     $vista = 'TARJETA';
      //   }else if($registros->tipo == 4){
      //     $vista = 'POP';
      //   }
      // return $vista;
      //
      // })
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) { //el array acciones se constuye en el helpers dropdown - helpers esta con bootsrap

            $acciones = [
              "Abonar Efectivo" => [
                "icon" => "edit blue",
                "onclick" => "AbonarLiquidacion($value->id_cliente,1,$value->id_servicio)"
              ],
              "Abonar Transferencia" => [
                "icon" => "edit blue",
                "onclick" => "AbonarLiquidacion($value->id_cliente,2,$value->id_servicio)"
              ],
              "Abonar Tarjeta" => [
                "icon" => "edit blue",
                "onclick" => "AbonarLiquidacion($value->id_cliente,3,$value->id_servicio)"
              ],
              "Abonar Point" => [
                "icon" => "edit blue",
                "onclick" => "AbonarLiquidacion($value->id_cliente,4,$value->id_servicio)"
              ],
            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function traerPreventa(Request $request){
      $prepago = Prepago::where('id',$request->id)->with('obtservicio')->get();
      return $prepago;
    }

    public function traerPreventa2(Request $request){

      $bienes_query = ("
        SELECT
        t_certificado.id,
        cat_servicios.nombre,
        cat_servicios.costo AS importe
        FROM t_certificado
        INNER JOIN cat_servicios ON cat_servicios.id = t_certificado.id_servicios
        WHERE t_certificado.id = $request->id AND t_certificado.activo = 1
       ");
       //dd($bienes_query);
       $prepago= DB::select($bienes_query);

      //$prepago = Certificado::where('id',$request->id)->with('obtservicioCe')->get();
      return $prepago;
    }

    public function traerLiquidacion(Request $request){
      //dd($request->all());count(t_liquidar.id_sesion) AS total_sesiones_realizadas,
      $bienes_query = ("
      SELECT
      clientes.nombre,
      clientes.apellido_paterno,
      clientes.apellido_materno,
      cat_servicios.nombre as servicio,
      cat_servicios.costo AS Total_pagar,
      t_liquidar.importe_total,
      cat_servicios.sesiones AS total_sesiones,

      (SELECT count(t_liquidar.id_sesion) FROM
      t_liquidar WHERE t_liquidar.activo = 1  AND t_liquidar.id_cliente = $request->id) AS total_sesiones_realizadas,
      SUM(importe) AS total_importe,
      t_liquidar.id
      FROM t_liquidar
      INNER JOIN clientes ON clientes.id = t_liquidar.id_cliente
      INNER JOIN cat_servicios ON cat_servicios.id = t_liquidar.id_servicio
      WHERE t_liquidar.activo = 1 and t_liquidar.id_cliente = $request->id
      and t_liquidar.id_servicio = $request->id_servicio AND t_liquidar.status = 1  GROUP BY nombre DESC
       ");
       //dd($bienes_query);
       $prepago= DB::select($bienes_query);
       //dd($prepago);
      //$prepago = Liquidar::where('id',$request->id)->with('obtservicio')->get();
      return $prepago;
    }

    public function traerPreventas(Request $request){
      $registros = Prepago::select(
      'empleados.nombre as nombre_empleado',
      'empleados.apellido_paterno as apellido_p_empleado',
      'empleados.apellido_materno as apellido_m_empleado',
      'cat_servicios.nombre as nombre_servicio',
      'clientes.nombre as nombre_cliente',
      'clientes.apellido_paterno as apellido_p_cliente',
      'clientes.apellido_materno as apellido_m_cliente',
      't_prepagado.cabina',
      't_prepagado.id',
      't_prepagado.importe',
      't_prepagado.fecha')->
      join('cat_servicios','cat_servicios.id','t_prepagado.id_servicio')->
      join('clientes','clientes.id','t_prepagado.id_cliente')->
      join('empleados','empleados.id','t_prepagado.id_empleado')
      ->where([['t_prepagado.activo', 1],['t_prepagado.status',1]])->orderby('t_prepagado.id','DESC')->get();
      return $registros;
    }


    public function preventaPago(Request $request)
    {
      try {
        //dd($request->all());
        date_default_timezone_set('America/Mexico_city');

        //dd('epale');

        $prepago = Prepago::find($request->id);

        $liquidare = Liquidar::where([['id_servicio',$prepago->id_servicio],['id_cliente',$prepago->id_cliente],['status',2]])->first();

        if (isset($liquidare)) {
          Liquidar::where([['id_servicio',$prepago->id_servicio],['id_cliente',$prepago->id_cliente],['status',2]])->update([
            'activo' => 0
          ]);

          $ventas = new Ventas();
          $ventas->id_usuario =  Auth::user()->id;
          $ventas->total_venta = $request->total_precio;
          $ventas->descuento = 0;
          $ventas->tipo = $request->tipo;
          $ventas->cambio = $request->cambio;
          $ventas->monto = $request->monto;
          $ventas->modulo = 1;
          $ventas->cve_usuario = Auth::user()->id;
          $ventas->save();

          $ventas2 = Ventas::find($ventas->id);
          $ventas2->folio_venta =  $ventas->id;
          $ventas2->save();

          $servicios =  new ServicioVentas();
          $servicios->id_venta = $ventas->id;
          $servicios->id_cliente = $prepago->id_cliente;
          $servicios->cliente = $prepago->obtcliente->nombre.' '.$prepago->obtcliente->apellido_paterno.' '.$prepago->obtcliente->apellido_materno;
          $servicios->id_empleado = $prepago->id_empleado;
          $servicios->id_empleado_servicio = $prepago->id_empleado_servicio;
          $servicios->empleado = $prepago->obtempleado->nombre.' '.$prepago->obtempleado->apellido_paterno.' '.$prepago->obtempleado->apellido_materno;
          $servicios->servicio = $prepago->obtservicio->nombre;
          $servicios->costo_servicio = $request->total_precio;
          $servicios->comision = 0;
          $servicios->comision_servicio = $prepago->importe_servicio;
          $servicios->cve_usuario = Auth::user()->id;
          $servicios->save();

          $prepago = Prepago::find($request->id);
          $prepago->status = 2;
          $prepago->save();

        }else{

          $ventas = new Ventas();
          $ventas->id_usuario =  Auth::user()->id;
          $ventas->total_venta = $request->total_precio;
          $ventas->descuento = 0;
          $ventas->tipo = $request->tipo;
          $ventas->cambio = $request->cambio;
          $ventas->monto = $request->monto;
          $ventas->modulo = 1;
          $ventas->cve_usuario = Auth::user()->id;
          $ventas->save();

          $ventas2 = Ventas::find($ventas->id);
          $ventas2->folio_venta =  $ventas->id;
          $ventas2->save();

          $servicios =  new ServicioVentas();
          $servicios->id_venta = $ventas->id;
          $servicios->id_cliente = $prepago->id_cliente;
          $servicios->cliente = $prepago->obtcliente->nombre.' '.$prepago->obtcliente->apellido_paterno.' '.$prepago->obtcliente->apellido_materno;
          $servicios->id_empleado = $prepago->id_empleado;
          $servicios->id_empleado_servicio = $prepago->id_empleado_servicio;
          $servicios->empleado = $prepago->obtempleado->nombre.' '.$prepago->obtempleado->apellido_paterno.' '.$prepago->obtempleado->apellido_materno;
          $servicios->servicio = $prepago->obtservicio->nombre;
          $servicios->costo_servicio = $prepago->obtservicio->costo;
          $servicios->comision = $prepago->obtservicio->comision;
          $servicios->comision_servicio = $prepago->importe_servicio;
          $servicios->cve_usuario = Auth::user()->id;
          $servicios->save();

          $prepago = Prepago::find($request->id);
          $prepago->status = 2;
          $prepago->save();
        }


        return response()->json(['success'=>'Se ha Pagado con Exito','folio_venta' => $ventas2->folio_venta]);


      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }


    public function preventaPago2(Request $request)
    {
      try {
        //dd($request->all());
        date_default_timezone_set('America/Mexico_city');


        $prepago = Certificado::find($request->id);

        $ventas = new Ventas();
        $ventas->id_usuario =  Auth::user()->id;
        $ventas->total_venta = $request->total_precio;
        $ventas->descuento = 0;
        $ventas->tipo = $request->tipo;
        $ventas->cambio = $request->cambio;
        $ventas->monto = $request->monto;
        $ventas->modulo = 1;
        $ventas->cve_usuario = Auth::user()->id;
        $ventas->save();

        $ventas2 = Ventas::find($ventas->id);
        $ventas2->folio_venta =  $ventas->id;
        $ventas2->save();

          //dd($value);


        $servicios =  new ServicioVentas();
        $servicios->id_venta = $ventas->id;
        $servicios->id_cliente = $prepago->cliente_id;
        $servicios->cliente = $prepago->obtclienteCe->nombre.' '.$prepago->obtclienteCe->apellido_paterno.' '.$prepago->obtclienteCe->apellido_materno;
        $servicios->id_empleado = 1;
        $servicios->id_empleado_servicio = 1;
        $servicios->empleado = 'Spa Vit Live';
        $servicios->servicio = $prepago->obtservicioCe->nombre;
        $servicios->costo_servicio = $prepago->obtservicioCe->costo;
        $servicios->comision = 0;
        $servicios->comision_servicio = 0;
        $servicios->cve_usuario = Auth::user()->id;
        $servicios->save();

        $prepago = Certificado::find($request->id);
        $prepago->status = 2;
        $prepago->save();


          return response()->json(['success'=>'Se ha Pagado con Exito','folio_venta' => $ventas2->folio_venta]);


      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }

    public function abonoPago(Request $request){
      try {
        //dd($request->all());
        date_default_timezone_set('America/Mexico_city');

        $liquidar_cliente = Liquidar::where('id_cliente',$request->id)->get();
        $este = [];
        foreach ($liquidar_cliente as $key => $value) {
          array_push($este,$value['id']);
        }
        //dd($este);
        $prepago = Liquidar::whereIn('id',$este)->where('status',1)->get();
        //dd($prepago);

          //dd($value);
        // $total_importes = 0;

        $liquidar = Liquidar::whereIn('id',$este)->get();
        //dd($liquidar[0]['importe_total']);
        $total_queda = $liquidar[0]['importe_total'] - $request->total_precio;

        $liquidares = Liquidar::where([['id_cliente',$liquidar[0]['id_cliente']],['id_servicio',$liquidar[0]['id_servicio']]])->update([
          'importe_total' => $total_queda,
        ]);
        //dd($prepago);
        //dd($liquidar->importe_total,$request->total_precio,$total_queda);
        foreach ($prepago as $key => $value) {
          //dd($value);
          // $total_importes += $value->importe;

          $ventas = new Ventas();
          $ventas->id_usuario =  Auth::user()->id;
          $ventas->total_venta = $value->importe;
          $ventas->descuento = 0;
          $ventas->tipo = $request->tipo;
          $ventas->cambio = $request->cambio;
          $ventas->monto = $value->importe;
          $ventas->modulo = 1;
          $ventas->cve_usuario = Auth::user()->id;
          $ventas->save();

          $ventas2 = Ventas::find($ventas->id);
          $ventas2->folio_venta =  $ventas->id;
          $ventas2->save();

          $prepago = Liquidar::find($value->id);
          // $prepago->activo = 0;
          $prepago->status = 2;
          $prepago->save();

          if($value->id_cita == 1){
            $servicios =  new ServicioVentas();
            $servicios->id_venta = $ventas->id;
            $servicios->id_cliente = $value->id_cliente;
            $servicios->cliente = $value->obtcliente->nombre.' '.$value->obtcliente->apellido_paterno.' '.$value->obtcliente->apellido_materno;
            $servicios->id_empleado = $value->id_empleado;
            $servicios->id_empleado_servicio = $value->id_empleado_servicio;
            $servicios->empleado = $value->obtempleado->nombre.' '.$value->obtempleado->apellido_paterno.' '.$value->obtempleado->apellido_materno;
            $servicios->servicio = $value->obtservicio->nombre;
            $servicios->costo_servicio = $value->obtservicio->costo;
            $servicios->comision = $value->obtservicio->comision;
            $servicios->comision_servicio = $value->importe_servicio;
            $servicios->cve_usuario = Auth::user()->id;
            $servicios->save();
          }else{
            $servicios =  new ServicioVentas();
            $servicios->id_venta = $ventas->id;
            $servicios->id_cliente = $value->id_cliente;
            $servicios->cliente = $value->obtcliente->nombre.' '.$value->obtcliente->apellido_paterno.' '.$value->obtcliente->apellido_materno;
            $servicios->id_empleado = $value->id_empleado;
            $servicios->id_empleado_servicio = $value->id_empleado_servicio;
            $servicios->empleado = $value->obtempleado->nombre.' '.$value->obtempleado->apellido_paterno.' '.$value->obtempleado->apellido_materno;
            $servicios->servicio = $value->obtservicio->nombre;
            $servicios->costo_servicio = $value->obtservicio->costo;
            $servicios->comision = 0;
            $servicios->comision_servicio = $value->importe_servicio;
            $servicios->cve_usuario = Auth::user()->id;
            $servicios->save();
          }








        }



          return response()->json(['success'=>'Se ha Pagado con Exito','folio_venta' => $ventas2->folio_venta,'total_resta' => $total_queda,'total_sesiones' => $prepago->id_sesion]);


      } catch (\Exception $e) {
        dd($e->getMessage());
      }
    }


    public function traerProductos(Request $request){
      $productos = Productos::where([['activo',1],['codigo',$request->codigo],['stock','>',0]])->first();
      return $productos;
    }

    public function cambiar(Request $request){
      try {

        $tventas = ServicioVentas::where('id_venta',$request->id)->update([
          'created_at' =>$request->fecha
        ]);

        $ventas2 = Ventas::find($request->id);
        $ventas2->created_at =  $request->fecha;
        $ventas2->save();

        return response()->json(['success'=>'Se ha Editado con Exito']);


      } catch (\Exception $e) {
        dd($e->getMessage());

      }

    }


}
