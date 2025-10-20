<?php

namespace Modules\Catalogos\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Catalogos\Entities\Servicios;
use \Modules\Catalogos\Entities\Tipo_Servicio;
use \Modules\Catalogos\Entities\Sesiones;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

     public function __construct()
     {
       $this->middleware('auth');
       $this->middleware(function ($request, $next) {
           $this->user = Auth::user();
           return $next($request);
       });
     }

    public function index()
    {
        return view('catalogos::servicios.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['tipo_servicio'] = Tipo_Servicio::where('activo',1)->get();
         $data['sesiones'] = Sesiones::where('activo',1)->get();
         //dd($data);
         return view('catalogos::servicios.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
      try {
        $servicios = new Servicios();
        $servicios->nombre = $request->nombre;
        $servicios->costo = $request->costo;
        $servicios->comision = $request->comision;
        $servicios->tipo_servicio = $request->tipo;
        $servicios->porcentaje = $request->porcentajes;
        $servicios->servicio_para = $request->servicio_para;
        $servicios->tipe = $request->servicio_paratipo;
        $servicios->modulo = 1;
        $servicios->cve_usuario = Auth::user()->id;
        $servicios->save();

        if ($servicios->tipo_servicio == 2) {
          $servicios = Servicios::find($servicios->id);
          $servicios->sesiones = $request->sesiones;
          $servicios->save();
        }

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
        return view('catalogos::servicios.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['servicios'] = Servicios::find($id);
        $data['tipo_servicio'] = Tipo_Servicio::where('activo',1)->get();
        $data['sesiones'] = Sesiones::where('activo',1)->get();
        return view('catalogos::servicios.create')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
     public function update(Request $request)
     {
       //dd($request->all());
       try {
         $servicios = Servicios::find($request->id);
         $servicios->nombre = $request->nombre;
         $servicios->costo = $request->costo;
         $servicios->comision = $request->comision;
         $servicios->tipo_servicio = $request->tipo;
         $servicios->porcentaje = $request->porcentajes;
         $servicios->servicio_para = $request->servicio_para;
         $servicios->tipe = $request->servicio_paratipo;
         $servicios->modulo = 1;
         $servicios->cve_usuario = Auth::user()->id;
         $servicios->save();

         if ($servicios->tipo_servicio == 2) {
           $servicios = Servicios::find($servicios->id);
           $servicios->sesiones = $request->sesiones;
           $servicios->save();
         }

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
         $usuario = Servicios::find($request->id);
         $usuario->activo = 0;
         $usuario->save();
         return response()->json(['success'=>'Eliminado exitosamente']);
       } catch (\Exception $e) {
         dd($e->getMessage());
       }
     }


    public function tablaservicios(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Servicios::where([['activo', 1],['modulo',1]])->get();
      $datatable = DataTables::of($registros)
      ->editColumn('tipo_servicio', function ($registros) {

      return $registros->obtTipoServicio->nombre;

      })
      ->editColumn('servicio_para', function ($registros) {
        //dd($registros->servicio_para);
        if ($registros->modulo == 1) {
          $servicio_para = 'Salón';
        }elseif($registros->modulo == 2){
          $servicio_para = 'Spa';
        }
      return $servicio_para;

      })
      ->editColumn('tipe', function ($registros) {
        //dd($registros->servicio_para);
        if ($registros->tipe == 1) {
          $servicio_para = 'Uñas';
        }elseif($registros->tipe == 2){
          $servicio_para = 'Cabello';
        }
      return $servicio_para;

      })
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) {

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
                "href" => "/catalogos/servicios/$value->id/edit"
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
}
