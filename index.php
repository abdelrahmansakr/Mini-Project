<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | eShop</title>
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
	    img.imgdisplay{
		    display: block;
		    margin-left: auto;
		    margin-right: auto;
			margin-top: 50px;
	    }

	    .positionRelative{
	    	position: relative;
	    }

	    .bottomCenter{
			position: absolute;
			bottom: 0px;
			width:100%;
	    }

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
							<ul class="nav navbar-nav" class="font">

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
				
				<div class="col-sm-9 padding-right" style="width:100%">
					<div class="features_items font"><!--features_items-->
						<br>
						<h2 class="text-center font orangeFont"> Our Products </h2>
						<br>
						<br>
							<?php
								$con = mysql_connect('localhost', 'root', '');

								if(!$con){
									die('Connection Failed'.mysql_error());
								}
								else{
									mysql_select_db('new_db');

									$query = "
									SELECT * 
									FROM products 
									";

									$result = mysql_query($query);

									$numRows = mysql_num_rows($result);

									for($i=1; $i<$numRows+1; $i++){
										$product = mysql_fetch_assoc($result);
										$productId = $product['id'];
										$productName = $product['name'];
										$productPrice = $product['price'];
										$productImage = $product['image_url'];
										$productInStock = $product['stock'];

										$id = "box"."$i";

										if ($productInStock > 0){
											echo "
											<div class='col-sm-4'>
											<div class='product-image-wrapper positionRelative' >
											<div class='single-products' style = 'height:300px'>
											<div id=$id>
											<img src = $productImage class='imgdisplay'>
											<br>
											<div class='productinfo text-center bottomCenter' >
											$productName
											<br>
											<span class='orangeFont'> Price: </span> $productPrice
											<br>
											<form action='purchase.php' method='get'>
											<input type='hidden' value='$productId' name='pid'>
											<button type='submit' class='font btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Buy</button>
											</form>
											<br>
											</div>
											</div>
											</div>
											</div>
											</div>
											";

										}
										else{
											echo "
											<div class='col-sm-4'>
											<div class='product-image-wrapper positionRelative' >
											<div class='single-products' style = 'height:300px'>
											<div id=$id>
											<img src = '$productImage' class='imgdisplay'>
											<br>
											<div class='productinfo text-center bottomCenter' >
											$productName
											<br>
											<span class='orangeFont'> Price: </span> $productPrice
											<br>
											<form action='soldout.php' method='get'>
											<input type='hidden' value='$productId' name='pid'>
											<button type='button' onclick='soldOut()' class='font btn btn-default add-to-cart'>
											<i class='fa fa-shopping-cart'></i>SoldOut</button>
											</form>
											<br>
											</div>
											</div>
											</div>
											</div>
											</div>
											";
										}
									}
								}

								mysql_close($con);
							?>										
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		function soldOut(){
			alert("Sorry, this item is not available at the moment !!");
		}
	</script>
	
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