<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\MuseoRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Museo;
use App\TipoMuseo;
use App\Artista;
use App\Cargo;
use App\User;
use App\Status;
use App\Estado;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Datatables;

class MuseosController extends Controller
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
        if(Auth::user()->perfiles->first()->perfil=='Administrador'){
            $museos=Museo::all();
        }else{
            $museos=DB::table('museo_user')->join('museos', 'museo_user.museo_id', '=', 'museos.id')->where('museo_user.user_id', '=', Auth::user()->id)->get();
        }
        return Datatables::of($museos)
            ->editColumn('fecha_fundacion', function($data){ 
                return with(new Carbon($data->fecha_fundacion))->format('d-m-Y');
            })
            ->addColumn('status', function($data){
                $status=Status::find($data->status_id);
                return $status->status;
            })
            ->addColumn('asignados', function($data){
                return DB::table('museo_user')->where('museo_id', '=', $data->id)->pluck('user_id')->ToArray();
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
        $museo=Museo::find($id);
        $museo->mis_tipos_museos=$museo->tiposMuseos->pluck('id')->ToArray();
        $museo->mis_artistas=$museo->artistas->pluck('id')->ToArray();
        $museo->mis_usuarios=$museo->users->pluck('id')->ToArray();
        $museo->artistasConteo=$museo->artistas->count();
        $museo->imagenConteo=$museo->museosImagenes->count();
        $museo->museosImagenes;
        $museo->promedioObrasVistas=number_format(DB::table('museo_imagen')->where('museo_id', '=', $museo->id)->avg('visitas'));
        return response()->json(
            $museo->toArray()
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
        $tiposMuseos=TipoMuseo::orderBy('tipo_museo', 'ASC')->pluck('tipo_museo', 'id');
        $usuarios=User::where('status_id', '=', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
        $artistas=Artista::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        $estados=Estado::orderBy('estado', 'ASC')->pluck('estado', 'id');
        return view('admin.museos.index')->with('tiposMuseos', $tiposMuseos)->with('usuarios', $usuarios)->with('artistas', $artistas)->with('estados', $estados);
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
    public function store(MuseoRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=new Museo($request->all());
        $museo->fecha_fundacion=date("Y-m-d", strtotime($request->fecha_fundacion));
        $museo->status_id=4;
        $museo->save();
        $carpeta=public_path().'/images/museos/'.$museo->id;
        if(!file_exists($carpeta)){
            mkdir($carpeta, 0777, true);
        }
        $directivo=public_path().'/images/museos/'.$museo->id.'/directiva';
        if(!file_exists($directivo)){
            mkdir($directivo, 0777, true);
        }
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$museo->id.'/'.$name;
            $path=public_path().'/images/museos/'.$museo->id.'/';
            $file->move($path, $name);
            DB::table('museos')->where('id', '=', $museo->id)->update(array('foto' => $route));
        }
        $museo->users()->sync($request->usuarios);
        $museo->artistas()->sync($request->artistas);
        $museo->tiposMuseos()->sync($request->tipos_museos);
        $this->registroEvento("Creo el museo ".$museo->nombre, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado el museo exitosamente!',
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
        $museo=Museo::find($id);
        $artistas=Artista::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('admin.museos.show')->with('museo', $museo)->with('artistas', $artistas);
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
        $museo=Museo::find($id);
        if($museo==null)
        {
            return View('errores.404');
        }
        else
        {
            $tiposMuseos=TipoMuseo::orderBy('tipo_museo', 'ASC')->pluck('tipo_museo', 'id');
            $artistas=Artista::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
            $usuarios=User::where('status_id', '=', 1)->orderBy('name', 'ASC')->pluck('name', 'id');
            $cargos=Cargo::orderBy('cargo', 'ASC')->pluck('cargo', 'id');
            $estados=Estado::orderBy('estado', 'ASC')->pluck('estado', 'id');
            return view('admin.museos.edit')->with('museo', $museo)->with('tiposMuseos', $tiposMuseos)->with('artistas', $artistas)->with('usuarios', $usuarios)->with('cargos', $cargos)->with('estados', $estados);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MuseoRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=Museo::find($id);
        $museo->fill($request->all());
        $museo->fecha_fundacion=date("Y-m-d", strtotime($request->fecha_fundacion));
        $museo->save();
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$museo->id.'/'.$name;
            $path=public_path().'/images/museos/'.$museo->id.'/';
            $file->move($path, $name);
            DB::table('museos')->where('id', '=', $museo->id)->update(array('foto' => $route));
        }
        $museo->artistas()->sync($request->artistas);
        $museo->tiposMuseos()->sync($request->tipos_museos);
        $this->registroEvento("Edito el museo ".$museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado el museo exitosamente!',
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
        $museo=Museo::find($id);
        $museo->delete();
        $this->registroEvento("Elimino el museo ".$museo->nombre, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado el museo exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function lock($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=Museo::find($id);
        DB::table('museos')->where('id', '=', $museo->id)->update(array('status_id' => '4'));
        $this->registroEvento("Bloqueo al público el museo ".$museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha bloqueado el museo exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function unlock($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=Museo::find($id);
        DB::table('museos')->where('id', '=', $museo->id)->update(array('status_id' => '3'));
        $this->registroEvento("Desloqueo al público el museo ".$museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha desbloqueado el museo exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function asignar(Request $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $artista=Artista::find($id);
        $artista->users()->sync($request->usuarios);
        $this->registroEvento("Le asigno usuarios al artista ".$artista->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se han asignados los usuarios exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function portada(ImageRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=Museo::find($id);
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$museo->id.'/'.$name;
            $path=public_path().'/images/museos/'.$museo->id.'/';
            $file->move($path, $name);
        }
        DB::table('museos')->where('id', '=', $museo->id)->update(array('portada' => $route));
        $this->registroEvento("Edito la foto de la portada del museo ".$museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function historia(ImageRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=Museo::find($id);
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$museo->id.'/'.$name;
            $path=public_path().'/images/museos/'.$museo->id.'/';
            $file->move($path, $name);
        }
        DB::table('museos')->where('id', '=', $museo->id)->update(array('bg_historia' => $route));
        $this->registroEvento("Edito la foto de la historia del museo ".$museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function servicio(ImageRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=Museo::find($id);
        if($request->file('foto')){
            $file=$request->file('foto');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$museo->id.'/'.$name;
            $path=public_path().'/images/museos/'.$museo->id.'/';
            $file->move($path, $name);
        }
        DB::table('museos')->where('id', '=', $museo->id)->update(array('bg_servicios' => $route));
        $this->registroEvento("Edito la foto de los historia del museo ".$museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function contacto(Request $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=Museo::find($id);
        $museo->fill($request->all());
        $museo->save();
        
        $this->registroEvento("Edito la informacion de contacto del museo ".$museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Datos editados exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function mapa(Request $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $museo=Museo::find($id);
        $museo->fill($request->all());
        $museo->save();
        
        $this->registroEvento("Edito las coordenadas del mapa del museo ".$museo->nombre, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Datos editados exitosamente! Para ver los cambios, actualice la página!',
                'tipo'=>'success'
            ]
        );
    }
}
