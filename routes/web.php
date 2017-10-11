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

/* Start Routes for Auth Home Page */
	Route::get('/home', 'HomeController@index')->name('home');
/* End Routes for Auth Home Page */

Route::get('/', function () {
    return view('welcome');
});

/* Start Routes for Auth */
	Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){
		
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
			Route::post('artistas/{id}/asignarStore', [
				'uses' => 'ArtistasController@asignarStore',
				'as' => 'artista.asignarStore'
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

	});
/* End Routes for Auth */