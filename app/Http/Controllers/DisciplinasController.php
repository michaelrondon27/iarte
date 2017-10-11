<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DisciplinaRequest;
use App\Http\Controllers\Controller;
use App\Disciplina;
use App\RegistroEvento;
use Auth;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use Datatables;

class DisciplinasController extends Controller
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
        $disciplinas=Disciplina::all();
        return Datatables::of($disciplinas)
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
        return view('admin.disciplinas.index');
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
    public function store(DisciplinaRequest $request)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $disciplina=new Disciplina($request->all());
        $disciplina->save();
        $this->registroEvento("Creo la disciplina ".$disciplina->disciplina, "INSERT");
        return response()->json(
            [
                'mensaje' => 'Se ha guardado la disciplina exitosamente!',
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
    public function update(DisciplinaRequest $request, $id)
    {
        if($this->validacion()){
            return redirect()->route('home');
        }
        $disciplina=Disciplina::find($id);
        $disciplina->fill($request->all());
        $disciplina->save();
        $this->registroEvento("Edito la disciplina ".$disciplina->disciplina, "UPDATE");
        return response()->json(
            [
                'mensaje' => 'Se ha editado la disciplina exitosamente!',
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
        $disciplina=Disciplina::find($id);
        $disciplina->delete();
        $this->registroEvento("Elimino la disciplina ".$disciplina->disciplina, "DELETE");
        return response()->json(
            [
                'mensaje' => 'Se ha eliminado la disciplina exitosamente!',
                'tipo'=>'success'
            ]
        );
    }
}
