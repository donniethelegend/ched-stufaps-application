<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzIoQb8w8VNiv4xrsE6bRmV-2wPXvsADA&callback=initMap"
  type="text/javascript"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load("upcoming", {packages:["map"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		var latitude = document.getElementById("latitude").value;
		var longtitude = document.getElementById("longtitude").value;
		var instname = document.getElementById("instname").value;
		var latitude_float = parseFloat(latitude);
		var longtitude_float = parseFloat(longtitude);
		
		console.log(longtitude_float);
		//console.log(longtitude_float);
        var data = google.visualization.arrayToDataTable([
		
          ['Lat', 'Long', 'Name'],
          [longtitude_float,latitude_float,instname]
		   //[16.606813,120.3170209, 'DMMMSU MLUC <br> <a target="_blank" href="http://www.google.com">Website</a>']
        ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {
          showTooltip: true,
          showInfoWindow: true
        });
      }

    </script>