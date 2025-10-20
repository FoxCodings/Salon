<?php

namespace Modules\Promociones\Entities;

use Illuminate\Database\Eloquent\Model;

class Clientes_Promocion extends Model
{
	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['id','id_promocion','clientes_promocion','activo'];
    protected $table = 'cliente_promocion';


}
