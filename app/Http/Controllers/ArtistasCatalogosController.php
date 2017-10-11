<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArtistaCatalogoRequest;
use App\Http\Controllers\Controller;
use App\Artista;
use App\ArtistaCatalogo;
use App\Disciplina;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArtistasCatalogosController extends Controller
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

    public function search($id)
    {
        $catalogo=ArtistaCatalogo::find($id);
        $catalogo->mis_disciplinas=$catalogo->disciplinas->pluck('id')->ToArray();
        $catalogo->artista;
        $catalogo->artistasCatalogosImagenes;
        return response()->json(
            $catalogo->toArray()
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
    public function store(Request $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $catalogo=new ArtistaCatalogo($request->all());
        $catalogo->save();
        $carpeta=public_path().'/images/artistas/'.$request->artista_id.'/catalogo/'.$catalogo->id;
        if(!file_exists($carpeta)){
            mkdir($carpeta, 0777, true);
        }
        $catalogo->disciplinas()->sync($request->disciplinas);
        $this->registroEvento("Creo el catalogo ".$catalogo->titulo, "INSERT");
        return redirect()->route('artistascatalogos.show', $catalogo->artista_id);
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
        $artista=Artista::find($id);
        $catalogos=ArtistaCatalogo::where('artista_id', '=', $artista->id)->orderBy('visitas', 'DESC')->get();
        $tags=Disciplina::orderBy('disciplina', 'ASC')->get();
        $disciplinas=Disciplina::orderBy('disciplina', 'ASC')->pluck('disciplina', 'id');
        return view('admin.catalogos.show')->with('catalogos', $catalogos)->with('disciplinas', $disciplinas)->with('artista', $artista)->with('tags', $tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $catalogo=ArtistaCatalogo::find($id);
        $disciplinas=Disciplina::orderBy('disciplina', 'ASC')->pluck('disciplina', 'id');
        $mis_disciplinas=$catalogo->disciplinas->pluck('id')->ToArray();
        return view('admin.catalogos.edit')->with('catalogo', $catalogo)->with('disciplinas', $disciplinas)->with('mis_disciplinas', $mis_disciplinas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistaCatalogoRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $catalogo=ArtistaCatalogo::find($id);
        $catalogo->fill($request->all());
        $catalogo->save();
        $catalogo->disciplinas()->sync($request->disciplinas);
        $this->registroEvento("Edito el catalogo ".$catalogo->titulo, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado el catalogo exitosamente!',
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
        $catalogo=ArtistaCatalogo::find($id);
        $catalogo->delete();
        $this->registroEvento("Elimino el catalogo ".$catalogo->titulo, "DELETE");
        return redirect()->route('artistascatalogos.show', $catalogo->artista_id);
    }

    public function lock($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $catalogo=ArtistaCatalogo::find($id);
        DB::table('artista_catalogo')->where('id', '=', $catalogo->id)->update(array('status_id' => '5'));
        $this->registroEvento("Bloqueo el catalogo ".$catalogo->titulo, "UPDATE");
        return redirect()->route('artistascatalogos.show', $catalogo->artista_id);
    }

    public function unlock($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $catalogo=ArtistaCatalogo::find($id);
        DB::table('artista_catalogo')->where('id', '=', $catalogo->id)->update(array('status_id' => '3'));
        $this->registroEvento("Desbloqueo el catalogo ".$catalogo->titulo, "UPDATE");
        return redirect()->route('artistascatalogos.show', $catalogo->artista_id);
    }

}
