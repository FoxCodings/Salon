<?php

namespace Modules\Expedientes\Entities;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{

    protected $fillable = ['id','id_cliente','id_sesion','id_servicio','id_empleado','id_empleado_comision','id_cabina','fecha','hora','importe','cve_usuario','activo'];
    protected $table = 't_expediente';

    public function obtEmpleadoExp(){
      return $this->hasOne('\Modules\Empleados\Entities\Empleados', 'id', 'id_empleado');
    }

    public function obtServicioExp(){
      return $this->hasOne('\Modules\Catalogos2\Entities\Servicios', 'id', 'id_servicio');
    }
}
