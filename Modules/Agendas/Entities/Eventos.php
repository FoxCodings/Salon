<?php

namespace Modules\Agendas\Entities;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model{

  protected $table = 'evento';
  protected $fillable = [
    'id',
    'titulo',
    'descripcion',
    'fecha',
    'modulo',
    'activo',
  ];
  // public function obtCreador(){
  //   return $this->hasOne('\App\User', 'id', 'idUser');
  // }
}
