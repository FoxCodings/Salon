<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Nanoplastias extends Model{

  protected $table = 'cat_nanoplastia';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'cve_usuario',
    'activo',
  ];

}
