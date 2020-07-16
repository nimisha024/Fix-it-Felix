<?php

	if(isset($_POST['register'])){

		if(!empty($_POST["kind"])){

			$answer = $_POST['kind'];
			if($answer=="user"){
				header("location: user_register.php");
			}
			if($answer=="con"){
				header("location: con_register.php");
			}
			if($answer=="auth"){
				header("location: auth_register.php");
			}
		}
	}

	if(isset($_POST['submit'])){


		if(!empty($_POST["kind"])){

			$answer = $_POST['kind'];
			if($answer=="user"){
				header("location: user_login.php");
			}
			if($answer=="con"){
				header("location: con_login.php");
			}
			if($answer=="auth"){
				header("location: auth_login.php");
			}
	}
}

 ?>


 <!DOCTYPE html>
 <html>
 <?php include("templates/header_home.php"); ?>
 <div class="container navgraddy black-text round">
 	
 	<form action="home.php" method="POST" >
 		<h5 class="">Select Type:</h5>
	<p>
		<label>
			<input class="with-gap " name="kind" type="radio" value="user"  >
			<span class="black-text">User</span>
		</label>
	</p>
	<p>
		<label>
		    <input class="with-gap " name="kind" type="radio" value="con" style="">
			<span class="black-text">Contractor</span>
		</label>
	</p>
	<p>
		<label>
			<input class="with-gap " name="kind" type="radio"  value="auth" >
			<span class="black-text">Authority</span>
		</label>
	</p>

	<div class="center">
				<input type="submit" name="submit" value="Login" class="btn brand z-depth-0 ">
		</div>
		<br>
	<div class="center">
				<input type="submit" name="register" value="register" class="btn brand z-depth-0 ">
		</div>
 	</form>
 </div>

 	<br />
 <?php include("templates/footer.php"); ?>
 </html>