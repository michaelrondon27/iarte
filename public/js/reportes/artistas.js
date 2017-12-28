$(document).ready(function(){
    $("#reportes").attr('class', 'active');
    artistasPorProfesiones();
    artistasPorDisciplinas();
    artistasPorPaises();
    catalogosPorArtistas();
    visitasPorArtistas();
    visitasPorCatalogosArtistas();
});

function artistasPorProfesiones(){
    $.ajax({
        url:carpeta+'admin/reportes/artistasPorProfesiones',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            artistasPorProfesiones();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].profesion, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'profesiones', 'Artistas Por Profesiones', 'Profesión');
        }
    });
}

function artistasPorDisciplinas(){
    $.ajax({
        url:carpeta+'admin/reportes/artistasPorDisciplinas',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            artistasPorDisciplinas();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].disciplina, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'disciplinas', 'Artistas Por Disciplinas', 'Disciplina');
        }
    });
}

function artistasPorPaises(){
    $.ajax({
        url:carpeta+'admin/reportes/artistasPorPaises',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            artistasPorPaises();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].pais, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'paises', 'Artistas Por Paises', 'Artistas');
        }
    });
}

function catalogosPorArtistas(){
    $.ajax({
        url:carpeta+'admin/reportes/catalogosPorArtistas',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            catalogosPorArtistas();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].nombre, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'catalogosArtistas', 'Catalogos Por Artistas', 'Catalogos');
        }
    });
}

function visitasPorArtistas(){
    $.ajax({
        url:carpeta+'admin/reportes/visitasPorArtistas',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            visitasPorArtistas();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].visitas>0){
                    var serie=new Array(respuesta[i].nombre, respuesta[i].visitas);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'visitasArtistas', 'Visitas Por Artistas', 'Visitas');
        }
    });
}

function visitasPorCatalogosArtistas(){
    $.ajax({
        url:carpeta+'admin/reportes/visitasPorCatalogosArtistas',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            visitasPorCatalogosArtistas();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].nombre, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'visitasCatalogosArtistas', 'Visitas Por Catalogos', 'Visitas');
        }
    });
}

function dibujarTorta(series, div, text, name){
    Highcharts.chart(div, {
        chart: {
            type: 'pie',
            backgroundColor: null
        },
        title: {
            text: text
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f}%',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: [name],
            colorByPoint: true,
            data: series
        }]
    });
}
