<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title> Summary | eShop </title>

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
		#confirm{
			font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
			font-weight: bold;
			color: #FF9933;
			font-size: 22px;
		}

		.right{
			text-align: right;
			padding-right: 25px;
		}

		.orangeFont{
			color: #FF9933;
		}

		.buttonPosition{
			text-align: right;
			margin-top: 18px;
			margin-right: 15px;
		}

    	.font{
    		font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
    	}
    	.footer {
		    position:absolute;
		    margin-top: 510px;
		    width:100%;
		}
	</style>
</head>
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
				<div class="col-sm-0 col-sm-offset-0" style="width:100%">
					<br>
					<div style="margin-left:16px">

						<?php
							if(isset($_GET["quantity"]) && isset($_GET["pid"])){
								$quantity = $_GET["quantity"];
								$pid = $_GET["pid"];

								$con = mysql_connect("localhost","root","");

								mysql_select_db("new_db");

								$query = "
										SELECT name, price
										FROM products
										WHERE id = $pid
								";

								$result = mysql_query($query);

								$product = mysql_fetch_assoc($result);

								$productName = $product["name"];
								$productPrice =$product['price'];

								$totalPrice = $quantity * $productPrice;
								$totalPrice = $totalPrice . '.00';

								echo "<h1 id='confirm'> Confirmation </h1>
									<table width=100% class='font'>
									<tr>
									<td> $productName </td>
									<td class='right'> $quantity*$productPrice </td>
									</tr>
									</table>
									<hr>
									<div class='right orangeFont font'> Total: $totalPrice </div>
									<form action='summary.php' method='get' class='buttonPosition font'>
									<input type='hidden' name='quantity' value='$quantity'>
									<input type='hidden' name='pid' value='$pid'>
									<button type='submit' class='font btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Checkout</button>
									<button type='button' onclick='redirect()' class='font btn btn-default add-to-cart'>Cancel</button>
									</form>
									";
							}

							mysql_close($con);
						?>

					</div>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		function redirect(){
			window.location.href = "index.php";
		}
	</script>

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


