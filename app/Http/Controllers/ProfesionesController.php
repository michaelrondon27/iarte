<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProfesionRequest;
use App\Http\Controllers\Controller;
use App\Profesion;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Datatables;

class ProfesionesController extends Controller
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

    public function listing()
    {
        $profesiones=Profesion::all();
        return Datatables::of($profesiones)
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
        return view('admin.profesiones.index');
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
    public function store(ProfesionRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $profesion=new Profesion($request->all());
        $profesion->save();
        $this->registroEvento("Creo el profesión ".$profesion->profesion, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la profesión exitosamente!',
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
    public function update(ProfesionRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $profesion=Profesion::find($id);
        $profesion->fill($request->all());
        $profesion->save();
        $this->registroEvento("Edito el profesión ".$profesion->profesion, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado la profesión exitosamente!',
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
        $profesion=Profesion::find($id);
        $profesion->delete();
        $this->registroEvento("Elimino el profesión ".$profesion->profesion, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado la profesión exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
}
