<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Geles extends Model{

  protected $table = 'cat_geles';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'cve_usuario',
    'activo',
  ];

}
