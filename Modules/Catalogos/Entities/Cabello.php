<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Cabello extends Model{

  protected $table = 'cat_cabello';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'comision',
    'cve_usuario',
    'activo',
  ];

}
