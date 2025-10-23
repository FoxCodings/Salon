<?php

namespace Modules\Usuarios\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Usuarios\Entities\Recomendacion;
use \Modules\Empleados\Entities\Empleados;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
use Barryvdh\DomPDF\Facade as PDF;
class ArchivosController extends Controller
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
        return view('usuarios::archivos.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['empleados'] = Empleados::where([['activo',1],['modulo',1],['id','!=',1]])->get();
        return view('usuarios::archivos.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
      try {
        $archivos = new Recomendacion();
        $archivos->id_empleado = $request->empleados;
        $archivos->anios = $request->anios;
        $archivos->meses = $request->meses;
        $archivos->tipo_empleado = $request->tipo_empleado;
        $archivos->funcion = $request->funcion;
        $archivos->cve_usuario = Auth::user()->id;
        $archivos->save();

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
        return view('clientes::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['archivos'] = Recomendacion::find($id);
        $data['empleados'] = Empleados::where([['activo',1],['modulo',1],['id','!=',1]])->get();
        return view('usuarios::archivos.create')->with($data);
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

        $archivos = Recomendacion::find($request->id);
        $archivos->id_empleado = $request->empleados;
        $archivos->anios = $request->anios;
        $archivos->meses = $request->meses;
        $archivos->tipo_empleado = $request->tipo_empleado;
        $archivos->funcion = $request->funcion;
        $archivos->cve_usuario = Auth::user()->id;
        $archivos->save();

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
         $usuario = Recomendacion::find($request->id);
         $usuario->activo = 0;
         $usuario->save();
         return response()->json(['success'=>'Eliminado exitosamente']);
       } catch (\Exception $e) {
         dd($e->getMessage());
       }
     }

    public function tablaarchivo(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Recomendacion::where([['activo', 1]])->get(); //user es una entidad que se trae desde la app
      $datatable = DataTables::of($registros)
      ->editColumn('id_empleado', function ($registros) {
        return $registros->obtEmpleados->nombre.' '.$registros->obtEmpleados->apellido_paterno.' '.$registros->obtEmpleados->apellido_materno;//relacion
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
                "href" => "/usuarios/archivos/$value->id/edit" //esta ruta esta en el archivo web
              ],
              "Imprimir Carta" => [
                "icon" => "edit blue",
                "href" => "/usuarios/archivos/documento/$value->id" //esta ruta esta en el archivo web
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

    public function documento($id){

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $recomendaciones = Recomendacion::find($id);
      $data['recomendaciones'] = Recomendacion::find($id);
      $empleados = Empleados::find($recomendaciones->id_empleado);


      $nombre_alumno = $empleados->nombre.' '.$empleados->apellido_paterno.' '.$empleados->apellido_materno;
      $pdf = PDF::loadView('usuarios::archivos.carta', $data);
      $pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
      $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);



      $pdf->output();

      $namePdf = 'Carta_Recomendacion_'.$nombre_alumno.'.pdf';
      return $pdf->download($namePdf);
      return $pdf->stream();

    // $pdf = \PDF::loadView('documento', ['Data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
    //
    //
    // return $pdf->download('invoice.pdf');

    }
}
