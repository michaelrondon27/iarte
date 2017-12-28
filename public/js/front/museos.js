$(document).ready(function(){
	$("#museos").attr('class', 'active');
    $('#contenido').removeClass('content scroll-content');
    $("#contenido").addClass('content full-height scroll-content');
});

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
				detalles+='<div class="col-md-12" style="text-align: left; font-size: 16px; margin-top: 15px;"><b>Vistas:</b> '+respuesta.visitas+'</div>';
				if(respuesta.reseña!=null){
					detalles+='<div class="col-md-12" style="text-align: left; font-size: 16px; margin-top: 15px;"><b>Reseña:</b> '+respuesta.reseña+'</div>';
				}
				$('#mostrar').html(detalles);
			}
		});
	};
/* ------------------------------------------------------------------------------- */