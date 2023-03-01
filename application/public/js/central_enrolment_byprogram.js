
 FusionCharts.ready(function(){
	  
	  
	  //var jsonlabel = JSON.parse(document.getElementById("region").value);
	  var jsonvalues = JSON.parse(document.getElementById("region_values").value);
	  //console.log(jsonvalues);
	  //var jsonvalues2 = JSON.parse(document.getElementById("region_values2").value);
	  var selectedcountry = "";
	  
    var fusioncharts = new FusionCharts({
    type: 'scrollColumn2d',
    renderAt: 'chart-container',
    width: '1024',
    height: '450',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": selectedcountry,
            "subcaption": "",
            "xaxisname": "Program Name",
            "yaxisname": "No. of HEI",
			
            "showvalues": "1",
            "placeValuesInside": "1",
            "rotateValues": "0",
            "valueFontColor": "#ffffff",
            "numberprefix": "",

            //Cosmetics
            //"baseFontColor": "#333333",
            "baseFont": "Arial",
            "captionFontSize": "18",
            "subcaptionFontSize": "14",
            "subcaptionFontBold": "3",
            "showborder": "0",
            "paletteColors": "#0075c2",
            "bgcolor": "#FFFFFF",
            "showalternatehgridcolor": "0",
            "showplotborder": "0",
            "labeldisplay": "WRAP",
            "divlinecolor": "#CCCCCC",
            "showcanvasborder": "0",
            "linethickness": "3",
            "plotfillalpha": "100",
            "plotgradientcolor": "",
            "numVisiblePlot": "12",
            "divlineAlpha": "100",
            "divlineColor": "#999999",
            "divlineThickness": "1",
            "divLineIsDashed": "1",
            "divLineDashLen": "1",
            "divLineGapLen": "1",
            "scrollheight": "10",
            "flatScrollBars": "1",
            "scrollShowButtons": "0",
            "scrollColor": "#cccccc",
            "showHoverEffect": "1",
			"paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
			"toolTipColor": "#ffffff",
			"toolTipBorderThickness": "0",
			"toolTipBgColor": "#000000",
			"toolTipBgAlpha": "80",
			"toolTipBorderRadius": "2",
			"toolTipPadding": "5"
        },
         "categories": [{
            "category":  
                jsonvalues
			
        }],
        "dataset": [{
            "data": 
                jsonvalues
			
        }]  
    }
}
);
    fusioncharts.render();
});


