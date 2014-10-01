<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title> Purchase | eShop </title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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
		.errmsg{
			font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
			color: #FF9933;
			font-size: medium;
			text-align: left;
		}

		.orangeFont{
			color: #FF9933;
		}

		.imgdisplay 
		{
    		display: block;
    		margin-left: auto;
    		margin-right: auto;
			margin-top: 50px;
    	}

    	.positionRelative
    	{
    		position: relative;
    	}
    
    	.bottomCenter
    	{
			position: absolute;
			bottom: 0px;
			width:100%;
    	}

    	.font{
    		font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
    	}
    	.footer {
		    position:absolute;
		    margin-top: 340px;
		    width:100%;
		}
		
		
	</style>

</head>

<body min-height:600px; >
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

								<?php if(isset($_SESSION['email']))	 echo "<li><a href='profile.php'><i class='fa fa-user'></i> Account</a></li>"; ?>
								<?php 
								if(isset($_SESSION['email'])) echo "<li><a href='logout.php' class='active'><i class='fa fa-lock'></i> Logout</a></li>	"; 
								else echo "<li><a href='login.php'><i class='fa fa-lock'></i> Login | Sign-Up</a></li>"; 
								?>

								<!-- !!!!!!!!!!!!!!!!!!!!!! -->

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

	</header><!--/header-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-0 col-sm-offset-0 font" style="width:100%">
					<br>
					<?php
						if(isset($_SESSION['email'])){
							$prodid = $_GET["pid"];

							$con = mysql_connect("localhost", "root", "");

							if(!$con){
								die('Connection Failed'.mysql_error());
							}
							else{
								mysql_select_db("new_db");

								$query = "
									SELECT * 
									FROM products 
									WHERE id = $prodid
								";

								$result = mysql_query($query);

								$product = mysql_fetch_assoc($result);
					
								$productName = $product['name'];
								$productPrice = $product['price'];
								$productImage = $product['image_url'];
								$productInStock = $product['stock'];

								if(isset($_GET["error"])){
									$err = $_GET["error"];

									if($err == 0) {
										echo "
											<div style='margin-left:16px'>
											<h2 class='errmsg'> Please specify a value grater than zero for the quantity to be purchased !!</h2>
											</div>
											";
									}
									elseif ($err == 1) {
										echo "
											<div style='margin-left:16px'>
											<h2 class='errmsg'> Sorry the quantity to be purchased is greater than the 
											available items !!</h2>
											</div>
											";					
									}
								}

								echo "
									<div class='col-sm-4'>
									<div class='product-image-wrapper positionRelative' >
									<div class='single-products' style = 'height:300px'>
									<div>
									<img src = $productImage class='imgdisplay'>
									<br>
									<div class='productinfo text-center bottomCenter' >
									$productName
									<br>
									<span class='orangeFont'> Price: </span> $productPrice
									<br>
									<span class='orangeFont'> Avalaible Items: </span> $productInStock
									<br>
									<form action='purchaseChecking.php' method='get'>
									<span class='orangeFont'> Purchase Quantity: </span>
									<input type='number' name='quantity'>
									<input type='hidden' name='available' value='$productInStock'>
									<input type='hidden' name='pid' value='$prodid'>
									<br><br>
									<button type='submit' class='font btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Purchase</button>
									</form>
									</div>
									</div>
									</div>
									</div>
									</div>
								";
							}	

							mysql_close($con);
						}
						else{
							$product_id = $_GET['pid'];
							$link_url = "login.php?error=5&pid=" . $product_id;
							echo "<script type='text/javascript'>
								alert('Sorry You have to login first !!');
								window.location.href = '$link_url';
							 </script>";
						}
					?>
				</div>
			</div>
		</div>
	</section>

	<footer class="footer"><!--Footer-->		
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
