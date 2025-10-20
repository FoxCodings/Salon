<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Modules\Usuarios\Entities\Roles;
use \Modules\Usuarios\Entities\RolesPermisos;
use \Modules\Usuarios\Entities\ModeloRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \Modules\Catalogos\Entities\Tipo;
use \Modules\Catalogos\Entities\Piedra;
use \Modules\Catalogos\Entities\Metal;
use \Modules\Catalogos\Entities\Genero;
use \Modules\Catalogos\Entities\ImagenAnillo;
use \Modules\Prendas\Entities\Prendas;
use \Modules\Prendas\Entities\Favoritos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Validator;
use \App\Models\User;
use \DB;

class ApiController extends Controller
{
   // public function piedras(){
   //   //dd('entro');
   //   $piedras = Piedra::where('activo',1)->get();
   //   return $piedras;
   // }
   //
   // public function tipos(){
   //   //dd('entro');
   //   $piedras = Tipo::where('activo',1)->get();
   //   return $piedras;
   // }
   //
   // public function metales(){
   //   //dd('entro');
   //   $piedras = Metal::where('activo',1)->get();
   //   return $piedras;
   // }
   //
   // public function generos(){
   //   //dd('entro');
   //   $piedras = Genero::where('activo',1)->get();
   //   return $piedras;
   // }


   public function login(Request $request){
     //dd($request->all());
     if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
        'activo' => 1
      ])){
      $user = Auth::user();
      // $success['roles'] = $user->roles->pluck('name')->toArray();
      // $success['token'] =  $user->createToken('MyApp')->plainTextToken;
      $success['name'] =  $user->name;
      $success['nombre'] = $user->nombre;
      $success['apellido_paterno'] = $user->apellido_paterno;
      $success['apellido_materno'] = $user->apellido_materno;
      $success['email'] = $user->email;
      $success['id'] = $user->id;

      $usuario = User::find($user->id);

      //dd($usuario);
      $obj4 =(object)  array(
        'name' => $usuario->id,
        'nombre' => $usuario->nombre,
        'apellido_paterno' => $usuario->apellido_paterno,
        'apellido_materno' => $usuario->apellido_materno,
        'tipo_usuario' => $usuario->tipo_usuario,
        'modulo' => $usuario->modulo,
      );

      // $favoritos = Favoritos::select('cve_prenda')->where('id_usuario',$user->id)->get();
      // // $id_usuario = (object) array('id' => $user->id);
      // $datos = [];
      //
      // // foreach ($favoritos as $key => $value) {
      // //     array_push($datos,$favoritos[$i]['cve_prenda']);
      // // }
      //
      // for ($i=0; $i < count($favoritos); $i++) {
      //   //dd($imagenes[$i]['imagen']);
      //
      //     // $obji = (object) array($favoritos[$i]['cve_prenda']);
      //     array_push($datos,intval($favoritos[$i]['cve_prenda']));
      //
      //
      // }
      //
      // $enviar = ['id' => $user->id,'favoritos' => $datos];
      return $obj4;
      //return $enviar;
    }else{
      return 'Usuario No Existe';
    }

   }



}
