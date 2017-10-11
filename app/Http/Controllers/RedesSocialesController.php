<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RedSocialRequest;
use App\Http\Controllers\Controller;
use App\RedSocial;
use App\Icon;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Datatables;

class RedesSocialesController extends Controller
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
        $redesSociales=RedSocial::all();
        $redesSociales->each(function($redSocial){
            $redSocial->icon;
        });
        return response()->json(
           $redesSociales->toArray()
        );
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
        $icons=Icon::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.redessociales.index')->with('icons', $icons);
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
    public function store(RedSocialRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $redSocial=new RedSocial($request->all());
        $redSocial->save();
        $this->registroEvento("Creo la red social ".$redSocial->red_social, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la red social exitosamente!',
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
        $redSocial=RedSocial::find($id);
        return response()->json(
           $redSocial->toArray()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $redSocial=RedSocial::find($id);
        $redSocial->fill($request->all());
        $redSocial->save();
        $this->registroEvento("Edito la red social ".$redSocial->red_social, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado la red social exitosamente!',
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
        try { 
            $redSocial=RedSocial::find($id);
            $redSocial->delete();
            $this->registroEvento("Elimino la red social ".$redSocial->red_social, "DELETE");
            return response()->json(
            [
                'mensaje' => 'Se ha eliminado la red social exitosamente!',
                'tipo'=>'success'
            ]
        );
        } catch(QueryException $ex){ 
            return response()->json(
                [
                    'mensaje' => 'No se puede eliminar el registro porque tiene dependencia en otras tablas!',
                    'tipo'=>'success'
                ]
            );
        }
    }
}
