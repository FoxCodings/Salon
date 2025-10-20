<?php

namespace Modules\Catalogos2\Entities;

use Illuminate\Database\Eloquent\Model;

class Tipo_Servicio extends Model{

  protected $table = 'cat_tipo_servicio';
  protected $fillable = [
    'id',
    'nombre',
    'activo',
  ];

}
