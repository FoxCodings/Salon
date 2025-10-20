<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiciosEX extends Model{

  protected $table = 'cat_servicios_ex';
  protected $fillable = [
    'id',
    'nombre',
    'costo',
    'comision',
    'cve_usuario',
    'activo',
  ];

}
