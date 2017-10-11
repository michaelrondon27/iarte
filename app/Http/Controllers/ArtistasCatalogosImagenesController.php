<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArtistaCatalogoImagenRequest;
use App\Http\Controllers\Controller;
use App\ArtistaCatalogoImagen;
use App\User;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtistasCatalogosImagenesController extends Controller
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
    public function store(ArtistaCatalogoImagenRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $catalogoImagen=new ArtistaCatalogoImagen($request->all());
        if($request->file('imagen')){
            $file=$request->file('imagen');
            $name=time().'.'.$file->getClientOriginalExtension();
            $imagen=$request->artista_id.'/catalogo/'.$request->artista_catalogo_id.'/'.$name;
            $path=public_path().'/images/artistas/'.$request->artista_id.'/catalogo/'.$request->artista_catalogo_id.'/';
            $file->move($path, $imagen);
        }
        $catalogoImagen->imagen=$imagen;
        $catalogoImagen->save();
        $this->registroEvento("Agrego la imagen ".$catalogoImagen->nombre." al catalogo ".$catalogoImagen->artistaCatalogo->titulo, "INSERT");
        return redirect()->route('artistascatalogos.edit', $catalogoImagen->artista_catalogo_id);
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
    public function update(ArtistaCatalogoImagenRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $catalogoImagen=ArtistaCatalogoImagen::find($id);
        $catalogoImagen->nombre=$request->nombre;
        $catalogoImagen->descripcion=$request->descripcion;
        if($request->file('imagen')){
            $file=$request->file('imagen');
            $name=time().'.'.$file->getClientOriginalExtension();
            $imagen=$catalogoImagen->artistaCatalogo->artista_id.'/catalogo/'.$catalogoImagen->artista_catalogo_id.'/'.$name;
            $path=public_path().'/images/artistas/'.$catalogoImagen->artistaCatalogo->artista_id.'/catalogo/'.$catalogoImagen->artista_catalogo_id.'/';
            $file->move($path, $imagen);
            $catalogoImagen->imagen=$imagen;
        }
        $catalogoImagen->save();
        $this->registroEvento("Edito la imagen ".$catalogoImagen->nombre." al catalogo ".$catalogoImagen->artistaCatalogo->titulo, "UPDATE");
        return redirect()->route('artistascatalogos.edit', $catalogoImagen->artista_catalogo_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalogoImagen=ArtistaCatalogoImagen::find($id);
        $catalogoImagen->delete();
        $this->registroEvento("Elimino la imagen ".$catalogoImagen->nombre." al catalogo ".$catalogoImagen->artistaCatalogo->titulo, "DELETE");
        return redirect()->route('artistascatalogos.edit', $catalogoImagen->artista_catalogo_id);
    }

    public function lock($id)
    {
        $catalogoImagen=ArtistaCatalogoImagen::find($id);
        DB::table('artista_catalogo_imagen')->where('id', '=', $catalogoImagen->id)->update(array('status_id' => '5'));
        return redirect()->route('artistascatalogos.edit', $catalogoImagen->artista_catalogo_id);
    }

    public function unlock($id)
    {
        $catalogoImagen=ArtistaCatalogoImagen::find($id);
        DB::table('artista_catalogo_imagen')->where('id', '=', $catalogoImagen->id)->update(array('status_id' => '3'));
        return redirect()->route('artistascatalogos.edit', $catalogoImagen->artista_catalogo_id);
    }
}
