<?php
include("config.php");
$query = "SELECT `vehicle_id`, `status` FROM `book_details` WHERE status='approved'";
$result = mysqli_query($con, $query);
$vehicle = array();
while($result=mysqli_fetch_assoc($result)){
  $vehicle[]="['".$result['vehicle_id']."','".$result['status']."']";

}

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
          foreach ($vehicle as $vehicle){
            echo $vehicles;
          }
          ?>
          // ['Work',     11],
          // ['Eat',      2],
          // ['Commute',  2],
          // ['Watch TV', 2],
          // ['Sleep',    7]
        ]);

        var options = {
          title: 'Booking Records',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>