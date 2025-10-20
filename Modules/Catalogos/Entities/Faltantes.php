<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Faltantes extends Model{

  protected $table = 'cat_producto_faltante';
  protected $fillable = [
    'id',
    'nombre',
    'cantidad',
    'cve_usuario',
    'activo',
  ];

  // public function obtTipoServicio(){
  //   return $this->hasOne('\Modules\Catalogos2\Entities\Tipo_Servicio', 'id', 'tipo_servicio');
  // }

}
