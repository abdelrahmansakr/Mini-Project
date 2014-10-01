<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>History | eShop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <style type="text/css">
    	.font{
			font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

    	}
    	.orangeFont{
			color: #FF9933;
    	}
    	.greyColor{
			color: #526666;
    	}
    </style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
	
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/eshoplogo.png" alt="" /></a>
						</div>
					
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav font">

								<!-- !!!!!!!!!!!!!!!!!!!!!! -->

								<?php 
								if(isset($_SESSION['email']))
								{	
									echo "<li><a href='profile.php'><i class='fa fa-user'></i> Account</a></li>";
								    echo "<li><a href='logout.php' class='active'><i class='fa fa-lock'></i> Logout</a></li>	"; 
								}
								else 
								{
									echo "<li><a href='login.php'><i class='fa fa-lock'></i> Login | Sign-Up</a></li>";
								}
								?>

								<!-- !!!!!!!!!!!!!!!!!!!!!! -->

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

	</header><!--/header-->
	<br>
	<h2 class="text-center font orangeFont"> Orders History </h2>
	<br><br>
	<?php
	   mysql_connect('localhost', 'root', '');
	   mysql_select_db('new_db'); 

	   if (isset($_SESSION['email'])){
		    $email = $_SESSION['email'];
		    $query = "
		    		SELECT * 
		    		FROM Userproducts  
		    		WHERE email ='$email'
		    		";

			$result = mysql_query($query);
			
			$rows = mysql_num_rows($result);
			
			for( $i = 1; $i <= $rows; $i++){
				$res = mysql_fetch_assoc($result);

			    $productID = $res[('productID')];

			    $query2 = " 
			    		SELECT * 
			    		FROM products 
			    		WHERE id = '$productID' 
			    		";

				$result2= mysql_fetch_array(mysql_query($query2));

				$name = $result2['name'];
				$price = $result2['price'];
				$finalprice = ($res['quantity'] * $price);
				$imageurl = $result2[2];

				echo "<div class='font' style='margin-left:10%;'>";
				echo "<img src = '$imageurl'>";
				echo ' You ordered '. $res['quantity'] .' '. $name . ' for '. $finalprice. '.00';
				echo "</div>";
				echo "<br>";
				echo "<hr width='80%'>";
				echo "<br>";
			}
		} 
		else{
	  		echo "<script> alert(Your current session ended. Please try logging in again using your email and password); <script>";
		}
	?>

	<footer id="footer"><!--Footer-->		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left font">Copyright © 2014 E-SHOP Inc. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

</body>
</html>


