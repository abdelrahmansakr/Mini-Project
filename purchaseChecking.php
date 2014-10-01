<!DOCTYPE html>
<html>
<head>
	<title> Checking | eShop </title>
</head>

<body>
	<?php
		$pid = $_GET["pid"];
		
		if(empty($_GET["quantity"])){
			header('Location: '."purchase.php?error=0&pid=$pid");
			//echo "<script> window.location.href = 'purchase.php?error=0&pid=$pid' </script>";
		}
		else{
			$availableItems = $_GET["available"];
			$quantity = $_GET["quantity"];

			if($quantity > $availableItems){
				header('Location: '."purchase.php?error=1&pid=$pid");
				//echo "<script> window.location.href = 'purchase.php?error=1&pid=$pid' </script>";
			}
			else{
				header('Location: '."confirmation.php?pid=$pid&quantity=$quantity");
				//echo "<script> window.location.href = 'confirmation.php?pid=$pid&quantity=$quantity' </script>";
			}
		}
		//error=0 means quantity is empty
		//error=1 means quantit is greater than available items
	?>
</body>
</html>