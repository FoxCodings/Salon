<?php

namespace Modules\Catalogos\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Catalogos\Entities\Cabello;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
class CabellosController extends Controller
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
        return view('catalogos::cabellos.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('catalogos::cabellos.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
          $cabellos = new Cabello();
          $cabellos->nombre = $request->nombre;
          $cabellos->costo = $request->costo;
          $cabellos->comision = $request->comision;
          $cabellos->cve_usuario = Auth::user()->id;
          $cabellos->save();
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
        return view('catalogos::cabellos.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {

        $data['cabellos'] = Cabello::find($id);
        return view('catalogos::cabellos.create')->with($data);
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
        $cabellos = Cabello::find($request->id);
        $cabellos->nombre = $request->nombre;
        $cabellos->costo = $request->costo;
        $cabellos->comision = $request->comision;
        $cabellos->cve_usuario = Auth::user()->id;
        $cabellos->save();
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
         $usuario = Cabello::find($request->id);
         $usuario->activo = 0;
         $usuario->save();
         return response()->json(['success'=>'Eliminado exitosamente']);
       } catch (\Exception $e) {
         dd($e->getMessage());
       }
     }

     public function tablacabellos(){
       setlocale(LC_TIME, 'es_ES');
       \DB::statement("SET lc_time_names = 'es_ES'");
       $registros = Cabello::where('activo', 1)->get(); //user es una entidad que se trae desde la app
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
               "Editar" => [
                 "icon" => "edit blue",
                 "href" => "/catalogos/cabellos/$value->id/edit" //esta ruta esta en el archivo web
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
