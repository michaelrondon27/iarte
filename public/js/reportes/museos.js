$(document).ready(function(){
    $("#reportes").attr('class', 'active');
    museosPorEstados();
    tiposMuseos();
    visistasMuseos();
    obrasPorMuseos();
    artistasPorMuseos();
});

function museosPorEstados(){
    $.ajax({
        url:carpeta+'admin/reportes/museosPorEstados',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            museosPorEstados();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].estado, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'estados', 'Museos Por Estados', 'Estado');
        }
    });
}

function tiposMuseos(){
    $.ajax({
        url:carpeta+'admin/reportes/tiposMuseos',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            tiposMuseos();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].tipo_museo, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'tiposMuseos', 'Tipos de Museos', 'Tipo de Museo');
        }
    });
}

function visistasMuseos(){
    $.ajax({
        url:carpeta+'admin/reportes/visistasMuseos',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            visistasMuseos();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].visitas>0){
                    var serie=new Array(respuesta[i].nombre, respuesta[i].visitas);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'visistasMuseos', 'Visitas Por Museos', 'Museo');
        }
    });
}

function obrasPorMuseos(){
    $.ajax({
        url:carpeta+'admin/reportes/obrasPorMuseos',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            obrasPorMuseos();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].nombre, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'obrasPorMuseos', 'Obras Por Museos', 'Museo');
        }
    });
}

function artistasPorMuseos(){
    $.ajax({
        url:carpeta+'admin/reportes/artistasPorMuseos',
        headers:{'X-CSRF-TOKEN': document.getElementById('token').value},
        type:'POST',
        dataType:'JSON',
        error: function (repuesta) {
            artistasPorMuseos();
        },
        success: function(respuesta){
            var data=[];
            for(var i in respuesta){
                if(respuesta[i].conteo>0){
                    var serie=new Array(respuesta[i].nombre, respuesta[i].conteo);
                    data.push(serie);
                }
            }
            dibujarTorta(data, 'artistasPorMuseos', 'Artistas Por Museos', 'Museo');
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
