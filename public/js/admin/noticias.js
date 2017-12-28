/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar las funciones cuando la pagina este cargada por completo 
	*/
	$(document).ready(function(){
		$("#noticia").attr('class', 'active');
		var control=document.getElementById('control').value;
		if(control=='index'){
			listar();
			registrar_noticia();
		}else if(control=='edit'){
			var id=document.getElementById('id').value;
			if(id>0){
				buscar(id);
				imagen();
				actualizar_noticia();
			}
		}
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta el formulario de registro dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_registrar").click(function(){
		listar("#cuadro1");
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar los datos de la base de datos en la tabla, tambien
		esconde los formularios dependiendo del caso y muestra la tabla.
	*/
	function listar(cuadro){
		$('#tabla tbody').off('click');
		if(cuadro!=""){
			$(cuadro).slideUp("slow");
		}
		$("#cuadro2").slideDown("slow");
		var table=$("#tabla").DataTable({
			"destroy":true,
			"stateSave": true,
			"serverSide":true,
			"ajax":{
				"method":"POST",
				"url":carpeta+"admin/noticias/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"titulo"},
				{"data":"autor"},
				{"data":"etiquetas",
					render : function(data, type, row) {
	              		return '<span class="badge">'+data+'</span>';
	          		}
				},
				{"data":"visitas",
					render : function(data, type, row) {
	              		return '<span class="badge">'+data+'</span>';
	          		}
				},
				{"data":"status",
					render : function(data, type, row) {
	              		return '<span class="badge">'+data+'</span>';
	          		}
				},
				{"data":"created_at"},
				{"data":"updated_at"},
				{"data": null,
					render : function(data, type, row) {
						var botones="<a href='"+carpeta+"admin/noticias/"+data.id+"/edit' class='botones btn-primary' data-toggle='tooltip' title='Editar'><i class='fa fa-pencil-square-o'></i></a>";
		              	if(data.status=="Publicado"){
		              		botones+=" <span class='edicion botones btn-warning' data-toggle='tooltip' title='En Edicón'><i class='fa fa-thumbs-down'></i></span>";
		              	}else if(data.status=="En edición"){
							botones+=" <span class='publicar botones btn-warning' data-toggle='tooltip' title='Publicar'><i class='fa fa-thumbs-up'></i></span>";
		              	}
		              	botones+=" <span class='eliminar botones btn-danger' data-toggle='tooltip' title='Eliminar'><i class='fa fa-trash'></i></span>";
		              	return botones;
		          	}
				}
			],
			"language": idioma_espanol,
			"dom": "<'row'<'form-inline' <B>>>"
						 +"<'row' <'form-inline' <'col-sm-1 col-sm-offset-2'f>>>"
						 +"<rt>"
						 +"<'row'<'form-inline'"
						 +" <'col-sm-6 col-md-6 col-lg-6'l>"
						 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
			"buttons":[
				{
					"text": "<i class='fa fa-plus'></i>",
					"titleAttr": "Crear Noticia",
					"className": "btn btn-success",
					"action": function(){
						agregar();
					}
				},
				{
					"text": "<i class='fa fa-refresh fa-spin fa-fw'></i>",
					"titleAttr": "Refrescar Datos",
					"className": "btn btn-primary",
					"action": function(){
						listar();
					}
				}/*,
				{
	                extend:    'excelHtml5',
	                text:      '<i class="fa fa-file-excel-o"></i>',
	                titleAttr: 'Excel'
			    },
			    {
		         	extend: 'csvHtml5',
		         	text: '<i class="fa fa-file-text-o"></i>',
		         	titleAttr: 'CSV'
			    },
			    {
	                extend:    'pdfHtml5',
	                text:      '<i class="fa fa-file-pdf-o"></i>',
	                titleAttr: 'PDF'
			    }*/
			]
		});
		edicion("#tabla tbody", table);
		publicar("#tabla tbody", table);
		eliminar("#tabla tbody", table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta y muestra los cuadros dependiendo de los parametros que
		recibe, se utiliza en los formularios de: registrar artista, registrar 
		catalogos; en los listados de: aritstas, catalogos, redes sociales,
		habilidades; tambien cambia botones.
	*/
	function agregar(){
		limpiar_datos_agregar();
		chosen_single('.select');
		chosen_multiple('.multiple');
		$("#cuadro1").slideDown("slow");
		$("#cuadro2").slideUp("slow");
	}
/* ------------------------------------------------------------------------------- */
/* ------------------------------------------------------------------------------- */
	/*
		Funcion que limpia los campos del formulario de registro de artistas.
	*/
	function limpiar_datos_agregar(){
		trumbowyg_destroy('.contenido');
		chosen_single_destroy('.select');
		chosen_multiple_destroy('.multiple');
		trumbowyg();
		$("#titulo").val("").focus();
		$("#imagen").val("");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para tranformar los select simples en los formularios.
	*/
	function chosen_single(chosen){
		$(chosen).chosen({
			placeholder_text_single: "Seleccione",
			search_contains: true,
			default_no_result_text: 'No se encontró esta red social',
			allow_single_deselect: true,
			width:"100%",
			no_results_text: "No se encontraron resultados para: "
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para tranformar los select multiples en los formularios.
	*/
	function chosen_multiple(chosen){
		$(chosen).chosen({
			width:"100%",
			placeholder_text_multiple: "Seleccione",
			search_contains: true,
			no_results_text: "No se encontraron resultados para: "
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que resetea los select simples en los formularios.
	*/
	function chosen_single_destroy(chosen){
		$(chosen).val([]).trigger('chosen:updated');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que resetea los select multiples en los formularios.
	*/
	function chosen_multiple_destroy(chosen){
		$(chosen).val([]).trigger('chosen:updated');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que transformar los textarea en editores.
	*/
	function trumbowyg(){
		$('.contenido').trumbowyg({
		    lang: 'es',
		    autogrow: true,
		    btns: [
		        ['viewHTML'],
		        ['undo', 'redo'], // Only supported in Blink browsers
		        ['formatting'],
		        ['strong', 'em', 'del'],
		        ['superscript', 'subscript'],
		        ['link'],
		        ['insertImage'],
		        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
		        ['unorderedList', 'orderedList'],
		        ['horizontalRule'],
		        ['removeformat']
		    ]
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que resetea los textarea en editores.
	*/
	function trumbowyg_destroy(editor){
		$(editor).trumbowyg('destroy');
		$(editor).val("");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que envia los datos de los formularios de registro y actualizacion
		de los noticias.
	*/
	function enviarFormulario(form, url, alert){
		$(form).submit(function(e){
			e.preventDefault();
			var formData=new FormData($(form)[0]), post = $(this).attr('method');
			$('input[type="submit"]').attr('disabled','disabled');
			$.ajax({
				url:carpeta+url,
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				type:post,
				dataType:'JSON',
				data:formData,
				cache:false,
				contentType:false,
				processData:false,
				beforeSend: function(){
					if(alert=="#alert"){
			        	scrollToTop();
			        }
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
					$(alert).html(html);
				},
				error: function (repuesta) {
					$('input[type="submit"]').removeAttr('disabled');
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
			        	if(errores.titulo!=undefined){
					    	for(var i=0; i<errores.titulo.length; i++){
					        	html+='<li>'+errores.titulo[i]+'</li>';
					        }
					    }
					    if(errores.status_id!=undefined){
					    	for(var i=0; i<errores.status_id.length; i++){
					        	html+='<li>'+errores.status_id[i]+'</li>';
					        }
					    }
					    if(errores.etiqueta_id!=undefined){
					    	for(var i=0; i<errores.etiqueta_id.length; i++){
					        	html+='<li>'+errores.etiqueta_id[i]+'</li>';
					        }
					    }
					    if(errores.contenido!=undefined){
					    	for(var i=0; i<errores.contenido.length; i++){
					        	html+='<li>'+errores.contenido[i]+'</li>';
					        }
					    }
				    }
			        html+='</div>';
					$(alert).html(html);
			    },
				success: function(respuesta){
					$('input[type="submit"]').removeAttr('disabled');
					if(form=="#form_registrar"){
						limpiar_datos_agregar();
						listar("#cuadro1");
					}else if(form=="#form_actualizar"){
						buscar(document.getElementById('id').value);
					}
					if(alert=="#alert"){
			        	scrollToTop();
			        }
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
					$(alert).html(html);
				}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de registro de noticias, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function registrar_noticia(){
		enviarFormulario("#form_registrar", 'admin/noticias', "#alert");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de registro de noticias, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function actualizar_noticia(){
		$("#form_actualizar").click(function(e){
			$('input[type="submit"]').attr('disabled','disabled');
			$.ajax({
				url:carpeta+'admin/noticias/'+document.getElementById('id').value,
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				type:'PUT',
				data:{
					id: document.getElementById('id').value,
					titulo: document.getElementById('titulo').value,
					etiquetas: $("#etiquetas").val(),
					status_id: document.getElementById('status').value,
					contenido: document.getElementById('contenido_actualizar').value
				},
				beforeSend: function(){
			        scrollToTop();
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
					$("#alert").html(html);
				},
				error: function (repuesta) {
					$('input[type="submit"]').removeAttr('disabled');
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
			        	if(errores.titulo!=undefined){
					    	for(var i=0; i<errores.titulo.length; i++){
					        	html+='<li>'+errores.titulo[i]+'</li>';
					        }
					    }
					    if(errores.status_id!=undefined){
					    	for(var i=0; i<errores.status_id.length; i++){
					        	html+='<li>'+errores.status_id[i]+'</li>';
					        }
					    }
					    if(errores.etiqueta_id!=undefined){
					    	for(var i=0; i<errores.etiqueta_id.length; i++){
					        	html+='<li>'+errores.etiqueta_id[i]+'</li>';
					        }
					    }
					    if(errores.contenido!=undefined){
					    	for(var i=0; i<errores.contenido.length; i++){
					        	html+='<li>'+errores.contenido[i]+'</li>';
					        }
					    }
				    }
			        html+='</div>';
			        scrollToTop();
					$("#alert").html(html);
			    },
				success: function(respuesta){
					$('input[type="submit"]').removeAttr('disabled');
			        scrollToTop();
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
					$("#alert").html(html);
				}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el bloqueo, desbloqueo, elimnacion de los registros dependiendo
		del controlador pasado, recibiendo parametros de las respectivas funciones 
		de cada accion.
	*/
	function sweetAlertNoticias(accion, msj, url, tbody, table, controller, method){
		$(tbody).on("click", "span."+accion, function(){
			var data=table.row($(this).parents("tr")).data();
			if(accion=="edicion"){
				accion="poner en edicion";
			}
			if(method=='POST'){
				route=carpeta+'admin/'+controller+'/'+data.id+'/'+url;
			}else if(method=='DELETE'){
				route=carpeta+'admin/'+controller+'/'+data.id;
			}
			swal({
			  	title: "¿Esta seguro de "+accion+" la noticia?",
			  	type: "warning",
			  	showCancelButton: true,
			 	confirmButtonColor: "#DD6B55",
			  	confirmButtonText: "Si, "+msj+"!",
			  	cancelButtonText: "No, Cancelar!",
			  	closeOnConfirm: false,
			  	closeOnCancel: false
			},
			function(isConfirm){
			  	if (isConfirm) {
			    	swal.close();
			    	$.ajax({
						url:route,
						headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
						type: method,
						dataType: 'JSON',
						data:{
							id:data.id,
						},
						beforeSend: function(){
				        	html='<div class="alert alert-info" role="alert">';
				        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				        	html+='<span>Realizando cambios, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
					        html+='</div>';
					        $("#alert").html(html);
						},
						error: function (repuesta) {
							var errores=repuesta.responseJSON;
				        	html='<div class="alert alert-danger" role="alert">';
				        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						    html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
					        html+='</div>';
					        $("#alert").html(html);
					    },
						success: function(respuesta){
							html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
							html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							html+=respuesta.mensaje;
							html+="</div>";
				        	listar();
							scrollToTop();
				        	$("#alert").html(html);
						}
					});
			  	} else {
				    swal("Cancelado", "Proceso cancelado", "error");
			  	}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para poner en edicion de noticias.
	*/
	function edicion(tbody, table){
		sweetAlertNoticias('edicion', 'Poner en edición', 'edicion', tbody, table, 'noticias', 'POST');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para publicar de noticias.
	*/
	function publicar(tbody, table){
		sweetAlertNoticias('publicar', 'Publicar', 'publicar', tbody, table, 'noticias', 'POST');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el eliminar de noticias.
	*/
	function eliminar(tbody, table){
		sweetAlertNoticias('eliminar', 'Eliminar', '', tbody, table, 'noticias', 'DELETE');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que busca los datos de un artista para mostrarlo en la edicion
		del mismo.
	*/
	function buscar(id){
		$.ajax({
			url:carpeta+'admin/noticias/'+id+'/search',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			data:{
				id:id,
			},
			error: function (repuesta) {
				scrollToTop();
				var errores=repuesta.responseJSON;
	        	html='<div class="alert alert-danger" role="alert">';
	        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			    html+='<span><h3>Ha ocurrido un error, actualice la página.</span>';
		        html+='</div>';
				$("#alert").html(html);
		    },
			success: function(respuesta){
				$("#imagen").html('<img src="'+carpeta+"images/noticias/"+respuesta.imagen+'" class="respimg">');
				$("#publicado").html('Publicado: <i class="fa fa-clock-o" aria-hidden="true"></i> '+respuesta.publicado);
				$("#visitas").html('Visitas: <i class="fa fa-eye" aria-hidden="true"></i> '+respuesta.visitas);
				$("#imagen_modal").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#foto'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");

				/* Mostrar datos del museo */
					$("#titulo").val(respuesta.titulo);
					$("#etiquetas").val(respuesta.mis_etiquetas);
					$("#contenido_actualizar").val(respuesta.contenido);
					$("#status").val(respuesta.status_id);
					chosen_multiple('.multiple');
					trumbowyg();
				/* ---------------------------------- */
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para la subida de imagenes.
	*/
	function subirImagen(form, url, modal, input){
		$(form).submit(function(e){
			e.preventDefault();
			if(form=="#form_imagen"){
				route=carpeta+'admin/noticias/'+document.getElementById('id').value+'/'+url;
			}
			var formData=new FormData($(form)[0]);
			$('input[type="submit"]').attr('disabled','disabled');
			$.ajax({
				xhr:function(){
					$(".pb").slideDown("slow");
					var xhr=new window.XMLHttpRequest();
					xhr.upload.addEventListener('progress', function(e){
						if(e.lengthComputable){
							var percent=Math.round((e.loaded/e.total)*100);
							$(".progressBar").attr("aria-valuenow", percent).css('width', percent+'%').text(percent+'%');						
						}
					});
					return xhr;
				},
				type:'POST',
				url:route,
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				data:formData,
				processData:false,
				contentType:false,
				dataType:'JSON',
				cache:false,
				beforeSend: function(){
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
					scrollToTop();
					$('#alert').html(html);
				},
				error: function (repuesta) {
					$('input[type="submit"]').removeAttr('disabled');
					$(".pb").delay(1000).hide(500);
					$(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
					$(modal).delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else if(errores.imagen!=undefined){
			    		for(var i=0; i<errores.imagen.length; i++){
				        	html+='<li>'+errores.imagen[i]+'</li>';
				        }
				    }
			        html+='</div>';
					scrollToTop();
					$('#alert').html(html);
			    },
				success:function(respuesta){
					$('input[type="submit"]').removeAttr('disabled');
					$(".pb").delay(1000).hide(500);
					$(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
					$(modal).delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
					document.getElementById(input).value="";
					buscar(document.getElementById('id').value);
					scrollToTop();
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
					scrollToTop();
					$('#alert').html(html);
				}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para subir la imagen.
	*/
	function imagen(){
		subirImagen("#form_imagen", "imagen", "#foto", "imagen_registrar");
	}
/* ------------------------------------------------------------------------------- */