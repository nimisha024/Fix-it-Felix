<?php 
session_start();
if (isset($_GET['leave'])) {
	header("location:home.php");
}

if(isset($_GET['back'])){
	header("location: getimage.php?email=".$_SESSION['EMAIL']."&id=".$_SESSION['ID']." ");
}
	// connect to database
	$conn=mysqli_connect('localhost','preet','test1234','dbms');
	//check connection
	if(!$conn){
		echo 'Connecion error: '.mysqli_connect_error();
	}
$db_path='';
$i=[];
if(isset($_GET['loc'])){
 		$loc_path=$_GET['loc'];
 		$db_path=addslashes($loc_path);
 		$explode_path=explode('/', $loc_path);
 		$db_path=end($explode_path);
 		// print_r($explode_path);
 		// foreach($explode_path as $i=>$i_value){
 		// 	$db_path=$db_path.$i_value.'-';
 		// }
 		// echo $db_path;
		//extracting location data from the exif metadata
		$exif_data = exif_read_data($loc_path);
		if(isset($exif_data['GPSLatitude'])){

			$latitude=[
					'GPSLatitudeRef'=>$exif_data['GPSLatitudeRef'],
					'GPSLatitude'=>$exif_data['GPSLatitude'],
			];
			$longitude=[
					'GPSLongitudeRef'=>$exif_data['GPSLongitudeRef'],
					'GPSLongitude'=>$exif_data['GPSLongitude'],
			];
			//end of extraction of data
			// print_r($latitude);
			// echo "<br />\n";
			// print_r($longitude);

		//Pass in GPS.GPSLatitude or GPS.GPSLongitude or something in that format
		function getGps($exifCoord)
		{
		  $degrees = count($exifCoord) > 0 ? gps2Num($exifCoord[0]) : 0;
		  $minutes = count($exifCoord) > 1 ? gps2Num($exifCoord[1]) : 0;
		  $seconds = count($exifCoord) > 2 ? gps2Num($exifCoord[2]) : 0;

		  //normalize
		  $minutes += 60 * ($degrees - floor($degrees));
		  $degrees = floor($degrees);

		  $seconds += 60 * ($minutes - floor($minutes));
		  $minutes = floor($minutes);

		  //extra normalization, probably not necessary unless you get weird data
		  if($seconds >= 60)
		  {
		    $minutes += floor($seconds/60.0);
		    $seconds -= 60*floor($seconds/60.0);
		  }

		  if($minutes >= 60)
		  {
		    $degrees += floor($minutes/60.0);
		    $minutes -= 60*floor($minutes/60.0);
		  }

		  return array('degrees' => $degrees, 'minutes' => $minutes, 'seconds' => $seconds);
		}

		function gps2Num($coordPart)
		{
		  $parts = explode('/', $coordPart);

		  if(count($parts) <= 0)// jic
		    return 0;
		  if(count($parts) == 1)
		    return $parts[0];

		  return floatval($parts[0]) / floatval($parts[1]);
		}

		$flat=getGps($latitude['GPSLatitude']);
		$flon=getGps($longitude['GPSLongitude']);

		
		$lati=$flat['degrees'].'+'.$flat['minutes'].'+'.$flat['seconds'].'+'.$latitude['GPSLatitudeRef'];
		$longi=$flon['degrees'].'+'.$flon['minutes'].'+'.$flon['seconds'].'+'.$longitude['GPSLongitudeRef'];

		// print_r($flat);
		// 	echo $latitude['GPSLatitudeRef'];
		// echo "<br />\n"; 
		// print_r($flon);
		// 	echo $longitude['GPSLongitudeRef'];


      

		// echo $lati;
		// echo $longi;
		// echo $loc_path;
		$p_id=0;
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$sql = "INSERT INTO potholes (`u_id`,`latitude`,`longitude`,`img_loc`) VALUES ('$id','$lati','$longi','$loc_path');";// ` backtick and 'single quote are different characters
			// $sql1.= "SELECT `p_id` FROM potholes WHERE `img_loc`='$loc_path' ";
			$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if($result==1){
				$idsql="SELECT `p_id` FROM potholes WHERE `img_loc`='$loc_path'";
				$idresult=mysqli_query($conn,$idsql);
				$idaccount=mysqli_fetch_all($idresult,MYSQLI_ASSOC);
				// print_r($idaccount);
				$p_id=(int)$idaccount[0]['p_id'];
				// var_dump($p_id);
				// print_r ($idresult);
				if($idresult){
					$sql1 = "INSERT INTO handler(`p_id`,`img_loc`)VALUES ('$p_id','$loc_path');";
					$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
						if($result1==1){
							// echo "Hai";
					}
				}
			}


			//$sql1 = "INSERT INTO potholes (`img_loc`) VALUES ('$db_path');";// ` and ' are different characters
			/* execute multi query */
			// if (mysqli_multi_query($conn, $sql)) {
			//     // do {
			//     //     // /* store first result set */
			//     //     // if ($result = mysqli_store_result($conn)) {
			//     //     //     while ($row = mysqli_fetch_row($result)) {
			//     //     //         printf("%s\n", $row[0]);
			//     //     //     }
			//     //     //     mysqli_free_result($result);
			//     //     // }
			//     //     // /* print divider */
			//     //     // if (mysqli_more_results($conn)) {
			//     //     //     printf("-----------------\n");
			//     //     // }
			//     // 	echo "records inserted";
			//     // }
			//     // while (mysqli_next_result($conn));

			// 	echo "New records created successfully";
			// 	} 
			// 	else {
			// 	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			// 	}
		}
	}
}



 ?>


 <!DOCTYPE html>
 <html>

 <?php include('templates/header_plain.php') ?>

 	<div class="container">
 
		<table class="striped centered">
	        <thead>
	          <tr>
	              <th>Latitude</th>
	              <th>Longitude</th>
	              <th>Location</th>
	          </tr>
	        </thead>

	          <tr>
	            <td><?php echo htmlspecialchars($lati) ?></td>
	            <td><?php echo htmlspecialchars($longi) ?></td>
	            <td><?php echo htmlspecialchars($loc_path) ?></td>
	          </tr>
	         
	      </table>

 	</div>
 
 	<br><br>
 
 	<div class="container center">
 		<?php echo"<img src='$loc_path' style='max-height: 400px; max-width: 800px;'>";echo "<br>";echo "<label class='center red-text '><b>IMAGE</b></LABEL>";?>
 	</div>

 	<form action="location.php" method="get" enctype="multipart/form-data">	
		<div class="containter center">
			<button class="btn brand z-depth-0" type="submit" name="back" value="back">Upload more images</button>
			<button class="btn brand z-depth-0" type="submit" name="leave" value="leave">log out</button>
		</div>
 	</form>
 
 <?php include('templates/footer.php') ?>
 </html>