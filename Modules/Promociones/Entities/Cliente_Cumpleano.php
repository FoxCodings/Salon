<?php

namespace Modules\Promociones\Entities;

use Illuminate\Database\Eloquent\Model;

class Cliente_Cumpleano extends Model
{
	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['id','correo_electronico','nombre','activo'];
    protected $table = 'cliente_cumpleano';


}
