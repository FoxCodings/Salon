<?php

namespace Modules\Empleados\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Empleados\Entities\Empleados;
use \Modules\Empleados\Entities\Descanso;

use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\RolesPermisos;
use \Modules\Usuarios\Entities\ModeloRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;
use \DB;
use Carbon\Carbon;
class EmpleadosController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        $this->user = Auth::user();
        return $next($request);
    });
  }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('empleados::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('empleados::create');
    }

    public function createImagen()
    {
        return view('empleados::crearImagen');
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
      try {


        //dd($request->all());

        if($request->imagenes == NULL || $request->imagen == 0){



          $nomina = new Empleados();
          $nomina->nombre = $request->nombre;
          //$nomina->imagen = $nombreimagen;
          //$nomina->imagen_credencial = $imagen_deco;
          //$nomina->documento = $nombreimagenine;
          $nomina->apellido_paterno = $request->apellido_paterno;
          $nomina->apellido_materno = $request->apellido_materno;
          $nomina->direccion = $request->direccion;
          $nomina->telefono = $request->telefono;
          $nomina->sueldo = $request->sueldo;
          $nomina->inicial = $request->inicial;
          $nomina->dias_vacaciones = $request->dias_vacaciones;
          $nomina->semana_1 = $request->semana_1;
          $nomina->semana_2 = $request->semana_2;
          $nomina->semana_3 = $request->semana_3;
          $nomina->semana_4 = $request->semana_4;
          $nomina->modulo = 1;
          $nomina->cve_usuario = Auth::user()->id;
          $nomina->save();

        }else{

          list($imagen_fierro,$imagen_guardar) = explode(',', $request->imagenes);
          $imagen_deco = base64_decode($imagen_guardar);

          $imagen  = $request->file('imagen');
          $nombreimagen = time().$imagen->getClientOriginalName();
          $imagen->move(public_path().'/storage/',$nombreimagen);


          $imagenine  = $request->file('imagenine');
          $nombreimagenine = time().$imagenine->getClientOriginalName();
          $imagenine->move(public_path().'/storage/',$nombreimagenine);


          $nomina = new Empleados();
          $nomina->nombre = $request->nombre;
          $nomina->imagen = $nombreimagen;
          $nomina->imagen_credencial = $imagen_deco;
          $nomina->documento = $nombreimagenine;
          $nomina->apellido_paterno = $request->apellido_paterno;
          $nomina->apellido_materno = $request->apellido_materno;
          $nomina->direccion = $request->direccion;
          $nomina->telefono = $request->telefono;
          $nomina->sueldo = $request->sueldo;
          $nomina->inicial = $request->inicial;
          $nomina->dias_vacaciones = $request->dias_vacaciones;
          $nomina->semana_1 = $request->semana_1;
          $nomina->semana_2 = $request->semana_2;
          $nomina->semana_3 = $request->semana_3;
          $nomina->semana_4 = $request->semana_4;
          $nomina->modulo = 1;
          $nomina->cve_usuario = Auth::user()->id;
          $nomina->save();
        }





        return response()->json(['success'=>'Se Agrego Satisfactoriamente']);

      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }

    public function GuardarDias(Request $request){

      //dd($request->all());

      list($dias,$mes,$anio) = explode('/',$request->fecha_ini);
      $fechainicial = $anio.'-'.$mes.'-'.$dias;

      list($dias2,$mes2,$anio2) = explode('/',$request->fecha_end);
      $fechafinal = $anio2.'-'.$mes2.'-'.$dias2;

      $fechaEmision = Carbon::parse($fechainicial);
      $fechaExpiracion = Carbon::parse($fechafinal);

      $diasDiferencia = $fechaExpiracion->diffInDays($fechaEmision);

      //dd($diasDiferencia);

      if ($diasDiferencia == 0) {
        $dias_descanso = 1;
      }else{
        $dias_descanso = $diasDiferencia;
      }

      $empleados = Empleados::find($request->id_empleado);

      if ($dias_descanso > $empleados->dias_vacaciones) {
        //dd('son mas dias de lo que es ');
        return response()->json(['warning'=>'Fuera del rango de dias']);
      }else{
        $total_dias = $empleados->dias_vacaciones - $dias_descanso;
        $empleados3 = Empleados::find($request->id_empleado);
        $empleados3->dias_vacaciones = $total_dias;
        $empleados3->cve_usuario = Auth::user()->id;
        $empleados3->save();

        $descanso = new Descanso();
        $descanso->id_empleado = $request->id_empleado;
        $descanso->fecha_inicio = $fechainicial;
        $descanso->fecha_final = $fechafinal;
        $descanso->dias = $dias_descanso;
        $descanso->cve_usuario = Auth::user()->id;
        $descanso->save();

        return response()->json(['success'=>'Dias descontados exitosamente']);
      }

      //dd($total_dias);





    }


    public function ListAVacaciiones(Request $request){
      $descansillo  = Descanso::where([['activo',1],['id_empleado',$request->id]])->get();
      return $descansillo;
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('empleados::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['empleados'] = Empleados::find($id);
        return view('empleados::create')->with($data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
      try {


        if($request->imagenes == NULL || $request->imagen == 0){

          $nomina = Empleados::find($request->id);
          $nomina->nombre = $request->nombre;
          $nomina->apellido_paterno = $request->apellido_paterno;
          $nomina->apellido_materno = $request->apellido_materno;
          $nomina->direccion = $request->direccion;
          $nomina->telefono = $request->telefono;
          $nomina->sueldo = $request->sueldo;
          $nomina->inicial = $request->inicial;
          $nomina->dias_vacaciones = $request->dias_vacaciones;
          $nomina->semana_1 = $request->semana_1;
          $nomina->semana_2 = $request->semana_2;
          $nomina->semana_3 = $request->semana_3;
          $nomina->semana_4 = $request->semana_4;
          $nomina->cve_usuario = Auth::user()->id;
          $nomina->save();

        }else{

          list($imagen_fierro,$imagen_guardar) = explode(',', $request->imagenes);
          $imagen_deco = base64_decode($imagen_guardar);

          $imagen  = $request->file('imagen');
          $nombreimagen = time().$imagen->getClientOriginalName();
          $imagen->move(public_path().'/storage/',$nombreimagen);


          $imagenine  = $request->file('imagenine');
          $nombreimagenine = time().$imagenine->getClientOriginalName();
          $imagenine->move(public_path().'/storage/',$nombreimagenine);

          $nomina = Empleados::find($request->id);
          $nomina->nombre = $request->nombre;
          $nomina->apellido_paterno = $request->apellido_paterno;
          $nomina->apellido_materno = $request->apellido_materno;
          $nomina->direccion = $request->direccion;
          $nomina->telefono = $request->telefono;
          $nomina->sueldo = $request->sueldo;
          $nomina->inicial = $request->inicial;
          $nomina->dias_vacaciones = $request->dias_vacaciones;
          $nomina->semana_1 = $request->semana_1;
          $nomina->semana_2 = $request->semana_2;
          $nomina->semana_3 = $request->semana_3;
          $nomina->semana_4 = $request->semana_4;
          $nomina->cve_usuario = Auth::user()->id;
          $nomina->save();


        }



        return response()->json(['success'=>'Ha sido editado con éxito']);

      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
     public function destroy(Request $request)
     {
       try {
         $usuario = Empleados::find($request->id);
         $usuario->activo = 0;
         $usuario->save();
         return response()->json(['success'=>'Eliminado exitosamente']);
       } catch (\Exception $e) {
         dd($e->getMessage());
       }
     }

    public function tablaempleados(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Empleados::where([['activo', 1],['modulo',1],['id','!=',1]])->get(); //user es una entidad que se trae desde la app
      $datatable = DataTables::of($registros)
      ->make(true);
      //Cueri
      $data = $datatable->getData();
      foreach ($data->data as $key => $value) { //el array acciones se constuye en el helpers dropdown - helpers esta con bootsrap

        // if(Auth::user()->can(['editar usuario','eliminar usuario'])){
        //     $acciones = [
        //       "Editar" => [
        //         "icon" => "edit blue",
        //         "href" => "/usuarios/$value->id/edit" //esta ruta esta en el archivo web
        //       ],
        //       "Eliminar" => [
        //         "icon" => "edit blue",
        //         "onclick" => "eliminar($value->id)"
        //       ],
        //       "Login as" => [ "onclick" => "as('$value->id')" ],
        //     ];
        //   }else if(Auth::user()->can('eliminar usuario')){
        //     $acciones = [
        //       "Eliminar" => [
        //         "icon" => "edit blue",
        //         "onclick" => "eliminar($value->id)"
        //       ],
        //     ];
        //   }else if(Auth::user()->can('editar usuario')){
        //     $acciones = [
        //       "Editar" => [
        //         "icon" => "edit blue",
        //         "href" => "/usuarios/$value->id/edit" //esta ruta esta en el archivo web
        //       ],
        //     ];
        //   }else{

            if ($value->dias_vacaciones == '' || $value->dias_vacaciones == 0) {
              $acciones = [
                "Editar" => [
                  "icon" => "edit blue",
                  "href" => "/empleados/$value->id/edit" //esta ruta esta en el archivo web
                ],
                "Credencial" => [
                  "icon" => "edit blue",
                  "href" => "/empleados/documento/$value->id"
                ],
                // "Asignar Mostrador" => [
                //   "icon" => "edit blue",
                //   "onclick" => "mostrador($value->id)"
                // ],
                // "Vacaciones" => [
                //   "icon" => "edit blue",
                //   "onclick" => "vacaciones($value->id)"
                // ],
                "Eliminar" => [
                  "icon" => "edit blue",
                  "onclick" => "eliminar($value->id)"
                ],
              ];
            }else{
              $acciones = [
                "Editar" => [
                  "icon" => "edit blue",
                  "href" => "/empleados/$value->id/edit" //esta ruta esta en el archivo web
                ],
                "Credencial" => [
                  "icon" => "edit blue",
                  "href" => "/empleados/documento/$value->id"
                ],
                // "Asignar Mostrador" => [
                //   "icon" => "edit blue",
                //   "onclick" => "mostrador($value->id)"
                // ],
                "Vacaciones" => [
                  "icon" => "edit blue",
                  "onclick" => "vacaciones($value->id)"
                ],
                "Lista de Dias" => [
                  "icon" => "edit blue",
                  "onclick" => "Listavacaciones($value->id)"
                ],
                "Eliminar" => [
                  "icon" => "edit blue",
                  "onclick" => "eliminar($value->id)"
                ],
              ];
            }



          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }


    public function documento($id){

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
      $alumnos = Empleados::find($id);
      $data['alumnos'] = Empleados::find($id);


      $nombre_alumno = $alumnos->nombre.' '.$alumnos->apellido_paterno.' '.$alumnos->apellido_materno;
      $pdf = PDF::loadView('empleados::impresion2', $data);
      $pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
      $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);



      $pdf->output();

      $namePdf = 'Credencial_Empleado_'.$nombre_alumno.'.pdf';
      return $pdf->download($namePdf);
      return $pdf->stream();

    // $pdf = \PDF::loadView('documento', ['Data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
    //
    //
    // return $pdf->download('invoice.pdf');

    }

    public function Crearusuariocajero(Request $request){
    //  dd($request->id);
      try {

        $empleado  = Empleados::find($request->id);
        $tipo_usuario = 2;
        $password = 'vitlive';
        $rol = Roles::find($tipo_usuario);

        $usuario = new User();
        $usuario->nombre = $empleado->nombre;
        $usuario->apellido_paterno = $empleado->apellido_paterno;
        $usuario->apellido_materno = $empleado->apellido_materno;
        $usuario->tipo_usuario = $tipo_usuario;
        $usuario->modulo = 1;
        $usuario->name = $empleado->nombre.'.'.$empleado->apellido_paterno;
        $usuario->email = $empleado->email;
        $usuario->password = bcrypt($password);
        $usuario->password_name = $password;
        $usuario->cve_usuario = Auth::user()->id;
        $usuario->assignRole($rol->name);
        $usuario->save();

        $roles_permisos = RolesPermisos::where('role_id',$tipo_usuario)->get();

         foreach ($roles_permisos as $key => $value) {
           $modelo = new ModeloRoles();
           $modelo->permission_id = $value['permission_id'];
           $modelo->model_type = 'App\Models\User';
           $modelo->model_id = $usuario->id;
           $modelo->save();
         }

         return response()->json(['success'=>'Se creo usuario Cajera']);
      } catch (\Exception $e) {
        dd($e->getMessage());
      }


    }
}
