/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar las funciones cuando la pagina este cargada por completo 
	*/
	$(document).ready(function(){
		$("#museo").attr('class', 'active');
		var control=document.getElementById('control').value;
		if(control=='edit'){
			listar();
			registrar_museo();
			asignar_usuarios_post();
			bg_portada();
			bg_historia();
			bg_servicio();
			actualizar_museo();
			registrar_directivo();
			actualizar_directivo();
			registrar_servicio();
			actualizar_servicio();
			actualizar_contacto();
			actualizar_mapa();
			imagen_create();
			imagen_edit();
			var id=document.getElementById('id').value;
			if(id>0){
				buscar(id);
				listarDirectivo('', id);
				listarServicio('', id);
			}
		}else if(control=='show'){
			imagen_create();
			imagen_edit();
			cargarImagenes(0, 'nada', 9);
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
		Funcion que oculta el formulario de registro directivo dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_registrar_directivo").click(function(){
		listarDirectivo("#cuadro5", document.getElementById('id').value);
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta el formulario de actualizar directivo dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_actualizar_directivo").click(function(){
		listarDirectivo("#cuadro6", document.getElementById('id').value);
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta el formulario de registro directivo dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_registrar_servicio").click(function(){
		listarServicio("#cuadro8", document.getElementById('id').value);
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que oculta el formulario de actualizar directivo dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_actualizar_servicio").click(function(){
		listarServicio("#cuadro9", document.getElementById('id').value);
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
				"url":carpeta+"admin/museos/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"nombre"},
				{"data":"foto",
					render : function(data, type, row) {
						return '<img src="'+carpeta+'images/museos/'+data+'" class="img-responsive img-circle" style="width: 30px;">';
	          		}
				},
				{"data":"fecha_fundacion",
					render : function(data, type, row) {
						if(data=="01-01-2000"){
							return 'N/A';
						}else{
							return data;
						}
	          		}
				},
				{"data":"telefono",
					render : function(data, type, row) {
						if(data==""){
							return 'N/A';
						}else{
							return data;
						}
	          		}
				},
				{"data":"correo",
					render : function(data, type, row) {
						if(data==""){
							return 'N/A';
						}else{
							return data;
						}
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
						var botones="<a href='"+carpeta+"admin/museos/"+data.id+"/edit' class='botones btn-primary' data-toggle='tooltip' title='Editar'><i class='fa fa-pencil-square-o'></i></a>";
		              	if(data.status=="Disponible"){
		              		botones+=" <span class='bloquear botones btn-warning' data-toggle='tooltip' title='Bloquear'><i class='fa fa-lock'></i></span>";
		              	}else if(data.status=="Restringido"){
							botones+=" <span class='desbloquear botones btn-warning' data-toggle='tooltip' title='Desbloquear'><i class='fa fa-unlock'></i></span>";
		              	}
		              	botones+=" <span class='asignar botones btn-info' data-toggle='tooltip' title='Asignar Usuarios'><i class='fa fa-user-circle'></i></span>";
		              	botones+=" <span class='eliminar botones btn-danger' data-toggle='tooltip' title='Eliminar'><i class='fa fa-trash'></i></span>";
		              	return botones;
		          	}
				}
			],
			"language": idioma_espanol,
			"dom": "<'row'<'form-inline' <B>>>"
						 +"<'row' <'form-inline' <f>>>"
						 +"<rt>"
						 +"<'row'<'form-inline'"
						 +" <'col-sm-6 col-md-6 col-lg-6'l>"
						 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
			"buttons":[
				{
		          	extend: 'colvis',
		          	collectionLayout: 'fixed two-column',
		          	text: 'Columnas Visibles',
        		},
      			{
		           	extend: 'pdfHtml5',
		           	text: 'PDF',
		           	exportOptions: {
		             	columns: [':visible' ],
		             	search: 'applied',
		             	order: 'applied',
           			},
		           	header: true,
		           	title: 'IARTE - Listado de Museos',
		           	orientation: 'landscape',
		           	customize: function (doc) {
		            	doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        doc.content.splice(0,1);
                        var now = new Date();
                        var jsDate = now.getDate()+'-'+ (now.getMonth()+1)+'-'+ now.getFullYear();
                        var logo = 'data:image/png;base64,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'
                        doc.pageMargins = [20,60,20,30];
                        doc.defaultStyle.fontSize = 7;
                        doc.styles.tableHeader.fontSize = 7;
                        doc['header']=(function() {
                            return {
                                columns: [
                                    {
                                        image: logo,
                                        width: 40
                                    },
                                    {
                                        alignment: 'left',
                                        italics: false,
                                        text: 'IARTE',
                                        fontSize: 14,
                                        margin: [10,0]
                                    },
                                    {
                                        alignment: 'right',
                                        fontSize: 14,
                                        text: ''
                                    }
                                ],
                                margin: 20
                            }
                        });
           	 			doc['styles'] = {
                			tableHeader: {
			                    bold:!0,
			                    fontSize:10,
			                    color:'white',
			                    fillColor:'#800000',
			                    alignment:'center'
                			}
            			};
                        doc['footer']=(function(page, pages) {
                            return {
                                columns: [
                                    {
                                        alignment: 'left',
                                        text: ['Fecha : ', { text: jsDate.toString() }]
                                    },
                                    {
                                        alignment: 'right',
                                        text: ['Página ', { text: page.toString() },    ' de ', { text: pages.toString() }]
                                    }
                                ],
                                margin: 20
                            }
                        });
                        var objLayout = {};
                        objLayout['hLineWidth'] = function(i) { return .5; };
                        objLayout['vLineWidth'] = function(i) { return .5; };
                        objLayout['hLineColor'] = function(i) { return '#aaa'; };
                        objLayout['vLineColor'] = function(i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function(i) { return 4; };
                        objLayout['paddingRight'] = function(i) { return 4; };
                        doc.content[0].layout = objLayout;
                	}
        		},
				{
					"text": "<i class='fa fa-plus'></i>",
					"titleAttr": "Agregar Museo",
					"className": "button.dt-button, div.dt-button, a.dt-button",
					"action": function(){
						agregar();
					}
				},
				{
					"text": "<i class='fa fa-refresh fa-spin fa-fw'></i>",
					"titleAttr": "Refrescar Datos",
					"className": "button.dt-button, div.dt-button, a.dt-button",
					"action": function(){
						listar();
					}
				}
			]
		});
		bloquear_museo("#tabla tbody", table);
		desbloquear_museo("#tabla tbody", table);
		eliminar_museo("#tabla tbody", table);
		asignar_usuarios("#tabla tbody", table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que limpia los campos del formulario de registro.
	*/
	function limpiar_datos_agregar(){
		$("#nombre").val("").focus();
		$("#fecha_fundacion").val("");
		$("#foto").val("");
		$("#direccion").val("");
		$("#telefono").val("");
		$("#correo").val("");
		$("#contacto").val("");
		trumbowyg_destroy('.historia');
		chosen_single_destroy('.select');
		chosen_multiple_destroy('.multiple');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que llama a  limpiar_datos_agregar, oculta la tabla y muestra
		el formulario de registro.
	*/
	function agregar(){
		limpiar_datos_agregar();
		cellPhoneFormat();
		chosen_single('.select')
		bootstrap_datepicker('.fecha');
		chosen_multiple('.multiple')
		trumbowyg('.historia');
		$("#cuadro1").slideDown("slow");
		$("#cuadro2").slideUp("slow");
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
		Funcion para tranformar los input para formato de numero de telefono.
	*/
	function cellPhoneFormat(){
		$(".telefono").mask("(999) 999-9999");
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
		Funcion que transformar los textarea en editores.
	*/
	function trumbowyg(textarea){
		$(textarea).trumbowyg({
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
		Function que se encarga de enviar los datos del formulario de registro y
		muestra lso alertas dependiendo del caso.
	*/
	function enviarFormulario(form, url, alert){
		$(form).submit(function(e){
			e.preventDefault();
			if(form=="#form_asignar"){
				url="admin/museos/"+document.getElementById('museo_id').value+"/asignar";
			}else if(form=="#form_actualizar_directivo"){
				url="admin/museosdirectivos/"+document.getElementById('id_directivo').value;
			}else if(form=="#form_actualizar_servicio"){
				url="admin/museosservicios/"+document.getElementById('id_servicio').value;
			}else if(form=="#form_imagen_editar"){
				url="admin/museosimagenes/"+document.getElementById('id_imagen_editar').value;
			}
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
				    	if(alert=='#alert'){
				    		if(errores.nombre!=undefined){
					    		for(var i=0; i<errores.nombre.length; i++){
						        	html+='<li>'+errores.nombre[i]+'</li>';
						        }
						    }
						    if(errores.direccion!=undefined){
						        for(var i=0; i<errores.direccion.length; i++){
						        	html+='<li>'+errores.direccion[i]+'</li>';
						        }
						    }
						    if(errores.tipos_museos!=undefined){
						        for(var i=0; i<errores.tipos_museos.length; i++){
						        	html+='<li>'+errores.tipos_museos[i]+'</li>';
						        }
						    }
						    if(errores.usuarios!=undefined){
						        for(var i=0; i<errores.usuarios.length; i++){
						        	html+='<li>'+errores.usuarios[i]+'</li>';
						        }
						    }
				    	}else if(alert=='#alert_directiva'){
				    		if(errores.nombre!=undefined){
					    		for(var i=0; i<errores.nombre.length; i++){
						        	html+='<li>'+errores.nombre[i]+'</li>';
						        }
						    }
						    if(errores.cargo_id!=undefined){
						        for(var i=0; i<errores.cargo_id.length; i++){
						        	html+='<li>'+errores.cargo_id[i]+'</li>';
						        }
						    }
				    	}else if(alert=='#alert_servicio'){
				    		if(errores.servicio!=undefined){
					    		for(var i=0; i<errores.servicio.length; i++){
						        	html+='<li>'+errores.servicio[i]+'</li>';
						        }
						    }
						    if(errores.descripcion!=undefined){
						        for(var i=0; i<errores.descripcion.length; i++){
						        	html+='<li>'+errores.descripcion[i]+'</li>';
						        }
						    }
				    	}else if(alert=='#alert_imagenes'){
				    		if(errores.titulo!=undefined){
					    		for(var i=0; i<errores.titulo.length; i++){
						        	html+='<li>'+errores.titulo[i]+'</li>';
						        }
						    }
				    	}
				    }
			        html+='</div>';
					$(alert).html(html);
			    },
				success: function(respuesta){
					$(alert).html("");
					$('input[type="submit"]').removeAttr('disabled');
					if(form=="#form_registrar"){
						limpiar_datos_agregar();
						listar("#cuadro1");
					}else if(form=="#form_asignar"){
						listar("#cuadro3");
					}else if(form=="#form_registrar_directivo"){
						listarDirectivo('#cuadro5', document.getElementById('id').value);
					}else if(form=="#form_actualizar_directivo"){
						listarDirectivo('#cuadro6', document.getElementById('id').value);
					}else if(form=="#form_registrar_servicio"){
						listarServicio('#cuadro8', document.getElementById('id').value);
					}else if(form=="#form_actualizar_servicio"){
						listarServicio('#cuadro9', document.getElementById('id').value);
					}else if(form=="#form_mapa"){
						$("#mapa").delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
						buscar(document.getElementById('id').value);
					}else if(form=="#form_imagen_editar"){
						var control=document.getElementById('control').value;
						if(control=='edit'){
							$("#imagen_editar").delay(200).queue(function(next) { $(this).modal('hide'); next(); }, 200);
							buscar(document.getElementById('id').value);
						}else if(control=='show'){
							$("#imagen_editar").delay(200).queue(function(next) { $(this).modal('hide'); next(); }, 200);
							cargarImagenes(0, 'nada', document.getElementById('take').value);
						}
					}
					if(alert=="#alert"){
			        	scrollToTop();
			        }
			        if(control=='show' && form=="#form_imagen_editar"){
			        	swal({
						  	title: respuesta.mensaje,
						  	type: respuesta.tipo,
						  	timer: 1500
						});
			        }else{
			        	html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
						html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						html+=respuesta.mensaje;
						html+="</div>";
						$(alert).html(html);
			        }
				}
			});
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de registro de museos, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function registrar_museo(){
		enviarFormulario("#form_registrar", 'admin/museos', "#alert");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de la asignacion de usuarios, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function asignar_usuarios_post(){
		enviarFormulario("#form_asignar", '', "#alert");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizacion de museos, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function actualizar_museo(){
		enviarFormulario("#form_actualizar", 'admin/museos/'+document.getElementById('id').value, "#alert");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de registro de directivos del museos, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function registrar_directivo(){
		enviarFormulario("#form_registrar_directivo", 'admin/museosdirectivos', "#alert_directiva");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizacion de directivos del museos, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function actualizar_directivo(){
		enviarFormulario("#form_actualizar_directivo", 'admin/museosdirectivos', "#alert_directiva");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de registro de servicios del museos, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function registrar_servicio(){
		enviarFormulario("#form_registrar_servicio", 'admin/museosservicios', "#alert_servicio");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizacion de servicios del museos, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function actualizar_servicio(){
		enviarFormulario("#form_actualizar_servicio", 'admin/museosservicios', "#alert_servicio");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizacion de contacto del museos, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function actualizar_contacto(){
		enviarFormulario("#form_contacto", 'admin/museos/'+document.getElementById('id').value+'/contacto', "#alert_contacto");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que realiza el envio del formulario de actualizacion de mapa del museos, 
		pasandole parametros a la funcion enviarFormulario.
	*/
	function actualizar_mapa(){
		enviarFormulario("#form_mapa", 'admin/museos/'+document.getElementById('id').value+'/mapa', "#alert_mapa");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el bloqueo, desbloqueo, elimnacion de los registros dependiendo
		del controlador pasado, recibiendo parametros de las respectivas funciones 
		de cada accion.
	*/
	function sweetAlertMuseos(accion, msj, url, tbody, table, controller, method){
		$(tbody).on("click", "span."+accion, function(){
			var data=table.row($(this).parents("tr")).data();
			if(method=='POST'){
				route=carpeta+'admin/'+controller+'/'+data.id+'/'+url;
			}else if(method=='DELETE'){
				route=carpeta+'admin/'+controller+'/'+data.id;
			}
			swal({
			  	title: "¿Esta seguro de "+accion+" el registro?",
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
					        if(controller=="museosdirectivos"){
					        	$("#alert_directiva").html(html);
					        }else if(controller=="museos"){
					        	$("#alert").html(html);
					        }else if(controller=="museosservicios"){
					        	$("#alert_servicio").html(html);
					        }
						},
						error: function (repuesta) {
							var errores=repuesta.responseJSON;
				        	html='<div class="alert alert-danger" role="alert">';
				        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						    html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
					        html+='</div>';
					        if(controller=="museosdirectivos"){
					        	$("#alert_directiva").html(html);
					        }else if(controller=="museos"){
					        	scrollToTop();
					        	$("#alert").html(html);
					        }else if(controller=="museosservicios"){
					        	$("#alert_servicio").html(html);
					        }
					    },
						success: function(respuesta){
							html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
							html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							html+=respuesta.mensaje;
							html+="</div>";
							if(controller=="museosdirectivos"){
								listarDirectivo('', document.getElementById('id').value);
					        	$("#alert_directiva").html(html);
					        }else if(controller=="museos"){
					        	listar();
								scrollToTop();
					        	$("#alert").html(html);
					        }else if(controller=="museosservicios"){
					        	listarServicio('', document.getElementById('id').value);
					        	$("#alert_servicio").html(html);
					        }
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
		Funcion para el bloqueo de museos.
	*/
	function bloquear_museo(tbody, table){
		sweetAlertMuseos('bloquear', 'Bloquear', 'lock', tbody, table, 'museos', 'POST');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el desbloqueo de museos.
	*/
	function desbloquear_museo(tbody, table){
		sweetAlertMuseos('desbloquear', 'Desbloquear', 'unlock', tbody, table, 'museos', 'POST');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para eliminar de museos.
	*/
	function eliminar_museo(tbody, table){
		sweetAlertMuseos('eliminar', 'Eliminar', '', tbody, table, 'museos', 'DELETE');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para mostrar el formulario de la asignacion de usuarios a los 
		museos y oculta la tabla de datos.
	*/
	function asignar_usuarios(tbody, table){
		$('#asignar').chosen('destroy');
		$(tbody).on("click", "span.asignar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			$("#asignar").val(data.asignados);
			$("#museo_id").val(data.id);
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
			url:carpeta+'admin/museos/'+id+'/search',
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
				buscar(id);
		    },
			success: function(respuesta){
				$('#alert').html("");

				$("#imagen_portada").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#portada'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
				$("#imagen_historia").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#historia'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
				$("#imagen_servicio").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#servicio'><i class='fa fa-file-image-o' aria-hidden='true'></i> Cambiar Imagen</button>");
				$("#latlog").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#mapa'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>");
				$("#imagen_create").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#imagen_registrar' id='crear'><i class='fa fa-plus' aria-hidden='true'></i> Agregar Imagen</button>");
				$('#bg_servicios').css("background-image", "url("+carpeta+"images/museos/"+respuesta.bg_servicios+")");
				$('#crear').click(function(){
					limpiar_datos_agregar_imagen();
					chosen_single('.select');
				});

				/* Mostrar datos de presentacion */
					$('#bg_portada').css("background-image", "url("+carpeta+"images/museos/"+respuesta.portada+")");
					$('#nombre_museo').html("<h2>"+respuesta.nombre+"</h2>");
				/* ---------------------------------- */

				/* Mostrar datos del museo */
					$('#bg_historia').css("background-image", "url("+carpeta+"images/museos/"+respuesta.bg_historia+")");
					$("#nombre").val(respuesta.nombre);
					$('#fundacion').datepicker("update", cambiarFormatoFecha(respuesta.fecha_fundacion));
					$('#historia_edit').val(respuesta.historia);
					$("#artistas_edit").val(respuesta.mis_artistas).trigger('chosen:updated');
					$("#estado").val(respuesta.estado_id).trigger('chosen:updated');
					$("#tipos_museos").val(respuesta.mis_tipos_museos).trigger('chosen:updated');
					$("#usuarios_edit").val(respuesta.mis_usuarios).trigger('chosen:updated');
					chosen_multiple('.multiple');
					chosen_single('.select');
					trumbowyg('.historia');
				/* ---------------------------------- */

				/* Mostrar Estadisticas */
					$("#imagenConteo").html(respuesta.imagenConteo);
					conteo("#imagenConteo");
					$("#artistasConteo").html(respuesta.artistasConteo);
					conteo("#artistasConteo");
					$("#visitas").html(respuesta.visitas);
					conteo("#visitas");
					$("#promedio").html(respuesta.promedioObrasVistas);
					conteo("#promedio");
				/* ---------------------------------- */

				/* Mostrar Iamgenes */
					$(".gallery-item").remove();
					var i=Object.keys(respuesta.museos_imagenes).length, x=0;
					if(i>9){
						i=i-1;
						x=i-9;
					}else{
						i=i-1;
						x=-1;
					}
					for(i; i>x; i--){
						var imagenes='<div class="gallery-item"><div class="grid-item-holder"><div class="box-item fl-wrap   popup-box">';
						imagenes+='<img  src="'+carpeta+"images/museos/"+respuesta.museos_imagenes[i].imagen+'" alt="" style="width: auto; max-height: 240px; height: 240px;"></div>';
						imagenes+='<div class="det-box fl-wrap"><h3>'+respuesta.museos_imagenes[i].titulo+'</h3>';
						imagenes+='<h5><a class="col-sm-1 col-sm-offset-5 botones btn-primary" data-toggle="tooltip" title="Editar" onClick="editarImagen('+respuesta.museos_imagenes[i].id+', \''+respuesta.museos_imagenes[i].titulo+'\', '+respuesta.museos_imagenes[i].artista_id+', \''+respuesta.museos_imagenes[i].reseña+'\')"><i class="fa fa-pencil-square-o"></i></a></h5>';
						imagenes+='<h5><a class="col-sm-1 botones btn-danger" data-toggle="tooltip" title="Eliminar" onClick="eliminarImagen('+respuesta.museos_imagenes[i].id+')"><i class="fa fa-trash"></i></a></h5></div></div></div>';
						$("#listar_imagenes").append(imagenes);
					}
				/* ---------------------------------- */

				/* Mostrar Datos de Contacto */
					cellPhoneFormat();
					$("#contacto").val(respuesta.contacto);
					$("#telefono").val(respuesta.telefono);
					$("#direccion").val(respuesta.direccion);
					$("#correo").val(respuesta.correo);
				/* ---------------------------------- */

				/* Mostrar Mapa */
					mapa(respuesta.latitud, respuesta.longitud, respuesta.nombre);
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
			if(form=="#form_portada" || form=="#form_historia" || form=="#form_servicio"){
				route=carpeta+'admin/museos/'+document.getElementById('id').value+'/'+url;
			}else if(form=="#form_imagen_registrar"){
				route=carpeta+'admin/museosimagenes';
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
					if(url=="habilidad"){
						$('#alert_habilidad').html(html);
					}else if(url=="servicio"){
						$('#alert_servicio').html(html);
					}else if(url=="create"){
						$('#alert_imagenes').html(html);
					}else{
						scrollToTop();
						$('#alert').html(html);
					}
				},
				error: function (repuesta) {
					$('input[type="submit"]').removeAttr('disabled');
					$(".pb").delay(1000).hide(500);
					$(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
					$(modal).delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
					document.getElementById(input).value="";
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else if(url=="habilidad" || url=="servicio"){
				    	for(var i=0; i<errores.foto.length; i++){
				        	html+='<li>'+errores.foto[i]+'</li>';
				        }
				    }else if(url=='#alert_servicio'){
			    		if(errores.foto!=undefined){
				    		for(var i=0; i<errores.foto.length; i++){
					        	html+='<li>'+errores.foto[i]+'</li>';
					        }
					    }
					    if(errores.titulo!=undefined){
					        for(var i=0; i<errores.titulo.length; i++){
					        	html+='<li>'+errores.titulo[i]+'</li>';
					        }
					    }
			    	}else{
				    	for(var i=0; i<errores.foto.length; i++){
				        	html+='<li>'+errores.foto[i]+'</li>';
				        }
				    }
			        html+='</div>';
					if(url=="habilidad"){
						$('#alert_habilidad').html(html);
					}else if(url=="servicio"){
						$('#alert_servicio').html(html);
					}else if(url=="create"){
						$('#alert_imagenes').html(html);
					}else{
						scrollToTop();
						$('#alert').html(html);
					}
			    },
				success:function(respuesta){
					$('input[type="submit"]').removeAttr('disabled');
					$(".pb").delay(1000).hide(500);
					$(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
					$(modal).delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
					document.getElementById(input).value="";
					var control=document.getElementById('control').value;
					if(control=='edit'){
						buscar(document.getElementById('id').value);
					}else if(control=='show'){
						cargarImagenes(0, 'nada', document.getElementById('take').value);
					}
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
					if(url=="habilidad"){
						$('#alert_habilidad').html(html);
					}else if(url=="servicio"){
						$('#alert_servicio').html(html);
					}else if(url=="create"){
						$("#titulo_registrar").val("");
						$('#alert_imagenes').html(html);
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

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para subir la foto para la imgen de la historia.
	*/
	function bg_historia(){
		subirImagen("#form_historia", "historia", "#historia", "foto_historia");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para subir la foto para la imgen de la historia.
	*/
	function bg_servicio(){
		subirImagen("#form_servicio", "servicio", "#servicio", "foto_servicio");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para guadar la foto para las imagenes de las obras exhibidas.
	*/
	function imagen_create(){
		subirImagen("#form_imagen_registrar", "create", "#imagen_registrar", "foto_imagen_registrar");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para editar la foto para las imagenes de las obras exhibidas.
	*/
	function imagen_edit(){
		enviarFormulario("#form_imagen_editar", 'admin/museosimagenes', "#alert_imagenes");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el desbloqueo de museos.
	*/
	function eliminarImagen(id){
		var control=document.getElementById('control').value;
		swal({
		  	title: "¿Esta seguro de eliminar la imagen?",
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
					url:carpeta+'admin/museosimagenes/'+id,
					headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
					type: 'DELETE',
					dataType: 'JSON',
					data:{
						id:id,
					},
					beforeSend: function(){
						if(control=='edit'){
				        	html='<div class="alert alert-info" role="alert">';
				        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				        	html+='<span>Realizando cambios, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
					        html+='</div>';
					        $("#alert_imagenes").html(html);
					    }
					},
					error: function (repuesta) {
						var errores=repuesta.responseJSON;
						if(control=='edit'){
				        	html='<div class="alert alert-danger" role="alert">';
				        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
						    html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
					        html+='</div>';
					        $("#alert_imagenes").html(html);
					    }else if(control=='show'){
					    	swal({
							  	title: 'Ha ocurrido un error, intentelo de nuevo.',
							  	type: 'error',
							  	timer: 1500
							});
					    }
				    },
					success: function(respuesta){
						if(control=='edit'){
							html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
							html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
							html+=respuesta.mensaje;
							html+="</div>";
					        $("#alert_imagenes").html(html);
					        buscar(document.getElementById('id').value);
					    }else if(control=='show'){
					    	cargarImagenes(0, 'nada', document.getElementById('take').value);
					    	swal({
							  	title: respuesta.mensaje,
							  	type: respuesta.tipo,
							  	timer: 1500
							});
					    }
					}
				});
		  	} else {
			    swal("Cancelado", "Proceso cancelado", "error");
		  	}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para mostrar los datos de las imagenes a editar.
	*/
	function editarImagen(id, titulo, artista, reseña){
		$("#imagen_editar").delay(100).queue(function(next) { $(this).modal('show'); next(); }, 100);
		$("#id_imagen_editar").val(id);
		$("#titulo_editar").val(titulo);
		$("#artista_editar").val(artista).trigger('chosen:updated');
		$("#reseña_editar").val(reseña);
		trumbowyg('.reseña');
		chosen_single('.select');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar los datos de la base de datos en la tabla, tambien
		esconde los formularios dependiendo del caso y muestra la tabla.
	*/
	function listarDirectivo(cuadro, id){
		$('#tablaDirectivos tbody').off('click');
		if(cuadro!=""){
			$(cuadro).slideUp("slow");
		}
		$("#cuadro4").slideDown("slow");
		var table=$("#tablaDirectivos").DataTable({
			"destroy":true,
			"stateSave": true,
			"serverSide":true,
			"ajax":{
				"method":"POST",
				"url":carpeta+"admin/museosdirectivos/"+id+"/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"nombre"},
				{"data":"foto",
					render : function(data, type, row) {
						return '<img src="'+carpeta+'images/museos/'+data+'" class="img-responsive img-circle" style="width: 30px;">';
	          		}
				},
				{"data":"cargo"	},
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
			"dom": "<'row'<'form-inline' <B>>>"
						 +"<'row' <'form-inline' <'col-sm-1 col-sm-offset-2 letra-blanco'f>>>"
						 +"<rt>"
						 +"<'row'<'form-inline'"
						 +" <'col-sm-6 col-md-6 col-lg-6'l>"
						 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
			"buttons":[
				{
					"text": "<i class='fa fa-plus'></i>",
					"titleAttr": "Agregar Directivo",
					"className": "btn btn-success",
					"action": function(){
						agregar_directivo();
					}
				},
				{
					"text": "<i class='fa fa-refresh fa-spin fa-fw'></i>",
					"titleAttr": "Refrescar Datos",
					"className": "btn btn-primary",
					"action": function(){
						listarDirectivo('', document.getElementById('id').value);
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
		editar_directivo("#tablaDirectivos tbody", table);
		eliminar_directivo("#tablaDirectivos tbody", table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que limpia los campos del formulario de registro.
	*/
	function limpiar_datos_agregar_imagen(){
		$("#foto_imagen_registrar").val("");
		$("#titulo_registrar").val("");
		$("#reseña_registrar").val("");
		chosen_single_destroy('.select');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que limpia los campos del formulario de registro.
	*/
	function limpiar_datos_agregar_directivo(){
		$("#nombre_registrar_directivo").val("").focus();
		$("#foto_directivo_registrar").val("");
		$("#museo_id_diretivo_registrar").val("");
		chosen_single_destroy('.select');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que llama a  limpiar_datos_agregar_directivo, oculta la tabla y muestra
		el formulario de registro.
	*/
	function agregar_directivo(){
		limpiar_datos_agregar_directivo();
		$("#museo_id_diretivo_registrar").val(document.getElementById('id').value);
		chosen_single('.select');
		$("#cuadro5").slideDown("slow");
		$("#cuadro4").slideUp("slow");
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
		Funcion que resetea los select simples en los formularios.
	*/
	function chosen_single_destroy(chosen){
		$(chosen).val([]).trigger('chosen:updated');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion muestra los datos de la red social en el formulario de actualizar, los
		datos los toma de la misma tabla, oculta la tabla y muestra el formulario
		de actualizar. 
	*/
	function editar_directivo(tbody, table){
		limpiar_datos_editar_directivo();
		$(tbody).on("click", "span.editar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			document.getElementById('id_directivo').value=data.id;
			document.getElementById("nombre_actualizar_directivo").value=data.nombre;
			$("#cargo_actualizar").val(data.cargo_id).trigger('chosen:updated');
			chosen_single('.select')
			$("#cuadro6").slideDown("slow");
			$("#cuadro4").slideUp("slow");
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que limpia los campos el formulario de actualizar.
	*/
	function limpiar_datos_editar_directivo(){
		$("#nombre_actualizar_directivo").val("");
		$("#foto_actualizar_directivo").val("");
		$("#id_directivo").val("");
		chosen_single_destroy('.select');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el desbloqueo de museos.
	*/
	function eliminar_directivo(tbody, table){
		sweetAlertMuseos('eliminar', 'Eliminar', '', tbody, table, 'museosdirectivos', 'DELETE');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar los datos de la base de datos en la tabla, tambien
		esconde los formularios dependiendo del caso y muestra la tabla.
	*/
	function listarServicio(cuadro, id){
		$('#tablaServicios tbody').off('click');
		if(cuadro!=""){
			$(cuadro).slideUp("slow");
		}
		$("#cuadro7").slideDown("slow");
		var table=$("#tablaServicios").DataTable({
			"destroy":true,
			"stateSave": true,
			"serverSide":true,
			"ajax":{
				"method":"POST",
				"url":carpeta+"admin/museosservicios/"+id+"/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"servicio"},
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
			"dom": "<'row'<'form-inline' <B>>>"
						 +"<'row' <'form-inline' <'col-sm-1 col-sm-offset-3'f>>>"
						 +"<rt>"
						 +"<'row'<'form-inline'"
						 +" <'col-sm-6 col-md-6 col-lg-6'l>"
						 +"<'col-sm-6 col-md-6 col-lg-6'p>>>",
			"buttons":[
				{
					"text": "<i class='fa fa-plus'></i>",
					"titleAttr": "Agregar Servicio",
					"className": "btn btn-success",
					"action": function(){
						agregar_servicio();
					}
				},
				{
					"text": "<i class='fa fa-refresh fa-spin fa-fw'></i>",
					"titleAttr": "Refrescar Datos",
					"className": "btn btn-primary",
					"action": function(){
						listarServicio('', document.getElementById('id').value);
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
		editar_servicio("#tablaServicios tbody", table);
		eliminar_servicio("#tablaServicios tbody", table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que limpia los campos del formulario de registro.
	*/
	function limpiar_datos_agregar_servicio(){
		$("#servicio_registrar").val("").focus();
		$("#descripcion_registrar").val("");
		$("#museo_id_servicio_registrar").val("");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que llama a  limpiar_datos_agregar_servicio, oculta la tabla y muestra
		el formulario de registro.
	*/
	function agregar_servicio(){
		limpiar_datos_agregar_servicio();
		$("#museo_id_servicio_registrar").val(document.getElementById('id').value);
		$("#cuadro8").slideDown("slow");
		$("#cuadro7").slideUp("slow");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion muestra los datos de la red social en el formulario de actualizar, los
		datos los toma de la misma tabla, oculta la tabla y muestra el formulario
		de actualizar. 
	*/
	function editar_servicio(tbody, table){
		limpiar_datos_editar_servicio();
		$(tbody).on("click", "span.editar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			document.getElementById('id_servicio').value=data.id;
			document.getElementById("servicio_actualizar").value=data.servicio;
			document.getElementById("descripcion_actualizar").value=data.descripcion;
			$("#cuadro9").slideDown("slow");
			$("#cuadro7").slideUp("slow");
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que limpia los campos el formulario de actualizar.
	*/
	function limpiar_datos_editar_servicio(){
		$("#servicio_actualizar").val("").focus();
		$("#descripcion_actualizar").val("");
		$("#id_servicio").val("");
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el desbloqueo de museos.
	*/
	function eliminar_servicio(tbody, table){
		sweetAlertMuseos('eliminar', 'Eliminar', '', tbody, table, 'museosservicios', 'DELETE');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para el mapa.
	*/
	function mapa(latitud, longitud, museo){
		if(latitud==null && longitud==null){
			latitud=10.501493;
			longitud=-66.900480;
		}
		$("#map-canvas").gmap3({
	        action: "init",
	        marker: {
	            values: [ {
	                latLng: [ latitud, longitud ],
	                data: museo,
	                options: {
	                    icon: carpeta+"images/marker.png"
	                }
	            } ],
	            options: {
	                draggable: false
	            },
	            events: {
	                mouseover: function(a, b, c) {
	                    var d = $(this).gmap3("get"), e = $(this).gmap3({
	                        get: {
	                            name: "infowindow"
	                        }
	                    });
	                    if (e) {
	                        e.open(d, a);
	                        e.setContent(c.data);
	                    } else $(this).gmap3({
	                        infowindow: {
	                            anchor: a,
	                            options: {
	                                content: c.data
	                            }
	                        }
	                    });
	                },
	                mouseout: function() {
	                    var a = $(this).gmap3({
	                        get: {
	                            name: "infowindow"
	                        }
	                    });
	                    if (a) a.close();
	                }
	            }
	        },
	        map: {
	            options: {
	                zoom: 14,
	                zoomControl: true,
	                mapTypeControl: true,
	                scaleControl: true,
	                scrollwheel: false,
	                streetViewControl: true,
	                draggable: true,
	                styles:[{featureType:"all",elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#000000"},{lightness:40}]},{featureType:"all",elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#000000"},{lightness:16}]},{featureType:"all",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:17},{weight:1.2}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#000000"},{lightness:20}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#000000"},{lightness:21}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#000000"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#000000"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#000000"},{lightness:16}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#000000"},{lightness:19}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#000000"},{lightness:17}]},{featureType:"water",elementType:"geometry.fill",stylers:[{saturation:"-100"},{lightness:"-100"},{gamma:"0.00"}]}]
	            }
	        }
	    });
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion para mostrar carga de las imagenes.
	*/
	function cargarImagenes(empezar, elemento, take){
		$("#imagen_create").html("<button class='btn btn-vinotinto' data-toggle='modal' data-target='#imagen_registrar' id='crear'><i class='fa fa-plus' aria-hidden='true'></i> Agregar Imagen</button>");
		$('#crear').click(function(){
			limpiar_datos_agregar_imagen();
			chosen_single('.select');
		});
		var nuevoComienzo=empezar+9;
		var button = document.querySelector('#loadButton');
		$.ajax({
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type: 'POST',
			url: carpeta+'admin/museosimagenes/listing',
			data:{
				id_museo: document.getElementById('id').value,
				buscar: empezar,
				take: take
			},
			beforeSend: function(){
				button.classList.add('load');
				button.classList.add('btn');
				button.classList.add('disabled');
			},
			error: function(){
				cargarImagenes(empezar, elemento, take);
			},
			success: function(data){
				button.classList.remove('load');
				button.classList.remove('btn');
				button.classList.remove('disabled');
				if(elemento=="nada"){
					$(".gallery-item").remove();
					document.getElementById('loadButton').setAttribute('onclick', 'cargarImagenes('+take+', this, 9)');
				}else{
					document.getElementById('take').value=nuevoComienzo;
					elemento.setAttribute('onclick', 'cargarImagenes('+nuevoComienzo+', this, 9)');
				}
				for(var i=0; i<Object.keys(data).length; i++){
					var imagenes='<div class="gallery-item"><div class="grid-item-holder"><div class="box-item fl-wrap   popup-box">';
					imagenes+='<img  src="'+carpeta+"images/museos/"+data[i].imagen+'" alt="" style="max-width: 500px; max-height: 240px; height: 240px;"></div>';
					imagenes+='<div class="det-box fl-wrap"><h3>'+data[i].titulo+'</h3>';
					imagenes+='<h5><a class="col-sm-1 col-sm-offset-5 botones btn-primary" data-toggle="tooltip" title="Editar" onClick="editarImagen('+data[i].id+', \''+data[i].titulo+'\', '+data[i].artista_id+', \''+data[i].reseña+'\')"><i class="fa fa-pencil-square-o"></i></a></h5>';
					imagenes+='<h5><a class="col-sm-1 botones btn-danger" data-toggle="tooltip" title="Eliminar" onClick="eliminarImagen('+data[i].id+')"><i class="fa fa-trash"></i></a></h5></div></div></div>';
					$("#listar_imagenes").append(imagenes);
				}
			}
		});
	}
/* ------------------------------------------------------------------------------- */