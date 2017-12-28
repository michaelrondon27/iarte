$(document).ready(function(){
	$("#solicitudes").attr('class', 'active');
	var control=document.getElementById('control').value;
	if(control=="solicitante"){
		verificarSolicitudDelUsuario();
		registrar();
		actualizar();
		imagenGuardar();
	}else if(control=="institucion"){
		listar();
	}
});

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

function create(){
	bootstrap_datepicker('.fecha');
	cellPhoneFormat();
	chosen_single('.select');
	chosen_multiple('.multiple');
}

function cellPhoneFormat(){
	$(".telefono").mask("(999) 999-9999");
}

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

function verificarSolicitudDelUsuario(){
	$.ajax({
		type:'POST',
		url: carpeta+"admin/solicitudes/verificarSolicitudDelUsuario",
		headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
		data:{
			'id': document.getElementById('id_user').value
		},
		dataType:'JSON',
		error: function (repuesta) {
			verificarSolicitudDelUsuario();
	    },
		success:function(respuesta){
			if(respuesta.conteo==0){
				$("#cuadro1").show();
				$("#estatus").html("En proceso");
				create();
			}else{
				$("#cuadro2").show();
				$("#estatus").html(respuesta.status.status);
				datosEditar(respuesta.solicitud, respuesta.mis_disciplinas);
				listarImagenes(respuesta.imagenes, document.getElementById('id_editar').value, respuesta.status.id);
			}
		}
	});
}

function chosen_multiple(chosen){
	$(chosen).chosen({
		width:"100%",
		placeholder_text_multiple: "Seleccione",
		search_contains: true,
		no_results_text: "No se encontraron resultados para: "
	});
}

function enviarFormulario(form, url, alert){
	$(form).submit(function(e){
		e.preventDefault();
		if(form=="#form_actualizar"){
			url="admin/solicitudes/"+document.getElementById('id_editar').value;
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
			    		if(errores.nombres!=undefined){
				    		for(var i=0; i<errores.nombres.length; i++){
					        	html+='<li>'+errores.nombres[i]+'</li>';
					        }
					    }
					    if(errores.apellidos!=undefined){
					        for(var i=0; i<errores.apellidos.length; i++){
					        	html+='<li>'+errores.apellidos[i]+'</li>';
					        }
					    }
					    if(errores.cedula!=undefined){
					        for(var i=0; i<errores.cedula.length; i++){
					        	html+='<li>'+errores.cedula[i]+'</li>';
					        }
					    }
					    if(errores.fecha_nacimiento!=undefined){
					        for(var i=0; i<errores.fecha_nacimiento.length; i++){
					        	html+='<li>'+errores.fecha_nacimiento[i]+'</li>';
					        }
					    }
			    		if(errores.correo!=undefined){
				    		for(var i=0; i<errores.correo.length; i++){
					        	html+='<li>'+errores.correo[i]+'</li>';
					        }
					    }
					    if(errores.direccion!=undefined){
					        for(var i=0; i<errores.direccion.length; i++){
					        	html+='<li>'+errores.direccion[i]+'</li>';
					        }
					    }
					    if(errores.telefono!=undefined){
					        for(var i=0; i<errores.telefono.length; i++){
					        	html+='<li>'+errores.telefono[i]+'</li>';
					        }
					    }
					    if(errores.estado_id!=undefined){
					        for(var i=0; i<errores.estado_id.length; i++){
					        	html+='<li>'+errores.estado_id[i]+'</li>';
					        }
					    }
					    if(errores.estado_civil_id!=undefined){
					        for(var i=0; i<errores.estado_civil_id.length; i++){
					        	html+='<li>'+errores.estado_civil_id[i]+'</li>';
					        }
					    }
					    if(errores.grado_instruccion_id!=undefined){
					        for(var i=0; i<errores.grado_instruccion_id.length; i++){
					        	html+='<li>'+errores.grado_instruccion_id[i]+'</li>';
					        }
					    }
			    	}
			    }
		        html+='</div>';
				$(alert).html(html);
		    },
			success: function(respuesta){
				$('input[type="submit"]').removeAttr('disabled');
				html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
				html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				html+=respuesta.mensaje;
				html+="</div>";
				$(alert).html(html);
				$("#cuadro1").hide();
				$("#cuadro2").show();
				datosEditar(respuesta.solicitud, respuesta.mis_disciplinas);
			}
		});
	});
}

