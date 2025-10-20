<?php

namespace Modules\Catalogos\Entities;

use Illuminate\Database\Eloquent\Model;

class Sesiones extends Model{

  protected $table = 'cat_sesiones';
  protected $fillable = [
    'id',
    'numero',
    'cve_usuario',
    'activo',
  ];



}
