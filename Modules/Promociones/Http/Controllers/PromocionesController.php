<?php

namespace Modules\Promociones\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use \Modules\Usuarios\Entities\Negocio;
use Mail;
use Session;
use Auth;
use \DB;
use \Modules\Clientes\Entities\Clientes;
use \Modules\Promociones\Entities\Promociones;
use \Modules\Promociones\Entities\Clientes_Promocion;
use \Modules\Promociones\Entities\Cliente_Cumpleano;

use \Modules\Promociones\Entities\Descuentos;
use \Modules\Agendas\Entities\Eventos;
use App\Mail\PromocionEmail;
use App\Mail\Template_2;

class PromocionesController extends Controller
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

        return view('promociones::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['clientes'] = Clientes::where([['activo',1],['modulo',1]])->get();
        $data['descuentos'] = Descuentos::where('activo',1)->get();
        return view('promociones::create')->with($data);
    }

    public function createcumpleanos()
    {
      $anio = date('Y');
      $mes = date('m');
      $date = $anio.'-'.$mes.'-'.'01';
      $fecho = date("Y-m-t", strtotime($date));

        Cliente_Cumpleano::where([['activo',1],['modulo',1]])->delete();

        $eventos = Eventos::where([['titulo','cumpleaños']])->whereBetween('fecha', [$date, $fecho])->get();
        $cliente_id = [];
        $cliente_nombre = [];
        foreach ($eventos as $key => $value) {
        //  dd($value);

        $cliente =  Clientes::where([['activo',1],['modulo',1],['id',$value['cliente']]])->get();



        foreach ($cliente as $key => $valuecl) {



          $nombres = $valuecl->nombre.' '.$valuecl->apellido_paterno.' '.$valuecl->apellido_materno;



          $cliente_cumpleano = new Cliente_Cumpleano();
          $cliente_cumpleano->correo_electronico = $valuecl->correo_electronico;
          $cliente_cumpleano->nombre = $nombres;
          $cliente_cumpleano->modulo = 1;
          $cliente_cumpleano->save();

        }





        }
        //$data['clientes'] = [['correo_electronico' => $cliente_id, 'nombre' => $cliente_nombre]];

        $data['clientes'] = Cliente_Cumpleano::where([['activo',1],['modulo',1]])->get();
        $data['descuentos'] = Descuentos::where('activo',1)->get();
        //dd($data);
        return view('promociones::createcumpleanos')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
      try {
        $DesdeNumero = 1;
          $HastaNumero = 10000;
          $numeroAleatorio = rand($DesdeNumero, $HastaNumero);

          /////////////////////// fechas separadas /////////////////
          list($dia,$mes,$anio)=explode('/',$request->fecha_vigencia);
          $fecha = $anio.'-'.$mes.'-'.$dia;
          /////////////////////// fecha inicial ///////////////////

          $fecha_inicial_vigencia = '2022-10-10';
          /////////////////////// fecha final ///////////////////

          $fecha_final_vigencia = $fecha;

          $descuento = Descuentos::find($request->descuentos_promocion);

          $negocio = Negocio::where('id',1)->first();

          foreach ($request->clientes_promocion as $key => $value_correo) {
              $email = [$value_correo];
              $subject = 'Promociones';
              $message = $request->nombre_promocion.','.$descuento->descuento.','.$request->descripcion.','.$numeroAleatorio.','.$fecha_inicial_vigencia.','.$fecha_final_vigencia.','.$negocio->facebook.','.$negocio->instagram.','.$negocio->direccion.','.$negocio->telefono;

              Mail::to($email)->send( new PromocionEmail($subject,$message ));
          }


              // if ($request->template == '1') {
              //     foreach ($request->clientes_promocion as $key => $value_correo) {
              //         $email = [$value_correo];
              //         $subject = 'Promociones';
              //         $message = $request->nombre_promocion.','.$request->descuentos_promocion.','.$request->descripcion.','.$numeroAleatorio.','.$fecha_inicial_vigencia.','.$fecha_final_vigencia;
              //
              //         Mail::to($email)->send( new PromocionEmail($subject,$message ));
              //     }
              // }elseif($request->template == '2'){
              //     foreach ($request->clientes_promocion as $key => $value_correo) {
              //         $email = [$value_correo];
              //         $subject = 'Promociones';
              //         $message = $request->nombre_promocion.','.$request->descuentos_promocion.','.$request->descripcion.','.$numeroAleatorio.','.$fecha_inicial_vigencia.','.$fecha_final_vigencia;
              //
              //         Mail::to($email)->send( new Template_2($subject,$message ));
              //     }
              // }





          $promocion = new Promociones();
          $promocion->nombre_promocion = $request->nombre_promocion;
          $promocion->descuentos_promocion = $descuento->descuento;
          $promocion->descripcion = $request->descripcion;
          $promocion->template = $request->template;
          $promocion->serie_promocion = $numeroAleatorio;
          $promocion->modulo = 1;
          $promocion->template = 1;
          $promocion->fecha_final_vigencia = $fecha;
          $promocion->cve_usuario = Auth::user()->id;
          $promocion->save();


          foreach ($request->clientes_promocion as $value) {

          $clientes_promocion = new Clientes_Promocion();
          $clientes_promocion->id_promocion = $promocion->id;
          $clientes_promocion->clientes_promocion = $value;
          $clientes_promocion->save();
          }


          return response()->json(['success'=>'Se ha Enviado con Exito']);
      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }



    public function stores(Request $request)
    {
      try {
        $DesdeNumero = 1;
          $HastaNumero = 10000;
          $numeroAleatorio = rand($DesdeNumero, $HastaNumero);

          /////////////////////// fechas separadas /////////////////
          list($dia,$mes,$anio)=explode('/',$request->fecha_vigencia);
          $fecha = $anio.'-'.$mes.'-'.$dia;
          /////////////////////// fecha inicial ///////////////////

          $fecha_inicial_vigencia = '2022-10-10';
          /////////////////////// fecha final ///////////////////

          $fecha_final_vigencia = $fecha;

          $descuento = Descuentos::find($request->descuentos_promocion);
          $nombre_promocion = 'Feliz Cumpleaños ';
          $descripcion = 'Pink and Gold Te deseamos feliz cumpleaños por lo tanto te regalamos el';

          foreach ($request->clientes_promocion as $key => $value_correo) {
              $email = [$value_correo];
              $subject = 'Promociones';
              $message = $nombre_promocion.','.$descuento->descuento.','.$descripcion.','.$numeroAleatorio.','.$fecha_inicial_vigencia.','.$fecha_final_vigencia;

              Mail::to($email)->send( new Template_2($subject,$message ));
          }

          $promocion = new Promociones();
          $promocion->nombre_promocion = $nombre_promocion;
          $promocion->descuentos_promocion = $descuento->descuento;
          $promocion->descripcion = $request->descripcion;
          $promocion->template = $request->template;
          $promocion->serie_promocion = $numeroAleatorio;
          $promocion->modulo = 1;
          $promocion->template = 2;
          $promocion->fecha_final_vigencia = $fecha;
          $promocion->cve_usuario = Auth::user()->id;
          $promocion->save();


          foreach ($request->clientes_promocion as $value) {
          $clientes_promocion = new Clientes_Promocion();
          $clientes_promocion->id_promocion = $promocion->id;
          $clientes_promocion->clientes_promocion = $value;
          $clientes_promocion->save();
          }


          return response()->json(['success'=>'Se ha Enviado con Exito']);
      } catch (\Exception $e) {
        dd($e->getMessage());
      }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('promociones::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('promociones::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
     public function destroy(Request $request)
     {
       try {
         $usuario = Promociones::find($request->id);
         $usuario->activo = 0;
         $usuario->save();
         return response()->json(['success'=>'Eliminado exitosamente']);
       } catch (\Exception $e) {
         dd($e->getMessage());
       }
     }


    public function tablapromociones(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Promociones::where([['activo', 1],['modulo',1]])->get(); //user es una entidad que se trae desde la app
      $datatable = DataTables::of($registros)
      ->editColumn('template', function ($registros) {

        if ($registros->template == 1) {
          $vista = 'Promocion';
        }else if($registros->template == 2){
          $vista = 'Promoción Cumpleaños';
        }
      return $vista;

      })

      ->editColumn('fecha_final_vigencia', function ($registros) {

        list($anio,$mes,$dia) = explode('-',$registros->fecha_final_vigencia);
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
              // "Editar" => [
              //   "icon" => "edit blue",
              //   "href" => "/nomina/$value->id/edit" //esta ruta esta en el archivo web
              // ],
              "Eliminar" => [
                "icon" => "edit blue",
                "onclick" => "eliminar($value->id)"
              ]
            ];
          // }


      $value->acciones = generarDropdown($acciones);
      }
      $datatable->setData($data);
      return $datatable;
    }
}
