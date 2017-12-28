<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EstadoRequest;
use App\Http\Controllers\Controller;
use App\Estado;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Datatables;

class EstadosController extends Controller
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
        $estados=Estado::all();
        return Datatables::of($estados)
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
        return view('admin.estados.index');
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
    public function store(EstadoRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $estado=new Estado($request->all());
        $estado->save();
        $this->registroEvento("Creo el estado ".$estado->estado, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado el estado exitosamente!',
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
    public function update(EstadoRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $estado=Estado::find($id);
        $estado->fill($request->all());
        $estado->save();
        $this->registroEvento("Edito el estado ".$estado->estado, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado el estado exitosamente!',
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
            $estado=Estado::find($id);
            $estado->delete();
            $this->registroEvento("Elimino el estado ".$estado->estado, "DELETE");
            return response()->json(
                [
                    'mensaje' => 'Se ha eliminado el estado exitosamente!',
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
