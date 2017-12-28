<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesion;
use App\Disciplina;
use App\Pais;
use App\Artista;
use App\Estado;
use App\TipoMuseo;
use App\Museo;

class ReportesController extends Controller
{
 
	/* Métodos para reportes de artistas */

		public function artistas()
		{
			return view('admin.reportes.artistas');
		}

		public function artistasPorProfesiones()
		{
			$profesiones=Profesion::all();
			$profesiones->each(function($profesion){
	            $profesion->conteo=$profesion->artistas->count();
	        });
	        return response()->json(
	            $profesiones->toArray()
	        );		
	    }

	    public function artistasPorDisciplinas()
		{
			$disciplinas=Disciplina::all();
			$disciplinas->each(function($disciplina){
	            $disciplina->conteo=$disciplina->artistas->count();
	        });
	        return response()->json(
	            $disciplinas->toArray()
	        );		
	    }

	    public function artistasPorPaises()
		{
			$paises=Pais::all();
			$paises->each(function($pais){
	            $pais->conteo=Artista::where('pais_nacimiento_id', '=', $pais->id)->count();
	        });
	        return response()->json(
	            $paises->toArray()
	        );		
	    }

	    public function catalogosPorArtistas()
		{
			$artistas=Artista::all();
			$artistas->each(function($artista){
	            $artista->conteo=$artista->artistasCatalogos->count();
	        });
	        return response()->json(
	            $artistas->toArray()
	        );		
	    }

	    public function visitasPorArtistas()
		{
			$artistas=Artista::all();
	        return response()->json(
	            $artistas->toArray()
	        );		
	    }

	    public function visitasPorCatalogosArtistas()
		{
			$artistas=Artista::all();
			$artistas->each(function($artista){
				$artista->conteo=0;
	            foreach($artista->artistasCatalogos as $catalogo)
	            {
	            	$artista->conteo=$artista->conteo+$catalogo->visitas;
	            }
	        });
	        return response()->json(
	            $artistas->toArray()
	        );		
	    }

	/* ------------------------------------------- */

	/* Métodos para reportes de msueos */

		public function museos()
		{
			return view('admin.reportes.museos');
		}

		public function museosPorEstados()
		{
			$estados=Estado::all();
			$estados->each(function($estado){
	            $estado->conteo=$estado->museos->count();
	        });
	        return response()->json(
	            $estados->toArray()
	        );		
	    }

	    public function tiposMuseos()
		{
			$tiposMuseos=TipoMuseo::all();
			$tiposMuseos->each(function($tipoMuseo){
	            $tipoMuseo->conteo=$tipoMuseo->museos->count();
	        });
	        return response()->json(
	            $tiposMuseos->toArray()
	        );		
	    }

	    public function visistasMuseos()
		{
			$museos=Museo::all();
	        return response()->json(
	            $museos->toArray()
	        );		
	    }

	    public function obrasPorMuseos()
		{
			$museos=Museo::all();
			$museos->each(function($museo){
	            $museo->conteo=$museo->museosImagenes->count();
	        });
	        return response()->json(
	            $museos->toArray()
	        );		
	    }

	    public function artistasPorMuseos()
		{
			$museos=Museo::all();
			$museos->each(function($museo){
	            $museo->conteo=$museo->artistas->count();
	        });
	        return response()->json(
	            $museos->toArray()
	        );		
	    }

	/* ------------------------------------------- */
}
