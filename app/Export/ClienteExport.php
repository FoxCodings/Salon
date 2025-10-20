<?php

namespace App\Export;

//use Adldap\Laravel\Facades\Adldap;
//use Adldap\Utilities;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use DB;
use Auth;

class ClienteExport implements FromView
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
      list($id,$fecha_inicio,$fecha_final) = explode(',',$this->data);
      list($dia,$mes,$anio) = explode('-',$fecha_inicio);
      list($dia2,$mes2,$anio2) = explode('-',$fecha_final);

      $fechita = $anio.'-'.$mes.'-'.$dia;
      $fechita2 = $anio2.'-'.$mes2.'-'.$dia2;
      ////////////////////////////////////////////
      $id_usuario_instructor = $this->data;

      $query  =  ("
      SELECT
      *
      FROM t_cat_ventas
      WHERE id_cliente = $id AND created_at BETWEEN '$fechita 00:00:00' AND '$fechita2 23:59:59'
      ");
      $curso = DB::select($query);

      $query2  =  ("
      SELECT
      SUM(costo_servicio) as total
      FROM t_cat_ventas
      WHERE id_cliente = $id AND created_at BETWEEN '$fechita 00:00:00' AND '$fechita2 23:59:59'
      ");
      $curso2 = DB::select($query2);

      $data['alumno_cursos'] = $curso;
      foreach ($curso2 as $key => $value) {
        //dd($value->total);
        $este = $value->total;
      }
      $data['total'] = $este;
      return view('reportes2::reporteCliente')->with($data);

    }
}
