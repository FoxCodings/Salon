<?php

namespace Modules\Agenda2\Entities;

use Illuminate\Database\Eloquent\Model;

class ListaEspera extends Model{

  protected $table = 't_lista_espera';
  protected $fillable = [
    'id',
    'id_cliente',
    'fecha',
    'id_servicio',
    'activo',
  ];

  public function obtClientets(){
    return $this->hasOne('\Modules\Clientes2\Entities\Clientes', 'id', 'id_cliente');
  }

  public function obtserviciots(){
    return $this->hasOne('\Modules\Catalogos2\Entities\Servicios', 'id', 'id_servicio');
  }

}
