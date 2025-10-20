<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Peinados extends Model{

  protected $table = 'cat_peinados';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'comision',
    'cve_usuario',
    'activo',
  ];

}
