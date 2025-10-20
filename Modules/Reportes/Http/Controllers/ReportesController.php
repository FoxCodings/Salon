<?php

namespace Modules\Reportes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use \Modules\Ventas\Entities\Ventas;
use \Modules\Ventas\Entities\ServicioVentas;
use \Modules\Clientes2\Entities\Clientes;
use \Modules\Catalogos2\Entities\Servicios;
use \Modules\Empleados\Entities\Empleados;
use Auth;
use \DB;
class ReportesController extends Controller
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
        $data['empleados'] = Empleados::where([['activo',1],['modulo',1]])->get();
        return view('reportes::index')->with($data);
    }

    public function Nomina($fecha1,$fecha2){
      //dd($fecha1,$fecha2);
      date_default_timezone_set('America/Mexico_city');
      list($dia,$mes,$anio) =explode('-',$fecha1);
      $fecha11 = $anio.'-'.$mes.'-'.$dia.' 00:00:00';

      list($dia2,$mes2,$anio2) =explode('-',$fecha2);
      $fecha22 = $anio2.'-'.$mes2.'-'.$dia2.' 23:59:59';


      if ($mes2 == 1) {
        $meses = 'ENERO';
      }else if($mes2 == 2){
        $meses = 'FEBRERO';
      }else if($mes2 == 3){
        $meses = 'MARZO';
      }else if($mes2 == 4){
        $meses = 'ABRIL';
      }else if($mes2 == 5){
        $meses = 'MAYO';
      }else if($mes2 == 6){
        $meses = 'JUNIO';
      }else if($mes2 == 7){
        $meses = 'JULIO';
      }else if($mes2 == 8){
        $meses = 'AGOSTO';
      }else if($mes2 == 9){
        $meses = 'SEPTIEMBRE';
      }else if($mes2 == 10){
        $meses = 'OCTUBRE';
      }else if($mes2 == 11){
        $meses = 'NOVIEMBRE';
      }else if($mes2 == 12){
        $meses = 'DICIEMBRE';
      }

      // $nombre_alumno = $alumnos->nombre.' '.$alumnos->apellido_paterno.' '.$alumnos->apellido_materno;
      $data['semana'] = $dia.' AL '.$dia2.' DE '.$meses.' '.$anio2;
      //$data['servicios'] = ServicioVentas::whereBetween('created_at', [$fecha11, $fecha22])->groupBy('id_venta')->get();




      $bienes_query = ("
      SELECT
      t_cat_ventas.id_venta,
      t_cat_ventas.cliente,
      empleados.inicial AS empleado,
      GROUP_CONCAT(t_cat_ventas.servicio SEPARATOR ',') AS servicio,
      t_ventas.tipo,
      clientes.nombre,
      clientes.apellido_paterno,
      clientes.apellido_materno,
      cat_servicios.porcentaje,
      t_ventas.total_venta
      FROM t_cat_ventas
      INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
      LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
      LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
      LEFT JOIN cat_servicios ON cat_servicios.nombre = t_cat_ventas.servicio
      WHERE t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

       ");
       $bienes= DB::select($bienes_query);
       /////////////////////////////////////////////////////////////////////////
       $queryPaso1 = ("
       SELECT
       t_ventas.total_venta
       FROM t_cat_ventas
       INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
       LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
       LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
       WHERE t_ventas.tipo =1 AND t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

        ");
        $pas1= DB::select($queryPaso1);

        $PS1 = 0;

        foreach ($pas1 as $key => $value) {
          $PS1 +=$value->total_venta;
        }
        ///////////////////////////////////////////////////////////////////////
        $queryPaso2 = ("
        SELECT
        t_ventas.total_venta
        FROM t_cat_ventas
        INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
        LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
        LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
        WHERE t_ventas.tipo =2 AND t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

         ");
         $pas2= DB::select($queryPaso2);

         $PS2 = 0;

         foreach ($pas2 as $key => $value) {
           $PS2 +=$value->total_venta;
         }
         ///////////////////////////////////////////////////////////////////////
         $queryPaso3 = ("
         SELECT
         t_ventas.total_venta
         FROM t_cat_ventas
         INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
         LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
         LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
         WHERE t_ventas.tipo =3 AND t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

          ");
          $pas3= DB::select($queryPaso3);

          $PS3 = 0;

          foreach ($pas3 as $key => $value) {
            $PS3 +=$value->total_venta;
          }
          ///////////////////////////////////////////////////////////////////////
          $queryPaso4 = ("
          SELECT
          t_ventas.total_venta
          FROM t_cat_ventas
          INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
          LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
          LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
          WHERE t_ventas.tipo =4 AND t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

           ");
           $pas4= DB::select($queryPaso4);

           $PS4 = 0;

           foreach ($pas4 as $key => $value) {
             $PS4 +=$value->total_venta;
           }

        //dd($PS1,$PS2,$PS3,$PS4);

      //dd($bienes);
      $data['PS1'] = $PS1;
      $data['PS2'] = $PS2;
      $data['PS3'] = $PS3;
      $data['PS4'] = $PS4;
      $data['servicios'] = $bienes;
      $pdf = PDF::loadView('reportes::nomina', $data);
      $pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
      $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);



      $pdf->output();

      $namePdf = 'ReporteNomina.pdf';
      return $pdf->download($namePdf);
      //return $pdf->stream();
    }


    public function NominaEmpleado($empleado,$fecha1,$fecha2){
      //dd($fecha1,$fecha2);
      date_default_timezone_set('America/Mexico_city');
      list($dia,$mes,$anio) =explode('-',$fecha1);
      $fecha11 = $anio.'-'.$mes.'-'.$dia.' 00:00:00';

      list($dia2,$mes2,$anio2) =explode('-',$fecha2);
      $fecha22 = $anio2.'-'.$mes2.'-'.$dia2.' 23:59:59';


      if ($mes2 == 1) {
        $meses = 'ENERO';
      }else if($mes2 == 2){
        $meses = 'FEBRERO';
      }else if($mes2 == 3){
        $meses = 'MARZO';
      }else if($mes2 == 4){
        $meses = 'ABRIL';
      }else if($mes2 == 5){
        $meses = 'MAYO';
      }else if($mes2 == 6){
        $meses = 'JUNIO';
      }else if($mes2 == 7){
        $meses = 'JULIO';
      }else if($mes2 == 8){
        $meses = 'AGOSTO';
      }else if($mes2 == 9){
        $meses = 'SEPTIEMBRE';
      }else if($mes2 == 10){
        $meses = 'OCTUBRE';
      }else if($mes2 == 11){
        $meses = 'NOVIEMBRE';
      }else if($mes2 == 12){
        $meses = 'DICIEMBRE';
      }

      // $nombre_alumno = $alumnos->nombre.' '.$alumnos->apellido_paterno.' '.$alumnos->apellido_materno;
      $data['semana'] = $dia.' AL '.$dia2.' DE '.$meses.' '.$anio2;
      //$data['servicios'] = ServicioVentas::whereBetween('created_at', [$fecha11, $fecha22])->groupBy('id_venta')->get();




      $bienes_query = ("
      SELECT
      t_cat_ventas.id_venta,
      t_cat_ventas.cliente,
      empleados.inicial AS empleado,
      GROUP_CONCAT(t_cat_ventas.servicio SEPARATOR ',') AS servicio,
      t_ventas.tipo,
      clientes.nombre,
      clientes.apellido_paterno,
      clientes.apellido_materno,
        cat_servicios.porcentaje,
      t_ventas.total_venta
      FROM t_cat_ventas
      INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
      LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
      LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
      LEFT JOIN cat_servicios ON cat_servicios.nombre = t_cat_ventas.servicio
      WHERE t_cat_ventas.id_empleado= $empleado and  t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

       ");
       $bienes= DB::select($bienes_query);
       /////////////////////////////////////////////////////////////////////////
       $queryPaso1 = ("
       SELECT
       t_ventas.total_venta
       FROM t_cat_ventas
       INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
       LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
       LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
       WHERE t_cat_ventas.id_empleado= $empleado and t_ventas.tipo =1 AND t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

        ");
        $pas1= DB::select($queryPaso1);

        $PS1 = 0;

        foreach ($pas1 as $key => $value) {
          $PS1 +=$value->total_venta;
        }
        ///////////////////////////////////////////////////////////////////////
        $queryPaso2 = ("
        SELECT
        t_ventas.total_venta
        FROM t_cat_ventas
        INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
        LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
        LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
        WHERE t_cat_ventas.id_empleado= $empleado and t_ventas.tipo =2 AND t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

         ");
         $pas2= DB::select($queryPaso2);

         $PS2 = 0;

         foreach ($pas2 as $key => $value) {
           $PS2 +=$value->total_venta;
         }
         ///////////////////////////////////////////////////////////////////////
         $queryPaso3 = ("
         SELECT
         t_ventas.total_venta
         FROM t_cat_ventas
         INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
         LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
         LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
         WHERE t_cat_ventas.id_empleado= $empleado and t_ventas.tipo =3 AND t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

          ");
          $pas3= DB::select($queryPaso3);

          $PS3 = 0;

          foreach ($pas3 as $key => $value) {
            $PS3 +=$value->total_venta;
          }
          ///////////////////////////////////////////////////////////////////////
          $queryPaso4 = ("
          SELECT
          t_ventas.total_venta
          FROM t_cat_ventas
          INNER JOIN t_ventas ON t_ventas.id = t_cat_ventas.id_venta
          LEFT JOIN empleados ON empleados.id = t_cat_ventas.id_empleado
          LEFT JOIN clientes ON clientes.id = t_cat_ventas.id_cliente
          WHERE t_cat_ventas.id_empleado= $empleado and t_ventas.tipo =4 AND t_cat_ventas.created_at BETWEEN '$fecha11 00:00:00' AND '$fecha22 23:59:59' GROUP BY id_venta

           ");
           $pas4= DB::select($queryPaso4);

           $PS4 = 0;

           foreach ($pas4 as $key => $value) {
             $PS4 +=$value->total_venta;
           }

        //dd($PS1,$PS2,$PS3,$PS4);

      //dd($bienes);
      $data['PS1'] = $PS1;
      $data['PS2'] = $PS2;
      $data['PS3'] = $PS3;
      $data['PS4'] = $PS4;
      $data['servicios'] = $bienes;
      $pdf = PDF::loadView('reportes::nomina', $data);
      $pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
      $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);



      $pdf->output();

      $namePdf = 'ReporteNomina.pdf';
      return $pdf->download($namePdf);
      //return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('reportes::create');
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
        return view('reportes::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('reportes::edit');
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
