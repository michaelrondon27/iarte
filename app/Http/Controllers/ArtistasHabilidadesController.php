<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArtistaHabilidadRequest;
use App\Http\Controllers\Controller;
use App\ArtistaHabilidad;
use App\User;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Datatables;

class ArtistasHabilidadesController extends Controller
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
            if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor" || $perfil->perfil=="Artista")
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
        $habilidades=DB::table('artista_habilidad')->where('artista_id', '=', $id)->get();
        return Datatables::of($habilidades)
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
    public function store(ArtistaHabilidadRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $habilidad=new ArtistaHabilidad($request->all());
        $habilidad->save();
        $this->registroEvento("Registro la habilidad ".$habilidad->habilidad, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la habilidad exitosamente!',
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
    public function update(ArtistaHabilidadRequest $request, $id)
    {
        $habilidad=ArtistaHabilidad::find($id);
        $habilidad->fill($request->all());
        $habilidad->save();
        $this->registroEvento("Edito habilidad ".$habilidad->habilidad, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado la habilidad exitosamente!',
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
        $habilidad=ArtistaHabilidad::find($id);
        $habilidad->delete();
        $this->registroEvento("Elimino la habilidad ".$habilidad->habilidad, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado la habilidad exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
}
