<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::group(['middleware' => ['auth', 'revalidate']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/', 'FrontController@inicio');

/* Start Routes for Auth */
	Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'revalidate']], function(){
		
		/* Start Routes Usuarios */
			Route::resource('users', 'UsersController');
			Route::post('users/listing', [
				'uses' => 'UsersController@listing',
				'as' => 'users.listing'
			]);
			Route::post('users/{id}/lock', [
				'uses' => 'UsersController@lock',
				'as' => 'user.lock'
			]);
			Route::post('users/{id}/unlock', [
				'uses' => 'UsersController@unlock',
				'as' => 'user.unlock'
			]);
		/* End Routes Usuarios */

		/* Start Routes Configuracion */
			/* Start Routes Profesiones */
				Route::resource('profesiones', 'ProfesionesController');
				Route::post('profesiones/listing', [
					'uses' => 'ProfesionesController@listing',
					'as' => 'profesiones.listing'
				]);
			/* End Routes Profesiones */

			/* Start Routes Paises */
				Route::resource('paises', 'PaisesController');
				Route::post('paises/listing', [
					'uses' => 'PaisesController@listing',
					'as' => 'paises.listing'
				]);
			/* End Routes Paises */

			/* Start Routes Redes Sociales */
				Route::resource('redessociales', 'RedesSocialesController');
				Route::post('redessociales/listing', [
					'uses' => 'RedesSocialesController@listing',
					'as' => 'redessociales.listing'
				]);
			/* End Routes Redes Sociales */

			/* Start Routes Disciplinas */
				Route::resource('disciplinas', 'DisciplinasController');
				Route::post('disciplinas/listing', [
					'uses' => 'DisciplinasController@listing',
					'as' => 'disciplinas.listing'
				]);
			/* End Routes Disciplinas */

			/* Start Routes Etiquetas */
				Route::resource('etiquetas', 'EtiquetasController');
				Route::post('etiquetas/listing', [
					'uses' => 'EtiquetasController@listing',
					'as' => 'etiquetas.listing'
				]);
			/* End Routes Etiquetas */

			/* Start Routes Etiquetas */
				Route::resource('tiposmuseos', 'TiposMuseosController');
				Route::post('tiposmuseos/listing', [
					'uses' => 'TiposMuseosController@listing',
					'as' => 'tiposmuseos.listing'
				]);
			/* End Routes Etiquetas */

		/* End Routes Configuracion */

		/* Start Routes Artistas */
			Route::resource('artistas', 'ArtistasController');
			Route::post('artistas/listing', [
				'uses' => 'ArtistasController@listing',
				'as' => 'artistas.listing'
			]);
			Route::post('artistas/{id}/lock', [
				'uses' => 'ArtistasController@lock',
				'as' => 'artista.lock'
			]);
			Route::post('artistas/{id}/unlock', [
				'uses' => 'ArtistasController@unlock',
				'as' => 'artista.unlock'
			]);
			Route::post('artistas/{id}/portada', [
				'uses' => 'ArtistasController@portada',
				'as' => 'artista.portada'
			]);
			Route::post('artistas/{id}/biografia', [
				'uses' => 'ArtistasController@biografia',
				'as' => 'artista.biografia'
			]);
			Route::post('artistas/{id}/habilidad', [
				'uses' => 'ArtistasController@habilidad',
				'as' => 'artista.habilidad'
			]);
			Route::post('artistas/{id}/asignar', [
				'uses' => 'ArtistasController@asignar',
				'as' => 'artista.asignar'
			]);
			Route::post('artistas/{id}/search', [
				'uses' => 'ArtistasController@search',
				'as' => 'artista.search'
			]);
		/* End Routes Artistas */

		/* Start Routes Artistas Catalogos */
			Route::resource('artistascatalogos', 'ArtistasCatalogosController');
			Route::get('artistascatalogos/{id}/destroy', [
				'uses' => 'ArtistasCatalogosController@destroy',
				'as' => 'artistascatalogos.destroy'
			]);
			Route::get('artistascatalogos/{id}/lock', [
				'uses' => 'ArtistasCatalogosController@lock',
				'as' => 'artistascatalogos.lock'
			]);
			Route::get('artistascatalogos/{id}/unlock', [
				'uses' => 'ArtistasCatalogosController@unlock',
				'as' => 'artistascatalogos.unlock'
			]);
			Route::post('artistascatalogos/{id}/search', [
				'uses' => 'ArtistasCatalogosController@search',
				'as' => 'artistascatalogos.search'
			]);
		/* End Routes Artistas Catalogos */

		/* Start Routes Artistas Catalogos Imagenes */
			Route::resource('artistasimagenes', 'ArtistasCatalogosImagenesController');
			Route::get('artistasimagenes/{id}/destroy', [
				'uses' => 'ArtistasCatalogosImagenesController@destroy',
				'as' => 'artistasimagenes.destroy'
			]);
			Route::get('artistasimagenes/{id}/lock', [
				'uses' => 'ArtistasCatalogosImagenesController@lock',
				'as' => 'artistasimagenes.lock'
			]);
			Route::get('artistasimagenes/{id}/unlock', [
				'uses' => 'ArtistasCatalogosImagenesController@unlock',
				'as' => 'artistasimagenes.unlock'
			]);
		/* End Routes Artistas Catalogos Imagenes */

		/* Start Routes Artistas Redes Sociales */
			Route::resource('artistasredessociales', 'ArtistasRedesSocialesController');
			Route::get('artistasredessociales/{id}/destroy', [
				'uses' => 'ArtistasRedesSocialesController@destroy',
				'as' => 'artistasredessociales.destroy'
			]);
			Route::post('artistasredessociales/{id}/listing', [
				'uses' => 'ArtistasRedesSocialesController@listing',
				'as' => 'artistasredessociales.listing'
			]);
		/* End Routes Artistas Redes Sociales */

		/* Start Routes Artistas Habilidades */
			Route::resource('artistashabilidades', 'ArtistasHabilidadesController');
			Route::get('artistashabilidades/{id}/destroy', [
				'uses' => 'ArtistasHabilidadesController@destroy',
				'as' => 'artistashabilidades.destroy'
			]);
			Route::post('artistashabilidades/{id}/listing', [
				'uses' => 'ArtistasHabilidadesController@listing',
				'as' => 'artistashabilidades.listing'
			]);
		/* End Routes Artistas Habilidades */

		/* Start Routes Cargos */
			Route::resource('cargos', 'CargosController');
			Route::post('cargos/listing', [
				'uses' => 'CargosController@listing',
				'as' => 'cargos.listing'
			]);
		/* End Routes Cargos */

		/* Start Routes Estados */
			Route::resource('estados', 'EstadosController');
			Route::post('estados/listing', [
				'uses' => 'EstadosController@listing',
				'as' => 'estados.listing'
			]);
		/* End Routes Estados */

		/* Start Routes Estados Civiles */
			Route::resource('estadosciviles', 'EstadosCivilesController');
			Route::post('estadosciviles/listing', [
				'uses' => 'EstadosCivilesController@listing',
				'as' => 'estadosciviles.listing'
			]);
		/* End Routes Estados Civiles */

		/* Start Routes Grados de Instrucciones */
			Route::resource('gradosinstrucciones', 'GradosInstruccionesController');
			Route::post('gradosinstrucciones/listing', [
				'uses' => 'GradosInstruccionesController@listing',
				'as' => 'gradosinstrucciones.listing'
			]);
		/* End Routes Grados de Instrucciones */

		/* Start Routes Tipos de Premios */
			Route::resource('tipospremios', 'TiposPremiosController');
			Route::post('tipospremios/listing', [
				'uses' => 'TiposPremiosController@listing',
				'as' => 'tipospremios.listing'
			]);
		/* End Routes Tipos de Premios */

		/* Start Routes Solicitudes */
			Route::resource('solicitudes', 'SolicitudesController');
			Route::post('solicitudes/listing', [
				'uses' => 'SolicitudesController@listing',
				'as' => 'solicitudes.listing'
			]);
			Route::post('solicitudes/verificarSolicitudDelUsuario', [
				'uses' => 'SolicitudesController@verificarSolicitudDelUsuario',
				'as' => 'solicitudes.verificarSolicitudDelUsuario'
			]);
			Route::post('solicitudes/{id}/imagenStore', [
				'uses' => 'SolicitudesController@imagenStore',
				'as' => 'solicitudes.imagenStore'
			]);
			Route::post('solicitudes/{id}/imagenEliminar', [
				'uses' => 'SolicitudesController@imagenEliminar',
				'as' => 'solicitudes.imagenEliminar'
			]);
			Route::post('solicitudes/{id}/enviarSolicitud', [
				'uses' => 'SolicitudesController@enviarSolicitud',
				'as' => 'solicitudes.enviarSolicitud'
			]);
			Route::post('solicitudes/rechazar', [
				'uses' => 'SolicitudesController@rechazar',
				'as' => 'solicitudes.rechazar'
			]);
			Route::post('solicitudes/aceptar', [
				'uses' => 'SolicitudesController@aceptar',
				'as' => 'solicitudes.aceptar'
			]);
		/* End Routes Solicitudes */

		/* Start Routes Museos */
			Route::resource('museos', 'MuseosController');
			Route::post('museos/listing', [
				'uses' => 'MuseosController@listing',
				'as' => 'museos.listing'
			]);
			Route::post('museos/{id}/lock', [
				'uses' => 'MuseosController@lock',
				'as' => 'museos.lock'
			]);
			Route::post('museos/{id}/unlock', [
				'uses' => 'MuseosController@unlock',
				'as' => 'museos.unlock'
			]);
			Route::post('museos/{id}/asignar', [
				'uses' => 'MuseosController@asignar',
				'as' => 'museos.asignar'
			]);
			Route::post('museos/{id}/search', [
				'uses' => 'MuseosController@search',
				'as' => 'museos.search'
			]);
			Route::post('museos/{id}/portada', [
				'uses' => 'MuseosController@portada',
				'as' => 'museos.portada'
			]);
			Route::post('museos/{id}/historia', [
				'uses' => 'MuseosController@historia',
				'as' => 'museos.historia'
			]);
			Route::post('museos/{id}/servicio', [
				'uses' => 'MuseosController@servicio',
				'as' => 'museos.servicio'
			]);
			Route::post('museos/{id}/contacto', [
				'uses' => 'MuseosController@contacto',
				'as' => 'museos.contacto'
			]);
			Route::post('museos/{id}/mapa', [
				'uses' => 'MuseosController@mapa',
				'as' => 'museos.mapa'
			]);
		/* End Routes Museos */

		/* Start Routes Museos Directivos */
			Route::resource('museosdirectivos', 'MuseosDirectivosController');
			Route::post('museosdirectivos/{id}/listing', [
				'uses' => 'MuseosDirectivosController@listing',
				'as' => 'museosdirectivos.listing'
			]);
		/* End Routes Museos Directivos */

		/* Start Routes Museos Servicios */
			Route::resource('museosservicios', 'MuseosServiciosController');
			Route::post('museosservicios/{id}/listing', [
				'uses' => 'MuseosServiciosController@listing',
				'as' => 'museosservicios.listing'
			]);
		/* End Routes Museos Servicios */

		/* Start Routes Museos Imagenes */
			Route::resource('museosimagenes', 'MuseosImagenesController');
			Route::post('museosimagenes/listing', [
				'uses' => 'MuseosImagenesController@listarImagenes',
				'as' => 'museosimagenes.listing'
			]);
		/* End Routes Museos Imagenes */

		/* Start Routes Noticias */
			Route::resource('noticias', 'NoticiasController');
			Route::post('noticias/listing', [
				'uses' => 'NoticiasController@listing',
				'as' => 'noticias.listing'
			]);
			Route::post('noticias/{id}/edicion', [
				'uses' => 'NoticiasController@edicion',
				'as' => 'noticias.edicion'
			]);
			Route::post('noticias/{id}/publicar', [
				'uses' => 'NoticiasController@publicar',
				'as' => 'noticias.publicar'
			]);
			Route::post('noticias/{id}/search', [
				'uses' => 'NoticiasController@search',
				'as' => 'noticias.search'
			]);
			Route::post('noticias/{id}/imagen', [
				'uses' => 'NoticiasController@imagen',
				'as' => 'noticias.imagen'
			]);
		/* End Routes Noticias */

		/* Start Routes Cuentas */
			Route::get('cuentas', [
				'uses' => 'CuentasController@cuenta',
				'as' => 'cuentas'
			]);
			Route::post('cuentas/buscar/{id}', [
				'uses' => 'CuentasController@buscar',
				'as' => 'cuentas.buscar'
			]);
			Route::post('cuentas/password/{id}', [
				'uses' => 'CuentasController@password',
				'as' => 'cuentas.password'
			]);
			Route::post('cuentas/imagen/{id}', [
				'uses' => 'CuentasController@imagen',
				'as' => 'cuentas.imagen'
			]);
		/* End Routes Cuentas */

		/* Start Routes Reportes */
			Route::get('reportes/artistas', [
				'uses' => 'ReportesController@artistas',
				'as' => 'reportes.artistas'
			]);
			Route::post('reportes/artistasPorProfesiones', [
				'uses' => 'ReportesController@artistasPorProfesiones',
				'as' => 'reportes.artistasPorProfesiones'
			]);
			Route::post('reportes/artistasPorDisciplinas', [
				'uses' => 'ReportesController@artistasPorDisciplinas',
				'as' => 'reportes.artistasPorDisciplinas'
			]);
			Route::post('reportes/artistasPorPaises', [
				'uses' => 'ReportesController@artistasPorPaises',
				'as' => 'reportes.artistasPorPaises'
			]);
			Route::post('reportes/catalogosPorArtistas', [
				'uses' => 'ReportesController@catalogosPorArtistas',
				'as' => 'reportes.catalogosPorArtistas'
			]);
			Route::post('reportes/visitasPorArtistas', [
				'uses' => 'ReportesController@visitasPorArtistas',
				'as' => 'reportes.visitasPorArtistas'
			]);
			Route::post('reportes/visitasPorCatalogosArtistas', [
				'uses' => 'ReportesController@visitasPorCatalogosArtistas',
				'as' => 'reportes.visitasPorCatalogosArtistas'
			]);
			Route::get('reportes/museos', [
				'uses' => 'ReportesController@museos',
				'as' => 'reportes.museos'
			]);
			Route::post('reportes/museosPorEstados', [
				'uses' => 'ReportesController@museosPorEstados',
				'as' => 'reportes.museosPorEstados'
			]);
			Route::post('reportes/tiposMuseos', [
				'uses' => 'ReportesController@tiposMuseos',
				'as' => 'reportes.tiposMuseos'
			]);
			Route::post('reportes/visistasMuseos', [
				'uses' => 'ReportesController@visistasMuseos',
				'as' => 'reportes.visistasMuseos'
			]);
			Route::post('reportes/obrasPorMuseos', [
				'uses' => 'ReportesController@obrasPorMuseos',
				'as' => 'reportes.obrasPorMuseos'
			]);
			Route::post('reportes/artistasPorMuseos', [
				'uses' => 'ReportesController@artistasPorMuseos',
				'as' => 'reportes.artistasPorMuseos'
			]);
		/* End Routes Reportes */

	});
