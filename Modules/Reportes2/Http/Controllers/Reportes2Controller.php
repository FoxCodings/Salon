<?php

namespace Modules\Reportes2\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Clientes2\Entities\Clientes;
use \Modules\Catalogos2\Entities\Servicios;
use \Modules\Empleados2\Entities\Empleados;
use \App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use \App\Export\ClienteExport;
use \App\Export\EmpleadoExport;
use \App\Export\TotalesExport;



use Auth;
use \DB;
class Reportes2Controller extends Controller
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
        $data['clientes'] = Clientes::where([['activo',1],['modulo',2]])->get();
        $data['servicios'] = Servicios::where([['activo',1]])->get();
        $data['empleados'] = Empleados::where([['activo', 1],['modulo',2]])->get();
        return view('reportes2::index')->with($data);
    }


    public function Clientes($id,$fecha1,$fecha2){

        $este = $id.','.$fecha1.','.$fecha2;
        date_default_timezone_set('America/Mexico_City');
        $fecha = date('d-m-Y H:i:s');
        return Excel::download(new ClienteExport($este), 'ClientesExcel_'.$fecha.'.csv',\Maatwebsite\Excel\Excel::CSV);
    }

    public function reporteEmpleado($id,$fecha3,$fecha4){
      $este = $id.','.$fecha3.','.$fecha4;
      date_default_timezone_set('America/Mexico_City');
      $fecha = date('d-m-Y H:i:s');
      return Excel::download(new EmpleadoExport($este), 'EmpleadosExcel_'.$fecha.'.csv',\Maatwebsite\Excel\Excel::CSV);
    }

    public function reporteTotales($fecha5,$fecha6){
      $este = $fecha5.','.$fecha6;
      date_default_timezone_set('America/Mexico_City');
      $fecha = date('d-m-Y H:i:s');
      return Excel::download(new TotalesExport($este), 'TotalesExcel_'.$fecha.'.csv',\Maatwebsite\Excel\Excel::CSV);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('reportes2::create');
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
        return view('reportes2::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('reportes2::edit');
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
