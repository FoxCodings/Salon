<?php

namespace Modules\Catalogos2\Entities;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model{

  protected $table = 'cat_productos';
  protected $fillable = [
    'id',
    'id_proveedor',
    'nombre',
    'costo',
    'costo_provedor',
    'stock',
    'cve_usuario',
    'activo',
  ];

  public function obtProveedor(){
    return $this->hasOne('\Modules\Proveedores2\Entities\Proveedores', 'id', 'id_proveedor');
  }

}
