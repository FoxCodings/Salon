<?php

namespace Modules\Catalogos2\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Catalogos2\Entities\Faltantes;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
use Barryvdh\DomPDF\Facade as PDF;
class ListadosController extends Controller

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
        return view('catalogos2::listados.index');
    }

    public function GuardarProductos(Request $request){
      try {
        $faltante = new Faltantes();
        $faltante->nombre = $request->nombre;
        $faltante->cantidad = $request->cantidad;
        $faltante->modulo = 2;
        $faltante->save();

        return $faltante;
      } catch (\Exception $e) {
         dd($e->getMessage());
      }

    }

    public function TraerProductos(Request $request){
      $faltantes = Faltantes::where([['activo',1],['modulo',2]])->get();
      return $faltantes;
    }

    public function EliminarProductos(Request $request){
    //  dd($request->all());
      $otros = [];
      foreach ($request->arrays as $key => $value) {
        array_push($otros,$value['id']);
      }

      $faltantes = Faltantes::whereIn('id',$otros)->update([
        'activo' => 0
      ]);

      return $faltantes;
    }

    public function DescargarProductos(){
    $data['productos'] =  Faltantes::where([['activo',1],['modulo',2]])->get();

    //dd($data);
    /////////////////////////////////////////////////////////////////////////
    //dd($data['proveedor']);
    $pdf = PDF::loadView('catalogos2::listados.productosfaltantes', $data);
    $pdf->setPaper ('a4','landscape');

    //$pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
    $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true,'defaultFont' => 'Symbol']);
    $pdf->output();
    $namePdf = 'Productos_Faltantes.pdf';

    //return view('estudiante::diploma')->with($data);
    //return $pdf->download($namePdf);
    return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('catalogos2::listados.create');
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
        return view('catalogos2::listados.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('catalogos2::listados.edit');
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
