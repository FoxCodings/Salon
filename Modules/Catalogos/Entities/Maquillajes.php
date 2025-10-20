<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Maquillajes extends Model{

  protected $table = 'cat_maquillajes';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'cve_usuario',
    'activo',
  ];

}
