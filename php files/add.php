<?php 

	//DON'T USE methods in form use method

	//protect from cross site scripting using htmlspecialchars(string) when outputting
	// echo htmlspecialchars($_POST['email']);
	// echo htmlspecialchars($_POST['title']);
	// echo htmlspecialchars($_POST['ingredients']);

	$email=$title=$ingredients='';
	$errors=array('email'=>'', 'title'=>'', 'ingredients'=>'');

	if (isset($_POST['submit'])) {


		
		// check email
		if(empty($_POST['email'])){
			$errors['email']='An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$errors['email']='Email must be a valid email address';
			}
		}


		// check title
		if(empty($_POST['title'])){
			$errors['title']='A title is required';
		} else{
			$title = $_POST['title'];
		}


		// check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients']='At least one ingredient is required';
		} else{
			$ingredients=$_POST['ingredients'];
		}



	} // end of POST check

	//array_filter($array) returns false if there are no errors
	// if(!array_filter($errors)){
	// 	header('Location: index.php');
	// }

 ?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class=>Add a Pizza</h4>
		<form class="white" action="add.php" method="POST" enctype="multipart/form-data">


			<label>Your email:</label>
			<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
			<div class="red-text"><?php echo $errors['email'] ?></div>

			<label>Pothole title:</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
			<div class="red-text"><?php echo $errors['title'] ?></div>

			<label>Ingredients(comma seperated):</label>
			<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
			<div class="red-text"><?php echo $errors['ingredients'] ?></div>

			<div class="center">
				<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>