/**
 * Created by j955 on 16/1/20.
 */


//amchart-start
var chartData = mydata;


var chart = AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "theme": "light",
    "dataProvider":chartData ,
    "categoryField": "xx",
    "valueAxes": [ {
        "gridColor": "#cccccc",
        "gridAlpha": 0.5,
        "dashLength": 0
    } ],
    "startDuration": 0,
    "creditsPosition":"top-right",
    "graphs": [ {
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "fillAlphas": 0.8,
        "lineAlpha": 0.2,
        "type": "column",
        "valueField": "actual",
        "labelText":"[[value]]",
    } ],
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0.5,
        "zoomable": false
    },

    "categoryAxis": {
        "gridPosition": "start",
        "gridColor": "#cccccc",
        "gridAlpha": 0.5,
        "labelRotation":90,
        "autoGridCount":false,
        "GridCount":10
    },
    "export": {
        "enabled": true
    }

} );

//amchart-end


function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null)
        return unescape(r[2]);
    return "";
}

function query() {
    var _startTime = document.getElementById('start_time').value;
    var _endTime = document.getElementById('end_time').value;
    var  NewChartData=[];

    //var stratStr = _startTime.split("-");
    //var endStr = _endTime.split("-");

    //alert(_startTime+"-----"+_endTime);
    if (isEmpty(_startTime)) {

        alert("请选择开始时间");
        return;
    }
    if (isEmpty(_endTime)) {

        alert("请选择结束时间");
        return;
    }
    var start = _startTime + " 00:00:00";
    var end = _endTime + " 23:59:59";
    if (Date.parse(start) > Date.parse(end)) {
        alert("开始时间不应该大于结束时间");
        return;
    }
    $.ajax({
        url: '/jieduData/' + datanameid + '?date=' + Date.parse(new Date()) + '&start=' + start + '&end=' + end,
        cache: false,
        dataType: "json",
        async: false,
        success: function (dataJson) {
            NewChartData=[];
            NewChartData=dataJson;
            /*for(var i=dataJson.length;i>dataJson.length-11;i--){
                dataJson.push(dataJson[i]);
            }*/
            //console.log(dataJson+"--"+dataJson.length);
        }
    });


    chart.dataProvider = NewChartData;
    chart.validateData();
}

function isEmpty(str) {
    if (str != null && str.length > 0) {
        return false;
    }
    return true;
}
function getObjectKeys(object) {
    var keys = [];
    for (var property in object)
        keys.push(property);
    return keys;
}
function getObjectValues(object) {
    var values = [];
    for (var property in object)
        values.push(object[property]);
    return values;
}
