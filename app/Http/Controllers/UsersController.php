<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Perfil;
use App\Artista;
use App\Museo;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Datatables;

class UsersController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('es');
        //diffForHumans()
    }

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

    public function validacion()
    {
        foreach(Auth::user()->perfiles as $perfil)
        {
            if($perfil->perfil=="Administrador")
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    public function listing()
    {
        $users=User::all();
        return Datatables::of($users)
            ->addColumn('perfiles', function($data){
                foreach($data->perfiles as $perfil){
                    $x[]=$perfil->perfil;
                }
                return with($x);
            })
            ->addColumn('perfil_id', function($data){
                return $data->perfiles->pluck('id')->ToArray();
            })
            ->addColumn('artista_id', function($data){
                return $data->artistas->pluck('id')->ToArray();
            })
            ->addColumn('museo_id', function($data){
                return $data->museos->pluck('id')->ToArray();
            })
            ->editColumn('status_id', function($data){ 
                return with($data->status->status);
            })
            ->addColumn('artistas_asignados', function($data){ 
                return with($data->artistas->count());
            })
            ->addColumn('museos_asignados', function($data){ 
                return with($data->museos->count());
            })
            ->editColumn('created_at', function($data){ 
                return with(new Carbon($data->created_at))->format('d-m-Y H:i:s');
            })
            ->editColumn('updated_at', function($data){ 
                return with(new Carbon($data->updated_at))->format('d-m-Y H:i:s');
            })
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $perfiles=Perfil::orderBy('perfil', 'ASC')->pluck('perfil', 'id');
        $artistas=Artista::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $museos=Museo::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('admin.users.index')->with('perfiles', $perfiles)->with('artistas', $artistas)->with('museos', $museos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $user=new User($request->all());
        $user->password=bcrypt($request->password);
        $user->save();
        $user->perfiles()->sync($request->perfil);
        $this->registroEvento("Creo al usuario ".$user->email, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado el usuario exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $registrosEventos=RegistroEvento::where('usuario', $id)->get();
        return Datatables::of($registrosEventos)
            ->editColumn('created_at', function($data){ 
                return with(new Carbon($data->created_at))->format('d-m-Y H:i:s');
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $user=User::find($id);
        $user->perfiles()->sync($request->perfil);
        $user->artistas()->sync($request->artistas);
        $user->museos()->sync($request->museos);
        $this->registroEvento("Edito al usuario ".$user->email, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado el usuario exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lock($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $user=User::find($id);
        DB::table('users')->where('id', '=', $id)->update(array('status_id' => '2'));
        $this->registroEvento("Bloqueo al usuario ".$user->email, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha bloqueado el usuario exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function unlock($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $user=User::find($id);
        DB::table('users')->where('id', '=', $id)->update(array('status_id' => '1'));
        $this->registroEvento("Desbloqueo al usuario ".$user->email, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha desbloqueado el usuario exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
    
}
