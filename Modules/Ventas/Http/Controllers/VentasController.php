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

      $data['roles'] = Roles::all();
      $data['permisos'] = Permisos::where('activo',1)->get();
      $data['tratamientos'] = Alaciados::where('activo',1)->get();

      $data['cabellos'] = Cabello::where('activo',1)->get();
      $data['fasts'] = Fasts::where('activo',1)->get();
      $data['peinados'] = Peinados::where('activo',1)->get();
      $data['pestanas'] = Pestanas::where('activo',1)->get();
      $data['serviciosa'] = ServiciosA::where('activo',1)->get();
      $data['servicioses'] = ServiciosEX::where('activo',1)->get();
      $data['shellacs'] = Shellac::where('activo',1)->get();
      $data['clientes'] = Clientes::where([['activo',1],['modulo',1]])->get();
      $data['empleados'] = Empleados::where([['activo',1],['modulo',1]])->get();

        return view('ventas::index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function agregarcliente(Request $request)
    {

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

      return $cliente;
    }

    public function traerProducto(Request $request){

      if ($request->modulo == 1) {
        $modulo = Alaciados::find($request->id);
      }else if($request->modulo == 2){
        $modulo = Pestanas::find($request->id);

      }else if($request->modulo == 3){
          $modulo = Cabello::find($request->id);
      }else if($request->modulo == 4){
        $modulo = Peinados::find($request->id);
      }else if($request->modulo == 5){
        $modulo = Shellac::find($request->id);

      }else if($request->modulo == 6){
        $modulo = Fasts::find($request->id);

      }else if($request->modulo == 7){
        $modulo = ServiciosA::find($request->id);

      }else if($request->modulo == 8){
        $modulo = ServiciosEX::find($request->id);

      }

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
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ventas::show');
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
}
