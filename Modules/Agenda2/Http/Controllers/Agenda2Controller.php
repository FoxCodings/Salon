<?php

namespace Modules\Agenda2\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Agenda2\Entities\Eventos;
use \Modules\Agenda2\Entities\Citas;
use \Modules\Agenda2\Entities\ListaEspera;
use \Modules\Agenda2\Entities\Citas_diarias;
use \Modules\Catalogos2\Entities\Servicios;
use \Modules\Clientes\Entities\Clientes;
use \Modules\Empleados\Entities\Empleados;
use \Modules\Ventas2\Entities\Prepago;
use \Modules\Ventas2\Entities\Liquidar;
use \Modules\Expedientes\Entities\Expediente;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;

class Agenda2Controller extends Controller
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
    $data['clientes'] = Clientes::where([['activo',1],['modulo',2]])->get();
    $data['empleados'] = Empleados::where([['activo',1],['modulo',2]])->get();
    $data['citas'] = Citas::where([['activo',1]])->get();
    $data['servicios'] = Servicios::where([['activo',1],['modulo',2]])->get();


    $data['id_cotizadores'] = Citas_diarias::where([
      ['activo',1],
      ['modulo',2],
    ])->select('fecha')->groupBy('fecha')->get();
    return view('agenda2::index')->with($data);
  }

  /**
   * Show the form for creating a new resource.
   * @return Renderable
   */
  public function create()
  {
      return view('agenda2::create');
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
      $evento->modulo = 2;
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

    $data['clientes'] = Clientes::where([['activo',1],['modulo',2]])->get();
    $data['empleados'] = Empleados::where([['activo',1],['modulo',2]])->get();
    $data['citas'] = Citas::where([['activo',1]])->get();
    $data['servicios'] = Servicios::where([['activo',1],['modulo',2]])->get();
    $data['lista_espera'] = ListaEspera::where([['activo',1]])->get();

    $data['id_cotizadores'] = Citas_diarias::where([
      ['activo',1],
      ['modulo',2],
    ])->select('fecha')->groupBy('fecha')->get();
    return view('agenda2::inicio')->with($data);
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

      $data['clientes'] = Clientes::where([['activo',1],['modulo',2]])->get();
      $data['empleado_inicial'] = Empleados::where([['activo',1],['modulo',2],['id','!=',1]])->get();
      $data['empleados'] = Empleados::where([['activo',1],['modulo',2],['id','!=',1]])->get();
      $data['citas'] = Citas::where([['activo',1]])->get();
      $data['servicios'] = Servicios::where([['activo',1]])->get();
      $data['lista_espera'] = ListaEspera::where([['activo',1]])->get();

      $data['id_cotizadores'] = Citas_diarias::where([
        ['activo',1],
        ['modulo',2],
      ])->select('fecha')->groupBy('fecha')->get();
      return view('agenda2::vista')->with($data);
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
      return view('agenda2::create')->with($data);
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
            $evento_cita->modulo = 2;
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
            $evento_cita->modulo = 2;
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
            $evento_cita2->horario = $nuevaHora;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->modulo = 2;
            $evento_cita2->cve_usuario = Auth::user()->id;
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
            $evento_cita->modulo = 2;
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
            $evento_cita->modulo = 2;
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
            $evento_cita2->horario = $nuevaHora;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->tipo = $request->tipo;
            $evento_cita2->tipo_cabello = $request->tipo_cabello;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->modulo = 2;
            $evento_cita2->cve_usuario = Auth::user()->id;
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








        }else{

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
            $evento_cita->modulo = 2;
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
            $evento_cita->modulo = 2;
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
            $evento_cita2->horario = $nuevaHora;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->tipo = $request->tipo;
            $evento_cita2->tipo_cabello = $request->tipo_cabello;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->modulo = 2;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->save();

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

        if ($request->este == 2) {

          if ($request->este4 == 1) {
            //dd('aqui entro');
            //$evento_cita = new Citas_diarias();
            $evento_cita = Citas_diarias::find($request->id);
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
            $evento_cita->modulo = 2;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

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
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->tipo = $request->tipo;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->modulo = 2;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

            $cabina_siguienbte = $request->id_calendario + 1;
            $id_siguienbte = $evento_cita->id + 1;
            // dd($request->id_calendario,$cabina_siguienbte,$id_siguienbte,$evento_cita->id );
            $evento_cita2 = Citas_diarias::find($id_siguienbte);
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario = $cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $evento_cita->status;
            $evento_cita2->fecha = $request->fecha_cabina;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->tipo = $request->tipo;
            $evento_cita2->tipo_cabello = $request->tipo_cabello;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->modulo = 2;
            $evento_cita2->cve_usuario = Auth::user()->id;
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
            $evento_cita->tipo = $request->tipo;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->modulo = 2;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

          }else if($request->este4 == 2){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->tipo = $request->tipo;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->modulo = 2;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

            $cabina_siguienbte = $request->id_calendario + 1;
            $id_siguienbte = $evento_cita->id + 1;
            // dd($request->id_calendario,$cabina_siguienbte,$id_siguienbte,$evento_cita->id );
            $evento_cita2 = Citas_diarias::find($id_siguienbte);
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario = $cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $evento_cita->status;
            $evento_cita2->fecha = $request->fecha_cabina;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->tipo = $request->tipo;
            $evento_cita2->tipo_cabello = $request->tipo_cabello;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->modulo = 2;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->save();

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
            $evento_cita->modulo = 2;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

          }else if($request->este4 == 2){

            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->tipo = $request->tipo;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->modulo = 2;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

            $cabina_siguienbte = $request->id_calendario + 1;
            $id_siguienbte = $evento_cita->id + 1;
            // dd($request->id_calendario,$cabina_siguienbte,$id_siguienbte,$evento_cita->id );
            $evento_cita2 = Citas_diarias::find($id_siguienbte);
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario = $cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $evento_cita->status;
            $evento_cita2->fecha = $request->fecha_cabina;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->tipo = $request->tipo;
            $evento_cita2->tipo_cabello = $request->tipo_cabello;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->modulo = 2;
            $evento_cita2->cve_usuario = Auth::user()->id;
            $evento_cita2->save();

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
            $evento_cita->modulo = 2;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

          }else if($request->este4 == 2){
            $date= $request->hora_cabina;
            $horaInicial=$date;
            $minutoAnadir=30;
            $segundos_horaInicial=strtotime($horaInicial);
            $segundos_minutoAnadir=$minutoAnadir*60;
            $nuevaHora=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);

            $evento_cita = Citas_diarias::find($request->id);
            $evento_cita->cabina = $request->numero_cabina;
            $evento_cita->id_calendario = $request->id_calendario;
            $evento_cita->cliente = $request->clientes;
            $evento_cita->empleado = $request->empleados;
            $evento_cita->empleado_servicio = $request->este2;
            $evento_cita->comision_servicio = $request->este3;
            $evento_cita->duracion = $request->este4;
            $evento_cita->status = $request->este;
            $evento_cita->fecha = $request->fecha_cabina;
            $evento_cita->horario = $request->hora_cabina;
            $evento_cita->descripcion = $request->descripcion;
            $evento_cita->servicio = $request->servicios;
            $evento_cita->tipo = $request->tipo;
            $evento_cita->tipo_cabello = $request->tipo_cabello;
            $evento_cita->telefono_cliente = $request->telefono;
            $evento_cita->modulo = 2;
            $evento_cita->cve_usuario = Auth::user()->id;
            $evento_cita->save();

            $cabina_siguienbte = $request->id_calendario + 1;
            $id_siguienbte = $evento_cita->id + 1;
            // dd($request->id_calendario,$cabina_siguienbte,$id_siguienbte,$evento_cita->id );
            $evento_cita2 = Citas_diarias::find($id_siguienbte);
            $evento_cita2->cabina = $request->numero_cabina;
            $evento_cita2->id_calendario = $cabina_siguienbte;
            $evento_cita2->cliente = $request->clientes;
            $evento_cita2->empleado = $request->empleados;
            $evento_cita2->empleado_servicio = $request->este2;
            $evento_cita2->comision_servicio = $request->este3;
            $evento_cita2->duracion = $request->este4;
            $evento_cita2->status = $evento_cita->status;
            $evento_cita2->fecha = $request->fecha_cabina;
            $evento_cita2->horario = $request->hora_cabina;
            $evento_cita2->descripcion = $request->descripcion;
            $evento_cita2->servicio = $request->servicios;
            $evento_cita2->tipo = $request->tipo;
            $evento_cita2->tipo_cabello = $request->tipo_cabello;
            $evento_cita2->telefono_cliente = $request->telefono;
            $evento_cita2->modulo = 2;
            $evento_cita2->cve_usuario = Auth::user()->id;
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
    $registros = Eventos::where([['activo', 1],['modulo',2]])->get(); //user es una entidad que se trae desde la app
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
              "href" => "/agenda2/$value->id/edit" //esta ruta esta en el archivo web
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
        SELECT * FROM evento where evento.fecha BETWEEN ('".$request->event_start."') and ('".$request->event_end."')  and modulo = 2
    ");

      $data = DB::select($porcentaje_articulos_id_query_2);
        return response()->json($data);



    }

    public function VerEvento(Request $request){
      $porcentaje_articulos_id_query_3 = ("
        SELECT * FROM evento where id = $request->id and activo = '1'
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
      cat_servicios.nombre as servicio_nombre
      FROM t_calendario_citas
      LEFT JOIN empleados as emp ON emp.id = t_calendario_citas.empleado
      LEFT JOIN empleados AS emp2 ON emp2.id = t_calendario_citas.empleado_servicio
      LEFT JOIN clientes ON clientes.id = t_calendario_citas.cliente
      LEFT JOIN cat_servicios ON cat_servicios.id = t_calendario_citas.servicio
      WHERE t_calendario_citas.activo = "1" and t_calendario_citas.modulo = "2" AND t_calendario_citas.fecha = "'.$request->fecha.'"

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
        ['modulo',2],
        ['fecha',$request->fecha],
      ])->select('fecha')->groupBy('fecha')->get();

      return $id_cotizadores;
    }

    public function TraerClienteNum(Request $request){
      $cliente = Clientes::find($request->id);
      return $cliente;
    }

    public function ExisteCliente(Request $request){
      $servicios = Servicios::find($request->id);
      if ($servicios->tipo_servicio == 2) {
        $liquidar = Liquidar::where([['activo',1],['id_servicio',$request->id],['id_cliente',$request->id_cliente]])->orderBy('id','DESC')->first();
      }else{
        $liquidar = 0;
      }

      //dd($liquidar);
      return $liquidar;
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
}
