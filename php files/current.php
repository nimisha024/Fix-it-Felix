<?php 
session_start();



$email='';
$result=array();
$account=array();
$rows=0;
$table=array();
$id=0;
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

if(isset($_GET['id'])){
	if(!empty($_GET['id'])){
		$_SESSION['ID']=$_GET['id'];
		$id=$_GET['id'];
	}
	else
		$id=$_SESSION['ID'];
}
if(!$id){
	$id=$_SESSION['ID'];
}

function getTableData(){
	// echo "Hello World";
	$conn=mysqli_connect('localhost','preet','test1234','dbms');
	//check connection
	if(!$conn){
		echo 'Connection error: '.mysqli_connect_error();
	}
	$conid=$GLOBALS['id'];
	// echo $conid;
	$sql="SELECT potholes.p_id , potholes.latitude, potholes.longitude, potholes.date 
		from potholes join handler on 
		potholes.p_id = handler.p_id 
		where `c_id`='$conid'and `status`='1' ";
	$result=mysqli_query($conn,$sql);
	// print_r($result);
	// $rows=mysqli_num_rows($result);
	if(!mysqli_query($conn,$sql)){
		echo '<script>alert("All contracts have been taken")</script>';
		// echo $GLOBALS['email'];
		// header("location: contractor.php?email=".$_SESSION['EMAIL']."");
		$account=array();
		return $account;
	}
	else{
		$account=mysqli_fetch_all($result,MYSQLI_ASSOC);
		echo $GLOBALS['email'];
		// print_r($account);
		return $account;
	}
	
}
$rem=$comp=0;
$errors=['comp'=>'', 'rem'=>''];
$id=$_SESSION['ID'];
echo $email;
echo $id;

if(isset($_POST['remove'])){
	$link=mysqli_connect("localhost","preet","test1234","dbms");
		

		if(!$link){
			echo "Connection error: ".mysqli_connect_error();
		}
		// check id
		if(($_POST['rem'])==0){
			$errors['rem']='A pothole id is required';
		} 
		else{

				$rem=$_POST['rem'];
				$sql="UPDATE handler SET `c_id`=NULL, `status`=-1 WHERE `p_id`='$rem' ;";
				echo $sql;
				if(mysqli_query($link,$sql)){
					echo "Contract removed";
				}
				else{
					$result=mysqli_query($link,$sql);
					print_r($result);
					echo $rem;
					echo "not removed";
				}

		}
}

if(isset($_POST['complete'])){
	$link=mysqli_connect("localhost","preet","test1234","dbms");
		

		if(!$link){
			echo "Connection error: ".mysqli_connect_error();
		}
		// check id
		if(($_POST['comp'])==0){
			$errors['comp']='A pothole id is required';
		}
		else{

			$comp=$_POST['comp'];
			$sql="UPDATE handler SET `status`=2 WHERE `p_id`='$comp' ;";
			// -1 free -> 1 taken -> 2 completed -> 3 approved
			if(mysqli_query($link,$sql)){
				echo "Contract completed!";
			}

		} 


}
	
 ?>

 <!DOCTYPE html>
 <html>
<?php include("templates/header_plain.php") ?>
<br />
 <div class="container bord" style="overflow-y: auto; height: 495px;">
	<table class="striped">
		<thead class="striped highlighted centered">
			<tr class="centered">
				<td><h5 class="white-text"><b>Pothole Id</b></h5></td>
				<td><h5 class="white-text"><b>Latitude</b></h5></td>
				<td><h5 class="white-text"><b>Longitude</b></h5></td>
				<td><h5 class="white-text"><b>Date</b></h5></td>
				<!-- <td>input</td> -->
			</tr class="centered">
		</thead>
		<tbody>
			
		<?php
			$table=getTableData();
			// print_r($table);
			$limit=count($table);
			for($i=0;$i<$limit;$i++){
				echo "<tr class='darkgrey-text'>";
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
<br />

<section class="container white-text">
	<form class="white" action="current.php" method="POST" enctype="multipart/form-data">
		<label>Enter ID for contract you want to drop:</label>
			<input type="number" name="rem" value="<?php echo htmlspecialchars($rem) ?>">
			<div class="red-text"><?php echo $errors['rem'] ?>
			</div>

			<div class="center">
				<input type="submit" name="remove" value="remove" class="btn brand z-depth-0">
			</div>
	</form>
</section>

<section class="container white-text">
	<form class="white" action="current.php" method="POST" enctype="multipart/form-data">
		<label>Enter ID for contract you completed:</label>
			<input type="number" name="comp" value="<?php echo htmlspecialchars($comp) ?>">
			<div class="red-text"><?php echo $errors['comp'] ?>
			</div>

			<div class="center">
				<input type="submit" name="complete" value="complete" class="btn brand z-depth-0">
			</div>
	</form>
</section>

<?php include("templates/footer.php") ?>
 </html>