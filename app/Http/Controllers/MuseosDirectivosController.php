<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MuseoDirectivoRequest;
use App\Http\Controllers\Controller;
use App\MuseoDirectivo;
use App\User;
use App\Cargo;
use App\RegistroEvento;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Datatables;

class MuseosDirectivosController extends Controller
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
        $museosDirectivos=MuseoDirectivo::where('museo_id', '=', $id);
        return Datatables::of($museosDirectivos)
            ->addColumn('cargo', function($data){
                $cargo=Cargo::find($data->cargo_id);
                return $cargo->cargo;
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
    public function store(MuseoDirectivoRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museoDirectivo=new MuseoDirectivo($request->all());
        $museoDirectivo->save();
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$museoDirectivo->museo_id.'/directiva/'.$name;
            $path=public_path().'/images/museos/'.$museoDirectivo->museo_id.'/directiva/';
            $file->move($path, $name);
            DB::table('museo_directivo')->where('id', '=', $museoDirectivo->id)->update(array('foto' => $route));
        }
        $this->registroEvento("Registro al directivo ".$museoDirectivo->nombre." al museo ".$museoDirectivo->museo->nombre, "INSERT");
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
    public function update(MuseoDirectivoRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museoDirectivo=MuseoDirectivo::find($id);
        $museoDirectivo->fill($request->all());
        $museoDirectivo->save();
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$museoDirectivo->museo_id.'/directiva/'.$name;
            $path=public_path().'/images/museos/'.$museoDirectivo->museo_id.'/directiva/';
            $file->move($path, $name);
            DB::table('museo_directivo')->where('id', '=', $museoDirectivo->id)->update(array('foto' => $route));
        }
        $this->registroEvento("Edito al directivo ".$museoDirectivo->nombre." al museo ".$museoDirectivo->museo->nombre, "UPDATE");
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
        $museoDirectivo=MuseoDirectivo::find($id);
        $museoDirectivo->delete();
        $this->registroEvento("Elimino el directivo ".$museoDirectivo->nombre." del museo ".$museoDirectivo->museo->nombre, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado el registro exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
}
