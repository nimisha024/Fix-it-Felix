<?php 
	session_start();



	$email='';
	$result=array();
	$account=array();
	$rows=0;
	$table=array();
	if(isset($_GET['email'])){
		if(!empty($_GET['email'])){
			$_SESSION['EMAIL']=$_GET['email'];
			$email=$_GET['email'];
		}
		else
			$email=$_SESSION['EMAIL'];
	}
	if(!$email){
		$email=$_SESSION['EMAIL'];
	}
	// echo $email;
	function getTableData(){
		// echo "Hello World";
		$conn=mysqli_connect('localhost','preet','test1234','dbms');
		// print_r($conn);
		//check connection
		if(!$conn){
			echo 'Connection error: '.mysqli_connect_error();
		}

		$sql="SELECT potholes.p_id , potholes.latitude, potholes.longitude, potholes.date 
			from potholes join handler on 
			potholes.p_id = handler.p_id
			where handler.status=-1;";

		$result=mysqli_query($conn,$sql);
		// print_r($result);
		$rows=mysqli_num_rows($result);
		if($rows==0){
			echo '<script>alert("All contracts have been taken")</script>';
			// echo $GLOBALS['email'];
			// header("location: contractor.php?email=".$_SESSION['EMAIL']."");
			$account=array();
			return $account;
		}
		else{
			$account=mysqli_fetch_all($result,MYSQLI_ASSOC);
			// echo $GLOBALS['email'];
			// print_r($account);
			return $account;
		}
	
	}

	require_once('geo/geoplugin.class.php');
	$geoplugin = new geoPlugin();

	$geoplugin->locate();

	$locerror=['con_lati'=>'', 'con_longi'=>''];
	$con_lati=$geoplugin->latitude;
	$con_longi=$geoplugin->longitude;

	// echo $con_lati."<br />";
	// echo $con_longi."<br />";
	// if(isset($_POST['conloc'])){
	// 	// check latitude
	// 	if(empty($_POST['con_lati'])){
	// 		$locerror['con_lati']='Latitude is required';
	// 	}
	// 	else if($con_lati>90 || $con_lati<-90){
	
	// 	$locerror['con_lati']='Latitude must be within -90 and 90';
	// 	}
	// 	else
	// 		$con_lati = $_POST['con_lati'];
	

	// 	// check longitude
	// 	if(empty($_POST['con_longi'])){
	// 		$locerror['con_longi']='Longitude is required';
	// 	} else{
	// 		if($con_longi>180 || $con_longi<0){
	// 			$locerror['con_longi']='Longitude must be within 0 and 180';
	// 		}
	// 		else	
	// 			$con_longi = $_POST['con_longi'];
	// 	}
	// }

	$latDelta=$lonDelta=$angle=0;
	$deci_lat=$deci_long=0;
	function getDistance($plat, $plong){
		$lat=explode("+",$plat);
		$long=explode("+",$plong);
		if($lat[3]=="N")
			$deci_lat=$lat[0]+($lat[1]/60)+($lat[2]/3600);
		else
			$deci_lat=-1*($lat[0]+($lat[1]/60)+($lat[2]/3600));
		$deci_long=$long[0]+($long[1]/60)+($long[2]/3600);
		// echo $deci_lat."<br />";
		// echo $deci_long."<br />";
		// $rad_lat=deg2rad($deci_lat);
		// $rad_long=deg2rad($deci_long);

		// echo $GLOBALS['con_lati']."<br />"; 
		// echo $GLOBALS['con_longi']."<br />";
		// print_r($GLOBALS['locerror']);

		$latDelta = $GLOBALS['con_lati'] - $deci_lat;
		$lonDelta = $GLOBALS['con_longi'] - $deci_long;

		$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
		cos($deci_lat) * cos($GLOBALS['con_lati']) * pow(sin($lonDelta / 2), 2)));
		return $angle * 6371;

	}
	
	$id=$_SESSION['ID'];
	$phid=0;
	$errors=array('phid'=>'');
	$pathrow=array();
	$path='';
	if(isset($_POST['submit'])){

		$link=mysqli_connect("localhost","preet","test1234","dbms");
		

		if(!$link){
			echo "Connection error: ".mysqli_connect_error();
		}
		// check id
		if(($_POST['phid'])==0){
			$errors['phid']='A pothole id is required';
		} 
		else{
			$phid = $_POST['phid'];
			echo $id;
			echo "$phid\n";

			$phsql="UPDATE handler SET `c_id`='$id',`status`=1 WHERE `p_id`='$phid' AND `c_id` IS NULL";
			echo "<br />";
			
			$google_lat=$google_long=0;
			if(mysqli_query($link,$phsql)){
				$query=mysqli_query($link,$phsql);
				print_r($query);
				// echo "\n";
				echo "Contract Acccepted $phsql";
				echo "<br />";
				$pathsql="SELECT `latitude`,`longitude`,`img_loc` FROM potholes WHERE `p_id`='$phid'";
				if(mysqli_query($link,$pathsql)){
					$pathres=mysqli_query($link,$pathsql);
					print_r($pathres);
					echo "<br />";
					$pathrow=mysqli_fetch_assoc($pathres);
					print_r($pathrow);
					$path=$pathrow['img_loc'];
					$lat=explode("+",$pathrow['latitude']);
					$long=explode("+",$pathrow['longitude']);
					if($lat[3]=="N")
						$google_lat=$lat[0]+($lat[1]/60)+($lat[2]/3600);
					else
						$google_lat=-1*($lat[0]+($lat[1]/60)+($lat[2]/3600));
					$google_long=$long[0]+($long[1]/60)+($long[2]/3600);
					// print_r($path);
					// echo $email;
					// echo "<BR>EMAIL IS ".$_SESSION['EMAIL'];
				}
			}
			else{

			}
		}
	}
	
	// $count=$id=0;
	// isset($_GET['id']) ? $id=$_GET['id'] : $email=$_SESSION['ID'];
	// if($count==0) {
	// 	if(isset($_GET['id']))
	// 		$_SESSION['ID']=$_GET['id'];
	// 	 $count+=1 ;
	// }
	// else{
	// 	$id=$_SESSION['ID'];
	// 	$count==0;
	// }

 ?>


 <!DOCTYPE html>
 <html>
