<?php 

session_start();
	$count=0;
	// connect to database
	$conn=mysqli_connect('localhost','preet','test1234','dbms');

	//check connection
	if(!$conn){
		echo 'Connecion error: '.mysqli_connect_error();
	}
	$name='';
	$phone=$id=0;
	
	isset($_GET['email']) ? $email=$_GET['email'] : $email=$_SESSION['EMAIL'];
	if($count==0) {
		if(isset($_GET['email']))
			$_SESSION['EMAIL']=$_GET['email'];
		 $count+=1 ;
	}
	else{
		$email=$_SESSION['EMAIL'];
		$count==0;
	}
	// echo $count;
	// echo $_SESSION['EMAIL'];
	
	if(isset($_GET['email']) || $_SESSION['EMAIL']!='' ){
	$sql = "SELECT a_name, a_phone, a_id from authority where a_email= '".$_SESSION['EMAIL']."' ";

	// make query and get result
	$query=mysqli_query($conn,$sql);
	// print_r($query);
	//fetch the resulting rows as an ASSOCIATIVE array
	$account=mysqli_fetch_all($query,MYSQLI_ASSOC);

	// print_r($account);
	$name=$account[0]['a_name'];
	$phone=$account[0]['a_phone'];
	$id=$account[0]['a_id'];
	$_SESSION['ID']=$id;
	// //free result from memory
	// mysqli_free_result($result);
	// //close connection
	// mysqli_close($conn);
	}


	if(isset($_POST['approve'])){
		header("location: approve.php?email=$email&id=$id");
	}



 ?>


 <!DOCTYPE html>
 <html>
<?php include("templates/header_plain.php") ?>
<br />
<div class="container round center navgraddy">
	<br />
	<label class="black-text"><h5>Name: <?php echo htmlspecialchars($name) ?></h5></label><br>
	<label class="black-text"><h5>Email: <?php echo htmlspecialchars($email) ?></h5></label><br>
	<label class="black-text"><h5>Phone Number: <?php echo htmlspecialchars($phone) ?></h5></label><br>
	<label class="black-text"><h5>Id: <?php echo htmlspecialchars($id) ?></h5></label><br>
	<br />
</div>
 

 <div class="container center">
	<form action="authority.php" method="POST" enctype="multipart/form-data">
		<button type="submit" name="approve" value="approve" class="btn brand z-depth-0">Approve contracts</button>
		<!-- <button type="submit" name="current" value="current" class="btn brand z-depth-0">My contracts</button> -->
	</form>
</div>

<?php include("templates/footer.php") ?>
 </html>