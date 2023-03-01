<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzIoQb8w8VNiv4xrsE6bRmV-2wPXvsADA&callback=initMap"
  type="text/javascript"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
		
      google.charts.load("upcoming", {packages:["map"]});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {
		//var latitude = document.getElementById("latitude").value;
		//var longtitude = document.getElementById("longtitude").value;
		//var instname = document.getElementById("instname").value;
		//var latitude_float = parseFloat(latitude);
		//var longtitude_float = parseFloat(longtitude);
		 //var jsonmaps = document.getElementById("mapdetails").value;
		//console.log(jsonmaps);
		//var json_mapvalue;
		var jsonmaps = document.getElementById("mapdetails").value;
		
		//var data2 = JSON.parse(jsonmaps);
		//var datalength = data2.length;
		//var longt = parseFloat(data2[0].longtitude);
		//var lati = parseFloat(data2[0].latitude);
		//var inst = data2[0].instname;
		//console.log(data2.length);
		//var coordinates;
		//coordinates="["+parseFloat(data.longtitude)+","+parseFloat(data.latitude)+",'"+data.instname+"'],";
		/*for(var ctr=0;ctr<datalength; ctr++){
				coordinates="["+parseFloat(data[ctr].longtitude)+","+parseFloat(data[ctr].latitude)+",'"+data[ctr].instname+"'],";
				//coordinates+=parseFloat(data[ctr].longtitude);
			}
			//console.log(coordinates);
			for(var ctr=0;ctr<data2.length; ctr++){
				coordinates+=[parseFloat(data2[0].longtitude),parseFloat(data2[0].latitude), data2[0].instname];
			}*/
			console.log(jsonmaps);
        var data = google.visualization.arrayToDataTable([
			['Lat', 'Long', 'Name'],
			<?php echo $allheimap2;?>

        ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {
          showTooltip: true,
          showInfoWindow: true
        });
      }

	  
	 
	  //alert(jsonmaps);
	  
    </script>