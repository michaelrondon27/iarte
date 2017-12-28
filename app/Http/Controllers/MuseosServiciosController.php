<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MuseoServicioRequest;
use App\Http\Controllers\Controller;
use App\MuseoServicio;
use App\User;
use App\RegistroEvento;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Datatables;

class MuseosServiciosController extends Controller
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
            if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor")
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    public function listing($id)
    {
        $museosServicios=MuseoServicio::where('museo_id', '=', $id);
        return Datatables::of($museosServicios)
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
        //
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
    public function store(MuseoServicioRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museoServicio=new MuseoServicio($request->all());
        $museoServicio->save();
        $this->registroEvento("Registro el servicio ".$museoServicio->servicio." al museo ".$museoServicio->museo->nombre, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado el registro exitosamente!',
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
        //
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
    public function update(MuseoServicioRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museoServicio=MuseoServicio::find($id);
        $museoServicio->fill($request->all());
        $museoServicio->save();
        $this->registroEvento("Edito el servicio ".$museoServicio->servicio." al museo ".$museoServicio->museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado el registro exitosamente!',
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
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museoServicio=MuseoServicio::find($id);
        $museoServicio->delete();
        $this->registroEvento("Elimino el servicio ".$museoServicio->servicio." del museo ".$museoServicio->museo->nombre, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado el registro exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
}
