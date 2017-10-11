<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\PaisRequest;
use App\Http\Controllers\Controller;
use App\Pais;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Datatables;

class PaisesController extends Controller
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
        $paises=Pais::all();
        return Datatables::of($paises)
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
        return view('admin.paises.index');
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
    public function store(PaisRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $pais=new Pais($request->all());
        $pais->save();
        $this->registroEvento("Creo el país ".$pais->pais, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado el país exitosamente!',
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
        $pais=Pais::find($id);
        return response()->json(
            $pais->toArray()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaisRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $pais=Pais::find($id);
        $pais->fill($request->all());
        $pais->save();
        $this->registroEvento("Edito el país ".$pais->pais, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado el país exitosamente!',
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
            $pais=Pais::find($id);
            $pais->delete();
            $this->registroEvento("Elimino el país ".$pais->pais, "DELETE");
            return response()->json(
                [
                    'mensaje' => 'Se ha eliminado el país exitosamente!',
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
