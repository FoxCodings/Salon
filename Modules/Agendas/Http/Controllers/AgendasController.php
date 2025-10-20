<?php

namespace Modules\Agendas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Agendas\Entities\Eventos;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;

class AgendasController extends Controller
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
        return view('agendas::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('agendas::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
      try {
        list($dia,$mes,$anio)=explode('/',$request->fecha);
        $fecha = $anio.'-'.$mes.'-'.$dia;
        //dd($request->all());
        $evento = new Eventos();
        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $fecha;
        $evento->modulo = 1;
        $evento->cve_usuario = Auth::user()->id;
        $evento->save();
        return response()->json(['success'=>'Se Agrego Satisfactoriamente']);

      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('agendas::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['eventos'] = Eventos::find($id);
        return view('agendas::create')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
      try {

        list($dia,$mes,$anio)=explode('/',$request->fecha);
        $fecha = $anio.'-'.$mes.'-'.$dia;

        $evento = Eventos::find($request->id);
        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        $evento->fecha = $fecha;
        $evento->cve_usuario = Auth::user()->id;
        $evento->save();
        return response()->json(['success'=>'Ha sido editado con éxito']);

      } catch (\Exception $e) {
        dd($e->getMessage());
      }
    }



    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
     public function destroy(Request $request)
     {
       try {
         $usuario = Eventos::find($request->id);
         $usuario->activo = 0;
         $usuario->save();
         return response()->json(['success'=>'Eliminado exitosamente']);
       } catch (\Exception $e) {
         dd($e->getMessage());
       }
     }

    public function tablaeventos(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Eventos::where([['activo', 1],['modulo',1]])->get(); //user es una entidad que se trae desde la app
      $datatable = DataTables::of($registros)
      ->editColumn('fecha', function ($registros) {

        list($anio,$mes,$dia) = explode('-',$registros->fecha);
        $mes_fecha="";

        if($mes== 0){
          $mes_fecha = '';
          $fecha_formato = 'Sin registro';
        }
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
              "Editar" => [
                "icon" => "edit blue",
                "href" => "/agendas/$value->id/edit" //esta ruta esta en el archivo web
              ],
              "Eliminar" => [
                "icon" => "edit blue",
                "onclick" => "eliminar($value->id)"
              ],
            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }

    public function datos(Request $request){



    //dd($request->all());
      $porcentaje_articulos_id_query_2 = ("
          SELECT * FROM evento where evento.fecha BETWEEN ('".$request->event_start."') and ('".$request->event_end."')  and modulo = 1
      ");

        $data = DB::select($porcentaje_articulos_id_query_2);


         /* $data = Programacion::whereBetween('fec', [$request->event_start, $request->event_end])
          whereDate('event_start', '>=', $request->event_start)
                  ->whereDate('event_end',   '<=', $request->event_end)
                  >select('id', 'event_name', 'event_start', 'event_end')
                  ->get();*/
          //dd($data);
          return response()->json($data);



      }

      public function VerEvento(Request $request){
        $porcentaje_articulos_id_query_3 = ("
          SELECT * FROM evento where id = $request->id and activo = '1'
          ");
          $data = DB::select($porcentaje_articulos_id_query_3);
          return $data;
      }
}
