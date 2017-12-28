<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use App\Artista;
use App\Museo;
use App\Disciplina;
use App\ArtistaCatalogo;
use App\Etiqueta;
use App\TipoMuseo;
use App\MuseoImagen;
use App\Pais;
use App\Profesion;
use App\Estado;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{

	public function __construct()
    {
        Carbon::setLocale('es');
        //diffForHumans()
    }
    
    public function inicio()
	{
		$obrasPopulares=MuseoImagen::where('status_id', '=', 3)->orderBy('visitas', 'DESC')->limit(9)->get();
		return view('welcome')->with('obrasPopulares', $obrasPopulares);
	}

	/* Métodos para busquedas con ajax en el inicio */

		public function ultimasnoticias()
		{
			$noticias=Noticia::where('status_id', '=', 8)->orderBy('id', 'DESC')->limit(6)->get();
			$noticias->each(function($noticia){
	            $noticia->creado=$noticia->created_at->diffForHumans();
	            $noticia->autor=$noticia->usuario->name;
	            $tamañoContenido=strlen($noticia->contenido);
                if($tamañoContenido<500){
                    $noticia->articulo=$noticia->contenido;
                }else{
                    $noticia->articulo=substr($noticia->contenido, 0, 500)."...";
                }
                $tamañoTitulo=strlen($noticia->titulo);
                if($tamañoTitulo<40){
                    $noticia->title=$noticia->titulo;
                }else{
                    $noticia->title=substr($noticia->titulo, 0, 40)."...";
                }
	        });
	        return response()->json(
	            $noticias->toArray()
	        );		
	    }

	    public function galeriasRecientes()
		{
			$galeriasRecientes=ArtistaCatalogo::where('status_id', '=', 3)->orderBy('id', 'DESC')->limit(9)->get();
			$galeriasRecientes->each(function($galeriaReciente){
				if($galeriaReciente->artistasCatalogosImagenes->count()>0)
				{
					$galeriaReciente->imagen=$galeriaReciente->artistasCatalogosImagenes->first()->imagen;
				}
				else
				{
					$galeriaReciente->imagen=null;
				}
	            $galeriaReciente->artista=$galeriaReciente->artista;
	            $tamaño=strlen($galeriaReciente->titulo);
                if($tamaño<30){
                    $galeriaReciente->nombre=$galeriaReciente->titulo;
                }else{
                    $galeriaReciente->nombre=substr($galeriaReciente->titulo, 0, 30)."...";
                }
	        });
	        return response()->json(
	            $galeriasRecientes->toArray()
	        );		
	    }

	/* --------------------------------------------- */

	/* Métodos para busquedas con para la barra lateral */

		public function tiposMuseos()
		{
			$tiposMuseos=TipoMuseo::orderBy('tipo_museo', 'ASC')->get();
			$tiposMuseos->each(function($tipoMuseo){
	            $tipoMuseo->contador=$tipoMuseo->museos->count();
	        });
	        return response()->json(
	            $tiposMuseos->toArray()
	        );	
	    }

	    public function topArtistas()
		{
			$topArtistas=Artista::where('status_id', '=', 3)->orderBy('visitas', 'DESC')->limit(5)->get();
			$topArtistas->each(function($topArtista){
	            $topArtista->catalogosCount=$topArtista->artistasCatalogos->count();
	        });
	        return response()->json(
	            $topArtistas->toArray()
	        );	
	    }

	    public function topMuseos()
		{
			$topMuseos=Museo::where('status_id', '=', 3)->orderBy('visitas', 'DESC')->limit(5)->get();
			$topMuseos->each(function($topMuseo){
	            $topMuseo->obrasCount=$topMuseo->museosImagenes->count();
	        });
	        return response()->json(
	            $topMuseos->toArray()
	        );	
	    }

	    public function profesionArtistas()
		{
			$profesionArtistas=Profesion::orderBy('profesion', 'ASC')->get();
			$profesionArtistas->each(function($profesionArtista){
	            $profesionArtista->artistasCount=$profesionArtista->artistas->count();
	        });
	        return response()->json(
	            $profesionArtistas->toArray()
	        );	
	    }

	    public function topCatalogosArtistas()
		{
			$topCatalogosArtistas=ArtistaCatalogo::where('status_id', '=', 3)->orderBy('visitas', 'DESC')->limit(5)->get();
			$topCatalogosArtistas->each(function($topCatalogoArtista){
	            $topCatalogoArtista->artista=Artista::find($topCatalogoArtista->artista_id);
	            $topCatalogoArtista->imagenes=$topCatalogoArtista->artistasCatalogosImagenes->count();
	        });
	        return response()->json(
	            $topCatalogosArtistas->toArray()
	        );	
	    }

	    public function noticiasDestacadas()
		{
			$noticiasDestacadas=Noticia::whereBetween('created_at', [date('Y').'-01-01 00:00:00', date('Y').'-12-31 23:59:59'])->where('status_id', '=', 8)->orderBy('visitas', 'DESC')->limit(5)->get();
			$noticiasDestacadas->each(function($noticiaDestacada){
	            $noticiaDestacada->creado=$noticiaDestacada->created_at->format('d-m-Y');
	            $noticiaDestacada->autor=$noticiaDestacada->usuario->name;
	        });
	        return response()->json(
	            $noticiasDestacadas->toArray()
	        );	
	    }

	/* --------------------------------------------- */

	/* Métodos para la parte de las noticias */

		public function noticiasIndex(Request $request)
		{
			$etiquetas=Etiqueta::orderBy('etiqueta', 'ASC')->get();
			if($request->has('categoria'))
			{
				$etiqueta=Etiqueta::where('etiqueta', '=', $request->categoria)->get();
				$noticias=DB::table('noticias')->join('etiqueta_noticia', 'noticias.id', '=', 'etiqueta_noticia.noticia_id')->join('users', 'users.id', '=', 'noticias.usuario_id')->where('etiqueta_noticia.etiqueta_id', '=', $etiqueta[0]->id)->where('noticias.status_id', '=', 8)->paginate(10)->appends('categoria', request('categoria'));
				$noticias->each(function($noticia){
		            $noticia->creado=Carbon::parse($noticia->created_at)->diffForHumans();
		            $noticia->autor=$noticia->name;
		            $tamaño=strlen($noticia->contenido);
	                if($tamaño<500)
	                {
	                    $noticia->contenido=$noticia->contenido;
	                }
	                else
	                {
	                    $noticia->contenido=substr($noticia->contenido, 0, 500)."...";
	                }
		        });
			}
			else
			{
				$noticias=Noticia::where('status_id', '=', 8)->orderBy('id', 'DESC')->paginate(10);
				$noticias->each(function($noticia){
		            $noticia->creado=Carbon::parse($noticia->created_at)->diffForHumans();
		            $noticia->autor=$noticia->usuario->name;
		            $tamaño=strlen($noticia->contenido);
	                if($tamaño<500)
	                {
	                    $noticia->contenido=$noticia->contenido;
	                }
	                else
	                {
	                    $noticia->contenido=substr($noticia->contenido, 0, 500)."...";
	                }
		        });
			}
			return view('front.noticias.index', compact('noticias'))->with('etiquetas', $etiquetas);
	    }

	    public function noticiaShow($id)
		{
			$noticia=Noticia::find($id);
			if($noticia==null)
		    {
		        return View('errores.404');
		    }
		    else
		    {
		    	$noticia->visitas=$noticia->visitas+1;
		    	$noticia->save();
		    	$noticiasRelacionadas=DB::table('noticias')->join('etiqueta_noticia', 'noticias.id', '=', 'etiqueta_noticia.noticia_id')->where('etiqueta_noticia.etiqueta_id', '=', $noticia->etiquetas->first()->id)->where('noticias.id', '<>', $noticia->id)->orderBy('noticias.id', 'DESC')->limit(3)->get();
		        return view('front.noticias.show')->with('noticia', $noticia)->with('noticiasRelacionadas', $noticiasRelacionadas);
        	}
	    }

	/* --------------------------------------------- */

	/* Métodos para la parte de los museos */

		public function museosIndex(Request $request)
		{
			$estados=Estado::all();
	        $tiposMuseos=TipoMuseo::all();
			$queries=[];
			$museos=DB::table('museos')->where('status_id', '=', 3);
			if(request()->has('estado'))
			{
				$estado=Estado::where('estado', request('estado'))->get();
				$museos=$museos->where('estado_id', '=', $estado[0]->id);
				$queries['estado']=request('estado');
			}
			if(request()->has('tipo_museo'))
			{
				$tipoMuseo=TipoMuseo::where('tipo_museo', request('tipo_museo'))->get();
				$museos=$museos->join('museo_tipo_museo', 'museos.id', '=', 'museo_tipo_museo.museo_id')->where('museo_tipo_museo.tipo_museo_id', '=', $tipoMuseo[0]->id);
				$queries['tipo_museo']=request('tipo_museo');
			}
			if(request()->has('order'))
			{
				$order=[
					'populares' =>['columna'=>'visitas', 'order'=>'DESC'],
					'az' =>['columna'=>'nombre', 'order'=>'ASC'],
					'za' =>['columna'=>'nombre', 'order'=>'DESC'],
					'recientes' =>['columna'=>'id', 'order'=>'DESC']
				];
				$museos=$museos->orderBy($order[request('order')]['columna'], $order[request('order')]['order']);
				$queries['order']=request('order');
			}
			else
			{
				$museos=$museos->orderBy('visitas', 'DESC');
			}
			$museos=$museos->paginate(12)->appends($queries);
	        $museos->each(function($museo){
		        if(request()->has('tipo_museo')){
					$museo->id=$museo->museo_id;
				}
	            $museo->obras=DB::table('museo_imagen')->where('museo_id', '=', $museo->id)->count();
	        });
			return view('front.museos.index', compact('museos'))->with('estados', $estados)->with('tiposMuseos', $tiposMuseos);
	    }

	    public function museoShow($id, $slug)
		{
			$museo=Museo::find($id);
			if($museo==null)
		    {
		        return View('errores.404');
		    }
		    else
		    {
		    	$museo->visitas=$museo->visitas+1;
		    	$museo->save();
		    	$museo->promedioObrasVistas=number_format(MuseoImagen::where('museo_id', '=', $museo->id)->avg('visitas'));
		    	$museo->nombresArtistas=" - ";
		    	foreach($museo->artistas as $artista)
		    	{
		    		$museo->nombresArtistas.=$artista->nombre." - ";
		    	}
		    	$tamaño=strlen($museo->nombresArtistas);
                if($tamaño>100)
                {
                    $museo->nombresArtistas=substr($museo->nombresArtistas, 0, 100)."...";
                }
		        return view('front.museos.show')->with('museo', $museo);
        	}
	    }

	    public function museoObras(Request $request, $id, $slug)
		{
			$museo=Museo::find($id);
			if($request->has('order'))
			{
				if($request->order=='az')
				{
					$imagenes=MuseoImagen::where('museo_id', '=', $id)->where('status_id', '=', 3)->orderBy('titulo', 'ASC')->paginate(15)->appends('order', request('order'));
				}
				else if($request->order=='za')
				{
					$imagenes=MuseoImagen::where('museo_id', '=', $id)->where('status_id', '=', 3)->orderBy('titulo', 'DESC')->paginate(15)->appends('order', request('order'));
				}
				else if($request->order=='recientes')
				{
					$imagenes=MuseoImagen::where('museo_id', '=', $id)->where('status_id', '=', 3)->orderBy('id', 'DESC')->paginate(15)->appends('order', request('order'));
				}
			}
			else
			{
				$imagenes=MuseoImagen::where('museo_id', '=', $id)->where('status_id', '=', 3)->paginate(15);
			}
			$imagenes->each(function($imagen){
				$tamaño=strlen($imagen->titulo);
                if($tamaño<30)
                {
                    $imagen->title=$imagen->titulo;
                }
                else
                {
                    $imagen->title=substr($imagen->titulo, 0, 30)."...";
                }
            });
			return view('front.museos.obras', compact('imagenes'))->with('museo', $museo);
	    }

	    public function museoDetalles(Request $request)
		{
			$detalles=MuseoImagen::find($request->id);
			$detalles->visitas=$detalles->visitas+1;
			$detalles->save();
			if($detalles->artista_id!=null){
				$detalles->artista;
			}else{
				$detalles->artista==null;
			}
			$detalles->museo;
			return response()->json(
	            $detalles->toArray()
	        );		
	    }

	/* --------------------------------------------- */

	/* Métodos para la parte de los artistas */

		public function artitasIndex()
		{
			$paises=Pais::all();
			$paises->each(function($pais){
	            $pais->conteo=DB::table('artistas')->where('pais_nacimiento_id', '=', $pais->id)->count();
	        });
	        $profesiones=Profesion::all();
			$queries=[];
			$artistas=DB::table('artistas')->where('status_id', '=', 3);
			if(request()->has('pais'))
			{
				$pais=Pais::where('pais', request('pais'))->get();
				$artistas=$artistas->where('pais_nacimiento_id', '=', $pais[0]->id);
				$queries['pais']=request('pais');
			}
			if(request()->has('profesion'))
			{
				$profesion=Profesion::where('profesion', request('profesion'))->get();
				$artistas=$artistas->join('artista_profesion', 'artistas.id', '=', 'artista_profesion.artista_id')->where('artista_profesion.profesion_id', '=', $profesion[0]->id);
				$queries['profesion']=request('profesion');
			}
			if(request()->has('order'))
			{
				$order=[
					'populares' =>['columna'=>'visitas', 'order'=>'DESC'],
					'az' =>['columna'=>'nombre', 'order'=>'ASC'],
					'za' =>['columna'=>'nombre', 'order'=>'DESC'],
					'recientes' =>['columna'=>'id', 'order'=>'DESC']
				];
				$artistas=$artistas->orderBy($order[request('order')]['columna'], $order[request('order')]['order']);
				$queries['order']=request('order');
			}
			else
			{
				$artistas=$artistas->orderBy('visitas', 'DESC');
			}
			$artistas=$artistas->paginate(12)->appends($queries);
	        $artistas->each(function($artista){
		        if(request()->has('profesion')){
					$artista->id=$artista->artista_id;
				}
	            $artista->galerias=DB::table('artista_catalogo')->where('artista_id', '=', $artista->id)->count();
	        });
			return view('front.artistas.index', compact('artistas'))->with('paises', $paises)->with('profesiones', $profesiones);
	    }

	    public function artistaShow($id, $slug)
		{
			$artista=Artista::find($id);
			if($artista==null)
		    {
		        return View('errores.404');
		    }
		    else
		    {
		    	$artista->visitas=$artista->visitas+1;
		    	$artista->save();
		    	$artista->pais_nacimiento=Pais::find($artista->pais_nacimiento_id);
		    	$artista->pais_muerte=Pais::find($artista->pais_muerte_id);
		    	$artista->promedioVisitaCatalogo=number_format(ArtistaCatalogo::where('artista_id', '=', $artista->id)->avg('visitas'));
		    	$artista->imagenes=0;
		        foreach($artista->artistasCatalogos as $artistaCatalogo){
		            $artista->imagenes=$artista->imagenes+$artistaCatalogo->artistasCatalogosImagenes->count();
		        }
		        $catalogos=ArtistaCatalogo::where('artista_id', '=', $artista->id)->where('status_id', '=', 3)->orderBy('visitas', 'DESC')->limit(9)->get();
		        return view('front.artistas.show')->with('artista', $artista)->with('catalogos', $catalogos);
        	}
	    }

	    public function artistaGaleria($id, $slug)
		{
			$artista=Artista::find($id);
			if($artista==null)
		    {
		        return View('errores.404');
		    }
		    else
		    {
		    	$galerias=DB::table('artista_catalogo')->where('artista_id', '=', $id)->where('status_id', '=', 3);
		    	$disciplinas=Disciplina::all();
				$queries=[];
				if(request()->has('disciplina'))
				{
					$disciplina=Disciplina::where('disciplina', request('disciplina'))->get();
					$galerias=$galerias->join('artista_catalogo_disciplina', 'artista_catalogo.id', '=', 'artista_catalogo_disciplina.artista_catalogo_id')->where('artista_catalogo_disciplina.disciplina_id', '=', $disciplina[0]->id);
					$queries['disciplina']=request('disciplina');
				}
				if(request()->has('order'))
				{
					$order=[
						'populares' =>['columna'=>'visitas', 'order'=>'DESC'],
						'az' =>['columna'=>'titulo', 'order'=>'ASC'],
						'za' =>['columna'=>'titulo', 'order'=>'DESC'],
						'recientes' =>['columna'=>'id', 'order'=>'DESC']
					];
					$galerias=$galerias->orderBy($order[request('order')]['columna'], $order[request('order')]['order']);
					$queries['order']=request('order');
				}
				else
				{
					$galerias=$galerias->orderBy('visitas', 'DESC');
				}
				$galerias=$galerias->paginate(12)->appends($queries);
				$galerias->each(function($galeria){
					if(request()->has('disciplina')){
						$galeria->id=$galeria->artista_catalogo_id;
					}
		            $galeria->imagen=DB::table('artista_catalogo_imagen')->where('artista_catalogo_id', '=', $galeria->id)->first();
					$tamaño=strlen($galeria->titulo);
	                if($tamaño<30)
	                {
	                    $galeria->title=$galeria->titulo;
	                }
	                else
	                {
	                    $galeria->title=substr($galeria->titulo, 0, 30)."...";
	                }
		        });
		        return view('front.galerias.show', compact('galerias'))->with('artista', $artista)->with('disciplinas', $disciplinas);
        	}
	    }

	    public function verGaleria($id, $slug)
		{
			$galeria=ArtistaCatalogo::find($id);
			if($galeria==null)
		    {
		        return View('errores.404');
		    }
		    else
		    {
		    	$galeria->visitas=$galeria->visitas+1;
		    	$galeria->save();
		        return view('front.galerias.galeria')->with('galeria', $galeria);
        	}
	    }

	/* --------------------------------------------- */

	/* metodos para la parte de las galerias */

		public function galeriasIndex()
		{
			$queries=[];
			$disciplinas=Disciplina::all();
			$galerias=DB::table('artista_catalogo')->where('status_id', '=', 3);
			if(request()->has('disciplina'))
			{
				$disciplina=Disciplina::where('disciplina', request('disciplina'))->get();
				$galerias=$galerias->join('artista_catalogo_disciplina', 'artista_catalogo.id', '=', 'artista_catalogo_disciplina.artista_catalogo_id')->where('artista_catalogo_disciplina.disciplina_id', '=', $disciplina[0]->id);
				$queries['disciplina']=request('disciplina');
			}
			if(request()->has('order'))
			{
				$order=[
					'populares' =>['columna'=>'visitas', 'order'=>'DESC'],
					'az' =>['columna'=>'titulo', 'order'=>'ASC'],
					'za' =>['columna'=>'titulo', 'order'=>'DESC'],
					'recientes' =>['columna'=>'id', 'order'=>'DESC']
				];
				$galerias=$galerias->orderBy($order[request('order')]['columna'], $order[request('order')]['order']);
				$queries['order']=request('order');
			}
			else
			{
				$galerias=$galerias->orderBy('visitas', 'DESC');
			}
			$galerias=$galerias->paginate(12)->appends($queries);
	        $galerias->each(function($galeria){
	        	if(request()->has('disciplina')){
					$galeria->id=$galeria->artista_catalogo_id;
				}
	            $tamaño=strlen($galeria->titulo);
                if($tamaño<30)
                {
                    $galeria->title=$galeria->titulo;
                }
                else
                {
                    $galeria->title=substr($galeria->titulo, 0, 30)."...";
                }
                $galeria->artista=DB::table('artistas')->where('id', '=', $galeria->artista_id)->first();
                $galeria->imagen=DB::table('artista_catalogo_imagen')->where('artista_catalogo_id', '=', $galeria->id)->first();
	        });
			return view('front.galerias.index', compact('galerias'))->with('disciplinas', $disciplinas);
	    }

	/* --------------------------------------------- */

}
