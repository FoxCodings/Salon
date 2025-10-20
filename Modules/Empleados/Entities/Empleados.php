<?php

namespace Modules\Empleados\Entities;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model{

  protected $table = 'empleados';
  protected $fillable = [
    'id',
    'nombre',
    'apellido_paterno',
    'apellido_materno',
    'direccion',
    'telefono',
    'sueldo',
    'modulo',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
