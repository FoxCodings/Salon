<?php

namespace Modules\Ventas\Entities;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{

    protected $fillable = ['id','id_cliente','nombre_cliente','apellido_paterno_cliente','apellido_materno_cliente','id_servicios','cliente_id','nombre','apellido_paterno','apellido_materno','telefono','vigencia','tipo','medidas','cve_usuario','activo'];
    protected $table = 't_certificado';

    public function obtservicioCe(){
      return $this->hasOne('\Modules\Catalogos2\Entities\Servicios', 'id', 'id_servicios');
    }

    public function obtclienteCe(){
      return $this->hasOne('\Modules\Clientes2\Entities\Clientes', 'id', 'cliente_id');
    }


}
