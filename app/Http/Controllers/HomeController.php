<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\RolesPermisos;
use \Modules\Usuarios\Entities\ModeloRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \Modules\Ventas\Entities\ServicioVentas;
use \Modules\Clientes\Entities\Clientes;
use \Modules\Empleados\Entities\Empleados;
use \Modules\Catalogos\Entities\Productos;
use \Modules\Catalogos\Entities\Servicios;
use Auth;
use \DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $query ="
      SELECT servicio, SUM(costo_servicio) AS total  FROM t_cat_ventas
      WHERE activo = 1 and modulo = 1 GROUP BY servicio ";
      $cursoss = DB::select($query);

      $nombre_cursos = [];
      $numero_cursos = [];

      $data1 = array();
      $data2 = array();


      foreach ($cursoss as $key => $value) {

        //$value->nombre_curso;

        $data1[] = $value->servicio;
        //$data2[] = $value->total;
        // array_push($nombre_cursos,$value->nombre_curso.',');
        array_push($data2,$value->total);
      }
      $data['data1'] = $data1;

      $data['data2'] = $data2;

      $querys ="
      SELECT servicio, SUM(costo_servicio) AS total  FROM t_cat_ventas
      WHERE activo = 1 and modulo = 1 GROUP BY servicio ";
      $ventas = DB::select($querys);

      $data['ventas'] = $ventas;

      $data['total_clientes'] = Clientes::where([['activo',1],['modulo',1]])->count();
      $data['total_empleados'] = Empleados::where([['activo',1],['modulo',1],['id','!=',1]])->count();
      $data['total_productos'] = Productos::where([['activo',1],['modulo',1]])->count();
      $data['total_servicios'] = Servicios::where([['activo',1]])->count();
      return view('dashboard')->with($data);
    }

    public function dashboard_uno()
    {
      $query ="
      SELECT servicio, SUM(costo_servicio) AS total  FROM t_cat_ventas
      WHERE activo = 1 and modulo = 1 GROUP BY servicio ";
      $cursoss = DB::select($query);

      $nombre_cursos = [];
      $numero_cursos = [];

      $data1 = array();
      $data2 = array();


      foreach ($cursoss as $key => $value) {

        //$value->nombre_curso;

        $data1[] = $value->servicio;
        //$data2[] = $value->total;
        // array_push($nombre_cursos,$value->nombre_curso.',');
        array_push($data2,$value->total);
      }
      $data['data1'] = $data1;

      $data['data2'] = $data2;

      $querys ="
      SELECT servicio, SUM(costo_servicio) AS total  FROM t_cat_ventas
      WHERE activo = 1 and modulo = 1 GROUP BY servicio ";
      $ventas = DB::select($querys);

      $data['ventas'] = $ventas;

      $data['total_clientes'] = Clientes::where([['activo',1],['modulo',1]])->count();
      $data['total_empleados'] = Empleados::where([['activo',1],['modulo',1],['id','!=',1]])->count();
      $data['total_productos'] = Productos::where([['activo',1],['modulo',1]])->count();
      $data['total_servicios'] = Servicios::where([['activo',1]])->count();

      return view('dashboard_uno')->with($data);
      //return view('dashboard_uno');
    }

    public function dashboard_dos()
    {

      $query ="
      SELECT servicio, SUM(costo_servicio) AS total  FROM t_cat_ventas
      WHERE activo = 1 and modulo = 2 GROUP BY servicio ";
      $cursoss = DB::select($query);

      $nombre_cursos = [];
      $numero_cursos = [];

      $data1 = array();
      $data2 = array();


      foreach ($cursoss as $key => $value) {

        //$value->nombre_curso;

        $data1[] = $value->servicio;
        //$data2[] = $value->total;
        // array_push($nombre_cursos,$value->nombre_curso.',');
        array_push($data2,$value->total);
      }
      $data['data1'] = $data1;

      $data['data2'] = $data2;

      $querys ="
      SELECT servicio, SUM(costo_servicio) AS total  FROM t_cat_ventas
      WHERE activo = 1 and modulo = 2 GROUP BY servicio ";
      $ventas = DB::select($querys);

      $data['ventas'] = $ventas;

      $data['total_clientes'] = Clientes::where([['activo',1],['modulo',2]])->count();
      $data['total_empleados'] = Empleados::where([['activo',1],['modulo',2],['id','!=',1]])->count();
      $data['total_productos'] = Productos::where([['activo',1],['modulo',2]])->count();
      $data['total_servicios'] = Servicios::where([['activo',1]])->count();

      return view('dashboard_dos')->with($data);
    }

    public function actualizar(Request $request){
      //dd('entro');

      $roles_permisos = RolesPermisos::where('role_id',Auth::user()->tipo_usuario)->get();
       ModeloRoles::where('model_id',Auth::user()->id)->delete();
       foreach ($roles_permisos as $key => $value) {
         $modelo = new ModeloRoles();
         $modelo->permission_id = $value['permission_id'];
         $modelo->model_type = 'App\Models\User';
         $modelo->model_id = Auth::user()->id;
         $modelo->save();
       }






       return 1;
    }

    public function cumpleanos(){
      return view('promocionmailcumpleanos');

    }
}
