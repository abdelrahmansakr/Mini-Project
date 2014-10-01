<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="UTF-8">
  <title>
    Welcome | eShop
  </title>
  </head>
  <body>
  <script>
      function redirect() 
      {
        window.location.href="edit_profile.php";
      }
  </script>
  <h3>
    <?php 
		// $email="";
		// if(!empty($_GET['email']))
		// {
		// $email=$_GET['email'];
		// }
		// echo "Welcome ".$email;

	?>
  </h3>
  <!-- <button id="myBtn" onclick="redirect()">
    Edit Profile
  </button> -->
 
  </body>
</html>