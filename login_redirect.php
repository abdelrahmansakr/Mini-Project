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
		if(!mysql_connect('localhost', 'root', '')){
		die(mysql_error());
		}

		mysql_select_db('new_db');

		$email    = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$query = "SELECT * FROM Users WHERE email='$email' AND password='$password'";
		$r      = mysql_query($query);
		$result = mysql_fetch_array($r);


		mysql_close();

		if (!empty($result)) 
		{
			$_SESSION['email'] = $email;
			if (isset($_POST['pid']))
			{	
				$pid = $_POST['pid'];
				$link_url = "purchase.php?pid=" . $pid;
				header('Location: ' . $link_url);
			}
			else 
			{
			header('Location: ' . "index.php");
			}
		} 
		else 
		{
			header('Location: ' . "login.php?error=3");
		}
	?>
  </body>
</html>