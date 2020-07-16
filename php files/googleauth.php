<?php 

$google_lat=$_GET['plat'];
$google_long=$_GET['plong'];

// echo $conlat." ".$conlong." ".$google_lat." ".$google_long;

 ?>

 <!DOCTYPE html>
<html>
  <head>
  	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 50%;  /* The width is the width of the web page */

       }
       .graddy{
            /*background-image: linear-gradient(to bottom left, #6700cf, white)*/
            background: #3498eb; /*blue*/
            font-family: "Trebuchet MS", Helvetica, sans-serif;
        }
        .navgraddy{
            /*background-image: linear-gradient(to top left, red, yellow)    */
            background: #ffe13b;
            font-family: "Trebuchet MS", Helvetica, sans-serif;
        }
        .brand{
            /*background: #6700cf !important;*/
            background: #eb348c !important;
            font-family: "Trebuchet MS", Helvetica, sans-serif;
        }
    </style>
  </head>
  <body  class="graddy">
  	<nav class="navgraddy z-depth-0">
  		<div class="container">
				<a href="#" class="brand-logo brand-text"><img src="fix_it_felix_3.png" style="max-height: 65px; max-width:65px;" class="paddy" ><img src="fix_it_felix_text.png" style="max-height: 65px; max-width: 140px;"></a>
				<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li><a href="home.php" class="btn brand z-depth-0 ">LOG OUT</a></li>
				</ul>
			</div>
		</nav>
		<br />
    <!-- <h3>My Google Maps Demo</h3> -->
    <!--The div element for the map -->
    <div id="map" class="container center">
    </div>
    	
    <script>
// Initialize and add the map
function initMap() {
  // The location of the pothole and contractor
  // var contractor = {lat: <?php echo $conlat; ?>, lng: <?php echo $conlong; ?>};
  var pothole = {lat: <?php echo $google_lat; ?>, lng: <?php echo $google_long; ?>};

  // The map, centered at contractor
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 5.3, center: contractor});
  // The marker, positioned at contractor and pothole
  var p_marker = new google.maps.Marker({position: pothole, map: map, label:"O"});
  // var c_marker = new google.maps.Marker({position: contractor, map: map, label:"ME"});
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC41uGacbPFvHN09RJeKuF93VXW4qd3wQA&callback=initMap">
    </script>
  </body>
</html>