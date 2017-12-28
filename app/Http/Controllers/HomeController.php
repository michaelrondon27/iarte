<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\MuseoImagen;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obrasPopulares=MuseoImagen::where('status_id', '=', 3)->orderBy('visitas', 'DESC')->limit(9)->get();
        return view('welcome')->with('obrasPopulares', $obrasPopulares);
    }
}
