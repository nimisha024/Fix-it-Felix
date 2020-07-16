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
	echo $count;
	echo $_SESSION['EMAIL'];

	if(isset($_GET['email']) || $_SESSION['EMAIL']!='' ){
	$sql = "SELECT c_name, c_phone, c_id from contractor where c_email= '".$_SESSION['EMAIL']."' ";

	// make query and get result
	$result=mysqli_query($conn,$sql);
	//fetch the resulting rows as an ASSOCIATIVE array
	$account=mysqli_fetch_all($result,MYSQLI_ASSOC);

	print_r($account);
	$name=$account[0]['c_name'];
	$phone=$account[0]['c_phone'];
	$id=$account[0]['c_id'];
	$_SESSION['ID']=$id;
	// //free result from memory
	// mysqli_free_result($result);
	// //close connection
	// mysqli_close($conn);
	}


	if(isset($_POST['free'])){
		header('location: free.php?email='.$_SESSION['EMAIL'].'&id='.$_SESSION['ID'].' ');
	}

	if(isset($_POST['current'])){
		header('location: current.php?email='.$_SESSION['EMAIL'].'&id='.$_SESSION['ID'].' ');
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
	<form action="contractor.php" method="POST" enctype="multipart/form-data">
		<button type="submit" name="free" value="free" class="btn brand z-depth-0">Available contracts</button>
		<button type="submit" name="current" value="current" class="btn brand z-depth-0">My contracts</button>
	</form>
</div>

<?php include("templates/footer.php") ?> 
 </html>