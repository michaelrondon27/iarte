<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EtiquetaRequest;
use App\Http\Controllers\Controller;
use App\Etiqueta;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Datatables;

class EtiquetasController extends Controller
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
        $etiquetas=Etiqueta::all();
        return Datatables::of($etiquetas)
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
        return view('admin.etiquetas.index');
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
    public function store(EtiquetaRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $etiqueta=new Etiqueta($request->all());
        $etiqueta->save();
        $this->registroEvento("Creo la etiqueta ".$etiqueta->etiqueta, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la etiqueta exitosamente!',
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
    public function update(EtiquetaRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $etiqueta=Etiqueta::find($id);
        $etiqueta->fill($request->all());
        $etiqueta->save();
        $this->registroEvento("Edito la etiqueta ".$etiqueta->etiqueta, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado la etiqueta exitosamente!',
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
        $etiqueta=Etiqueta::find($id);
        $etiqueta->delete();
        $this->registroEvento("Elimino la etiqueta ".$etiqueta->etiqueta, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado la etiqueta exitosamente!',
                'tipo'=>'success'
            ]
        );

    }
}
