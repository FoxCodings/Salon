<?php

namespace Modules\Promociones2\Entities;

use Illuminate\Database\Eloquent\Model;

class Descuentos extends Model
{

    protected $fillable = ['id','nombre','activo'];
    protected $table = 'cat_descuentos';


}
