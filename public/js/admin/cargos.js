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
		var table=$("#tabla").DataTable({
			"destroy":true,
			"stateSave": true,
			"serverSide":true,
			"ajax":{
				"method":"POST",
				"url":carpeta+"admin/cargos/listing",
				"data":{ _token: document.getElementById('token').value}
			},
			"columns":[
				{"data":"cargo"},
				{"data":"created_at"},
				{"data":"updated_at"},
				{"defaultContent": "<span class='editar botones btn-primary' data-toggle='tooltip' title='Editar'><i class='fa fa-pencil-square-o'></i></span> <span class='eliminar botones btn-danger' data-toggle='tooltip' title='Eliminar'><i class='fa fa-trash-o'></i></span>"}
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
					"titleAttr": "Agregar Cargo",
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
		eliminar("#tabla tbody", table);
	}
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
	/*
		Funcion que limpia los campos del formulario de registro.
	*/
	function limpiar_datos_agregar(){
		$("#cargo_registrar").val("").focus();
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
			$('input[type="submit"]').attr('disabled','disabled');
			$.ajax({
				url:carpeta+'admin/cargos',
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
					$('input[type="submit"]').removeAttr('disabled');
					scrollToTop();
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
				    	for(var i=0; i<errores.cargo.length; i++){
				        	html+='<li>'+errores.cargo[i]+'</li>';
				        }
				    }
			        html+='</div>';
					$("#alert").html(html);
			    },
				success: function(respuesta){
					$('input[type="submit"]').removeAttr('disabled');
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
			document.getElementById("id_actualizar").value=data.id;
			document.getElementById("cargo_actualizar").value=data.cargo;
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
		$("#cargo_actualizar").val("").focus();
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
			$('input[type="submit"]').attr('disabled','disabled');
			$.ajax({
				url:carpeta+'admin/cargos/'+document.getElementById('id_actualizar').value,
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
					$('input[type="submit"]').removeAttr('disabled');
					scrollToTop();
					var errores=repuesta.responseJSON;
		        	html='<div class="alert alert-danger" role="alert">';
		        	html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
			        if(typeof errores=='undefined'){
				        html+='<span><h3>Ha ocurrido un error, intentelo de nuevo.</span>';
				    }else{
				    	for(var i=0; i<errores.cargo.length; i++){
				        	html+='<li>'+errores.cargo[i]+'</li>';
				        }
				    }
			        html+='</div>';
					$("#alert").html(html);
			    },
				success: function(respuesta){
					$('input[type="submit"]').removeAttr('disabled');
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
	function eliminar(tbody, table){
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
			    	scrollToTop();
			    	$.ajax({
						url:carpeta+'admin/cargos/'+data.id,
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