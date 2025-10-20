<?php

namespace Modules\Nomina2\Entities;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model{

  protected $table = 't_semana';
  protected $fillable = [
    'id',
    'id_empleado',
    'fecha_inicio',
    'fecha_fin',
    'semana',
    'activo',
    'cve_usuario',
  ];

  public function obtEmpleado(){
    return $this->hasOne('\Modules\Empleados2\Entities\Empleados', 'id', 'id_empleado');
  }

}