function registrar(){
	enviarFormulario("#form_registrar", 'admin/solicitudes', "#alert");
}

function datosEditar(data, mis_disciplinas){
	document.getElementById('id_editar').value=data[0].id;
	document.getElementById('nombres_editar').value=data[0].nombres;
	document.getElementById('apellidos_editar').value=data[0].apellidos;
	document.getElementById('cedula_editar').value=data[0].cedula;
	document.getElementById('nacimiento_editar').value=cambiarFormatoFecha(data[0].fecha_nacimiento);
	document.getElementById('correo_editar').value=data[0].correo;
	document.getElementById('direccion_editar').value=data[0].direccion;
	document.getElementById('telefono_editar').value=data[0].telefono;
	$("#genero_editar").val(data[0].genero_id).trigger('chosen:updated');
	$("#estado_editar").val(data[0].estado_id).trigger('chosen:updated');
	$("#estado_civil_editar").val(data[0].estado_civil_id).trigger('chosen:updated');
	$("#grado_instruccion_editar").val(data[0].grado_instruccion_id).trigger('chosen:updated');
	checkRadio(data[0].pueblo_indigena, 'pueblo_indigena');
	checkRadio(data[0].idiomas, 'idiomas');
	document.getElementById('cursos_editar').value=data[0].cursos;
	checkRadio(data[0].relacionados_actividad_artistica, 'relacionados_actividad_artistica');
	document.getElementById('tiempo_editar').value=data[0].tiempo_actividad_artistica;
	checkRadio(data[0].premio, 'premio');
	$("#tipo_premio_editar").val(data[0].tipo_premio_id).trigger('chosen:updated');
	$("#disciplinas_editar").val(mis_disciplinas).trigger('chosen:updated');
	checkRadio(data[0].grupo, 'grupo');
	document.getElementById('tipo_grupo_editar').value=data[0].tipo_grupo;
	checkRadio(data[0].apoyo_economico, 'apoyo_economico');
	checkRadio(data[0].empleo, 'empleo');
	document.getElementById('sueldo_editar').value=data[0].sueldo;
	checkRadio(data[0].ingresos_artisticos, 'ingresos_artisticos');
	checkRadio(data[0].jubilado, 'jubilado');
	checkRadio(data[0].pensionado, 'pensionado');
	checkRadio(data[0].subsidio, 'subsidio');
	bootstrap_datepicker('.fecha');
	cellPhoneFormat();
	chosen_single('.select');
	chosen_multiple('.multiple');
}

function checkRadio(data, radio){
	if(data=="Sí"){
		document.getElementById(radio+"_si").checked=true;
	}else if(data=='No'){
		document.getElementById(radio+"_no").checked=true;
	}
}

function actualizar(){
	enviarFormulario("#form_actualizar", 'admin/solicitudes', "#alert");
}

function subirImagen(form, modal, input){
	$(form).submit(function(e){
		e.preventDefault();
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
			url:carpeta+'admin/solicitudes/'+document.getElementById('id_editar').value+'/imagenStore',
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
				$('#alert_imagen').html(html);
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
			    }else{
			    	for(var i=0; i<errores.imagen.length; i++){
			        	html+='<li>'+errores.imagen[i]+'</li>';
			        }
			    }
		        html+='</div>';
				$('#alert_imagen').html(html);
		    },
			success:function(respuesta){
				$('input[type="submit"]').removeAttr('disabled');
				$(".pb").delay(1000).hide(500);
				$(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
				$(modal).delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
				document.getElementById(input).value="";
				html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
				html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				html+=respuesta.mensaje;
				html+="</div>";
				$('#alert_imagen').html(html);
				listarImagenes(respuesta.imagenes, document.getElementById('id_editar').value, respuesta.solicitud.status_id);
			}
		});
	});
}

function imagenGuardar(){
	subirImagen("#form_imagen", "#agregar", "imagen");
}

function listarImagenes(data, id, status){
	$(".gallery-item").remove();
	var i=Object.keys(data).length;
	if(i>=4 && (status==9 || status==11)){
		$("#enviarSolicitud").html("<button class='btn btn-vinotinto' onclick='enviarSolicitud("+id+")'>Enviar Solicitud</button>");
	}
	data.forEach(function(imagen, index){
		var imagenes='<div class="gallery-item"><div class="grid-item-holder"><div class="box-item fl-wrap   popup-box">';
		imagenes+='<img  src="'+carpeta+"images/usuarios/"+imagen.imagen+'" alt="" style="width: auto; max-height: 240px; height: 240px;"></div>';
		imagenes+='<div class="det-box fl-wrap"><h5><a class="col-sm-1 col-sm-offset-6 botones btn-danger" data-toggle="tooltip" title="Eliminar" onClick="eliminarImagen('+imagen.id+')"><i class="fa fa-trash"></i></a></h5></div></div></div>';
		$("#listar_imagenes").append(imagenes);
	});
}

