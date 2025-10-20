<?php

namespace Modules\Promociones2\Entities;

use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
	protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['id','nombre_promocion','clientes_promocion','descuentos_promocion','descripcion','template','serie_promocion','fecha_inicial_vigencia','fecha_final_vigencia','activo'];

    protected $table = 't_promocion';




}
