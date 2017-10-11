/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar las funciones cuando la pagina este cargada por completo 
	*/
	$(document).ready(function(){
		$("#artistas").attr('class', 'active');
		listar();
		registrar_artista();
		actualizar_artista();
		registrar_red_social();
		actualizar_red_social();
		bg_portada();
		bg_biografia();
		var id=document.getElementById('id').value;
		listarRedesSociales("", id);
		bg_habilidad();
		registrar_habilidad();
		actualizar_habilidad();
		var id=document.getElementById('id').value;
		listarRedesSociales("", id);
		listarHabilidades("", id);
		if(id>0){
			buscar(id);
		}
		var id_catalogo=document.getElementById('id_catalogo').value;
		if(id_catalogo>0){
			buscarCatalogo(id_catalogo);
			actualizar_catalogo();
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
		Funcion que oculta el formulario de asignar dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_asignar").click(function(){
		listar("#cuadro3");
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta el formulario de redes sociales dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_registrar_red_social").click(function(){
		listarRedesSociales("#cuadro7", document.getElementById('id').value);
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta el formulario de redes sociales dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_actualizar_red_social").click(function(){
		listarRedesSociales("#cuadro8", document.getElementById('id').value);
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta el formulario de redes sociales dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_registrar_habilidad").click(function(){
		listarHabilidades("#cuadro11", document.getElementById('id').value);
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta el formulario de redes sociales dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_actualizar_habilidad").click(function(){
		listarHabilidades("#cuadro12", document.getElementById('id').value);
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
				"url":carpeta+"admin/artistas/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"nombre"},
				{"data":"foto",
					render : function(data, type, row) {
						return '<img src="'+carpeta+'images/artistas/'+data+'" class="img-responsive img-circle" style="width: 30px;">';
	          		}
				},
				{"data":"genero_id",
					render : function(data, type, row) {
						if(data==1){
							return '<i class="fa fa-female fa-2x" aria-hidden="true" style="color: #800000"></i>';
						}else if(data==2){
							return '<i class="fa fa-male fa-2x" aria-hidden="true" style="color: #800000"></i>';
						}
	          		}
				},
				{"data":"profesiones",
					render : function(data, type, row) {
	              		return '<span class="badge">'+data+'</span>';
	          		}
				},
				{"data":"disciplinas",
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
						var botones="<a href='"+carpeta+"admin/artistas/"+data.id+"/edit' class='botones btn-primary' data-toggle='tooltip' title='Editar'><i class='fa fa-pencil-square-o'></i></a>";
		              	if(data.status=="Disponible"){
		              		botones+=" <span class='bloquear botones btn-warning' data-toggle='tooltip' title='Bloquear'><i class='fa fa-lock'></i></span>";
		              	}else if(data.status=="Restringido"){
							botones+=" <span class='desbloquear botones btn-warning' data-toggle='tooltip' title='Desbloquear'><i class='fa fa-unlock'></i></span>";
		              	}
		              	botones+=" <span class='asignar botones btn-info' data-toggle='tooltip' title='Asignar Usuarios'><i class='fa fa-user-circle'></i></span>";
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
					"text": "<i class='fa fa-user-plus'></i>",
					"titleAttr": "Agregar Artista",
					"className": "btn btn-success",
					"action": function(){
						agregar("#cuadro1", "#cuadro2");
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
		bloquear("#tabla tbody", table);
		desbloquear("#tabla tbody", table);
		asignar_usuarios("#tabla tbody", table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta y muestra los cuadros dependiendo de los parametros que
		recibe, se utiliza en los formularios de: registrar artista, registrar 
		catalogos; en los listados de: aritstas, catalogos, redes sociales,
		habilidades; tambien cambia botones.
	*/
	function agregar(mostrar, ocultar){
		if(mostrar=="#cuadro1"){
			limpiar_datos_agregar();
			chosen_single('.select');
		}
		if(mostrar=="#cuadro4"){
			limpiar_catalogo_agregar();
			$("#agregarPortafolio").hide();
			$("#texto_portafolio").hide();
			$("#listaPortafolio").show();
		}
		if(mostrar=="#cuadro7"){
			limpiar_red_social_agregar();
			chosen_single('.select');
		}
		if(mostrar=="#cuadro7"){
			limpiar_red_social_agregar();
			chosen_single('.select');
		}
		if(mostrar=="#cuadro11"){
			limpiar_habilidad_agregar();
		}
		chosen_multiple('.multiple');
		$(mostrar).slideDown("slow");
		$(ocultar).slideUp("slow");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta y muestra los cuadros dependiendo de los parametros que
		recibe, se utiliza en los formularios de: registrar artista, registrar 
		catalogos; en los listados de: aritstas, catalogos; tambien cambia botones.
	*/
	function visualizar(mostrar, ocultar){
		if(mostrar=="#cuadro5"){
			$("#listaPortafolio").hide();
			$("#texto_portafolio").show();
			$("#agregarPortafolio").show();
		}
		$(mostrar).slideDown("slow");
		$(ocultar).slideUp("slow");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que limpia los campos del formulario de registro de artistas.
	*/
	function limpiar_datos_agregar(){
		trumbowyg_destroy('.biografia');
		chosen_single_destroy('.select');
		chosen_multiple_destroy('.multiple');
		bootstrap_datepicker('.fecha');
		trumbowyg();
		$("#nombre").val("").focus();
		$("#nacimiento").val("");
		$("#muerte").val("");
		$("#foto").val("");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para limpiar el formulario de registro de los catalogos.
	*/
	function limpiar_catalogo_agregar(){
		$("#titulo_registrar").val("");
		trumbowyg_destroy('#descripcion_registrar');
		trumbowyg();
		chosen_multiple_destroy('.multiple');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para limpiar el formulario de registro de los catalogos.
	*/
	function limpiar_red_social_agregar(){
		$("#nombre_registrar").val("");
		trumbowyg_destroy('#red_social_agregar');
		trumbowyg();
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para limpiar el formulario de registro de las redes sociales.
	*/
	function limpiar_red_social_agregar(){
		$("#nombre_registrar").val("");
		chosen_single_destroy('.select');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para limpiar el formulario de registro de las habilidades.
	*/
	function limpiar_habilidad_agregar(){
		$("#titulo_habilidad_registrar").val("");
		$("#descripcion_habilidad_agregar").val("");
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
			width:"100%"
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
			default_no_result_text: 'No se encontraron estos perfiles'
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
		Funcion que pone el calendario a los input tipo data.
	*/
	function bootstrap_datepicker(date){
		$(date).datepicker({
		    format: 'dd-mm-yyyy',
		    todayHighlight: true,
		    autoclose: true,
		    calendarWeeks: true,
		    clearBtn: true,
		    disableTouchKeyboard: true,
		    language: 'es'
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que transformar los textarea en editores.
	*/
	function trumbowyg(){
		$('.biografia').trumbowyg({
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
		de los artistas.
	*/
	function enviarFormulario(form, url, alert){
		$(form).submit(function(e){
			e.preventDefault();
			var formData=new FormData($(form)[0]), post = $(this).attr('method');
			console.log(url);
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
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
				    	if(alert=="#alert"){
				        	if(errores.nombre!=undefined){
						    	for(var i=0; i<errores.nombre.length; i++){
						        	html+='<li>'+errores.nombre[i]+'</li>';
						        }
						    }
						    if(errores.fecha_nacimiento!=undefined){
						    	for(var i=0; i<errores.fecha_nacimiento.length; i++){
						        	html+='<li>'+errores.fecha_nacimiento[i]+'</li>';
						        }
						    }
						    if(errores.pais_nacimiento_id!=undefined){
						    	for(var i=0; i<errores.pais_nacimiento_id.length; i++){
						        	html+='<li>'+errores.pais_nacimiento_id[i]+'</li>';
						        }
						    }
						    if(errores.genero_id!=undefined){
						    	for(var i=0; i<errores.genero_id.length; i++){
						        	html+='<li>'+errores.genero_id[i]+'</li>';
						        }
						    }
						    if(errores.biografia!=undefined){
						    	for(var i=0; i<errores.biografia.length; i++){
						        	html+='<li>'+errores.biografia[i]+'</li>';
						        }
						    }
			        	}else if(alert=="#alert_portafolio"){
							if(errores.titulo!=undefined){
						    	for(var i=0; i<errores.titulo.length; i++){
						        	html+='<li>'+errores.titulo[i]+'</li>';
						        }
						    }
						    if(errores.descripcion!=undefined){
						    	for(var i=0; i<errores.descripcion.length; i++){
						        	html+='<li>'+errores.descripcion[i]+'</li>';
						        }
						    }
			        	}else if(alert=="#alert_habilidad"){
							if(errores.titulo!=undefined){
						    	for(var i=0; i<errores.titulo.length; i++){
						        	html+='<span>'+errores.titulo[i]+'</span>';
						        }
						    }
						    if(errores.descripcion!=undefined){
						    	for(var i=0; i<errores.descripcion.length; i++){
						        	html+='<span>'+errores.descripcion[i]+'</span>';
						        }
						    }
			        	}
				    }
			        html+='</div>';
					$(alert).html(html);
			    },
				success: function(respuesta){
					if(form=="#form_registrar"){
						limpiar_datos_agregar();
						listar("#cuadro1");
					}else if(form=="#form_registrar_catalogo"){
			        	visualizar("#cuadro5", "#cuadro4");
			        	buscar(document.getElementById('id').value);
			        }else if(form=="#form_registrar_red_social"){
			        	listarRedesSociales("#cuadro7", document.getElementById('id').value);
			        }
			        else if(form=="#form_registrar_habilidad"){
			        	listarHabilidades("#cuadro11", document.getElementById('id').value);
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
		Funcion que realiza el envio del formulario de registro de artistas, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function registrar_artista(){
		enviarFormulario("#form_registrar", 'admin/artistas', "#alert");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizacion de artistas, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function actualizar_artista(){
		enviarFormulario("#form_actualizar", 'admin/artistas/'+document.getElementById('id').value, "#alert");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizacion de artistas, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function actualizar_catalogo(){
		enviarFormulario("#form_actualizar", 'admin/artistascatalogos/'+document.getElementById('id_catalogo').value, "#alert");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de registro de las redes
		sociales de los artistas, pasandole parametros a la funcion enviarFormulario.
	*/
	function registrar_red_social(){
		enviarFormulario("#form_registrar_red_social", 'admin/artistasredessociales', "#alert_red_social");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizar las redes
		sociales de los artistas, pasandole parametros a la funcion 
		actualizar_red_social_habilidad.
	*/
	function actualizar_red_social(){
		actualizar_red_social_habilidad("#form_actualizar_red_social", 'admin/artistasredessociales/', "#alert_red_social");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de registro de las habilidades
		de los artistas, pasandole parametros a la funcion enviarFormulario.
	*/
	function registrar_habilidad(){
		enviarFormulario("#form_registrar_habilidad", 'admin/artistashabilidades', "#alert_habilidad");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizar las habilidades
		de los artistas, pasandole parametros a la funcion 
		actualizar_red_social_habilidad.
	*/
	function actualizar_habilidad(){
		actualizar_red_social_habilidad("#form_actualizar_habilidad", 'admin/artistashabilidades/', "#alert_habilidad");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizar las redes
		sociales y habilidades de los artistas.
	*/
	function actualizar_red_social_habilidad(form, url, alert){
		$(form).submit(function(e){
			e.preventDefault();
			var form=$(this).serialize();
			if(url=='admin/artistasredessociales/'){
				url+=document.getElementById('id_actualizar').value
			}else if(url=='admin/artistashabilidades/'){
				url+=document.getElementById('id_habilidad_actualizar').value
			}
			$.ajax({
				url:carpeta+url,
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				type:'PUT',
				dataType:'JSON',
				data:form,
				beforeSend: function(){
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
					$(alert).html(html);
				},
				error: function (repuesta) {
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
				    	if(alert=='#alert_red_social'){
					    	for(var i=0; i<errores.nombre.length; i++){
					        	html+='<li>'+errores.nombre[i]+'</li>';
					        }
					        for(var i=0; i<errores.red_social_id.length; i++){
					        	html+='<li>'+errores.red_social_id[i]+'</li>';
					        }
					    }else if(alert=='#alert_habilidad'){
					    	for(var i=0; i<errores.titulo.length; i++){
					        	html+='<li>'+errores.titulo[i]+'</li>';
					        }
					        for(var i=0; i<errores.descripcion.length; i++){
					        	html+='<li>'+errores.descripcion[i]+'</li>';
					        }
					    }
				    }
			        html+='</div>';
					$(alert).html(html);
			    },
				success: function(respuesta){
					if(alert=='#alert_red_social'){
				    	limpiar_datos_editar_red_social();
						listarRedesSociales("#cuadro8", document.getElementById('id').value);
				    }else if(alert=='#alert_habilidad'){
				    	limpiar_datos_editar_habilidad();
						listarHabilidades("#cuadro12", document.getElementById('id').value);
				    }
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
					$('#alert_red_social').html(html);
					$(alert).html(html);
				}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el bloqueo y desbloqueo de los artistas, recibiendo parametros
		de las respectivas funciones de cada accion.
	*/
	function lockUnlockArtistas(accion, msj, url, tbody, table){
		$(tbody).on("click", "span."+accion, function(){
			var data=table.row($(this).parents("tr")).data();
			swal({
			  	title: "¿Esta seguro de "+accion+" al usuario?",
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
			    	scrollToTop();
			    	$.ajax({
						url:carpeta+'admin/artistas/'+data.id+'/'+url,
						headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
						type: 'POST',
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
							scrollToTop();
							var errores=repuesta.responseJSON;
				        	html='<div class="alert alert-danger" role="alert">';
				        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						    html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
					        html+='</div>';
							$("#alert").html(html);
					    },
						success: function(respuesta){
							listar();
							scrollToTop();
							html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
							html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							html+=respuesta.mensaje;
							html+="</div>";
							$('#alert').html(html);
						}
					});
			  	} else {
				    swal("Cancelado", "No se ha eliminado el registro", "error");
			  	}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el bloqueo de artista.
	*/
	function bloquear(tbody, table){
		lockUnlockArtistas('bloquear', 'Bloquear', 'lock', tbody, table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el desbloqueo de artista.
	*/
	function desbloquear(tbody, table){
		lockUnlockArtistas('desbloquear', 'Desbloquear', 'unlock', tbody, table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para mostrar el formulario de la asignacion de usuarios a los 
		artistas y oculta la tabla de datos.
	*/
	function asignar_usuarios(tbody, table){
		$('#asignar').chosen('destroy');
		$(tbody).on("click", "span.asignar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			$("#asignar").val(data.asignados);
			chosen_multiple('.multiple');
			$("#cuadro3").slideDown("slow");
			$("#cuadro2").slideUp("slow");
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que busca los datos de un artista para mostrarlo en la edicion
		del mismo.
	*/
	function buscar(id){
		$.ajax({
			url:carpeta+'admin/artistas/'+id+'/search',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			data:{
				id:id,
			},
			beforeSend: function(){
	        	html='<div class="alert alert-info" role="alert">';
	        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	        	html+='<span>Cargando Datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
		        html+='</div>';
				$("#alert").html(html);
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
				$('#alert').html("");

				/* Verificar el tipo de usuario y el tipo de artista para ver si puede editar las imagenes */
					var perfil=document.getElementById('user').value;
					var id_artista=document.getElementById('id_artista').value;
					if(respuesta.tipo==0 && (perfil=="Administrador" || perfil=="Auditor")){
						$("#imagen_portada").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#portada'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
						$("#imagen_biografia").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#biografia'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
						$("#imagen_habilidad").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#habilidad'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
					}else if(respuesta.tipo==1 && perfil=="Artista" && id_artista==respuesta.id){
						$("#imagen_portada").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#portada'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
						$("#imagen_biografia").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#biografia'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
						$("#imagen_habilidad").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#habilidad'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
					}
				/*---------------------------------------------------------------------------------------- */
				
				/* Mostrar datos de presentacion */
					$('#bg_portada').css("background-image", "url("+carpeta+"images/artistas/"+respuesta.portada+")");
					$('#artista').html("<h2>"+respuesta.nombre+"</h2>");
				/* ---------------------------------- */

				/* Mostrar Estadisticas */
					$("#imagenConteo").html(respuesta.imagenConteo);
					conteo("#imagenConteo");
					$("#catalogoConteo").html(respuesta.catalogoConteo);
					conteo("#catalogoConteo");
					$("#visitas").html(respuesta.visitas);
					conteo("#visitas");
				/* ---------------------------------- */

				/* Mostrar datos de portafolios */
					var cuadro4='#cuadro4', cuadro5='#cuadro5';
					if(respuesta.tipo==0 && (perfil=="Administrador" || perfil=="Auditor")){
						$("#agregarPortafolio").show();
					}else if(respuesta.tipo==1 && perfil=="Artista" && id_artista==respuesta.id){
						$("#agregarPortafolio").show();
					}
					document.getElementById("artista_id_catalogo").value=respuesta.id;
				/* --------------------------- */

				/* Mostrar datos de portafolios */
					$('#bg_habilidad').css("background-image", "url("+carpeta+"images/artistas/"+respuesta.bg_habilidades+")");
				/* --------------------------- */

				if(document.getElementById('control').value=='edit'){
					/* Mostrar datos personales del artista */
						function mostrarDatos(){
							$("#editar").show();
							bootstrap_datepicker('.fecha');
							document.getElementById('nombre').value=respuesta.nombre;
							$('#nacimiento').datepicker("update", cambiarFormatoFecha(respuesta.fecha_nacimiento));
							if(respuesta.fecha_muerte!='1969-12-31'){
								$('#muerte').datepicker("update", cambiarFormatoFecha(respuesta.fecha_muerte));
							}
							$("#pais_nacimiento").val(respuesta.pais_nacimiento_id).trigger('chosen:updated');
							$("#genero_id").val(respuesta.genero_id).trigger('chosen:updated');
							$("#pais_muerte").val(respuesta.pais_muerte_id).trigger('chosen:updated');
							$("#disciplinas").val(respuesta.mis_disciplinas).trigger('chosen:updated');
							$("#profesiones").val(respuesta.mis_profesiones).trigger('chosen:updated');
							$('#biografia_artista').val(respuesta.biografia);
							chosen_single('.select');
							chosen_multiple('.multiple');
							trumbowyg();
						}
						$('#bg_biografia').css("background-image", "url("+carpeta+"images/artistas/"+respuesta.bg_biografia+")");
						if(respuesta.tipo==0 && (perfil=="Administrador" || perfil=="Auditor")){
							mostrarDatos();
							$("#cuadro6").show();
							$("#cuadro9").hide();
							$("#cuadro10").show();
							$("#cuadro13").hide();
						}else if(respuesta.tipo==1 && perfil=="Artista" && id_artista==respuesta.id){
							mostrarDatos();
							$("#cuadro6").show();
							$("#cuadro9").hide();
							$("#cuadro10").show();
							$("#cuadro13").hide();
							$('#div-muerte').hide();
							$('#div-pais_muerte').hide();
							$('.div').removeClass('col-md-6').addClass('col-md-4');
							$('.div-chosen').removeClass('col-md-4').addClass('col-md-6');id=document.getElementById('id').value;
						}else if(respuesta.tipo==1 && (perfil=="Administrador" || perfil=="Auditor")){
							$("#informacion").show();
							$("#cuadro9").show();
							$("#cuadro6").hide();
							$("#cuadro13").show();
							$("#cuadro10").hide();
							respuesta.artistas_habilidades.forEach(function(habilidad, index){
								var habilidades='<li><div class="serv-header fl-wrap"><h4>'+habilidad.habilidad+'</h4></div><div class="clearfix"></div>';
								habilidades+='<p>'+habilidad.descripcion+'</p></li>';
								$("#cuadro13").append(habilidades);
							});
							$("#div-biografia").html(respuesta.biografia);
							$("#p-genero").html("<b>Genero: "+respuesta.genero.genero+"</b>");
							$("#p-nacimiento").html("<b>Fecha de Nacimiento: "+cambiarFormatoFecha(respuesta.fecha_nacimiento)+"</b>");
							if(respuesta.fecha_muerte!='1969-12-31'){
								$("#p-muerte").show();
								$("#p-muerte").html("<b>Fecha de Muerte: "+cambiarFormatoFecha(respuesta.fecha_muerte)+"</b>");
							}
							$("#p-pais_nacimiento").html("<b>País de Nacimiento: "+respuesta.pais_nacimiento[0].pais+"</b>");
							if(respuesta.pais_muerte[0].pais!=""){
								$("#p-pais_muerte").html("<b>País de Nacimiento: "+respuesta.pais_muerte[0].pais+"</b>");
								$("#p-pais_muerte").show();
							}
						}
					/* ---------------------------------- */
					
				}
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
			var formData=new FormData($(form)[0]);
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
				url:carpeta+'admin/artistas/'+document.getElementById('id').value+'/'+url,
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
					if(url=="habilidad"){
						$('#alert_habilidad').html(html);
					}else{
						scrollToTop();
						$('#alert').html(html);
					}
				},
				error: function (repuesta) {
					$(".pb").delay(1000).hide(500);
					$(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
					$(modal).delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
					document.getElementById(input).value="";
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
				    	for(var i=0; i<errores.foto.length; i++){
				        	html+='<li>'+errores.foto[i]+'</li>';
				        }
				    }
			        html+='</div>';
					if(url=="habilidad"){
						$('#alert_habilidad').html(html);
					}else{
						scrollToTop();
						$('#alert').html(html);
					}
			    },
				success:function(respuesta){
					$(".pb").delay(1000).hide(500);
					$(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
					$(modal).delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
					document.getElementById(input).value="";
					buscar(document.getElementById('id').value);
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
					if(url=="habilidad"){
						$('#alert_habilidad').html(html);
					}else{
						scrollToTop();
						$('#alert').html(html);
					}
				}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para subir la foto para la imgen de la portada.
	*/
function bg_portada(){
	subirImagen("#form_portada", "portada", "#portada", "foto_portada");
}

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para subir la foto para la imgen de la biografia.
	*/
function bg_biografia(){
	subirImagen("#form_biografia", "biografia", "#biografia", "foto_biografia");
}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para subir la foto para la imgen de la biografia.
	*/
function bg_habilidad(){
	subirImagen("#form_habilidad", "habilidad", "#habilidad", "foto_habilidad");
}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que busca los datos de un catalogo para mostrarlo en la edicion
		del mismo.
	*/
	function buscarCatalogo(id){
		$.ajax({
			url:carpeta+'admin/artistascatalogos/'+id+'/search',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			dataType: 'JSON',
			data:{
				id:id,
			},
			beforeSend: function(){
	        	html='<div class="alert alert-info" role="alert">';
	        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	        	html+='<span>Cargando Datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
		        html+='</div>';
				$("#alert").html(html);
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
				$('#alert').html("");
				var perfil=document.getElementById('user').value;
				var id_artista=document.getElementById('id_artista').value;
				/* Mostrar datos personales del artista */
					function mostrarDatos(){
						var botones="<div class='box-header'><a class='botones btn-success' data-toggle='modal' data-target='#imagen'><i class='fa fa-file-image-o' aria-hidden='true'></i></a>";
						botones+=" <a href='"+carpeta+"admin/artistascatalogos/"+respuesta.artista_id+"' class='botones btn-primary' data-toggle='tooltip' title='Portafolios'><i class='fa fa-folder-o'></i></a>";
						botones+=" <a href='"+carpeta+"admin/artistas/"+respuesta.artista_id+"/edit' class='botones btn-info' data-toggle='tooltip' title='Perfil'><i class='fa fa-address-book-o'></i></a></div>";
						$("#opciones").html(botones);
						$("#editar").show();
						document.getElementById('titulo').value=respuesta.titulo;
						document.getElementById('descripcion_catalogo').value=respuesta.descripcion;
						$("#disciplinas").val(respuesta.mis_disciplinas).trigger('chosen:updated');
						chosen_multiple('.multiple');
						trumbowyg();
					}
					if(respuesta.artista.tipo==0 && (perfil=="Administrador" || perfil=="Auditor")){
						mostrarDatos();
					}else if(respuesta.artista.tipo==1 && perfil=="Artista" && id_artista==respuesta.artista.id){
						mostrarDatos();
					}else if(respuesta.artista.tipo==1 && (perfil=="Administrador" || perfil=="Auditor")){
						$("#informacion").show();
						$("#p_titulo").html(respuesta.titulo);
						$("#p_descripcion").html(respuesta.descripcion);
						respuesta.disciplinas.forEach(function(disciplina, index){
							$("#p_disciplinas").append('<span class="badge">'+disciplina.disciplina+'</span>');
						});
					}
				/* ---------------------------------- */
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que coloca los datos en el formulario para la edicion de imagenes.
	*/
	function imagen_editar(id, nombre, descripcion){
		imagen_editar_limpiar();
		$("#imagen_editar").modal('show');
		$("#nombre_imagen").val(nombre);
		document.getElementById('descripcion_imagen').value=descripcion;
		$("#form_actualizar_imagen").attr("action", carpeta+"admin/artistasimagenes/"+id);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que coloca los datos en el formulario para la edicion de imagenes.
	*/
	function imagen_editar_limpiar(){
		$("#iamgen_imagen").val("");
		$("#nombre_imagen").val("");
		trumbowyg_destroy('#descripcion_imagen');
		trumbowyg();
		$("#form_actualizar_imagen").attr("action", ''); 
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar los datos de la base de datos en la tabla, tambien
		esconde los formularios dependiendo del caso y muestra la tabla.
	*/
	function listarRedesSociales(cuadro, id){
		$('#reddesSociales tbody').off('click');
		if(cuadro!=""){
			$(cuadro).slideUp("slow");
		}
		$("#cuadro6").slideDown("slow");
		var table=$("#reddesSociales").DataTable({
			"destroy":true,
			"stateSave": true,
			"serverSide":true,
			"ajax":{
				"method":"POST",
				"url":carpeta+"admin/artistasredessociales/"+id+"/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"red_social"},
				{"data":"nombre"},
				{"data":"created_at"},
				{"data":"updated_at"},
				{"data": null,
					render : function(data, type, row) {
						var botones="<span class='editar botones btn-primary' data-toggle='tooltip' title='Editar'><i class='fa fa-pencil-square-o'></i></span>";
		              	botones+=" <span class='eliminar botones btn-danger' data-toggle='tooltip' title='Eliminar'><i class='fa fa-trash'></i></span>";
		              	return botones;
		          	}
				}
			],
			"language": idioma_espanol,
			"dom": "<'row'<'form-inline' <'col-sm-6 col-sm-offset-1'B>>>"
						 +"<'row' <'form-inline' <'col-sm-1 col-sm-offset-2'f>>>"
						 +"<rt>"
						 +"<'row'<'form-inline'"
						 +" <'col-sm-6 col-md-6 col-lg-6'l>"
						 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
			"buttons":[
				{
					"text": "<i class='fa fa-refresh fa-spin fa-fw'></i>",
					"titleAttr": "Refrescar Datos",
					"className": "btn btn-primary",
					"action": function(){
						listarRedesSociales('', document.getElementById('id').value);
					}
				},{
					"text": "<i class='fa fa-user-plus'></i>",
					"titleAttr": "Agregar Red Social",
					"className": "btn btn-success",
					"action": function(){
						agregar("#cuadro7", "#cuadro6");
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
		editar_red_social("#reddesSociales tbody", table);
		eliminar_red_social_habilidades("#reddesSociales tbody", table, 'admin/artistasredessociales/');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion muestra los datos de la red social en el formulario de actualizar, los
		datos los toma de la misma tabla, oculta la tabla y muestra el formulario
		de actualizar. 
	*/
	function editar_red_social(tbody, table){
		limpiar_datos_editar_red_social();
		$(tbody).on("click", "span.editar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			document.getElementById('id_actualizar').value=data.id;
			document.getElementById("nombre_actualizar").value=data.nombre;
			$("#red_social_actualizar").val(data.red_social_id).trigger('chosen:updated');
			$("#cuadro8").slideDown("slow");
			$("#cuadro6").slideUp("slow");
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que limpia los campos el formulario de actualizar.
	*/
	function limpiar_datos_editar_red_social(){
		$("#nombre_actualizar").val("");
		trumbowyg_destroy('#red_social_actualizar');
		chosen_single_destroy('.select');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que se encarga eliminar un registro seleccionado.
	*/
	function eliminar_red_social_habilidades(tbody, table, url){
		$(tbody).on("click", "span.eliminar", function(){
			var data=table.row($(this).parents("tr")).data();
			swal({
			  	title: "¿Esta seguro de eliminar el registro?",
			  	type: "warning",
			  	showCancelButton: true,
			 	confirmButtonColor: "#DD6B55",
			  	confirmButtonText: "Si, Eliminar!",
			  	cancelButtonText: "No, Cancelar!",
			  	closeOnConfirm: false,
			  	closeOnCancel: false
			},
			function(isConfirm){
			  	if (isConfirm) {
			    	swal.close();
			    	$.ajax({
						url:carpeta+url+data.id,
						headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
						type: 'DELETE',
						dataType: 'JSON',
						data:{
							id:data.id,
						},
						beforeSend: function(){
				        	html='<div class="alert alert-info" role="alert">';
				        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				        	html+='<span>Eliminando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
					        html+='</div>';
					        if(tbody=="#reddesSociales tbody"){
					        	$("#alert_red_social").html(html);
					        }else if(tbody=="#tableHabilidades tbody"){
					        	$("#alert_habilidad").html(html);
					        }
						},
						error: function (repuesta) {
							var errores=repuesta.responseJSON;
				        	html='<div class="alert alert-danger" role="alert">';
				        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					        if(typeof errores=='undefined'){
						        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
						    }
					        html+='</div>';
					        if(tbody=="#reddesSociales tbody"){
								listarRedesSociales("#cuadro8", document.getElementById('id').value);
					        	$("#alert_red_social").html(html);
					        }else if(tbody=="#tableHabilidades tbody"){
					        	listarHabilidades("#cuadro12", document.getElementById('id').value);
					        	$("#alert_habilidad").html(html);
					        }
					    },
						success: function(respuesta){
							html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
							html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							html+=respuesta.mensaje;
							html+="</div>";
							if(tbody=="#reddesSociales tbody"){
								listarRedesSociales("#cuadro8", document.getElementById('id').value);
					        	$("#alert_red_social").html(html);
					        }else if(tbody=="#tableHabilidades tbody"){
					        	listarHabilidades("#cuadro12", document.getElementById('id').value);
					        	$("#alert_habilidad").html(html);
					        }
						}
					});
			  	} else {
				    swal("Cancelado", "No se ha eliminado el registro", "error");
			  	}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar los datos de la base de datos en la tabla, tambien
		esconde los formularios dependiendo del caso y muestra la tabla.
	*/
	function listarHabilidades(cuadro, id){
		$('#tableHabilidades tbody').off('click');
		if(cuadro!=""){
			$(cuadro).slideUp("slow");
		}
		$("#cuadro10").slideDown("slow");
		var table=$("#tableHabilidades").DataTable({
			"destroy":true,
			"stateSave": true,
			"serverSide":true,
			"ajax":{
				"method":"POST",
				"url":carpeta+"admin/artistashabilidades/"+id+"/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"habilidad"},
				{"data":"created_at"},
				{"data":"updated_at"},
				{"data": null,
					render : function(data, type, row) {
						var botones="<span class='editar botones btn-primary' data-toggle='tooltip' title='Editar'><i class='fa fa-pencil-square-o'></i></span>";
		              	botones+=" <span class='eliminar botones btn-danger' data-toggle='tooltip' title='Eliminar'><i class='fa fa-trash'></i></span>";
		              	return botones;
		          	}
				}
			],
			"language": idioma_espanol,
			"dom": "<'row'<'form-inline' <'col-sm-6 col-sm-offset-3'B>>>"
						 +"<'row' <'form-inline' <'col-sm-2 col-sm-offset-2 letra-blanco'f>>>"
						 +"<rt>"
						 +"<'row'<'form-inline'"
						 +" <'col-sm-6 col-md-6 col-lg-6 letra-blanco'l>"
						 +"<'col-sm-6 col-md-6 col-lg-6 letra-blanco'p>>>",
			"buttons":[
				{
					"text": "<i class='fa fa-id-card-o'></i>",
					"titleAttr": "Agregar Habilidad",
					"className": "btn btn-success",
					"action": function(){
						agregar("#cuadro11", "#cuadro10");
					}
				},
				{
					"text": "<i class='fa fa-refresh fa-spin fa-fw'></i>",
					"titleAttr": "Refrescar Datos",
					"className": "btn btn-primary",
					"action": function(){
						listarHabilidades('', document.getElementById('id').value);
					}
				}
				/*,
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
		editar_habilidad("#tableHabilidades tbody", table);
		eliminar_red_social_habilidades("#tableHabilidades tbody", table, 'admin/artistashabilidades/');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion muestra los datos de la habilidad en el formulario de actualizar, los
		datos los toma de la misma tabla, oculta la tabla y muestra el formulario
		de actualizar. 
	*/
	function editar_habilidad(tbody, table){
		limpiar_datos_editar_habilidad();
		$(tbody).on("click", "span.editar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			$('#descripcion_habilidad_actualizar').val(data.descripcion);
			document.getElementById('id_habilidad_actualizar').value=data.id;
			document.getElementById("titulo_habilidad_actualizar").value=data.habilidad;
			$("#cuadro12").slideDown("slow");
			$("#cuadro10").slideUp("slow");
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que limpia los campos el formulario de actualizar.
	*/
	function limpiar_datos_editar_habilidad(){
		$("#titulo_habilidad_actualizar").val("");
		$("#id_habilidad_actualizar").val("");
		$("#descripcion_habilidad_actualizar").val("");
	}
/* ------------------------------------------------------------------------------- */