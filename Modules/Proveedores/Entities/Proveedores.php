<?php

namespace Modules\Proveedores\Entities;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model{

  protected $table = 'cat_proveedor';
  protected $fillable = [
    'id',
    'nombre',
    'telefono',
    'direccion',
    'correo_electronico',
    // 'modulo',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
