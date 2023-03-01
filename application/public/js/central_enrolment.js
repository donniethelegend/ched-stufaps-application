
 FusionCharts.ready(function(){
	  
	  
	  var jsonlabel = JSON.parse(document.getElementById("region").value);
	  var jsonvalues = JSON.parse(document.getElementById("region_values").value);
	  var jsonvalues2 = JSON.parse(document.getElementById("region_values2").value);
	  var selectedcountry = "";
	  
    var fusioncharts = new FusionCharts({
    type: 'msstackedcolumn2d',
    renderAt: 'chart-container',
    width: '1024',
    height: '450',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": selectedcountry,
            "subcaption": "",
            "xaxisname": "Region",
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
			"paletteColors": "#0075c2,#45AFF5"
        },
        "categories": [{
            "category":  
                jsonlabel
			
        }],
		 "dataset": [{
			"dataset": [{
				"seriesname": "Male",
				"data": 
					jsonvalues
				
			},
			{
				"seriesname": "Female",
				"data": 
					jsonvalues2
				
			}]
		}]
    }
}
);
    fusioncharts.render();
});


