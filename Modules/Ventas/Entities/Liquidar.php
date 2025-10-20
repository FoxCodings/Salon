<?php

namespace Modules\Ventas\Entities;

use Illuminate\Database\Eloquent\Model;

class Liquidar extends Model
{

    protected $fillable = ['id','id_cliente','id_sesion','id_servicio','id_empleado','id_empleado_comision','id_cabina','importe','importe_total','importe_servicio','fecha','hora','cve_usuario','activo'];
    protected $table = 't_liquidar';

    public function obtservicio(){
      return $this->hasOne('\Modules\Catalogos2\Entities\Servicios', 'id', 'id_servicio');
    }


    public function obtcliente(){
      return $this->hasOne('\Modules\Clientes2\Entities\Clientes', 'id', 'id_cliente');
    }

    public function obtempleado(){
      return $this->hasOne('\Modules\Empleados2\Entities\Empleados', 'id', 'id_empleado');
    }


    public function obtempleadoSrvicio(){
      return $this->hasOne('\Modules\Empleados2\Entities\Empleados', 'id', 'id_empleado_servicio');
    }



}
