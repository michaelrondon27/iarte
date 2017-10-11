/* ------------------------------------------------------------------------------- */
	/* 
		Funcion para cargar las funciones cuando la pagina este cargada por completo 
	*/
	$(document).ready(function(){
		$("#configuracion").attr('class', 'active');
		listar();
		registrar();
		actualizar();
	});
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que transforma el select del formulario de registrar.
	*/
	function chosen_registrar(){
		$('#icon_id_registrar').chosen({
			placeholder_text_single: "Seleccione",
			search_contains: true,
			default_no_result_text: 'No se encontró esta red social',
			allow_single_deselect: true
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que transforma el select del formulario de actualizar.
	*/
function chosen_actualizar(){
	$('#icon_id_actualizar').chosen({
		placeholder_text_single: "Seleccione",
		search_contains: true,
		default_no_result_text: 'No se encontró esta red social',
		allow_single_deselect: true
	});
}
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
		Funcion que oculta el formulario de actualizar dandole click al boton de
		listado y muestra la tabla con los datos.
	*/
	$("#listado_actualizar").click(function(){
		listar("#cuadro2");
		limpiar_datos_editar();
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
		$("#cuadro3").slideDown("slow");
		$.ajax({
			url:carpeta+'admin/redessociales/listing',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type:'POST',
			dataType:'JSON',
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
				html="<table class='table table-bordered table-hover' id='tabla'><thead><tr>"
				html+="<th>Red Social</th>";
				html+="<th>Icono</th>";
				html+="<th>Creado</th>";
				html+="<th>Actualizado</th>";
				html+="<th>Acción</th>";
				html+="</tr></thead><tbody>";
				$.each(respuesta, function(key, value){
					html+="<tr><td>"+value.red_social+"</td>";
					html+="<td>"+value.icon.icon+"</td>";
					html+="<td>"+cambiarFormatoFecha(value.created_at)+"</td>";
					html+="<td>"+cambiarFormatoFecha(value.updated_at)+"</td>";
					html+="<td><span class='editar botones btn-primary' data-toggle='tooltip' title='Editar' onClick='editar("+value.id+")'><i class='fa fa-pencil-square-o'></i></span>"
					html+=" <span class='eliminar botones btn-danger' data-toggle='tooltip' title='Eliminar' onClick='eliminar("+value.id+")'><i class='fa fa-trash-o'></i></span></td>";
					html+="</td></tr>";
				});
				html+="</tbody></table><script>$('#tabla').DataTable({stateSave: true, destroy:true, language: idioma_espanol});</script>";
				$('#example').html(html);
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que limpia los campos del formulario de registro.
	*/
	function limpiar_datos_agregar(){
		$("#red_social_registrar").val("").focus();
		$("#icon_id_registrar").val([]).trigger('chosen:updated');
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que llama a  limpiar_datos_agregar, oculta la tabla y muestra
		el formulario de registro.
	*/
	function agregar(){
		limpiar_datos_agregar();
		$("#cuadro1").slideDown("slow");
		$("#cuadro3").slideUp("slow");
		chosen_registrar();
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Function que se encarga de enviar los datos del formulario de registro y
		muestra lso alertas dependiendo del caso.
	*/
	function registrar(){
		$("#form_registrar").submit(function(e){
			e.preventDefault();
			var form=$(this).serialize();
			$.ajax({
				url:carpeta+'admin/redessociales',
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
				    	for(var i=0; i<errores.red_social.length; i++){
				        	html+='<li>'+errores.red_social[i]+'</li>';
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
		datos los busca en la base de datos, oculta la tabla y muestra el formulario
		de actualizar. 
	*/
	function editar(id){
		limpiar_datos_editar();
		$.ajax({
			url:carpeta+'admin/redessociales/'+id+'/edit',
			headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
			type:'GET',
			dataType:'JSON',
			data:{
				id:id
			},
			success: function(respuesta){
				document.getElementById("id_actualizar").value=respuesta.id;
				document.getElementById("red_social_actualizar").value=respuesta.red_social;
				document.getElementById("icon_id_actualizar").value=respuesta.icon_id;
				$("#cuadro2").slideDown("slow");
				$("#cuadro3").slideUp("slow");
				chosen_actualizar();
			}
		});
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/* 
		Funcion que limpia los campos el formulario de actualizar.
	*/
	function limpiar_datos_editar(){
		document.getElementById("id_actualizar").value="";
		document.getElementById("red_social_actualizar").value="";
		$("#icon_id_actualizar").chosen("destroy");
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
				url:carpeta+'admin/redessociales/'+document.getElementById('id_actualizar').value,
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
				    	for(var i=0; i<errores.red_social.length; i++){
				        	html+='<li>'+errores.red_social[i]+'</li>';
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
		Funcion que se encarga eliminar un registro seleccionado.
	*/
	function eliminar(id){
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
		    	scrollToTop();
		    	$.ajax({
					url:carpeta+'admin/redessociales/'+id,
					headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
					type: 'DELETE',
					dataType: 'JSON',
					data:{
						id:id,
					},
					beforeSend: function(){
			        	html='<div class="alert alert-info" role="alert">';
			        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        	html+='<span>Eliminando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>'
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
					    	for(var i=0; i<errores.red_social.length; i++){
					        	html+='<li>'+errores.red_social[i]+'</li>';
					        }
					    }
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
	}
/* ------------------------------------------------------------------------------- */