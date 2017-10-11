/* -------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar las funciones cuando la pagina este cargada por completo 
	*/
	$(document).ready(function(){
		$("#usuarios").attr('class', 'active');
		listar();
		registrar();
		actualizar();
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para volver a cargar la tabla de datos dandole click al boton listado
		en el formulario de registro de usuarios, llama a la funcion listar() para
		mostrar los datos actualizando la tabla. 
	*/
	$("#listado_registrar").click(function(){
		listar("#cuadro1");
		chosen_destroy('#perfil_registrar');
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para volver a cargar la tabla de datos dandole click al boton listado
		en el formulario de actualizar de usuarios, llama a la funcion listar() para
		mostrar los datos actualizando la tabla. 
	*/
	$("#listado_actualizar").click(function(){
		listar("#cuadro2");
	});
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
		$("#cuadro3").slideDown("slow");
		var table=$("#tabla").DataTable({
			"destroy":true,
			"stateSave": true,
			"serverSide":true,
			"ajax":{
				"method":"POST",
				"url":carpeta+"admin/users/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"name"},
				{"data":"email"},
				{"data":"perfiles",
					render : function(data, type, row) {
						return '<span class="badge">'+data+'</span>'
	          		}
				},
				{"data":"status_id",
					render : function(data, type, row) {
	              		return '<span class="badge">'+data+'</span>'
	          		}
				},
				{"data":"artistas_asignados",
					render : function(data, type, row) {
		              	return '<span class="badge">'+data+'</span>'
		          	}
				},
				{"data":"created_at"},
				{"data":"updated_at"},
				{"data": null,
					render : function(data, type, row) {
						var botones="<span class='editar botones btn-primary' data-toggle='tooltip' title='Editar'><i class='fa fa-pencil-square-o'></i></span>";
		              	if(data.status_id=="Activo"){
		              		botones+=" <span class='bloquear botones btn-warning' data-toggle='tooltip' title='Bloquear'><i class='fa fa-lock'></i></span>";
		              	}else if(data.status_id=="Inactivo"){
							botones+=" <span class='desbloquear botones btn-warning' data-toggle='tooltip' title='Desbloquear'><i class='fa fa-unlock'></i></span>";
		              	}
		              	botones+=" <span class='evento botones btn-info' data-toggle='tooltip' title='Registros de Eventos'><i class='fa fa-address-book-o'></i></span>";
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
					"titleAttr": "Agregar Usuario",
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
		editar("#tabla tbody", table);
		bloquear("#tabla tbody", table);
		desbloquear("#tabla tbody", table);
		eventos("#tabla tbody", table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para limpiar los campos del formulario de registro de usuario. 
	*/
	function limpiar_datos_agregar(){
		$("#name_registrar").val("").focus();
		$("#email_registrar").val("");
		$("#password_registrar").val("");
		$("#password_confirmation_registrar").val("");
		$("#perfil_registrar").chosen("destroy");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que llama a limpiar_datos_agregar(), oculta la tabla y muestra
		el formulario de registro.
	*/
	function agregar(){
		limpiar_datos_agregar();
		chosen_multiple('#perfil_registrar');
		$("#cuadro1").slideDown("slow");
		$("#cuadro3").slideUp("slow");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que se encarga de enviar los datos del usuario para su registro tambien 
		muestra los alertas dependiendo del caso.
	*/
	function registrar(){
		$("#form_registrar").submit(function(e){
			e.preventDefault();
			var form=$(this).serialize();
			$.ajax({
				url:carpeta+'admin/users',
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				type:'POST',
				dataType:'JSON',
				data:form,
				beforeSend: function(){
					scrollToTop();
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
					$("#alert").html(html);
				},
				error: function (repuesta) {
					scrollToTop();
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
				    	if(errores.name!=undefined){
					    	for(var i=0; i<errores.name.length; i++){
					        	html+='<li>'+errores.name[i]+'</li>';
					        }
					    }
					    if(errores.email!=undefined){
					    	for(var i=0; i<errores.email.length; i++){
					        	html+='<li>'+errores.email[i]+'</li>';
					        }
					    }
					    if(errores.password!=undefined){
					    	for(var i=0; i<errores.password.length; i++){
					        	html+='<li>'+errores.password[i]+'</li>';
					        }
					    }
					    if(errores.password_confirmation!=undefined){
					    	for(var i=0; i<errores.password_confirmation.length; i++){
					        	html+='<li>'+errores.password_confirmation[i]+'</li>';
					        }
					    }
					    if(errores.perfil!=undefined){
					    	for(var i=0; i<errores.perfil.length; i++){
					        	html+='<li>'+errores.perfil[i]+'</li>';
					        }
					    }
				    }
			        html+='</div>';
					$("#alert").html(html);
			    },
				success: function(respuesta){
					limpiar_datos_agregar();
					listar("#cuadro1");
					scrollToTop();
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
					$('#alert').html(html);
				}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion muestra los datos del usuario en el formulario de actualizar, los
		datos los toma de la misma tabla, oculta la tabla y muestra el formulario
		de actualizar. 
	*/
	function editar(tbody, table){
		limpiar_datos_editar();
		$(tbody).on("click", "span.editar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			$("#id_actualizar").val(data.id);
			$("#perfil_actualizar").val(data.perfil_id);
			$("#artistas_id").val(data.artista_id);
			$('#usuario').html("Editar usuario<br> "+data.email);
			chosen_multiple('#perfil_actualizar');
			chosen_multiple('#artistas_id');
			$("#cuadro2").slideDown("slow");
			$("#cuadro3").slideUp("slow");
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que limpia los campos el formulario de actualizar.
	*/
	function limpiar_datos_editar(){
		$("#usuario").html("");
		$('#perfil_actualizar').chosen('destroy');
		$('#artistas_id').chosen('destroy');
		$("#id_actualizar").val("");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que envia los datos del formulario de actualizar, tambien muestra 
		los alertas dependiendo del caso.
	*/
	function actualizar(){
		$("#form_actualizar").submit(function(e){
			e.preventDefault();
			var form=$(this).serialize();
			$.ajax({
				url:carpeta+'admin/users/'+document.getElementById('id_actualizar').value,
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				type:'PUT',
				dataType:'JSON',
				data:form,
				beforeSend: function(){
					scrollToTop();
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
					$("#alert").html(html);
				},
				error: function (repuesta) {
					scrollToTop();
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
				    	for(var i=0; i<errores.perfil.length; i++){
				        	html+='<li>'+errores.perfil[i]+'</li>';
				        }
				    }
			        html+='</div>';
					$("#alert").html(html);
			    },
				success: function(respuesta){
					limpiar_datos_editar();
					listar("#cuadro2");
					scrollToTop();
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
					$('#alert').html(html);
				}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que realiza el bloquea o desbloqueo de un usuario dependiendo de los
		parametros que reciba.
	*/
	function bloquearDesbloquear(accion, msj, url, tbody, table){
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
						url:carpeta+'admin/users/'+data.id+'/'+url,
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
				    swal("Cancelado", "No se realizaron cambios al registro", "error");
			  	}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que para bloquear a un usuario, el cual pasa los parametros a 
		bloquearDesbloquear(accion, msj, url, tbody, table);.
	*/
	function bloquear(tbody, table){
		bloquearDesbloquear('bloquear', 'Bloquear', 'lock', tbody, table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que para desbloquear a un usuario, el cual pasa los parametros a 
		bloquearDesbloquear(accion, msj, url, tbody, table);.
	*/
	function desbloquear(tbody, table){
		bloquearDesbloquear('desbloquear', 'Desbloquear', 'unlock', tbody, table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que transforma el campo select para seleccion multiple.
	*/
	function chosen_multiple(id){
		$(id).chosen({
			width:"100%",
			placeholder_text_multiple: "Seleccione",
			search_contains: true,
			default_no_result_text: 'No se encontraron estos perfiles'
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que destruye el campo select de seleccion multiple y lo deja vacio.
	*/
	function chosen_destroy(id){
		$(id).val([]).trigger('chosen:updated');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que muestra la registros de enventos de los usuarios, oculta la
		tabla de usuarios y muestra la tabla de eventos.
	*/
	function eventos(tbody, table){
		$(tbody).on("click", "span.evento", function(){
			var data = table.row( $(this).parents("tr") ).data();
			$("#cuadro4").slideDown("slow");
			$("#cuadro3").slideUp("slow");
			$('#eventos tbody').off('click');
			$("#titulo").html('Registros de Eventos del Usuario:<br>'+data.email)
			var event=$("#eventos").DataTable({
				"destroy":true,
				"stateSave": true,
				"serverSide":true,
				"ajax":{
					"method":"GET",
					"url":carpeta+"admin/users/"+data.id,
					"data":{ _token: document.getElementById('token').value}
				},
				"columns":[
					{"data":"created_at"},
					{"data":"evento"},
					{"data":"ip"},
					{"data":"operacion"},
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
						"text": "<i class='fa fa-users'></i>",
						"titleAttr": "Listado de Usuarios",
						"className": "btn btn-success",
						"action": function(){
							listar("#cuadro4");
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
		});
	}
/* ------------------------------------------------------------------------------- */