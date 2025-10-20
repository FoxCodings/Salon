<?php

namespace Modules\Agendas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Agendas\Entities\Eventos;
use \Modules\Agendas\Entities\Citas;
use \Modules\Agendas\Entities\ListaEspera;
use \Modules\Agendas\Entities\Citas_diarias;
use \Modules\Catalogos\Entities\Servicios;
use \Modules\Clientes\Entities\Clientes;
use \Modules\Empleados\Entities\Empleados;
use \Modules\Ventas\Entities\Prepago;
use \Modules\Ventas\Entities\Liquidar;
use \Modules\Expedientes\Entities\Expediente;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use \Modules\Catalogos\Entities\Alaciados;
use \Modules\Catalogos\Entities\Cabello;
use \Modules\Catalogos\Entities\Fasts;
use \Modules\Catalogos\Entities\Peinados;
use \Modules\Catalogos\Entities\Pestanas;
use \Modules\Catalogos\Entities\ServiciosA;
use \Modules\Catalogos\Entities\ServiciosEX;
use \Modules\Catalogos\Entities\Shellac;
use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\Permisos;
use \Modules\Promociones\Entities\Descuentos;
use Luecano\NumeroALetras\NumeroALetras;
use \Modules\Promociones\Entities\Cliente_Cumpleano;
use \Modules\Ventas\Entities\Ventas;
use \Modules\Ventas\Entities\ServicioVentas;
use \Modules\Catalogos\Entities\Productos;
use \Modules\Ventas\Entities\Certificado;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;

