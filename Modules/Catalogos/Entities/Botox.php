<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Botox extends Model{

  protected $table = 'cat_botox';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'cve_usuario',
    'activo',
  ];

}
