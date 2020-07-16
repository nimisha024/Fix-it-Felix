<?php
	session_start();
		if(isset($_GET['email'])){
		$_SESSION['MAIL']=$_GET['email'];
	}
	else{
		$_GET['email']=$_SESSION['MAIL'];
	}
	// echo $_SESSION['MAIL'];
	if(isset($_GET['back'])){
		header("location: user.php?email=".$_SESSION['MAIL']."&id=".$_SESSION['ID']." ");
	}



	//enctype dictates the type of encoding of the file
?>



<!DOCTYPE html>
<html>

	<?php include('templates/header_plain.php') ?>

	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<div class="center">
			<input type="file" name="file" value="file">
			<button type="submit" name="submit" class="btn brand z-depth-0">UPLOAD</button>
		</div>
	</form>

	<div class="containter center">
		<form action="getimage.php" method="get" enctype="multipart/form-data">
			<button type="submit" name="back" class="btn brand z-depth-0 center">back</button>
		</form>

	</div>
	<?php include('templates/footer.php') ?>
</html>