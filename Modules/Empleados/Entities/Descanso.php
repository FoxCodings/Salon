<?php

namespace Modules\Empleados\Entities;

use Illuminate\Database\Eloquent\Model;

class Descanso extends Model{

  protected $table = 't_dia_vacaciones';
  protected $fillable = [
    'id',
    'id_empleado',
    'fecha_inicio',
    'fecha_final',
    'dias',
    'cve_usuario',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
