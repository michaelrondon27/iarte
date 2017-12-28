/* ------------------------------------------------------------------------------- */
    /*
        Variable global de la direccion del sistema.
    */
    var carpeta="http://localhost/iarte/public/";
/* ------------------------------------------------------------------------------- */

function Item(contenido, url, afirmativo, respuesta){
    swal({
        title: contenido,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: afirmativo,
        cancelButtonText: "No, Cancelar!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm){
        if (isConfirm) {
            window.location=url;
        } else {
            swal("Cancelado", respuesta, "error");
        }
    });
}

/* ------------------------------------------------------------------------------- */
    /*
        Function que deshabilita las taclas en un input, se utiliza usando el
        evento onKeyUp.
    */
    function deshabilitarteclas(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numeros="";
        especiales="";//los numeros de esta linea son especiales y es para las flechas
        teclado_escpecial=false;
        for(var i in especiales){
            if (key==especiales[i]) {
                teclado_escpecial=true;
            }
        }
        if (numeros.indexOf(teclado)==-1 && !teclado_escpecial) {
            return false;
        }
    }
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
    /*
        Funcion que se encarga de aceptar solo numeros en un input, se utiliza usando el
        evento onKeyUp.
    */
    function solonumeros(e){
    	key=e.keyCode || e.which;
    	teclado=String.fromCharCode(key);
    	numeros="1234567890.-";
    	especiales="8-9-17-37-38-46";//los numeros de esta linea son especiales y es para las flechass
    	teclado_escpecial=false;
    	for(var i in especiales){
    	    if (key==especiales[i]) {
    	        teclado_escpecial=true;
    	    }
    	}
    	if (numeros.indexOf(teclado)==-1 && !teclado_escpecial) {
    	    return false;
    	}
    }
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
    /*
        Funcion que se encargbar de aceptar solo letras en un input, se utiliza 
        usando el evento onKeyUp.
    */
    function sololetras(e){
    	key=e.keyCode || e.which;
    	teclado=String.fromCharCode(key);
    	numeros="qwertyuiopasdfghjklñzxcvbnmQWERTYUIOPASDFGHJKLÑZXCVBNM ";
    	especiales="8-9-17-37-38-46";//los numeros de esta linea son especiales y es para las flechass
    	teclado_escpecial=false;
    	for(var i in especiales){
    	    if (key==especiales[i]) {
    	        teclado_escpecial=true;
    	    }
    	}
    	if (numeros.indexOf(teclado)==-1 && !teclado_escpecial) {
    	    return false;
    	}
    }
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
    /*
        Funcion que valida la fecha de nacimiento del artista, tambien tiene un
        minimo de edad.
    */  
    function validarFechaNacimiento(date, input){
    	var edad=0;
        //capturamos la fecha de hoy 
        hoy=new Date();
        diaActual=hoy.getDate();
        // al mes le sumamos 1 ya que los meses javascript los muestra como un array de 0 a 11
        mesActual=hoy.getMonth()+1;
        yearActual=hoy.getFullYear();
        //le concateno un 0 al dia y al mes cuando son menor que diez
        if(diaActual<10){
          diaActual='0'+diaActual;
        }
        if(mesActual<10){
          mesActual='0'+mesActual;
        }
        //alert('dia '+diaActual +'del mes ' + mesActual + 'del año '+ yearActual)
        //capturo la fecha que recibo
        //La descompongo en un array
        var fecha=date.split("-");
        dia=fecha[0];
        mes=fecha[1];
        year=fecha[2];
        //Valido que la fecha de nacimiento no sea mayor a la fecha actual
        invalido=yearActual-year;
        if(invalido<18){
          swal(
            {title:'Fecha inválida!',
            text: 'El artista tiene que ser mayor de edad.',
            type:'warning',
            confirmButtonText:'Aceptar'}
          );
          document.getElementById(input).value="";
        }
    }
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
    /*
        Funcion que valida la fecha de muerte del artista contra su fecha de
        nacimiento y contra la fecha del dia.
    */
    function validarFechaMuerte(date){
        var x=new Date();
        var y=new Date();
        var hoy=new Date();
        var fecha = date.split("-");
        x.setFullYear(fecha[2],fecha[1]-1,fecha[0]);
        var nacimiento=document.getElementById('nacimiento').value;
        var fecha2 = nacimiento.split("-");
        y.setFullYear(fecha2[2],fecha2[1]-1,fecha2[0]);
        if (x < y){
        	document.getElementById('muerte').value='';
        	swal({
    		  	title: 'La fecha de muerte es inválida!',
    		  	type: "error",
    		 	confirmButtonColor: "#DD6B55",
    		  	confirmButtonText: 'Aceptar'
    		});
        }else if(x > hoy){
        	document.getElementById('muerte').value='';
        	swal({
    		  	title: 'La fecha de muerte es inválida!',
    		  	type: "error",
    		 	confirmButtonColor: "#DD6B55",
    		  	confirmButtonText: 'Aceptar'
    		});
        }
    }
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
    /*
        Functio que realiza el cambio del formato de fecha que trae el campo
        de la base de datos.
    */
    function cambiarFormatoFecha(date) {
      var info=date.split('-');
      var fecha=info[2]+'-'+info[1]+'-'+info[0];
      return fecha;
    }
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
    /*
        Funcion que hace que la pagina sube al principio, se utiliza para subir a
        mostrar los alertas.
    */
    function scrollToTop(){
        $("html, body").stop().animate({scrollTop:0}, 500, 'swing');
    }
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
    /*
        Variable para el idioma del datatable.
    */
    var idioma_espanol = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
/* ------------------------------------------------------------------------------- */

/* ------------------------------------------------------------------------------- */
    /*
        Funcion que realiza el movimiento de conteo en la barra de estadisticas
        de los artistas y museos.
    */
    function conteo(e){
        $(e).each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    }
/* ------------------------------------------------------------------------------- */