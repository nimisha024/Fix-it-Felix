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
		//check connection
		if(!$conn){
			echo 'Connection error: '.mysqli_connect_error();
		}

		$sql="SELECT handler.p_id , potholes.latitude, potholes.longitude, potholes.date 
			from potholes join handler on 
			potholes.p_id = handler.p_id
			where handler.status=2;";
			

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
	
	$id=$_SESSION['ID'];
	$hid=0;
	$errors=array('hid'=>'');
	$pathrow=array();
	$path='';
	if(isset($_POST['submit'])){

		$link=mysqli_connect("localhost","preet","test1234","dbms");
		

		if(!$link){
			echo "Connection error: ".mysqli_connect_error();
		}
		// check id
		if(($_POST['hid'])==0){
			$errors['hid']='A pothole id is required';
		} 
		else{
			$hid = $_POST['hid'];
			echo $id;
			echo "$hid\n";
			$phsql="UPDATE handler SET `a_id`='$id',`status`=3 WHERE `p_id`='$hid' AND `a_id` IS NULL";
			// -1 free -> 1 taken -> 2 completed -> 3 approved

			
			$google_lat=$google_long=0;
			if(mysqli_query($link,$phsql)){
				$query=mysqli_query($link,$phsql);
				// print_r($query);
				// echo "\n";
				echo "Contract Acccepted $phsql";
				$pathsql="SELECT `latitude`,`longitude`,`img_loc` FROM potholes WHERE `p_id`='$hid'";
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
<div class="container bord" style="overflow-y: auto; height: 495px;">
	<table class="striped">
		<thead class="striped highlighted centered">
			<tr class="centered">
				<td>Pothole Id</td>
				<td>Latitude</td>
				<td>Longitude</td>
				<td>Date</td>
				<!-- <td>input</td> -->
			</tr class="centered">
		</thead>
		<tbody>
			
		<?php
			$table=getTableData();
			// print_r($table);
			$limit=count($table);
			for($i=0;$i<$limit;$i++){
				echo "<tr>";
				foreach($table[$i] as $key=>$element){
					
					// print_r ($key);
					// echo "<br>";
					// print_r($element); 
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


<section class="container white-text">
	<form class="white" action="approve.php" method="POST" enctype="multipart/form-data">
		<label>Enter ID for contract you want to approve:</label>
			<input type="number" name="hid" value="<?php echo htmlspecialchars($hid) ?>">
			<div class="red-text"><?php echo $errors['hid'] ?>
			</div>

			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
	</form>
</section>

<?php 
	if(count($pathrow)){

		echo "<div class='container center'>";
		echo "<img src='$path' style='max-height: 400px; max-width: 800px;'>";
		echo "<br>";
		echo "<label class='center red-text '><b>POTHOLE IMAGE</b></label>";
		echo "</div>";
		echo "<a class='center white-text' href='googleauth.php?plat=$google_lat&plong=$google_long' target='_blank'>Google Map</a>";
	}
 ?>
<br />
<?php include('templates/footer.php') ?>
</html>
