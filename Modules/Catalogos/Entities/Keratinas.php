<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Keratinas extends Model{

  protected $table = 'cat_keratinas';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'cve_usuario',
    'activo',
  ];

}
