<?php

namespace Modules\Ventas2\Entities;

use Illuminate\Database\Eloquent\Model;

class Prepago extends Model
{

    protected $fillable = ['id','id_agenda','id_empleado','id_empleado_servicio','id_servicio','id_cliente','importe','fecha','hora','cabina','id_calendario','importe_servicio','activo','cve_usuario'];
    protected $table = 't_prepagado';

    public function obtempleado(){
      return $this->hasOne('\Modules\Empleados2\Entities\Empleados', 'id', 'id_empleado');
    }


    public function obtempleadoSrvicio(){
      return $this->hasOne('\Modules\Empleados2\Entities\Empleados', 'id', 'id_empleado_servicio');
    }

    public function obtservicio(){
      return $this->hasOne('\Modules\Catalogos2\Entities\Servicios', 'id', 'id_servicio');
    }


    public function obtcliente(){
      return $this->hasOne('\Modules\Clientes2\Entities\Clientes', 'id', 'id_cliente');
    }


}
