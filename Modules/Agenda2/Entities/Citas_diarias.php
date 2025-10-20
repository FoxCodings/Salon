<?php

namespace Modules\Agenda2\Entities;

use Illuminate\Database\Eloquent\Model;

class Citas_diarias extends Model{

  protected $table = 't_calendario_citas';
  protected $fillable = [
    'id',
    'cabina',
    'horario',
    'fecha',
    'id_calendario',
    'servicio',
    'empleado',
    'cliente',
    'cve_usuario',
    'activo',

  ];

  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'servicio');
  // }

  public function obtEmpleado(){
    return $this->hasOne('\Modules\Empleados2\Entities\Empleados', 'id', 'empleado');
  }


  public function obtCliente(){
    return $this->hasOne('\Modules\Clientes2\Entities\Clientes', 'id', 'cliente');
  }

}
