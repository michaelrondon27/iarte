<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ArtistaRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Artista;
use App\ArtistaCatalogo;
use App\Genero;
use App\Pais;
use App\Profesion;
use App\Disciplina;
use App\User;
use App\Status;
use App\RegistroEvento;
use App\RedSocial;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Datatables;

class ArtistasController extends Controller
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

    public function listing()
    {
        $artistas=DB::table('artista_user')->join('artistas', 'artista_user.artista_id', '=', 'artistas.id')->where('artista_user.user_id', '=', Auth::user()->id)->get();
        return Datatables::of($artistas)
            ->addColumn('profesiones', function($data){
                return DB::table('artista_profesion')->where('artista_id', '=', $data->id)->count();
            })
            ->addColumn('disciplinas', function($data){
                return DB::table('artista_disciplina')->where('artista_id', '=', $data->id)->count();
            })
            ->addColumn('status', function($data){
                $status=Status::find($data->status_id);
                return $status->status;
            })
            ->addColumn('asignados', function($data){
                return DB::table('artista_user')->where('artista_id', '=', $data->id)->pluck('user_id')->ToArray();
            })
            ->editColumn('created_at', function($data){ 
                return with(new Carbon($data->created_at))->format('d-m-Y H:i:s');
            })
            ->editColumn('updated_at', function($data){ 
                return with(new Carbon($data->updated_at))->format('d-m-Y H:i:s');
            })
            ->make(true);
    }

    public function search($id)
    {
        $artista=Artista::find($id);
        $artista->mis_disciplinas=$artista->disciplinas->pluck('id')->ToArray();
        $artista->mis_profesiones=$artista->profesiones->pluck('id')->ToArray();
        $artista->genero=$artista->genero;
        $artista->pais_nacimiento=Pais::where('id', '=', $artista->pais_nacimiento_id)->get();
        $artista->pais_muerte=Pais::where('id', '=', $artista->pais_muerte_id)->get();
        $artista->catalogoConteo=$artista->artistasCatalogos->count();
        $imagenes=0;
        foreach($artista->artistasCatalogos as $artistaCatalogo){
            $imagenes=$imagenes+$artistaCatalogo->artistasCatalogosImagenes->count();
        }
        $artista->imagenConteo=$imagenes;
        $artista->artistasHabilidades;
        return response()->json(
            $artista->toArray()
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
        $generos=Genero::orderBy('genero', 'ASC')->pluck('genero', 'id');
        $paises=Pais::orderBy('pais', 'ASC')->pluck('pais', 'id');
        $profesiones=Profesion::orderBy('profesion', 'ASC')->pluck('profesion', 'id');
        $disciplinas=Disciplina::orderBy('disciplina', 'ASC')->pluck('disciplina', 'id');
        $usuarios=User::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.artistas.index')->with('generos', $generos)->with('paises', $paises)->with('profesiones', $profesiones)->with('disciplinas', $disciplinas)->with('usuarios', $usuarios);
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
    public function store(ArtistaRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $artista=new Artista($request->all());
        $artista->fecha_nacimiento=date("Y-m-d", strtotime($request->fecha_nacimiento));
        $artista->fecha_muerte=date("Y-m-d", strtotime($request->fecha_muerte));
        $artista->save();
        $carpeta=public_path().'/images/artistas/'.$artista->id;
        if(!file_exists($carpeta)){
            mkdir($carpeta, 0777, true);
        }
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$artista->id.'/'.$name;
            $path=public_path().'/images/artistas/'.$artista->id.'/';
            $file->move($path, $name);
            DB::table('artistas')->where('id', '=', $artista->id)->update(array('foto' => $route));
        }
        $catalogo=public_path().'/images/artistas/'.$artista->id.'/catalogo';
        if(!file_exists($catalogo)){
            mkdir($catalogo, 0777, true);
        }
        $artista->profesiones()->sync($request->profesiones);
        $artista->disciplinas()->sync($request->disciplinas);
        $artista->users()->sync($request->usuarios);
        $this->registroEvento("Creo el artista ".$artista->nombre, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado el artista exitosamente!',
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
        if($this->validacion()){
            return redirect()->route('home');
        }
        $artista=Artista::find($id);
        $generos=Genero::orderBy('genero', 'ASC')->pluck('genero', 'id');
        $paises=Pais::orderBy('pais', 'ASC')->pluck('pais', 'id');
        $profesiones=Profesion::orderBy('profesion', 'ASC')->pluck('profesion', 'id');
        $disciplinas=Disciplina::orderBy('disciplina', 'ASC')->pluck('disciplina', 'id');
        $tags=Disciplina::orderBy('disciplina', 'ASC')->get();
        $redesSociales=RedSocial::orderBy('red_social', 'ASC')->pluck('red_social', 'id');
        $catalogos=ArtistaCatalogo::where('artista_id', '=', $artista->id)->orderBy('visitas', 'DESC')->paginate(9);
        return view('admin.artistas.edit')->with('artista', $artista)->with('generos', $generos)->with('paises', $paises)->with('profesiones', $profesiones)->with('disciplinas', $disciplinas)->with('tags', $tags)->with('catalogos', $catalogos)->with('redesSociales', $redesSociales);
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
        $artista=Artista::find($id);
        $artista->fill($request->all());
        $artista->fecha_nacimiento=date("Y-m-d", strtotime($request->fecha_nacimiento));
        $artista->fecha_muerte=date("Y-m-d", strtotime($request->fecha_muerte));
        $artista->save();
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$artista->id.'/'.$name;
            $path=public_path().'/images/artistas/'.$artista->id.'/';
            $file->move($path, $name);
            DB::table('artistas')->where('id', '=', $artista->id)->update(array('foto' => $route));
        }
        $artista->profesiones()->sync($request->profesiones);
        $artista->disciplinas()->sync($request->disciplinas);
        $this->registroEvento("Edito el artista ".$artista->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado el artista exitosamente!',
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

    public function lock($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $artista=Artista::find($id);
        DB::table('artistas')->where('id', '=', $artista->id)->update(array('status_id' => '4'));
        $this->registroEvento("Bloqueo al público el artista ".$artista->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha bloqueado el artista exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function unlock($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $artista=Artista::find($id);
        DB::table('artistas')->where('id', '=', $artista->id)->update(array('status_id' => '3'));
        $this->registroEvento("Desloqueo al público el artista ".$artista->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha desbloqueado el artista exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function portada(ImageRequest $request, $id)
    {
        $artista=Artista::find($id);
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$artista->id.'/'.$name;
            $path=public_path().'/images/artistas/'.$artista->id.'/';
            $file->move($path, $name);
        }
        DB::table('artistas')->where('id', '=', $artista->id)->update(array('portada' => $route));
        $this->registroEvento("Edito la foto de la portada del artista ".$artista->nombre, "UPDATE");
        Flash::success('Se ha actualizado la foto de portada del artista '.$artista->name.' con éxito!');
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function biografia(ImageRequest $request, $id)
    {
        $artista=Artista::find($id);
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$artista->id.'/'.$name;
            $path=public_path().'/images/artistas/'.$artista->id.'/';
            $file->move($path, $name);
        }
        DB::table('artistas')->where('id', '=', $artista->id)->update(array('bg_biografia' => $route));
        $this->registroEvento("Edito la foto de la biografia del artista ".$artista->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function habilidad(ImageRequest $request, $id)
    {
        $artista=Artista::find($id);
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$artista->id.'/'.$name;
            $path=public_path().'/images/artistas/'.$artista->id.'/';
            $file->move($path, $name);
        }
        DB::table('artistas')->where('id', '=', $artista->id)->update(array('bg_habilidades' => $route));
        $this->registroEvento("Edito la foto de la habilidad del artista ".$artista->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function asignar($id)
    {
        $artista=Artista::find($id);
        $users=User::orderBy('name', 'ASC')->pluck('name', 'id');
        $mis_users=$artista->users->pluck('id')->ToArray();
        return view('admin.artistas.asignar')->with('artista', $artista)->with('users', $users)->with('mis_users', $mis_users);
    }

    public function asignarStore(Request $request, $id)
    {
        $artista=Artista::find($id);
        $artista->users()->sync($request->users);
        $this->registroEvento("Le asigno usuarios al artista ".$artista->nombre, "UPDATE");
        Flash::success('Se le ha asignado al artista '.$artista->nombre.' los usuarios satisfactoriamente!');
        return redirect()->route('artista.asignar', $artista->id);
    }

}
