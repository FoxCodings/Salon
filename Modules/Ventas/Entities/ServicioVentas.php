<?php

namespace Modules\Ventas\Entities;

use Illuminate\Database\Eloquent\Model;

class ServicioVentas extends Model
{

    protected $fillable = ['id','id_venta','servicio','id_cliente','cliente','id_empleado','empleado','costo_servicio','comision','cve_usuario','activo','created_at'];
    protected $table = 't_cat_ventas';

    public function obtventas(){
      return $this->hasOne('\Modules\Ventas\Entities\Ventas', 'id', 'id_venta');
    }

    public function obtcliente(){
      return $this->hasOne('\Modules\Clientes\Entities\Clientes', 'id', 'id_cliente');
    }

    public function obtempleado(){
      return $this->hasOne('\Modules\Empleados\Entities\Empleados', 'id', 'id_empleado');
    }


}
