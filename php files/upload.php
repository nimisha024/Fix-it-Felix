<?php

	session_start();
	// if(isset($_GET['email'])){
	// 	$email=$_GET['email'];
	// 	header("location: user.php?email=$email");
	// }
	if(isset($_POST['submit'])){
		$file = $_FILES['file'];
		print_r($file);
		$fileName = $file['name'];
		$fileTempName = $file['tmp_name']; //created for every image uploaded
		$fileSize = $file['size'];
		$fileType = $file['type'];
		$fileError = $file['error']; //=0 if no error occurs

		$fileExt=explode('.', $fileName);
		$fileActualExtension=strtolower(end($fileExt));

		$allowed=array('jpg', 'jpeg');

		if(in_array($fileActualExtension, $allowed)){
			if($fileError===0){
				$fileNameNew=uniqid('',true).".".$fileActualExtension;//time in microseconds is timestamp
				$fileDestination='uploads/'.$fileNameNew;
				move_uploaded_file($fileTempName, $fileDestination);
				header("Location: location.php?loc=$fileDestination&id=".$_SESSION['ID']." ");
				// echo $_SESSION['EMAIL'];
				// echo $_SESSION['ID'];
			}
		}
		else{
			if(!$fileActualExtension)
				echo "Please upload an image";
			else
				echo "Sorry the image extension is not supported";
		}
	}

 ?>