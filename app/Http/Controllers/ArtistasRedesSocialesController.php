<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArtistaRedSocialRequest;
use App\Http\Controllers\Controller;
use App\ArtistaRedSocial;
use App\RedSocial;
use App\Artista;
use App\User;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Datatables;

class ArtistasRedesSocialesController extends Controller
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
        $redesSociales=DB::table('artista_red_social')->where('artista_id', '=', $id)->get();
        return Datatables::of($redesSociales)
            ->addColumn('red_social', function($data){ 
                $redSocial=DB::table('redes_sociales')->where('id', '=', $data->red_social_id)->get();
                return $redSocial[0]->red_social;
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
    public function store(ArtistaRedSocialRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $redSocial=new ArtistaRedSocial($request->all());
        $redSocial->save();
        $this->registroEvento("Registro la red social ".$redSocial->redSocial->red_social.' '.$redSocial->nombre.' al artista '.$redSocial->artista->nombre, "INSERT");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistaRedSocialRequest $request, $id)
    {
        $redSocial=ArtistaRedSocial::find($id);
        $redSocial->fill($request->all());
        $redSocial->save();
        $this->registroEvento("Edito la red social ".$redSocial->redSocial->red_social.' '.$redSocial->nombre.' al artista '.$redSocial->artista->nombre, "UPDATE");
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
        $redSocial=ArtistaRedSocial::find($id);
        $redSocial->delete();
        $this->registroEvento("Elimino la red social ".$redSocial->redSocial->red_social.' '.$redSocial->nombre.' al artista '.$redSocial->artista->nombre, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado la red social exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
}
