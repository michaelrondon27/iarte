$(document).ready(function(){
	password(document.getElementById('id').value);
	buscar(document.getElementById('id').value);
    $("#cuentas").attr('class', 'active');
    subirImagen();
});

function password(id){
	formularioRegistrar('#form_password', 'admin/cuentas/password/'+id, ['password', 'password_confirmation'], "");
}

function limpiarPassword(){
	document.getElementById('password').value="";
	document.getElementById('password_confirmation').value="";
}

function buscar(id){
    $.ajax({
        url:carpeta+'admin/cuentas/buscar/'+id,
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type: 'POST',
		dataType: 'JSON',
		data:{
			id:id,
		},
        error: function (repuesta) {
            buscar(id);
        },
        success: function(respuesta){
            $("#nombre").html('Nombre: '+respuesta.name);
            $("#correo").html('Correo: '+respuesta.email);
            var perfiles="Perfil: ";
            respuesta.perfiles.forEach(function(perfil, index){
                perfiles+='<span class="badge">'+perfil.perfil+'<span>';
            });
            $("#perfil").html(perfiles);
            $("#estatus").html('Estatus: <span class="badge">'+respuesta.status.status+'<span>');
            $("#foto").html('<img src="'+carpeta+'images/usuarios/'+respuesta.foto+'" class="respimg" alt="" style="max-height: 260px; max-width: 200px;">');
        }
    });
}

function mostrarErrores(errores, campos){
    var html="";
    campos.forEach(function(campo){
        if(Array.isArray(errores[campo])){
            for(var i=0; i<errores[campo].length; i++){
                html+="<li>"+errores[campo][i]+"</li>";
                console.log(errores[campo][i]);
            }
        }
    });
    return html;
}

function formularioRegistrar(form, url, campos, cuadro){
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
                mensajes('info', 'Guardando datos, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
            },
            error: function (repuesta) {
                $('input[type="submit"]').removeAttr('disabled');
                var errores=repuesta.responseJSON;
                if(typeof errores=='undefined'){
                    mensajes('danger', 'Ha ocurrido un error, intentelo de nuevo.');
                }else{
                    var html=mostrarErrores(errores, campos);
                    mensajes('danger', html);
                }
            },
            success: function(respuesta){
                $('input[type="submit"]').removeAttr('disabled');
                if(cuadro!=""){
                    listar(cuadro);
                }else{
                    limpiarPassword();
                }
                mensajes(respuesta.tipo, respuesta.mensaje);
            }
        });
    });
}

function mensajes(type, mensaje){
    var msj='<div class="alert alert-'+type+'">';
    msj+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    msj+='<span>'+mensaje+'</span></div>';
    return $('#alert').html(msj);;
}

function subirImagen(){
    $("#form_foto").submit(function(e){
        e.preventDefault();
        var formData=new FormData($("#form_foto")[0]);
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
            url:carpeta+'admin/cuentas/imagen/'+document.getElementById('id').value,
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
                $('#alert').html(html);
            },
            error: function (repuesta) {
                $('input[type="submit"]').removeAttr('disabled');
                $(".pb").delay(1000).hide(500);
                $(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
                $('#images').delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
                document.getElementById('foto_subida').value="";
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
                $('#alert').html(html);
            },
            success:function(respuesta){
                $('input[type="submit"]').removeAttr('disabled');
                $(".pb").delay(1000).hide(500);
                $(".progressBar").delay(2000).queue(function(next) { $(this).attr("aria-valuenow", 0).css('width', 0+'%').text(); next(); });
                $('#images').delay(1000).queue(function(next) { $(this).modal('hide'); next(); }, 500);
                document.getElementById('foto_subida').value="";
                buscar(document.getElementById('id').value);
                html='<div class="alert alert-'+respuesta.tipo+' alert-important" role="alert">';
                html+='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                html+=respuesta.mensaje;
                html+="</div>";
                $('#alert').html(html);
            }
        });
    });
}