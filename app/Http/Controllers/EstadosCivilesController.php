<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EstadoCivilRequest;
use App\Http\Controllers\Controller;
use App\EstadoCivil;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Datatables;

class EstadosCivilesController extends Controller
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
            if($perfil->perfil=="Administrador" || $perfil->perfil=="Atención al Ciudadano")
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
        $estadosCiviles=EstadoCivil::all();
        return Datatables::of($estadosCiviles)
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
        if($this->validacion()){
            return redirect()->route('home');
        }
        return view('admin.estadosciviles.index');
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
    public function store(EstadoCivilRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $estadoCivil=new EstadoCivil($request->all());
        $estadoCivil->save();
        $this->registroEvento("Creo el estado civil ".$estadoCivil->estado_civil, "INSERT");
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
    public function update(EstadoCivilRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $estadoCivil=EstadoCivil::find($id);
        $estadoCivil->fill($request->all());
        $estadoCivil->save();
        $this->registroEvento("Edito el estado civil ".$estadoCivil->estado_civil, "UPDATE");
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
        try { 
            $estadoCivil=EstadoCivil::find($id);
            $estadoCivil->delete();
            $this->registroEvento("Elimino el estado civil ".$estadoCivil->estado_civil, "DELETE");
            return response()->json(
                [
                    'mensaje' => 'Se ha eliminado el registro exitosamente!',
                    'tipo'=>'success'
                ]
            );
        } catch(QueryException $ex){ 
            return response()->json(
                [
                    'mensaje' => 'No se puede eliminar el registro porque tiene dependencia en otras tablas!',
                    'tipo'=>'danger'
                ]
            );
        }
    }
}
