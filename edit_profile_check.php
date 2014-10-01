<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="UTF-8">
  <title>
    Account | eShop
  </title>
  </head>
  <body>
    
    <?php
		mysql_connect('localhost', 'root', '');
		mysql_select_db('new_db');

		$session_email=$_SESSION['email'];		
		$email=$_POST['email'];
		$c_email=$_POST['c_email'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$image=addslashes(file_get_contents($_FILES['uploaded_image']['tmp_name']));

		if($email != $c_email)
		{
			header('Location: '."edit_profile.php?error=0");
		}
		elseif (!empty($image))
		{
			$query = "UPDATE Users SET email='$email',firstname='$firstname',
			lastname='$lastname', image='$image' WHERE email='$session_email' ";
			mysql_query($query);
			header('Location: '."profile.php");
		}else
		{
			$query3 = "UPDATE Users SET email='$email',firstname='$firstname',
			lastname='$lastname' WHERE email='$session_email' ";
			mysql_query($query3) ;
			header('Location: '."profile.php");
		}

		mysql_close();
	?>
  
  </body>
</html>