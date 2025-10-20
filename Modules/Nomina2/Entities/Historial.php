<?php

namespace Modules\Nomina2\Entities;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model{

  protected $table = 't_historial_pago';
  protected $fillable = [
    'id',
    'id_empleado',
    'id_semana',
    'semana',
    'fecha_inicio',
    'fecha_fin',
    'fecha_comision',
    'comision',
    'servicio',
    'total_semana',
    'total_comision',
    'activo',
    'cve_usuario',
  ];

}
