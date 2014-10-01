<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | eShop</title>
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
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form font"><!--login form-->

						<!-- !!!!!!!!!!!!!!!!!!!!!! -->
						<h2>Login to your account</h2>
						<h2 style="color:#FFA500">
						   <?php 

					    		if (isset($_GET['error'])) {
									if ($_GET['error'] == 3)
									{
										echo "Invalid E-Mail or Password !";
									}
								}
    						?>
						</h2>
						 <form action="login_redirect.php" method="POST">
							<?php 
							if (isset($_GET['error'])) {
									if ($_GET['error'] == 5)
									{
										$prodid = $_GET['pid'];
										echo "<input type='hidden' name='pid' value='$prodid'>";
									}
								}

							?>
								
						      E-Mail: 
						      <input type="email" name="email" required >
						      Password: 
						      <input type="password" name="password" required >
						      <button type="submit" class="btn btn-default font">Login</button>
					    </form>

					    <!-- !!!!!!!!!!!!!!!!!!!!!! -->

					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or font">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form font"><!--sign up form-->

						 <!-- !!!!!!!!!!!!!!!!!!!!!! -->

						<h2>New User Signup!</h2>
						<h2 style="color:#FFA500">
							<?php 
								if (isset($_GET['error'])) {
									if ($_GET['error'] == 0)
									{
										echo "E-Mail already in use !";
									}
									elseif ($_GET['error'] == 1)
									{
										echo "Passwords don't match !";
									}
									elseif ($_GET['error'] == 2){
										echo "Password must be at least 6 characters!";
									}
									elseif ($_GET['error'] == 4)
									{
										echo "Please enter a valid e-mail address !";
									}
								}
							?>
						</h2>
						<form action="register_check.php" method="POST">
					      	E-Mail: 
					      	<input type="email" name="email" required>
					      	<br>
					      	Password: 
					      	<input type="password" name="password" required>
					      	<br>
					      	Confirm Password: 
					      	<input type="password" name="c_password" required>
					      	<br>
					      	First Name: 
					      	<input type="text" name="firstname">
					      	<br>
					      	Last Name: 
					      	<input type="text" name="lastname">
					      	<br>
					      	<button type="submit" class="btn btn-default font">Signup</button>
						</form>

							 <!-- !!!!!!!!!!!!!!!!!!!!!! -->

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
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