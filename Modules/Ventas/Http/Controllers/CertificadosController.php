<?php

namespace Modules\Ventas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use \Modules\Clientes\Entities\Clientes;
use \Modules\Ventas\Entities\Certificado;
use \Modules\Catalogos\Entities\Servicios;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use \App\Models\User;
use Auth;
use \DB;
use Barryvdh\DomPDF\Facade as PDF;
class CertificadosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('ventas::certificados.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['servicios'] = Servicios::where([['activo',1],['modulo',1]])->get();
        return view('ventas::certificados.create')->with($data);
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

          list($dia,$mes,$anio)=explode('/',$request->vigencia);
          $fecha = $anio.'-'.$mes.'-'.$dia;

          $certificado = new Certificado();
          $certificado->nombre_cliente = $request->nombre_cliente;
          $certificado->apellido_paterno_cliente = $request->apellido_paterno_cliente;
          $certificado->apellido_materno_cliente = $request->apellido_materno_cliente;
          $certificado->nombre = $request->nombre;
          $certificado->apellido_paterno = $request->apellido_paterno;
          $certificado->apellido_materno = $request->apellido_materno;
          $certificado->telefono = $request->telefono;
          $certificado->id_servicios = $request->servicios;
          $certificado->vigencia = $fecha;
          $certificado->tipo = $request->tipo;
          $certificado->modulo = 1;
          $certificado->medidas = $request->este3;
          $certificado->cve_usuario = Auth::user()->id;
          $certificado->save();

          $cliente = new Clientes();
          $cliente->nombre = $request->nombre;
          $cliente->apellido_paterno = $request->apellido_paterno;
          $cliente->apellido_materno = $request->apellido_materno;
          $cliente->telefono = $request->telefono;
          $cliente->modulo = 1;
          $cliente->cve_usuario = Auth::user()->id;
          $cliente->save();

          $certificado = Certificado::find($certificado->id);
          $certificado->cliente_id = $cliente->id;
          $certificado->cve_usuario = Auth::user()->id;
          $certificado->save();



          return response()->json(['success'=>'Se Agrego Satisfactoriamente']);
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
        return view('ventas::certificados.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['certificados'] = Certificado::find($id);
        $data['servicios'] = Servicios::where([['activo',1],['modulo',1]])->get();
        return view('ventas::certificados.create')->with($data);
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
        list($dia,$mes,$anio)=explode('/',$request->vigencia);
        $fecha = $anio.'-'.$mes.'-'.$dia;

        $certificado = Certificado::find($request->id);
        $certificado->nombre_cliente = $request->nombre_cliente;
        $certificado->apellido_paterno_cliente = $request->apellido_paterno_cliente;
        $certificado->apellido_materno_cliente = $request->apellido_materno_cliente;
        $certificado->nombre = $request->nombre;
        $certificado->apellido_paterno = $request->apellido_paterno;
        $certificado->apellido_materno = $request->apellido_materno;
        $certificado->telefono = $request->telefono;
        $certificado->id_servicios = $request->servicios;
        $certificado->vigencia = $fecha;
        $certificado->tipo = $request->tipo;
        $certificado->medidas = $request->este3;
        $certificado->cve_usuario = Auth::user()->id;
        $certificado->save();

        $cliente = Clientes::find($certificado->cliente_id);
        $cliente->nombre = $request->nombre;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->telefono = $request->telefono;
        $cliente->modulo = 1;
        $cliente->cve_usuario = Auth::user()->id;
        $cliente->save();

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
        $usuario = Certificado::find($request->id);
        $usuario->activo = 0;
        $usuario->save();

        return response()->json(['success'=>'Eliminado exitosamente']);
      } catch (\Exception $e) {
        dd($e->getMessage());
      }
    }

    public function tablacertificados(){
      setlocale(LC_TIME, 'es_ES');
      \DB::statement("SET lc_time_names = 'es_ES'");
      $registros = Certificado::where([['activo', 1],['modulo',1]])->get(); 
      $datatable = DataTables::of($registros)
      ->editColumn('nombre', function ($registros) {
        return $registros->nombre.' '.$registros->apellido_paterno.' '.$registros->apellido_materno;
      })
      ->editColumn('nombre_cliente', function ($registros) {
        return $registros->nombre_cliente.' '.$registros->apellido_paterno_cliente.' '.$registros->apellido_materno_cliente;
      })
      ->editColumn('id_servicios', function ($registros) {
        return $registros->obtservicioCe->nombre;
      })
      ->editColumn('tipo', function ($registros) {
        if($registros->tipo == 1){
          $tipo = 'Mujer';
        }else{
          $tipo = 'Hombre';
        }

        return $tipo;
      })
      ->editColumn('status', function ($registros) {
        if($registros->status == 1){
          $tipo = 'Sin Pagar';
        }else{
          $tipo = 'Pagado';
        }

        return $tipo;
      })
      ->editColumn('vigencia', function ($registros) {

        list($anio,$mes,$dia) = explode('-',$registros->vigencia);
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

        if ($value->status == 'Sin Pagar') {
          $acciones = [
            "Editar" => [
              "icon" => "edit blue",
              "href" => "/ventas/certificados/$value->id/edit" //esta ruta esta en el archivo web
            ],
            "Pagar Efectivo" => [
              "icon" => "edit blue",
              "onclick" => "pagar($value->id,1)"
            ],
            "Pagar Transferencia" => [
              "icon" => "edit blue",
              "onclick" => "pagar($value->id,2)"
            ],
            "Pagar Tarjeta" => [
              "icon" => "edit blue",
              "onclick" => "pagar($value->id,3)"
            ],
            "Pagar Point" => [
              "icon" => "edit blue",
              "onclick" => "pagar($value->id,4)"
            ],
            "Eliminar" => [
              "icon" => "edit blue",
              "onclick" => "eliminar($value->id)"
            ],
          ];
        }else{
          $acciones = [
            "Editar" => [
              "icon" => "edit blue",
              "href" => "/ventas/certificados/$value->id/edit",
              "target" => "_blank"
            ],
            "Imprimir Frontal" => [
              "icon" => "edit blue",
              "href" => "/ventas/certificados/$value->id/imprimir",
              "target" => "_blank"
            ],
            "Imprimir Posterior" => [
              "icon" => "edit blue",
              "href" => "/ventas/certificados/$value->id/imprimirposterior",
              "target" => "_blank"
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

    public function imprimir($id){
    $data['id'] = $id;
    $data['certificados'] = Certificado::find($id);


    $pdf = PDF::loadView('ventas::certificados.certificado_imprimir', $data);
    $pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
    $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true,'defaultFont' => 'pacifico_normal_9e96d9e23ad102bc05be47680b365314']);

    $pdf->output();

    $namePdf = 'Frontal PINK & GOLD.pdf';
    return $pdf->download($namePdf);
    return $pdf->stream();
    //return view('ventas::certificados.certificado_imprimir')->with($data);
  }

  public function imprimirposterior($id){
  $data['id'] = $id;
  $data['certificados'] = Certificado::find($id);

  $pdf = PDF::loadView('ventas::certificados.certificado_posterior_imprimir', $data);
  $pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
  $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true,'defaultFont' => 'pacifico_normal_9e96d9e23ad102bc05be47680b365314']);

  $pdf->output();

  $namePdf = 'Posterior PINK & GOLD.pdf';
  return $pdf->download($namePdf);
  return $pdf->stream();


  //$pdf = PDF::loadView('recibos::imprimir', $data);
  // $pdf->setPaper(array(0,0,612.00, 790.00), 'portrait');
  // $pdf->setOptions(['enable_php' => true,'isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);
  //
  // $pdf->output();
  //
  // $namePdf = 'Oficio de Comisión.pdf';
  // return $pdf->download($namePdf);
  // return $pdf->stream();
  //return view('ventas::certificados.certificado_posterior_imprimir')->with($data);
}

}
