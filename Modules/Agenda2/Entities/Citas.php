<?php

namespace Modules\Agenda2\Entities;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model{

  protected $table = 't_calendario';
  protected $fillable = [
    'id',
    'horario',
    'fecha',
    'cabina',
    'servicio',
    'empleado',
    'status',
    'cve_usuario',
    'activo',
  ];

}
