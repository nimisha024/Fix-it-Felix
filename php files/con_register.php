<?php

	
	$email=$password=$name='';
	$phone=0;
	$errors=array('email'=>'', 'password'=>'', 'name'=>'', 'phone'=>'');
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

		// check name
		if(empty($_POST['name'])){
			$errors['name']='A name is required';
		} else{
			$name = $_POST['name'];
		}

		// check password
		if(empty($_POST['password'])){
			$errors['password']='A password is required';
		} else{
			$password = $_POST['password'];
		}

		// check phone
		if(empty($_POST['phone'])){
			$errors['phone']='A phone numeber is required';
		} else{
			$phone = $_POST['phone'];
		}

		$sql='';
		// connect to database
		$conn=mysqli_connect('localhost','preet','test1234','dbms');

		//check connection
		if(!$conn){
			echo 'Connecion error: '.mysqli_connect_error();
		}

		$sql = "INSERT INTO contractor ( `c_email`, `c_password`, `c_name`, `c_phone`) VALUES ('$email', '$password', '$name', '$phone');";

		// // make query and get result
		// $result=mysqli_query($conn,$sql);

		if ($email!='' && $password!='' && $name!='') {
				if(mysqli_query($conn,$sql)){
				echo "Records inserted successfully.";
				header("location: home.php");
			} else{
				    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}
		}
	}

		
		

 ?>

 <!DOCTYPE html>
 <html>
 <?php include("templates/header_plain.php") ?>
 	<section class="container white-text">
 		<form class="white" action="con_register.php" method="POST" enctype="multipart/form-data">

		<label>Email:</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email'] ?>
			</div>

		<label for="pwd">Password:</label>
			<input type="password" id="pwd" name="password" value="<?php echo htmlspecialchars($password)?>">
			<div class="red-text"><?php echo $errors['password'] ?>
			</div>

		<label>Name:</label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name'] ?>
			</div>

		<label>Phone Number:</label>
			<input type="number" name="phone" min="1000000000" max="9999999999" value="<?php echo htmlspecialchars($phone) ?>">
			<div class="red-text"><?php echo $errors['phone'] ?>
			</div>
		

		<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		</div>
	</form>
 	</section>
<?php include("templates/footer.php") ?> 
 </html>