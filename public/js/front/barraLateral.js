/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar las funciones cuando la pagina este cargada por completo 
	*/
	$(document).ready(function(){
		tiposMuseos();
		topArtistas();
		topMuseos();
		profesionArtistas();
		topCatalogosArtistas();
		noticiasDestacadas();
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que lista los tipos de museos con un contador de cada uno y lo
		muestra en la barra lateral o sidebar
	*/
	function tiposMuseos(){
		$.ajax({
			url:carpeta+'front/tiposMuseos',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			error: function(){
				tiposMuseos();
			},
			success: function(respuesta){
				$("#tiposMuseos").html('');
				if(Object.keys(respuesta).length>0){
					respuesta.forEach(function(tipoMuseo, index){
						var tagTipoMuseo='<li class="col-md-4" style="text-transform: capitalize;"><a href="'+carpeta+'front/museos?tipo_museo='+tipoMuseo.tipo_museo+'">'+tipoMuseo.tipo_museo+'</a> ('+tipoMuseo.contador+')</li>';
						$("#tiposMuseos").append(tagTipoMuseo);
					});
				}else{
					$("#tiposMuseos").html('');
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que lista el top 5 de artistas por el numero de visitas y lo
		muestra en la barra lateral o sidebar
	*/
	function topArtistas(){
		$.ajax({
			url:carpeta+'front/topArtistas',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			error: function(){
				topArtistas();
			},
			success: function(respuesta){
				$("#topArtistas").html('');
				if(Object.keys(respuesta).length>0){
					respuesta.forEach(function(artista, index){
						var listTopAristas='<li><div class="recent-post-img"><a href="'+carpeta+'front/artistas/'+artista.id+'/'+artista.slug+'"><img src="'+carpeta+'images/artistas/'+artista.foto+'" alt=""></a></div>';
						listTopAristas+='<div class="recent-post-content"><h4><a href="'+carpeta+'front/artistas/'+artista.id+'/'+artista.slug+'">'+artista.nombre+'</a></h4>';
						listTopAristas+='<div class="recent-post-opt"><span class="post-date">Catalogos: '+artista.catalogosCount+'</span>';
						listTopAristas+='<span class="post-date">Visitas: '+artista.visitas+'</span></div></div></li>';
						$("#topArtistas").append(listTopAristas);
					});
				}else{
					$("#topArtistas").html('');
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que lista el top 5 de museos por el numero de visitas y lo
		muestra en la barra lateral o sidebar
	*/
	function topMuseos(){
		$.ajax({
			url:carpeta+'front/topMuseos',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			error: function(){
				topMuseos();
			},
			success: function(respuesta){
				$("#topMuseos").html('');
				if(Object.keys(respuesta).length>0){
					respuesta.forEach(function(museo, index){
						var listTopMuseos='<li><div class="recent-post-img"><a href="'+carpeta+'front/museos/'+museo.id+'/'+museo.slug+'"><img src="'+carpeta+'images/museos/'+museo.foto+'" alt=""></a></div>';
						listTopMuseos+='<div class="recent-post-content"><h4><a href="'+carpeta+'front/museos/'+museo.id+'/'+museo.slug+'">'+museo.nombre+'</a></h4>';
						listTopMuseos+='<div class="recent-post-opt"><span class="post-date">Obras: '+museo.obrasCount+'</span>';
						listTopMuseos+='<span class="post-date">Visitas: '+museo.visitas+'</span></div></div></li>';
						$("#topMuseos").append(listTopMuseos);
					});
				}else{
					$("#topMuseos").html('');
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que lista las disciplinas de los artistas y lo
		muestra en la barra lateral o sidebar
	*/
	function profesionArtistas(){
		$.ajax({
			url:carpeta+'front/profesionArtistas',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			error: function(){
				profesionArtistas();
			},
			success: function(respuesta){
				$("#profesionArtistas").html('');
				if(Object.keys(respuesta).length>0){
					respuesta.forEach(function(profesion, index){
						var profesionArtista='<a href="'+carpeta+'front/artistas?profesion='+profesion.profesion+'" style="color: white !important;">'+profesion.profesion+' ('+profesion.artistasCount+')</a>';
						$("#profesionArtistas").append(profesionArtista);
					});
				}else{
					$("#profesionArtistas").html('');
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que lista los catalogos de los artistas mas vistos y lo
		muestra en la barra lateral o sidebar
	*/
	function topCatalogosArtistas(){
		$.ajax({
			url:carpeta+'front/topCatalogosArtistas',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			error: function(){
				topCatalogosArtistas();
			},
			success: function(respuesta){
				$("#topCatalogosArtistas").html('');
				if(Object.keys(respuesta).length>0){
					respuesta.forEach(function(catalogo, index){
						var listTopCatalogosArtistas='<li><div class="recent-post-img"><a href="'+carpeta+'front/galeria/'+catalogo.id+'/'+catalogo.slug+'"><img src="'+carpeta+'images/artistas/'+catalogo.artista.foto+'" alt=""></a></div>';
						listTopCatalogosArtistas+='<div class="recent-post-content"><h4><a href="'+carpeta+'front/galeria/'+catalogo.id+'/'+catalogo.slug+'">'+catalogo.titulo+'</a></h4>';
						listTopCatalogosArtistas+='<div class="recent-post-opt"><span class="post-date" style="text-transform: capitalize;">Artista: <a href="'+carpeta+'front/artistas/'+catalogo.artista.id+'/'+catalogo.artista.slug+'">'+catalogo.artista.nombre+'</a></span>';
						listTopCatalogosArtistas+='<span class="post-date">Visitas: '+catalogo.visitas+'</span>';
						listTopCatalogosArtistas+='<span class="post-date">Imagenes: '+catalogo.imagenes+'</span></div></div></li>';
						$("#topCatalogosArtistas").append(listTopCatalogosArtistas);
					});
				}else{
					$("#topCatalogosArtistas").html('');
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que lista los catalogos de los artistas mas vistos y lo
		muestra en la barra lateral o sidebar
	*/
	function noticiasDestacadas(){
		$.ajax({
			url:carpeta+'front/noticiasDestacadas',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			error: function(){
				noticiasDestacadas();
			},
			success: function(respuesta){
				$("#noticiasDestacadas").html('');
				if(Object.keys(respuesta).length>0){
					respuesta.forEach(function(noticiaDestacada, index){
						var noticiasDestacadas='<li><div style="position:absolute; top:15px; left:0; width:65px; overflow:hidden;"><a href=""><img style="width:65px; height:auto;" src="'+carpeta+'images/noticias/'+noticiaDestacada.imagen+'" alt=""></a></div>';
						noticiasDestacadas+='<div class="recent-post-content"><h4><a href="">'+noticiaDestacada.titulo+'</a></h4>';
						noticiasDestacadas+='<div class="recent-post-opt"><span class="post-date" style="text-transform: capitalize;">Autor: '+noticiaDestacada.autor+'</span>';
						noticiasDestacadas+='<span class="post-date">Visitas: '+noticiaDestacada.visitas+'</span>';
						noticiasDestacadas+='<span class="post-date">Publicado: '+noticiaDestacada.creado+'</span></div></div></li>';
						$("#noticiasDestacadas").append(noticiasDestacadas);
					});
				}else{
					$("#noticiasDestacadas").html('');
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */