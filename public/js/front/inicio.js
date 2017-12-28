/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar las funciones cuando la pagina este cargada por completo 
	*/
	$(document).ready(function(){
		$("#inicio").attr('class', 'active');
		$('#contenido').removeClass('content scroll-content');
        $("#contenido").addClass('content');
		ultimasNoticias();
		galeriasRecientes();
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que busca las ultimas noticias publicadas.
	*/
	function ultimasNoticias(){
		$.ajax({
			url:carpeta+'front/ultimasnoticias',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			error: function(){
				ultimasNoticias();
			},
			success: function(respuesta){
				$("#articulos").html('');
				if(Object.keys(respuesta).length>0){
					respuesta.forEach(function(articulo, index){
						var noticia='<div class="gallery-item"><article class="fw-artc"><div class="blog-media"><a href="'+carpeta+'front/noticias/'+articulo.id+'/'+articulo.slug+'"><img src="'+carpeta+"images/noticias/"+articulo.imagen+'" class="respimg" style="height: 300px;" alt=""></a></div>';
						noticia+='<ul class="cat-list"><li><i class="fa fa-user-circle-o" aria-hidden="true"></i> '+articulo.autor+'</li></ul>';
						noticia+='<h2 data-toggle="tooltip" title="'+articulo.titulo+'"><a href="'+carpeta+'front/noticias/'+articulo.id+'/'+articulo.slug+'" class="ajax">'+articulo.title+'</a></h2>';
						noticia+=articulo.articulo;
						noticia+='<div class="art-opt fl-wrap"><a href="'+carpeta+'front/noticias/'+articulo.id+'/'+articulo.slug+'" class=" btn btn-vinotinto anim-button   flat-btn   transition  fl-l ajax" ><span>Leer</span><i class="fa fa-eye"></i></a><ul class="post-counter"><li><i class="fa fa-eye"></i><span>'+articulo.visitas+'</span></li><li><i class="fa fa-clock-o"></i><span>'+articulo.creado+'</span></li></ul></div></article></div>';
						$("#articulos").append(noticia);
					});
				}else{
					$("#articulos").html('<div class="col-md-12"><h2>Sin noticias publicadas.</h2></div>');
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para mostrar los detalles de la obra.
	*/
	function detalles(id){
		$('#detalles').delay(100).queue(function(next) { $(this).modal('show'); next(); }, 100);
		$.ajax({
			url:carpeta+'front/museos/'+id+'/detalles',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type:'POST',
			dataType:'JSON',
			data:{
				id:id,
			},
			beforeSend: function(){
				html='<div class="alert alert-info" role="alert">';
	        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	        	html+='<span>Cargando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
		        html+='</div>';
				$('#mostrar').html(html);
			},
			error: function (repuesta) {
				html='<div class="alert alert-danger" role="alert">';
	        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	        	html+='<span>Ha ocurrido un error, inténtelo de nuevo <span style="font-weight: bold; cursor: pointer;" onclick="detalles('+id+');"> aquí</span> <i class="fa fa-times-circle-o" aria-hidden="true"></i></span>'
		        html+='</div>';
				$('#mostrar').html(html);
		    },
			success: function(respuesta){
				var detalles='<div class="col-md-12" style="text-align: left; font-size: 16px; margin-top: 15px;"><b>Titulo:</b> '+respuesta.titulo+'</div>';
				if(respuesta.artista!=null){
					detalles+='<div class="col-md-12" style="text-align: left; font-size: 16px; margin-top: 15px; text-transform: capitalize;"><b>Artista:</b> <a href="'+carpeta+'front/artistas/'+respuesta.artista.id+'/'+respuesta.artista.slug+'">'+respuesta.artista.nombre+'</a></div>';
				}
				detalles+='<div class="col-md-12" style="text-align: left; font-size: 16px; margin-top: 15px; text-transform: capitalize;"><b>Exhibido en:</b> <a href="'+carpeta+'front/museos/'+respuesta.museo.id+'/'+respuesta.museo.slug+'">'+respuesta.museo.nombre+'</a></div>';
				detalles+='<div class="col-md-12" style="text-align: left; font-size: 16px; margin-top: 15px;"><b>Vistas:</b> '+respuesta.visitas+'</div>';
				if(respuesta.reseña!=null){
					detalles+='<div class="col-md-12" style="text-align: left; font-size: 16px; margin-top: 15px;"><b>Reseña:</b> '+respuesta.reseña+'</div>';
				}
				$('#mostrar').html(detalles);
			}
		});
	};
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que busca las ultimas noticias publicadas.
	*/
	function galeriasRecientes(){
		$.ajax({
			url:carpeta+'front/galeriasRecientes',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			error: function(){
				galeriasRecientes();
			},
			success: function(respuesta){
				$("#galeriasRecientes").html('');
				if(Object.keys(respuesta).length>0){
					respuesta.forEach(function(galeria, index){
						var galeriaReciente='<div class="gallery-item"><div class="grid-item-holder"><div class="box-item fl-wrap   popup-box">';
						if(galeria.imagen!=null){
							galeriaReciente+='<img  src="'+carpeta+'/images/artistas/'+galeria.imagen+'" style="max-width: 500px; max-height: 200px; height: 180px;" alt="">';
						}else{
							galeriaReciente+='<img  src="'+carpeta+'/images/artistas/noimage.png" style="max-width: 500px; max-height: 200px; height: 180px;" alt="">';
						}
						galeriaReciente+='<a href="'+carpeta+'front/galeria/'+galeria.id+'/'+galeria.slug+'"class="ajax"><i class="fa fa-link"></i></a></div>';
						galeriaReciente+='<div class="det-box fl-wrap">';
						galeriaReciente+='<h3><a href="'+carpeta+'front/galeria/'+galeria.id+'/'+galeria.slug+'" data-toggle="tooltip" title="'+galeria.titulo+'">'+galeria.nombre+'</a></h3>';
						galeriaReciente+='<h4 style="text-transform: capitalize;"><a href="'+carpeta+'front/artistas/'+galeria.artista.id+'/'+galeria.artista.slug+'" style="color: black;">'+galeria.artista.nombre+'</a></h4></div></div></div>';
						$("#galeriasRecientes").append(galeriaReciente);
					});
				}else{
					$("#galeriasRecientes").html('<div class="col-md-12"><h2>Sin galerías disponibles.</h2></div>');
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */