<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Alaciados extends Model{

  protected $table = 'cat_alaciado';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'comision',
    'cve_usuario',
    'activo',
  ];

}