/* End Routes for Auth */

/* Start Routes for Front */
	Route::group(['prefix' => 'front'], function(){

		/* Start Routes for Inicio */
			Route::post('ultimasnoticias', [
				'uses' => 'FrontController@ultimasnoticias',
				'as' => 'ultimasnoticias'
			]);
			Route::post('galeriasRecientes', [
				'uses' => 'FrontController@galeriasRecientes',
				'as' => 'galeriasRecientes'
			]);
		/* End Routes for Inicio */

		/* Start Routes for Barra Lateral */
			Route::post('tiposMuseos', [
				'uses' => 'FrontController@tiposMuseos',
				'as' => 'tiposMuseos'
			]);
			Route::post('topArtistas', [
				'uses' => 'FrontController@topArtistas',
				'as' => 'topArtistas'
			]);
			Route::post('topMuseos', [
				'uses' => 'FrontController@topMuseos',
				'as' => 'topMuseos'
			]);
			Route::post('profesionArtistas', [
				'uses' => 'FrontController@profesionArtistas',
				'as' => 'profesionArtistas'
			]);
			Route::post('topCatalogosArtistas', [
				'uses' => 'FrontController@topCatalogosArtistas',
				'as' => 'topCatalogosArtistas'
			]);
			Route::post('noticiasDestacadas', [
				'uses' => 'FrontController@noticiasDestacadas',
				'as' => 'noticiasDestacadas'
			]);
		/* End Routes for Barra Lateral */

		/* Start Routes for Noticias */
			Route::get('noticias', [
				'uses' => 'FrontController@noticiasIndex',
				'as' => 'noticias'
			]);
			Route::get('noticias/{id}/{slug}', [
				'uses' => 'FrontController@noticiaShow',
				'as' => 'noticias.show'
			]);
		/* End Routes for Noticias */

		/* Start Routes for Museos */
			Route::get('museos', [
				'uses' => 'FrontController@museosIndex',
				'as' => 'museos'
			]);
			Route::get('museos/{id}/{slug}', [
				'uses' => 'FrontController@museoShow',
				'as' => 'museos.ver'
			]);
			Route::get('museos/{id}/{slug}/obras', [
				'uses' => 'FrontController@museoObras',
				'as' => 'museos.obras'
			]);
			Route::post('museos/{id}/detalles', [
				'uses' => 'FrontController@museoDetalles',
				'as' => 'museos.detalles'
			]);
		/* End Routes for Museos */

		/* Start Routes for Artistas */
			Route::get('artistas', [
				'uses' => 'FrontController@artitasIndex',
				'as' => 'artistas'
			]);
			Route::get('artistas/{id}/{slug}', [
				'uses' => 'FrontController@artistaShow',
				'as' => 'artistas.ver'
			]);
		/* End Routes for Artistas */

		/* Start Routes for Artistas */
			Route::get('galerias', [
				'uses' => 'FrontController@galeriasIndex',
				'as' => 'galerias'
			]);
			Route::get('galerias/{id}/{slug}', [
				'uses' => 'FrontController@artistaGaleria',
				'as' => 'galerias.show'
			]);
			Route::get('galeria/{id}/{slug}', [
				'uses' => 'FrontController@verGaleria',
				'as' => 'galeria.ver'
			]);
		/* End Routes for Artistas */

	});
/* End Routes for Front */