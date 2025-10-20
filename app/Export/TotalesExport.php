<?php

namespace App\Export;

//use Adldap\Laravel\Facades\Adldap;
//use Adldap\Utilities;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithDrawings;

use DB;
use Auth;

class TotalesExport implements FromView
{
    use Exportable;
    private $data;

    public function __construct($data)
    {
        $this->data = $data;

    }




    public function view(): View
    {
      //dd($this->data,'entro');
      list($fecha_inicio,$fecha_final) = explode(',',$this->data);
      list($dia,$mes,$anio) = explode('-',$fecha_inicio);
      list($dia2,$mes2,$anio2) = explode('-',$fecha_final);

      $fechita = $anio.'-'.$mes.'-'.$dia;
      $fechita2 = $anio2.'-'.$mes2.'-'.$dia2;
      ////////////////////////////////////////////

      $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
      $drawing->setName('Logo');
      $drawing->setDescription('This is my logo');
      $drawing->setPath(public_path('/cremita/img/LOGO SPA.png'));
      $drawing->setHeight(90);
      $drawing->setCoordinates('T2');


      $query  =  ("
      SELECT
      *
      FROM t_cat_ventas
      WHERE  created_at BETWEEN '$fechita 00:00:00' AND '$fechita2 23:59:59'
      ");
      $curso = DB::select($query);

      $query2  =  ("
      SELECT
      SUM(costo_servicio) as total,
      SUM(comision) as total_comision
      FROM t_cat_ventas
      WHERE  created_at BETWEEN '$fechita 00:00:00' AND '$fechita2 23:59:59'
      ");
      $curso2 = DB::select($query2);

      $data['alumno_cursos'] = $curso;
      foreach ($curso2 as $key => $value) {
        //dd($value->total);
        $este = $value->total;
        $esta = $value->total_comision;
      }
      $data['total'] = $este;
      $data['total_comision'] = $esta;
      $data['fecha_1'] = $fecha_inicio;
      $data['fecha_2'] = $fecha_final;
    //  $data['imagen'] = public_path('/cremita/img/LOGO SPA.png');
      // $data['imagen'] = $drawing;
      //dd($data['imagen'],public_path('/cremita/img/LOGO SPA.png'));




      return view('reportes2::reporteTotales')->with($data,$drawing);

    }
}
