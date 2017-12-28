<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SolicitudRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use App\Solicitud;
use App\EstadoCivil;
use App\Estado;
use App\GradoInstruccion;
use App\TipoPremio;
use App\Disciplina;
use App\Genero;
use App\Status;
use App\SolicitudImagen;
use App\Artista;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Datatables;
use Illuminate\Support\Facades\DB;

class SolicitudesController extends Controller
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
            if($perfil->perfil=="Administrador" || $perfil->perfil=="Atención al Ciudadano" || $perfil->perfil=="Solicitante")
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
        $solicitudes=Solicitud::where('status_id', '=', 10)->get();
        return Datatables::of($solicitudes)
            ->addColumn('solicitante', function($data){ 
                return $data->nombres." ".$data->apellidos;
            })
            ->addColumn('enviado', function($data){ 
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
        if($this->validacion()){
            return redirect()->route('home');
        }
        return view('admin.solicitudes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $estadosCiviles=EstadoCivil::orderBy('estado_civil', 'ASC')->pluck('estado_civil', 'id');
        $estados=Estado::orderBy('estado', 'ASC')->pluck('estado', 'id');
        $gradosInstrucciones=GradoInstruccion::orderBy('grado_instruccion', 'ASC')->pluck('grado_instruccion', 'id');
        $tiposPremios=TipoPremio::orderBy('tipo_premio', 'ASC')->pluck('tipo_premio', 'id');
        $disciplinas=Disciplina::orderBy('disciplina', 'ASC')->pluck('disciplina', 'id');
        $generos=Genero::orderBy('genero', 'ASC')->pluck('genero', 'id');
        return view('admin.solicitudes.create')->with('estadosCiviles', $estadosCiviles)->with('estados', $estados)->with('gradosInstrucciones', $gradosInstrucciones)->with('tiposPremios', $tiposPremios)->with('disciplinas', $disciplinas)->with('generos', $generos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitudRequest $request)
    {
        $solicitud=new Solicitud($request->all());
        $solicitud->fecha_nacimiento=date("Y-m-d", strtotime($request->fecha_nacimiento));
        $solicitud->pueblo_indigena=$request->pueblo_indigena;
        $solicitud->idiomas=$request->idiomas;
        $solicitud->cursos=$request->cursos;
        $solicitud->relacionados_actividad_artistica=$request->relacionados_actividad_artistica;
        $solicitud->tiempo_actividad_artistica=$request->tiempo_actividad_artistica;
        $solicitud->premio=$request->premio;
        $solicitud->tipo_premio_id=$request->tipo_premio_id;
        $solicitud->grupo=$request->grupo;
        $solicitud->tipo_grupo=$request->tipo_grupo;
        $solicitud->activiades_educativas=$request->activiades_educativas;
        $solicitud->apoyo_economico=$request->apoyo_economico;
        $solicitud->empleo=$request->empleo;
        $solicitud->sueldo=$request->sueldo;
        $solicitud->ingresos_artisticos=$request->ingresos_artisticos;
        $solicitud->jubilado=$request->jubilado;
        $solicitud->pensionado=$request->pensionado;
        $solicitud->subsidio=$request->subsidio;
        $solicitud->status_id=9;
        $solicitud->user_id=Auth::user()->id;
        $solicitud->save();
        $solicitud->disciplinas()->sync($request->disciplinas);
        $miSolicitud=Solicitud::where('user_id', '=', Auth::user()->id)->get();
        $mis_disciplinas=DB::table('disciplina_solicitud')->where('solicitud_id', '=', $miSolicitud[0]->id)->pluck('disciplina_id')->toArray();
        $status=Status::find($miSolicitud[0]->status_id);
        return response()->json(
            [
                'solicitud'=>$miSolicitud->toArray(),
                'mis_disciplinas' => $mis_disciplinas,
                'status' => $status,
                'mensaje' => 'Se ha guardado la solicitud exitosamente!',
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
        if($this->validacion()){
            return redirect()->route('home');
        }
        $solicitud=Solicitud::find($id);
        return view('admin.solicitudes.show')->with('solicitud', $solicitud);
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
    public function update(SolicitudRequest $request, $id)
    {
        $solicitud=Solicitud::find($id);
        $solicitud->fill($request->all());
        $solicitud->fecha_nacimiento=date("Y-m-d", strtotime($request->fecha_nacimiento));
        $solicitud->pueblo_indigena=$request->pueblo_indigena;
        $solicitud->idiomas=$request->idiomas;
        $solicitud->cursos=$request->cursos;
        $solicitud->relacionados_actividad_artistica=$request->relacionados_actividad_artistica;
        $solicitud->tiempo_actividad_artistica=$request->tiempo_actividad_artistica;
        $solicitud->premio=$request->premio;
        $solicitud->tipo_premio_id=$request->tipo_premio_id;
        $solicitud->grupo=$request->grupo;
        $solicitud->tipo_grupo=$request->tipo_grupo;
        $solicitud->activiades_educativas=$request->activiades_educativas;
        $solicitud->apoyo_economico=$request->apoyo_economico;
        $solicitud->empleo=$request->empleo;
        $solicitud->sueldo=$request->sueldo;
        $solicitud->ingresos_artisticos=$request->ingresos_artisticos;
        $solicitud->jubilado=$request->jubilado;
        $solicitud->pensionado=$request->pensionado;
        $solicitud->subsidio=$request->subsidio;
        $solicitud->save();
        $solicitud->disciplinas()->sync($request->disciplinas);
        $miSolicitud=Solicitud::where('user_id', '=', Auth::user()->id)->get();
        $mis_disciplinas=DB::table('disciplina_solicitud')->where('solicitud_id', '=', $miSolicitud[0]->id)->pluck('disciplina_id')->toArray();
        return response()->json(
            [
                'solicitud'=>$miSolicitud->toArray(),
                'mis_disciplinas' => $mis_disciplinas,
                'mensaje' => 'Se ha editado la solicitud exitosamente!',
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

    public function verificarSolicitudDelUsuario(Request $request)
    {
        $conteo=DB::table('solicitudes')->where('user_id', '=', $request->id)->count();
        if($conteo>0){
            $solicitud=Solicitud::where('user_id', '=', $request->id)->get();
            $mis_disciplinas=DB::table('disciplina_solicitud')->where('solicitud_id', '=', $solicitud[0]->id)->pluck('disciplina_id')->toArray();
            $status=Status::find($solicitud[0]->status_id);
            $imagenes=SolicitudImagen::where('solicitud_id', '=', $solicitud[0]->id)->get();
        }else{
            $solicitud="";
            $mis_disciplinas="";
            $status="";
            $imagenes="";
        }
        return response()->json(
            [
                'conteo'=>$conteo,
                'solicitud' => $solicitud,
                'mis_disciplinas' => $mis_disciplinas,
                'status' => $status,
                'imagenes' => $imagenes
            ]
        );  
    }

    public function imagenStore(ImageRequest $request, $id)
    {
        $imagen=new SolicitudImagen($request->all());
        if($request->file('imagen')){
            $file=$request->file('imagen');
            $name=time().'.'.$file->getClientOriginalExtension();
            $ruta=Auth::user()->id.'/'.$name;
            $path=public_path().'/images/usuarios/'.Auth::user()->id.'/';
            $file->move($path, $ruta);
        }
        $imagen->imagen=$ruta;
        $imagen->solicitud_id=$id;
        $imagen->save();
        $imagenes=SolicitudImagen::where('solicitud_id', '=', $id)->get();
        $solicitud=Solicitud::find($id);
        $this->registroEvento("Agrego la imagen ".$imagen->imagen." para la solicitud ", "INSERT");
        return response()->json(
            [
                'imagenes' => $imagenes,
                'solicitud' => $solicitud,
                'mensaje' => 'Se ha guardado la imagen exitosamente!',
                'tipo'=>'success'
            ]
        ); 
    }

    public function imagenEliminar($id)
    {
        $imagen=SolicitudImagen::find($id);
        $imagen->delete();
        $imagenes=SolicitudImagen::where('solicitud_id', '=', $imagen->solicitud_id)->get();
        $solicitud=Solicitud::find($imagen->solicitud_id);
        $this->registroEvento("Elimino la imagen ".$imagen->imagen." para la solicitud ", "DELETE");
        return response()->json(
            [
                'imagenes' => $imagenes,
                'solicitud' => $solicitud,
                'mensaje' => 'Se ha eliminadp la imagen exitosamente!',
                'tipo'=>'success'
            ]
        ); 
    }

    public function enviarSolicitud($id)
    {
        $solicitud=Solicitud::find($id);
        $solicitud->status_id=10;
        $solicitud->save();
        $status=Status::find(10);
        $this->registroEvento("Envio la solicitud ", "UPDATE");
        return response()->json(
            [
                'status' => $status,
                'mensaje' => 'Se ha enviado la solicitud exitosamente!',
                'tipo'=>'success'
            ]
        ); 
    }

    public function rechazar(Request $request)
    {
        $solicitud=Solicitud::find($request->id);
        $solicitud->status_id=11;
        $solicitud->save();
        $this->registroEvento("Rechazo la solicitud del solicitante ".$solicitud->nombres." ".$solicitud->apellidos." ".$solicitud->cedula, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha rechazado la solicitud exitosamente!',
                'tipo'=>'success'
            ]
        ); 
    }

    public function aceptar(Request $request)
    {
        $solicitud=Solicitud::find($request->id);
        $solicitud->status_id=12;
        $solicitud->save();
        $artista=new Artista;
        $artista->nombre=$solicitud->nombres." ".$solicitud->apellidos;
        $artista->fecha_nacimiento=$solicitud->fecha_nacimiento;
        $artista->telefono=$solicitud->telefono;
        $artista->direccion=$solicitud->direccion;
        $artista->biografia="Hola, mi nombre es ".$solicitud->nombres." ".$solicitud->apellidos;
        $artista->status_id=3;
        $artista->genero_id=$solicitud->genero_id;
        $artista->pais_nacimiento_id=190;
        $artista->tipo=true;
        $artista->save();
        $artista->users()->sync($solicitud->user_id);
        DB::table('perfil_user')->where('user_id', '=', $solicitud->user_id)->update(array('perfil_id' => 2));
        $this->registroEvento("Acepto la solicitud del solicitante ".$solicitud->nombres." ".$solicitud->apellidos." ".$solicitud->cedula, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha acaptado la solicitud exitosamente!',
                'tipo'=>'success'
            ]
        ); 
    }
}
