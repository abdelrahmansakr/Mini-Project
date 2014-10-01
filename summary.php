<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Summary | eShop </title>
</head>
<body>
	<?php
		if(isset($_GET["quantity"]) && isset($_GET["pid"])){
			$quantity = $_GET["quantity"];
			$pid = $_GET["pid"];

			$con = mysql_connect("localhost","root","");
			
			mysql_select_db("new_db");

			$query = "
				SELECT stock
				FROM products
				WHERE id = $pid
			";

			$result = mysql_query("$query");

			$product = mysql_fetch_assoc($result);

			$stockItems = $product['stock'];

			$newStock = $stockItems - $quantity;

			$query2 = "
				UPDATE products
				SET stock = $newStock
				WHERE id = $pid
			"; 

			mysql_query($query2);


			$email = $_SESSION['email'];

			$querycheck = " SELECT * FROM Userproducts WHERE email = '$email' AND productID = '$pid' ";

			$checkresult = mysql_fetch_array(mysql_query($querycheck));

			if(!empty($checkresult))
			{
				$oldquantity = $checkresult[2];
				$quantity = $quantity + $oldquantity;
				$query3 = "	UPDATE Userproducts SET quantity = '$quantity' WHERE email = '$email' AND productID = '$pid' ";
			}
			else
			{
				$query3 = "INSERT INTO Userproducts(email, productID, quantity) VALUES ('$email', '$pid', '$quantity')";
			}			

			mysql_query($query3);

			echo "<script> 
				alert('Purchase successful ;)');
				window.location.href = 'index.php'; 
				</script>";

		}

		mysql_close($con);
	?>
</body>
</html>