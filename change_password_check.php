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
		$password=$_POST['password'];
		$c_password=$_POST['c_password'];

		if ($password != $c_password) 
		 {
		 	header('Location: '."change_password.php?error=1");
		 }
		 elseif (strlen($password) < 6) 
		 {
		 	header('Location: '."change_password.php?error=2");
		 }
		else
		{
			$query = "UPDATE Users SET password='$password' WHERE email='$session_email' ";
			mysql_query($query) ;
			header('Location: '."profile.php");
		}

		mysql_close();
	?>
  
  </body>
</html>