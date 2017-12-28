<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MuseoImagenRequest;
use App\Http\Controllers\Controller;
use App\MuseoImagen;
use App\User;
use App\Status;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MuseosImagenesController extends Controller
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

    public function listarImagenes(Request $request)
    {
        $museoImagenes=MuseoImagen::where('museo_id', '=', $request->id_museo)->orderBy('id', 'DESC')->take($request->take)->skip($request->buscar)->get();
        return response()->json(
            $museoImagenes->toArray()
        );
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
    public function store(MuseoImagenRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        if($request->file('imagen')){
            $file=$request->file('imagen');
            $name=$request->museo_id.'/'.time().'.'.$file->getClientOriginalExtension();
            $route=$request->museo_id.'/'.$name;
            $path=public_path().'/images/museos/'.$request->museo_id.'/';
            $file->move($path, $name);
            $museoImagen=new MuseoImagen($request->all());
            $museoImagen->imagen=$name;
            $museoImagen->museo_id=$request->museo_id;
            $museoImagen->status_id=3;
            $museoImagen->save();
            $this->registroEvento("Agrego la iamgen ".$museoImagen->titulo." al museo ".$museoImagen->nombre, "INSERT");
            return response()->json(
                [
                    'mensaje' => 'Se ha guardado la imagen exitosamente!',
                    'tipo'=>'success'
                ]
            );
        }
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
    public function update(MuseoImagenRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museoImagen=MuseoImagen::find($id);
        $museoImagen->fill($request->all());
        $museoImagen->save();
        return response()->json(
            [
                'mensaje' => 'Se ha editado los datos exitosamente!',
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
        $museoImagen=MuseoImagen::find($id);
        $museoImagen->delete();
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
}