class AgendasController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */

   public function __construct()
   {
     $this->middleware('auth');
     $this->middleware(function ($request, $next) {
         $this->user = Auth::user();
         return $next($request);
     });
   }

  public function index()
  {
    $data['clientes'] = Clientes::where([['activo',1],['modulo',1]])->get();
    $data['empleados'] = Empleados::where([['activo',1],['modulo',1]])->get();
    $data['citas'] = Citas::where([['activo',1]])->get();
    $data['servicios'] = Servicios::where([['activo',1],['modulo',1]])->get();


    $data['id_cotizadores'] = Citas_diarias::where([
      ['activo',1],
      ['modulo',1],
    ])->select('fecha')->groupBy('fecha')->get();
    return view('agendas::index')->with($data);
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
      return view('agendas::create');
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Renderable
   */
  public function store(Request $request)
  {
    try {

      list($dia,$mes,$anio)=explode('/',$request->fecha);
      $fecha = $anio.'-'.$mes.'-'.$dia;
      dd($request->all());
      $evento = new Eventos();
      $evento->titulo = $request->titulo;
      $evento->servicio = $request->servicio;
      $evento->descripcion = $request->descripcion;
      $evento->fecha = $fecha;
      $evento->modulo = 1;
      $evento->cve_usuario = Auth::user()->id;
      $evento->save();
      return response()->json(['success'=>'Se Agrego Satisfactoriamente']);

    } catch (\Exception $e) {
      dd($e->getMessage());
    }

  }

  public function traerHoras(Request $request){
    $citas = Citas::where([['activo',1]])->get();
    return $citas;
  }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function inicio(){

    $data['clientes'] = Clientes::where([['activo',1],['modulo',1]])->get();
    $data['empleados'] = Empleados::where([['activo',1],['modulo',1]])->get();
    $data['citas'] = Citas::where([['activo',1]])->get();
    $data['servicios'] = Servicios::where([['activo',1],['modulo',1]])->get();
    $data['lista_espera'] = ListaEspera::where([['activo',1]])->get();

    $data['id_cotizadores'] = Citas_diarias::where([
      ['activo',1],
      ['modulo',1],
    ])->select('fecha')->groupBy('fecha')->get();
    return view('agendas::inicio')->with($data);
  }
  public function vistas($id)
  {
      //$data['id'] = $id;
      list($anio,$mes,$dia) = explode('-',$id);


      if ($mes == 1) {
        $meses = 'Enero';
      }else if($mes == 2){
        $meses = 'Febrero';
      }else if($mes == 3){
        $meses = 'Marzo';
      }else if($mes == 4){
        $meses = 'Abril';
      }else if($mes == 5){
        $meses = 'Mayo';
      }else if($mes == 6){
        $meses = 'Junio';
      }else if($mes == 7){
        $meses = 'Julio';
      }else if($mes == 8){
        $meses = 'Agosto';
      }else if($mes == 9){
        $meses = 'Septiembre';
      }else if($mes == 10){
        $meses = 'Octubre';
      }else if($mes == 11){
        $meses = 'Noviembre';
      }else if($mes == 12){
        $meses = 'Diciembre';
      }
      $fecha = $dia.' '.$meses.' '.$anio;
      $fechsa = $anio.'-'.$mes.'-'.$dia;
      $data['fechas'] = $fecha;
      $data['id'] = $fechsa;
      $data['anio'] = $anio;
      $data['mes'] = $mes;
      $data['dia'] = $dia;
      $data['fecha_atras'] = $id;

      $data['clientes'] = Clientes::where([['activo',1],['modulo',1]])->get();
    //  $data['clientes2'] = Clientes::where([['activo',1],['modulo',1],['id',1563]])->get();
      $data['empleado_inicial'] = Empleados::where([['activo',1],['modulo',1],['id','!=',1]])->get();
      $data['empleados'] = Empleados::where([['activo',1],['modulo',1],['id','!=',1]])->get();
      $data['citas'] = Citas::where([['activo',1]])->get();
      $data['servicios'] = Servicios::where([['activo',1],['modulo',1]])->get();
      $data['lista_espera'] = ListaEspera::where([['activo',1]])->get();

      $data['id_cotizadores'] = Citas_diarias::where([
        ['activo',1],
        ['modulo',1],
      ])->select('fecha')->groupBy('fecha')->get();
      /////////////////////////////////////////////////////////////////////
      $anio = date('Y');
      $mes = date('m');
      $date = $anio.'-'.$mes.'-'.'01';
      $fecho = date("Y-m-t", strtotime($date));


        //$data['clientes'] = [['correo_electronico' => $cliente_id, 'nombre' => $cliente_nombre]];

        $bienes_query = ("
        (SELECT * FROM cat_alaciado WHERE activo = 1 )
          UNION
          (SELECT * FROM cat_cabello WHERE activo = 1)
          UNION
          (SELECT * FROM cat_fasts WHERE activo = 1)
          UNION
          (SELECT * FROM cat_pestanas WHERE activo = 1)
          UNION
          (SELECT * FROM cat_servicios_a WHERE activo = 1)
          UNION
          (SELECT * FROM cat_servicios_ex WHERE activo = 1)
          UNION
          (SELECT * FROM cat_shellac WHERE activo = 1)

         ");
         $bienes= DB::select($bienes_query);

         $a = Alaciados::where('activo',1);
         $b = Cabello::where('activo',1);
         $c = Fasts::where('activo',1);
         $d = Peinados::where('activo',1);
         $e = Pestanas::where('activo',1);
         $f = ServiciosA::where('activo',1);
         $g = ServiciosEX::where('activo',1);
         $todo = Shellac::where('activo',1)->union($a)->union($b)->union($c)->union($d)->union($e)->union($f)->union($g)->paginate(20);
         $result = $todo;


         $a = Alaciados::where('activo',1);
         $b = Cabello::where('activo',1);
         $c = Fasts::where('activo',1);
         $d = Peinados::where('activo',1);
         $e = Pestanas::where('activo',1);
         $f = ServiciosA::where('activo',1);
         $g = ServiciosEX::where('activo',1);
         $todo = Shellac::where('activo',1)->union($a)->union($b)->union($c)->union($d)->union($e)->union($f)->union($g)->paginate(20);
         $result = $todo;


         //dd($result);

      $data['roles'] = Roles::all();
      $data['permisos'] = Permisos::where('activo',1)->get();
      $data['tratamientos'] = Alaciados::where('activo',1)->get();
      $data['descuentos'] = Descuentos::where('activo',1)->get();
      $data['cabellos'] = Cabello::where('activo',1)->get();
      $data['fasts'] = Fasts::where('activo',1)->get();
      $data['peinados'] = Peinados::where('activo',1)->get();
      $data['pestanas'] = Pestanas::where('activo',1)->get();
      $data['serviciosa'] = ServiciosA::where('activo',1)->get();
      $data['servicioses'] = ServiciosEX::where('activo',1)->get();
      $data['shellacs'] = Shellac::where('activo',1)->get();
      //$data['clientes'] = Clientes::where([['activo',1],['modulo',1]])->get();
      //$data['empleados'] = Empleados::where([['activo',1],['modulo',1]])->get();
      $data['servicios'] = $result;


      $data['citas'] = Citas::where([['activo',1]])->get();
      $data['servicios'] = Servicios::where([['activo',1]])->get();


      $data['id_cotizadores'] = Citas_diarias::where([
        ['activo',1],
      ])->select('fecha')->groupBy('fecha')->get();
      return view('agendas::vista')->with($data);
  }

  public function AgregarClienteEspera(Request $request){
    //dd($request->fecha);
    list($dia,$mes,$anio) = explode('/',$request->fecha);
    $fecha = $anio.'-'.$mes.'-'.$dia;
    $cliente_espera = new ListaEspera();
    $cliente_espera->id_cliente =$request->clientes;
    $cliente_espera->fecha =$fecha;
    $cliente_espera->id_servicio =$request->servicios;
    $cliente_espera->save();

    return $cliente_espera;
  }

  public function ClienteAgendado(Request $request){
    $clienteagendado = ListaEspera::find($request->id);
    $clienteagendado->activo = 0;
    $clienteagendado->save();

    return $clienteagendado;
  }

  //ListaEspera

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit($id)
  {
      $data['eventos'] = Eventos::find($id);
      return view('agendas::create')->with($data);
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
      //dd($request->all());
      date_default_timezone_set('America/Mexico_city');


      if ($request->id == 0) {

        if ($request->este == 2) {

          if ($request->este4 == 1) {
            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;


            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            ///////// agregar a todos las citas diarias estos dos nuevos campos y en edicion ver como puse cuando editas esta en en numero 7
            $evento_cita->modulo = 1;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();


          }else if($request->este4 == 2){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();
            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 3){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 4){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 5){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 6){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 7){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 8){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 9){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 10){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 11){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();

            $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;

            $evento_cita11 = new Citas_diarias();
            $evento_cita11->cabina = $request->numero_cabina;
            $evento_cita11->id_calendario =$cabina_siguienbte10;
            $evento_cita11->cliente = $request->clientes;
            $evento_cita11->empleado = $request->empleados;
            $evento_cita11->empleado_servicio = $request->este2;
            $evento_cita11->comision_servicio = $request->este3;
            $evento_cita11->duracion = $request->este4;
            $evento_cita11->status = $request->este;
            $evento_cita11->descripcion = $request->descripcion;
            $evento_cita11->fecha = $request->fecha_cabina;
            $evento_cita11->horario = $nuevaHora;
            $evento_cita11->servicio = $request->servicios;
            $evento_cita11->telefono_cliente = $request->telefono;
            $evento_cita11->cve_usuario = Auth::user()->id;
            $evento_cita11->modulo = 1;
            $evento_cita11->empleado_servicio = $request->empleado_servicio;
            $evento_cita11->comision_servicio = $request->comision_empleado;
            $evento_cita11->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 12){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();

            $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;

            $evento_cita11 = new Citas_diarias();
            $evento_cita11->cabina = $request->numero_cabina;
            $evento_cita11->id_calendario =$cabina_siguienbte10;
            $evento_cita11->cliente = $request->clientes;
            $evento_cita11->empleado = $request->empleados;
            $evento_cita11->empleado_servicio = $request->este2;
            $evento_cita11->comision_servicio = $request->este3;
            $evento_cita11->duracion = $request->este4;
            $evento_cita11->status = $request->este;
            $evento_cita11->descripcion = $request->descripcion;
            $evento_cita11->fecha = $request->fecha_cabina;
            $evento_cita11->horario = $nuevaHora;
            $evento_cita11->servicio = $request->servicios;
            $evento_cita11->telefono_cliente = $request->telefono;
            $evento_cita11->cve_usuario = Auth::user()->id;
            $evento_cita11->modulo = 1;
            $evento_cita11->empleado_servicio = $request->empleado_servicio;
            $evento_cita11->comision_servicio = $request->comision_empleado;
            $evento_cita11->save();

            $cabina_siguienbte11 = $evento_cita11->id_calendario + 1;

            $evento_cita12 = new Citas_diarias();
            $evento_cita12->cabina = $request->numero_cabina;
            $evento_cita12->id_calendario =$cabina_siguienbte11;
            $evento_cita12->cliente = $request->clientes;
            $evento_cita12->empleado = $request->empleados;
            $evento_cita12->empleado_servicio = $request->este2;
            $evento_cita12->comision_servicio = $request->este3;
            $evento_cita12->duracion = $request->este4;
            $evento_cita12->status = $request->este;
            $evento_cita12->descripcion = $request->descripcion;
            $evento_cita12->fecha = $request->fecha_cabina;
            $evento_cita12->horario = $nuevaHora;
            $evento_cita12->servicio = $request->servicios;
            $evento_cita12->telefono_cliente = $request->telefono;
            $evento_cita12->cve_usuario = Auth::user()->id;
            $evento_cita12->modulo = 1;
            $evento_cita12->empleado_servicio = $request->empleado_servicio;
            $evento_cita12->comision_servicio = $request->comision_empleado;
            $evento_cita12->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }




          $servicois = Servicios::find($request->servicios);
          //dd($servicois);

          if ($servicois->tipo_servicio ==  2) {
          //dd('servicio largo agregar');

            $total_sesion = $servicois->costo / $servicois->sesiones;
            $liquidar = new Liquidar();
            $liquidar->id_cita = $evento_cita->id;
            $liquidar->id_cliente = $request->clientes;
            $liquidar->id_sesion = $request->sesion_cita;
            $liquidar->id_servicio = $request->servicios;
            $liquidar->id_empleado = $request->empleados;
            $liquidar->id_empleado_comision = $request->este2;
            $liquidar->id_cabina = $request->numero_cabina;
            $liquidar->fecha = $request->fecha_cabina;
            $liquidar->hora = $request->hora_cabina;
            $liquidar->importe = round($total_sesion);
            $liquidar->importe_total = $servicois->costo;
            $liquidar->importe_servicio = $request->este3;
            $liquidar->cve_usuario = Auth::user()->id;
            $liquidar->save();


            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();




          }else{
            $prepago = new Prepago();
            $prepago->id_agenda = $evento_cita->id;
            $prepago->cabina = $request->numero_cabina;
            $prepago->id_calendario = $request->id_calendario;
            $prepago->id_cliente = $request->clientes;
            $prepago->id_empleado = $request->empleados;
            $prepago->id_empleado_servicio = $request->este2;
            $prepago->fecha = $request->fecha_cabina;
            $prepago->hora = $request->hora_cabina;
            $prepago->id_servicio = $request->servicios;
            $prepago->importe = $servicois->costo;
            $prepago->importe_servicio = $request->este3;
            $prepago->cve_usuario = Auth::user()->id;
            $prepago->save();



          }



        }else if($request->este == 3){
          //dd('entro agregar');
          $ora = [];
          $liquidare = Liquidar::where([['id_servicio',$request->servicios],['id_cliente',$request->clientes],['status',2]])->first();
          // foreach ($liquidare as $key => $value) {
          //   array_push($ora,$value['id']);
          // }
          //dd($liquidare->importe_total);
          if ($request->este4 == 1) {
            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->tipo = $request->tipo;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

          }else if($request->este4 == 2){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->tipo = $request->tipo;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

            $cabina_siguienbte = $request->id_calendario + 1;


            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->tipo = $request->tipo;
            $evento_cita2->modulo = 1;
            $evento_cita2->tipo_cabello = $request->tipo_cabello;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->save();

          }else if($request->este4 == 3){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 4){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 5){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 6){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 7){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 8){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 9){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 10){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 11){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();

            $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;

            $evento_cita11 = new Citas_diarias();
            $evento_cita11->cabina = $request->numero_cabina;
            $evento_cita11->id_calendario =$cabina_siguienbte10;
            $evento_cita11->cliente = $request->clientes;
            $evento_cita11->empleado = $request->empleados;
            $evento_cita11->empleado_servicio = $request->este2;
            $evento_cita11->comision_servicio = $request->este3;
            $evento_cita11->duracion = $request->este4;
            $evento_cita11->status = $request->este;
            $evento_cita11->descripcion = $request->descripcion;
            $evento_cita11->fecha = $request->fecha_cabina;
            $evento_cita11->horario = $nuevaHora;
            $evento_cita11->servicio = $request->servicios;
            $evento_cita11->telefono_cliente = $request->telefono;
            $evento_cita11->cve_usuario = Auth::user()->id;
            $evento_cita11->modulo = 1;
            $evento_cita11->empleado_servicio = $request->empleado_servicio;
            $evento_cita11->comision_servicio = $request->comision_empleado;
            $evento_cita11->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 12){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();

            $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;

            $evento_cita11 = new Citas_diarias();
            $evento_cita11->cabina = $request->numero_cabina;
            $evento_cita11->id_calendario =$cabina_siguienbte10;
            $evento_cita11->cliente = $request->clientes;
            $evento_cita11->empleado = $request->empleados;
            $evento_cita11->empleado_servicio = $request->este2;
            $evento_cita11->comision_servicio = $request->este3;
            $evento_cita11->duracion = $request->este4;
            $evento_cita11->status = $request->este;
            $evento_cita11->descripcion = $request->descripcion;
            $evento_cita11->fecha = $request->fecha_cabina;
            $evento_cita11->horario = $nuevaHora;
            $evento_cita11->servicio = $request->servicios;
            $evento_cita11->telefono_cliente = $request->telefono;
            $evento_cita11->cve_usuario = Auth::user()->id;
            $evento_cita11->modulo = 1;
            $evento_cita11->empleado_servicio = $request->empleado_servicio;
            $evento_cita11->comision_servicio = $request->comision_empleado;
            $evento_cita11->save();

            $cabina_siguienbte11 = $evento_cita11->id_calendario + 1;

            $evento_cita12 = new Citas_diarias();
            $evento_cita12->cabina = $request->numero_cabina;
            $evento_cita12->id_calendario =$cabina_siguienbte11;
            $evento_cita12->cliente = $request->clientes;
            $evento_cita12->empleado = $request->empleados;
            $evento_cita12->empleado_servicio = $request->este2;
            $evento_cita12->comision_servicio = $request->este3;
            $evento_cita12->duracion = $request->este4;
            $evento_cita12->status = $request->este;
            $evento_cita12->descripcion = $request->descripcion;
            $evento_cita12->fecha = $request->fecha_cabina;
            $evento_cita12->horario = $nuevaHora;
            $evento_cita12->servicio = $request->servicios;
            $evento_cita12->telefono_cliente = $request->telefono;
            $evento_cita12->cve_usuario = Auth::user()->id;
            $evento_cita12->modulo = 1;
            $evento_cita12->empleado_servicio = $request->empleado_servicio;
            $evento_cita12->comision_servicio = $request->comision_empleado;
            $evento_cita12->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }


          // $evento_cita = new Citas_diarias();
          // $evento_cita->cabina = $request->numero_cabina;
          // $evento_cita->id_calendario = $request->id_calendario;
          // $evento_cita->cliente = $request->clientes;
          // $evento_cita->empleado = $request->empleados;
          // $evento_cita->empleado_servicio = $request->este2;
          // $evento_cita->comision_servicio = $request->este3;
          // $evento_cita->duracion = $request->este4;
          // $evento_cita->status = $request->este;
          // $evento_cita->descripcion = $request->descripcion;
          // $evento_cita->fecha = $request->fecha_cabina;
          // $evento_cita->horario = $request->hora_cabina;
          // $evento_cita->servicio = $request->servicios;
          // $evento_cita->telefono_cliente = $request->telefono;
          // $evento_cita->cve_usuario = Auth::user()->id;
          // $evento_cita->save();

          $servicois = Servicios::find($request->servicios);


          if (isset($liquidare)) {
            $prepago = new Prepago();
            $prepago->id_agenda = $evento_cita->id;
            $prepago->cabina = $request->numero_cabina;
            $prepago->id_calendario = $request->id_calendario;
            $prepago->id_cliente = $request->clientes;
            $prepago->id_empleado = $request->empleados;
            $prepago->id_empleado_servicio = $request->este2;
            $prepago->fecha = $request->fecha_cabina;
            $prepago->hora = $request->hora_cabina;
            $prepago->id_servicio = $request->servicios;
            $prepago->importe = $liquidare->importe_total;
            $prepago->importe_servicio = $request->este3;
            $prepago->cve_usuario = Auth::user()->id;
            $prepago->save();
          }else{
            $prepago = new Prepago();
            $prepago->id_agenda = $evento_cita->id;
            $prepago->cabina = $request->numero_cabina;
            $prepago->id_calendario = $request->id_calendario;
            $prepago->id_cliente = $request->clientes;
            $prepago->id_empleado = $request->empleados;
            $prepago->id_empleado_servicio = $request->este2;
            $prepago->fecha = $request->fecha_cabina;
            $prepago->hora = $request->hora_cabina;
            $prepago->id_servicio = $request->servicios;
            $prepago->importe = $servicois->costo;
            $prepago->importe_servicio = $request->este3;
            $prepago->cve_usuario = Auth::user()->id;
            $prepago->save();
          }








        }else if ($request->este == 4){

          if ($request->este4 == 1) {
            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->tipo = $request->tipo;
            $evento_cita->modulo = 1;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();

          }else if($request->este4 == 2){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->tipo = $request->tipo;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();
            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->tipo = $request->tipo;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->tipo_cabello = $request->tipo_cabello;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->save();

          }else if($request->este4 == 3){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 4){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 5){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 6){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 7){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 8){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 9){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 10){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 11){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();

            $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;

            $evento_cita11 = new Citas_diarias();
            $evento_cita11->cabina = $request->numero_cabina;
            $evento_cita11->id_calendario =$cabina_siguienbte10;
            $evento_cita11->cliente = $request->clientes;
            $evento_cita11->empleado = $request->empleados;
            $evento_cita11->empleado_servicio = $request->este2;
            $evento_cita11->comision_servicio = $request->este3;
            $evento_cita11->duracion = $request->este4;
            $evento_cita11->status = $request->este;
            $evento_cita11->descripcion = $request->descripcion;
            $evento_cita11->fecha = $request->fecha_cabina;
            $evento_cita11->horario = $nuevaHora;
            $evento_cita11->servicio = $request->servicios;
            $evento_cita11->telefono_cliente = $request->telefono;
            $evento_cita11->cve_usuario = Auth::user()->id;
            $evento_cita11->modulo = 1;
            $evento_cita11->empleado_servicio = $request->empleado_servicio;
            $evento_cita11->comision_servicio = $request->comision_empleado;
            $evento_cita11->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 12){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = new Citas_diarias();
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->modulo = 1;
            $evento_cita->empleado_servicio = $request->empleado_servicio;
            $evento_cita->comision_servicio = $request->comision_empleado;
            $evento_cita->save();


            $cabina_siguienbte = $request->id_calendario + 1;

            $evento_cita2 = new Citas_diarias();
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario =$cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $request->este;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->fecha = $request->fecha_cabina;
            //$evento_cita2->horario = $nuevaHora;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->modulo = 1;
            $evento_cita2->empleado_servicio = $request->empleado_servicio;
            $evento_cita2->comision_servicio = $request->comision_empleado;
            $evento_cita2->save();

            $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;

            $evento_cita3 = new Citas_diarias();
            $evento_cita3->cabina = $request->numero_cabina;
            $evento_cita3->id_calendario =$cabina_siguienbte2;
            $evento_cita3->cliente = $request->clientes;
            $evento_cita3->empleado = $request->empleados;
            $evento_cita3->empleado_servicio = $request->este2;
            $evento_cita3->comision_servicio = $request->este3;
            $evento_cita3->duracion = $request->este4;
            $evento_cita3->status = $request->este;
            $evento_cita3->descripcion = $request->descripcion;
            $evento_cita3->fecha = $request->fecha_cabina;
            $evento_cita3->horario = $nuevaHora;
            $evento_cita3->servicio = $request->servicios;
            $evento_cita3->telefono_cliente = $request->telefono;
            $evento_cita3->cve_usuario = Auth::user()->id;
            $evento_cita3->modulo = 1;
            $evento_cita3->empleado_servicio = $request->empleado_servicio;
            $evento_cita3->comision_servicio = $request->comision_empleado;
            $evento_cita3->save();

            $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;

            $evento_cita4 = new Citas_diarias();
            $evento_cita4->cabina = $request->numero_cabina;
            $evento_cita4->id_calendario =$cabina_siguienbte3;
            $evento_cita4->cliente = $request->clientes;
            $evento_cita4->empleado = $request->empleados;
            $evento_cita4->empleado_servicio = $request->este2;
            $evento_cita4->comision_servicio = $request->este3;
            $evento_cita4->duracion = $request->este4;
            $evento_cita4->status = $request->este;
            $evento_cita4->descripcion = $request->descripcion;
            $evento_cita4->fecha = $request->fecha_cabina;
            $evento_cita4->horario = $nuevaHora;
            $evento_cita4->servicio = $request->servicios;
            $evento_cita4->telefono_cliente = $request->telefono;
            $evento_cita4->cve_usuario = Auth::user()->id;
            $evento_cita4->modulo = 1;
            $evento_cita4->empleado_servicio = $request->empleado_servicio;
            $evento_cita4->comision_servicio = $request->comision_empleado;
            $evento_cita4->save();

            $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;

            $evento_cita5 = new Citas_diarias();
            $evento_cita5->cabina = $request->numero_cabina;
            $evento_cita5->id_calendario =$cabina_siguienbte4;
            $evento_cita5->cliente = $request->clientes;
            $evento_cita5->empleado = $request->empleados;
            $evento_cita5->empleado_servicio = $request->este2;
            $evento_cita5->comision_servicio = $request->este3;
            $evento_cita5->duracion = $request->este4;
            $evento_cita5->status = $request->este;
            $evento_cita5->descripcion = $request->descripcion;
            $evento_cita5->fecha = $request->fecha_cabina;
            $evento_cita5->horario = $nuevaHora;
            $evento_cita5->servicio = $request->servicios;
            $evento_cita5->telefono_cliente = $request->telefono;
            $evento_cita5->cve_usuario = Auth::user()->id;
            $evento_cita5->modulo = 1;
            $evento_cita5->empleado_servicio = $request->empleado_servicio;
            $evento_cita5->comision_servicio = $request->comision_empleado;
            $evento_cita5->save();

            $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;

            $evento_cita6 = new Citas_diarias();
            $evento_cita6->cabina = $request->numero_cabina;
            $evento_cita6->id_calendario =$cabina_siguienbte5;
            $evento_cita6->cliente = $request->clientes;
            $evento_cita6->empleado = $request->empleados;
            $evento_cita6->empleado_servicio = $request->este2;
            $evento_cita6->comision_servicio = $request->este3;
            $evento_cita6->duracion = $request->este4;
            $evento_cita6->status = $request->este;
            $evento_cita6->descripcion = $request->descripcion;
            $evento_cita6->fecha = $request->fecha_cabina;
            $evento_cita6->horario = $nuevaHora;
            $evento_cita6->servicio = $request->servicios;
            $evento_cita6->telefono_cliente = $request->telefono;
            $evento_cita6->cve_usuario = Auth::user()->id;
            $evento_cita6->modulo = 1;
            $evento_cita6->empleado_servicio = $request->empleado_servicio;
            $evento_cita6->comision_servicio = $request->comision_empleado;
            $evento_cita6->save();

            $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;

            $evento_cita7 = new Citas_diarias();
            $evento_cita7->cabina = $request->numero_cabina;
            $evento_cita7->id_calendario =$cabina_siguienbte6;
            $evento_cita7->cliente = $request->clientes;
            $evento_cita7->empleado = $request->empleados;
            $evento_cita7->empleado_servicio = $request->este2;
            $evento_cita7->comision_servicio = $request->este3;
            $evento_cita7->duracion = $request->este4;
            $evento_cita7->status = $request->este;
            $evento_cita7->descripcion = $request->descripcion;
            $evento_cita7->fecha = $request->fecha_cabina;
            $evento_cita7->horario = $nuevaHora;
            $evento_cita7->servicio = $request->servicios;
            $evento_cita7->telefono_cliente = $request->telefono;
            $evento_cita7->cve_usuario = Auth::user()->id;
            $evento_cita7->modulo = 1;
            $evento_cita7->empleado_servicio = $request->empleado_servicio;
            $evento_cita7->comision_servicio = $request->comision_empleado;
            $evento_cita7->save();

            $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;

            $evento_cita8 = new Citas_diarias();
            $evento_cita8->cabina = $request->numero_cabina;
            $evento_cita8->id_calendario =$cabina_siguienbte7;
            $evento_cita8->cliente = $request->clientes;
            $evento_cita8->empleado = $request->empleados;
            $evento_cita8->empleado_servicio = $request->este2;
            $evento_cita8->comision_servicio = $request->este3;
            $evento_cita8->duracion = $request->este4;
            $evento_cita8->status = $request->este;
            $evento_cita8->descripcion = $request->descripcion;
            $evento_cita8->fecha = $request->fecha_cabina;
            $evento_cita8->horario = $nuevaHora;
            $evento_cita8->servicio = $request->servicios;
            $evento_cita8->telefono_cliente = $request->telefono;
            $evento_cita8->cve_usuario = Auth::user()->id;
            $evento_cita8->modulo = 1;
            $evento_cita8->empleado_servicio = $request->empleado_servicio;
            $evento_cita8->comision_servicio = $request->comision_empleado;
            $evento_cita8->save();

            $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;

            $evento_cita9 = new Citas_diarias();
            $evento_cita9->cabina = $request->numero_cabina;
            $evento_cita9->id_calendario =$cabina_siguienbte8;
            $evento_cita9->cliente = $request->clientes;
            $evento_cita9->empleado = $request->empleados;
            $evento_cita9->empleado_servicio = $request->este2;
            $evento_cita9->comision_servicio = $request->este3;
            $evento_cita9->duracion = $request->este4;
            $evento_cita9->status = $request->este;
            $evento_cita9->descripcion = $request->descripcion;
            $evento_cita9->fecha = $request->fecha_cabina;
            $evento_cita9->horario = $nuevaHora;
            $evento_cita9->servicio = $request->servicios;
            $evento_cita9->telefono_cliente = $request->telefono;
            $evento_cita9->cve_usuario = Auth::user()->id;
            $evento_cita9->modulo = 1;
            $evento_cita9->empleado_servicio = $request->empleado_servicio;
            $evento_cita9->comision_servicio = $request->comision_empleado;
            $evento_cita9->save();

            $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;

            $evento_cita10 = new Citas_diarias();
            $evento_cita10->cabina = $request->numero_cabina;
            $evento_cita10->id_calendario =$cabina_siguienbte9;
            $evento_cita10->cliente = $request->clientes;
            $evento_cita10->empleado = $request->empleados;
            $evento_cita10->empleado_servicio = $request->este2;
            $evento_cita10->comision_servicio = $request->este3;
            $evento_cita10->duracion = $request->este4;
            $evento_cita10->status = $request->este;
            $evento_cita10->descripcion = $request->descripcion;
            $evento_cita10->fecha = $request->fecha_cabina;
            $evento_cita10->horario = $nuevaHora;
            $evento_cita10->servicio = $request->servicios;
            $evento_cita10->telefono_cliente = $request->telefono;
            $evento_cita10->cve_usuario = Auth::user()->id;
            $evento_cita10->modulo = 1;
            $evento_cita10->empleado_servicio = $request->empleado_servicio;
            $evento_cita10->comision_servicio = $request->comision_empleado;
            $evento_cita10->save();

            $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;

            $evento_cita11 = new Citas_diarias();
            $evento_cita11->cabina = $request->numero_cabina;
            $evento_cita11->id_calendario =$cabina_siguienbte10;
            $evento_cita11->cliente = $request->clientes;
            $evento_cita11->empleado = $request->empleados;
            $evento_cita11->empleado_servicio = $request->este2;
            $evento_cita11->comision_servicio = $request->este3;
            $evento_cita11->duracion = $request->este4;
            $evento_cita11->status = $request->este;
            $evento_cita11->descripcion = $request->descripcion;
            $evento_cita11->fecha = $request->fecha_cabina;
            $evento_cita11->horario = $nuevaHora;
            $evento_cita11->servicio = $request->servicios;
            $evento_cita11->telefono_cliente = $request->telefono;
            $evento_cita11->cve_usuario = Auth::user()->id;
            $evento_cita11->modulo = 1;
            $evento_cita11->empleado_servicio = $request->empleado_servicio;
            $evento_cita11->comision_servicio = $request->comision_empleado;
            $evento_cita11->save();

            $cabina_siguienbte11 = $evento_cita11->id_calendario + 1;

            $evento_cita12 = new Citas_diarias();
            $evento_cita12->cabina = $request->numero_cabina;
            $evento_cita12->id_calendario =$cabina_siguienbte11;
            $evento_cita12->cliente = $request->clientes;
            $evento_cita12->empleado = $request->empleados;
            $evento_cita12->empleado_servicio = $request->este2;
            $evento_cita12->comision_servicio = $request->este3;
            $evento_cita12->duracion = $request->este4;
            $evento_cita12->status = $request->este;
            $evento_cita12->descripcion = $request->descripcion;
            $evento_cita12->fecha = $request->fecha_cabina;
            $evento_cita12->horario = $nuevaHora;
            $evento_cita12->servicio = $request->servicios;
            $evento_cita12->telefono_cliente = $request->telefono;
            $evento_cita12->cve_usuario = Auth::user()->id;
            $evento_cita12->modulo = 1;
            $evento_cita12->empleado_servicio = $request->empleado_servicio;
            $evento_cita12->comision_servicio = $request->comision_empleado;
            $evento_cita12->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }

          // $evento_cita = new Citas_diarias();
          // $evento_cita->cabina = $request->numero_cabina;
          // $evento_cita->id_calendario = $request->id_calendario;
          // $evento_cita->cliente = $request->clientes;
          // $evento_cita->empleado = $request->empleados;
          // $evento_cita->comision_servicio = $request->este3;
          // $evento_cita->empleado_servicio = $request->este2;
          // $evento_cita->duracion = $request->este4;
          // $evento_cita->status = $request->este;
          // $evento_cita->descripcion = $request->descripcion;
          // $evento_cita->fecha = $request->fecha_cabina;
          // $evento_cita->horario = $request->hora_cabina;
          // $evento_cita->servicio = $request->servicios;
          // $evento_cita->telefono_cliente = $request->telefono;
          // $evento_cita->cve_usuario = Auth::user()->id;
          // $evento_cita->save();
        }

      }else{
        //dd($request->all());
        if ($request->este == 2) {

          if ($request->este4 == 1) {
            //dd('aqui entro');
            //$evento_cita = new Citas_diarias();
            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }
            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->tipo = $request->tipo;
            // $evento_cita->modulo = 1;
            // $evento_cita->tipo_cabello = $request->tipo_cabello;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();

            $servicois = Servicios::find($request->servicios);
            //dd($servicois->costo,$servicois->sesiones);
            $total_sesion = $servicois->costo;

            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 2){
            //dd('entro');
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->tipo = $request->tipo;
            // $evento_cita->tipo_cabello = $request->tipo_cabello;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->modulo = 1;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            // $id_siguienbte = $evento_cita->id + 1;
            // // dd($request->id_calendario,$cabina_siguienbte,$id_siguienbte,$evento_cita->id );
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario = $cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $evento_cita->status;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // $evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->tipo = $request->tipo;
            // $evento_cita2->tipo_cabello = $request->tipo_cabello;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->save();

            $servicois = Servicios::find($request->servicios);
            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

            // $evento_cita = new Citas_diarias();
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $evento_cita = new Citas_diarias();
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario =$cabina_siguienbte;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $nuevaHora;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();

          }else if($request->este4 == 3){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 4){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 5){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 6){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
          //  $evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 7){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 8){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 9){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 10){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 11){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();
            //
            // $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;
            //
            // $id_siguienbte10 = $evento_cita10->id + 1;
            // $evento_cita11 = Citas_diarias::find($id_siguienbte10);
            // $evento_cita11->cabina = $request->numero_cabina;
            // $evento_cita11->id_calendario =$cabina_siguienbte10;
            // $evento_cita11->cliente = $request->clientes;
            // $evento_cita11->empleado = $request->empleados;
            // $evento_cita11->empleado_servicio = $request->este2;
            // $evento_cita11->comision_servicio = $request->este3;
            // $evento_cita11->duracion = $request->este4;
            // $evento_cita11->status = $request->este;
            // $evento_cita11->descripcion = $request->descripcion;
            // $evento_cita11->fecha = $request->fecha_cabina;
            // $evento_cita11->horario = $nuevaHora;
            // $evento_cita11->servicio = $request->servicios;
            // $evento_cita11->telefono_cliente = $request->telefono;
            // $evento_cita11->cve_usuario = Auth::user()->id;
            // $evento_cita11->modulo = 1;
            // $evento_cita11->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 12){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();
            //
            // $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;
            //
            // $id_siguienbte10 = $evento_cita10->id + 1;
            // $evento_cita11 = Citas_diarias::find($id_siguienbte10);
            // $evento_cita11->cabina = $request->numero_cabina;
            // $evento_cita11->id_calendario =$cabina_siguienbte10;
            // $evento_cita11->cliente = $request->clientes;
            // $evento_cita11->empleado = $request->empleados;
            // $evento_cita11->empleado_servicio = $request->este2;
            // $evento_cita11->comision_servicio = $request->este3;
            // $evento_cita11->duracion = $request->este4;
            // $evento_cita11->status = $request->este;
            // $evento_cita11->descripcion = $request->descripcion;
            // $evento_cita11->fecha = $request->fecha_cabina;
            // $evento_cita11->horario = $nuevaHora;
            // $evento_cita11->servicio = $request->servicios;
            // $evento_cita11->telefono_cliente = $request->telefono;
            // $evento_cita11->cve_usuario = Auth::user()->id;
            // $evento_cita11->modulo = 1;
            // $evento_cita11->save();
            //
            // $cabina_siguienbte11 = $evento_cita11->id_calendario + 1;
            //
            // $id_siguienbte11 = $evento_cita11->id + 1;
            // $evento_cita12 = Citas_diarias::find($id_siguienbte11);
            // $evento_cita12->cabina = $request->numero_cabina;
            // $evento_cita12->id_calendario =$cabina_siguienbte11;
            // $evento_cita12->cliente = $request->clientes;
            // $evento_cita12->empleado = $request->empleados;
            // $evento_cita12->empleado_servicio = $request->este2;
            // $evento_cita12->comision_servicio = $request->este3;
            // $evento_cita12->duracion = $request->este4;
            // $evento_cita12->status = $request->este;
            // $evento_cita12->descripcion = $request->descripcion;
            // $evento_cita12->fecha = $request->fecha_cabina;
            // $evento_cita12->horario = $nuevaHora;
            // $evento_cita12->servicio = $request->servicios;
            // $evento_cita12->telefono_cliente = $request->telefono;
            // $evento_cita12->cve_usuario = Auth::user()->id;
            // $evento_cita12->modulo = 1;
            // $evento_cita12->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }

          // $evento_cita = Citas_diarias::find($request->id);
          // $evento_cita->cabina = $request->numero_cabina;
          // $evento_cita->id_calendario = $request->id_calendario;
          // $evento_cita->cliente = $request->clientes;
          // $evento_cita->empleado = $request->empleados;
          // $evento_cita->empleado_servicio = $request->este2;
          // $evento_cita->comision_servicio = $request->este3;
          // $evento_cita->duracion = $request->este4;
          // $evento_cita->status = $request->este;
          // $evento_cita->fecha = $request->fecha_cabina;
          // $evento_cita->horario = $request->hora_cabina;
          // $evento_cita->descripcion = $request->descripcion;
          // $evento_cita->servicio = $request->servicios;
          // $evento_cita->telefono_cliente = $request->telefono;
          // $evento_cita->cve_usuario = Auth::user()->id;
          // $evento_cita->save();

          $servicois = Servicios::find($request->servicios);


          if ($servicois->tipo_servicio ==  2) {
            //dd('servicio largo');

            $total_sesion = $servicois->costo / $servicois->sesiones;
            $liquidar = new Liquidar();
            $liquidar->id_cita = $evento_cita->id;
            $liquidar->id_cliente = $request->clientes;
            $liquidar->id_sesion = $request->sesion_cita;
            $liquidar->id_servicio = $request->servicios;
            $liquidar->id_empleado = $request->empleados;
            $liquidar->id_empleado_comision = $request->este2;
            $liquidar->id_cabina = $request->numero_cabina;
            $liquidar->fecha = $request->fecha_cabina;
            $liquidar->hora = $request->hora_cabina;
            $liquidar->importe = round($total_sesion);
            $liquidar->importe_total = $servicois->costo;
            $liquidar->importe_servicio = $request->este3;
            $liquidar->cve_usuario = Auth::user()->id;
            $liquidar->save();


            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;
            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else{
            $existe_prepago = Prepago::where([['activo',1],['id_agenda',$request->id]])->first();

            if (isset($existe_prepago)) {
              Prepago::where([['activo',1],['id_agenda',$request->id]])->update([
                'cabina' => $request->numero_cabina,
                'id_calendario' => $request->id_calendario,
                'id_cliente' => $request->clientes,
                'id_empleado' => $request->empleados,
                'fecha' => $request->fecha_cabina,
                'hora' => $request->hora_cabina,
                'id_servicio' => $request->servicios,
                'importe' => $servicois->costo,
                'id_empleado_servicio' => $request->este2,
                'importe_servicio' => $request->este3,
                'cve_usuario' => Auth::user()->id
              ]);
            }else{
              $prepago = new Prepago();
              $prepago->id_agenda = $evento_cita->id;
              $prepago->cabina = $request->numero_cabina;
              $prepago->id_calendario = $request->id_calendario;
              $prepago->id_cliente = $request->clientes;
              $prepago->id_empleado = $request->empleados;
              $prepago->fecha = $request->fecha_cabina;
              $prepago->hora = $request->hora_cabina;
              $prepago->id_servicio = $request->servicios;
              $prepago->importe = $servicois->costo;
              $prepago->id_empleado_servicio = $request->este2;
              $prepago->importe_servicio = $request->este3;
              $prepago->cve_usuario = Auth::user()->id;
              $prepago->save();
            }

          }






        }elseif($request->este == 3){
          //dd('entro update');

          if ($request->este4 == 1) {
            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }
            // $evento_cita = new Citas_diarias();
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->tipo = $request->tipo;
            // $evento_cita->tipo_cabello = $request->tipo_cabello;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->modulo = 1;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();

          }else if($request->este4 == 2){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->tipo = $request->tipo;
            // $evento_cita->tipo_cabello = $request->tipo_cabello;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->modulo = 1;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            // $id_siguienbte = $evento_cita->id + 1;
            // // dd($request->id_calendario,$cabina_siguienbte,$id_siguienbte,$evento_cita->id );
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario = $cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $evento_cita->status;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // $evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->tipo = $request->tipo;
            // $evento_cita2->tipo_cabello = $request->tipo_cabello;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->save();

            // $evento_cita = new Citas_diarias();
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $evento_cita = new Citas_diarias();
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario =$cabina_siguienbte;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $nuevaHora;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();

          }else if($request->este4 == 3){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 4){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 5){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 6){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 7){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 8){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 9){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 10){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 11){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();
            //
            // $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;
            //
            // $id_siguienbte10 = $evento_cita10->id + 1;
            // $evento_cita11 = Citas_diarias::find($id_siguienbte10);
            // $evento_cita11->cabina = $request->numero_cabina;
            // $evento_cita11->id_calendario =$cabina_siguienbte10;
            // $evento_cita11->cliente = $request->clientes;
            // $evento_cita11->empleado = $request->empleados;
            // $evento_cita11->empleado_servicio = $request->este2;
            // $evento_cita11->comision_servicio = $request->este3;
            // $evento_cita11->duracion = $request->este4;
            // $evento_cita11->status = $request->este;
            // $evento_cita11->descripcion = $request->descripcion;
            // $evento_cita11->fecha = $request->fecha_cabina;
            // $evento_cita11->horario = $nuevaHora;
            // $evento_cita11->servicio = $request->servicios;
            // $evento_cita11->telefono_cliente = $request->telefono;
            // $evento_cita11->cve_usuario = Auth::user()->id;
            // $evento_cita11->modulo = 1;
            // $evento_cita11->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 12){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();
            //
            // $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;
            //
            // $id_siguienbte10 = $evento_cita10->id + 1;
            // $evento_cita11 = Citas_diarias::find($id_siguienbte10);
            // $evento_cita11->cabina = $request->numero_cabina;
            // $evento_cita11->id_calendario =$cabina_siguienbte10;
            // $evento_cita11->cliente = $request->clientes;
            // $evento_cita11->empleado = $request->empleados;
            // $evento_cita11->empleado_servicio = $request->este2;
            // $evento_cita11->comision_servicio = $request->este3;
            // $evento_cita11->duracion = $request->este4;
            // $evento_cita11->status = $request->este;
            // $evento_cita11->descripcion = $request->descripcion;
            // $evento_cita11->fecha = $request->fecha_cabina;
            // $evento_cita11->horario = $nuevaHora;
            // $evento_cita11->servicio = $request->servicios;
            // $evento_cita11->telefono_cliente = $request->telefono;
            // $evento_cita11->cve_usuario = Auth::user()->id;
            // $evento_cita11->modulo = 1;
            // $evento_cita11->save();
            //
            // $cabina_siguienbte11 = $evento_cita11->id_calendario + 1;
            //
            // $id_siguienbte11 = $evento_cita11->id + 1;
            // $evento_cita12 = Citas_diarias::find($id_siguienbte11);
            // $evento_cita12->cabina = $request->numero_cabina;
            // $evento_cita12->id_calendario =$cabina_siguienbte11;
            // $evento_cita12->cliente = $request->clientes;
            // $evento_cita12->empleado = $request->empleados;
            // $evento_cita12->empleado_servicio = $request->este2;
            // $evento_cita12->comision_servicio = $request->este3;
            // $evento_cita12->duracion = $request->este4;
            // $evento_cita12->status = $request->este;
            // $evento_cita12->descripcion = $request->descripcion;
            // $evento_cita12->fecha = $request->fecha_cabina;
            // $evento_cita12->horario = $nuevaHora;
            // $evento_cita12->servicio = $request->servicios;
            // $evento_cita12->telefono_cliente = $request->telefono;
            // $evento_cita12->cve_usuario = Auth::user()->id;
            // $evento_cita12->modulo = 1;
            // $evento_cita12->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }

          // $evento_cita = Citas_diarias::find($request->id);
          // $evento_cita->cabina = $request->numero_cabina;
          // $evento_cita->id_calendario = $request->id_calendario;
          // $evento_cita->cliente = $request->clientes;
          // $evento_cita->empleado = $request->empleados;
          // $evento_cita->empleado_servicio = $request->este2;
          // $evento_cita->comision_servicio = $request->este3;
          // $evento_cita->duracion = $request->este4;
          // $evento_cita->status = $request->este;
          // $evento_cita->fecha = $request->fecha_cabina;
          // $evento_cita->horario = $request->hora_cabina;
          // $evento_cita->descripcion = $request->descripcion;
          // $evento_cita->servicio = $request->servicios;
          // $evento_cita->telefono_cliente = $request->telefono;
          // $evento_cita->cve_usuario = Auth::user()->id;
          // $evento_cita->save();

          $servicois = Servicios::find($request->servicios);


          if ($servicois->tipo_servicio ==  2) {
          //dd('servicio largo');
          $total_sesion = $servicois->costo / $servicois->sesiones;
          $liquidar = new Liquidar();
          $liquidar->id_cita = $evento_cita->id;
          $liquidar->id_cliente = $request->clientes;
          $liquidar->id_sesion = $request->sesion_cita;
          $liquidar->id_servicio = $request->servicios;
          $liquidar->id_empleado = $request->empleados;
          $liquidar->id_empleado_comision = $request->este2;
          $liquidar->id_cabina = $request->numero_cabina;
          $liquidar->fecha = $request->fecha_cabina;
          $liquidar->hora = $request->hora_cabina;
          $liquidar->importe = round($total_sesion);
          $liquidar->importe_total = $servicois->costo;
          $liquidar->importe_servicio = $request->este3;
          $liquidar->cve_usuario = Auth::user()->id;
          $liquidar->save();


          $expediente = new Expediente();
          $expediente->id_cita = $evento_cita->id;
          $expediente->id_cliente = $request->clientes;
          $expediente->id_sesion = $request->sesion_cita;
          $expediente->id_servicio = $request->servicios;
          $expediente->id_empleado = $request->empleados;
          $expediente->id_empleado_comision = $request->este2;
          $expediente->id_cabina = $request->numero_cabina;
          $expediente->fecha = $request->fecha_cabina;
          $expediente->hora = $request->hora_cabina;
          $expediente->importe = round($total_sesion);
          $expediente->cve_usuario = Auth::user()->id;
          $expediente->save();


          }else{
            $existe_prepago = Prepago::where([['activo',1],['id_agenda',$request->id]])->first();

            if (isset($existe_prepago)) {
              Prepago::where([['activo',1],['id_agenda',$request->id]])->update([
                'cabina' => $request->numero_cabina,
                'id_calendario' => $request->id_calendario,
                'id_cliente' => $request->clientes,
                'id_empleado' => $request->empleados,
                'fecha' => $request->fecha_cabina,
                'hora' => $request->hora_cabina,
                'id_servicio' => $request->servicios,
                'importe' => $servicois->costo,
                'id_empleado_servicio' => $request->este2,
                'importe_servicio' => $request->este3,
                'cve_usuario' => Auth::user()->id
              ]);
            }else{
              $prepago = new Prepago();
              $prepago->id_agenda = $evento_cita->id;
              $prepago->cabina = $request->numero_cabina;
              $prepago->id_calendario = $request->id_calendario;
              $prepago->id_cliente = $request->clientes;
              $prepago->id_empleado = $request->empleados;
              $prepago->fecha = $request->fecha_cabina;
              $prepago->hora = $request->hora_cabina;
              $prepago->id_servicio = $request->servicios;
              $prepago->importe = $servicois->costo;
              $prepago->id_empleado_servicio = $request->este2;
              $prepago->importe_servicio = $request->este3;
              $prepago->cve_usuario = Auth::user()->id;
              $prepago->save();
            }
          }
        }else if($request->este == 1){


          if ($request->este4 == 1) {

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }
            // $evento_cita = new Citas_diarias();
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->tipo = $request->tipo;
            // $evento_cita->modulo = 1;
            // $evento_cita->tipo_cabello = $request->tipo_cabello;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();

          }else if($request->este4 == 2){
            //dd($request->all());
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);
            //dd($evento_cita);
            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            //dd($citillas);
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->tipo = $request->tipo;
            // $evento_cita->tipo_cabello = $request->tipo_cabello;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->modulo = 1;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            // $id_siguienbte = $evento_cita->id + 1;
            // // dd($request->id_calendario,$cabina_siguienbte,$id_siguienbte,$evento_cita->id );
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario = $cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $evento_cita->status;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // $evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->tipo = $request->tipo;
            // $evento_cita2->tipo_cabello = $request->tipo_cabello;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->save();

          }else if($request->este4 == 3){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 4){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 5){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 6){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);


            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();


            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 7){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);
            //dd($request->id);



            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // dd($id_siguienbte6,$cabina_siguienbte6,$evento_cita->id,$evento_cita2->id,$evento_cita3->id,$evento_cita4->id,$evento_cita5->id,$evento_cita6->id,$request->all());
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 8){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 9){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 10){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 11){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();
            //
            // $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;
            //
            // $id_siguienbte10 = $evento_cita10->id + 1;
            // $evento_cita11 = Citas_diarias::find($id_siguienbte10);
            // $evento_cita11->cabina = $request->numero_cabina;
            // $evento_cita11->id_calendario =$cabina_siguienbte10;
            // $evento_cita11->cliente = $request->clientes;
            // $evento_cita11->empleado = $request->empleados;
            // $evento_cita11->empleado_servicio = $request->este2;
            // $evento_cita11->comision_servicio = $request->este3;
            // $evento_cita11->duracion = $request->este4;
            // $evento_cita11->status = $request->este;
            // $evento_cita11->descripcion = $request->descripcion;
            // $evento_cita11->fecha = $request->fecha_cabina;
            // $evento_cita11->horario = $nuevaHora;
            // $evento_cita11->servicio = $request->servicios;
            // $evento_cita11->telefono_cliente = $request->telefono;
            // $evento_cita11->cve_usuario = Auth::user()->id;
            // $evento_cita11->modulo = 1;
            // $evento_cita11->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 12){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();
            //
            // $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;
            //
            // $id_siguienbte10 = $evento_cita10->id + 1;
            // $evento_cita11 = Citas_diarias::find($id_siguienbte10);
            // $evento_cita11->cabina = $request->numero_cabina;
            // $evento_cita11->id_calendario =$cabina_siguienbte10;
            // $evento_cita11->cliente = $request->clientes;
            // $evento_cita11->empleado = $request->empleados;
            // $evento_cita11->empleado_servicio = $request->este2;
            // $evento_cita11->comision_servicio = $request->este3;
            // $evento_cita11->duracion = $request->este4;
            // $evento_cita11->status = $request->este;
            // $evento_cita11->descripcion = $request->descripcion;
            // $evento_cita11->fecha = $request->fecha_cabina;
            // $evento_cita11->horario = $nuevaHora;
            // $evento_cita11->servicio = $request->servicios;
            // $evento_cita11->telefono_cliente = $request->telefono;
            // $evento_cita11->cve_usuario = Auth::user()->id;
            // $evento_cita11->modulo = 1;
            // $evento_cita11->save();
            //
            // $cabina_siguienbte11 = $evento_cita11->id_calendario + 1;
            //
            // $id_siguienbte11 = $evento_cita11->id + 1;
            // $evento_cita12 = Citas_diarias::find($id_siguienbte11);
            // $evento_cita12->cabina = $request->numero_cabina;
            // $evento_cita12->id_calendario =$cabina_siguienbte11;
            // $evento_cita12->cliente = $request->clientes;
            // $evento_cita12->empleado = $request->empleados;
            // $evento_cita12->empleado_servicio = $request->este2;
            // $evento_cita12->comision_servicio = $request->este3;
            // $evento_cita12->duracion = $request->este4;
            // $evento_cita12->status = $request->este;
            // $evento_cita12->descripcion = $request->descripcion;
            // $evento_cita12->fecha = $request->fecha_cabina;
            // $evento_cita12->horario = $nuevaHora;
            // $evento_cita12->servicio = $request->servicios;
            // $evento_cita12->telefono_cliente = $request->telefono;
            // $evento_cita12->cve_usuario = Auth::user()->id;
            // $evento_cita12->modulo = 1;
            // $evento_cita12->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }

          $existe_prepago = Prepago::where([['activo',1],['id_agenda',$request->id]])->first();

          if (isset($existe_prepago)) {
            Prepago::where([['activo',1],['id_agenda',$request->id]])->update([
              'activo' => 0,
              'cve_usuario' => Auth::user()->id
            ]);
          }

        }else{
          //dd('aqui estoy');
          if ($request->este4 == 1) {
            // $evento_cita = new Citas_diarias();
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->tipo = $request->tipo;
            // $evento_cita->tipo_cabello = $request->tipo_cabello;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->modulo = 1;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

          }else if($request->este4 == 2){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->tipo = $request->tipo;
            // $evento_cita->tipo_cabello = $request->tipo_cabello;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->modulo = 1;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->save();
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            // $id_siguienbte = $evento_cita->id + 1;
            // // dd($request->id_calendario,$cabina_siguienbte,$id_siguienbte,$evento_cita->id );
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario = $cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $evento_cita->status;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // $evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->tipo = $request->tipo;
            // $evento_cita2->tipo_cabello = $request->tipo_cabello;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->save();

          }else if($request->este4 == 3){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();

            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 4){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 5){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 6){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 7){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 8){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 9){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 10){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 11){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();
            //
            // $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;
            //
            // $id_siguienbte10 = $evento_cita10->id + 1;
            // $evento_cita11 = Citas_diarias::find($id_siguienbte10);
            // $evento_cita11->cabina = $request->numero_cabina;
            // $evento_cita11->id_calendario =$cabina_siguienbte10;
            // $evento_cita11->cliente = $request->clientes;
            // $evento_cita11->empleado = $request->empleados;
            // $evento_cita11->empleado_servicio = $request->este2;
            // $evento_cita11->comision_servicio = $request->este3;
            // $evento_cita11->duracion = $request->este4;
            // $evento_cita11->status = $request->este;
            // $evento_cita11->descripcion = $request->descripcion;
            // $evento_cita11->fecha = $request->fecha_cabina;
            // $evento_cita11->horario = $nuevaHora;
            // $evento_cita11->servicio = $request->servicios;
            // $evento_cita11->telefono_cliente = $request->telefono;
            // $evento_cita11->cve_usuario = Auth::user()->id;
            // $evento_cita11->modulo = 1;
            // $evento_cita11->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }else if($request->este4 == 12){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);

            $citillas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['cliente',$request->clientes]])->get();
            foreach ($citillas as $key => $value) {
              $cabina_siguienbte4 = $value->id_calendario + 1;

              $evento_cita2 = Citas_diarias::find($value->id);
              $evento_cita2->cabina = $request->numero_cabina;
              $evento_cita2->id_calendario =$value->id_calendario;
              $evento_cita2->cliente = $request->clientes;
              $evento_cita2->empleado = $request->empleados;
              $evento_cita2->empleado_servicio = $request->este2;
              $evento_cita2->comision_servicio = $request->este3;
              $evento_cita2->duracion = $request->este4;
              $evento_cita2->status = $request->este;
              $evento_cita2->descripcion = $request->descripcion;
              $evento_cita2->fecha = $request->fecha_cabina;
              $evento_cita2->empleado_servicio = $request->empleado_servicio;
              $evento_cita2->comision_servicio = $request->comision_empleado;
              //$evento_cita2->horario = $nuevaHora;
              $evento_cita2->horario = $request->hora_cabina;
              $evento_cita2->servicio = $request->servicios;
              $evento_cita2->telefono_cliente = $request->telefono;
              $evento_cita2->cve_usuario = Auth::user()->id;
              $evento_cita2->modulo = 1;
              $evento_cita2->save();
            }

            // $evento_cita = Citas_diarias::find($request->id);
            // $evento_cita->cabina = $request->numero_cabina;
            // $evento_cita->id_calendario = $request->id_calendario;
            // $evento_cita->cliente = $request->clientes;
            // $evento_cita->empleado = $request->empleados;
            // $evento_cita->empleado_servicio = $request->este2;
            // $evento_cita->comision_servicio = $request->este3;
            // $evento_cita->duracion = $request->este4;
            // $evento_cita->status = $request->este;
            // $evento_cita->descripcion = $request->descripcion;
            // $evento_cita->fecha = $request->fecha_cabina;
            // $evento_cita->horario = $request->hora_cabina;
            // $evento_cita->servicio = $request->servicios;
            // $evento_cita->telefono_cliente = $request->telefono;
            // $evento_cita->cve_usuario = Auth::user()->id;
            // $evento_cita->modulo = 1;
            // $evento_cita->save();
            //
            //
            // $cabina_siguienbte = $request->id_calendario + 1;
            //
            // $id_siguienbte = $evento_cita->id + 1;
            // $evento_cita2 = Citas_diarias::find($id_siguienbte);
            // $evento_cita2->cabina = $request->numero_cabina;
            // $evento_cita2->id_calendario =$cabina_siguienbte;
            // $evento_cita2->cliente = $request->clientes;
            // $evento_cita2->empleado = $request->empleados;
            // $evento_cita2->empleado_servicio = $request->este2;
            // $evento_cita2->comision_servicio = $request->este3;
            // $evento_cita2->duracion = $request->este4;
            // $evento_cita2->status = $request->este;
            // $evento_cita2->descripcion = $request->descripcion;
            // $evento_cita2->fecha = $request->fecha_cabina;
            // //$evento_cita2->horario = $nuevaHora;
            //$evento_cita2->horario = $request->hora_cabina;
            // $evento_cita2->servicio = $request->servicios;
            // $evento_cita2->telefono_cliente = $request->telefono;
            // $evento_cita2->cve_usuario = Auth::user()->id;
            // $evento_cita2->modulo = 1;
            // $evento_cita2->save();
            //
            // $cabina_siguienbte2 = $evento_cita2->id_calendario + 1;
            // $id_siguienbte2 = $evento_cita2->id + 1;
            // $evento_cita3 = Citas_diarias::find($id_siguienbte2);
            //
            // $evento_cita3->cabina = $request->numero_cabina;
            // $evento_cita3->id_calendario =$cabina_siguienbte2;
            // $evento_cita3->cliente = $request->clientes;
            // $evento_cita3->empleado = $request->empleados;
            // $evento_cita3->empleado_servicio = $request->este2;
            // $evento_cita3->comision_servicio = $request->este3;
            // $evento_cita3->duracion = $request->este4;
            // $evento_cita3->status = $request->este;
            // $evento_cita3->descripcion = $request->descripcion;
            // $evento_cita3->fecha = $request->fecha_cabina;
            // $evento_cita3->horario = $nuevaHora;
            // $evento_cita3->servicio = $request->servicios;
            // $evento_cita3->telefono_cliente = $request->telefono;
            // $evento_cita3->cve_usuario = Auth::user()->id;
            // $evento_cita3->modulo = 1;
            // $evento_cita3->save();
            //
            //
            // $cabina_siguienbte3 = $evento_cita3->id_calendario + 1;
            // $id_siguienbte3 = $evento_cita3->id + 1;
            // $evento_cita4 = Citas_diarias::find($id_siguienbte3);
            // $evento_cita4->cabina = $request->numero_cabina;
            // $evento_cita4->id_calendario =$cabina_siguienbte3;
            // $evento_cita4->cliente = $request->clientes;
            // $evento_cita4->empleado = $request->empleados;
            // $evento_cita4->empleado_servicio = $request->este2;
            // $evento_cita4->comision_servicio = $request->este3;
            // $evento_cita4->duracion = $request->este4;
            // $evento_cita4->status = $request->este;
            // $evento_cita4->descripcion = $request->descripcion;
            // $evento_cita4->fecha = $request->fecha_cabina;
            // $evento_cita4->horario = $nuevaHora;
            // $evento_cita4->servicio = $request->servicios;
            // $evento_cita4->telefono_cliente = $request->telefono;
            // $evento_cita4->cve_usuario = Auth::user()->id;
            // $evento_cita4->modulo = 1;
            // $evento_cita4->save();
            //
            // $cabina_siguienbte4 = $evento_cita4->id_calendario + 1;
            // $id_siguienbte4 = $evento_cita4->id + 1;
            // $evento_cita5 = Citas_diarias::find($id_siguienbte4);
            // $evento_cita5->cabina = $request->numero_cabina;
            // $evento_cita5->id_calendario =$cabina_siguienbte4;
            // $evento_cita5->cliente = $request->clientes;
            // $evento_cita5->empleado = $request->empleados;
            // $evento_cita5->empleado_servicio = $request->este2;
            // $evento_cita5->comision_servicio = $request->este3;
            // $evento_cita5->duracion = $request->este4;
            // $evento_cita5->status = $request->este;
            // $evento_cita5->descripcion = $request->descripcion;
            // $evento_cita5->fecha = $request->fecha_cabina;
            // $evento_cita5->horario = $nuevaHora;
            // $evento_cita5->servicio = $request->servicios;
            // $evento_cita5->telefono_cliente = $request->telefono;
            // $evento_cita5->cve_usuario = Auth::user()->id;
            // $evento_cita5->modulo = 1;
            // $evento_cita5->save();
            //
            // $cabina_siguienbte5 = $evento_cita5->id_calendario + 1;
            // $id_siguienbte5 = $evento_cita5->id + 1;
            // $evento_cita6 = Citas_diarias::find($id_siguienbte5);
            // $evento_cita6->cabina = $request->numero_cabina;
            // $evento_cita6->id_calendario =$cabina_siguienbte5;
            // $evento_cita6->cliente = $request->clientes;
            // $evento_cita6->empleado = $request->empleados;
            // $evento_cita6->empleado_servicio = $request->este2;
            // $evento_cita6->comision_servicio = $request->este3;
            // $evento_cita6->duracion = $request->este4;
            // $evento_cita6->status = $request->este;
            // $evento_cita6->descripcion = $request->descripcion;
            // $evento_cita6->fecha = $request->fecha_cabina;
            // $evento_cita6->horario = $nuevaHora;
            // $evento_cita6->servicio = $request->servicios;
            // $evento_cita6->telefono_cliente = $request->telefono;
            // $evento_cita6->cve_usuario = Auth::user()->id;
            // $evento_cita6->modulo = 1;
            // $evento_cita6->save();
            //
            // $cabina_siguienbte6 = $evento_cita6->id_calendario + 1;
            //
            // $id_siguienbte6 = $evento_cita6->id + 1;
            // $evento_cita7 = Citas_diarias::find($id_siguienbte6);
            // $evento_cita7->cabina = $request->numero_cabina;
            // $evento_cita7->id_calendario =$cabina_siguienbte6;
            // $evento_cita7->cliente = $request->clientes;
            // $evento_cita7->empleado = $request->empleados;
            // $evento_cita7->empleado_servicio = $request->este2;
            // $evento_cita7->comision_servicio = $request->este3;
            // $evento_cita7->duracion = $request->este4;
            // $evento_cita7->status = $request->este;
            // $evento_cita7->descripcion = $request->descripcion;
            // $evento_cita7->fecha = $request->fecha_cabina;
            // $evento_cita7->horario = $nuevaHora;
            // $evento_cita7->servicio = $request->servicios;
            // $evento_cita7->telefono_cliente = $request->telefono;
            // $evento_cita7->cve_usuario = Auth::user()->id;
            // $evento_cita7->modulo = 1;
            // $evento_cita7->save();
            //
            // $cabina_siguienbte7 = $evento_cita7->id_calendario + 1;
            //
            // $id_siguienbte7 = $evento_cita7->id + 1;
            // $evento_cita8 = Citas_diarias::find($id_siguienbte7);
            // $evento_cita8->cabina = $request->numero_cabina;
            // $evento_cita8->id_calendario =$cabina_siguienbte7;
            // $evento_cita8->cliente = $request->clientes;
            // $evento_cita8->empleado = $request->empleados;
            // $evento_cita8->empleado_servicio = $request->este2;
            // $evento_cita8->comision_servicio = $request->este3;
            // $evento_cita8->duracion = $request->este4;
            // $evento_cita8->status = $request->este;
            // $evento_cita8->descripcion = $request->descripcion;
            // $evento_cita8->fecha = $request->fecha_cabina;
            // $evento_cita8->horario = $nuevaHora;
            // $evento_cita8->servicio = $request->servicios;
            // $evento_cita8->telefono_cliente = $request->telefono;
            // $evento_cita8->cve_usuario = Auth::user()->id;
            // $evento_cita8->modulo = 1;
            // $evento_cita8->save();
            //
            // $cabina_siguienbte8 = $evento_cita8->id_calendario + 1;
            //
            // $id_siguienbte8 = $evento_cita8->id + 1;
            // $evento_cita9 = Citas_diarias::find($id_siguienbte8);
            // $evento_cita9->cabina = $request->numero_cabina;
            // $evento_cita9->id_calendario =$cabina_siguienbte8;
            // $evento_cita9->cliente = $request->clientes;
            // $evento_cita9->empleado = $request->empleados;
            // $evento_cita9->empleado_servicio = $request->este2;
            // $evento_cita9->comision_servicio = $request->este3;
            // $evento_cita9->duracion = $request->este4;
            // $evento_cita9->status = $request->este;
            // $evento_cita9->descripcion = $request->descripcion;
            // $evento_cita9->fecha = $request->fecha_cabina;
            // $evento_cita9->horario = $nuevaHora;
            // $evento_cita9->servicio = $request->servicios;
            // $evento_cita9->telefono_cliente = $request->telefono;
            // $evento_cita9->cve_usuario = Auth::user()->id;
            // $evento_cita9->modulo = 1;
            // $evento_cita9->save();
            //
            // $cabina_siguienbte9 = $evento_cita9->id_calendario + 1;
            // $id_siguienbte9 = $evento_cita9->id + 1;
            // $evento_cita10 = Citas_diarias::find($id_siguienbte9);
            // $evento_cita10->cabina = $request->numero_cabina;
            // $evento_cita10->id_calendario =$cabina_siguienbte9;
            // $evento_cita10->cliente = $request->clientes;
            // $evento_cita10->empleado = $request->empleados;
            // $evento_cita10->empleado_servicio = $request->este2;
            // $evento_cita10->comision_servicio = $request->este3;
            // $evento_cita10->duracion = $request->este4;
            // $evento_cita10->status = $request->este;
            // $evento_cita10->descripcion = $request->descripcion;
            // $evento_cita10->fecha = $request->fecha_cabina;
            // $evento_cita10->horario = $nuevaHora;
            // $evento_cita10->servicio = $request->servicios;
            // $evento_cita10->telefono_cliente = $request->telefono;
            // $evento_cita10->cve_usuario = Auth::user()->id;
            // $evento_cita10->modulo = 1;
            // $evento_cita10->save();
            //
            // $cabina_siguienbte10 = $evento_cita10->id_calendario + 1;
            //
            // $id_siguienbte10 = $evento_cita10->id + 1;
            // $evento_cita11 = Citas_diarias::find($id_siguienbte10);
            // $evento_cita11->cabina = $request->numero_cabina;
            // $evento_cita11->id_calendario =$cabina_siguienbte10;
            // $evento_cita11->cliente = $request->clientes;
            // $evento_cita11->empleado = $request->empleados;
            // $evento_cita11->empleado_servicio = $request->este2;
            // $evento_cita11->comision_servicio = $request->este3;
            // $evento_cita11->duracion = $request->este4;
            // $evento_cita11->status = $request->este;
            // $evento_cita11->descripcion = $request->descripcion;
            // $evento_cita11->fecha = $request->fecha_cabina;
            // $evento_cita11->horario = $nuevaHora;
            // $evento_cita11->servicio = $request->servicios;
            // $evento_cita11->telefono_cliente = $request->telefono;
            // $evento_cita11->cve_usuario = Auth::user()->id;
            // $evento_cita11->modulo = 1;
            // $evento_cita11->save();
            //
            // $cabina_siguienbte11 = $evento_cita11->id_calendario + 1;
            //
            // $id_siguienbte11 = $evento_cita11->id + 1;
            // $evento_cita12 = Citas_diarias::find($id_siguienbte11);
            // $evento_cita12->cabina = $request->numero_cabina;
            // $evento_cita12->id_calendario =$cabina_siguienbte11;
            // $evento_cita12->cliente = $request->clientes;
            // $evento_cita12->empleado = $request->empleados;
            // $evento_cita12->empleado_servicio = $request->este2;
            // $evento_cita12->comision_servicio = $request->este3;
            // $evento_cita12->duracion = $request->este4;
            // $evento_cita12->status = $request->este;
            // $evento_cita12->descripcion = $request->descripcion;
            // $evento_cita12->fecha = $request->fecha_cabina;
            // $evento_cita12->horario = $nuevaHora;
            // $evento_cita12->servicio = $request->servicios;
            // $evento_cita12->telefono_cliente = $request->telefono;
            // $evento_cita12->cve_usuario = Auth::user()->id;
            // $evento_cita12->modulo = 1;
            // $evento_cita12->save();



            $servicois = Servicios::find($request->servicios);

            $total_sesion = $servicois->costo;
            $expediente = new Expediente();
            $expediente->id_cita = $evento_cita->id;
            $expediente->id_cliente = $request->clientes;
            $expediente->id_sesion = $request->sesion_cita;
            $expediente->id_servicio = $request->servicios;
            $expediente->id_empleado = $request->empleados;
            $expediente->id_empleado_comision = $request->este2;
            $expediente->id_cabina = $request->numero_cabina;
            $expediente->fecha = $request->fecha_cabina;
            $expediente->hora = $request->hora_cabina;

            $expediente->tipo = $request->tipo;
            $expediente->tipo_cabello = $request->tipo_cabello;
            $expediente->formula = $request->descripcion;

            $expediente->importe = round($total_sesion);
            $expediente->cve_usuario = Auth::user()->id;
            $expediente->save();

          }

          // $evento_cita = Citas_diarias::find($request->id);
          // $evento_cita->cabina = $request->numero_cabina;
          // $evento_cita->id_calendario = $request->id_calendario;
          // $evento_cita->cliente = $request->clientes;
          // $evento_cita->empleado = $request->empleados;
          // $evento_cita->empleado_servicio = $request->este2;
          // $evento_cita->comision_servicio = $request->este3;
          // $evento_cita->duracion = $request->este4;
          // $evento_cita->status = $request->este;
          // $evento_cita->fecha = $request->fecha_cabina;
          // $evento_cita->horario = $request->hora_cabina;
          // $evento_cita->descripcion = $request->descripcion;
          // $evento_cita->servicio = $request->servicios;
          // $evento_cita->telefono_cliente = $request->telefono;
          // $evento_cita->cve_usuario = Auth::user()->id;
          // $evento_cita->save();

          $existe_prepago = Prepago::where([['activo',1],['id_agenda',$request->id]])->first();

          if (isset($existe_prepago)) {
            Prepago::where([['activo',1],['id_agenda',$request->id]])->update([
              'activo' => 0,
              'cve_usuario' => Auth::user()->id
            ]);
          }

        }



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
       $usuario = Eventos::find($request->id);
       $usuario->activo = 0;
       $usuario->save();



       return response()->json(['success'=>'Eliminado exitosamente']);
     } catch (\Exception $e) {
       dd($e->getMessage());
     }
   }

  public function tablaeventos(){
    setlocale(LC_TIME, 'es_ES');
    \DB::statement("SET lc_time_names = 'es_ES'");
    $registros = Eventos::where([['activo', 1],['modulo',1]])->get(); //user es una entidad que se trae desde la app
    $datatable = DataTables::of($registros)
    ->editColumn('fecha', function ($registros) {

      list($anio,$mes,$dia) = explode('-',$registros->fecha);
      $mes_fecha="";

      if($mes== 0){
        $mes_fecha = '';
        $fecha_formato = 'Sin registro';
      }
      if ($mes == 1) {
        $mes_fecha = 'ENERO';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 2){
        $mes_fecha = 'FEBRERO';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 3){
        $mes_fecha = 'MARZO';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 4){
        $mes_fecha = 'ABRIL';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 5){
        $mes_fecha = 'MAYO';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 6){
        $mes_fecha = 'JUNIO';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 7){
        $mes_fecha = 'JULIO';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 8){
        $mes_fecha = 'AGOSTO';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 9){
        $mes_fecha = 'SEPTIEMBRE';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 10){
        $mes_fecha = 'OCTUBRE';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 11){
        $mes_fecha = 'NOVIEMBRE';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;

      }elseif($mes == 12){
        $mes_fecha = 'DICIEMBRE';
        $fecha_formato = $dia.' DE '.$mes_fecha.' DEL '.$anio;
      }



      return $fecha_formato;

    })
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
          $acciones = [
            "Editar" => [
              "icon" => "edit blue",
              "href" => "/agenda/$value->id/edit" //esta ruta esta en el archivo web
            ],
            "Eliminar" => [
              "icon" => "edit blue",
              "onclick" => "eliminar($value->id)"
            ],
          ];
        // }


    $value->acciones = generarDropdown($acciones);
    }
    $datatable->setData($data);
    return $datatable;
  }

  public function datos(Request $request){
    $porcentaje_articulos_id_query_2 = ("
        SELECT * FROM evento where evento.fecha BETWEEN ('".$request->event_start."') and ('".$request->event_end."')  and modulo = 1
    ");

      $data = DB::select($porcentaje_articulos_id_query_2);
        return response()->json($data);



    }

    public function VerEvento(Request $request){
      $porcentaje_articulos_id_query_3 = ("
        SELECT * FROM evento where id = $request->id and activo = '1' and modulo = 1
        ");
        $data = DB::select($porcentaje_articulos_id_query_3);
        return $data;
    }

    public function EliminarCita(Request $request){
      try {

        if ($request->duracion == 1) {
          $cita = Citas_diarias::find($request->id);
          $cita->activo = 0;
          $cita->save();

        }else{
          $cita = Citas_diarias::find($request->id);
          $cita->activo = 0;
          $cita->save();
          $id_quesige = $request->id + 1;
          $cita2 = Citas_diarias::find($id_quesige);
          $cita2->activo = 0;
          $cita2->save();

        }

          $existe_liquidar = Liquidar::where([['activo',1],['id_cita',$request->id]])->first();

          if (isset($existe_liquidar)) {
            $liquidar = Liquidar::find($request->id);
            $liquidar->activo = 0;
            $liquidar->save();
          }

          $existe_expediente = Expediente::where([['activo',1],['id_cita',$request->id]])->first();

          if (isset($existe_liquidar)) {

          $expediente = Expediente::find($request->id);
          $expediente->activo = 0;
          $expediente->save();
          }




        return response()->json(['success'=>'Ha sido eliminada con éxito']);

      } catch (\Exception $e) {
        dd($e->getMessage());

      }

    }

    public function TraerDatosAgenda(Request $request){

      $bienes_query = ('
      SELECT
      t_calendario_citas.id_calendario,
      t_calendario_citas.cabina,
      t_calendario_citas.status,
      t_calendario_citas.id,
      t_calendario_citas.fecha,
      t_calendario_citas.cliente,
      t_calendario_citas.empleado,
      t_calendario_citas.duracion,
      t_calendario_citas.comision_servicio,
      clientes.nombre AS nombre_cliente,
      clientes.apellido_paterno AS apellido_paterno_cliente,
      clientes.apellido_materno AS apellido_materno_cliente,
      emp.nombre AS nombre_empleado,
      emp.apellido_paterno AS apellido_paterno_empleado,
      emp.apellido_materno AS apellido_paterno_empleado,
      emp2.inicial,
      cat_servicios.nombre as servicio_nombre,
      t_calendario_citas.pagado
      FROM t_calendario_citas
      LEFT JOIN empleados as emp ON emp.id = t_calendario_citas.empleado
      LEFT JOIN empleados AS emp2 ON emp2.id = t_calendario_citas.empleado_servicio
      LEFT JOIN clientes ON clientes.id = t_calendario_citas.cliente
      LEFT JOIN cat_servicios ON cat_servicios.id = t_calendario_citas.servicio
      WHERE t_calendario_citas.activo = "1" and t_calendario_citas.modulo = "1" AND t_calendario_citas.fecha = "'.$request->fecha.'"

       ');
       $cotizacion_articulos= DB::select($bienes_query);
       //dd($bienes_query);
      //
      // $cotizacion_articulos = Citas_diarias::where([
      //   ['activo',1],
      //   ['fecha',$request->fecha]
      // ])->select('id_calendario','cabina','status','id','fecha','cliente','empleado','servicio')->with('obtCliente')->get();
       //dd($cotizacion_articulos);
      return $cotizacion_articulos;
    }

    public function TraerDatosCita(Request $request){
      $datos = Citas_diarias::find($request->id);
      //dd($datos,$request->id);
      return $datos;
    }

    public function TraerDatoFechaEspecifica(Request $request){
      $id_cotizadores = Citas_diarias::where([
        ['activo',1],
        ['modulo',1],
        ['fecha',$request->fecha],
      ])->select('fecha')->groupBy('fecha')->get();

      return $id_cotizadores;
    }

    public function TraerClienteNum(Request $request){
      $cliente = Clientes::find($request->id);
      return $cliente;
    }

    public function ExisteCliente(Request $request){

      //dd($request->id);
      //$servicios = Servicios::find($request->id[0]);
      $servicios = Servicios::whereIN('id',$request->id)->get();
      //dd($servicios);
      if ($servicios->tipo_servicio == 2) {
        $liquidar = Liquidar::where([['activo',1],['id_servicio',$request->id],['id_cliente',$request->id_cliente]])->orderBy('id','DESC')->first();
      }else{
        $liquidar = 0;
      }

      //dd($liquidar);
      return $liquidar;
    }

    public function TraerServicio(Request $request){
        //dd($request->servicio);
        if ($request->servicio == 1) {
          $epale = 1;
        }else if($request->servicio == 2){
          $epale = 2;

        }

        $servicios = Servicios::where([['tipe',$epale],['tipo_servicio',1],['activo',1],['modulo',1]])->get();
        //dd($servicios);
        return $servicios;
    }

    public function traerCita(Request $request){
      $citas = Citas_diarias::where('id',$request->id)->with('obtServicio','obtEmpleado','obtCliente')->first();
      //dd($citas);
      return $citas;
    }

    public function guardarPago(Request $request){
      dd($request->all());
    }

    public function ExisteCita(Request $request){
      //dd($request->all());
      if ($request->tipo == 1) {
        $calend = $request->id_calendario;

      }elseif ($request->tipo == 2) {
        $calend = $request->id_calendario + 1;

      }elseif ($request->tipo == 3) {
        $calend = $request->id_calendario + 2;

      }elseif ($request->tipo == 4) {
        $calend = $request->id_calendario + 3;

      }elseif ($request->tipo == 5) {
        $calend = $request->id_calendario + 4;

      }elseif ($request->tipo == 6) {
        $calend = $request->id_calendario + 5;

      }elseif ($request->tipo == 7) {
        $calend = $request->id_calendario + 6;

      }elseif ($request->tipo == 8) {
        $calend = $request->id_calendario + 7;

      }elseif ($request->tipo == 9) {
        $calend = $request->id_calendario + 8;

      }elseif ($request->tipo == 10) {
        $calend = $request->id_calendario + 9;

      }elseif ($request->tipo == 11) {
        $calend = $request->id_calendario + 10;

      }elseif ($request->tipo == 12) {
        $calend = $request->id_calendario + 11;

      }

      if ($request->estatus == 4) {
        $citas = Citas_diarias::where([['cabina',$request->numero_cabina],['fecha',$request->fecha_cabina],['id_calendario',$calend],['modulo',1],['status',4]])->first();
        //dd($citas);
        if (isset($citas)) {
          $existe = 1;
        }else{
          $existe = 0;

        }
      }else{
        $existe = 0;
      }
      //dd($request->numero_cabina,$calend,$request->fecha_cabina);

      return $existe;
    }

    public function TraerProductillos(Request $request){
      //dd($request->all());
      $otro = explode(',',$request->servicios);
      //dd($otro);
      $servicios = Servicios::whereIN('id',$otro)->get();
      return $servicios;
    }

    // public function TraeDias(Request $request){
    //   $existe_dia = Citas::where('fecha',$request->dia_calendario)->first();
    //   if (isset($existe_dia)) {
    //     $citas = Citas::where('fecha',$request->dia_calendario)->get();
    //   }else{
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '08:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '08:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '09:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '09:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '10:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '10:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '11:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '11:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '12:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '12:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '13:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '13:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '14:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '14:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '15:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '15:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '16:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '16:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '17:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '17:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '18:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '18:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '19:00:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $evento_cita = new Citas;
    //     $evento_cita->horario = '19:30:00';
    //     $evento_cita->fecha = $request->dia_calendario;
    //     $evento_cita->cve_usuario = Auth::user()->id;
    //     $evento_cita->save();
    //
    //     $citas = Citas::where('fecha',$request->dia_calendario)->get();
    //
    //   }
    //
    //   return $citas;
    //
    // }

    public function TraerDatosEmpleado(Request $request){
      //dd($request->empleado);
      $empleados = Empleados::find($request->empleado);
      return $empleados;
    }

    public function existeLiquidacion(Request $request){
      $existe_liquidar = Liquidar::where([['activo',1],['id_cita',$request->id]])->first();
    }


}