<?php include("templates/header_plain.php") ?>
<br />
<div class="container bord" style="overflow-y: auto; height: 350px;">
	<table class="striped">
		<thead class="striped highlighted centered">
			<tr class="centered">
				<td>Pothole Id</td>
				<td>Latitude</td>
				<td>Longitude</td>
				<td>Distance (km)</td>
				<td>Date</td>
				<!-- <td>input</td> -->
			</tr class="centered">
		</thead>
		<tbody>
			
		<?php
			$latiarr=array();
			$degree="&deg;";
			$distance=0;
			$table=getTableData();
			// print_r($table);
			$limit=count($table);
			for($i=0;$i<$limit;$i++){
				echo "<tr>";
				// if(isset($_POST['conloc'])){
					$distance=getDistance($table[$i]['latitude'], $table[$i]['longitude']);
				// }
				// else{
				// 	$distance=0;
				// }
				foreach($table[$i] as $key=>$element){
					
					// print_r ($key);
					// echo "<br>";
					// print_r($element);
					// // print_r($table[$i]);
					if ($key=="latitude" ){
						$latiarr=explode("+",$element);
						$element=$latiarr[0].$degree.$latiarr[1]."'".$latiarr[2]."\"".$latiarr[3];
						// echo $element;
					}
					else if ($key=="longitude" ){
						$latiarr=explode("+",$element);
						$element=$latiarr[0].$degree.$latiarr[1]."'".$latiarr[2]."\"".$latiarr[3];
						// echo $element;
						echo "<td>".$element."</td>";
						echo "<td>".$distance."</td>";
						continue;
					}
					echo "<td>".$element."</td>";
					// echo "<tr><td>".$element["p_id"]."</td><td>".$element["latitude"]."</td><td>".$element["longitude"]."</td><td>".$element["date"]."</td></tr>";
				}
				// echo '<td><input type="checkbox" name="helo" "checked"></td>';
				echo "</tr>";
			}
			echo "</table>";
			
		?>	
		</tbody>
	</table>	

</div>

<!-- <section class="container white-text">
	<form class="white round" action="free.php" method="POST" enctype="multipart/form-data">
		<label>Enter latitude in decimal format</label>
		<input type="number" name="con_lati" value="<?php echo htmlspecialchars($con_lati) ?>">
		<div class="red-text"><?php echo $locerror['con_lati'] ?></div>

		<label>Enter longitude in decimal format</label>
		<input type="number" name="con_longi" value="<?php echo htmlspecialchars($con_longi) ?>">
		<div class="red-text"><?php echo $locerror['con_longi'] ?></div>

		<div class="center">
			<input type="submit" name="conloc" value="submit" class="btn brand z-depth-0"></input>
		</div>
	</form>
</section> -->


<section class="container white-text">
	<form class="white round" action="free.php" method="POST" enctype="multipart/form-data">
		<label>Enter ID for contract you want to take:</label>
			<input type="number" name="phid" value="<?php echo htmlspecialchars($phid) ?>">
			<div class="red-text"><?php echo $errors['phid'] ?>
			</div>

			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
	</form>
</section>

<?php 
	if(count($pathrow)){

		echo "<div class='container center'>";
		echo "<img src='$path' style='max-height: 200px; max-width: 400px;'>";
		echo "<br>";
		echo "<label class='center red-text '><b>POTHOLE ID: $phid</b></label>";
		echo "</div>";
		echo "<br />";
		echo "<div class='center brand'>";
		echo "<a class='center white-text' href='googleimage.php?conlat=$con_lati&conlong=$con_longi&plat=$google_lat&plong=$google_long' target='_blank'>Google Map</a>";
		echo "</div><br />";
		// echo "deci lat is ".$google_lat."<-";
		echo "<div id='map'>";

		echo "<script>
					// Initialize and add the map
					function initMap() {
					  
					  var pot = {lat: <?php echo $google_lat;?>, lng: <?php echo google_long;?>};
					  console.log(
					   <?php echo $google_lat;?>;
					  );
					  // var contractor = {lat: <?php echo con_lati; ?>, lng: <?php echo con_longi;?>};
					  // The map, centered at pothole
					  var pothole_map = new google.maps.Map(
					      document.getElementById('map'), {zoom: 5, center: pot});
					  // var contractor_map = new google.maps.Map(
					      // document.getElementById('map'), {zoom: 5});
					  // The marker, positioned at pothole
					  var pothole_marker = new google.maps.Marker({position: pot, map: pothole_map});
					  // var contractor_market = new google.maps.Marker({position: contractor, map: contractor_map});
					}
		    </script>
		    <script async defer
	    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC41uGacbPFvHN09RJeKuF93VXW4qd3wQA&callback=initMap'>
	    </script>";

	    echo "<script async defer
	    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC41uGacbPFvHN09RJeKuF93VXW4qd3wQA&callback=initMap'>
	    </script>";
		// echo "</div>";
	}
 ?>

<?php include("templates/footer.php") ?>
 
 </html>