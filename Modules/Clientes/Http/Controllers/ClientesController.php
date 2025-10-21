<?php

namespace Modules\Clientes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Clientes\Entities\Clientes;
use \Modules\Agenda\Entities\Eventos;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;

class ClientesController extends Controller
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
        return view('clientes::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('clientes::create');
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

        if ($request->fecha_cumpleanos == null) {
          $cliente = new Clientes();
          $cliente->nombre = $request->nombre;
          $cliente->apellido_paterno = $request->apellido_paterno;
          $cliente->apellido_materno = $request->apellido_materno;
          $cliente->telefono = $request->telefono;
          $cliente->correo_electronico = $request->correo_electronico;
          $cliente->modulo = 1;
          $cliente->cve_usuario = Auth::user()->id;
          $cliente->save();
        }else{
          list($dia,$mes,$anio)=explode('/',$request->fecha_cumpleanos);
          $fecha = $anio.'-'.$mes.'-'.$dia;
          //dd($fecha);
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



          //
          // $clientes = Clientes::where([['activo',1],['modulo',1]])->get();
          // $fechas = [];
          // $nombre = [];
          // foreach ($clientes as $key => $value) {
          //   //dd($value['cumpleanos']);
          //
          //   list($anio,$mes,$dia)=explode('-',$value['cumpleanos']);
          //
          //   $nombres = $value['nombre'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'];
          //
          //   $fechita = date('Y').'-'.$mes.'-'.$dia;
          //
          //
          //   $eventos_existe = Eventos::where([['activo',1],['descripcion',$nombres]])->first();
          //
          //   if (isset($eventos_existe)) {
          //     // code...
          //   }else{
          //     $evento = new Eventos();
          //     $evento->titulo = 'Cumpleaños';
          //     $evento->descripcion = $nombres;
          //     $evento->fecha = $fechita;
          //     $evento->cliente = $value['id'];
          //     $evento->modulo = 1;
          //     $evento->cve_usuario = Auth::user()->id;
          //     $evento->save();
          //   }
          //
          //
          // }


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
        return view('clientes::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['clientes'] = Clientes::find($id);
        return view('clientes::create')->with($data);
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

        if ($request->fecha_cumpleanos == null) {
          $cliente = Clientes::find($request->id);
          $cliente->nombre = $request->nombre;
          $cliente->apellido_paterno = $request->apellido_paterno;
          $cliente->apellido_materno = $request->apellido_materno;
          $cliente->telefono = $request->telefono;
          $cliente->correo_electronico = $request->correo_electronico;
          $cliente->modulo = 1;
          $cliente->cve_usuario = Auth::user()->id;
          $cliente->save();
        }else{
          list($dia,$mes,$anio)=explode('/',$request->fecha_cumpleanos);
          $fecha = $anio.'-'.$mes.'-'.$dia;

          $cliente = Clientes::find($request->id);
          $cliente->nombre = $request->nombre;
          $cliente->apellido_paterno = $request->apellido_paterno;
          $cliente->apellido_materno = $request->apellido_materno;
          $cliente->telefono = $request->telefono;
          $cliente->correo_electronico = $request->correo_electronico;
          $cliente->cumpleanos = $fecha;
          $cliente->cve_usuario = Auth::user()->id;
          $cliente->save();
          /////////////////////////////////////////////////////////////////
          $clientes = Clientes::where([['activo',1],['modulo',2]])->get();
          $fechas = [];
          $nombre = [];
          foreach ($clientes as $key => $value) {
            //dd($value['cumpleanos']);

            list($anio,$mes,$dia)=explode('-',$value['cumpleanos']);

            $nombres = $value['nombre'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'];

            $fechita = date('Y').'-'.$mes.'-'.$dia;


            $eventos_existe = Eventos::where([['activo',1],['descripcion',$nombres]])->first();

            if (isset($eventos_existe)) {
              $evento = Eventos::find($eventos_existe->id);
              $evento->fecha = $fechita;
              $evento->cve_usuario = Auth::user()->id;
              $evento->save();
            }else{



              $evento = new Eventos();
              $evento->titulo = 'Cumpleaños';
              $evento->descripcion = $nombres;
              $evento->fecha = $fechita;
              $evento->cliente = $value['id'];
              $evento->modulo = 1;
              $evento->cve_usuario = Auth::user()->id;
              $evento->save();
            }


          }
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
         $usuario = Clientes::find($request->id);
         $usuario->activo = 0;
         $usuario->save();
         return response()->json(['success'=>'Eliminado exitosamente']);
       } catch (\Exception $e) {
         dd($e->getMessage());
       }
     }

    public function tablaclientes(){
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
              "Editar" => [
                "icon" => "edit blue",
                "href" => "/clientes/$value->id/edit" //esta ruta esta en el archivo web
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
