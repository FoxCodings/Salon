<?php

namespace Modules\Ventas2\Entities;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{

    protected $fillable = ['id','id_usuario','total_venta','descuento','modulo','tipo','cambio','monto','cve_usuario','activo'];
    protected $table = 't_ventas';

    public function obtusuario(){
      return $this->hasOne('\App\Models\User', 'id', 'id_usuario');
    }

    public function obtdescuento(){
      return $this->hasOne('\Modules\Promociones\Entities\Promociones', 'serie_promocion', 'descuento');
    }
}
