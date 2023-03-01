
 FusionCharts.ready(function(){
	  
	  
	  //var jsonlabel = JSON.parse(document.getElementById("region").value);
	  var jsonvalues = JSON.parse(document.getElementById("region_values").value);
	  //console.log(jsonvalues);
	  var gtitle =document.getElementById("title").value;
	  //var selectedcountry = "";
	  
    var fusioncharts = new FusionCharts({
    type: 'pie3d',
    renderAt: 'chart-container',
    width: '100%',
    height: '600',
    dataFormat: 'json',
    dataSource: {
        "chart": {
        "caption": gtitle,
        "showValues":"1",
        "numberSuffix": "%",
        "theme": "hulk-light",
        "enableMultiSlicing":"1",
		"showLegend": "1",
        "legendBgColor": "#ffffff",
        "legendBorderAlpha": "0",
        "legendShadow": "0",
        "legendItemFontSize": "18",
        "legendItemFontColor": "#666666",
        "useDataPlotColorForLabels": "1"
        },
         
        "data": jsonvalues  
    }
}
);
    fusioncharts.render();
});


