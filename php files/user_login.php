<?php

	$email=$password='';
	$errors=array('email'=>'', 'password'=>'');
	if(isset($_POST['submit'])){
		// check email
		if(empty($_POST['email'])){
			$errors['email']='An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$errors['email']='Email must be a valid email address';
			}
		}

		// check password
		if(empty($_POST['password'])){
			$errors['password']='A password is required';
		} else{
			$password = $_POST['password'];
		}
	

		$sql='';
		// connect to database
		$conn=mysqli_connect('localhost','preet','test1234','dbms');

		//check connection
		if(!$conn){
			echo 'Connecion error: '.mysqli_connect_error();
		}

		$sql="SELECT `u_email`, `u_password` FROM user WHERE `u_email`='$email' AND `u_password`='$password'; ";



		if(mysqli_query($conn,$sql)){

			// make query and get result
			$result=mysqli_query($conn,$sql);

			//fetch the resulting rows as an ASSOCIATIVE array
			$account=mysqli_fetch_all($result,MYSQLI_ASSOC);

			print_r($account);

			//free result from memory
			mysqli_free_result($result);

			//close connection
			mysqli_close($conn);

			if(!$account){
				echo '<script>alert("Invalid login credentials")</script>';
			}

			else{
				echo "Access granted";
				header("location: user.php?email=$email");
			}
		}
	}

		
 ?>

 <!DOCTYPE html>
 <html>
 <?php include("templates/header_home.php") ?>
 	<section class="container white-text">
 		<form class="white" action="user_login.php" method="POST" enctype="multipart/form-data">

		<label>Email:</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email'] ?>
			</div>

		<label for="pwd">Password:</label>
			<input type="password" id="pwd" name="password" value="<?php echo htmlspecialchars($password)?>">
			<div class="red-text"><?php echo $errors['password'] ?>
			</div>

		

		<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		</div>
	</form>
 	</section>
<?php include("templates/footer.php") ?> 
 </html>