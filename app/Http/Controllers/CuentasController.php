<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Artista;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CuentasController extends Controller
{

    public function getIp()
    {
        $indicesServer = array('REMOTE_ADDR',);
        return $ip=$_SERVER['REMOTE_ADDR'];
    }

    public function registroEvento($evento, $operacion)
    {
        $registroEvento=new RegistroEvento();
        $registroEvento->evento=$evento;
        $registroEvento->ip=$this->getIp();
        $registroEvento->operacion=$operacion;
        $registroEvento->usuario=Auth::user()->id;
        $registroEvento->save();
    }

	public function cuenta()
	{
		return view('admin.cuentas.index');
	}

	public function buscar(Request $request)
	{
		$usuario=User::find($request->id);
		$usuario->perfiles;
		$usuario->status;
		return response()->json(
            $usuario->toArray()
        );
	}

	public function password(PasswordRequest $request, $id)
	{
		$usuario=User::find($id);
		$usuario->password=bcrypt($request->password);
		$usuario->save();
		$this->registroEvento("Cambio de contraseña", "UPDATE");
		return response()->json(
            [
                'mensaje' => 'Se ha cambiado la contraseña exitosamente!',
                'tipo'=>'success'
            ]
        );
	}

	public function imagen(Request $request, $id)
    {
        $user=User::find($id);
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$user->id.'/'.$name;
            $path=public_path().'/images/usuarios/'.$user->id.'/';
            $file->move($path, $name);
            $user->foto=$route;
            $user->save();
        }
        $this->registroEvento("Actualizo su foto de perfil", "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la foto exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

}
