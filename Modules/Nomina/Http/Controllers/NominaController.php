<?php

namespace Modules\Nomina\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Empleados\Entities\Empleados;
use \Modules\Ventas2\Entities\ServicioVentas;
use \Modules\Nomina\Entities\Historial;
use \Modules\Nomina\Entities\Semana;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
use \DB;

class NominaController extends Controller
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
        return view('nomina::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('nomina::create');
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
        $data['empleados'] = Empleados::find($id);
        //$data['servicios'] = ServicioVentas::where([['activo',1],['id_cliente',$id]])->get();
        return view('nomina::show')->with($data);
    }

    public function historial($id)
    {
        $data['empleados'] = Empleados::find($id);
        //$data['servicios'] = ServicioVentas::where([['activo',1],['id_cliente',$id]])->get();
        return view('nomina::historial')->with($data);
    }

    public function BuscarPagos(Request $request){
      //dd($request->all());
      list($dia,$mes,$anio)=explode('/',$request->fecha_inicio);
      $fecha_inicio = $anio.'-'.$mes.'-'.$dia.' 00:00:00';

      list($dia2,$mes2,$anio2)=explode('/',$request->fecha_fin);
      $fecha_fin = $anio2.'-'.$mes2.'-'.$dia2.' 23:59:59';



      if ($request->semana == 1) {
        $bienes_query = ("

          SELECT
          empleados.semana_1 as semana,
          t_cat_ventas.*
           FROM empleados
          INNER JOIN t_cat_ventas ON t_cat_ventas.id_empleado = empleados.id
          WHERE  t_cat_ventas.id_empleado = $request->id AND empleados.activo = 1 and empleados.modulo = 1 AND t_cat_ventas.created_at BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
         ");

         $bienes= DB::select($bienes_query);

      }else if($request->semana == 2){
        $bienes_query = ("

          SELECT
          empleados.semana_2 as semana,
          t_cat_ventas.*
           FROM empleados
          INNER JOIN t_cat_ventas ON t_cat_ventas.id_empleado = empleados.id
          WHERE  t_cat_ventas.id_empleado = $request->id AND empleados.activo = 1 and empleados.modulo = 1 AND t_cat_ventas.created_at BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
         ");
         $bienes= DB::select($bienes_query);
      }else if($request->semana == 3){
        $bienes_query = ("

          SELECT
          empleados.semana_3 as semana,
          t_cat_ventas.*
           FROM empleados
          INNER JOIN t_cat_ventas ON t_cat_ventas.id_empleado = empleados.id
          WHERE  t_cat_ventas.id_empleado = $request->id AND empleados.activo = 1 and empleados.modulo = 1 AND t_cat_ventas.created_at BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
         ");
         $bienes= DB::select($bienes_query);
      }else if($request->semana == 4){
        $bienes_query = ("

          SELECT
          empleados.semana_4 as semana,
          t_cat_ventas.*
           FROM empleados
          INNER JOIN t_cat_ventas ON t_cat_ventas.id_empleado = empleados.id
          WHERE  t_cat_ventas.id_empleado = $request->id AND empleados.activo = 1 and empleados.modulo = 1 AND t_cat_ventas.created_at BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
         ");
         $bienes= DB::select($bienes_query);
      }

      return $bienes;
    }

    public function TrerComisionesExtras(Request $request){
      list($dia,$mes,$anio)=explode('/',$request->fecha_inicio);
      $fecha_inicio = $anio.'-'.$mes.'-'.$dia.' 00:00:00';

      list($dia2,$mes2,$anio2)=explode('/',$request->fecha_fin);
      $fecha_fin = $anio2.'-'.$mes2.'-'.$dia2.' 23:59:59';



      if ($request->semana == 1) {
        $bienes_query = ("

          SELECT
          empleados.semana_1 as semana,
          t_cat_ventas.servicio,
          t_cat_ventas.comision_servicio,
          t_cat_ventas.created_at
           FROM empleados
          INNER JOIN t_cat_ventas ON t_cat_ventas.id_empleado = empleados.id
          WHERE  t_cat_ventas.id_empleado = $request->id AND empleados.activo = 1 and empleados.modulo = 1 AND t_cat_ventas.created_at BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
         ");
         $bienes= DB::select($bienes_query);

      }else if($request->semana == 2){
        $bienes_query = ("

          SELECT
          empleados.semana_2 as semana,
          t_cat_ventas.servicio,
          t_cat_ventas.comision_servicio,
          t_cat_ventas.created_at
           FROM empleados
          INNER JOIN t_cat_ventas ON t_cat_ventas.id_empleado = empleados.id
          WHERE  t_cat_ventas.id_empleado = $request->id AND empleados.activo = 1 and empleados.modulo = 1 AND t_cat_ventas.created_at BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
         ");
         $bienes= DB::select($bienes_query);
      }else if($request->semana == 3){
        $bienes_query = ("

          SELECT
          empleados.semana_3 as semana,
          t_cat_ventas.servicio,
          t_cat_ventas.comision_servicio,
          t_cat_ventas.created_at
           FROM empleados
          INNER JOIN t_cat_ventas ON t_cat_ventas.id_empleado = empleados.id
          WHERE  t_cat_ventas.id_empleado = $request->id AND empleados.activo = 1 and empleados.modulo = 1 AND t_cat_ventas.created_at BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
         ");
         $bienes= DB::select($bienes_query);
      }else if($request->semana == 4){
        $bienes_query = ("

          SELECT
          empleados.semana_4 as semana,
          t_cat_ventas.servicio,
          t_cat_ventas.comision_servicio,
          t_cat_ventas.created_at
           FROM empleados
          INNER JOIN t_cat_ventas ON t_cat_ventas.id_empleado = empleados.id
          WHERE  t_cat_ventas.id_empleado = $request->id AND empleados.activo = 1 and empleados.modulo = 1 AND t_cat_ventas.created_at BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'
         ");
         $bienes= DB::select($bienes_query);
      }
      //dd($bienes);
      return $bienes;
    }

    public function crearHistorial(Request $request){
      try {
        //dd($request->all());
        list($dia,$mes,$anio)=explode('/', $request->fecha_inicio);
        $fecha = $anio.'-'.$mes.'-'.$dia;
        list($dia2,$mes2,$anio2)=explode('/', $request->fecha_fin);
        $fecha2 = $anio2.'-'.$mes2.'-'.$dia2;

        $semana = new Semana();
        $semana->id_empleado = $request->id;
        $semana->fecha_inicio = $fecha;
        $semana->fecha_fin = $fecha2;
        $semana->semana = $request->semana;
        $semana->cve_usuario = Auth::user()->id;
        $semana->save();

        if (isset($request->arrayCosas)) {
          foreach ($request->arrayCosas as $key => $value) {

            list($dia,$mes,$anio)=explode('/',$value['fecha_inicio']);
            $fecha = $anio.'-'.$mes.'-'.$dia;
            list($dia2,$mes2,$anio2)=explode('/',$value['fecha_fin']);
            $fecha2 = $anio2.'-'.$mes2.'-'.$dia2;

            $historial = new Historial();
            $historial->id_empleado = $request->id;
            $historial->id_semana = $semana->id;
            $historial->semana = $value['semana'];
            $historial->fecha_inicio = $fecha;
            $historial->fecha_fin = $fecha2;
            $historial->fecha_comision = $value['fecha'];
            $historial->comision = $value['comision'];
            $historial->servicio = $value['servicio'];
            $historial->total_semana = $value['total_semana'];
            $historial->total_comision = $value['total_comision'];
            $historial->cve_usuario = Auth::user()->id;
            $historial->save();
            ///dd($request->arrayComisiones);
            if (isset($request->arrayComisiones)) {
              foreach ($request->arrayComisiones as $key => $valuesyt) {
                $historial = new Historial();
                $historial->id_empleado = $request->id;
                $historial->id_semana = $semana->id;
                $historial->semana = $value['semana'];
                $historial->fecha_inicio = $fecha;
                $historial->fecha_fin = $fecha2;
                $historial->fecha_comision = $valuesyt['fecha'];
                $historial->comision = $valuesyt['comision_extra'];
                $historial->servicio = $valuesyt['servicio'];
                $historial->total_semana = $value['total_semana'];
                $historial->total_comision = $value['total_comision'];
                $historial->cve_usuario = Auth::user()->id;
                $historial->save();
              }
            }




          }
        }






        return response()->json(['success'=>'Se Agrego Satisfactoriamente']);
      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function pagos($id)
    {
      //dd($id);
        $h = Historial::where([['id_semana',$id],['activo',1]])->first();
        //dd($h);
        $data['historial'] = Historial::where([['id_semana',$id],['activo',1]])->get();
        $data['id'] = $h->id_empleado;
        return view('nomina::pagos')->with($data);
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

    public function tablanominas(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Empleados::where([['activo', 1],['modulo',1],['id','!=',1]])->get();
      $datatable = DataTables::of($registros)
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) {


            $acciones = [
              "Pago" => [
                "icon" => "edit blue",
                "href" => "/nomina/$value->id/show"
              ],
              "Historial" => [
                "icon" => "edit blue",
                "href" => "/nomina/$value->id/historial"
              ],
            ];



      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function tablahistorial(Request $request){
      //dd($request->id);
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Semana::where([['activo', 1],['id_empleado',$request->id]])->get();
      $datatable = DataTables::of($registros)
      ->editColumn('fecha_inicio', function ($registros) {


                list($anio,$mes,$dia) = explode('-',$registros->fecha_inicio);

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
      ->editColumn('fecha_fin', function ($registros) {


        list($anio,$mes,$dia) = explode('-',$registros->fecha_fin);

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
      foreach ($data->data as $key => $value) {


            $acciones = [
              "Ver Pago" => [
                "icon" => "edit blue",
                "href" => "/nomina/$value->id/pagos"
              ],
            ];



      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }
}
