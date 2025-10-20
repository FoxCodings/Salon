<?php

namespace Modules\Usuarios\Entities;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model{

  protected $table = 't_negocio';
  protected $fillable = [
    'id',
    'telefono',
    'direccion',
    'facebook',
    'instagram',
    'nombre',
    'mensaje',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
