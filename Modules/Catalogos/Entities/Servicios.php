<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model{

  protected $table = 'cat_servicios';
  protected $fillable = [
    'id',
    'nombre',
  'costo',
  'comision',
  'tipo_servicio',
  'porcentaje',
  'servicio_para',
  'modulo',
  'cve_usuario',
  'activo',
  ];

  public function obtTipoServicio(){
    return $this->hasOne('\Modules\Catalogos\Entities\Tipo_Servicio', 'id', 'tipo_servicio');
  }

}
