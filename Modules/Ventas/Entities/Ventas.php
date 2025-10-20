<?php

namespace Modules\Ventas\Entities;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{

    protected $fillable = ['id','id_usuario','total_venta','modulo','descuento','tipo','cambio','monto','cve_usuario','activo','created_at'];
    protected $table = 't_ventas';

    public function obtusuario(){
      return $this->hasOne('\App\Models\User', 'id', 'id_usuario');
    }

    public function obtdescuento(){
      return $this->hasOne('\Modules\Promociones\Entities\Promociones', 'serie_promocion', 'descuento');
    }
}
