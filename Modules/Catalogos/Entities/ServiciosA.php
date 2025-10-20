<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiciosA extends Model{

  protected $table = 'cat_servicios_a';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'comision',
    'cve_usuario',
    'activo',
  ];

}
