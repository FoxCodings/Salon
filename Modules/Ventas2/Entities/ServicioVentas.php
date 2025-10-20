<?php

namespace Modules\Ventas2\Entities;

use Illuminate\Database\Eloquent\Model;

class ServicioVentas extends Model
{

    protected $fillable = ['id','id_venta','servicio','id_cliente','cliente','id_empleado','empleado','costo_servicio','comision','cve_usuario','activo'];
    protected $table = 't_cat_ventas';


}
