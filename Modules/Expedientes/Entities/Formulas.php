<?php

namespace Modules\Expedientes\Entities;

use Illuminate\Database\Eloquent\Model;

class Formulas extends Model
{

    protected $fillable = ['id','id_expediente','id_servicio','id_cliente','formula','mililitros','activo'];
    protected $table = 't_formulas';


}