function eliminarImagen(id){
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
				url:carpeta+'admin/solicitudes/'+id+'/imagenEliminar',
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				type: 'POST',
				dataType: 'JSON',
				beforeSend: function(){
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Realizando cambios, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
			        $("#alert_imagen").html(html);
				},
				error: function (repuesta) {
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
				    html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
			        html+='</div>';
			        $("#alert_imagen").html(html);
			    },
				success: function(respuesta){
					html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
					html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
					html+=respuesta.mensaje;
					html+="</div>";
			        $("#alert_imagen").html(html);
			        listarImagenes(respuesta.imagenes, document.getElementById('id_editar').value, respuesta.solicitud.status_id);
				}
			});
	  	} else {
		    swal("Cancelado", "Proceso cancelado", "error");
	  	}
	});
}

function enviarSolicitud(id){
	swal({
	  	title: "¿Esta seguro de enviar la solicitud?",
	  	type: "warning",
	  	showCancelButton: true,
	 	confirmButtonColor: "#DD6B55",
	  	confirmButtonText: "Si, Enviar!",
	  	cancelButtonText: "No, Cancelar!",
	  	closeOnConfirm: false,
	  	closeOnCancel: false
	},
	function(isConfirm){
	  	if (isConfirm) {
	    	swal.close();
	    	$.ajax({
				url:carpeta+'admin/solicitudes/'+id+'/enviarSolicitud',
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				type: 'POST',
				dataType: 'JSON',
				data:{
					id:id,
				},
				beforeSend: function(){
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Enviando, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
			        $("#alert").html(html);
				},
				error: function (repuesta) {
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
			        $("#alert").html(html);
			        $("#estatus").html(respuesta.status.status);
			        $("#enviarSolicitud").html('');
				}
			});
	  	} else {
		    swal("Cancelado", "Proceso cancelado", "error");
	  	}
	});
}

function listar(){
	var table=$("#tabla").DataTable({
		"destroy":true,
		"stateSave": true,
		"serverSide":true,
		"ajax":{
			"method":"POST",
			"url":carpeta+"admin/solicitudes/listing",
			"data":{ _token: document.getElementById('token').value}
		},
		"columns":[
			{"data":"solicitante"},
			{"data":"cedula"},
			{"data":"correo"},
			{"data":"telefono"},
			{"data":"enviado"},
			{"data": null,
				render : function(data, type, row) {
					return "<a href='"+carpeta+"admin/solicitudes/"+data.id+"' class='botones btn-info' data-toggle='tooltip' title='Ver datos'><i class='fa fa-search-plus'></i></a>";
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
				"text": "<i class='fa fa-refresh fa-spin fa-fw'></i>",
				"titleAttr": "Refrescar Datos",
				"className": "button.dt-button, div.dt-button, a.dt-button",
				"action": function(){
					listar();
				}
			}
		]
	});
}

function calificar(id, tipo){
	swal({
	  	title: "¿Esta seguro de "+tipo+" al solicitante?",
	  	type: "warning",
	  	showCancelButton: true,
	 	confirmButtonColor: "#DD6B55",
	  	confirmButtonText: "Si, "+tipo+"!",
	  	cancelButtonText: "No, Cancelar!",
	  	closeOnConfirm: false,
	  	closeOnCancel: false
	},
	function(isConfirm){
	  	if (isConfirm) {
	    	swal.close();
	    	$.ajax({
				url:carpeta+'admin/solicitudes/'+tipo,
				headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
				type: 'POST',
				dataType: 'JSON',
				data:{
					'id': id
				},
				beforeSend: function(){
		        	html='<div class="alert alert-info" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		        	html+='<span>Realizando cambios, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
			        html+='</div>';
			        $("#alert").html(html);
				},
				error: function (repuesta) {
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
			        $("#alert").html(html);
				}
			});
	  	} else {
		    swal("Cancelado", "Proceso cancelado", "error");
	  	}
	});
}