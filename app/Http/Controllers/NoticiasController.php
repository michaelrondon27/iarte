<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\NoticiaRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Noticia;
use App\Etiqueta;
use App\User;
use App\Status;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Datatables;

class NoticiasController extends Controller
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
            if($perfil->perfil=="Administrador" || $perfil->perfil=="Publicista")
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
            $noticias=Noticia::orderBy('titulo', 'ASC');
        }else{
            $noticias=Noticia::where('usuario_id', '=', Auth::user()->id)->get();
        }
        return Datatables::of($noticias)
            ->addColumn('autor', function($data){ 
                $user=User::find($data->usuario_id);
                return $user->name;
            })
            ->addColumn('etiquetas', function($data){
                $array="";
                $etiquetas=DB::table('etiqueta_noticia')->join('etiquetas', 'etiqueta_noticia.etiqueta_id', '=', 'etiquetas.id')->where('noticia_id', '=', $data->id)->get();
                foreach($etiquetas as $etiqueta)
                {
                    $array.=$etiqueta->etiqueta." ";
                }
                $tamaño=strlen($array);
                if($tamaño<50){
                    return $array;
                }else{
                    return substr($array, 0, 50)."...";
                }
            })
            ->addColumn('status', function($data){ 
                $status=Status::find($data->status_id);
                return $status->status;
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
        $noticia=Noticia::find($id);
        $noticia->publicado=$noticia->created_at->format('d-m-Y H:i:s');
        $noticia->usuario;
        $noticia->mis_etiquetas=$noticia->etiquetas->pluck('id')->ToArray();
        return response()->json(
            $noticia->toArray()
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
        $etiquetas=Etiqueta::orderBy('etiqueta', 'ASC')->pluck('etiqueta', 'id');
        $status=Status::where('id', '>=', 7)->where('id', '<=', 8)->pluck('status', 'id');
        return view('admin.noticias.index')->with('etiquetas', $etiquetas)->with('status', $status);
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
    public function store(NoticiaRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $noticia=new Noticia($request->all());
        $noticia->usuario_id=Auth::user()->id;
        $noticia->save();
        $noticia->etiquetas()->sync($request->etiquetas);
        $carpeta=public_path().'/images/noticias/'.$noticia->id;
        if(!file_exists($carpeta)){
            mkdir($carpeta, 0777, true);
        }
        if($request->file('imagen')){
            $file=$request->file('imagen');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$noticia->id.'/'.$name;
            $path=public_path().'/images/noticias/'.$noticia->id.'/';
            $file->move($path, $name);
            DB::table('noticias')->where('id', '=', $noticia->id)->update(array('imagen' => $route));
        }
        $this->registroEvento("Registro la noticia ".$noticia->titulo, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la noticia exitosamente!',
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
        $noticia=Noticia::find($id);
        if($noticia==null)
        {
            return View('errores.404');
        }
        else
        {
            $etiquetas=Etiqueta::orderBy('etiqueta', 'ASC')->pluck('etiqueta', 'id');
            return view('admin.noticias.edit')->with('noticia', $noticia)->with('etiquetas', $etiquetas);   
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticiaRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $noticia=Noticia::find($id);
        $noticia->fill($request->all());
        $noticia->save();
        $noticia->etiquetas()->sync($request->etiquetas);
        $this->registroEvento("Edito la noticia ".$noticia->titulo, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado exitosamente!',
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
        $noticia=Noticia::find($id);
        $noticia->delete();
        $this->registroEvento("Elimino la noticia ".$noticia->titulo, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado la noticia exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function edicion($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $noticia=Noticia::find($id);
        DB::table('noticias')->where('id', '=', $noticia->id)->update(array('status_id' => '7'));
        $this->registroEvento("Puso en edición la noticia ".$noticia->titulo, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha puesto en edición la noticia exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function publicar($id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $noticia=Noticia::find($id);
        DB::table('noticias')->where('id', '=', $noticia->id)->update(array('status_id' => '8'));
        $this->registroEvento("Publicó la noticia ".$noticia->titulo, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'La noticia se ha publicado exitosamente!',
                'tipo'=>'success'
            ]
        );
    }

    public function imagen(ImageRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $noticia=Noticia::find($id);
        if($request->file('imagen')){
            $file=$request->file('imagen');
            $name=time().'.'.$file->getClientOriginalExtension();
            $route=$noticia->id.'/'.$name;
            $path=public_path().'/images/noticias/'.$noticia->id.'/';
            $file->move($path, $name);
        }
        DB::table('noticias')->where('id', '=', $noticia->id)->update(array('imagen' => $route));
        $this->registroEvento("Edito la foto de la noticia ".$noticia->titulo, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
}
