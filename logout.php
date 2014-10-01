<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Logout | eShop</title>
</head>
<body>

	<?php 

		session_destroy();
		echo "You're logged out";
		header('Location: ' . "index.php");

	?>
	
</body>
</html>