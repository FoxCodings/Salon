<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model{

  protected $table = 't_archivos_recomendacion';
  protected $fillable = [
    'id',
    'id_empleado',
    'anios',
    'meses',
    'tipo_empleado',
    'funcion',
    'activo',
    'cve_usuario',
  ];
  public function obtEmpleados(){
    return $this->hasOne('\Modules\Empleados2\Entities\Empleados', 'id', 'id_empleado');
  }
}
