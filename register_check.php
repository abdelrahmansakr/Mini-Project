<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="UTF-8">
  <title>
    eShop
  </title>
  </head>
  <body> 
	  <?php

		$email = $_POST['email'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$p = md5($password);

		mysql_connect('localhost', 'root', '');
		mysql_select_db('new_db');

		$query = "SELECT * FROM Users Where email = '$email' ";
		$result = mysql_fetch_array(mysql_query($query));

		if(!empty($result))
		{
			header('Location: '."login.php?error=0");
		}
		elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)) {
			header('Location: '."login.php?error=4");
		}
		elseif ($password != $c_password)
		{
			header('Location: '."login.php?error=1");	
		}
		elseif (strlen($password) < 6) 
		{
			header('Location: '."login.php?error=2");
		}
		else
		{
			$insert = "INSERT INTO Users (email,password,firstname,lastname) 
					   VALUES ('$email','$password','$firstname','$lastname')";
			mysql_query($insert);
			$_SESSION['email'] = $email;
			mysql_close();
			header('Location: '."index.php?email='$email' ");
		}
		mysql_close();
	  ?>
  
  </body>
</html>