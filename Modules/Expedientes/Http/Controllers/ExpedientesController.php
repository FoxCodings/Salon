<?php

namespace Modules\Expedientes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Clientes2\Entities\Clientes;
use \Modules\Ventas2\Entities\ServicioVentas;
use \Modules\Expedientes\Entities\Expediente;
use \Modules\Expedientes\Entities\Formulas;

use \Modules\Catalogos2\Entities\Servicios;
use Yajra\Datatables\Datatables;
use Barryvdh\DomPDF\Facade as PDF;
use \App\Models\User;
use Auth;
use \DB;

class ExpedientesController extends Controller
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
        return view('expedientes::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('expedientes::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $expediente = Expediente::find($id);
        $data['clientes'] = Clientes::find($expediente->id_cliente);
        $data['expedientes'] = Expediente::find($id);

        $data['servicios'] = Servicios::find($expediente->id_servicio);
        return view('expedientes::show')->with($data);
    }


    public function servicios($id,$id_servicio)
    {
        $data['id'] = $id;
        $data['id_servicio'] = $id_servicio;
        //dd($data);
        $expediente = Expediente::find($id);
        $data['clientes'] = Clientes::find($expediente->id_cliente);
        $data['id_cliente'] = $expediente->id_cliente;

        $data['expedientes'] = Expediente::find($id);
        $data['servicios'] = Servicios::find($id_servicio);
        $data['formulas'] = Formulas::where([
          ['activo',1],
          ['id_cliente',$expediente->id_cliente],
          ['id_servicio',$id_servicio],
          ['id_expediente',$id],
        ])->get();
        //return view('expedientes::vista_expediente')->with($data);
        return view('expedientes::servicios')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function vista($id)
    {
        $data['id'] = $id;
        $data['servicios'] = Servicios::where([['activo',1]])->get();
        //dd($data);
        return view('expedientes::vista_servicios')->with($data);
    }

    public function TraerServicio(Request $request){
      $servicio = Servicios::find($request->servicio);
      return $servicio;
    }

    public function GuardarExpediente(Request $request){
      try {
          list($dia,$mes,$anio)=explode('/',$request->fecha);
          $fecha = $anio.'-'.$mes.'-'.$dia;
          date_default_timezone_set('America/Mexico_city');
          $expediente = new Expediente();
          $expediente->id_cliente = $request->id_cliente;
          $expediente->id_servicio = $request->servicio;
          $expediente->fecha = $fecha;
          $expediente->hora = date('H:i:s');
          $expediente->importe = $request->importe;
          $expediente->tipo = $request->tipo;
          $expediente->tipo_cabello = $request->tipo_cabello;
          $expediente->formula = $request->formula;
          $expediente->save();
          return $expediente;
      } catch (\Exception $e) {
        dd($e->getMessage());
      }

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
    public function destroy($id)
    {
        //
    }

    public function tablaexpedientes(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Clientes::where([['activo', 1],['modulo',1]])->get(); //user es una entidad que se trae desde la app
      $datatable = DataTables::of($registros)
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
              "Ver Expediente" => [
                "icon" => "edit blue",
                "href" => "/expedientes/$value->id/vista" //esta ruta esta en el archivo web
              ],
            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function tablaCarpeta(Request $request){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      //$registros = Expediente::where([['activo', 1],['id_cliente', $request->id]])->get();

      $bienes_query = ("
      SELECT
      t_expediente.id,
      t_expediente.id_cliente,
      t_expediente.id_servicio,
      t_expediente.fecha,
      empleados.nombre AS nombre_empleado,
     empleados.apellido_paterno,
     empleados.apellido_materno,
      cat_servicios.nombre
      FROM t_expediente
      INNER JOIN cat_servicios  ON cat_servicios.id = t_expediente.id_servicio
      INNER JOIN empleados ON empleados.id = t_expediente.id_empleado
      WHERE t_expediente.id_cliente = $request->id GROUP BY nombre
       ");
       //dd($bienes_query);
       $registros= DB::select($bienes_query);

      $datatable = DataTables::of($registros)
      ->editColumn('nombre_empleado', function ($registros) {

      return $registros->nombre_empleado.' '.$registros->apellido_paterno.' '.$registros->apellido_materno;

      })

      ->editColumn('fecha', function ($registros) {

        list($anio,$mes,$dia) = explode('-',$registros->fecha);

        if ($mes == 1) {
          $mes_fecha = 'ENERO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 2){
          $mes_fecha = 'FEBRERO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 3){
          $mes_fecha = 'MARZO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 4){
          $mes_fecha = 'ABRIL';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 5){
          $mes_fecha = 'MAYO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 6){
          $mes_fecha = 'JUNIO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 7){
          $mes_fecha = 'JULIO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 8){
          $mes_fecha = 'AGOSTO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 9){
          $mes_fecha = 'SEPTIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 10){
          $mes_fecha = 'OCTUBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 11){
          $mes_fecha = 'NOVIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 12){
          $mes_fecha = 'DICIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;
        }



      return $fecha_formato;

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
              "Ver Servicio" => [
                "icon" => "edit blue",
                "href" => "/expedientes/$value->id,$value->id_servicio/servicios" //esta ruta esta en el archivo web
              ],
              // "Imprimir" => [
              //   "icon" => "edit blue",
              //   "href" => "/expedientes/$value->id_cliente/imprimir" //esta ruta esta en el archivo web
              // ],

            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function tablaServicios(Request $request){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Expediente::where([['activo', 1],['id_cliente', $request->id],['id_servicio', $request->id_servicio]])->get();

      // $bienes_query = ("
      // SELECT
      // t_expediente.id,
      // t_expediente.id_cliente,
      // t_expediente.id_servicio,
      // t_expediente.fecha,
      // cat_servicios.nombre
      //  FROM t_expediente
      // INNER JOIN cat_servicios  ON cat_servicios.id = t_expediente.id_servicio
      // WHERE t_expediente.id_cliente = $request->id GROUP BY nombre
      //  ");
       //dd($bienes_query);
       //$registros= DB::select($bienes_query);

      $datatable = DataTables::of($registros)
      ->editColumn('id_servicio', function ($registros) {

      return $registros->obtServicioExp->nombre;

      })

      ->editColumn('fecha', function ($registros) {

        list($anio,$mes,$dia) = explode('-',$registros->fecha);

        if ($mes == 1) {
          $mes_fecha = 'ENERO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 2){
          $mes_fecha = 'FEBRERO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 3){
          $mes_fecha = 'MARZO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 4){
          $mes_fecha = 'ABRIL';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 5){
          $mes_fecha = 'MAYO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 6){
          $mes_fecha = 'JUNIO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 7){
          $mes_fecha = 'JULIO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 8){
          $mes_fecha = 'AGOSTO';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 9){
          $mes_fecha = 'SEPTIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 10){
          $mes_fecha = 'OCTUBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 11){
          $mes_fecha = 'NOVIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

        }elseif($mes == 12){
          $mes_fecha = 'DICIEMBRE';
          $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;
        }



      return $fecha_formato.' '.$registros->hora;

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
              "Observar" => [
                "icon" => "edit blue",
                "href" => "/expedientes/$value->id_cliente/show" //esta ruta esta en el archivo web
              ],

            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function imprimir($id){
      $data['expedientes'] = Expediente::where([['activo', 1],['id_cliente', $id]])->get();
      $data['cliente'] = Clientes::find($id);
      $cliente = Clientes::find($id);
      $nombre = $cliente->nombre.' '.$cliente->apellido_paterno.' '.$cliente->apellido_materno;

      $pdf = PDF::loadView('expedientes::impresion', $data);
      $pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
      $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);
      $pdf->output();

      $namePdf = 'Expediente_'.$nombre.'.pdf';
      return $pdf->download($namePdf);
      return $pdf->stream();
    }

    public function formula(Request $request){
      try {
        $formula  = new Formulas();
        $formula->id_expediente = $request->id_expediente;
        $formula->id_servicio = $request->id_servicio;
        $formula->id_cliente = $request->id_cliente;
        $formula->formula = $request->formula;
        $formula->mililitros = $request->mililitros;
        $formula->save();

        return $formula;
      } catch (\Exception $e) {
          dd($e->getMessage());
      }

    }

    public function eliminarFormula(Request $request){
      $formula = Formulas::find($request->id);
      $formula->activo = 0;
      $formula->save();
    }
}
